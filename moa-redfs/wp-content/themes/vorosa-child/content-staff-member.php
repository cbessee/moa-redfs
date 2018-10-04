<?php
	global $staff_data;
	/*$content = get_the_content(get_the_ID());
	extract ( cd_get_staff_metadata(get_the_ID(), $options) );*/
	$my_phone = htmlspecialchars($staff_data['phone']);
	$my_email = htmlspecialchars($staff_data['email']);
	$my_title = htmlspecialchars($staff_data['title']);
	$my_website = htmlspecialchars($staff_data['website']);
	$my_address = nl2br(htmlspecialchars($staff_data['address']));
	$is_single_post = $staff_data['is_single_post'];
	$options = !empty($staff_data['options']) ? $staff_data['options'] : array();
	extract($options);
	if(get_query_var('is_search')) {
		$show_name = true;
		$is_single_post = true;
	}

	$department = get_field('department');

	$staff_cats = wp_get_object_terms(get_the_ID(), 'staff-member-category');
	if($staff_cats) { 
		$cats_to_display = array();
		foreach($staff_cats as $cat) {
			$parent = get_term_top_most_parent($cat->term_id, 'staff-member-category');
			if($parent->term_id != $cat->term_id) {
				if(!$cats_to_display[$parent->name]) {
					$cats_to_display[$parent->name] = array($cat);
				} else {
					$cats_to_display[$parent->name][] = $cat;
				}
			}
		}
	}
?>
<div class="blog-info story-hbtitle">
	<?php if ( is_single() || $is_single_post ): ?>
	<div class="staff-member single-staff-member">
	<?php else: ?> 
	<div class="staff-member">
	<?php endif; ?>

		<!-- Featured Image -->
		<?php if ( $show_photo ): ?>
			<?php $post_thumbnail_src = get_the_post_thumbnail($staff_data['ID'], 'thumbnail'); ?>
			<?php if (!empty($post_thumbnail_src)): ?>
				<div class="staff-photo"><?php echo $post_thumbnail_src; ?></div>
			<?php endif; ?>
		<?php endif; ?>

		<div class="staff-member-right">
			<?php if ( $show_name || is_singular('staff-member')): // will always be false on single views ?>
				<h3 class="staff-member-name"><?php echo $staff_data['full_name']; ?></h3>
			<?php endif; ?>
			<table class="staff-info">
				<?php if ( $show_title ): ?>
					<tr valign="middle" class="staff-member-title">
						<td class="prefix" valign="middle">Role:</td><td class="value" valign="middle"><?php echo $my_title ?></td>
					</tr>
				<?php endif; ?>

				<?php if( is_single() || $is_single_post ) { ?>
					<tr valign="middle" class="staff-member-organization">
						<td class="prefix" valign="middle">Organization:</td><td class="value" valign="middle"><?php echo $department ?></td>
					</tr>
				<?php } ?>

				<?php if($cats_to_display) {
					foreach($cats_to_display as $top => $cat) { ?>
						<tr valign="middle" class="staff-cat <?=$top?>">
							<td class="prefix" valign="middle"><?=$top?>: </td><td class="value" valign="middle"><?=$cat[0]->name?></td>
						</tr>
				<?php	}
				}?>
			</table>
			
			<!-- Only show Mailing Address and Contact Info in single view -->
			<?php if ( is_single() || $is_single_post): ?>
				
				<?php if ( ($show_phone && $my_phone) || ($show_email && $my_email) || ($show_website && $my_website) ): ?>
				<div class="staff-member-contacts">
					<h3>Contact Info</h3>
					<table class="staff-contact-info">
						<?php if ( $show_address ): ?>
							<?php if ($my_address): ?>
								<tr class="staff-member-address" valign="middle">
									<td class="prefix" valign="middle">Address:</td>
									<td class="value" valign="middle"><?php echo $my_address ?></td>
								</tr>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ( $show_phone ): ?><tr valign="middle" class="staff-member-phone"><td class="prefix" valign="middle">Phone:</td> <td class="value" valign="middle"><?php echo $my_phone ?></td></tr><?php endif; ?>
						<?php if ( $show_email): ?><tr valign="middle" class="staff-member-email"><td class="prefix" valign="middle">Email:</td> <td class="value" valign="middle"><a href="<?php echo obfuscate_email_url($my_email, array('rel' => 1)); ?>"><?php echo getObfuscatedEmailAddress($my_email); ?></a></td></tr><?php endif; ?>
						<?php if ( $show_website && $my_website ): ?><tr valign="middle" class="staff-member-website"><td class="prefix" valign="middle">Website:</td> <td class="value" valign="middle"><a href="<?php echo $my_website ?>"><?php echo $my_website ?></a></td></tr><?php endif; ?>
					</table>
				</div>
				<?php endif; ?>		

			<?php endif; ?>
	</div>
	<?php if ( $show_bio || is_single() ): ?>
			<div class="staff-member-bio">
				<?php if($content) {
					echo "<h3>Bio</h3>";
					echo $content; 
				} else {
					if($staff_data['content']) {
						echo "<h3>Bio</h3>";
					}
					echo $staff_data['content'];
				}?>
			</div>		
			<br />
		<?php endif; ?>
	</div>
</div>