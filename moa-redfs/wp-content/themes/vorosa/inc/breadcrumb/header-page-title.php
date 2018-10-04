<?php

/**
 * This partial is used for displaying the Site Header when in archive pages
 *
 * @package vorosa
 * @since vorosa 1.0.0
 */

$vorosa_opt = vorosa_get_opt();

$vorosa_page_titlebar = get_post_meta( get_the_id(),'_vorosa_page_titlebar_enable',true);

	if ( is_home() ) : 

		if( isset($vorosa_opt['vorosa_bolg_title_bar']) ? $vorosa_opt['vorosa_bolg_title_bar'] : '' == true || isset($vorosa_opt['vorosa_bolg_title_bar']) ? $vorosa_opt['vorosa_bolg_title_bar'] : '' == ''):


			$breadcrumb_blbg_styles = '';
			if (isset($vorosa_opt['vorosa_blog_banner']) && $vorosa_opt['vorosa_blog_banner']) {
				$vorosa_banner_blbg_options = $vorosa_opt['vorosa_blog_banner'];

				if($vorosa_banner_blbg_options['background-color']){
					$breadcrumb_blbg_styles .= "background-color:{$vorosa_banner_blbg_options['background-color']};";
				}

				if($vorosa_banner_blbg_options['background-repeat']){
					$breadcrumb_blbg_styles .= "background-repeat:{$vorosa_banner_blbg_options['background-repeat']};";
				}

				if($vorosa_banner_blbg_options['background-size']){
					$breadcrumb_blbg_styles .= "background-size:{$vorosa_banner_blbg_options['background-size']};";
				}

				if($vorosa_banner_blbg_options['background-attachment']){
					$breadcrumb_blbg_styles .= "background-attachment:{$vorosa_banner_blbg_options['background-attachment']};";
				}

				if($vorosa_banner_blbg_options['background-position']){
					$breadcrumb_blbg_styles .= "background-position:{$vorosa_banner_blbg_options['background-position']};";
				}

				if($vorosa_banner_blbg_options['background-image']){
					$breadcrumb_blbg_styles .= "background-image: url('{$vorosa_banner_blbg_options['background-image']}');";
				}
			}

?>

<section class="breadcrumbs-area bredcrumb-blog" style="<?php echo esc_attr($breadcrumb_blbg_styles);?>">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<div class="breadcrumb-text">

					<h1><?php vorosa_blog_header(); ?></h1>

					<?php 

						if( !empty($vorosa_opt['vorosa_bolg_subtitle']) ):

					?>

					<h3><?php echo  esc_html( $vorosa_opt['vorosa_bolg_subtitle'] ); ?></h3>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

</section>

<?php

	endif;

	elseif(!is_front_page() && is_page() )  : 

		if( $vorosa_page_titlebar == 'yes' || $vorosa_page_titlebar == '' ):

	 	get_template_part('/inc/breadcrumb/pagetitle');

	endif;

	//archive page

 	elseif( is_archive() ) : 

		get_template_part('/inc/breadcrumb/pagetitle');

	

 	elseif(is_single()) : 

		if( $vorosa_page_titlebar == 'yes' || $vorosa_page_titlebar == '' ): 

			get_template_part('/inc/breadcrumb/pagetitle');

		endif;

	//404 page --->

 	elseif(is_404()) : 

		get_template_part('/inc/breadcrumb/pagetitle');

	//search page--->

 	elseif(is_search()) : 

		get_template_part('/inc/breadcrumb/pagetitle');

 	else : 

 endif;