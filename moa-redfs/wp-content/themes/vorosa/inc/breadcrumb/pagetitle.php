<?php

	$vorosa_opt = vorosa_get_opt();

	$vorosa_id = get_the_ID();
	$vorosa_banner_img = get_post_meta($vorosa_id,'_vorosa_banner_img',true);
	$vorosa_banner_background = get_post_meta($vorosa_id,'_vorosa_banner_color',true);

	$breadcrumb_bg_styles = '';


	if (isset($vorosa_opt['vorosa_breadcrumbs_bg_optins']) && $vorosa_opt['vorosa_breadcrumbs_bg_optins']) {
		$vorosa_banner_bg_options = $vorosa_opt['vorosa_breadcrumbs_bg_optins'];

		if($vorosa_banner_bg_options['background-color']){
			$breadcrumb_bg_styles .= "background-color:{$vorosa_banner_bg_options['background-color']};";
		}

		if($vorosa_banner_bg_options['background-repeat']){
			$breadcrumb_bg_styles .= "background-repeat:{$vorosa_banner_bg_options['background-repeat']};";
		}

		if($vorosa_banner_bg_options['background-size']){
			$breadcrumb_bg_styles .= "background-size:{$vorosa_banner_bg_options['background-size']};";
		}

		if($vorosa_banner_bg_options['background-attachment']){
			$breadcrumb_bg_styles .= "background-attachment:{$vorosa_banner_bg_options['background-attachment']};";
		}

		if($vorosa_banner_bg_options['background-position']){
			$breadcrumb_bg_styles .= "background-position:{$vorosa_banner_bg_options['background-position']};";
		}

		if($vorosa_banner_bg_options['background-image']){
			$breadcrumb_bg_styles .= "background-image: url('{$vorosa_banner_bg_options['background-image']}');";
		}
	}


	// from metabox
	if($vorosa_banner_img){
		$breadcrumb_bg_styles .= "background-image: url('{$vorosa_banner_img}');";
	}
	if($vorosa_banner_background){
		$breadcrumb_bg_styles .= "background-color:{$vorosa_banner_background};";
	}

?>


<?php

  //show bar and content

  if( '1' == isset($vorosa_opt['vorosa_page_title_bar'] ) ? $vorosa_opt['vorosa_page_title_bar'] : ''){ ?>

	 <!-- breadcrumbs start -->

	<section class="breadcrumbs-area breadcrumbs-bg" style="<?php echo esc_attr($breadcrumb_bg_styles); ?>">

		<div class="<?php if( $vorosa_opt['vorosa_breadcrumbs_full'] == true ){ echo 'container-fluid'; }else{ echo 'container'; }?>">

			<div class="row">

				<div class="col-md-12">

				<?php 

					$breadcrumbs_title_position_cmb = get_post_meta($vorosa_id,'_vorosa__breadcrumbs_position',true);

					$breadcrumbs_title_position_redux = $vorosa_opt['vorosa_breadcrumbs_text'];

					if(!empty( $breadcrumbs_title_position_cmb )){

							$breadcrumbs_title_position = $breadcrumbs_title_position_cmb;

					}else{

						if( isset( $breadcrumbs_title_position_redux ) ){

						   $breadcrumbs_title_position = $breadcrumbs_title_position_redux;

						}			

					} 

				?>

					<div class="breadcrumbs breadcrumbs-title-<?php echo esc_attr( $breadcrumbs_title_position ); ?>">

						<?php 

						if( $vorosa_opt['vorosa_breadcrumbs_area']==true ): ?>

						<!---breadcrumbs title start-->

						<h2 class="page-title"><?php wp_title(''); ?></h2>

						<!---breadcrumbs title end -->

						<?php endif; ?>

						<div class="page-title-bar">

							<?php 

								if( $vorosa_opt['vorosa_breadcrumbs_content_blog'] == '2' ){

								//breadcrumbs function

									vorosa__breadcrumbs();

								}elseif($vorosa_opt['vorosa_breadcrumbs_content_blog'] == '3'){

									?>

									<!---breadcrumbs serch start-->

									<div class="page-title-search-box">

										<form action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">

											<input type="text" placeholder="<?php echo esc_attr('Search', 'vorosa'); ?>" name="s">

											<button type="submit"> <i class="fa fa-search"></i> </button>

										</form>

									</div>

									<!---breadcrumbs serch end-->		

									<?php

								} else{

								}

							?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>

	<!-- breadcrumbs end -->

	<?php

	//show content only

 }elseif( '2' == isset($vorosa_opt['vorosa_page_title_bar']) ? $vorosa_opt['vorosa_page_title_bar'] : '') {

 }else { ?>

	<div class="breadcrumbs-area breadcrumbs-bg breadcrumbs-area-default">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div class="breadcrumbs breadcrumbs-title-left">

						<h2 class="page-title"><?php wp_title(''); ?></h2>

						<div class="page-title-bar">

							<?php vorosa__breadcrumbs(); ?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div> 

<?php }