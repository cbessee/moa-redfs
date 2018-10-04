<?php

/*
 * Latest slider ShortCode
 * Author: Grand-Themes
 * Author URI: http://wphash.com/
 * Version: 1.0.0

 * ======================================================

 */



/**

 * =======================================================

 *    KC Shortcode Map

 * =======================================================

 */



add_action('init', 'latest_slider_sections'); // Call kc_add_map function ///

if(!function_exists('latest_slider_sections')):

	function latest_slider_sections(){

		if(function_exists('kc_add_map')): // if kingComposer is active

		kc_add_map(

		    array(

		        'latest_slider'  => array( // <-- shortcode tag name

		            'name'        => esc_html__('Main Slider', 'vorosa'),

		            'description' => esc_html__('Description Here', 'vorosa'),

		            'icon'        => 'fa-header',

		             'category'    => 'vorosa',

		            'params'      => array(

		        // .............................................

		        // ..... // Content TAB

		        // .............................................

		         	'General' => array(

						array(

							'type'			=> 'group',

							'label'			=> esc_html__('Slider', 'vorosa'),

							'name'			=> 'slider_area',

							'description'	=> esc_html__( 'Repeat this fields with each item created, Each item corresponding an slider element.', 'vorosa' ),

							'options'		=> array('add_text' => esc_html__(' Add New Slider', 'vorosa')),

							'value' 		=> base64_encode( json_encode(array(

							) ) ),

							'params' => array(

								array(

									'name' 			=> 'background_img',

									'label' 		=> esc_html__('Background', 'vorosa'),

									'type' 			=> 'attach_image',

									'description' 	=> esc_html__(' Choose an slider background image to display', 'vorosa'),

								),

								array(

									'name'     		=> 'subtitle',

									'label'   		=> esc_html__('Sub Title', 'vorosa'),

									'type'     		=> 'text',

									'value'  		=> 'Fashion show with designer',

									'description' 	=> esc_html__(' Contorl title', 'vorosa')

								),

								array(

									'name'     		=> 'title',

									'label'   		=> esc_html__('Title', 'vorosa'),

									'type'     		=> 'text',

									'value'  		=> 'the best collection',

									'description' 	=> esc_html__(' Contorl sub title', 'vorosa')

								),

								array(

									'name'     		=> 'desc',

									'label'    		=> esc_html__(' Description', 'vorosa'),

									'type'     		=> 'textarea',

									'value'  		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',

									'description' 	=> esc_html__(' Control description', 'vorosa')

								),

								array(

									'name'     		=> 'button_area',

									'label'    		=> esc_html__('Button Area', 'vorosa'),

									'type'     		=> 'toggle',

									'value'			=> 'yes',

									'description' 	=> esc_html__(' Control button area', 'vorosa')

								),

								array(

									'name'     		=> 'shop_link',

									'label'    		=> esc_html__('Link ', 'vorosa'),

									'type'     		=> 'link',

									'value'  		=> '#',

									'description' 	=> esc_html__(' Control link.', 'vorosa'),

									'relation'		=> array(

										'parent'	=> 'button_area',

										'show_when' => 'yes',

									),

									

								),

								array(

									'name'     		=> 'shop',

									'label'    		=> esc_html__('Button', 'vorosa'),

									'type'     		=> 'text',

									'value'  		=> 'Shop now',

									'description' 	=> esc_html__('Control the shop now button.', 'vorosa'),

									'relation'		=> array(

										'parent'	=> 'button_area',

										'show_when'	=> 'yes',

									),

								),

							),

						),

		                array(

		                    'name'        => 'custom_css_class',

		                    'label'       => esc_html__('CSS Class','vorosa'),

		                    'description' => esc_html__('Custom css class for css customisation','vorosa'),

		                    'type'        => 'text'

		                ),

		         	),

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

											'label'    => esc_html__( 'Title Color', 'vorosa' ),

											'selector' => '+ .slider-title1' 

										),

										array(

											'property' => 'font-family', 

											'label'    => esc_html__( 'Title Font Family', 'vorosa' ),

											'selector' => '+ .slider-title1'

										),

										array( 

											'property' => 'font-size', 

											'label'    => esc_html__( 'Title Font Size', 'vorosa' ),

											'selector' => '+ .slider-title1' 

										),

										array(

											'property' => 'font-weight', 

											'label'    => esc_html__( 'Title Font Weight','vorosa' ), 

											'selector' => '+ .slider-title1'

										),

										array(

											'property' => 'text-transform', 

											'label'    => esc_html__( 'Title Text Transform', 'vorosa' ),

											'selector' => '+ .slider-title1'

										),

										array(

											'property' => 'margin', 

											'label'    => esc_html__( 'Title Margin', 'vorosa' ),

											'selector' => '+ .slider-title1'

										),

										

									),

									'SubTitle'   => array(

										array( 

											'property' => 'color', 

											'label'    => esc_html__( 'Sub Title Color', 'vorosa' ),

											'selector' => '+ .slider-title3' 

										),

										array(

											'property' => 'font-family', 

											'label'    => esc_html__( 'Sub Title Font Family', 'vorosa' ),

											'selector' => '+ .slider-title3'

										),

										array( 

											'property' => 'font-size', 

											'label'    => esc_html__( 'Sub Title Font Size', 'vorosa' ),

											'selector' => '+ .slider-title3' 

										),

										array(

											'property' => 'font-weight', 

											'label'    => esc_html__( 'Sub Title Font Weight','vorosa' ), 

											'selector' => '+ .slider-title3'

										),

										array(

											'property' => 'text-transform', 

											'label'    => esc_html__( 'Sub Title Text Transform', 'vorosa' ),

											'selector' => '+ .slider-title3'

										),

										array(

											'property' => 'margin', 

											'label'    => esc_html__( 'Sub Title Margin', 'vorosa' ),

											'selector' => '+ .slider-title3'

										),

										

									),

									///////

									'Description'   => array(

										array( 

											'property' => 'color', 

											'label'    => esc_html__( 'Description Color', 'vorosa' ),

											'selector' => '+ .slider-pro-brief p' 

										),

										array(

											'property' => 'font-family', 

											'label'    => esc_html__( 'Description Font Family','vorosa' ), 

											'selector' => '+ .slider-pro-brief p'

										),

										array( 

											'property' => 'font-size', 

											'label'    => esc_html__( 'Description Font Size', 'vorosa' ),

											'selector' => '+ .slider-pro-brief p' 

										),

										array(

											'property' => 'line-height', 

											'label'    => esc_html__( 'Description Line Height', 'vorosa' ),

											'selector' => '+ .slider-pro-brief p'

										),

										array(

											'property' => 'font-weight', 

											'label'    => esc_html__( 'Description Font Weight', 'vorosa' ),

											'selector' => '+ .slider-pro-brief p'

										),

										array(

											'property' => 'margin', 

											'label'    => esc_html__( 'Description Margin', 'vorosa' ),

											'selector' => '+ .slider-pro-brief p'

										),

										

									),

									///

									'Button' => array(

										array( 

											'property' => 'color', 

											'label'    => esc_html__( 'Button Text Color','vorosa' ), 

											'selector' => '+ .button-one.style-2' 

										),

										array( 

											'property' => 'color', 

											'label'    => esc_html__( 'Button Text Hover Color','vorosa' ),

											'selector' => '+ .slider-area .button-one::before' 

										),

										array( 

											'property' => 'border-color', 

											'label'    => esc_html__( 'Border Color','vorosa' ),

											'selector' => '+ .button-one::after' 

										),

										array( 

											'property' => 'background-color', 

											'label'    => esc_html__( 'Button Hover Color','vorosa' ),

											'selector' => '+ .slider-area .button-one::before' 

										),

										

										array( 

											'property' => 'padding', 

											'label'    => esc_html__( 'Padding','vorosa' ),

											'selector' => '+ .button-one.style-2' 

										),

									),

									///

									'Extra' => array(

										array(

											'property' => 'padding',

											'label'    => esc_html__( 'Padding','vorosa' ),

											'selector' => '+ .title-container.s-tb-c.title-compress ',

										),

										array(

											'property' => 'text-align',

											'label'    => esc_html__( 'Text align','vorosa' ),

											'selector' => '+ .title-container.s-tb-c.title-compress ',

										),

										array(

											'property' => 'background-color',

											'label'    => esc_html__( 'Progress Color','vorosa' ),

											'selector' => '+ .slider-progress',

										)

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









 /**

 * =======================================================

 *    Register Shortcode slider section

 * =======================================================

 */     

 // [latest_section_title title="" description="" custom_css_class=""]

if(!function_exists('latest_slider_section_shortcode')){

	function latest_slider_section_shortcode($atts,$content){

	ob_start();

			extract( $atts );

		//custom class		

		$wrap_class  = apply_filters( 'kc-el-class', $atts );

		if( !empty( $custom_class ) ):

			$wrap_class[] = $custom_class;

		endif;

		$extra_class =  implode( ' ', $wrap_class );

	?>

	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr($custom_css_class); ?>">

		<!-- SLIDER-BANNER-AREA START -->

		<!-- slider-area start -->

			<div class="slider-area">

				<div class="slider-active owl-carousel">

				

					<?php  foreach( $slider_area as $items ): 

					

				$images = wp_get_attachment_image_src($items->background_img,'full');						

					

					?>

				

					<div class="single-slider pb-340 pt-240 bg-img" style="background-image:url(<?php echo $images[0]; ?>);" data-overlay="5">



						<div class="container">

							<div class="slider-text text-center z-index">

								<h2 class="animated"><?php //echo $items->subtitle; ?></h2>

								<h1 class="animated"><?php //echo $items->title; ?></h1>

								<div class="animated">

									<?php //echo wpautop( $items->descriptions ); ?>

								</div>

								<a class="button theme-bg animated" href="<?php// echo $link_url; ?>"><?php// echo  $items->button; ?></a>

							</div>

						</div>

					</div>

				

					<?php endforeach; ?>

				

					

					

				



					

				</div>

			</div>

			<!-- slider end -->	

		<!-- End Slider-section -->

	</div>

	

	<?php

		return ob_get_clean();

	}

	add_shortcode('latest_slider' ,'latest_slider_section_shortcode');

}

