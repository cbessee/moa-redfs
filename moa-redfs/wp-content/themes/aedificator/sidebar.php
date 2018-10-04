<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Aedificator
 */
?>
<div class="sidebar-block">
	<?php if ( is_active_sidebar('blog-sidebar') ) : ?>
		<?php dynamic_sidebar('blog-sidebar'); ?>
	<?php else : ?>	
		<aside class="widget">
			<h3 class="widget-title"><?php _e( 'Recent Posts', "aedificator" ); ?></h3>
			<ul><?php wp_get_archives('type=postbypost&limit=10'); ?></ul>
		</aside>
		<aside class="widget">
			<h3 class="widget-title"><?php _e( 'Pages', "aedificator" ); ?></h3>
			<ul><?php wp_list_pages('title_li='); ?></ul>
		</aside>
		<aside class="widget">
			<h3 class="widget-title"><?php _e( 'Tag Cloud', "aedificator" ); ?></h3>
			<div class="tagcloud"><?php wp_tag_cloud(); ?></div>
		</aside>
		<aside class="widget">
			<h3 class="widget-title"><?php _e( 'Categories', "aedificator" ); ?></h3>
			<ul><?php wp_list_categories('title_li='); ?></ul>
		</aside>		
	<?php endif; ?>
</div>