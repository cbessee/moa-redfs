<?php

/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */
	add_action('init', 'vorosa_video_banner'); // Call kc_add_map function ///
	if(!function_exists('vorosa_video_banner')):
		function vorosa_video_banner(){
			if(function_exists('kc_add_map')): // if kingComposer is active
			kc_add_map(
			    array(
			        'vorosavideobanner'  => array( // <-- shortcode tag name
			            'name'        => esc_html__('Video Banner', 'vorosa'),
			            'description' => esc_html__('Video Banner', 'vorosa'),
			            'icon'        => 'et-desktop',
			            'category'    => 'vorosa',
			            'params'      => array(

			        		// Content TAB
				         	'General' => array(
							
								array(
									'type'			=> 'attach_image',
									'label'			=> esc_html__( 'Banner background image', 'vorosa' ),
									'name'			=> 'banner_img_bg',
								),
								array(
									'type'        => 'text',
				                    'name'        => 'banner_video_link',
				                    'label'       => esc_html__('Video Banner Link','vorosa'),
				                    'description' => esc_html__('Video Banner Link','vorosa'),
				                ),
								array(
									'type'        => 'text',
				                    'name'        => 'start_time',
				                    'label'       => esc_html__('Video Start Time','vorosa'),
				                    'description' => esc_html__('Video Start Time','vorosa'),
				                ),
								array(
									'type'        => 'toggle',
				                    'name'        => 'sound_mute',
				                    'value' 	  => 'yes',
				                    'label'       => esc_html__('Sound On/off','vorosa'),
				                    'description' => esc_html__('Sound On/off','vorosa'),
				                ),
								array(
									'type'        => 'toggle',
				                    'name'        => 'autoplay',
				                    'value' 	  => 'yes',
				                    'label'       => esc_html__('Auto Play On/off','vorosa'),
				                    'description' => esc_html__('Auto Play On/off','vorosa'),
				                ),

								array(
									'type'        => 'textarea',
				                    'name'        => 'banner_title_one',
				                    'label'       => esc_html__('Title One','vorosa'),
				                    'description' => esc_html__('We Believe We <span> Can End </span>','vorosa'),
				                ),
								array(
									'type'        => 'textarea',
				                    'name'        => 'banner_title_two',
				                    'label'       => esc_html__('Title Two','vorosa'),
				                    'description' => esc_html__('The Water <span> Crices </span> In Our <span> Lifetime </span>','vorosa'),
				                ),
								array(
									'type'        => 'textarea',
				                    'name'        => 'banner_description',
				                    'label'       => esc_html__('Banner Description','vorosa'),
				                    'description' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.','vorosa'),
				                ),
				                array(
									'type'        => 'text',
				                    'name'        => 'banner_button_text',
				                    'label'       => esc_html__('Button Text','vorosa'),
				                    'description' => esc_html__('Text for button','vorosa'),
				                ),
				                array(
									'name'		  => 'banner_button_link',
									'label'		  => esc_html__( 'Button Link', 'vorosa' ),
									'type'		  => 'link',
									'description' => esc_html__( 'Set link for banner button.', 'vorosa' ),
								),
								array(
				                    'name'        => 'custom_css_class',
				                    'label'       => esc_html__('CSS Class','vorosa'),
				                    'description' => esc_html__('Custom css class for css customisation','vorosa'),
				                    'type'        => 'text'
				                ),
				         	), // content

							// styling tab
							'styling' => array(
			                    array(
		                    		'name'   => 'custom_css',
		                    		'type'   => 'css',
		                    		'options' => array(
		                    			array(
		                    				'screens' => 'any,1024,999,767,479',
		                    				'Title'   => array(
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__( 'Title Font Family', 'vorosa' ),
		                    						'selector' => '+ .slider-text h2,.slider-text h3'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Title one Font Size', 'vorosa' ),
		                    						'selector' => '+ .slider-text h2' 
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Title two Font Size', 'vorosa' ),
		                    						'selector' => '+ .slider-text h3' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Title one Font Weight','vorosa' ), 
		                    						'selector' => '+ .slider-text h2'
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Title two Font Weight','vorosa' ), 
		                    						'selector' => '+ .slider-text h3'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Title one Text Transform', 'vorosa' ),
													'selector' => '+ .slider-text h2'
												),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Title two Text Transform', 'vorosa' ),
													'selector' => '+ .slider-text h3'
												),
												array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Title Color','vorosa'), 
		                    					    'selector' => '+ .slider-text h2,.slider-text h3' 
		                    					),

		                    				),
											'Button'   => array(
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__( 'Button Font Family', 'vorosa' ),
		                    						'selector' => '+ .slider-text a'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__( 'Button Font Size', 'vorosa' ),
		                    						'selector' => '+ .slider-text a' 
		                    					),
		                    					
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__( 'Button Font Weight','vorosa' ), 
		                    						'selector' => '+ .slider-text a'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__( 'Button Text Transform', 'vorosa' ),
													'selector' => '+ .slider-text a'
												),
												array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Button Text Color','vorosa'), 
		                    					    'selector' => '+ .slider-text a' 
		                    					),
		                    					array( 
		                    					    'property' => 'background', 
		                    					    'label'    => esc_html__('Button background color','vorosa'), 
		                    					    'selector' => '+ .slider-text a' 
		                    					),
		                    				),

											'Border'   => array(
												array( 
		                    					    'property' => 'border', 
		                    					    'label'    => esc_html__('Button Border','vorosa'), 
		                    					    'selector' => '+ .slider-text a' 
		                    					),
		                    				),

											'Box' => array(
												array(
													'property'   => 'background',
													'label'      => esc_html__('Slider Section Background Opacity','vorosa'),
													'selector'   => '+ .slider-text',
												),
												array(
													'property'   => 'margin',
													'label'      => esc_html__('Slider Section margin','vorosa'),
													'selector'   => '+ .slider-text',
												),
												array(
													'property'   => 'padding',
													'label'      => esc_html__('Slider Section padding','vorosa'),
													'selector'   => '+ .slider-text',
												)
											),

		                    				'Text align' => array(
		                    					array(
		                    						'property' => 'text-align', 
		                    						'label'    => esc_html__('Text Align','vorosa'), 
		                    						'selector' => '+ .container-fluid.text-center'
		                    					),
		                    				),
		                    			)
		                    		) //End of options
			                    )
			                ), //End of styling

							// animate tab
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



 /* =======================================================
 *	Register Shortcode Video Banner
 *	usages: [vorosavideobanner]
 * =======================================================*/

	if(!function_exists('vorosa_video_banner_shortcode')){
	    function vorosa_video_banner_shortcode($atts,$content){
	        extract(shortcode_atts(array(
	            'banner_img_bg' 		=>'',
	            'banner_video_link' 	=>'',
	            'autoplay' 				=>'yes',
	            'sound_mute' 			=>'',
	            'start_time' 			=>'',
	            'banner_title_one' 		=>'',
	            'banner_title_two'  	=>'',
	            'banner_description'  	=>'',
	            'banner_button_text'    =>'',
	            'banner_button_link'    =>'',
	            'custom_css_class'     	=>'',
	        ),$atts));

	        $images_bg_url = wp_get_attachment_image_src( $banner_img_bg, 'full');

	        //custom class		
			$wrap_class  = apply_filters( 'kc-el-class', $atts );
			if( !empty( $custom_class ) ):
				$wrap_class[] = $custom_class;
			endif;
			$extra_class =  implode( ' ', $wrap_class );

			// button link
			if ( !empty( $banner_button_link ) ) {
				$link_arr = explode( '|', $banner_button_link );
				if ( !empty( $link_arr[0] ) ) {
					$button_url = $link_arr[0];
				} else {
					$button_url = '#';
				}
			} else {
				$button_url = '#';
			}

	        ob_start();
	        ?>
	            <div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr($custom_css_class); ?>">
					<!-- slider start -->
		            <div class="slider-area slider-style-5">
		                <div class="container-fluid text-center">
		                	<div class="row">
			                    <div class="slider-opacity ptb-250 youtube-bg" style="<?php if($images_bg_url[0] !=''){ echo 'background-image: url('.$images_bg_url[0].')';}?>" data-property="{videoURL:'<?php if($banner_video_link !=''){echo esc_attr($banner_video_link,'vorosa');}else{echo 'KcAca6CEBN0';}?>',

                					autoPlay:<?php if($autoplay == 'yes'){echo esc_attr('true','vorosa');}else{echo esc_attr('false','vorosa');}?>,
                					mute:<?php if($sound_mute == 'yes'){echo esc_attr('false','vorosa');}else{echo esc_attr('true','vorosa');}?>, 
                					startAt:<?php if($start_time !='') {echo esc_attr($start_time,'vorosa');}else{echo esc_attr('0','vorosa');}?>,
			                    }" >

				                    <div class="slider-text style-2">
										<?php if ($banner_title_one): ?>
										<h2 class="animated"><?php echo $banner_title_one;?></h2>
										<?php endif ?>
										<?php if ($banner_title_two): ?>
										<h1 class="animated"><?php echo $banner_title_two;?></h1>
										<?php endif ?>
										<?php if ($banner_description): ?>
										<p class="animated"><?php echo $banner_description; ?></p>
				                        <?php endif ?>
										<?php if ($banner_button_text): ?>
										<a class="button theme-bg animated" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_attr($banner_button_text,'vorosa');?></a>
										<?php endif ?>
				                    </div>

			                    </div>
			                </div>
			                <?php if($autoplay == ''):?>
				                <div class="slider-button-for-video">
							      	<button onclick="jQuery('.youtube-bg').YTPPlay()"><i class="fa fa-play"></i></button>
							      	<button onclick="jQuery('.youtube-bg').YTPPause()"><i class="fa fa-pause"></i></button>
							      	<button onclick="jQuery('.youtube-bg').YTPStop()"><i class="fa fa-stop"></i></button>
							    </div>
							<?php endif;?>
		                </div>
		            </div>
		            <!-- slider end -->

				</div>

	        <?php
	        return ob_get_clean();
	    }
	    add_shortcode('vorosavideobanner','vorosa_video_banner_shortcode');
	}



?>