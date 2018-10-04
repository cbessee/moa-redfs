<?php 
/*
 * Section Title ShortCode
 * Author: Grand-Themes
 * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */

add_action('init', 'vorosa_section_title'); // Call kc_add_map function ///
if(!function_exists('vorosa_section_title')):
	function vorosa_section_title(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_section_title'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('vorosa Section Title One',  'vorosa'),
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
							'type'        => 'textarea',
							'value'       => 'Latest Causes'
						),
						array(
							'name' => 'title_image',
							'label' => 'Upload Image',
							'type' => 'attach_image',
							'admin_label' => true,
						),
						array(
							'name'  => 'description',
							'label' => esc_html__('Description', 'vorosa'),
							'type'  => 'editor',
							'value' => ('There are many variations of azer duskam of Lorem Ipsum available,')
						),
		                array(
		                    'name'        => 'custom_css_class',
		                    'label'       => esc_html__('CSS Class', 'vorosa'),
		                    'description' => esc_html__('Custom css class for css customisation', 'vorosa'),
		                    'type'        => 'text'
		                ),

		                array(
								'name' 	=> 'sec_title_box_icon',
								'label' => esc_html__( 'Upload Thumbnail', 'vorosa' ),
								'type' 	=> 'attach_image', 
								'value'	=> plugins_url( 'images/1.png', __FILE__ ),
								
							),
							array(
								'type'					=> 'select',
								'label'					=> esc_html__( 'Icon Size', 'vorosa' ),
								'name'					=> 'sec_title_icon_size',
								'options'				=> array(
									'full'				=> 'Full',
									'thumbnail'			=> 'Thumbnail',
									'medium'			=> 'Medium',
									'large'				=> 'Large'
								),

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
		                    					    'selector' => '+ .section-title h2' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .section-title h2'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .section-title h2' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .section-title h2'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .section-title h2'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .section-title h2'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .section-title h2'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .section-title h2'
		                    					),
		                    				),

		                    				///////
		                    				'Description'   => array(
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .section-title p' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .section-title p'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .section-title p' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+  .section-title p'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+  .section-title p'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .section-title p'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .section-title p'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .section-title p'
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


 if(!function_exists('vorosa_section_title_shortcode')){
	function vorosa_section_title_shortcode($atts,$content){
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

	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">
		<div class="section-title text-center <?php echo esc_attr( $section_title_random ); ?> <?php echo esc_attr( $align_value ); ?>">
			<?php if ( isset( $title ) ): ?>
			<h2><?php echo $title; ?></h2>
			<?php endif ?>
			<div class="icon-img">
				<?php echo wp_get_attachment_image($sec_title_box_icon, $sec_title_icon_size); ?>
			</div>
			<?php if ( isset( $description ) ): ?>
			<?php echo $description; ?>
			<?php endif ?>
		</div>
	</div>
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_section_title' ,'vorosa_section_title_shortcode');
}