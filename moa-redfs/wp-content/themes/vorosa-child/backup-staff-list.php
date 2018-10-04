<div id="<?php echo $options['id']; ?>" class="<?php echo $options['class']; ?>">
	<?php if($staff_loop->have_posts()): while($staff_loop->have_posts()): $staff_loop->the_post(); ?>
		<?php
			extract ( cd_get_staff_metadata(get_the_ID(), $options) );
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
			<div class="staff-member">		
				<?php if ( $show_photo && has_post_thumbnail() ): ?>
					<div class="staff-photo">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
					</div>
				<?php endif; ?>
				
				<div class="staff-member-right">
					<?php if ($show_name): ?>
					<h3 class="staff-member-name">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<?php endif; ?>				

					<?php if ($show_title): ?>
						<p class="staff-member-title"><?php echo $my_title ?></p>
						<p class="staff-member-title"><?php echo $department ?></p>
					<?php endif; ?>

					<?php if ($show_bio): ?>
						<div class="staff-member-bio" style="margin-bottom: 2rem;" ><?php echo get_the_content(get_the_ID()); ?></div>
					<?php endif; ?>		

					<?php if($cats_to_display) {
						foreach($cats_to_display as $top => $cat) { ?>
							<div class="staff-cat"><strong class="cat-label"><?=$top?>: </strong><?=$cat[0]->name?></div>
					<?php	}
					}?>		

					<?php if ($show_address && $my_address): ?>
					<div class="staff-member-address">
						<h4>Mailing Address</h4>
						<p class="addr">
							<?php echo nl2br($my_address); ?>
						</p>
					</div>
					<?php endif; ?>

					<?php if ( ($show_phone && $my_phone) || ($show_email && $my_email) || ($show_website && $my_website) ): ?>
					<div class="staff-member-contacts">
						<h4>Contact</h4>
						<?php if ($show_phone && $my_phone): ?><p class="staff-member-phone"><strong>Phone:</strong> <?php echo $my_phone ?></p><?php endif; ?>
						<?php if ($show_email && $my_email): ?><p class="staff-member-email"><strong>Email:</strong> <a href="mailto:<?php echo $my_email ?>"><?php echo $my_email ?></a></p><?php endif; ?>
						<?php if ($show_website && $my_website): ?><p class="staff-member-website"><strong>Website:</strong> <a href="<?php echo $my_website ?>"><?php echo $my_website ?></a></p><?php endif; ?>
					</div>
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