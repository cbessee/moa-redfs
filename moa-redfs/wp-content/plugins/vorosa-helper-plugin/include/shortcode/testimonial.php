<?php 
/*
 * Testimonials ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */
add_action('init', 'vorosa_testimonials'); // Call kc_add_map function ///
if(!function_exists('vorosa_testimonials')):
	function vorosa_testimonials(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_testimonials'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('vorosa Testimonial',  'vorosa'),
		            'description' => esc_html__('Description Here',  'vorosa'),
		            'icon'        => 'wp-icon-customer',
		            'category'    => 'vorosa',
		            'params'      => array(
			         	'General' => array(
							array(
								'type'			=> 'group',
								'label'			=> esc_html__('Testimonial', 'vorosa'),
								'name'			=> 'testimonial_style_one_group',
								'description'	=> '',
								'options'		=> array('add_text' => esc_html__('Add new Testimonial', 'vorosa')),
								// default values when create new group
								'value' => base64_encode( json_encode( array(
									"1" => array(
										"testimonial_one_title" => esc_html__('NAZMUL RAZZ', 'vorosa'),
										"testimonial_one_position" => esc_html__('Web Developer', 'vorosa'),
										"testimonial_one_description" => base64_encode('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.'),

									"testimonial_one_image" => plugins_url( 'images/3.jpg', __FILE__ ),
									),
									"2" => array(
										"testimonial_one_title" => esc_html__('NAZMUL RAZZ', 'vorosa'),
										"testimonial_one_position" => esc_html__('Team Leader', 'vorosa'),
										"testimonial_one_description" => base64_encode('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.'),

									"testimonial_one_image" => plugins_url( 'images/3.jpg', __FILE__ ),
									),
									"3" => array(
										"testimonial_one_title" => esc_html__('NAZMUL RAZZ', 'vorosa'),
										"testimonial_one_position" => esc_html__('Web Developer', 'vorosa'),
										"testimonial_one_description" => base64_encode('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.'),

									"testimonial_one_image" => plugins_url( 'images/3.jpg', __FILE__ ),
									),
								))),
								
								// you can use all param type to register child params
								'params' => array(
									array(
										'name'        => 'testimonial_one_title',
										'label'       => esc_html__('Tilte', 'vorosa'),
										'type'        => 'text',
									),
									array(
										'name'        => 'testimonial_one_position',
										'label'       => esc_html__('Position', 'vorosa'),
										'type'        => 'text',
									),
									array(
										'name'  	  => 'testimonial_one_description',
										'label' 	  => esc_html__('Description', 'vorosa'),
										'type'  	  => 'textarea',
									),
									array(
										'name'  	  => 'testimonial_one_image',
										'label' 	  => esc_html__('Image', 'vorosa'),
										'type'  	  => 'attach_image',
                        				'admin_label' => true,
									),
								)
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
	                    				'Image'   => array(
	                    					array(
	                    						'property' => 'border', 
	                    						'label'    => esc_html__('Border', 'vorosa'), 
	                    						'selector' => '+ .single-testimonial .image'
	                    					),
	                    					array(
	                    						'property' => 'padding', 
	                    						'label'    => esc_html__('Padding', 'vorosa'), 
	                    						'selector' => '+ .single-testimonial .image'
	                    					),
	                    					array(
	                    						'property' => 'margin', 
	                    						'label'    => esc_html__('Margin', 'vorosa'), 
	                    						'selector' => '+ .single-testimonial .image'
	                    					),
	                    				),
	                    				'Title'   => array(
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Color', 'vorosa'),
	                    					    'selector' => '+ .testi-text h4' 
	                    					),
	                    					array(
	                    						'property' => 'font-family', 
	                    						'label'    => esc_html__('Font Family',  'vorosa'), 
	                    						'selector' => '+ .testi-text h4'
	                    					),
	                    					array( 
	                    						'property' => 'font-size', 
	                    						'label'    => esc_html__('Font Size', 'vorosa'),
	                    						'selector' => '+ .testi-text h4' 
	                    					),
	                    					array(
	                    						'property' => 'font-weight', 
	                    						'label'    => esc_html__('Font Weight', 'vorosa'),
	                    						'selector' => '+  .testi-text h4'
	                    					),
	                    					array(
												'property' => 'text-transform', 
												'label'    => esc_html__('Text Transform', 'vorosa'),
												'selector' => '+  .testi-text h4'
											),
											array(
	                    						'property' => 'letter-spacing', 
	                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
	                    						'selector' => '+ .testi-text h4'
	                    					),
	                    					array(
	                    						'property' => 'padding', 
	                    						'label'    => esc_html__('Padding', 'vorosa'), 
	                    						'selector' => '+ .testi-text h4'
	                    					),
	                    					array(
	                    						'property' => 'margin', 
	                    						'label'    => esc_html__('Margin', 'vorosa'), 
	                    						'selector' => '+ .testi-text h4'
	                    					),
	                    				),
	                    				'Position'   => array(
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Color', 'vorosa'),
	                    					    'selector' => '+ .testi-text span' 
	                    					),
	                    					array(
	                    						'property' => 'font-family', 
	                    						'label'    => esc_html__('Font Family',  'vorosa'), 
	                    						'selector' => '+ .testi-text span'
	                    					),
	                    					array( 
	                    						'property' => 'font-size', 
	                    						'label'    => esc_html__('Font Size', 'vorosa'),
	                    						'selector' => '+ .testi-text span' 
	                    					),
	                    					array(
	                    						'property' => 'font-weight', 
	                    						'label'    => esc_html__('Font Weight', 'vorosa'),
	                    						'selector' => '+ .testi-text span'
	                    					),
	                    					array(
												'property' => 'text-transform', 
												'label'    => esc_html__('Text Transform', 'vorosa'),
												'selector' => '+ .testi-text span'
											),
											array(
	                    						'property' => 'letter-spacing', 
	                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
	                    						'selector' => '+ .testi-text span'
	                    					),
	                    					array(
	                    						'property' => 'padding', 
	                    						'label'    => esc_html__('Padding', 'vorosa'), 
	                    						'selector' => '+ .testi-text span'
	                    					),
	                    					array(
	                    						'property' => 'margin', 
	                    						'label'    => esc_html__('Margin', 'vorosa'), 
	                    						'selector' => '+ .testi-text span'
	                    					),
	                    				),
	                    				'Description'   => array(
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Color', 'vorosa'),
	                    					    'selector' => '+ .testi-text p' 
	                    					),
	                    					array(
	                    						'property' => 'font-family', 
	                    						'label'    => esc_html__('Font Family',  'vorosa'), 
	                    						'selector' => '+ .testi-text p'
	                    					),
	                    					array( 
	                    						'property' => 'font-size', 
	                    						'label'    => esc_html__('Font Size', 'vorosa'),
	                    						'selector' => '+ .testi-text p' 
	                    					),
	                    					array(
	                    						'property' => 'font-weight', 
	                    						'label'    => esc_html__('Font Weight', 'vorosa'),
	                    						'selector' => '+  .testi-text p'
	                    					),
	                    					array(
												'property' => 'text-transform', 
												'label'    => esc_html__('Text Transform', 'vorosa'),
												'selector' => '+  .testi-text p'
											),
											array(
	                    						'property' => 'letter-spacing', 
	                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
	                    						'selector' => '+ .testi-text p'
	                    					),
	                    					array(
	                    						'property' => 'padding', 
	                    						'label'    => esc_html__('Padding', 'vorosa'), 
	                    						'selector' => '+ .testi-text p'
	                    					),
	                    					array(
	                    						'property' => 'margin', 
	                    						'label'    => esc_html__('Margin', 'vorosa'), 
	                    						'selector' => '+ .testi-text p'
	                    					),
	                    				),
	                    				'Align' => array(
	                    					array( 
	                    						'property' => 'text-align', 
	                    						'label'    => esc_html__('Text Align', 'vorosa'),
	                    						'selector' => '+ .testimonial-client-section .single-testimonial'
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


 if(!function_exists('vorosa_testimonials_shortcode')){
	function vorosa_testimonials_shortcode($atts,$content){
	ob_start();

		$vorosa_testimonials = shortcode_atts( array(
			'testimonial_style_one_group'   	=> '',
			'testimonial_one_title'   			=> '',
			'testimonial_one_position'   		=> '',
			'testimonial_one_description'   	=> '',
			'testimonial_one_image'   			=> '',
			'custom_css'       					=> '',
			'custom_css_class' 					=> '',
		),$atts); 
		extract( $vorosa_testimonials );

		$wrap_class  = apply_filters( 'kc-el-class', $atts );
		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );

		$align_value = '';
		if (isset(explode('align', $atts['custom_css'])['2'])) {
			$align_cc = explode('align', $atts['custom_css'])['2'];
			$align_cc = str_replace('}', '', $align_cc);
			$align_cc = str_replace('`', '', $align_cc);
			$align_exp = explode(':', $align_cc);
			$align_value = end($align_exp);
		}
		



	?>
	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">
		
		<!-- Start Testimonial & Client Section -->
		<div class="testimonial-area">
            <!-- Testimonial Slider -->
            <div class="testimonials-active owl-carousel">
				
                <?php if (isset($testimonial_style_one_group)): ?>
					<?php foreach( $testimonial_style_one_group as $test_one_key => $test_one_single_items ){ 

					$testimonial_one_image_value = $test_one_single_items->testimonial_one_image; ?>
						
		                <!-- Single Testimonial -->
						<div class="single-testimonial">
							<div class="testi-img">
								<?php echo wp_get_attachment_image($testimonial_one_image_value, 'full'); ?>
							</div>
							<div class="testi-text gray-bg">
								<p><?php echo $test_one_single_items->testimonial_one_description; ?></p>
								<h4><?php echo $test_one_single_items->testimonial_one_title; ?></h4>
								<span><?php echo $test_one_single_items->testimonial_one_position; ?></span>
							</div>
						</div>


					<?php } ?>
				<?php endif ?>

            </div>
		</div>
		<!-- Testimonial & Client Section End -->

	</div>

	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_testimonials' ,'vorosa_testimonials_shortcode');
}