<?php
	class Staff_Directory_Background_Import_Process extends Vandelay_Background_Import_Process
	{
		//var $action = 'staff_directory_import_row';

		/**
		 * Insert Post
		 *
		 * Override this method to perform any actions required on each
		 * queue item. Return the modified item for further processing
		 * in the next pass through. Or, return false to remove the
		 * item from the queue.
		 *
		 * @param mixed $item Queue item to iterate over
		 *
		 * @return mixed
		 */
		function insert_post($post)
		{	
			$overwrite_existing = $this->should_overwrite_existing( $post );
		
			// title and body are always required
			$full_name = isset($post['Full Name']) ? $post['Full Name']  : '';
			$the_body = isset($post['Body']) ? $post['Body']  : '';
			$the_email = isset($post['Email']) ? $post['Email'] : "";			
			$the_phone = isset($post['Phone']) ? $post['Phone'] : "";			
				
			// look for a staff member with the same full name, to prevent duplicates
			//$find_dupe = get_page_by_title( $full_name, OBJECT, 'staff-member' );
			$find_dupe = $this->find_duplicate($post);
			
			// force delay for testing
			//usleep( rand(100, 5000) );
				
			
			// if a duplicate entry was found, the option to overwrite existing records is off,
			// abort now and mark this record as duplicate
			if ( !empty($find_dupe) && !$overwrite_existing ) {
				$this->update_batch_status($post['batch_id'], 'duplicate');
				return false;
			}
			
			// if no person with that name was found, create a new record for them
			// otherwise update the existing record
			if( empty($find_dupe) )
			{
				// create new record
				$new_post = array(
					'post_title'    => $full_name,
					'post_content'  => $the_body,
					'post_status'   => 'publish',
					'post_type'     => 'staff-member'
				);
				$new_id = wp_insert_post($new_post);
			}
			else if ($overwrite_existing) {
				// use existing record
				$new_id = $find_dupe->ID;
			} 
				
		
			// assign Staff Member Categories if any were specified
			// NOTE: we are using wp_set_object_terms instead of adding a tax_input key to wp_insert_posts, because 
			// it is less likely to fail b/c of permissions and load order (i.e., taxonomy may not have been created yet)
			if (!empty($post['Categories'])) {
				$post_cats = explode(',', $post['Categories']);
				$post_cats = array_map('intval', $post_cats); // sanitize to ints
				wp_set_object_terms($new_id, $post_cats, 'staff-member-category');
			}
			
			// Save the custom fields. Default everything to empty strings
			$first_name = isset($post['First Name']) ? $post['First Name'] : '';
			$last_name = isset($post['Last Name']) ? $post['Last Name'] : '';
			$title = isset($post['Title']) ? $post['Title'] : "";
			$phone = isset($post['Phone']) ? $post['Phone'] : "";
			$email = isset($post['Email']) ? $post['Email'] : "";
			$address = isset($post['Address']) ? $post['Address'] : "";
			$website = isset($post['Website']) ? $post['Website'] : "";
							
			update_post_meta( $new_id, '_import_batch_id', $post['batch_id'] );
			update_post_meta( $new_id, '_ikcf_first_name', $first_name );
			update_post_meta( $new_id, '_ikcf_last_name', $last_name );
			update_post_meta( $new_id, '_ikcf_title', $title );
			update_post_meta( $new_id, '_ikcf_phone', $phone );
			update_post_meta( $new_id, '_ikcf_email', $email );
			update_post_meta( $new_id, '_ikcf_address', $address );
			update_post_meta( $new_id, '_ikcf_website', $website );
			
			// Look for a photo path on CSV
			// If found, try to import this photo and attach it to this staff member
			$this->import_staff_photo($new_id, $post['Photo']);
			
			// finish up
			$this->update_batch_status($post['batch_id'], 'imported');
			return true;
		}
		
		function should_overwrite_existing( $post = array() )
		{
			if ( isset($post['overwrite_existing']) ) {
				$overwrite_existing = !empty($post['overwrite_existing']);				
			} else {
				$options = get_option( 'cd_pro_options' );
				$overwrite_existing = !empty($options['overwrite_existing']);
			}
			return $overwrite_existing;
		}
		
		function find_duplicate($post)
		{
			$dupe = false;
			$options = get_option('cd_pro_options');
			$match_field =  !empty( $options['duplicate_match_field'] )
							? $options['duplicate_match_field'] 
							: 'email'; // defaults to email

			//$field = get_option();// 
			switch( $match_field ) {
								
				case 'phone':
					$the_phone = isset($post['Phone']) ? $post['Phone'] : "";			
					$dupe = $this->find_by_phone($the_phone);
					break;
				
				case 'title':
					$the_title = isset($post['Title']) ? $post['Title'] : "";
					$dupe = $this->find_by_title($the_title);
					break;
				
				case 'email':
				default:
					$the_email = isset($post['Email']) ? $post['Email'] : "";			
					$dupe = $this->find_by_email($the_email);
					break;
			}
			
			return $dupe;
			
		}
		
		
		function find_by_email($email = '')
		{
			if ( empty($email) ) {
				return false;
			}

			$args = array(
				'post_type' => 'staff-member',
				'post_status' => 'any',
				'meta_key' => '_ikcf_email',
				'meta_value' => $email
			);
			$posts = get_posts($args);
			return !empty($posts)
				   ? array_shift($posts)
				   : false;
		}
		
		function find_by_phone($phone = '')
		{
			if ( empty($phone) ) {
				return false;
			}

			$args = array(
				'post_type' => 'staff-member',
				'post_status' => 'any',
				'meta_key' => '_ikcf_phone',
				'meta_value' => $phone
			);
			$posts = get_posts($args);
			return !empty($posts)
				   ? array_shift($posts)
				   : false;
		}
		
		function find_by_title($title)
		{
			return get_page_by_title($title, OBJECT, 'staff-member');
		}
		
		function import_staff_photo($post_id = '', $photo_source = '')
		{	
			//used for overriding specific attributes inside media_handle_sideload
			$post_data = array();
			
			//set attributes in override array
			$post_data = array(
				'post_title' => '', //photo title
				'post_content' => '', //photo description
				'post_excerpt' => '', //photo caption
			);
		
			require_once( ABSPATH . 'wp-admin/includes/image.php');
			require_once( ABSPATH . 'wp-admin/includes/media.php' );//need this for media_handle_sideload
			require_once( ABSPATH . 'wp-admin/includes/file.php' );//need this for the download_url function
			
			$desc = ''; // photo description
			
			$picture = urldecode($photo_source);
			
			// Download file to temp location
			$tmp = download_url( $picture);
			
			// Set variables for storage
			// fix file filename for query strings
			preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $picture, $matches);
			$file_array['name'] = isset($matches[0]) ? basename($matches[0]) : basename($picture);
			$file_array['tmp_name'] = $tmp;

			// If error storing temporarily, unlink
			if ( is_wp_error( $tmp ) ) {
				//$error_string = $tmp->get_error_message();
				//echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
				
				@unlink($file_array['tmp_name']);
				$file_array['tmp_name'] ='';
			}
			
			$id = media_handle_sideload( $file_array, $post_id, $desc, $post_data );
			
			// If error storing permanently, unlink
			if ( is_wp_error($id) ) {
				//$error_string = $id->get_error_message();
				//echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
				
				@unlink($file_array['tmp_name']);
			} else {		
				//add as the post thumbnail
				if( !empty($post_id) ){
					add_post_meta($post_id, '_thumbnail_id', $id, true);
				}
			}
		}	
		
	}