<?php 
/*
 * Video Popup ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */

add_action('init', 'vorosa_video_popup'); // Call kc_add_map function ///
if(!function_exists('vorosa_video_popup')):
	function vorosa_video_popup(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_video_popup'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('Video Popup',  'vorosa'),
		            'description' => esc_html__('Description Here',  'vorosa'),
		            'icon'        => 'fa-file-video-o',
		            'category'    => 'vorosa',
		            'params'      => array(
			         	'General' => array(
			         		array(
								'name'        => 'video_popup_random_key',
								'type'        => 'random',
							),
							array(
								'type' 			=> 'select',
								'name' 			=> 'source',
								'label' 		=> esc_html__( 'Source', 'vorosa' ),
								'description' 	=> esc_html__(' Choose source of video', 'vorosa'),
								'options' 		=> array(
									'upload' => esc_html__(' From media library', 'vorosa'),
									'youtube' => esc_html__(' From youtube or vimeo', 'vorosa'),
								),
								'value'		=> 'youtube'
							),
							array(
								'type'			=> 'attach_media',
								'label'			=> esc_html__( 'Video upload', 'vorosa' ),
								'name'			=> 'video_upload',
								'description'	=> esc_html__( 'Select video from media library', 'vorosa' ),
								'admin_label'	=> true,
								'relation'		=> array(
									'parent'	=> 'source',
									'show_when' => 'upload'
								)
							),
							array(
								'type'			=> 'text',
								'label'			=> esc_html__( 'Video link', 'vorosa' ),
								'name'			=> 'video_link',
								'description'	=> esc_html__( 'Enter the Youtube or Vimeo URL. For example: https://www.youtube.com/watch?v=iNJdPyoqt8U', 'vorosa' ),
								'admin_label'	=> true,
								'value'			=> 'https://www.youtube.com/watch?v=7e90gBu4pas',
								'relation'		=> array(
									'parent'	=> 'source',
									'show_when' => 'youtube'
								)
							),

							array(
								'name' 	=> 'video_box_bg',
								'label' => esc_html__( 'Upload Thumbnail', 'vorosa' ),
								'type' 	=> 'attach_image', 
								'value'	=> plugins_url( 'images/1.jpg', __FILE__ ),
								
							),
							array(
								'type'					=> 'select',
								'label'					=> esc_html__( 'Image Size', 'vorosa' ),
								'name'					=> 'img_size',
								'options'				=> array(
									'full'				=> 'Full',
									'thumbnail'			=> 'Thumbnail',
									'medium'			=> 'Medium',
									'large'				=> 'Large'
								),

							),

							array(
								'name' 	=> 'video_box_icon',
								'label' => esc_html__( 'Upload Thumbnail', 'vorosa' ),
								'type' 	=> 'attach_image', 
								'value'	=> plugins_url( 'images/2.png', __FILE__ ),
								
							),
							array(
								'type'					=> 'select',
								'label'					=> esc_html__( 'Icon Size', 'vorosa' ),
								'name'					=> 'icon_size',
								'options'				=> array(
									'full'				=> 'Full',
									'thumbnail'			=> 'Thumbnail',
									'medium'			=> 'Medium',
									'large'				=> 'Large'
								),

							),
							
							
							
							
							
							
			                array(
			                    'name'        => 'custom_css_class',
			                    'label'       => esc_html__('CSS Class', 'vorosa'),
			                    'description' => esc_html__('Custom css class for css customisation', 'vorosa'),
			                    'type'        => 'text'
			                ),
			         	), // content
	                    'styling' => array(
	                    	array(
	                    		'name'   => 'custom_css',
	                    		'type'   => 'css',
	                    		'options' => array(
	                    			array(
	                    				'screens' => 'any,1024,999,767,479',
	                    				
	                    				'Play Button' => array(
	                    					array( 
	                    						'property' => 'font-size', 
	                    						'label'    => esc_html__('Font size', 'vorosa'),
	                    						'selector' => '+ .about-image a::before'
	                    					),
	                    					array( 
	                    						'property' => 'color', 
	                    						'label'    => esc_html__('Color', 'vorosa'),
	                    						'selector' => '+ .about-image a::before'
	                    					),
	                    					array( 
	                    						'property' => 'color', 
	                    						'label'    => esc_html__('Hover Color', 'vorosa'),
	                    						'selector' => '+ .about-image a:hover::before'
	                    					),
	                    				),
	                    				'Box' => array(
	                    					array( 
	                    						'property' => 'background', 
	                    						'label'    => esc_html__('Background', 'vorosa'),
	                    						'selector' => '+ .about-image',
	                    					),
	                    					array( 
	                    						'property' => 'height', 
	                    						'label'    => esc_html__('Height', 'vorosa'),
	                    						'selector' => '+ .about-image'
	                    					),
	                    					array( 
	                    						'property' => 'padding', 
	                    						'label'    => esc_html__('padding', 'vorosa'),
	                    						'selector' => '+ .about-image'
	                    					),
	                    					array( 
	                    						'property' => 'margin', 
	                    						'label'    => esc_html__('Margin', 'vorosa'),
	                    						'selector' => '+ .about-image'
	                    					),
	                    				),

	                    			)
	                    		) //End of options
	                    	)
	                    ), //End of styling
                        'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						), //End of animate
		            )// Params
		        )// end shortcode key
		    )// first array
		); // End add map
		endif;
	}
endif;


 /*
 * =======================================================
 *    Register Shortcode   
 * =======================================================
 */


 if(!function_exists('vorosa_video_popup_shortcode')){
	function vorosa_video_popup_shortcode($atts,$content){
	ob_start();

		extract( $atts );

		$wrap_class  = apply_filters( 'kc-el-class', $atts );
		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );




		$video_link_var = '';
		if ( 'upload' == $source ) {
			$video_link_var = $video_upload;
		} else {
			$video_link_var = $video_link;
		}
		


	?>
	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">
        
		<div class="video-img">
		<?php if (!empty($video_link_var)) { ?>
			<?php echo wp_get_attachment_image($video_box_bg, $img_size); ?>
			<a class="popup-youtube video-popup" href="<?php echo $video_link_var ?>">
				<?php echo wp_get_attachment_image($video_box_icon, $icon_size); ?>
			</a>
			<?php } ?>
		</div>
	</div>
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_video_popup' ,'vorosa_video_popup_shortcode');
}