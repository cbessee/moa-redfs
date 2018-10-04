<?php 
/*
 * Requirements ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 *
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */

add_action('init', 'vorosa_requirements'); // Call kc_add_map function ///
if(!function_exists('vorosa_requirements')):
	function vorosa_requirements(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_requirements'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('vorosa Requirements',  'vorosa'),
		            'description' => esc_html__('vorosa Requirements',  'vorosa'),
		            'icon'        => 'fa-align-center',
		            'category'    => 'vorosa',
		            'params'      => array(
		        // .............................................
		        // ..... // Content TAB
		        // .............................................
		         	'General' => array(
						array(
							'name'        => 'requirements_title',
							'label'       => esc_html__('Title', 'vorosa'),
							'type'        => 'text',
							'value'       => 'Requirements'
						),
						array(
							'name'        => 'requirements_content',
							'label'       => esc_html__('Description', 'vorosa'),
							'type'        => 'textarea',
							'value'       => 'There are many variations of passages of Lorem Ipsum available, but majority have the suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need.'
						),
						array(
							'name' 	=> 'vorosa_requirements_list_icon',
							'label' => esc_html__( 'Upload List Icon', 'vorosa' ),
							'type' 	=> 'attach_image', 
							'value'	=> plugins_url( 'images/10.png', __FILE__ ),
						),
						array(
							'type'					=> 'select',
							'label'					=> esc_html__( 'Icon Size', 'vorosa' ),
							'name'					=> 'vorosa_requirements_list_icon_size',
							'options'				=> array(
								'full'				=> 'Full',
								'thumbnail'			=> 'Thumbnail',
								'medium'			=> 'Medium',
								'large'				=> 'Large'
							),

						),
						array(
							'type'			=> 'group',
							'label'			=> esc_html__('Requirements List Options', 'vorosa'),
							'name'			=> 'vorosa_requirements_list',
							'description'	=> '',
							'options'		=> array('add_text' => esc_html__('Add new Requirements List', 'vorosa')),
							'value' => base64_encode( json_encode( array(
								"1" => array(
									"list_text" => "There are many variations of passages of Lorem Ipsum"
								),
								
								"2" => array(
									"list_text" => "Many variations of passages of Lorem Ipsum"
								),
								
								"3" => array(
									"list_text" => "Variations of passages"
								),
								
								"4" => array(
									"list_text" => "There are many variations of passages"
								),
							))),
						 
							'params' => array(
								array(
									'type' => 'text',
									'label' => 'Requirements List',
									'name' => 'list_text',
									'admin_label' => true,
								)
							)
						),
						
						array(
							'name'        => 'requirements_content_bottom',
							'label'       => esc_html__('Description', 'vorosa'),
							'type'        => 'textarea',
							'value'       => 'There are many variations of passages of Lorem Ipsum available, but majority have the suffered alteration in some form, by injected humour.'
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
		                    					    'selector' => '+ .join-text h3' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .join-text h3'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .join-text h3' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .join-text h3'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .join-text h3'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .join-text h3'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .join-text h3'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .join-text h3'
		                    					),
		                    				),
											
											///
											'Description'   => array(
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .join-text p' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .join-text p'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .join-text p' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .join-text p'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .join-text p'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .join-text p'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .join-text p'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .join-text p'
		                    					),
		                    				),
											///
											'List'   => array(
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .join-text ul li' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .join-text ul li'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .join-text ul li' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .join-text ul li'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .join-text ul li'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .join-text ul li'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .join-text ul li'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .join-text ul li'
		                    					),
		                    				),
											///
											'Button'   => array(
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Color', 'vorosa'),
		                    					    'selector' => '+ .join-form input.submit' 
		                    					),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Hover Color', 'vorosa'),
		                    					    'selector' => '+ .join-form .submit:hover' 
		                    					),
												array( 
		                    					    'property' => 'background-color', 
		                    					    'label'    => esc_html__('Background Color', 'vorosa'),
		                    					    'selector' => '+ .join-form input.submit' 
		                    					),
												array( 
		                    					    'property' => 'background-color', 
		                    					    'label'    => esc_html__('Background Hover Color', 'vorosa'),
		                    					    'selector' => '+ .join-form .submit:hover' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .join-form input.submit'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .join-form input.submit' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .join-form input.submit'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .join-form input.submit'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .join-form input.submit'
		                    					),
												array(
		                    						'property' => 'width', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .join-form input.submit'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .join-form input.submit'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .join-form input.submit'
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


 if(!function_exists('vorosa_requirements_shortcode')){
	function vorosa_requirements_shortcode($atts,$content){
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
		
		<div class="join-text">
			<?php if ( isset( $requirements_title ) ): ?>
				<h3><?php echo $requirements_title; ?></h3>
			<?php endif ?>
			<p><?php echo $requirements_content; ?></p>
			
			<?php if (isset($vorosa_requirements_list)): ?>
				<?php foreach( $vorosa_requirements_list as $requirements_key => $equirements_list_item ){ 

				$list_text = $equirements_list_item->list_text; 
				
				?>
			
			<ul>
				<li><?php echo wp_get_attachment_image($vorosa_requirements_list_icon, $vorosa_requirements_list_icon_size); ?> <?php echo $list_text; ?></li>
			</ul>
			
			<?php } ?>
			<?php endif ?>
			
			<p><?php echo $requirements_content_bottom; ?></p>
		</div>
		
		
	</div>
	
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_requirements' ,'vorosa_requirements_shortcode');
}