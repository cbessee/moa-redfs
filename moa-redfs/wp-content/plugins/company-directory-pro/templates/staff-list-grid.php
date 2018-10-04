<div id="<?php echo $options['id']; ?>" class="<?php echo $options['class']; ?>">
	<?php if($staff_loop->have_posts()): while($staff_loop->have_posts()): $staff_loop->the_post(); ?>
		<?php
			extract ( cd_get_staff_metadata(get_the_ID(), $options) );
		?>	
		<div class="staff-member">		
			<div class="staff-member-wrap">
				<?php if ( $show_photo && has_post_thumbnail() ): ?>
					<div class="staff-photo"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
				<?php else: ?>
					<div class="staff-photo-placeholder"></div>
				<?php endif; ?>
				
				<?php if ( empty($options['grid_text_position']) || $options['grid_text_position'] == 'overlay' ): ?>
				<div class="staff-member-overlay">
					<div class="staff-member-overlay-inner">
						<?php if ( $show_name ): ?>
						<h3 class="staff-member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php endif; ?>					
						<?php if ( $show_title && !empty($my_title) ): ?>
						<p class="staff-member-title"><?php echo $my_title ?></p>
						<?php endif; ?>
					</div>
					<a href="<?php echo the_permalink(); ?>" class="overlay_link"></a>
				</div>
				<?php elseif ($options['grid_text_position'] == 'below_photo'): ?>
				<div class="staff-member-text">
					<?php if ( $show_name ): ?>
					<h3 class="staff-member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php endif; ?>					
					<?php if ( $show_title && !empty($my_title) ): ?>
					<p class="staff-member-title"><?php echo $my_title ?></p>
					<?php endif; ?>
					<a href="<?php echo the_permalink(); ?>" class="overlay_link"></a>
				</div>
				<?php endif;?>
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