<?php 

/*
 * vorosa causess ShortCode
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

add_action('init', 'causes'); // Call kc_add_map function ///

if(!function_exists('causes')):

	function causes(){

		if(function_exists('kc_add_map')): // if kingComposer is active

		kc_add_map(

		    array(

		        'vorosa_causes' => array( // <-- shortcode tag name

		            'name'        => esc_html__('causes', 'vorosa'),

		            'description' => esc_html__('Description Here', 'vorosa'),

		            'icon'        => 'fa-briefcase',

		            'category'    => 'vorosa',

		            'params'      => array(

		        // .............................................

		        // ..... // Content TAB

		        // .............................................

		         	'General' => array(

						array(

							'type'			=> 'number_slider',

							'label'			=> esc_html__( 'Number Of causes', 'vorosa' ),

							'name'			=> 'number',

							'description'	=> esc_html__( 'Number Of causes', 'vorosa' ),

							'value'			=> '3',

						),


						array(

							'name' => 'pagination_show_side',

							'label' => __(' Pagination Show/Hide', 'vorosa'),

							'type' => 'toggle',

							'value' => 'yes',

							'options' => array(

								'yes' => __('Show', 'vorosa'),

								'no' => __('Hide', 'vorosa')

							),

						),

		                array(

		                    'name'        => 'causes_readmore',

		                    'label'       => esc_html__('Donate Button Text','vorosa'),

		                    'description' => esc_html__('Set your donate button text','vorosa'),

		                    'type'        => 'text'

		                ),

		                array(

		                    'name'        => 'custom_css_class',

		                    'label'       => esc_html__('CSS Class','vorosa'),

		                    'description' => esc_html__('Custom css class for css customisation','vorosa'),

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

                                                      'selector' => '+ .causes-info > h3 a' 

                                                  ),

                                                  array( 

                                                      'property' => 'color', 

                                                      'label'    => esc_html__('Hover Color', 'vorosa'),

                                                      'selector' => '+ .causes-info > h3 a:hover' 

                                                  ),

                                                  array( 

                                                       'property' => 'font-family', 

                                                       'label'    => esc_html__('Font Family', 'vorosa'),

                                                       'selector' => '+ .causes-info > h3' 

                                                  ),

                                                  array( 

                                                       'property' => 'font-size', 

                                                       'label'    => esc_html__('Font Size', 'vorosa'),

                                                       'selector' => '+ .causes-info > h3' 

                                                  ),

                                                  array( 

                                                       'property' => 'font-weight', 

                                                       'label'    => esc_html__('Font weight', 'vorosa'),

                                                       'selector' => '+ .causes-info > h3' 

                                                  ),

                                                  array( 

                                                       'property' => 'line-height', 

                                                       'label'    => esc_html__('line height', 'vorosa'),

                                                       'selector' => '+ .causes-info > h3' 

                                                  ),

                                                  array(

                                                       'property' => 'padding', 

                                                       'label'    => esc_html__('Padding', 'vorosa'), 

                                                       'selector' => '+ .causes-info > h3'

                                                  ),

                                                  array(

                                                       'property' => 'margin', 

                                                       'label'    => esc_html__('Margin', 'vorosa'), 

                                                       'selector' => '+ .causes-info > h3'

                                                  ),

                                             ),

											  'Button'   => array(

                                                  array( 

                                                      'property' => 'color', 

                                                      'label'    => esc_html__('Color', 'vorosa'),

                                                      'selector' => '+ .give-btn-wrapper .give-btn' 

                                                  ),

												  array( 

                                                      'property' => 'background-color', 

                                                      'label'    => esc_html__('background Color', 'vorosa'),

                                                      'selector' => '+ .give-btn-wrapper .give-btn' 

                                                  ),
                                                  array( 

                                                       'property' => 'font-size', 

                                                       'label'    => esc_html__('Font Size', 'vorosa'),

                                                       'selector' => '+ .give-btn-wrapper .give-btn' 

                                                  ),

                                                  array( 

                                                       'property' => 'line-height', 

                                                       'label'    => esc_html__('line height', 'vorosa'),

                                                       'selector' => '+ .give-btn-wrapper .give-btn' 

                                                  ),


												  array( 

                                                      'property' => 'text-transform', 

                                                      'label'    => esc_html__('Text Transform', 'vorosa'),

                                                      'selector' => '+ .give-btn-wrapper .give-btn' 

                                                  ),

                                                  array(

                                                       'property' => 'padding', 

                                                       'label'    => esc_html__('Padding', 'vorosa'), 

                                                       'selector' => '+ .give-btn-wrapper .give-btn'

                                                  ),

                                                  array(

                                                       'property' => 'margin', 

                                                       'label'    => esc_html__('Margin', 'vorosa'), 

                                                       'selector' => '+ .give-btn-wrapper .give-btn'

                                                  ),

                                             ),

											///

											'Background' => array(

												array( 

		                    					    'property' => 'background-color', 

		                    					    'label'    => esc_html__('Background Hover', 'vorosa'),

		                    					    'selector' => '+ .causes-area .single-causes' 

		                    					),

												array( 

		                    					    'property' => 'padding', 

		                    					    'label'    => esc_html__('Padding', 'vorosa'),

		                    					    'selector' => '+ .causes-info' 

		                    					),

											),

		                    				///

											'Box' => array(

												array(

													'property'   => 'margin',

													'label'      => esc_html__( 'Section Margin','vorosa' ),

													'selector'   => '+ .single-causes.mb-30',

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

 function vorosa_causes_title($limit){

		$title = explode(' ', get_the_title());

		$count = array_slice($title, 0, $limit);

		echo implode(' ', $count);

	}



 /*

 * =======================================================
 *    Register Shortcode   
 * =======================================================
 */

 //[vorosa_feature  icon="" image="" title="" count=""  custom_css_class=""]

 if(!function_exists('causes_shortcode')){

	function causes_shortcode($atts,$content){

	ob_start();

			$vorosa_posts = shortcode_atts(array(
			'number'    	  => '3',
			'pagination_show_side'  => '',
			'causes_readmore'  => '',
		    'custom_css'       =>'',
		    'custom_css_class' =>'',

			),$atts); 

			extract( $vorosa_posts );

		//custom class		

		$wrap_class  = apply_filters( 'kc-el-class', $atts );

		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );
	?>

	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">

		<div class="causes-area">

			<?php 
				if (get_query_var('paged') ) {
					$causes = get_query_var('paged');
				} else {
					$causes = 1;
				};
				$args = new WP_Query(array(
						'post_type'      => 'causes',
						'posts_per_page' => $number,
						'paged' => $causes
					));

				while($args->have_posts()):$args->the_post();

				$causes_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'vorosa_causes_img_mini',true);
				$causes_fill_up = get_post_meta(get_the_ID(),'_vorosa_fill_up',true);
				$causes_target = get_post_meta(get_the_ID(),'_vorosa_target',true);

			?>

			<div class="col-md-4 col-sm-4">
				<div class="single-causes mb-30">
					<?php if(has_post_thumbnail()): ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $causes_image[0]; ?>" alt="causes images" /></a>
					<?php endif; ?>

					<div class="causes-info">

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php the_excerpt(); ?>
						<?php if ( isset( $causes_readmore ) ) : ?>
						<div class="give-btn-wrapper">
							<a class="give-btn" href="<?php the_permalink(); ?>"><?php echo esc_html( $causes_readmore ); ?></a>
						</div>
						<?php endif; ?>						
					</div>


				</div>
			</div>
			<?php endwhile;
             $total_pages = $args->max_num_pages;

				?>
				<?php if($pagination_show_side=='yes'){ ?>
					<div class="col-md-12 text-center">
						<div class="post-pagination">
							<?php 
								$big = 999999999; 
								 echo paginate_links( array(
								    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
								    'format' => '?paged=%#%',
								    'current' => max( 1, get_query_var('paged') ),
								    'total' => $total_pages,
								    'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
                					'next_text'    => __('<i class="fa fa-angle-right"></i>'),
								) );
							?>

						</div>

					</div>

					<?php } ?>

				<?php
				wp_reset_postdata();
			 ?>
		</div>
	</div>
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_causes' ,'causes_shortcode');
}