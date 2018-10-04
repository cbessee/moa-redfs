<?php 
/*
 * Vorosa Global Function
 * Author: Grand-Themes
 * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 */

 //Blog Header
	function vorosa_blog_header(){ 
		$vorosa_opt = vorosa_get_opt();
		if (isset( $vorosa_opt['vorosa_blog_text'] )){
			echo esc_html($vorosa_opt['vorosa_blog_text']);
		}
		else{
			esc_html_e('Blog', 'vorosa');
		}
	}

 /*
 * =======================================================
 *    Register Post Excerpt Function   
 * =======================================================
 */

	function vorosa_post_excerpt(){
		$vorosa_opt = vorosa_get_opt();
		if(isset ($vorosa_opt['vorosa_excerpt_length'])){
			echo wp_trim_words(get_the_excerpt(),$vorosa_opt['vorosa_excerpt_length'],'');
		}else{
			echo wp_trim_words(get_the_excerpt(),29,'');
		}
	}

  /*=====Register blog read more Function====*/
	function vorosa_read_more(){
		$vorosa_opt = vorosa_get_opt();
		if(isset($vorosa_opt['vorosa_readmore_text'])){ echo esc_html($vorosa_opt['vorosa_readmore_text']); } else { esc_html_e('Read more', 'vorosa');}	
	}


	/*=====footer area ====*/
	function vorosa_footer_area(){
		$vorosa_opt = vorosa_get_opt();

		if( isset($vorosa_opt['vorosa_footer_widget']) ? $vorosa_opt['vorosa_footer_widget'] : '' == true || isset($vorosa_opt['vorosa_footer_widget']) ? $vorosa_opt['vorosa_footer_widget'] : '' == '' ):

		?>
		<div class="footer-top-area">
			<div class="<?php if( isset($vorosa_opt['vorosa_footer_widget_width']) ? $vorosa_opt['vorosa_footer_widget_width'] : '' == true ){ echo esc_attr('container-fluid');}else{ echo esc_attr( 'container' );} ?>">
				<div class="row">
					<?php 
						 $footer_widget_column = isset($vorosa_opt['vorosa_footer_layoutcolumns']) ? $vorosa_opt['vorosa_footer_layoutcolumns'] : '';
						if( $footer_widget_column ){
							$footer_widget_column = $footer_widget_column;
						}else{
							$footer_widget_column = 4;
						}
						$footer_sidebar_count= $footer_widget_column;  
						if( 0 != $footer_sidebar_count ) {  
						if( '' == $footer_sidebar_count ) $footer_sidebar_count = $footer_widget_column;
						$footer_sidebar_class = floor( 12/$footer_sidebar_count ); 
						for( $footer = 1; $footer <= $footer_sidebar_count; $footer++ ) { 
						 if ( is_active_sidebar('vorosa-footer-' . $footer) ) : ?>	
					<div class="col-sm-6 col-md-<?php echo esc_attr( $footer_sidebar_class ); ?>  col-xs-12 ">
						<?php dynamic_sidebar('vorosa-footer-' . $footer); ?>
					</div>
						<?php endif; } } ?>
				</div>
			</div>
		</div>
		<?php
		endif;
	}

	/*====footer copyright text area====*/
	function vorosa_copyright_text(){

		$vorosa_opt = vorosa_get_opt();

		if( isset($vorosa_opt['vorosa_footer_bottom_show']) ? $vorosa_opt['vorosa_footer_bottom_show'] : '' == true || isset($vorosa_opt['vorosa_footer_bottom_show']) ? $vorosa_opt['vorosa_footer_bottom_show'] : '' == '' ){

		?>

		<div class="footer-bottom">
			<div class="<?php if( isset($vorosa_opt['vorosa_footer_copyright_width']) ? $vorosa_opt['vorosa_footer_copyright_width'] : '' == true ){ echo esc_attr('container-fluid');}else{ echo esc_attr( 'container' );} ?>">
				<div class="copyright">
					<div class="row">
						<?php if( isset($vorosa_opt['vorosa_copyright_style']) ? $vorosa_opt['vorosa_copyright_style'] : '' == '1' ){ ?>
							<?php 				
								$layout = $vorosa_opt['vorosa_footer']['enabled'];
								if ($layout): foreach( $layout as $key=>$value ) {
								switch($key) {
									case 'copyright': get_template_part( 'inc/footer/copyright' ); 
									break;	
									case 'socialicon': get_template_part( 'inc/footer/social','icon' );
									break;
									case 'copyrightmenu': get_template_part( 'inc/footer/copyright','menu' );
									break;		 
								}
							}
							endif;	
							?>
							<?php
						} elseif( isset($vorosa_opt['vorosa_copyright_style']) ? $vorosa_opt['vorosa_copyright_style'] : '' == '2' ){
							?>
					<div class="col-md-12 text-center">
		                <div class="footer-all">
		                	<?php if( $vorosa_opt['vorosa_copyright2_logo']['url'] ): ?>
		                    <div class="footer-logo logo">
		                        <a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( $vorosa_opt['vorosa_copyright2_logo']['url'] ); ?>" alt="<?php echo esc_attr('Footer Logo'); ?>"></a>
		                    </div>

		                <?php endif; ?>
		                    <div class="footer-icon">
		                        <p><?php 
		                        		if(isset( $vorosa_opt['vorosa_copyright_copany_info'] ) && $vorosa_opt['vorosa_copyright_copany_info']!=='' ){
										echo wp_kses( $vorosa_opt['vorosa_copyright_copany_info'] , array(
											'a'       => array(
												'href'    => array(),
												'title'   => array()
											),
											'br'      => array(),
											'em'      => array(),
											'strong'  => array(),
											'img'     => array(
												'src' => array(),
												'alt' => array()
											),
										));
									}
		                        ?></p>

		                        <?php if( $vorosa_opt['vorosa_copyright_social_icon_show']== true): ?>
		                        <ul>
		                         	<?php 
		                         		foreach($vorosa_opt['vorosa_social_icons'] as $key=>$value ) { 
											 if($value!=''){
												if($key=='vimeo'){
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
												} else {
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
												}
											   }
											} 
		                            ?>
		                        </ul>
		                    <?php endif; ?>
		                    </div>
		                    <div class="footer-text">
		                         <p><?php 
		                        		if( isset( $vorosa_opt['vorosa_copyright_info_two'] ) && $vorosa_opt['vorosa_copyright_info_two']!=='' ){
										echo wp_kses( $vorosa_opt['vorosa_copyright_info_two'] , array(
											'a'       => array(
												'href'    => array(),
												'title'   => array()
											),
											'br'      => array(),
											'em'      => array(),
											'strong'  => array(),
											'img'     => array(
												'src' => array(),
												'alt' => array()
											),
										));
									}
		                        ?></p>
		                    </div>
		                </div>
           			</div>
						<?php
						}else{

							?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
								<div class="copyright-text">
									<p><?php 
										esc_html_e('Copyright', 'vorosa'); ?> &copy; <?php echo date("Y").' '.get_bloginfo('name');  esc_html_e(' All Rights Reserved.', 'vorosa' ); 
									?></p>
								</div>
							</div>
						<?php
								}
							} 
						?>
					</div>
				</div>
			</div>
		</div>
	<?php 

		}

/**
 * Get all registered sidebars.
 *
 * @return  array
 */
function vorosa_get_sidebars() {
	global $wp_registered_sidebars;

	// Prepare output.
	$output = array();

	$output[] = esc_html__( 'Select a sidebar', 'vorosa' );

	if ( ! empty( $wp_registered_sidebars ) ) {
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$output[ $sidebar['id'] ] = $sidebar['name'];
		}
	}
	return $output;
}