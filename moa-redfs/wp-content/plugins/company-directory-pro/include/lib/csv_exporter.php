<?php
class CompanyDirectoryPlugin_Exporter
{
	var $csv_headers = array('Full Name','Body','First Name','Last Name','Title','Phone','Email','Address','Website','Categories','Photo');
	
	public static function get_csv_headers()
	{
		return $csv_headers;
	}

	public static function output_form()
	{
		?>
		<form method="POST" action="">
			<p>Click the "Export Staff Members" button below to download a CSV file of your records.</p>			
			<input type="hidden" name="_company_dir_do_export" value="_company_dir_do_export" />
			<p><strong>Tip:</strong> You can use this export file as a template to import your own staff members.</p>			
			<p class="submit">
				<input type="submit" class="button" value="Export Staff Members" />
			</p>
		</form>
		<?php
	}
	
	/* Renders a CSV file to STDOUT representing every staff member in the database
	 * NOTE: this file is, and must remain, compatible with the Importer
	 */
	public function process_export($filename = "export.csv")
	{		
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename={$filename}");
		header("Expires: 0");
		header("Pragma: public");
		
		// set memory limit to high value (4GB) and remove time limit, to allow 
		// for large (20k+) exports. this still might not accommodate all users.
		@ini_set( 'memory_limit', apply_filters( 'admin_memory_limit', '4096M' ) );
		set_time_limit(0);
		
		// open file handle to STDOUT
		$fh = @fopen( 'php://output', 'w' );
		
		// output the headers first
		fputcsv($fh, $this->csv_headers);
			
		$page = 1;
		$posts = $this->get_posts_paged(100, $page);
		
		while ( !empty($posts) ) {
		
			// now output one row for each staff member
			foreach($posts as $post) {
				$row = array();
				$all_meta = get_metadata('post', $post->ID);
				$row['full_name'] = $post->post_title;
				$row['body'] = $post->post_content;
				$row['first_name'] = !empty( $all_meta['_ikcf_first_name'] ) ? $all_meta['_ikcf_first_name'][0] : '';
				$row['last_name'] = !empty( $all_meta['_ikcf_last_name'] ) ? $all_meta['_ikcf_last_name'][0] : '';
				$row['title'] = !empty( $all_meta['_ikcf_title'] ) ? $all_meta['_ikcf_title'][0] : '';
				$row['phone'] = !empty( $all_meta['_ikcf_phone'] ) ? $all_meta['_ikcf_phone'][0] : '';
				$row['email'] = !empty( $all_meta['_ikcf_email'] ) ? $all_meta['_ikcf_email'][0] : '';
				$row['address'] = !empty( $all_meta['_ikcf_address'] ) ? $all_meta['_ikcf_address'][0] : '';
				$row['website'] = !empty( $all_meta['_ikcf_website'] ) ? $all_meta['_ikcf_website'][0] : '';
				$row['categories'] = $this->list_taxonomy_ids( $post->ID, 'staff-member-category' );	
				$row['photo'] = $this->get_photo_path( $post->ID );			
				fputcsv($fh, $row);
				ob_flush();
				flush();
			}
			$posts = null;
			ob_flush();
			flush();			
			$page++;
			$posts = $this->get_posts_paged(10, $page);
		}
		
		// Close the file handle
		fclose($fh);
	}
	
	function get_posts_paged($posts_per_page = 100, $page_number = 1)
	{
		//load records
		$args = array(
			'posts_per_page'   	=> $posts_per_page,
			'paged'   			=> $page_number,
			'orderby'          	=> 'post_date',
			'order'            	=> 'DESC',
			'post_type'        	=> 'staff-member',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true 				
		);
		return get_posts($args);		
	}
	
	/*
	 * Get the path to the staff member's photo
	 *
	 * @returns a string representing the path to the photo
	*/
	function get_photo_path($post_id){
		$image_str = "";
		
		if (has_post_thumbnail( $post_id ) ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
			$image_str = $image[0];
		}
		
		return $image_str;
	}
	
	/* 
	 * Get a comma separated list of IDs representing each term of $taxonomy that $post_id belongs to
	 *
	 * @returns comma separated list of IDs, or empty string if no terms are assigned
	*/
	function list_taxonomy_ids($post_id, $taxonomy)
	{
		$terms = wp_get_post_terms( $post_id, $taxonomy ); // could also pass a 3rd param, $args
		if (is_wp_error($terms)) {
			return '';
		}
		else {
			$term_list = array();
			foreach ($terms as $t) {
				$term_list[] = $t->term_id;
			}
			return implode(',', $term_list);
		}
	}
}