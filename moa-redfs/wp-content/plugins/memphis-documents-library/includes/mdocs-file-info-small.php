<?php
function mdocs_display_file_info($the_mdoc, $index=0, $current_cat) {
	$boxview = new mdocs_box_view();
	$categories = wp_get_object_terms( $the_mdoc['parent'], 'category', array() );
	$tags = wp_get_object_terms( $the_mdoc['parent'], 'post_tag', array() );
	$the_mdoc_permalink = mdocs_get_permalink($the_mdoc['parent'], true);
	$the_post = get_post($the_mdoc['parent']);
	if($the_post != null) $is_new = preg_match('/new=true/',$the_post->post_content);
	else $is_new = false;
	$mdocs_show_new_banners = get_option('mdocs-show-new-banners');
	$mdocs_time_to_display_banners = get_option('mdocs-time-to-display-banners');
	$new_or_updated = '';
	
	$the_date = mdocs_format_unix_epoch($the_mdoc['modified']);
	if($the_date['gmdate'] > time()) $scheduled = '<small class="text-muted"><em>'.__('Scheduled').'</em></small>';
	else $scheduled = '';
	
	if($mdocs_show_new_banners) {
		$modified = floor($the_mdoc['modified']/86400)*86400;
		$today = floor(time()/86400)*86400;
		$days = (($today-$modified)/86400);
		if($mdocs_time_to_display_banners > $days) {
			if($is_new == true) {
				$status_class = 'mdocs-success';
				$new_or_updated = '<small class="label label-success">'.__('New', 'memphis-documents-library').'</small>';
			} else {
				$status_class = 'mdocs-info';
				$new_or_updated = '<small class="label label-info">'.__('Updated', 'memphis-documents-library').'</small>';
			}
		} else  $status_class = 'mdocs-normal';
	} else $status_class = 'mdocs-normal'; 
	
	if(get_option('mdocs-hide-new-update-label')) $new_or_updated = '';
	
	
	if(is_admin()) {
		if($the_mdoc['file_status'] == 'hidden' || get_option('mdocs-hide-all-files')) $file_status = '<i class="fa fa-eye-slash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="'.__('File is Hidden', 'memphis-documents-library').'"></i>';
		else $file_status = '';
		if($the_mdoc['post_status'] != 'publish') $post_status = '&nbsp<i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="'.__('Post is ', 'memphis-documents-library').ucfirst($the_mdoc['post_status']).'"></i>';
		elseif(get_option('mdocs-hide-all-posts')) {
			$post_status = '&nbsp<i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="'.__('All Post are Hidden ', 'memphis-documents-library').'"></i>';
		} else $post_status = '';
	} else {
		$file_status = '';
		$post_status = '';
	}
	?>
		<tr class="<?php echo $status_class; ?>">
			<?php
			$title_colspan = 0;
			if(is_admin()) {
				if(mdocs_check_file_rights($the_mdoc)) {
					?>
					<td><input type="checkbox" name="mdocs-batch-checkbox" data-id="<?php echo $the_mdoc['id']; ?>"/></td>
					<?php
				} else $title_colspan = 2;
				$dropdown_class = 'mdocs-dropdown-menu';
			} else $dropdown_class = 'mdocs-dropdown-menu';
			if(get_option('mdocs-dropdown-toggle-fix')  && !is_admin() ) $data_toogle = '';
			else $data_toogle = 'dropdown';
			?>
			<td id="" class="mdocs-tooltip mdocs-title" colspan="<?php echo $title_colspan; ?>">
					<div class="mdocs-btn-group btn-group">

						<?php
						if(get_option('mdocs-hide-name')) $name_string = $new_or_updated.$file_status.$post_status.mdocs_get_file_type_icon($the_mdoc).' '.$the_mdoc['filename'].'<br>'.$scheduled;
						elseif(get_option('mdocs-hide-filename')) $name_string = $new_or_updated.$file_status.$post_status.mdocs_get_file_type_icon($the_mdoc).' '.str_replace('\\','',$the_mdoc['name']).'<br>'.$scheduled;
						else $name_string = $new_or_updated.$file_status.$post_status.mdocs_get_file_type_icon($the_mdoc).' '.str_replace('\\','',$the_mdoc['name']).' - <small class="text-muted">'.$the_mdoc['filename'].'</small><br>'.$scheduled;
						
						
						?>
						<a class="mdocs-title-href" data-mdocs-id="<?php echo $index; ?>" data-toggle="<?php echo $data_toogle; ?>" href="#" >
							
						<?php /* ========== CRITIGEN CUSTOMIZATION =============== */ 
			
							/* MDOCS thumbnail with title and custom metadata via cats/tags has been added as individual table cells */
							
							$the_image_file = preg_replace('/ /', '%20', $the_mdoc['filename']);
							$image_size = @getimagesize(get_site_url().'/?mdocs-img-preview='.$the_image_file);
							if(get_option('mdocs-preview-type') == 'box' && get_option('mdocs-box-view-key') != '' && strtolower($the_mdoc['type']) != 'zip' && strtolower($the_mdoc['type']) != 'rar' && $image_size == false) {
								$boxview = new mdocs_box_view();
								$thumbnail = true;
							} else {
								$thumbnail = false;
								
							}
							?>
							<?php if($thumbnail) {
								if(function_exists('imagecreatefromjpeg')) {
									?>
									<div class="">
										<img class="mdocs-thumbnail pull-left img-thumbnail img-responsive" src="<?php $boxview->getThumbnail($the_mdoc['box-view-id'], $the_mdoc); ?>" alt="<?php echo $the_mdoc['filename']; ?>" />
									</div>
									<?php
								}
							} elseif($the_mdoc['type'] == 'pdf' && class_exists('imagick')) {
								$the_image_file = preg_replace('/ /', '%20', $the_mdoc['filename']);
								$image_size = @getimagesize(get_site_url().'/?mdocs-img-preview='.$the_image_file);
								$thumbnail_size = 256;
								$upload_dir = wp_upload_dir();
								$file = $upload_dir['basedir']."/mdocs/".$the_mdoc['filename'].'[0]';
								$thumbnail = new Imagick($file);
								$thumbnail->setbackgroundcolor('rgb(64, 64, 64)');
								$thumbnail->thumbnailImage(450, 300, true);
								$thumbnail->setImageFormat('png');
								$uri = "data:image/png;base64," . base64_encode($thumbnail);
								?>
								<div class="" >
									<img class="mdocs-thumbnail pull-left img-thumbnail  img-responsive" src="<?php echo $uri; ?>" alt="<?php echo $the_mdoc['filename']; ?>" />
								</div>
								<?php
							} elseif( $image_size != false) {
								$thumbnail_size = 256;
								$width = $image_size[0];
								$height = $image_size[1];
								$aspect_ratio = round($width/$height,2);
								// Width is greater than height and width is greater than thumbnail size
								if($aspect_ratio > 1&&  $width > $thumbnail_size) {
									$thumbnail_width = $thumbnail_size;
									$thumbnail_height = $thumbnail_size/$aspect_ratio;
								// Heigth is greater than width and height is greater then thumbnail size
								} elseif($aspect_ratio < 1 && $height > $thumbnail_size) {
									$aspect_ratio = round($height/$width,2);
									$thumbnail_width = $thumbnail_size/$aspect_ratio;
									$thumbnail_height = $thumbnail_size;
								// Heigth is greater than width and height is less then thumbnail size
								} elseif($aspect_ratio < 1 && $height < $thumbnail_size) {
									$aspect_ratio = round($height/$width,2);
									$thumbnail_width = $thumbnail_size/$aspect_ratio;
									$thumbnail_height = $thumbnail_size;
								// Width and height are equal
								} elseif($aspect_ratio == 1 ) {
									$thumbnail_width = $thumbnail_size;
									$thumbnail_height = $thumbnail_size;
								// Width is greater than height and width is less than thumbnail size
								} elseif($aspect_ratio > 1 && $width < $thumbnail_size) {
									$thumbnail_width = $thumbnail_size;
									$thumbnail_height = $thumbnail_size/$aspect_ratio;
								// Hieght is greater than width and height is less than thumbnail size
								} elseif($aspect_ratio > 1 && $height < $thumbnail_size) {
									$thumbnail_width = $thumbnail_size/$aspect_ratio;
									$thumbnail_height = $thumbnail_size;
								} else {
									$thumbnail_width = $thumbnail_size;
									$thumbnail_height = $thumbnail_size;
								}
								if(function_exists('imagecreatefromjpeg')) {
									ob_start();
									$upload_dir = wp_upload_dir();
									$src_image = $upload_dir['basedir'].MDOCS_DIR.$the_mdoc['filename'];
									if($image_size['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($src_image);
									elseif($image_size['mime'] == 'image/png') $image = imagecreatefrompng($src_image);
									elseif($image_size['mime'] == 'image/gif') $image = imagecreatefromgif($src_image);
									$thumnail =imagecreatetruecolor($thumbnail_width,$thumbnail_height);
									$white = imagecolorallocate($thumnail, 255, 255, 255);
									imagefill($thumnail, 0, 0, $white);
									imagecopyresampled($thumnail,$image,0,0,0,0,$thumbnail_width,$thumbnail_height,$image_size[0],$image_size[1]);
									imagepng($thumnail);
									imagedestroy($image);
									imagedestroy($thumnail);
									$png = ob_get_clean();
									$uri = "data:image/png;base64," . base64_encode($png);
									?>
									<div class="">
										<img class="mdocs-thumbnail pull-left img-thumbnail  img-responsive" src="<?php echo $uri; ?>" alt="<?php echo $the_mdoc['filename']; ?>" />
									</div>
									<?php
								}
						} ?>
								
							<?php echo $name_string; ?>
						</a>
						
						<ul class="<?php echo $dropdown_class; ?>" role="menu" aria-labelledby="dropdownMenu1">
							<li role="presentation" class="dropdown-header"><i class="fa fa-medium" aria-hidden="true"></i> &#187; <?php echo $the_mdoc['filename']; ?></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation" class="dropdown-header"><?php _e('File Options', 'memphis-documents-library'); ?></li>
							<?php
								mdocs_download_rights($the_mdoc);
								mdocs_desciption_rights($the_mdoc);
								mdocs_preview_rights($the_mdoc);
								mdocs_versions_rights($the_mdoc);
								mdocs_rating_rights($the_mdoc);
								mdocs_goto_post_rights($the_mdoc, $the_mdoc_permalink);
								mdocs_share_rights($the_mdoc, $the_mdoc_permalink);
								if(is_admin()) { ?>
							<li role="presentation" class="divider"></li>
							<li role="presentation" class="dropdown-header"><?php _e('Admin Options'); ?></li>
							<?php
								mdocs_add_update_rights($the_mdoc, $current_cat);
								mdocs_manage_versions_rights($the_mdoc, $index, $current_cat);
								mdocs_delete_file_rights($the_mdoc, $index, $current_cat);
								if(get_option('mdocs-preview-type') == 'box' && get_option('mdocs-box-view-key') != '') {
									mdocs_refresh_box_view($the_mdoc, $index);
								}
							?>
							<li role="presentation" class="divider"></li>
							<li role="presentation" class="dropdown-header"><i class="fa fa-laptop" aria-hidden="true"></i> <?php _e('File Status', 'memphis-documents-libaray'); echo ':'.' '.ucfirst($the_mdoc['file_status']); ?></li>
							<li role="presentation" class="dropdown-header"><i class="fa fa-bullhorn" aria-hidden="true"></i> <?php _e('Post Status', 'memphis-documents-libaray'); echo ':'.' '.ucfirst($the_mdoc['post_status']); ?></li>
							<?php } ?>
						  </ul>
					</div>
			</td>

			
			</td>

			<td class="mdocs-metadata">
				<ul style="padding-left: 0px; font-size: 14px; list-style-type: none;">
				<?php if($categories || $tags) { ?>
					<?php foreach($categories as $cat) { ?>
						<li class="badge badge-primary" style='margin-bttom: 5px; font-size: 14px;' class='cat'><?=$cat->name?></li>
					<?php } ?>
					<?php foreach($tags as $tag) { ?>
						<li class="badge badge-primary" style='margin-bottom: 5px; font-size: 14px; line-height: ' class='tag'><?=$tag->name?></li>
					<?php } ?>
				<?php } ?>
				</ul>
			</td>


			<?php
			foreach(get_option('mdocs-displayed-file-info') as $key => $option) {
				if(isset($option['show']) && $option['show']) {
					$the_function = $option['function'];
					if($option['icon'] == 'mdocs-none') {
						?>
						<td class="<?php echo 'mdocs-'.$option['slug']; ?>">
							<?php if(function_exists($the_function)) $the_function($the_mdoc); else echo '"'.$the_function. '" function does not exist.'; ?>
						</td><?php
					} else {	?>
						<td class="<?php echo 'mdocs-'.$option['slug']; ?>">
							<i class="<?php echo $option['icon']; ?>" aria-hidden="true" title="<?php _e($option['text'], 'memphis-documents-library'); ?>"></i>
							<em class="<?php echo $option['color']; ?>"><?php if(function_exists($the_function)) $the_function($the_mdoc); else echo '"'.$the_function. '" function does not exist.'; ?></em>
						</td><?php
					}
				}
			}
			?>
		</tr>
<?php
}
?>