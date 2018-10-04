<?php 
/*
 * Section Title ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */
add_action('init', 'vorosa_countdown'); // Call kc_add_map function ///
if(!function_exists('vorosa_countdown')):
	function vorosa_countdown(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_countdown'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('vorosa Countdown',  'vorosa'),
		            'description' => esc_html__('Description Here',  'vorosa'),
		            'icon'        => 'fa-align-center',
		            'category'    => 'vorosa',
		            'params'      => array(
		        // .............................................
		        // ..... // Content TAB
		        // .............................................
		         	'General' => array(
						array(
							'name'        => 'title',
							'label'       => esc_html__('Title', 'vorosa'),
							'type'        => 'text',
							'value'       => 'Your small help give us a lot of insperiation'
						),
						array(
							'name' => 'date',
							'label' => 'Countdown',
							'type' => 'text', 
							'description' => '2017/12/30  Use date This Formate',
							'value'       => '2017/12/30'
						),
						array(
							'name' => 'title_image',
							'label' => 'Upload Image',
							'type' => 'attach_image',
							'admin_label' => true,
						),
		                array(
							'name' 	=> 'vorosa_countdown_icon',
							'label' => esc_html__( 'Upload Thumbnail', 'vorosa' ),
							'type' 	=> 'attach_image', 
							'value'	=> plugins_url( 'images/9.png', __FILE__ ),
							
						),
						array(
							'type'					=> 'select',
							'label'					=> esc_html__( 'Icon Size', 'vorosa' ),
							'name'					=> 'vorosa_countdown_icon_size',
							'options'				=> array(
								'full'				=> 'Full',
								'thumbnail'			=> 'Thumbnail',
								'medium'			=> 'Medium',
								'large'				=> 'Large'
							),

						),
						
						array(
							'type' => 'text',
							'label' => __( 'Button Text', 'vorosa' ),
							'name' => 'button_text',
							'description' => __( 'Slider Btn Text', 'vorosa' ),
							'value' => 'DONATE NOW',
						),
						array(
							'type' => 'link',
							'label' => __( 'Button Link', 'vorosa' ),
							'name' => 'button_link',
							'description' => __( 'Slider Btn Link', 'vorosa' ),
						),
						
						
		                array(
		                    'name'        => 'custom_css_class',
		                    'label'       => esc_html__('CSS Class', 'vorosa'),
		                    'description' => esc_html__('Custom css class for css customisation', 'vorosa'),
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
		                    				'Title'   => array(
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .up-text h2' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .up-text h2'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .up-text h2' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .up-text h2'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .up-text h2'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .up-text h2'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .up-text h2'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .up-text h2'
		                    					),
		                    				),

		                    				///////
		                    				'Button'   => array(
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .up-button a.button' 
		                    					),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Hover Color', 'vorosa'),
		                    					    'selector' => '+ .up-button a.button:hover' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .up-button a.button' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .up-button a.button'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .up-button a.button'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
												array(
		                    						'property' => 'border-radius', 
		                    						'label'    => esc_html__('Border Radius', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
												array(
		                    						'property' => 'background', 
		                    						'label'    => esc_html__('Background Color', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
												array(
		                    						'property' => 'background', 
		                    						'label'    => esc_html__('Background Hover Color', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
		                    				),
											
		                    				///////
		                    				'Countdown'   => array(
		                    					array( 
		                    					    'property' => 'color',
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .time-count' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .time-count'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .time-count' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .time-count'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .time-count'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
												array(
		                    						'property' => 'background', 
		                    						'label'    => esc_html__('Background Color', 'vorosa'), 
		                    						'selector' => '+ .upcoming .cdown'
		                    					),
												array(
		                    						'property' => 'background', 
		                    						'label'    => esc_html__('Background Hover Color', 'vorosa'), 
		                    						'selector' => '+ .up-button a.button'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .upcoming .cdown'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .upcoming .cdown'
		                    					),
		                    				),
		                    				///////
		                    				'Countdown Description'   => array(
		                    					array( 
		                    					    'property' => 'color',
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .cdown p' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .cdown p'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .cdown p' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .cdown p'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .cdown p'
												),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .cdown p'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .cdown p'
		                    					),
		                    				),
		                    				
											///
		                    				'Align' => array(
		                    					array( 
		                    						'property' => 'text-align', 
		                    						'label'    => esc_html__('Text Align', 'vorosa'),
		                    						'selector' => '+ .section-title'
		                    					),
		                    				),
		                    				///
											'Box' =>array(
												array(
													'property'  => 'margin', 
													'label' 	=> esc_html__('Margin', 'vorosa'),
													'selector'  => '+ .section-title'
												),
												array(
													'property'  => 'padding', 
													'label' 	=> esc_html__('Padding', 'vorosa'),
													'selector'  => '+ .section-title'
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
		        // .............................................
		        // .............................................
		        // .............................................
		        /////////////////////////////////////////////////////////
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


 if(!function_exists('vorosa_countdown_shortcode')){
	function vorosa_countdown_shortcode($atts,$content){
	ob_start();

		extract( $atts );

		$align_value = '';
		if (isset(explode('align', $atts['custom_css'])['2'])) {
			$align_cc = explode('align', $atts['custom_css'])['2'];
			$align_cc = str_replace('}', '', $align_cc);
			$align_cc = str_replace('`', '', $align_cc);
			$align_exp = explode(':', $align_cc);
			$align_value = end($align_exp);
		}
		

		$wrap_class  = apply_filters( 'kc-el-class', $atts );
		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );

		
		
		
	?>

	<div class="upcoming-area <?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">
		<div class="donate-ino z-index">
			<div class="upcoming text-center">
				<div data-countdown="<?php echo $date; ?>"></div>
			</div>
			<div class="upcoming-text">
				<div class="up-text">
					<?php if ( isset( $title ) ): ?>
						<h2><?php echo $title; ?> <?php echo wp_get_attachment_image($vorosa_countdown_icon, $vorosa_countdown_icon_size); ?></h2>
					<?php endif ?>
				</div>
				<div class="up-button">
				
				<?php	
					if(!empty($button_link)){
						
						$link_attr = explode('|', $button_link);
						
						if(!empty($link_attr[0])){
							
							$link_url = $link_attr[0];
							
						}else{
							
							$link_url = '#';
						}
					}else{
						$link_url = '#';
					}
						
				?>
				
				
					<a class="button theme-bg" href="<?php echo $link_url; ?>"><?php echo $button_text;?></a>
				</div>
			</div>
		</div>
	</div>
	
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_countdown' ,'vorosa_countdown_shortcode');
}