<?php
/**
 * The Serach Form for our theme.
 *
 *
 * @package Aedificator
 */
?>
<form role="search" method="post" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search', 'aedificator' ); ?>">
		<input type="submit" id="searchsubmit" value="">
	</div>
</form>