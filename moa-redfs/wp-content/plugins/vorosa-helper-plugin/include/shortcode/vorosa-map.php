<?php 
/*
 * Google Map ShortCode * Author: Grand-Themes * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */

add_action('init', 'vorosa_google_map'); // Call kc_add_map function ///
if(!function_exists('vorosa_google_map')):
	function vorosa_google_map(){
		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_google_map'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('Google Map',  'vorosa'),
		            'description' => esc_html__('Show google maps with your style',  'vorosa'),
		            'icon'        => 'fa-map',
		            'category'    => 'vorosa',
		            'params'      => array(
		        
			         	'General' => array(
			         		array(
								'name'        => 'map_random_id',
								'label'       => '',
								'type'        => 'random',
								'description' => '',
							),
							array(
								'type'		=> 'text',
								'name'		=> 'map_api_key',
								'label'		=> esc_html__( 'Google Maps API Key', 'vorosa' ),
								'description'   => esc_html__('Enter your Google Maps API Key. e.g. AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk', 'vorosa'),
								'value'	=> 'AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk',
						
							),
							array(
								'type'		=> 'text',
								'name'		=> 'map_latitude_longitude',
								'label'		=> esc_html__( 'Google Maps Latitude & Longitude', 'vorosa' ),
								'description'   => esc_html__('Google Maps Latitude & Longitude, e.g. 40.6700, -73.9400', 'vorosa'),
								'value'	=> '40.6700, -73.9400',
								
							),
							array(
								'type'		=> 'text',
								'name'		=> 'map_height',
								'label'		=> esc_html__( 'Map Height (px)', 'vorosa' ),
								'value'		=> 450
							),
							array(
								'name'          => 'disable_mouse_scroll',
								'label'         => esc_html__(' Disable Wheel Zoom', 'vorosa'),
								'type'          => 'toggle',
								'description'   => esc_html__(' Disable the zoom action when mouse wheel focus on maps.', 'vorosa')
							),
							array(
								'name' => 'map_marker',
								'label' => esc_html__(' Map Marker', 'vorosa'),
								'type' => 'attach_image', 
								'description' => esc_html__(' Upload your map marker', 'vorosa'),
								'value'			=> plugins_url( 'images/others/marker.png', __FILE__ )
							),
							array(
								'type'			=> 'textarea',
								'label'			=> esc_html__( 'Map Style', 'vorosa' ),
								'name'			=> 'map_style',
								'value' => base64_encode('[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]'),

								'description'	=> __( 'Go to <a href="https://snazzymaps.com/" target=_blank>Snazzy Maps</a> and Choose/Customize your Map Style. Click on your demo and copy JavaScript Style Array', 'vorosa' )
							),
			                array(
			                    'name'        => 'custom_css_class',
			                    'label'       => esc_html__('CSS Class', 'vorosa'),
			                    'description' => esc_html__('Custom css class for css customisation', 'vorosa'),
			                    'type'        => 'text'
			                ),
			         	), // content
	                    

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


 if(!function_exists('vorosa_google_map_shortcode')){
	function vorosa_google_map_shortcode($atts,$content){
	ob_start();
			$vorosa_google_map = shortcode_atts( array(
				'map_random_id'       		=> '',
				'map_api_key'       		=> '',
				'map_latitude_longitude'    => '',
				'map_height'       			=> '',
				'disable_mouse_scroll'      => '',
				'map_marker'       			=> '',
				'map_style'       			=> '',
				'custom_css'       			=> '',
				'custom_css_class' 			=> '',
			),$atts); 
			extract( $vorosa_google_map );

		$wrap_class  = apply_filters( 'kc-el-class', $atts );
		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );



		$map_marker_img = wp_get_attachment_image_src( $map_marker, 'full');
		$map_marker_img_url = $map_marker_img[0];





	?>
	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">

		<div class="contact-form-map-area">
			<!-- Google Map Start -->
	        <div class="google-map-area">
	            <!--  Map Section -->
	            <div id="contacts" class="map-area">
	                <div id="googleMap-<?php echo esc_attr( $map_random_id ); ?>" style="width:100%;height:<?php echo esc_attr( $map_height ); ?>px;"></div>
	            </div>
	        </div>
	        <!-- Google Map End -->
		</div>
     
	</div>


	<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_js( $map_api_key ); ?>"></script>
	<script>

		$disable_mouse_scroll = <?php echo esc_js( $disable_mouse_scroll ) == 'yes' ? 'true': 'false'; ?>;

        function init() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: $disable_mouse_scroll,
                center: new google.maps.LatLng(<?php echo esc_js( $map_latitude_longitude ); ?>),
                styles: <?php echo $map_style ?>
            };
            var mapElement = document.getElementById('googleMap-<?php echo esc_js( $map_random_id); ?>');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo esc_js( $map_latitude_longitude ); ?>),
                map: map,
                icon: '<?php echo esc_js( $map_marker_img_url ); ?>',
                title: 'Snazzy!'
            });
			var styles = [
                  {
                    stylers: [
                      { hue: "#c5c5c5" },
                      { saturation: -100 }
                    ]
                  },
                ];
                map.setOptions({styles: styles});

                marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', init);
	</script>



	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_google_map' ,'vorosa_google_map_shortcode');
}