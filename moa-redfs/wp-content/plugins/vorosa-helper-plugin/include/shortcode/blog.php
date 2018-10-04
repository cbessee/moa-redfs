<?php 

/*
 * Tasfiu Counter ShortCode
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

add_action('init', 'our_blog'); // Call kc_add_map function ///

if(!function_exists('our_blog')):

	function our_blog(){

		if(function_exists('kc_add_map')): // if kingComposer is active

		kc_add_map(

		    array(

		        'vorosa_our_blog' => array( // <-- shortcode tag name

		            'name'        => esc_html__('Our Blog', 'vorosa'),

		            'description' => esc_html__('Description Here', 'vorosa'),

		            'icon'        => 'fa-briefcase',

		            'category'    => 'vorosa',

		            'params'      => array(

		        // .............................................

		        // ..... // Content TAB

		        // .............................................

		         	'General' => array(

						array(

								'name' 	=> 'our_blog_icon',

								'label' => esc_html__( 'Upload Icon Thumbnail', 'vorosa' ),

								'type' 	=> 'attach_image', 

								'value'	=> plugins_url( 'images/4.png', __FILE__ ),

							),

							array(

								'type'					=> 'select',

								'label'					=> esc_html__( 'Blog Icon Size', 'vorosa' ),

								'name'					=> 'blog_icon_size',

								'options'				=> array(

									'full'				=> 'Full',

									'thumbnail'			=> 'Thumbnail',

									'medium'			=> 'Medium',

									'large'				=> 'Large'

								),

							),

						array(

							'name'        => 'date_icon',

							'label'       => esc_html__('Date Icon', 'vorosa'),

							'type'        => 'icon_picker',

							'value'       => 'fa fa-calendar',

						),

						array(

							'type'			=> 'select',

							'label'			=> esc_html__( 'Select Column', 'vorosa' ),

							'name'			=> 'columns',

							'description'	=> esc_html__( 'select column for post ', 'vorosa' ),

							'options'		=> array(

								'2'=> esc_html__('Two Columns','vorosa'),

								'3'=> esc_html__('Three Column','vorosa'),

								'4'=> esc_html__('Four Column','vorosa'),

							),

							'value'			=> '3',

						),

						array(

							'type'			=> 'number_slider',

							'label'			=> esc_html__( 'Number Of Post Per Page', 'vorosa' ),

							'name'			=> 'number',

							'description'	=> esc_html__( 'Number Of Post Per Page', 'vorosa' ),

							'value'			=> '3',

						),

						array(

							'type'			=> 'number_slider',

							'label'			=> esc_html__( 'Number Of Title Word', 'vorosa' ),

							'name'			=> 'limit',

							'description'	=> esc_html__( 'Number Of Title Word', 'vorosa' ),

							'value'			=> '3',

						),

		                array(

		                    'name'        => 'custom_css_class',

		                    'label'       => esc_html__('CSS Class','vorosa'),

		                    'description' => esc_html__('Custom css class for css customisation','vorosa'),

		                    'type'        => 'text'

		                ),

						array(

							'name' => 'causes_btn_show_hide',

							'label' => __(' Blog pagination Show Hide', 'vorosa'),

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

                                                      'selector' => '+ .blog-info > h3' 

                                                  ),

                                                  array( 

                                                      'property' => 'color', 

                                                      'label'    => esc_html__('Hover Color', 'vorosa'),

                                                      'selector' => '+ .blog-info > h3 a' 

                                                  ),

                                                  array( 

                                                       'property' => 'size', 

                                                       'label'    => esc_html__('Font Size', 'vorosa'),

                                                       'selector' => '+ .blog-info > h3' 

                                                  ),

                                                  array( 

                                                       'property' => 'line-height', 

                                                       'label'    => esc_html__('line height', 'vorosa'),

                                                       'selector' => '+ .blog-info > h3' 

                                                  ),

                                                  array(

                                                       'property' => 'padding', 

                                                       'label'    => esc_html__('Padding', 'vorosa'), 

                                                       'selector' => '+ .blog-info > h3'

                                                  ),

                                                  array(

                                                       'property' => 'margin', 

                                                       'label'    => esc_html__('Margin', 'vorosa'), 

                                                       'selector' => '+ .blog-info > h3'

                                                  ),

                                             ),

											 ///

											 'Button'   => array(

                                                  array( 

                                                      'property' => 'color', 

                                                      'label'    => esc_html__('Color', 'vorosa'),

                                                      'selector' => '+ .blog-info a' 

                                                  ),

                                                  array( 

                                                       'property' => 'size', 

                                                       'label'    => esc_html__('Font Size', 'vorosa'),

                                                       'selector' => '+ .blog-info a' 

                                                  ),

                                                  array( 

                                                       'property' => 'background', 

                                                       'label'    => esc_html__('background color', 'vorosa'),

                                                       'selector' => '+ .blog-info a' 

                                                  ),

                                                  array( 

                                                       'property' => 'background', 

                                                       'label'    => esc_html__('background hover color', 'vorosa'),

                                                       'selector' => '+ .blog-info a:hover' 

                                                  ),

                                                  array( 

                                                       'property' => 'border', 

                                                       'label'    => esc_html__('border color', 'vorosa'),

                                                       'selector' => '+ .blog-info a' 

                                                  ),

                                                  array( 

                                                       'property' => 'border', 

                                                       'label'    => esc_html__('border hover color', 'vorosa'),

                                                       'selector' => '+ .blog-info a:hover' 

                                                  ),

                                                  array( 

                                                       'property' => 'line-height', 

                                                       'label'    => esc_html__('line height', 'vorosa'),

                                                       'selector' => '+ .blog-info a i' 

                                                  ),

                                                  array(

                                                       'property' => 'padding', 

                                                       'label'    => esc_html__('Padding', 'vorosa'), 

                                                       'selector' => '+ .blog-info a i'

                                                  ),

                                                  array(

                                                       'property' => 'margin', 

                                                       'label'    => esc_html__('Margin', 'vorosa'), 

                                                       'selector' => '+ .blog-info a i'

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

 function vorosa_our_blog_post_title($limit){

		$title = explode(' ', get_the_title());

		$count = array_slice($title, 0, $limit);

		echo implode(' ', $count);

	}



 /*

 * =======================================================
 *    Register Shortcode   
 * =======================================================
 */

 //[vorosa_feature  icon="" blog_image="" title="" count=""  custom_css_class=""]

 if(!function_exists('our_blog_shortcode')){

	function our_blog_shortcode($atts,$content){

	ob_start();

			$tasfiu_posts = shortcode_atts(array(

			'our_blog_icon'   => '',

			'blog_icon_size'   => '',

			'date_icon'    	  => '',

			'causes_btn_show_hide'  => '',

			'columns'    	  => '3',

			'number'    	  => '3',

			'limit'           => '3',

		   'custom_css'       =>'',

		   'custom_css_class' =>'',

			),$atts); 

			extract( $tasfiu_posts );

		//custom class		

		$wrap_class  = apply_filters( 'kc-el-class', $atts );

		if( !empty( $custom_class ) ):

			$wrap_class[] = $custom_class;

		endif;

		$extra_class =  implode( ' ', $wrap_class );

	?>
	<div class="blog__wrap <?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">
		<div class="row">
			<?php
				if (get_query_var('paged') ) {
					$causes = get_query_var('paged');
				} else {
					$causes = 1;
				};
		$args = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => $number,
				'paged' => $causes
		));
		while($args->have_posts()):$args->the_post();
		$blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'vorosa_blog_img_mini',true);
		$the_query = new WP_Query("post_type=post&paged=".get_query_var('paged'));
		$collumval = 'col-md-4 col-lg-4 col-sm-6 col-xs-12';
        if($columns !=''){
         $colwidth = round(12/$columns);
         $collumval = 'col-md-'.$colwidth.' col-sm-6 col-xs-12 mb-50';
        }
			?>
			<div class="<?php echo $collumval; ?>">
				<div class="single-blog mb-30">
					<div class="blog-img">
						<?php if(has_post_thumbnail()): ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('vorosa_blog_img_mini'); ?></a>
						<?php endif; ?>
						<div class="blog-icon">
							<a class="blog-link" href="<?php echo esc_url( get_the_permalink() ); ?>">
								<?php echo wp_get_attachment_image($our_blog_icon, $blog_icon_size); ?>
							</a>
						</div>
					</div>
					<div class="blog-info">
						<span> <?php echo get_the_time( get_option( 'date_format' ) ); ?></span>
						<h3><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_title() ;?></a></h3>
						<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__('Read More', 'vorosa' ); ?> <i class="fa fa-angle-right"></i></a>
					</div>
				</div>    
			</div>
			<?php endwhile; ?> 
		</div>
		<?php 
		$total_pages = $args->max_num_pages;
		if($causes_btn_show_hide=='yes'){ ?>
		<div class="row">
			<div class="col-xs-12 text-center">
				<div class="post-pagination">
					<?php 
						$big = 999999999; // need an unlikely integer
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
		</div>	
			<?php } ?>
		<?php
		wp_reset_postdata();
		?>
	</div>
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_our_blog' ,'our_blog_shortcode');
}