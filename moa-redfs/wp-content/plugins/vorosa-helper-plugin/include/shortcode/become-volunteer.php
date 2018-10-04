<?php 

/*
 * Become Volunteer ShortCode
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



add_action('init', 'vorosa_become_volunteer'); // Call kc_add_map function ///

if(!function_exists('vorosa_become_volunteer')):

	function vorosa_become_volunteer(){

		if(function_exists('kc_add_map')): // if kingComposer is active

		kc_add_map(

		    array(

		        'vorosa_become_volunteer'  => array( // <-- shortcode tag name

		            'name'        => esc_html__('vorosa Become Volunteer',  'vorosa'),

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

							'value'       => 'Become A Volunteer'

						),

						array(

							'name'  => 'description',

							'label' => esc_html__('Description', 'vorosa'),

							'type'  => 'editor',

							'value' => ('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed ')

						),

						

						array(

							'type' => 'text',

							'label' => __( 'Button Text', 'vorosa' ),

							'name' => 'button_text',

							'description' => __( 'Volunteer Btn Text', 'vorosa' ),

							'value' => ( 'Join Us'),

						),

						

						array(

							'type' => 'link',

							'label' => __( 'Button Link', 'vorosa' ),

							'name' => 'button_link',

							'description' => __( 'Volunteer Btn Link', 'vorosa' ),

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

		                    					    'selector' => '+ .volunteer-text h2' 

		                    					),

		                    					array(

		                    						'property' => 'font-family', 

		                    						'label'    => esc_html__('Font Family',  'vorosa'), 

		                    						'selector' => '+ .volunteer-text h2'

		                    					),

		                    					array( 

		                    						'property' => 'font-size', 

		                    						'label'    => esc_html__('Font Size', 'vorosa'),

		                    						'selector' => '+ .volunteer-text h2' 

		                    					),

		                    					array(

		                    						'property' => 'font-weight', 

		                    						'label'    => esc_html__('Font Weight', 'vorosa'),

		                    						'selector' => '+ .volunteer-text h2'

		                    					),

		                    					array(

													'property' => 'text-transform', 

													'label'    => esc_html__('Text Transform', 'vorosa'),

													'selector' => '+ .volunteer-text h2'

												),

												array(

		                    						'property' => 'letter-spacing', 

		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 

		                    						'selector' => '+ .volunteer-text h2'

		                    					),

		                    					array(

		                    						'property' => 'padding', 

		                    						'label'    => esc_html__('Padding', 'vorosa'), 

		                    						'selector' => '+ .volunteer-text h2'

		                    					),

		                    					array(

		                    						'property' => 'margin', 

		                    						'label'    => esc_html__('Margin', 'vorosa'), 

		                    						'selector' => '+ .volunteer-text h2'

		                    					),

		                    				),



		                    				///////

		                    				'Description'   => array(

		                    					array( 

		                    					    'property' => 'color', 

		                    					    'label'    => esc_html__('Color', 'vorosa'),

		                    					    'selector' => '+ .volunteer-text p' 

		                    					),

		                    					array(

		                    						'property' => 'font-family', 

		                    						'label'    => esc_html__('Font Family',  'vorosa'), 

		                    						'selector' => '+ .volunteer-text p'

		                    					),

		                    					array( 

		                    						'property' => 'font-size', 

		                    						'label'    => esc_html__('Font Size', 'vorosa'),

		                    						'selector' => '+ .volunteer-text p' 

		                    					),

		                    					array(

		                    						'property' => 'font-weight', 

		                    						'label'    => esc_html__('Font Weight', 'vorosa'),

		                    						'selector' => '+ .volunteer-text p'

		                    					),

		                    					array(

													'property' => 'text-transform', 

													'label'    => esc_html__('Text Transform', 'vorosa'),

													'selector' => '+ .volunteer-text p'

												),

												array(

		                    						'property' => 'letter-spacing', 

		                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 

		                    						'selector' => '+ .volunteer-text p'

		                    					),

		                    					array(

		                    						'property' => 'padding', 

		                    						'label'    => esc_html__('Padding', 'vorosa'), 

		                    						'selector' => '+ .volunteer-text p'

		                    					),

		                    					array(

		                    						'property' => 'margin', 

		                    						'label'    => esc_html__('Margin', 'vorosa'), 

		                    						'selector' => '+ .volunteer-text p'

		                    					),

		                    				),

											///

											'Button'   => array(

		                    					array(

		                    						'property' => 'font-family', 

		                    						'label'    => esc_html__( 'Button Font Family','vorosa' ), 

		                    						'selector' => '+ .volunteer-text a.button'

		                    					),

		                    					array( 

		                    						'property' => 'font-size', 

		                    						'label'    => esc_html__( 'Button Font Size', 'vorosa' ),

		                    						'selector' => '+ .volunteer-text a.button'

		                    					),

												array(

													'property' => 'text-transform', 

													'label'    => esc_html__( 'Button Text Transform', 'vorosa' ),

													'selector' => '+ .volunteer-text a.button'

												),

		                    					array(

		                    						'property' => 'font-weight', 

		                    						'label'    => esc_html__( 'Button Font Weight', 'vorosa' ),

		                    						'selector' => '+ .volunteer-text a.button'

		                    					),

		                    					array(

		                    						'property' => 'line-height', 

		                    						'label'    => esc_html__( 'Button Line Height', 'vorosa' ),

		                    						'selector' => '+ .volunteer-text a.button'

		                    					),

		                    					array( 

		                    					    'property' => 'color', 

		                    					    'label'    => esc_html__( 'Button Color', 'vorosa' ),

		                    					    'selector' => '+ .volunteer-text a.button'

		                    					),

		                    					array( 

		                    					    'property' => 'background', 

		                    					    'label'    => esc_html__( 'Button Background', 'vorosa' ),

		                    					    'selector' => '+ .volunteer-text .white-bg'

		                    					),

		                    					array( 

		                    					    'property' => 'box-shadow', 

		                    					    'label'    => esc_html__( 'Button hover', 'vorosa' ),

		                    					    'selector' => '+ .volunteer-text a.button:hover'

		                    					),

		                    					array( 

		                    					    'property' => 'border-radius', 

		                    					    'label'    => esc_html__( 'Button hover', 'vorosa' ),

		                    					    'selector' => '+ .volunteer-text a.button'

		                    					),

		                    					array( 

		                    					    'property' => 'margin', 

		                    					    'label'    => esc_html__( 'Button Margin', 'vorosa' ),

		                    					    'selector' => '+ .volunteer-text a.button'

		                    					),

		                    					array( 

		                    					    'property' => 'padding', 

		                    					    'label'    => esc_html__( 'Button padding', 'vorosa' ),

		                    					    'selector' => '+ .volunteer-text a.button'

													)

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

 if(!function_exists('vorosa_become_volunteer_shortcode')){

	function vorosa_become_volunteer_shortcode($atts,$content){

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

	<div class="volunteer-area <?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">

		<div class="col-md-8 col-md-offset-2">

			<div class="volunteer-text text-center theme-bg">

			   <?php if ( isset( $title ) ): ?>

				<h2><?php echo $title; ?></h2>

				<?php endif ?>

				<p><?php echo $description; ?></p>

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

				<a class="button white-bg" href="<?php echo $link_url; ?>"><?php echo $button_text;?></a>

			</div>

		</div>

	</div>

	<?php

		return ob_get_clean();

	}

	add_shortcode('vorosa_become_volunteer' ,'vorosa_become_volunteer_shortcode');

}