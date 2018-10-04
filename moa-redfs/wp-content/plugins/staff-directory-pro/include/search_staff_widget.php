<?php
/*
This file is part of Company Directory.

Company Directory is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Company Directory is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Company Directory.  If not, see <http://www.gnu.org/licenses/>.

*/

class GP_Search_Staff_Widget extends WP_Widget
{
	
	function __construct()
	{
		$widget_ops = array(
			'classname' => 'GP_Search_Staff_Widget GP_Search_Staff_Widget_Compact',
			'description' => 'Displays a basic or advanced Staff Search form.'
		);
		parent::__construct('GP_Search_Staff_Widget', 'Search Staff', $widget_ops);
	}
	
	// PHP4 style constructor for backwards compatibility
	function GP_Search_Staff_Widget()
	{
		$this->__construct();
	}

	function form($instance){
		$instance = wp_parse_args( 
			(array) $instance, 
			array( 	'title' => '',
					'mode' => ''
					) 
		);
		
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$current_mode = !empty($instance['mode']) ? $instance['mode'] : 'basic';
		
		$search_modes = array(
			'basic' => __( 'Basic', 'company-directory' )
		);
		$search_modes = apply_filters('company_directory_widget_search_modes', $search_modes);		
		
		?>
		<div class="gp_widget_form_wrapper">
			<p class="hide_in_popup">
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label><br />
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('mode'); ?>">Search Mode:</label><br />
				<select id="<?php echo $this->get_field_id('mode'); ?>" name="<?php echo $this->get_field_name('mode'); ?>" data-shortcode-key="mode">
					<?php
						foreach($search_modes as $value => $label) {
							?><option value="<?php echo $value; ?>"  <?php if($current_mode == $value): ?> selected="SELECTED" <?php endif; ?>><?php echo $label; ?></option><?php
						}
					?>
				</select>
			</p>
		</div>
		<?php
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['mode'] = $new_instance['mode'];
		return $instance;
	}

	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);

		
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$title = apply_filters('widget_title', $title);
		
		// start the widget
		echo $before_widget;

		if (!empty($title)){
			echo $before_title . $title . $after_title;
		}
		
		// build the shortcode's attributes
		$sc_atts = $this->build_shortcode_atts($instance);				
		$sc = '[search_staff_members in_widget="1" ' . $sc_atts . ']';
		$output = do_shortcode($sc);
		
		// give the user a chance to modify the output before echo'ing it
		echo apply_filters('search_staff_widget_html', $output);
		
		// finish the widget
		echo $after_widget;
	}
	
	function build_shortcode_atts($instance)
	{
		$atts = '';
		
		$opts['mode'] 			= isset($instance['mode']) ? $instance['mode'] : '';	
		
		// Add each attribute + value to the string we're building
		foreach( $opts as $key => $val ) {
			if ( $val || !empty($val) || strlen($val) > 0 ) {
				$atts .= sprintf('%s="%s" ', $key, $val);				
			}
		}
		
		// allow the user to filter the attribute string before returning it
		$atts = trim($atts);
		return apply_filters('search_staff_widget_atts', $atts);
	}
	
	function is_pro()
	{
		global $company_directory_config;
		return ( isset($company_directory_config['is_pro']) ? $company_directory_config['is_pro'] : false );
	}
}