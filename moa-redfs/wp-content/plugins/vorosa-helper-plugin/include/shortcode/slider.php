<?php
/*
 * Eduhome Slider ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 */
/**
 * =======================================================
 * KC Shortcode Map
 * =======================================================
 */

add_action('init', 'vorosa_slider_sections'); // Call kc_add_map function ///
if(!function_exists('vorosa_slider_sections')):
	function vorosa_slider_sections(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_main_slider'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('Slider', 'vorosa'),
		            'description' => esc_html__('Main Slider', 'vorosa'),
		            'icon'        => 'fa-header',
		            'category'    => 'vorosa',
		            'params'      => array(
		        // .............................................
		        // ..... // Content TAB
		        // .............................................
		         	'General' => array(
					
						array(
							'type'			=> 'group',
							'label'			=> __(' Icons', 'vorosa'),
							'name'			=> 'main_slider_single',
							'description'	=> __( 'Main Slider Single Field', 'vorosa' ),
							'options'		=> array('add_text' => __(' Add new Field ', 'vorosa')),
						
								'params' => array(
									array(
										'type'			=> 'attach_image',
										'label'			=> esc_html__( 'Slide Image BG', 'vorosa' ),
										'name'			=> 'slide_img',
										'description'	=> esc_html__( 'Show the Image in the Main Slider BG', 'vorosa' )
									),
									
									array(
										'type' => 'text',
										'label' => __( 'Slide Title First', 'vorosa' ),
										'name' => 'slider_title',
										'description' => __( 'Slider Text First', 'vorosa' ),
										'admin_label' => true,
									),
									array(
										'type' => 'text',
										'label' => __( 'Slide Title First Span', 'vorosa' ),
										'name' => 'slider_title_span',
										'description' => __( 'Slider Text First', 'vorosa' ),
										'admin_label' => true,
									),
									
									array(
										'type' => 'text',
										'label' => __( 'Slide Title Second', 'vorosa' ),
										'name' => 'slider_title_2',
										'description' => __( 'Slider Text Second', 'vorosa' ),
										'admin_label' => true,
									),
									array(
										'type' => 'text',
										'label' => __( 'Slide Title Second Span One', 'vorosa' ),
										'name' => 'slider_title_2_span1',
										'description' => __( 'Slider Text Second', 'vorosa' ),
										'admin_label' => true,
									),									array(										'type' => 'text',										'label' => __( 'Slide Two Title Medium', 'vorosa' ),										'name' => 'slider_title_medium',										'description' => __( 'Title Medium', 'vorosa' ),										'admin_label' => true,									),
									array(
										'type' => 'text',
										'label' => __( 'Slide Title Second Span Two', 'vorosa' ),
										'name' => 'slider_title_2_span2',
										'description' => __( 'Slider Text Second', 'vorosa' ),
										'admin_label' => true,
									),							
									
									array(
										'type' => 'text',
										'label' => __( 'Description Text', 'vorosa' ),
										'name' => 'des_text',
										'description' => __( 'Slider Description Text', 'vorosa' ),
										'admin_label' => true,
									),
									
									array(
										'name' => 'slider_btn_show_hide',
										'label' => __(' Slider Btn Show Hide', 'vorosa'),
										'type' => 'toggle',
										'value' => 'yes',
										'options' => array(
											'yes' => __('Show', 'vorosa'),
											'no' => __('Hide', 'vorosa')
										),
									),
									
									
									array(
										'type' => 'text',
										'label' => __( 'Button Text', 'vorosa' ),
										'name' => 'button_text',
										'description' => __( 'Slider Btn Text', 'vorosa' ),
										'admin_label' => true,
										'relation' => array(
											'parent' => 'slider_btn_show_hide',
											'show_when' =>'yes',
										),
									),
									
									array(
										'type' => 'link',
										'label' => __( 'Button Link', 'vorosa' ),
										'name' => 'button_link',
										'description' => __( 'Slider Btn Link', 'vorosa' ),
										'admin_label' => true,
										'relation' => array(
											'parent' => 'slider_btn_show_hide',
											'show_when' =>'yes',
										),
									),							
							
									
								)
							),
							array(
										'name'        => 'custom_css_class',
										'label'       => esc_html__('CSS Class','vorosa'),
										'description' => esc_html__('Custom css class for css customisation','vorosa'),
										'type'        => 'text'
									),	

						), // content
					
					// .............................................
					// ..... // Styling
					// .............................................
				
						    'styling' => array(
		                    	array(
		                    		'name'   => 'custom_css',
		                    		'type'   => 'css',
		                    		'options' => array(
		                    			array(
		                    				'screens' => 'any,1024,999,767,479',
		                    				'Title First'   => array(
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__( 'Text Font Family', 'vorosa' ),
		                    						'selector' => '+ .slide-content h3'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Text Font Size', 'vorosa' ),
		                    						'selector' => '.slide-content h3' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Text Font Weight','vorosa' ), 
		                    						'selector' => '.slide-content h3'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Text Transform', 'vorosa' ),
													'selector' => '+ .slide-content h3'
												),
		                    					array(
													'property' => 'line-height', 
													'label'    => esc_html__( 'Text line-height', 'vorosa' ),
													'selector' => '+ .slide-content h3'
												),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__( 'Text Color', 'vorosa' ),
		                    					    'selector' => '+ .slide-content h3' 
		                    					),
		                    					array( 
		                    					    'property' => 'margin', 
		                    					    'label'    => esc_html__( 'Text Margin', 'vorosa' ),
		                    					    'selector' => '+ .slide-content h3' 
		                    					),
		                    					array( 
		                    					    'property' => 'padding', 
		                    					    'label'    => esc_html__( 'Text Padding', 'vorosa' ),
		                    					    'selector' => '+ .slide-content h3' 
		                    					),
		                    				),
		                    				///////
		                    				'Title Second'   => array(
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__( 'Text Font Family', 'vorosa' ),
		                    						'selector' => '+ .slide-content h2'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Text Font Size', 'vorosa' ),
		                    						'selector' => '.slide-content h2' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Text Font Weight','vorosa' ), 
		                    						'selector' => '.slide-content h2'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Text Transform', 'vorosa' ),
													'selector' => '+ .slide-content h2'
												),
		                    					array(
													'property' => 'line-height', 
													'label'    => esc_html__( 'Text line-height', 'vorosa' ),
													'selector' => '+ .slide-content h2'
												),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__( 'Text Color', 'vorosa' ),
		                    					    'selector' => '+ .slide-content h2' 
		                    					),
		                    					array( 
		                    					    'property' => 'margin', 
		                    					    'label'    => esc_html__( 'Text Margin', 'vorosa' ),
		                    					    'selector' => '+ .slide-content h2' 
		                    					),
		                    					array( 
		                    					    'property' => 'padding', 
		                    					    'label'    => esc_html__( 'Text Padding', 'vorosa' ),
		                    					    'selector' => '+ .slide-content h2' 
		                    					),
		                    				),
		                    				///////
		                    				'Description'   => array(
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__( 'Description Font Family','vorosa' ), 
		                    						'selector' => '+ .slide-content p'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Description Font Size', 'vorosa' ),
		                    						'selector' => '+ .slide-content p'
		                    					),
												array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Description Text Transform', 'vorosa' ),
													'selector' => '+ .slide-content p'
												),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Description Font Weight', 'vorosa' ),
		                    						'selector' => '+ .slide-content p'
		                    					),
		                    					array(
		                    						'property' => 'line-height', 
		                    						'label'    => esc_html__( 'Description Line Height', 'vorosa' ),
		                    						'selector' => '+ .slide-content p'
		                    					),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__( 'Description Color', 'vorosa' ),
		                    					    'selector' => '+ .slide-content p'
		                    					),
		                    					array( 
		                    					    'property' => 'margin', 
		                    					    'label'    => esc_html__( 'Description Margin', 'vorosa' ),
		                    					    'selector' => '+ .slide-content p'
		                    					),
		                    					array( 
		                    					    'property' => 'padding', 
		                    					    'label'    => esc_html__( 'Description padding', 'vorosa' ),
		                    					    'selector' => '+ .slide-content p'
		                    					)
		                    				),
		                    				///////
		                    				'Button'   => array(
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__( 'Button Font Family','vorosa' ), 
		                    						'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Button Font Size', 'vorosa' ),
		                    						'selector' => '+ .slider-area .default-btn'
		                    					),
												array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Button Text Transform', 'vorosa' ),
													'selector' => '+ .slider-area .default-btn'
												),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Button Font Weight', 'vorosa' ),
		                    						'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array(
		                    						'property' => 'line-height', 
		                    						'label'    => esc_html__( 'Button Line Height', 'vorosa' ),
		                    						'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__( 'Button Color', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__( 'Button Color hover', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn:hover'
		                    					),
		                    					array( 
		                    					    'property' => 'border', 
		                    					    'label'    => esc_html__( 'Button border', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array( 
		                    					    'property' => 'border', 
		                    					    'label'    => esc_html__( 'Button hover border', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn:hover'
		                    					),
		                    					array( 
		                    					    'property' => 'background', 
		                    					    'label'    => esc_html__( 'Button Background', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array( 
		                    					    'property' => 'background', 
		                    					    'label'    => esc_html__( 'Button Background hover', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn:hover'
		                    					),
		                    					array( 
		                    					    'property' => 'margin', 
		                    					    'label'    => esc_html__( 'Button Margin', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn'
		                    					),
		                    					array( 
		                    					    'property' => 'padding', 
		                    					    'label'    => esc_html__( 'Button padding', 'vorosa' ),
		                    					    'selector' => '+ .slider-area .default-btn'
													)
		                    				),
											///
											///
											'box' => array(
												array(
													'property' => 'margin',
													'label'    => esc_html__( 'Section Margin','vorosa' ),
													'selector' => '+ .slider-content-area',
												),
												array(
													'property' => 'padding',
													'label'    => esc_html__( 'Section padding','vorosa' ),
													'selector' => '+ .slider-content-area',
												),
											),
											
											///
		                    				
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




 /**
 * =======================================================
 *    Register Shortcode team section
 * =======================================================
 */     
 // [vorosa_section_title title="" description="" custom_css_class=""]
if(!function_exists('vorosa_slider_section_shortcode')){
	function vorosa_slider_section_shortcode($atts,$content){
	ob_start();
	
		$vorosa_section_title = shortcode_atts(array(
				'main_slider_single'  => '',
				'custom_css' 	  		=> '',
				'custom_css_class' 		=> '',
		),$atts); 
		extract( $vorosa_section_title );
		//custom class		
		$wrap_class  = apply_filters( 'kc-el-class', $atts );
		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );

	?>

	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr($custom_css_class); ?>">

		<!-- Background Area Start -->
        <div id="slider-container" class="slider-area"> 
            <div class="slider-owl owl-carousel"> 
			
			<?php foreach( $main_slider_single as $item_single ): ?>
			
				<?php $images = wp_get_attachment_image_src( $item_single->slide_img, 'full');?>
				<div class="single-slider pb-340 pt-240 bg-img" style="background-image:url(<?php echo $images[0]; ?>);" data-overlay="5">
                    <div class="container">
                        <div class="slider-text text-center z-index">
                            <h2 class="animated"><?php echo $item_single->slider_title; ?> <span><?php echo $item_single->slider_title_span; ?></span></h2>
                            <h1 class="animated"><?php echo $item_single->slider_title_2; ?> <span><?php echo $item_single->slider_title_2_span1; ?></span> <?php echo $item_single->slider_title_medium; ?> <span><?php echo $item_single->slider_title_2_span2; ?></span></h1>
                            <p class="animated"><?php echo $item_single->des_text; ?></p>

							
							<?php	
								if(!empty($item_single->button_link)){
									
									$link_attr = explode('|', $item_single->button_link);
									
									if(!empty($link_attr[0])){
										
										$link_url = $link_attr[0];
										
									}else{
										
										$link_url = '#';
									}
								}else{
									$link_url = '#';
								}
									
								?>

							
                            <a class="button theme-bg animated" href="<?php echo $link_url; ?>"><?php echo $item_single->button_text;?></a>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
				
            </div>
        </div>
		<!-- Background Area End -->
				
	</div>
	
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_main_slider' ,'vorosa_slider_section_shortcode');
}