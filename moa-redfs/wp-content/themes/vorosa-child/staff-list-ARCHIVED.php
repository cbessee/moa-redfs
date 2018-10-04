<div id="<?php echo $options['id']; ?>" class="<?php echo $options['class']; ?>">
	<?php if($staff_loop->have_posts()): while($staff_loop->have_posts()): $staff_loop->the_post(); ?>
		<?php
			$staff_data = cd_get_staff_metadata(get_the_ID(), $options);
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
		<div class="blog-info story-hbtitle hentry">
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
								<?php if ( $show_email): ?><tr valign="middle" class="staff-member-email"><td class="prefix" valign="middle">Email:</td> <td class="value" valign="middle"><a href="mailto:<?php echo $my_email ?>"><?php echo $my_email ?></a></td></tr><?php endif; ?>
								<?php if ( $show_website && $my_website ): ?><tr valign="middle" class="staff-member-website"><td class="prefix" valign="middle">Website:</td> <td class="value" valign="middle"><a href="<?php echo $my_website ?>"><?php echo $my_website ?></a></td></tr><?php endif; ?>
							</table>
						</div>
						<?php endif; ?>		

					<?php endif; ?>
			</div>
		</div>
					</div>
	<?php endwhile; ?>	

	<?php if ( !empty($staff_loop->query_vars['paged']) ): ?>
	<div class="staff-directory-pagination">                               
		<?php
		echo paginate_links( array(
			'base' => $pagination_link_template,
			'format' => '?staff_page=%#%',
			'current' => max( 1, $current_page ),
			'total' => $staff_loop->max_num_pages
		) );
		?>
	</div>  
	<?php endif; // pagination ?>

	<?php endif; // have_posts() ?>
	
	<?php wp_reset_query(); ?>
</div>