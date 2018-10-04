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

class GP_Staff_Grid_Widget extends GP_Spacely_Widget
{
	var $allowed_order_by_keys = array(
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'title' => 'Title',
		'phone' => 'Phone Number',
		'email' => 'Email Address',
		'address' => 'Mailing Address',
		'website' => 'Website URL'
	);
	var $default_order_by_key = 'last_name';
	
	function __construct( $id_base = 'GP_Staff_Grid_Widget', $name = 'Staff Grid', $widget_options = array(), $control_options = array() )
	{
		$widget_options = array_merge( 
			$widget_options, 
			array(
				'classname' => 'GP_Staff_Grid_Widget GP_Staff_Grid_Widget_Compact',
				'description' => 'Displays a grid of your Staff Members. You choose which columns to show.'
			)
		);

		$options = get_option( 'sd_options' );		
		$menu_order_enabled = ( !isset($options['enable_manual_staff_order']) || !empty($options['enable_manual_staff_order']) );
		if ( $menu_order_enabled ) {
			$this->allowed_order_by_keys['menu_order'] = 'Manual Order';
			$this->default_order_by_key = 'menu_order';
		}
		
		parent::__construct('GP_Staff_Grid_Widget', 'Staff Grid', $widget_options);
	}
	
	// PHP4 style constructor for backwards compatibility
	function GP_Staff_Grid_Widget( $id_base, $name, $widget_options, $control_options )
	{
		$this->__construct( $id_base, $name, $widget_options, $control_options );
	}

	function form( $instance )
	{
		$instance = wp_parse_args( 
			(array) $instance, 
			array( 	'title' => '',
					'use_excerpt' => 0,
					'count' => 1,
					'category' => '',
					'style' => 'grid',
					'show_name' => true,
					'show_title' => true,
					'show_photo' => true,
					'order_by' => $this->default_order_by_key,
					'order' => 'ASC',
					'staff_per_page' => 'all',
					'per_page' => '10',
					) 
		);
		
		$title = !empty($instance['title']) ? $instance['title'] : 'Our Staff';
		$category = !empty($instance['category']) ? $instance['category'] : '';
		$style = 'grid';
		$show_name = isset($instance['show_name']) ? $instance['show_name'] : true;
		$show_title = isset($instance['show_title']) ? $instance['show_title'] : true;
		$show_photo = isset($instance['show_photo']) ? $instance['show_photo'] : true;
		$order_by = !empty($instance['order_by']) ? $instance['order_by'] : $this->default_order_by_key;
		$order = !empty($instance['order']) ? $instance['order'] : 'ASC';
		$staff_per_page = !empty($instance['staff_per_page']) ? $instance['staff_per_page'] : 'all';
		$per_page = !empty($instance['per_page']) ? $instance['per_page'] : '10';
		$grid_photo_width = !empty($instance['grid_photo_width']) ? $instance['grid_photo_width'] : '170';
		$grid_photo_height = !empty($instance['grid_photo_height']) ? $instance['grid_photo_height'] : '170';
		$grid_name_color = !empty($instance['grid_name_color']) ? $instance['grid_name_color'] : '#000';
		$grid_title_color = !empty($instance['grid_title_color']) ? $instance['grid_title_color'] : '#000';
		$grid_overlay_opacity = isset($instance['grid_overlay_opacity']) ? $instance['grid_overlay_opacity'] : '15';
		$grid_overlay_color = !empty($instance['grid_overlay_color']) ? $instance['grid_overlay_color'] : '#cecece';
		$grid_caption_background_color = !empty($instance['grid_caption_background_color']) ? $instance['grid_caption_background_color'] : '#fff';
		$grid_caption_background_opacity = !empty($instance['grid_caption_background_opacity']) ? $instance['grid_caption_background_opacity'] : '70';
		
		$grid_overlay_animate_text = isset($instance['grid_overlay_animate_text']) ? $instance['grid_overlay_animate_text'] : '1';
		$grid_text_position = !empty($instance['grid_text_position']) ? $instance['grid_text_position'] : 'overlay';				
		$staff_categories = get_terms( 'staff-member-category', 'orderby=title&hide_empty=0' );
		$widget_guid = 'staff_widget_' . rand(1, 100000);
		?>
		<script>
		jQuery(function () {
			if ( typeof(gp_init_staff_grid_widgets) == 'function' ) {
				gp_init_staff_grid_widgets('#<?php echo $widget_guid;?>');
			}
		});
		</script>
		<div id="<?php echo $widget_guid; ?>" class="gp_widget_form_wrapper staff_grid_widget">
			<!--<input type="text" value="grid" name="<?php echo $this->get_field_name('style'); ?>" data-always-include="1" style="display:none" />-->
			<?php
				echo $this->text_field( array(
					'id' => 'title',
					'name' => 'title',
					'label' => 'Title:',
					'value' => esc_attr($title),
					'wrapper_class' => 'hide_in_popup'
				) );
			?>
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>">Category:</label><br />
				<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
					<option value="" <?php if(esc_attr($category) == ""): echo 'selected="SELECTED"'; endif; ?>>All Categories</option>
					<?php foreach($staff_categories as $cat):?>
						<option value="<?php echo $cat->slug; ?>" <?php if(esc_attr($category) == $cat->slug): echo 'selected="SELECTED"'; endif; ?>><?php echo htmlentities($cat->name); ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('order_by'); ?>">Order Staff Members By:</label><br />
				<select name="<?php echo $this->get_field_name('order_by'); ?>" id="<?php echo $this->get_field_id('order_by'); ?>">
					<?php foreach ($this->allowed_order_by_keys as $key => $label): ?>
					<option value="<?php echo htmlentities($key); ?>" <?php if($order_by == $key): echo 'selected="SELECTED"'; endif; ?>><?php echo htmlentities($label); ?></option>
						<?php endforeach; ?>
				</select>
				<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>">
					<option value="ASC" <?php if($order == "ASC"): echo 'selected="SELECTED"'; endif; ?>>A-Z</option>
					<option value="DESC" <?php if(empty($order) || $order == "DESC"): echo 'selected="SELECTED"'; endif; ?>>Z-A</option>
				</select>
			</p>

			<fieldset class="radio_text_input">
				<legend>Grid Style</legend>
				<?php
					echo $this->text_field( array(
						'id' => 'grid_photo_width',
						'name' => 'grid_photo_width',
						'label' => 'Photo Width (px or auto):',
						'value' => $grid_photo_width,
						'wrapper_class' => 'dimension_input',
						'min' => 0,
						'max' => 100
					) );					

					echo $this->text_field( array(
						'id' => 'grid_photo_height',
						'name' => 'grid_photo_height',
						'label' => 'Photo Height (px or auto):',
						'value' => $grid_photo_height,
						'wrapper_class' => 'dimension_input',
						'min' => 0,
						'max' => 100
					) );
				?>
				<div class="radio_wrapper">
					<h4>Text Position:</h4> 
					<div class="radio_option">
						<label>
							<input type="radio" id="grid_text_position_overlay" name="<?php echo $this->get_field_name('grid_text_position'); ?>" value="overlay" class="tog" <?php echo ( empty($grid_text_position) || $grid_text_position == 'overlay' ? 'checked="checked"' : '');?>>Overlayed on top of photo
						</label>
					</div>
					<p class="radio_option">
						<label>
							<input type="radio" name="<?php echo $this->get_field_name('grid_text_position'); ?>" value="below_photo" class="tog" <?php echo ($grid_text_position == 'below_photo' ? 'checked="checked"' : '');?>>Displayed below photo
						</label>						
					</p>
				</div>
				<div class="dependent_field text_animation_dependent_field" data-trigger="#grid_text_position_overlay">
					<h4>Text Animation</h4>
					<label>
						<input name="<?php echo $this->get_field_name('grid_overlay_animate_text'); ?>" value="0" class="tog" type="hidden" />
						<input name="<?php echo $this->get_field_name('grid_overlay_animate_text'); ?>" value="1" class="tog" type="checkbox" <?php echo ( !empty($grid_overlay_animate_text)  ? 'checked="checked"' : '' );?> data-shortcode-value-if-unchecked="0" />
						Reveal text on hover
					</label>
				</div>
				<br>
				<?php
					echo $this->text_field( array(
						'id' => 'grid_name_color',
						'name' => 'grid_name_color',
						'label' => 'Member Name Text Color:',
						'value' => $grid_name_color,
						'wrapper_class' => 'color_picker'
					) );

					echo $this->text_field( array(
						'id' => 'grid_title_color',
						'name' => 'grid_title_color',
						'label' => 'Member Title Text Color:',
						'value' => $grid_title_color,
						'wrapper_class' => 'color_picker'
					) );
				?>
				<div class="dependent_field" data-trigger="#grid_text_position_overlay">
				<?php
					echo $this->text_field( array(
						'id' => 'grid_overlay_color',
						'name' => 'grid_overlay_color',
						'label' => 'Overlay Color:',
						'value' => $grid_overlay_color,
						'wrapper_class' => 'color_picker'
					) );

					echo $this->number_field( array(
						'id' => 'grid_overlay_opacity',
						'name' => 'grid_overlay_opacity',
						'label' => 'Overlay Opacity (0-100%):',
						'value' => $grid_overlay_opacity,
						'wrapper_class' => 'opacity_picker',
						'min' => 0,
						'max' => 100
					) );

					echo $this->text_field( array(
						'id' => 'grid_caption_background_color',
						'name' => 'grid_caption_background_color',
						'label' => 'Caption Background Color:',
						'value' => $grid_caption_background_color,
						'wrapper_class' => 'color_picker'
					) );

					echo $this->number_field( array(
						'id' => 'grid_caption_background_opacity',
						'name' => 'grid_caption_background_opacity',
						'label' => 'Caption Background Opacity (0-100%):',
						'value' => $grid_caption_background_opacity,
						'wrapper_class' => 'opacity_picker',
						'min' => 0,
						'max' => 100
					) );				
				?>
				</div>
				<br>
			</fieldset>
			<fieldset class="radio_text_input">
				<legend>Fields To Display</legend>
				<p>					
					<label for="<?php echo $this->get_field_id('show_name'); ?>">
						<input name="<?php echo $this->get_field_name('show_name'); ?>" type="hidden" value="0" />
						<input class="widefat" id="<?php echo $this->get_field_id('show_name'); ?>" name="<?php echo $this->get_field_name('show_name'); ?>" type="checkbox" value="1" <?php if($show_name){ ?>checked="CHECKED"<?php } ?> data-shortcode-value-if-unchecked="0"/>
						Name
					</label>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('show_title'); ?>">
						<input name="<?php echo $this->get_field_name('show_title'); ?>" type="hidden" value="0" />
						<input class="widefat" id="<?php echo $this->get_field_id('show_title'); ?>" name="<?php echo $this->get_field_name('show_title'); ?>" type="checkbox" value="1" <?php if($show_title){ ?>checked="CHECKED"<?php } ?> data-shortcode-value-if-unchecked="0"/>
						Title
					</label>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('show_photo'); ?>">
						<input name="<?php echo $this->get_field_name('show_photo'); ?>" type="hidden" value="0" />
						<input class="widefat" id="<?php echo $this->get_field_id('show_photo'); ?>" name="<?php echo $this->get_field_name('show_photo'); ?>" type="checkbox" value="1" <?php if($show_photo){ ?>checked="CHECKED"<?php } ?> data-shortcode-value-if-unchecked="0"/>
						Photo
					</label>
				</p>
			</fieldset>
			
			<fieldset class="radio_text_input">
				<legend>Staff Members Per Page</legend>
				<div class="radio_wrapper">
					<p class="radio_option">
						<label>
							<input type="radio" name="<?php echo $this->get_field_name('staff_per_page'); ?>" value="all" class="tog" <?php echo ($staff_per_page == 'all' ? 'checked="checked"' : '');?>>All On One Page
						</label>
					</p>
					<p class="radio_option">
						<label>
							<input type="radio" name="<?php echo $this->get_field_name('staff_per_page'); ?>" value="max" class="tog" <?php echo ($staff_per_page == 'max' ? 'checked="checked"' : '');?>>Max Per Page: 
						</label>
						<input type="text" name="<?php echo $this->get_field_name('per_page'); ?>" id="<?php echo $this->get_field_id('per_page'); ?>" class="small-text" value="<?php echo esc_attr($per_page); ?>">
					</p>
				</div>
			</fieldset>
			
			
			<input type="hidden" value="" name="<?php echo $this->get_field_name('columns'); ?>" data-always-include="1" />
		</div>
		<?php
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = $new_instance['count'];
		$instance['category'] = $new_instance['category'];
		$instance['style'] = $new_instance['style'];
		$instance['show_name'] = $new_instance['show_name'];
		$instance['show_title'] = $new_instance['show_title'];
		$instance['show_photo'] = $new_instance['show_photo'];
		$instance['order_by'] = $new_instance['order_by'];
		$instance['order'] = $new_instance['order'];
		$instance['per_page'] = $new_instance['per_page'];
		$instance['staff_per_page'] = $new_instance['staff_per_page'];
		
		$instance['grid_photo_width'] = $new_instance['grid_photo_width'];
		$instance['grid_photo_height'] = $new_instance['grid_photo_height'];
		$instance['grid_name_color'] = $new_instance['grid_name_color'];
		$instance['grid_title_color'] = $new_instance['grid_title_color'];
		$instance['grid_overlay_color'] = $new_instance['grid_overlay_color'];
		$instance['grid_overlay_opacity'] = $new_instance['grid_overlay_opacity'];
		$instance['grid_caption_background_color'] = $new_instance['grid_caption_background_color'];
		$instance['grid_caption_background_opacity'] = $new_instance['grid_caption_background_opacity'];
		$instance['grid_overlay_animate_text'] = $new_instance['grid_overlay_animate_text'];
		$instance['grid_text_position'] = $new_instance['grid_text_position'];

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
		$sc = '[staff_grid in_widget="1" ' . $sc_atts . ']';
		$output = do_shortcode($sc);
		
		// give the user a chance to modify the output before echo'ing it
		echo apply_filters('staff_list_widget_html', $output);
		
		// finish the widget
		echo $after_widget;
	}
	
	function build_shortcode_atts($instance)
	{
		$atts = '';
		
		$opts['category'] 		= !empty($instance['category']) ? $instance['category'] : '';
		$opts['style'] 			= 'grid';
		$opts['show_name'] 		= isset($instance['show_name']) ? $instance['show_name'] : true;
		$opts['show_title'] 	= isset($instance['show_title']) ? $instance['show_title'] : true;
		$opts['show_photo'] 	= isset($instance['show_photo']) ? $instance['show_photo'] : true;
		$opts['order_by'] 		= isset($instance['order_by']) ? $instance['order_by'] : $this->default_order_by_key;
		$opts['order'] 			= isset($instance['order']) ? $instance['order'] : 'ASC';
		$opts['order'] 			= isset($instance['order']) ? $instance['order'] : 'ASC';
		$opts['grid_photo_height'] = isset($instance['grid_photo_height']) ? $instance['grid_photo_height'] : '';
		$opts['grid_photo_width'] = isset($instance['grid_photo_width']) ? $instance['grid_photo_width'] : '';
		$opts['grid_name_color'] = isset($instance['grid_name_color']) ? $instance['grid_name_color'] : '#fff';
		$opts['grid_title_color'] = isset($instance['grid_title_color']) ? $instance['grid_title_color'] : '#fff';
		$opts['grid_overlay_color'] = isset($instance['grid_overlay_color']) ? $instance['grid_overlay_color'] : '#fff';
		$opts['grid_overlay_opacity'] = isset($instance['grid_overlay_opacity']) ? $instance['grid_overlay_opacity'] : '15';
		$opts['grid_caption_background_color'] = isset($instance['grid_caption_background_color']) ? $instance['grid_caption_background_color'] : '#fff';
		$opts['grid_caption_background_opacity'] = isset($instance['grid_caption_background_opacity']) ? $instance['grid_caption_background_opacity'] : '70';
		$opts['grid_overlay_animate_text'] = isset($instance['grid_overlay_animate_text']) ? $instance['grid_overlay_animate_text'] : '1';
		$opts['grid_text_position'] = isset($instance['grid_text_position']) ? $instance['grid_text_position'] : '#fff';
		
		if ( !empty($instance['staff_per_page']) && $instance['staff_per_page'] == 'max' && !empty($instance['per_page']) 
			 && intval($instance['per_page']) > 0 && intval($instance['per_page']) < 1000 )
		{
			$opts['per_page'] = $instance['per_page'];
		}
		
		
		// if we're using the Grid View, build the column list based on their selections
		if ($opts['style'] == 'table') {
			$opts['columns'] = $this->build_column_list($instance);
		}		
		
		// Add each attribute + value to the string we're building
		foreach( $opts as $key => $val ) {
			if ( $val || !empty($val) || strlen($val) > 0 ) {
				$atts .= sprintf('%s="%s" ', $key, $val);				
			}
		}
		
		// allow the user to filter the attribute string before returning it
		$atts = trim($atts);
		return apply_filters('staff_list_widget_atts', $atts);
	}
	
	function build_column_list($instance)
	{
		$cols = '';
		
		$opts['name'] 		= isset($instance['show_name']) ? $instance['show_name'] : true;
		$opts['title'] 		= isset($instance['show_title']) ? $instance['show_title'] : true;
		$opts['photo'] 		= isset($instance['show_photo']) ? $instance['show_photo'] : true;
				
		// Add each selected column the string we're building
		foreach( $opts as $key => $val ) {
			if ( $val || !empty($val) ) {
				$cols .= sprintf('%s,', $key);				
			}
		}
		
		// allow the user to filter the column list before returning it
		$cols = rtrim($cols, ',');
		return apply_filters('staff_list_columns', $cols);
	}
	
	function is_pro()
	{
		global $company_directory_config;
		return ( isset($company_directory_config['is_pro']) ? $company_directory_config['is_pro'] : false );
	}
}