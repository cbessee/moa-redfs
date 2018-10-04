<?php 
/*
 * vorosa events ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */
add_action('init', 'event'); // Call kc_add_map function ///
if(!function_exists('event')):
	function event(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_event' => array( // <-- shortcode tag name
		            'name'        => esc_html__('Events', 'vorosa'),
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
							'label'			=> esc_html__( 'Number Of event', 'vorosa' ),
							'name'			=> 'number',
							'description'	=> esc_html__( 'Number Of event', 'vorosa' ),
							'value'			=> '3',
						),
						array(
							'type'			=> 'number_slider',
							'label'			=> esc_html__( 'Number Of Title Word', 'vorosa' ),
							'name'			=> 'limit_title',
							'description'	=> esc_html__( 'Number Of Title Word', 'vorosa' ),
							'value'			=> '4',
						),
						array(
							'type'			=> 'number_slider',
							'label'			=> esc_html__( 'Number Of Content Word', 'vorosa' ),
							'name'			=> 'limit_content',
							'description'	=> esc_html__( 'Number Of Content Word', 'vorosa' ),
							'value'			=> '20',
						),
		                array(
		                    'name'        => 'custom_css_class',
		                    'label'       => esc_html__('CSS Class','vorosa'),
		                    'description' => esc_html__('Custom css class for css customisation','vorosa'),
		                    'type'        => 'text'
		                ),
						array(
							'name' => 'icon_date',
							'label'       => esc_html__('Change Icon','vorosa'),
							'type' => 'icon_picker',
							'description' => 'Field Description',
							'value' => 'sl-calender',
						),
						array(
							'name' => 'icon_time',
							'label'       => esc_html__('Change Icon','vorosa'),
							'type' => 'icon_picker',
							'description' => 'Field Description',
							'value' => 'sl-clock',
						),
						array(
							'name' => 'icon_location',
							'label'       => esc_html__('Change Icon','vorosa'),
							'type' => 'icon_picker',
							'description' => 'Field Description',
							'value' => 'sl-location-pin',
						),
						array(
							'name' => 'causes_btn_show_hide',
							'label' => __(' Event pagination Show Hide', 'vorosa'),
							'type' => 'toggle',
							'value' => 'yes',
							'options' => array(
								'yes' => __('Show', 'vorosa'),
								'no' => __('Hide', 'vorosa')
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
                                                      'selector' => '+ .event-info > h3 a' 
                                                  ),
                                                  array( 
                                                      'property' => 'color', 
                                                      'label'    => esc_html__('Hover Color', 'vorosa'),
                                                      'selector' => '+ .event-info > h3 a:hover' 
                                                  ),
                                                  array( 
                                                       'property' => 'font-family', 
                                                       'label'    => esc_html__('Font Family', 'vorosa'),
                                                       'selector' => '+ .event-info > h3' 
                                                  ),
                                                  array( 
                                                       'property' => 'font-size', 
                                                       'label'    => esc_html__('Font Size', 'vorosa'),
                                                       'selector' => '+ .event-info > h3' 
                                                  ),
                                                  array( 
                                                       'property' => 'font-weight', 
                                                       'label'    => esc_html__('Font weight', 'vorosa'),
                                                       'selector' => '+ .event-info > h3' 
                                                  ),
                                                  array( 
                                                       'property' => 'line-height', 
                                                       'label'    => esc_html__('line height', 'vorosa'),
                                                       'selector' => '+ .event-info > h3' 
                                                  ),
                                                  array(
                                                       'property' => 'padding', 
                                                       'label'    => esc_html__('Padding', 'vorosa'), 
                                                       'selector' => '+ .event-info > h3'
                                                  ),
                                                  array(
                                                       'property' => 'margin', 
                                                       'label'    => esc_html__('Margin', 'vorosa'), 
                                                       'selector' => '+ .event-info > h3'
                                                  ),
                                             ),
											  'Button'   => array(
                                                  array( 
                                                      'property' => 'color', 
                                                      'label'    => esc_html__('Color', 'vorosa'),
                                                      'selector' => '+ .event-info a.button' 
                                                  ),
                                                  array( 
                                                       'property' => 'font-size', 
                                                       'label'    => esc_html__('Font Size', 'vorosa'),
                                                       'selector' => '+ .event-info a.button' 
                                                  ),
                                                  array( 
                                                       'property' => 'line-height', 
                                                       'label'    => esc_html__('line height', 'vorosa'),
                                                       'selector' => '+ .event-info a.button' 
                                                  ),
												  array( 
                                                      'property' => 'background-color', 
                                                      'label'    => esc_html__('background Color', 'vorosa'),
                                                      'selector' => '+ .theme-bg' 
                                                  ),
												  array( 
                                                      'property' => 'text-transform', 
                                                      'label'    => esc_html__('Text Transform', 'vorosa'),
                                                      'selector' => '+ .event-info a.button' 
                                                  ),
                                                  array(
                                                       'property' => 'padding', 
                                                       'label'    => esc_html__('Padding', 'vorosa'), 
                                                       'selector' => '+ .event-info a.button'
                                                  ),
                                                  array(
                                                       'property' => 'margin', 
                                                       'label'    => esc_html__('Margin', 'vorosa'), 
                                                       'selector' => '+ .event-info a.button'
                                                  ),
                                             ),
											///
											'Background' => array(
												array( 
		                    					    'property' => 'background-color', 
		                    					    'label'    => esc_html__('Background Hover', 'vorosa'),
		                    					    'selector' => '+ .our-blog-img a::before' 
		                    					),
		                    					array(
		                    						'property' => 'border-color',
		                    						'label'    => esc_html__('Border Color','vorosa'),
		                    						'selector' => '+ .our-blog-title, .our-blog-title h3' 
		                    					),
											),
		                    				///
											'Box' => array(
												array(
													'property'   => 'margin',
													'label'      => esc_html__( 'Section Margin','vorosa' ),
													'selector'   => '+ .our-single-blog',
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
 function vorosa_event_title($limit){
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
 if(!function_exists('event_shortcode')){
	function event_shortcode($atts,$content){
	ob_start();
			$vorosa_posts = shortcode_atts(array(
			'number'    	  => '3',
			'limit_title'     => '4',
			'causes_btn_show_hide'  => '',
			'icon_date'     => '',
			'icon_time'     => '',
			'icon_location'     => '',
			'limit_content'     => '20',
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
		<div class="event-area">
			<?php 

				if (get_query_var('paged') ) {
					$causes = get_query_var('paged');
				} else {
					$causes = 1;
				};

				$args = new WP_Query(array(
						'post_type'      => 'event',
						'posts_per_page' => $number,
						'paged' => $causes
					));
				while($args->have_posts()):$args->the_post();

				$event_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'vorosa_event_img_mini',true);
				$the_query = new WP_Query("post_type=post&paged=".get_query_var('paged'));
				
				
				$event_date = get_post_meta(get_the_ID(),'_vorosa_event_date',true);
				$event_time_start = get_post_meta(get_the_ID(),'_vorosa_event_time',true);
				$event_time_end = get_post_meta(get_the_ID(),'_vorosa_event_time_end',true);
				$event_location = get_post_meta(get_the_ID(),'_vorosa_event_location',true);
				
			?>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="event-img-info mb-30">
					<?php if(has_post_thumbnail()): ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $event_image[0]; ?>" alt="event images" /></a>
					<?php endif; ?>
					<div class="event-info">
						<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),$limit_title );?></a></h3>
						<div class="event-time-date">
							<span><i class="<?php echo esc_attr( $icon_date); ?>"></i> <?php echo esc_html( $event_date ); ?></span>
							<span><i class="<?php echo esc_attr( $icon_time); ?>"></i> <?php echo esc_html( $event_time_start ); ?> <?php esc_html_e('-', 'vorosa'); ?> <?php echo esc_html( $event_time_end ); ?></span>
							<span><i class="<?php echo esc_attr( $icon_location); ?>"></i> <?php echo esc_html( $event_location ); ?></span>
						</div>
					</div>
				</div>
			</div>
			
			<?php endwhile;

             $total_pages = $args->max_num_pages;
				?>
				<?php if($causes_btn_show_hide=='yes'){ ?>

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

	add_shortcode('vorosa_event' ,'event_shortcode');

}