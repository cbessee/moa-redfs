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

add_action('init', 'vorosa_tab'); // Call kc_add_map function ///
if(!function_exists('vorosa_tab')):
	function vorosa_tab(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_tab'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('vorosa Tab',  'vorosa'),
		            'description' => esc_html__('Description Here',  'vorosa'),
		            'icon'        => 'fa-align-center',
		            'category'    => 'vorosa',
		            'params'      => array(
		        // .............................................
		        // ..... // Content TAB
		        // .............................................
		         	'General' => array(
						array(
							'name'        => 'tabarea',
							'label'       => esc_html__('Tab Area', 'vorosa'),
							'type'        => 'group',
							'options'	=> array( 'add_text' => esc_html__( 'Add New Tabs', 'vorosa' ) ),
							'params'   => array(
								array(
									'name'        => 'title',
									'label'       => esc_html__('Title', 'vorosa'),
									'type'        => 'text',
								),
								array(
									'name'        => 'descriptions',
									'label'       => esc_html__('Description ', 'vorosa'),
									'type'        => 'textarea',
								),
								array(
									'name'        => 'image',
									'label'       => esc_html__('Image ', 'vorosa'),
									'type'        => 'attach_image',
								),
							),
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
		                    					    'selector' => '+ .about-tab li a' 
		                    					),
		                    					array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Active Color', 'vorosa'),
		                    					    'selector' => '+ .about-tab li.active a' 
		                    					),
		                    					array(
		                    						'property' => 'font-family', 
		                    						'label'    => esc_html__('Font Family',  'vorosa'), 
		                    						'selector' => '+ .about-tab li a'
		                    					),
		                    					array( 
		                    						'property' => 'font-size', 
		                    						'label'    => esc_html__('Font Size', 'vorosa'),
		                    						'selector' => '+ .about-tab li a' 
		                    					),
		                    					array(
		                    						'property' => 'font-weight', 
		                    						'label'    => esc_html__('Font Weight', 'vorosa'),
		                    						'selector' => '+ .about-tab li a'
		                    					),
		                    					array(
													'property' => 'text-transform', 
													'label'    => esc_html__('Text Transform', 'vorosa'),
													'selector' => '+ .about-tab li a'
												),
												array(
		                    						'property' => 'letter-spacing', 
		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
		                    						'selector' => '+ .about-tab li a'
		                    					),
		                    					array(
		                    						'property' => 'padding', 
		                    						'label'    => esc_html__('Padding', 'vorosa'), 
		                    						'selector' => '+ .about-tab li a'
		                    					),
		                    					array(
		                    						'property' => 'margin', 
		                    						'label'    => esc_html__('Margin', 'vorosa'), 
		                    						'selector' => '+ .about-tab li a'
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


 if(!function_exists('vorosa_tab_shortcode')){
	function vorosa_tab_shortcode($atts,$content){
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
		<div class="col-md-12">
			<div class="about-text">
				<div class="about-menu-box text-center mb-60">
					<!-- Nav tabs -->
					<ul class="about-tab" role="tablist">
						<?php 
							if( $tabarea ):
							$umber = 0;
							foreach( $tabarea as $items):
						
						?>
						<li class="<?php if($umber == '1'){echo 'active';} ?>">
							<a href="#tab<?php echo $umber; ?>" data-toggle="tab">
								<?php echo $items->title; ?>
							</a>
						</li>
						
						<?php $umber++; 
						endforeach; endif; ?>
						
					</ul>
				</div>
				<div class="row">
					<!-- Tab panes -->
					<div class="tab-content">
					
						<?php 
							if( $tabarea ):
							$umber = 0;
							foreach( $tabarea as $items):
							
							$images = wp_get_attachment_image($items->image,'full');
						?>
						<div class="tab-pane <?php if($umber == '1'){echo 'active';} ?>" id="tab<?php echo $umber; ?>">
							<div class="col-md-6">
								<div class="grow-text">
									<div class="single-grow mb-20">
										<?php echo wpautop( $items->descriptions ); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="grow-img">
									<?php echo $images; ?>
								</div>
							</div>
						</div>
						
						<?php $umber++; endforeach; endif; ?>

					</div>							
				</div>
			</div>
		</div>
	</div>

	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_tab' ,'vorosa_tab_shortcode');
}