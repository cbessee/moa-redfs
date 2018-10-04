<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vorosa
 */

get_header(); 
	if( have_posts() ) :
	
	$vorosa_opt = vorosa_get_opt();
	$vorosa_blog_single = '';
	$vorosa_blog_single = $vorosa_opt ['vorosa_single_pos'];
	$post_layout_value = get_post_meta(get_the_id(),'_vorosa_post_layout',true);

	if( !empty( $post_layout_value ) ){
		$post_details_layout = $post_layout_value ;
	}else{
		$post_details_layout = $vorosa_blog_single;
	}
	
	$event_date = get_post_meta(get_the_ID(),'_vorosa_event_date',true);
	$event_time_start = get_post_meta(get_the_ID(),'_vorosa_event_time',true);
	$event_time_end = get_post_meta(get_the_ID(),'_vorosa_event_time_end',true);
	$event_location = get_post_meta(get_the_ID(),'_vorosa_event_location',true);
	$event_hone = get_post_meta(get_the_ID(),'_vorosa_event_hone',true);
	$event_website = get_post_meta(get_the_ID(),'_vorosa_event_website',true);
	$event_website_link = get_post_meta(get_the_ID(),'_vorosa_event_website_link',true);
	$event_organizer_phone = get_post_meta(get_the_ID(),'_vorosa_event_organizer_phone',true);
	$event_organizer_website = get_post_meta(get_the_ID(),'_vorosa_event_organizer_website',true);
	$event_organizer_website_link = get_post_meta(get_the_ID(),'_vorosa_event_organizer_website_link',true);
	$event_locations = get_post_meta(get_the_ID(),'_vorosa_event_locations',true);
	$event_map_api = get_post_meta(get_the_ID(),'_vorosa_event_map_api',true);
	
?>
	<div class="blog-story-area pt-80">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<div class="event-left-sidebar">
						<?php 
						while ( have_posts() ) : the_post(); 
						if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('vorosa_event_img'); ?>
						<?php } ?>
						<div class="event-text">
							<h3><?php the_title(); ?></h3>
							<span><?php the_time('F . j . Y'); ?></span>
							<?php the_content(); ?>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="event-map-info">
						<?php if ( !empty( $event_locations ) ) : ?>
						<div class="event-map">
							<div id="hastech"></div>
						</div>
						<?php endif; ?>
						<div class="eventpage-info">
							<?php if ( !empty( $event_location ) ) : ?>
							<div class="single-event-info">
								<h4><?php esc_html_e('Venue', 'vorosa'); ?></h4>
								<p><?php echo esc_html( $event_location ); ?></p>
							</div>
							<?php endif; ?>

							<div class="single-event-info">
								<h4><?php esc_html_e('Event Details', 'vorosa'); ?></h4>
								<ul>
									<?php if ( !empty( $event_date ) ) : ?>
									<li>
										<span><?php esc_html_e('Date :', 'vorosa'); ?></span> 
										<?php echo esc_html( $event_date ); ?> 
									</li>
									<?php endif; ?>
									<?php if ( !empty( $event_hone ) ) : ?>
									<li>
										<span><?php esc_html_e('Phone :', 'vorosa'); ?></span>
										<?php echo esc_html( $event_hone ); ?>
									</li>
									<?php endif; ?>
									<?php if ( !empty( $event_website ) ) : ?>
									<li>
										<span><?php esc_html_e('Website :', 'vorosa'); ?></span>
										<a href="<?php echo esc_url( $event_website_link ); ?>"><?php echo esc_html( $event_website ); ?></a>
									</li>
									<?php endif; ?>

									<?php if ( !empty( $event_time_start ) && !empty( $event_time_end ) ) : ?>
									<li>
										<span><?php esc_html_e('Time :', 'vorosa'); ?></span>
										<?php echo esc_html( $event_time_start ); ?>
										<?php esc_html_e('to', 'vorosa'); ?> <?php echo esc_html( $event_time_end ); ?>
									</li>
									<?php endif; ?>
								</ul>
							</div>
							<?php if ( !empty( $event_organizer_phone ) || !empty( $event_organizer_website ) ) : ?>
							<div class="single-event-info">
								<h4><?php esc_html_e('Organizer', 'vorosa'); ?></h4>
								<ul>
									<?php if ( !empty( $event_organizer_phone ) ) : ?>
									<li>
										<span><?php esc_html_e('Phone :', 'vorosa'); ?></span> 
										<?php echo esc_html( $event_organizer_phone ); ?>
									</li>
									<?php endif; ?>
									<?php if ( !empty( $event_organizer_website ) ) : ?>
									<li>
										<span><?php esc_html_e('Website :', 'vorosa'); ?></span>
										<a href="<?php echo esc_url( $event_organizer_website_link ); ?>">
											<?php echo esc_html( $event_organizer_website ); ?>
										</a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- google map api -->
	<script src="http://maps.googleapis.com/maps/api/js?key=<?php echo esc_js( $event_map_api ); ?>"></script>
	<script>
		var myCenter=new google.maps.LatLng(<?php echo esc_js( $event_locations ); ?>);
		function vorosa_initialize()
		{
			var mapProp = {
			  center:myCenter,
			  scrollwheel: false,
			  zoom:17,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			var map=new google.maps.Map(document.getElementById("hastech"),mapProp);
			var marker=new google.maps.Marker({
			  position:myCenter,
				animation:google.maps.Animation.BOUNCE,
				icon:'<?php echo get_template_directory_uri(); ?>/images/contact.png',
				map: map,
			  });
			marker.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', vorosa_initialize);
	</script>
<?php endif;

get_footer();