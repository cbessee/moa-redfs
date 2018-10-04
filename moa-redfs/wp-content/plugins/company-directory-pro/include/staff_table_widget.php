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

class GP_Staff_Table_Widget extends GP_Spacely_Widget
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
	
	function __construct( $id_base = 'GP_Staff_Table_Widget', $name = 'Company Directory - Staff Table', $widget_options = array(), $control_options = array() )
	{
		$widget_options = array_merge( 
			$widget_options, 
			array(
				'classname' => 'GP_Staff_Table_Widget GP_Staff_Table_Widget_Compact',
				'description' => 'Displays a table of your Staff Members. You choose which columns to show.'
			)
		);
		
		$options = get_option( 'sd_options' );		
		$menu_order_enabled = ( !isset($options['enable_manual_staff_order']) || !empty($options['enable_manual_staff_order']) );
		if ( $menu_order_enabled ) {
			$this->allowed_order_by_keys['menu_order'] = 'Manual Order';
			$this->default_order_by_key = 'menu_order';
		}

		parent::__construct('GP_Staff_Table_Widget', 'Company Directory - Staff Table', $widget_options);
	}
	
	// PHP4 style constructor for backwards compatibility
	function GP_Staff_Table_Widget( $id_base, $name, $widget_options, $control_options )
	{
		$this->__construct();
	}

	function form( $instance )
	{
		$instance = wp_parse_args( 
			(array) $instance, 
			array( 	'title' => '',
					'use_excerpt' => 0,
					'count' => 1,
					'category' => '',
					'style' => 'table',
					'show_name' => true,
					'show_title' => true,
					'show_bio' => false,
					'show_photo' => false,
					'show_email' => true,
					'show_address' => false,
					'show_website' => false,
					'order_by' => $this->default_order_by_key,
					'order' => 'ASC',
					'staff_per_page' => 'all',
					'per_page' => '10',
					'columns' => '',
					'sort_order' => ''
					) 
		);
		
		$title = !empty($instance['title']) ? $instance['title'] : 'Our Staff';
		$category = !empty($instance['category']) ? $instance['category'] : '';
		$style = 'table';
		$show_name = isset($instance['show_name']) ? $instance['show_name'] : true;
		$show_title = isset($instance['show_title']) ? $instance['show_title'] : true;
		$show_bio = isset($instance['show_bio']) ? $instance['show_bio'] : false;
		$show_photo = isset($instance['show_photo']) ? $instance['show_photo'] : false;
		$show_email = isset($instance['show_email']) ? $instance['show_email'] : true;
		$show_phone = isset($instance['show_phone']) ? $instance['show_phone'] : true;
		$show_address = isset($instance['show_address']) ? $instance['show_address'] : false;
		$show_website = isset($instance['show_website']) ? $instance['show_website'] : false;
		$order_by = !empty($instance['order_by']) ? $instance['order_by'] : $this->default_order_by_key;
		$order = !empty($instance['order']) ? $instance['order'] : 'ASC';
		$staff_per_page = !empty($instance['staff_per_page']) ? $instance['staff_per_page'] : 'all';
		$per_page = !empty($instance['per_page']) ? $instance['per_page'] : '10';
		$columns = !empty($instance['columns']) ? $instance['columns'] : '';
		$sort_order = !empty($instance['sort_order']) ? $instance['sort_order'] : '';				
		$staff_categories = get_terms( 'staff-member-category', 'orderby=title&hide_empty=0' );
		$widget_guid = 'staff_widget_' . rand(1, 100000);
		?>
		<script>
		jQuery(function () {
			if ( typeof(gp_init_staff_table_widgets) == 'function' ) {				
				gp_init_staff_table_widgets('#<?php echo $widget_guid;?>');
			}			
		});
		</script>
		<div id="<?php echo $widget_guid; ?>" class="gp_widget_form_wrapper staff_table_widget">
			<!--<input type="text" value="table" name="<?php echo $this->get_field_name('style'); ?>" data-always-include="1" style="display:none" />-->
			<?php
				echo $this->text_field( array(
					'id' => 'title',
					'name' => 'title',
					'label' => 'Title:',
					'value' => esc_attr($title),
					'wrapper_class' => 'hide_in_popup'
				) );
			?>
			<div>
				<label for="<?php echo $this->get_field_id('category'); ?>">Category:</label><br />
				<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
					<option value="" <?php if(esc_attr($category) == ""): echo 'selected="SELECTED"'; endif; ?>>All Categories</option>
					<?php foreach($staff_categories as $cat):?>
						<option value="<?php echo $cat->slug; ?>" <?php if(esc_attr($category) == $cat->slug): echo 'selected="SELECTED"'; endif; ?>><?php echo htmlentities($cat->name); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div>
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
			</div>

			<fieldset class="radio_text_input staff_table_fields_to_display">
				<legend>Fields To Display</legend>
				<?php
					$field_list = array(
						'name',
						'title',
						'phone',
						'email',
						'bio',
						'photo',
						'address',
						'website',
					);
					$field_names = array(
						'name' => __('Name'),
						'title' => __('Title'),
						'phone' => __('Phone'),
						'email' => __('Email'),
						'bio' => __('Bio'),
						'photo' => __('Photo'),
						'address' => __('Address'),
						'website' => __('Website'),
					);
					$field_order = !empty($sort_order)
								   ? explode(',', $sort_order)
								   : array();
					
					foreach ($field_list as $field_name) {
						if ( !in_array($field_name, $field_order) ) {
							$field_order[] = $field_name;
						}
					}
				
				?>
				
				
				<?php foreach ($field_order as $field_name): ?>
				<?php 
					$orig_name = $field_name;
					$field_name = 'show_' . $field_name;
					$cur_val = isset($$field_name)
							   ? $$field_name
							   : false;
				?>
				<div class="sortable">
					<label for="<?php echo $this->get_field_id( $field_name ); ?>">
						<input name="<?php echo $this->get_field_name( $field_name ); ?>" type="hidden" value="0" />
						<input class="widefat" id="<?php echo $this->get_field_id( $field_name ); ?>" name="<?php echo $this->get_field_name( $field_name ); ?>" type="checkbox" value="1" <?php if($cur_val){ ?>checked="CHECKED"<?php } ?> data-shortcode-hidden="1" />
						<?php echo $field_names[ $orig_name ]; ?>
					</label>
				</div>
				<?php endforeach; ?>
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
			
			<input type="text" class="staff_table_columns_input" value="<?php echo $columns; ?>" name="<?php echo $this->get_field_name('columns'); ?>" data-always-include="1" style="display:none" />
			<input type="text" class="staff_table_sort_order_input" value="<?php echo $sort_order; ?>" name="<?php echo $this->get_field_name('sort_order'); ?>" data-shortcode-hidden="1" style="display:none" />
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
		$instance['show_bio'] = $new_instance['show_bio'];
		$instance['show_photo'] = $new_instance['show_photo'];
		$instance['show_email'] = $new_instance['show_email'];
		$instance['show_address'] = $new_instance['show_address'];
		$instance['show_website'] = $new_instance['show_website'];
		$instance['show_phone'] = $new_instance['show_phone'];
		$instance['order_by'] = $new_instance['order_by'];
		$instance['order'] = $new_instance['order'];
		$instance['per_page'] = $new_instance['per_page'];
		$instance['staff_per_page'] = $new_instance['staff_per_page'];
		$instance['columns'] = $new_instance['columns'];
		$instance['sort_order'] = $new_instance['sort_order'];
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
		$sc = '[staff_list in_widget="1" ' . $sc_atts . ']';
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
		$opts['style'] 			= 'table';
		$opts['show_name'] 		= isset($instance['show_name']) ? $instance['show_name'] : true;
		$opts['show_title'] 	= isset($instance['show_title']) ? $instance['show_title'] : true;
		$opts['show_phone'] 	= isset($instance['show_phone']) ? $instance['show_phone'] : true;
		$opts['show_email'] 	= isset($instance['show_email']) ? $instance['show_email'] : true;
		$opts['show_bio'] 		= isset($instance['show_bio']) ? $instance['show_bio'] : false;
		$opts['show_photo'] 	= isset($instance['show_photo']) ? $instance['show_photo'] : false;
		$opts['show_address'] 	= isset($instance['show_address']) ? $instance['show_address'] : false;
		$opts['show_website'] 	= isset($instance['show_website']) ? $instance['show_website'] : false;
		$opts['order_by'] 		= isset($instance['order_by']) ? $instance['order_by'] : $this->default_order_by_key;
		$opts['order'] 			= isset($instance['order']) ? $instance['order'] : 'ASC';
		
		if ( !empty($instance['staff_per_page']) && $instance['staff_per_page'] == 'max' && !empty($instance['per_page']) 
			 && intval($instance['per_page']) > 0 && intval($instance['per_page']) < 1000 )
		{
			$opts['per_page'] = $instance['per_page'];
		}
		
		// if we're using the Table View, build the column list based on their selections
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
		if ( empty($instance['columns']) ) {
			$cols = '';
			
			$opts['name'] 		= isset($instance['show_name']) ? $instance['show_name'] : true;
			$opts['title'] 		= isset($instance['show_title']) ? $instance['show_title'] : true;
			$opts['phone'] 		= isset($instance['show_phone']) ? $instance['show_phone'] : true;
			$opts['email'] 		= isset($instance['show_email']) ? $instance['show_email'] : true;
			$opts['bio'] 		= isset($instance['show_bio']) ? $instance['show_bio'] : false;
			$opts['photo'] 		= isset($instance['show_photo']) ? $instance['show_photo'] : false;
			$opts['address']	= isset($instance['show_address']) ? $instance['show_address'] : false;
			$opts['website']	= isset($instance['show_website']) ? $instance['show_website'] : false;
				
			// Add each selected column the string we're building
			foreach( $opts as $key => $val ) {
				if ( $val || !empty($val) ) {
					$cols .= sprintf('%s,', $key);				
				}
			}		
			$cols = rtrim($cols, ',');
		}
		else {
			$cols = $instance['columns'];
		}
		
		// allow the user to filter the column list before returning it
		return apply_filters('staff_list_columns', $cols);
	}
	
	function is_pro()
	{
		global $company_directory_config;
		return ( isset($company_directory_config['is_pro']) ? $company_directory_config['is_pro'] : false );
	}
}