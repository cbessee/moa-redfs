<?php
/**
*
* Event Map widget.
*
**/
if ( !class_exists('vorosa_map_Widget') ) {
	class vorosa_map_Widget extends WP_Widget{
		function __construct(){
			$widget_options = array(
				'description' 					=> esc_html__('This widget show Event Map', 'vorosa'), 
				'customize_selective_refresh' 	=> true,
			);
			parent:: __construct('vorosa_map_Widget', esc_html__( 'Vorosa: Event Mape', 'vorosa'), $widget_options );
		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){ 
			$content = isset( $instance['content'] ) ? $instance['content'] : '';
			$apikey = isset( $instance['apikey'] ) ? $instance['apikey'] : '';
			?>
	        <?php echo wp_kses_post( $args['before_widget'] ); ?>
	        	<div class="author--info--wrap">
					<div class="event-map">
						<div id="hastech"></div>
					</div>
					<!-- google map api -->
					<script src="http://maps.googleapis.com/maps/api/js?key=<?php echo esc_js( $apikey ); ?>"></script>
					<script>
						var myCenter=new google.maps.LatLng(<?php echo esc_js( $content ); ?>);
						function initialize()
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
							    icon:'../../images/contact.png',
								map: map,
							  });
							marker.setMap(map);
						}
						google.maps.event.addDomListener(window, 'load', initialize);
					</script>
	            </div>
	        <?php echo wp_kses_post( $args['after_widget'] ); ?>
		<?php }

		/*
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */

		public function update($new_instance, $old_instance){
			$instace = array();
			$instance['content'] = ( !empty($new_instance['content']) ) ? strip_tags ( $new_instance['content'] ) : '';
			$instance['apikey'] = ( !empty($new_instance['apikey']) ) ? strip_tags ( $new_instance['apikey'] ) : '';
			if ( current_user_can( 'unfiltered_html' ) ) {
			        $instance['content'] = $new_instance['content'];
			} else {
			        $instance['content'] = wp_kses_post( $new_instance['content'] );

			}
			return $instance;
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form($instance){ 
			$content = !empty( $instance['content'] ) ? $instance['content'] : ''; 
			$apikey = !empty( $instance['apikey'] ) ? $instance['apikey'] : ''; 
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php echo esc_html__('Location:' ,'vorosa') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $content ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('apikey')); ?>"><?php echo esc_html__('API Key:' ,'vorosa') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('apikey')); ?>" name="<?php echo esc_attr($this->get_field_name('apikey')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $apikey ); ?>">
			</p>
		<?php }
	} // end extends class
} // end exists class
// Register Event Map widget.
function vorosa_map_Widget() {
    register_widget( 'vorosa_map_Widget' );
}
add_action( 'widgets_init', 'vorosa_map_Widget' );