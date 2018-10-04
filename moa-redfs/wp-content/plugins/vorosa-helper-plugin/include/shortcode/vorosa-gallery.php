<?php 
/*
  * vorosa gallery Shortcode 
  * Author: Grand-Themes
  * Author URI: http://wphash.com/
  * Version: 1.0.0
  *
  *
  * =======================================================
  *    Register portfolio shortcode
  * =======================================================
*/
add_action('init', 'vorosa_gallery_sections'); // Call kc_add_map function ///
if(!function_exists('vorosa_gallery_sections')):
	function vorosa_gallery_sections(){
		
		$vorosa_portfolio_arg = array();
		$vorosa_portfolio_terms = get_terms( 'gallery_cat', array(
		    'hide_empty' => false,
		) );
		foreach($vorosa_portfolio_terms as $vorosa_portfolio_term){
			$vorosa_portfolio_arg[$vorosa_portfolio_term->slug] = $vorosa_portfolio_term->name;
		}
		array_push( $vorosa_portfolio_arg , 'ALL' ) ;
		
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_gallery'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('vorosa Gallery', 'vorosa'),
		            'description' => esc_html__('Description Here', 'vorosa'),
		            'icon'        => 'fa-header',
		            'category'    => 'vorosa',
		            'params'      => array(
		        // .............................................
		        // ..... // Content TAB
		        // .............................................
		         	'General' => array(
						array(
			                    'name'        => 'gallery_cat',
			                    'label'       => esc_html__('Category','vorosa'),
			                    'description' => esc_html__('Show posts associated with certain categories.','vorosa'),
			                    'type'        => 'select',
			                    'options' 	  => $vorosa_portfolio_arg, 
			                    'value' 	  => '0'
			                ),
						array(							'name' 	=> 'gallery_icon',							'label' => esc_html__( 'Change Icon', 'vorosa' ),							'type' 	=> 'attach_image', 							'value'	=> plugins_url( 'images/8.png', __FILE__ ),							'relation' => array(								'parent' => 'gellary_style',								'show_when' => 'style_1',							)													),						array(							'type'					=> 'select',							'label'					=> esc_html__( 'Icon Size', 'vorosa' ),							'name'					=> 'gallery_icon_size',							'options'				=> array(								'full'				=> 'Full',								'thumbnail'			=> 'Thumbnail',								'medium'			=> 'Medium',								'large'				=> 'Large'							),						),
						array(
							'name'        => 'gellary_style',
							'label'       => esc_html__('How To Display','vorosa'),
							'type'        => 'select',
							'options' => array(  
								'style_1' => 'Style One',
								'style_2' => 'Style Two',
							), 
							'value' => 'style_1'
						),
						
						array(
							'name'        => 'gellary_col',
							'label'       => esc_html__('Number Of item a row','vorosa'),
							'description' => 'Large Sereen',
							'type'        => 'select',
							'options' => array(  
								'12' => '1',
								'6' => '2',
								'4' => '3',
								'3' => '4',
								'2' => '6',
								'1' => '12',
							), 
							'value' => '4',
							'relation' => array(
								'parent' => 'gellary_style',
								'show_when' => 'style_1',
							)
						),
						array(
			                    'name'        => 'vorosa_portfolio_order',
			                    'label'       => esc_html__('Order','vorosa'),
			                    'description' => esc_html__('Sort posts. ','vorosa'),
			                    'type'        => 'select',
			                    'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'ASC' => 'ASC ( Lowest to highest )',
									'DESC' => 'DESC ( Highest to lowest )',
								), 
			                    'value' => 'DESC'
			                ),
						array(
								'name' => 'vorosa_portfolio_post_per_page',
								'label' => esc_html__( 'Post Per Page', 'vorosa' ),
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => -1,
									'max' => 50,
									'show_input' => true
								),
								'value' => '-1', // remove this if you do not need a default content 
								'description' => esc_html__( 'The number of items you want to see on the screen. [ -1 for all posts. ]', 'vorosa' ),
							),
						array(
							'name' => 'causes_btn_show_hide',
							'label' => __(' Gallery Pagination Show Hide', 'vorosa'),
							'type' => 'toggle',
							'value' => 'yes',
							'options' => array(
								'yes' => __('Show', 'vorosa'),
								'no' => __('Hide', 'vorosa')
							),
						),
		                array(
		                    'name'        => 'custom_css_class',
		                    'label'       => esc_html__('CSS Class','vorosa'),
		                    'description' => esc_html__('Custom css class for css customisation','vorosa'),
		                    'type'        => 'text'
		                ),

		         	), // content
		        // ............................................
		        // ..... // Styling
		        // .............................................
		                    'styling' => array(
		                    	array(
		                    		'name'   => 'custom_css',
		                    		'type'   => 'css',
		                    		'options' => array(
		                    			array(
		                    				'screens' => 'any,1024,999,767,479',
		                    				
		                    				'icon'   => array(
												array( 
		                    					    'property' => 'color', 
		                    					    'label'    => esc_html__('Icon Color', 'vorosa'),
		                    					    'selector' => '+ .htc__hover__action a i' 
		                    					),
												array( 
		                    					    'property' => 'font-size', 
		                    					    'label'    => esc_html__('Icon font size', 'vorosa'),
		                    					    'selector' => '+ .htc__hover__action a i' 
		                    					),
		                    					array(
		                    						'property' => 'background-color', 
		                    						'label'    => esc_html__('Background color', 'vorosa'),
		                    						'selector' => '+ .htc__hover__action a'
		                    					),
		                    					array( 
		                    						'property' => 'background-color', 
		                    						'label'    => esc_html__('Background Hover Color','vorosa'), 
		                    						'selector' => '+ .htc__hover__action a:hover' 
		                    					),
		                    					array( 
		                    						'property' => 'border', 
		                    						'label'    => esc_html__('Icon Border Color','vorosa'), 
		                    						'selector' => '+ .htc__hover__action a' 
		                    					),
		                    					
		                    				),
		                    				///
											'background' => array(
		                    					array( 
		                    					    'property' => 'background-color', 
		                    					    'label'    => esc_html__('Portfolio Background Hover Color', 'vorosa'),
		                    					    'selector' => '+ .tf-portfolio-hover-information::before ' 
		                    					),
											),
											///
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
	if( !function_exists ('vorosa_gallery_section')){
		function vorosa_gallery_section( $atts,$content=null){
			ob_start();
			$vorosa_gallery_shortcode = shortcode_atts( array(
				'number'            => -1,
				'gallery_icon'      => '',				'gallery_icon_size' => '',
				'show_hide'         => '',
				'causes_btn_show_hide'  => '',
				'custom_css_class'  => '',
				'gallery_cat'     => '',
				'vorosa_portfolio_post_per_page'     => '',
				'vorosa_portfolio_order'     => '',
				'gellary_style'     => '',
				'gellary_col'     => '',
				
				
			) ,$atts );
			extract( $vorosa_gallery_shortcode );
			
			
			$wrap_class = apply_filters('kc-el-class',$atts);
			if( !empty ( $custom_class) ):
				$wrap_class[] = $custom_class;
			 endif;
			$extra_class = implode(' ', $wrap_class );

			?>
		<!-- portfolio-area-start -->
	<div class="<?php echo esc_attr( $extra_class ); ?><?php echo esc_attr( $custom_css_class );?>">
	
	
	
	<?php if('style_1' == $gellary_style){ ?>
		<section id="tf-portfolio-area" class="tf-portfolio-wrap bg-white ptb-100 xtb-60">
			<div class="tf-portfolio-row">
				<div class="tf-portfolio-container clearfix">
					<?php 

						if (get_query_var('paged') ) {
							$causes = get_query_var('paged');
						} else {
							$causes = 1;
						};

						if ('0' == $gallery_cat) {
									$gallery_cats = new WP_Query( array(
										'post_type'      => 'gallerys',
										'order' => $vorosa_portfolio_order,
										'posts_per_page'    =>  $vorosa_portfolio_post_per_page,
										'paged' => $causes 
									));
								} else {
									$gallery_cats = new WP_Query( array(
										'post_type'      => 'gallerys',
										'gallery_cat' => $gallery_cat,
										'order' => $vorosa_portfolio_order,
										'posts_per_page'    =>  $vorosa_portfolio_post_per_page,
										'paged' => $causes 
									));
								}
						while($gallery_cats->have_posts()):$gallery_cats->the_post();
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'vorosa_portfolio_img',true);

						// Get the URL of this category
						
					?>
					<!-- Start single portfolio -->
			 
					<div class="col-md-4 col-lg-<?php echo esc_attr( $gellary_col ); ?> col-sm-6 col-xs-12">
						<div class="portfolio">
							<div class="portfolio__inner">
								<div class="htc__hover__fornt">
									<img src="<?php echo $image['0']; ?>" alt="Gallery image">
								</div>
								<div class="htc__hover__information">
									<div class="htc__hover__action">
										<a class="image-popup" href="<?php echo $image['0']; ?>">										<?php echo wp_get_attachment_image($gallery_icon, $gallery_icon_size); ?>										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- End single portfolio -->
					<?php endwhile;

			            $total_pages = $gallery_cats->max_num_pages;
						?>
						<?php if($causes_btn_show_hide=='yes'){ ?>
							<div class="clearfix"></div>
							<div class="col-md-12 text-center">
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
							<?php } ?>
						<?php

						wp_reset_postdata();
					?>
					<!--End single portfolio-->
				</div>
			</div>
        </section>
        <!-- End of Portfolio Area -->
	<?php }else{ ?>
		<section id="tf-portfolio-area" class="tf-portfolio-wrap bg-white ptb-100 xtb-60">
                <div class="tf-portfolio-row">
                    <div class="tf-portfolio-container clearfix">
					
						<div class="gallery-slider-2 z-index">
							<div class="gallery-active">
							<?php 
							
								if ('0' == $gallery_cat) {
									$gallery_cats = new WP_Query( array(
										'post_type'      => 'gallerys',
										'order' => $vorosa_portfolio_order,
										'posts_per_page'    =>  $vorosa_portfolio_post_per_page, 
									));
								} else {
									$gallery_cats = new WP_Query( array(
										'post_type'      => 'gallerys',
										'gallery_cat' => $gallery_cat,
										'order' => $vorosa_portfolio_order,
										'posts_per_page'    =>  $vorosa_portfolio_post_per_page, 
									));
								}
							
								while($gallery_cats->have_posts()):$gallery_cats->the_post();
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'vorosa_gallery_img',true);
								$categories = get_the_terms(get_the_id(),'gallery_cat',true);

								// Get the URL of this category
								
							?>
							<!-- Start single portfolio -->
								<div class="gallery-slider-img">
									<img src="<?php echo $image['0']; ?>" alt="Gallery image">
								</div>							
							<!-- End single portfolio -->
							<?php endwhile; 
								wp_reset_postdata();
							?>
							</div>
						</div>
                        <!--End single portfolio-->
                    </div>
                </div>
        </section>
        <!-- End of Portfolio Area -->
	<?php } ?>
	
	
	
	
        
	</div>
		<!-- portfolio-area-end -->
		<?php
			return ob_get_clean();
		}
		add_shortcode('vorosa_gallery','vorosa_gallery_section');
	}

	