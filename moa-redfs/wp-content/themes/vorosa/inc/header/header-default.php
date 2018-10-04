<?php 
	/*
	* vorosa Main menu
	* Author: Grand-Themes
	* Author URI: http://wphash.com/
	* Version: 1.0.0
	 * ======================================================
	 */

$vorosa_opt = vorosa_get_opt();

$header_widht = isset($vorosa_opt['vorosa_header_full_width']) ? $vorosa_opt['vorosa_header_full_width'] : '';
if( isset( $header_widht ) && true == $header_widht ){
	$header_widht = 'container-fluid';
}else {
	$header_widht = 'container';
}

$vorosa_header_sticky_class = "";
$vorosa_header_sticky = isset($vorosa_opt['vorosa_header_sticky']) ? $vorosa_opt['vorosa_header_sticky'] : '';
if ( isset( $vorosa_header_sticky ) && true == $vorosa_header_sticky ) {
	$vorosa_header_sticky_class = "header-sticky";
}

?>
<div class="header-area header-six <?php echo esc_attr( $vorosa_header_sticky_class ); ?>">
	<div class="<?php echo esc_attr( $header_widht ); ?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<?php 
					$vorosa_logo_position = isset($vorosa_opt['vorosa_logo_position']) ? $vorosa_opt['vorosa_logo_position'] : '';
					$vorosa_logo_position_value = '';
					if (isset( $vorosa_logo_position )) {
						$vorosa_logo_position_value = $vorosa_logo_position;
					}
				?>

				<div class="header-menu-wrap header-bottom transparent-bar logo-<?php echo esc_attr( $vorosa_logo_position_value ); ?> ">
					<div class="site-title">
						<?php 
							if(isset($vorosa_opt['vorosa_head_logo']['url']) ? $vorosa_opt['vorosa_head_logo']['url'] : '' ) {
						?>
							<a href="<?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name','vorosa')); ?>" rel="home" >
							<?php if ( $vorosa_opt['vorosa_main_logo']=='1'){ ?>
							<img src="<?php  echo esc_url( $vorosa_opt['vorosa_head_logo']['url']); ?>" alt="<?php  echo esc_attr(get_bloginfo('name')); ?>">
								<?php } else{
									 if( $vorosa_opt['vorosa_main_logo']=='2' ){echo esc_html( $vorosa_opt['vorosa_logo_text'] );} 
									}?>
							</a>
						<?php
							}else{
								$logo_text = isset($vorosa_opt['vorosa_logo_text']) ? $vorosa_opt['vorosa_logo_text'] : '';
								?> 
								<h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if($logo_text){ echo esc_attr( $logo_text );} else{ bloginfo( 'name' );

									} ?></a></h3>
								<?php 
									$description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html($description ); /* WPCS: xss ok. */ ?></p>
								<?php
									endif;
							}
						?>
					</div>
					<div class="menu-and-search-area">
						<div class="search-menu f-right hidden-xs">
							<div class="search-bar-button">
								<span><i class="fa fa-search"></i></span>
								<div class="widget_searchform_content">
									<form id="header_search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
										<input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search Here', 'placeholder', 'vorosa' ); ?>" />
										<button class="submit">
											<i class="fa fa-search"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
						<div class="main-menu f-right nav-horizontal uppercase nav-effect-1">
							<nav>
								<?php
									wp_nav_menu(array(
										'theme_location' => 'primary',
										'container'      => false,
										'fallback_cb'    => 'vorosa_fallback'
									));
								?>
							</nav>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- Mobile Menu  -->
		<div class="mobile-menu"></div>

	</div>
</div>