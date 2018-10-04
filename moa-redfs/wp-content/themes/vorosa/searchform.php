<?php 
/**
* The template for displaying Search form.
*
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package vorosa
*/
?>
<div class="blog-search">
	<form id="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
		<input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search Here', 'placeholder', 'vorosa' ); ?>" />
		<button type="submit"><i class="fa fa-search"></i></button>
	</form>
</div>