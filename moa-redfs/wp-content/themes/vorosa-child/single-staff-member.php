<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vorosa
 */

get_header(); 
	$vorosa_opt = vorosa_get_opt();
	$vorosa_blog_single = '';
	$vorosa_blog_single = isset($vorosa_opt ['vorosa_single_pos']) ? $vorosa_opt ['vorosa_single_pos'] : '';
	$post_layout_value = get_post_meta(get_the_id(),'_vorosa_post_layout',true);
	if( !empty( $post_layout_value ) ){
		$post_details_layout = $post_layout_value ;
	}else{
		$post_details_layout = $vorosa_blog_single;
	}
	
?>
	<div class="blog-story-area pt-80">
		<div class="staff-container">
			<div class="row">
				<!-- single blog full width start -->
				<div class="col-sm-12 col-lg-10 col-lg-offset-1">
					<a class="back-button" href="/yellow-pages/"><< Back to Yellow Pages</a>
          <?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();