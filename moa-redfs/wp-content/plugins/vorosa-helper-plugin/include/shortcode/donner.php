<?php 

/*
 * Top Donner ShortCode
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

add_action('init', 'vorosa_top_donner'); // Call kc_add_map function ///

if(!function_exists('vorosa_top_donner')):

	function vorosa_top_donner(){

		if(function_exists('kc_add_map')): // if kingComposer is active

		kc_add_map(

		    array(

		        'vorosa_top_donner'  => array( // <-- shortcode tag name

		            'name'        => esc_html__('vorosa Top Donner',  'vorosa'),

		            'description' => esc_html__('vorosa Top Donner',  'vorosa'),

		            'icon'        => 'fa-align-center',

		            'category'    => 'vorosa',

		            'params'      => array(

		        // .............................................

		        // ..... // Content TAB

		        // .............................................

		         	'General' => array(

						array(

							'name' 	=> 'top_donner_image',

							'label' => esc_html__( 'Upload Thumbnail', 'vorosa' ),

							'type' 	=> 'attach_image', 

							'value'	=> plugins_url( 'images/donner.jpg', __FILE__ ),

						),

						array(

							'type'					=> 'select',

							'label'					=> esc_html__( 'Icon Size', 'vorosa' ),

							'name'					=> 'top_donner_image_size',

							'options'				=> array(

								'full'				=> 'Full',

								'thumbnail'			=> 'Thumbnail',

								'medium'			=> 'Medium',

								'large'				=> 'Large'

							),

						),

						array(

							'name'        => 'donner_name',

							'label'       => esc_html__('Title', 'vorosa'),

							'type'        => 'text',

							'value'       => 'ELEYAS AHMED'

						),

						array(

							'type'			=> 'group',

							'label'			=> esc_html__('Social Network Options', 'vorosa'),

							'name'			=> 'donner_social_options',

							'description'	=> '',

							'options'		=> array('add_text' => esc_html__('Add new Social Network', 'vorosa')),

							'value' => base64_encode( json_encode( array(

								"1" => array(

									"social_icon" => "et-facebook",

									"social_link" => "https://www.facebook.com/"

								),

								"2" => array(

									"social_icon" => "et-twitter",

									"social_link" => "https://twitter.com/"

								),

								

								"3" => array(

									"social_icon" => "et-googleplus",

									"social_link" => "https://plus.google.com/"

								),

							))),

							'params' => array(

								array(

									'type' => 'icon_picker',

									'label' => 'Social Icon',

									'name' => 'social_icon',

									'admin_label' => true,

								),

								array(

									'type' => 'text',

									'label' => 'Social Link',

									'name' => 'social_link',

									'admin_label' => true,

								)

							)

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
 if(!function_exists('vorosa_top_donner_shortcode')){

	function vorosa_top_donner_shortcode($atts,$content){

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

		<div class="single-team mb-30">

			<div class="team-img">

				<?php echo wp_get_attachment_image($top_donner_image, $top_donner_image_size); ?>

				<div class="team-social-icon">

					<ul>

					<?php if (isset($donner_social_options)): ?>

						<?php foreach( $donner_social_options as $social_key => $single_social_item ){ 

						$social_icon = $single_social_item->social_icon; 

						$social_link = $single_social_item->social_link; 


						?>

						<li>

							<a href="<?php echo esc_url($social_link); ?>">

								<i class="<?php echo esc_attr($social_icon); ?>"></i>

							</a>

						</li>

						<?php } ?>

					<?php endif ?>

					</ul>

				</div>

			</div>

			<div class="team-text text-center">

				<?php if ( isset( $donner_name ) ): ?>

				<h3><?php echo $donner_name; ?></h3>

				<?php endif ?>

			</div>

		</div>

	</div>

	<?php

		return ob_get_clean();

	}

	add_shortcode('vorosa_top_donner' ,'vorosa_top_donner_shortcode');

}