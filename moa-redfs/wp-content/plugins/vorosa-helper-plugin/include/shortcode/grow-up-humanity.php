<?php 

/*
 * humanitys ShortCode
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



add_action('init', 'vorosa_humanity'); // Call kc_add_map function ///

if(!function_exists('vorosa_humanity')):

	function vorosa_humanity(){

		if(function_exists('kc_add_map')): // if kingComposer is active

		kc_add_map(

		    array(

		        'vorosa_humanity'  => array( // <-- shortcode tag name

		            'name'        => esc_html__('vorosa humanity',  'vorosa'),

		            'description' => esc_html__('Description Here',  'vorosa'),

		            'icon'        => 'fa-align-center',

		            'category'    => 'vorosa',

		            'params'      => array(

			         	'General' => array(

							array(

								'name'  	  => 'humanity_one_image',

								'label' 	  => esc_html__('Image', 'vorosa'),

								'type'  	  => 'attach_image',

								'value'	=> plugins_url( 'images/grow.jpg', __FILE__ ),

							),

							array(

								'type'			=> 'group',

								'label'			=> esc_html__('humanity', 'vorosa'),

								'name'			=> 'humanity_style_one_group',

								'description'	=> '',

								'options'		=> array('add_text' => esc_html__('Add new humanity', 'vorosa')),

								// default values when create new group

								'value' => base64_encode( json_encode( array(

									"1" => array(

										"humanity_one_title" => esc_html__('Who We Are', 'vorosa'),

										"humanity_one_description" => base64_encode('There are many variations of passages of Lorem Ipsum available,There are many variations of passages of Lorem Ipsum available,many variations passages of Lorem available, and they try to hard work.'),

									),

									"2" => array(

										"humanity_one_title" => esc_html__('Our Vision', 'vorosa'),

										"humanity_one_description" => base64_encode('There are many variations of passages of Lorem Ipsum available,There are many variations of passages of Lorem Ipsum available,many variations passages of Lorem available, and they try to hard work.'),

									),

									"3" => array(

										"humanity_one_title" => esc_html__('Our Mission', 'vorosa'),

										"humanity_one_description" => base64_encode('There are many variations of passages of Lorem Ipsum available,There are many variations of passages of Lorem Ipsum available,many variations passages of Lorem available, and they try to hard work.'),

									),

								))),

								

								// you can use all param type to register child params

								'params' => array(

									array(

										'name'        => 'humanity_one_title',

										'label'       => esc_html__('Tilte', 'vorosa'),

										'type'        => 'text',

									),

									array(

										'name'  	  => 'humanity_one_description',

										'label' 	  => esc_html__('Description', 'vorosa'),

										'type'  	  => 'textarea',

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

	                    				

	                    				'Title'   => array(

	                    					array( 

	                    					    'property' => 'color', 

	                    					    'label'    => esc_html__('Color', 'vorosa'),

	                    					    'selector' => '+ .single-grow h3' 

	                    					),

	                    					array(

	                    						'property' => 'font-family', 

	                    						'label'    => esc_html__('Font Family',  'vorosa'), 

	                    						'selector' => '+ .single-grow h3'

	                    					),

	                    					array( 

	                    						'property' => 'font-size', 

	                    						'label'    => esc_html__('Font Size', 'vorosa'),

	                    						'selector' => '+ .single-grow h3' 

	                    					),

	                    					array(

	                    						'property' => 'font-weight', 

	                    						'label'    => esc_html__('Font Weight', 'vorosa'),

	                    						'selector' => '+ .single-grow h3'

	                    					),

	                    					array(

												'property' => 'text-transform', 

												'label'    => esc_html__('Text Transform', 'vorosa'),

												'selector' => '+ .single-grow h3'

											),

											array(

	                    						'property' => 'letter-spacing', 

	                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 

	                    						'selector' => '+ .single-grow h3'

	                    					),

	                    					array(

	                    						'property' => 'padding', 

	                    						'label'    => esc_html__('Padding', 'vorosa'), 

	                    						'selector' => '+ .single-grow h3'

	                    					),

	                    					array(

	                    						'property' => 'margin', 

	                    						'label'    => esc_html__('Margin', 'vorosa'), 

	                    						'selector' => '+ .single-grow h3'

	                    					),

	                    				),

	                    				///

	                    				'Description'   => array(

	                    					array( 

	                    					    'property' => 'color', 

	                    					    'label'    => esc_html__('Color', 'vorosa'),

	                    					    'selector' => '+ .single-grow p' 

	                    					),

	                    					array(

	                    						'property' => 'font-family', 

	                    						'label'    => esc_html__('Font Family',  'vorosa'), 

	                    						'selector' => '+ .single-grow p'

	                    					),

	                    					array( 

	                    						'property' => 'font-size', 

	                    						'label'    => esc_html__('Font Size', 'vorosa'),

	                    						'selector' => '+ .single-grow p' 

	                    					),

	                    					array(

	                    						'property' => 'font-weight', 

	                    						'label'    => esc_html__('Font Weight', 'vorosa'),

	                    						'selector' => '+  .single-grow p'

	                    					),

	                    					array(

												'property' => 'text-transform', 

												'label'    => esc_html__('Text Transform', 'vorosa'),

												'selector' => '+  .single-grow p'

											),

											array(

	                    						'property' => 'letter-spacing', 

	                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 

	                    						'selector' => '+ .single-grow p'

	                    					),

	                    					array(

	                    						'property' => 'padding', 

	                    						'label'    => esc_html__('Padding', 'vorosa'), 

	                    						'selector' => '+ .single-grow p'

	                    					),

	                    					array(

	                    						'property' => 'margin', 

	                    						'label'    => esc_html__('Margin', 'vorosa'), 

	                    						'selector' => '+ .single-grow p'

	                    					),

	                    				),

										///

										'Image'   => array(

	                    					array(

	                    						'property' => 'padding', 

	                    						'label'    => esc_html__('Padding', 'vorosa'), 

	                    						'selector' => '+ .grow-img'

	                    					),

	                    					array(

	                    						'property' => 'margin', 

	                    						'label'    => esc_html__('Margin', 'vorosa'), 

	                    						'selector' => '+ .grow-img'

	                    					),

	                    				),

	                    				'Align' => array(

	                    					array( 

	                    						'property' => 'text-align', 

	                    						'label'    => esc_html__('Text Align', 'vorosa'),

	                    						'selector' => '+ .humanity-client-section .single-humanity'

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





 if(!function_exists('vorosa_humanity_shortcode')){

	function vorosa_humanity_shortcode($atts,$content){

	ob_start();



		$vorosa_humanity = shortcode_atts( array(

			'humanity_style_one_group'   	=> '',

			'humanity_one_title'   			=> '',

			'humanity_one_position'   		=> '',

			'humanity_one_description'   	=> '',

			'humanity_one_image'   			=> '',

			'custom_css'       					=> '',

			'custom_css_class' 					=> '',

		),$atts); 

		extract( $vorosa_humanity );



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

		

		<!-- Start humanity & Client Section -->

		<div class="col-md-6">

			<div class="grow-text">

				<?php if (isset($humanity_style_one_group)): ?>

					<?php foreach( $humanity_style_one_group as $test_one_key => $humanity_single_items ){ ?>

					<div class="single-grow mb-20">

						<h3><?php echo $humanity_single_items->humanity_one_title; ?></h3>

						<p><?php echo $humanity_single_items->humanity_one_description; ?></p>

					</div>

				<?php } ?>

				<?php endif ?>

			</div>

		</div>

		<div class="col-md-6">

		<?php $humanity_one_image_value = $humanity_one_image; ?>

			<div class="grow-img">

				<?php echo wp_get_attachment_image($humanity_one_image_value, 'full'); ?>

			</div>

		</div>

		<!-- humanity & Client Section End -->

	</div>



	<?php

		return ob_get_clean();

	}

	add_shortcode('vorosa_humanity' ,'vorosa_humanity_shortcode');

}