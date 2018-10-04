<?php
include('Company_Directory_Pro_Settings.php');
include('Company_Directory_Pro_Factory.php');
require_once('staff_table_widget.php');
require_once('staff_grid_widget.php');
require_once('lib/csv_importer.php');
require_once('lib/csv_exporter.php');

class Company_Directory_Pro_Plugin
{
	var $allowed_order_by_keys = array('first_name', 'last_name', 'title', 'phone', 'email', 'address', 'website', 'staff_category', 'menu_order');
	static $csv_headers = array('Full Name','Body','First Name','Last Name','Title','Phone','Email','Address','Website','Categories','Photo');

	function __construct($base_file)
	{
		$this->base_file = $base_file;
		$this->Factory = new Company_Directory_Pro_Factory($base_file);
		$this->Settings = new Company_Directory_Pro_Settings( $this->Factory );
		$this->add_hooks();
		
		// initialize automatic updates
		$this->init_updater();		

		// initialize Galahad so it can add its hooks
		$this->init_galahad();		
	}
	
	function add_hooks()
	{
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin_css'), 10, 1 );
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin_js'), 10, 1 );

		// add Conversions menu to Company Directory settings menu
		add_filter( 'company_directory_admin_submenu_pages', array($this, 'add_menus'), 10, 2 );
				
		// add Pro Admin Contact Form tab
		add_filter( 'company_directory_admin_help_tabs', array($this, 'add_help_tab'), 10, 1 );
		
		$just_activated = get_transient('company_directory_pro_just_activated');
		if ( !empty( $just_activated ) ) {
			add_action( 'init', array($this, 'activation_hook') );
			delete_transient('company_directory_pro_just_activated');
		}
				
		// catch CSV import/export trigger
		add_action('admin_init', array($this, 'process_import_export'));
		
		// add Vandelay (importer) AJAX hook
		add_action('wp_ajax_vandelay_receive_import', array($this, 'receive_ajax_import'));
		
		// add Pro shortcodes
		add_shortcode( 'staff_table', array($this, 'staff_table_shortcode') );
		add_shortcode( 'staff_grid', array($this, 'staff_grid_shortcode') );
		
		// add Pro media buttons
		add_filter( 'company_directory_admin_media_buttons', array($this, 'add_media_buttons'), 10,  1 );
		
		// add Pro search modes
		add_filter( 'company_directory_widget_search_modes', array($this, 'add_search_modes'), 10,  1 );
		
		//register sidebar widgets
		add_action( 'widgets_init', array( &$this, 'register_widgets') );
		
		// add hooks for Advanced Search
		add_action( 'company_directory_before_search_form', array( $this, 'add_search_form_filter') );
		add_action( 'company_directory_after_search_form', array( $this, 'remove_search_form_filter') );
		add_action( 'pre_get_posts', array($this, 'filter_search_query') );
		add_action( 'get_search_query', array($this, 'get_search_query') );
		add_filter( 'company_directory_search_form_hidden_fields', array($this, 'add_hidden_fields_to_search_form'), 10, 3 );
	}
	
	function add_search_modes($modes)
	{
		$modes['advanced'] = 'Advanced';
		return $modes;
	}
	
	function add_media_buttons($media_buttons)
	{
		$new_media_buttons = array(
			array(
				'label' => 'Staff Grid',
				'shortcode' => 'staff_grid',
				'class' => 'gp_staff_grid_widget',
				'icon' => 'id-alt',
			),
			/*
			array(
				'label' => 'Staff Table',
				'shortcode' => 'staff_table',
				'class' => 'gp_staff_table_widget',
				'icon' => 'id-alt',
			),
			*/
		);
		
		//  insert new items in the next-to-last position
		$insert_pos = count($media_buttons) - 1;
		array_splice( $media_buttons, $insert_pos, 0, $new_media_buttons );		
		return $media_buttons;
	}
	
	function register_widgets()
	{
		register_widget( 'GP_Staff_Grid_Widget' );
		//register_widget( 'GP_Staff_Table_Widget' );
	}
	
	/* 
	 * Output a table of all staff members
	 */
	function staff_table_shortcode($atts, $content = '')
	{
		// add table defaults before rendering shortcode
		add_filter('company_directory_staff_list_defaults', array($this, 'set_staff_table_defaults'), 10, 2);
		add_filter('company_directory_staff_list_classes', array($this, 'set_staff_table_classes'), 10, 2);
		add_filter('company_directory_staff_list_attributes', array($this, 'set_staff_table_attributes'), 10, 2);
		add_filter('company_directory_staff_list_template_path', array($this, 'set_staff_table_template_path'), 10, 2);
		add_filter('company_directory_staff_list_template_view_vars', array($this, 'set_staff_table_template_view_vars'), 10, 2);
		
		// add custom staff table attributes to existing atts
		$atts['style'] = 'table';

		// render the base staff_list shortcode with our custom attributes
		$atts_str = $this->build_atts_str($atts);
		$sc = sprintf('[staff_list %s]%s[/staff_list]', $atts_str, $content);
		$html = do_shortcode( $sc );

		// remove our staff_list filters
		remove_filter('company_directory_staff_list_defaults', array($this, 'set_staff_table_defaults'), 10, 2);
		remove_filter('company_directory_staff_list_classes', array($this, 'set_staff_table_classes'), 10, 2);
		remove_filter('company_directory_staff_list_attributes', array($this, 'set_staff_table_attributes'), 10, 2);
		remove_filter('company_directory_staff_list_template_path', array($this, 'set_staff_table_template_path'), 10, 2);
		remove_filter('company_directory_staff_list_template_view_vars', array($this, 'set_staff_table_template_view_vars'), 10, 2);

		// apply filter and return
		$html = apply_filters('company_directory_staff_list_html', $html, $atts);
		return $html;
	}
	
	function set_staff_table_defaults($defaults, $atts)
	{
		/* Adjust defaults */
		$table_defaults = array(
			'columns' => 'name,title,email,phone',
			'grid_photo_width' => '',
			'grid_photo_height' => '',
			'grid_overlay_color' => '#1e90ff',
			'grid_overlay_opacity' => '.3',
			'grid_caption_background_color' => '#fff',
			'grid_caption_background_opacity' => '70',
			'grid_name_color' => '',
			'grid_title_color' => '',
			'grid_text_position' => 'overlay',
			'grid_overlay_animate_text' => false,
			'show_bio' => false,
			'show_photo' => false,
			'show_photos' => false,
			'show_address' => false,
			'show_website' => false,
		);
		return array_merge($defaults, $table_defaults);		
	}
	
	function set_staff_table_classes($classes, $atts)
	{
		// add staff-table class. 
		// NOTE: we are leaving the staff-list class
		$classes[] = 'staff-table';
		return $classes;
	}
	
	function set_staff_table_attributes($atts)
	{
		$atts['columns'] = $this->generate_staff_table_columns_attribute($atts);
		return $atts;
	}
	
	function set_staff_table_template_path($template_path, $atts)
	{
		$template_path = plugin_dir_path( $this->base_file ) . 'templates/staff-list-table.php';
		return $template_path;
	}
	
	function set_staff_table_template_view_vars($vars, $atts)
	{
		$vars['columns'] = is_array($atts['columns'])
						   ? $atts['columns']
						   : explode(',',  $atts['columns']);
		return $vars;
	}
	
	function generate_staff_table_columns_attribute($atts)
	{
		// if no columns were specified, infer them from the show_photo, 
		// show_title, show_website, etc. attributes
		$columns = !empty($atts['columns'])
				   ? $atts['columns']
				   : $this->build_column_list_from_attributes($atts);
		
		$columns = array_map( 'trim', explode(',', $columns) );
		return implode(',', $columns);
	}
	
	
	/* 
	 * Output a grid of all staff members
	 */
	function staff_grid_shortcode($atts, $content = '')
	{
		// add grid defaults before rendering shortcode
		add_filter('company_directory_staff_list_defaults', array($this, 'set_staff_grid_defaults'), 10, 2);
		add_filter('company_directory_staff_list_classes', array($this, 'set_staff_grid_classes'), 10, 2);
		add_filter('company_directory_staff_list_template_path', array($this, 'set_staff_grid_template_path'), 10, 2);
		add_filter('company_directory_staff_list_template_html', array($this, 'add_grid_css'), 10, 2);

		// custom staff table attributes
		$atts['style'] = 'grid';
		$atts_str = $this->build_atts_str($atts);
		
		// render the base staff_list shortcode with our custom attributes
		$sc = sprintf('[staff_list %s]%s[/staff_list]', $atts_str, $content);		
		$html = do_shortcode( $sc );

		// remove our staff_list filters
		remove_filter('company_directory_staff_list_defaults', array($this, 'set_staff_grid_defaults'), 10, 2);
		remove_filter('company_directory_staff_list_classes', array($this, 'set_staff_grid_classes'), 10, 2);
		remove_filter('company_directory_staff_list_template_path', array($this, 'set_staff_grid_template_path'), 10, 2);

		// apply filter and return
		$html = apply_filters('company_directory_staff_grid_html', $html, $atts);
		return $html;
	}
	
	function get_grid_defaults( $atts = array() )
	{
		/* Adjust defaults for grid and table */
		$grid_defaults = array(
			'caption' => '',
			'grid_photo_width' => '',
			'grid_photo_height' => '',
			'grid_overlay_color' => '#1e90ff',
			'grid_overlay_opacity' => '.3',
			'grid_caption_background_color' => '#fff',
			'grid_caption_background_opacity' => '70',
			'grid_name_color' => '',
			'grid_title_color' => '',
			'grid_text_position' => 'overlay',
			'grid_overlay_animate_text' => false,
			'show_bio' => false,
			'show_phone' => false,
			'show_email' => false,
			'show_address' => false,
			'show_website' => false,
		);
		if ( empty($atts['grid_text_position']) || $atts['grid_text_position'] == 'overlay' ) {
			$grid_defaults['grid_name_color'] = '#000000';
			$grid_defaults['grid_title_color'] = '#000000';				
		}					
		return $grid_defaults;
	}
	function set_staff_grid_defaults($defaults, $atts)
	{
		/* Adjust defaults for grid and table */
		$grid_defaults = $this->get_grid_defaults($atts);		
		return array_merge($defaults, $grid_defaults);
	}
	
	function set_staff_grid_classes($classes, $atts)
	{
		// Add staff-grid class
		$classes[] = 'staff-grid';
		
		// remove staff-list class
		if(( $key = array_search('staff-list', $classes)) !== false ) {
			unset($classes[$key]);
		}
		
		// add grid classes for antimation, if needed
		if ( !empty($atts['grid_overlay_animate_text']) ) {
			$classes[] = 'animate_on_hover';
		}
		
		return $classes;
	}
	
	function set_staff_grid_template_path($template_path, $atts)
	{
		$template_path = plugin_dir_path( $this->base_file ) . 'templates/staff-list-grid.php';
		return $template_path;
	}
	
	function add_grid_css($html, $atts)
	{		
		$all_atts = array_merge( $this->get_grid_defaults(), $atts );
		$css = $this->build_grid_css($all_atts);
		$style_block = sprintf('<style>%s</style>', $css);
		return $html . $style_block;		
	}
	
	function build_atts_str($atts)
	{
		$atts_str = '';
		foreach ($atts as $key => $val) {
			$atts_str .= sprintf('%s="%s" ', $key, $val);
		}
		return trim($atts_str);		
	}
	
	
	function activation_hook()
	{
		// clear cached data
		delete_transient('company_directory_pro_just_activated');
		
		// show "thank you for installing, please activate" message
		$updater = $this->Factory->get('GP_Plugin_Updater');
		if ( !$updater->has_active_license() ) {
			$updater->show_admin_notice('Thanks for installing Company Directory Pro! Activate your plugin now to enable automatic updates.', 'success');
			// TODO: make sure this is the correct URL
			wp_redirect( admin_url('admin.php?page=company-directory-license-information') );
			exit();
		}
	}
	
	function enqueue_admin_css($hook)
	{
		if ( strpos($hook, 'company-directory') !== false 
			|| strpos($hook, 'company_directory') !== false 
		) {
			wp_register_style( 'company_directory_pro_css', plugins_url('include/assets/css/company_directory_pro.css', $this->base_file) );
			wp_enqueue_style( 'company_directory_pro_css' );
		}
	}
	
	function enqueue_admin_js($hook)
	{
		if ( strpos($hook, 'company-directory') !== false 
			|| strpos($hook, 'company_directory') !== false 
		) {
			wp_register_script( 
				'company_directory_pro_admin_js',
				plugins_url('include/assets/js/admin.js', $this->base_file),
				array('jquery', 'jquery-ui-tabs'),
				false,
				true
			);
			wp_enqueue_script( 'company_directory_pro_admin_js' );
		}
	}
	
	/** 
	 * Adds Galahad to help tabs in admin. Hooks into filter 
	 * "company_directory_admin_help_tabs"
	 *
	 * @param array $tabs Array of GP_Sajak tabs. 
	 *
	 * @retutn array Modified list of tabs. All array entries require  
					 'id', 'label', 'callback', and 'options' keys.
	 */	 
	function add_help_tab($tabs)
	{
		$galahad = $this->Factory->get('GP_Galahad');
		$tabs[] = array(
			'id' => 'contact_support', 
			'label' => __('Contact Support', 'company-directory'),
			'callback' => array($galahad, 'output_contact_page'),
			'options' => array('icon' => 'envelope-o')
		);
		return $tabs;
	}
	
	function add_menus($submenu_pages, $top_level_slug)
	{
		// Add the Import & Export menu
		$import_export_page = array(
			array(
				'label' => __('Import & Export', 'company-directory'),
				'page_title' => __('Import & Export', 'company-directory'), 
				'role' => 'manage_options', 
				'slug' => 'company-directory-import-export',
				'callback' => array($this->Settings, 'render_import_export_page')
			)
		);

		// insert at second position
		array_splice( $submenu_pages, 1, 0, $import_export_page );		

		// Add a link to the License Information page
		$license_info_page = array(
			array(
				'label' => 'License Information', 
				'page_title' => 'License Information',
				'role' => 'manage_options', 
				'slug' => 'company-directory-license-information',
				'callback' => array($this->Settings, 'render_license_information_page')
			)
		);
		
		// insert at next-to-last position
		$insert_pos = count($submenu_pages) - 1;
		array_splice( $submenu_pages, $insert_pos, 0, $license_info_page );		
		
		return $submenu_pages;
	}
	
	function add_search_form_filter($atts)
	{
		// if advanced mode was specified, override the search form template
		if ( !empty($atts['mode']) && ( strtolower($atts['mode']) == 'advanced' ) ) {
			add_filter('get_search_form', array($this, 'use_custom_search_form_template'));
		}				
	}
	
	function remove_search_form_filter($atts)
	{
		if ( !empty($atts['mode']) && ( strtolower($atts['mode']) == 'advanced' ) ) {
			remove_filter('get_search_form', array($this, 'use_custom_search_form_template'));
		}
	}
	
	/**
	 * Adds extra hidden fields to the end of the advanced search form,
	 * specifying the order for the search results.
	 *
	 * @param string $hidden_fields The HTML for the current hidden inputs.
	 * @param string $search_atts The attributes the shortcode rendering this 
	 * 							  form was called with
	 * @param string $search_form_html The HTML for the search form, from WP.
	 *
	 * @return string The $hidden_fields HTML, with our extra inputs added.
	 */
	function add_hidden_fields_to_search_form($hidden_fields, $search_atts = array(), $search_form_html = '')
	{
		// add order_by and order fields, if specified
		if ( !empty($search_atts) ) {
			if ( !empty( $search_atts['order_by'] ) ) {
				$order_by = !empty( $search_atts['order_by'] )
					? sanitize_title($search_atts['order_by'])
					: 'last_name';
				$hidden_fields .= sprintf('<input type="hidden" name="_search_directory[order_by]" value="%s">', $order_by);
			}			 

			if ( !empty( $search_atts['order'] ) ) {
				$order = !empty( $search_atts['order'] )
					? strtoupper( sanitize_title($search_atts['order']) )
					: 'ASC';
				$hidden_fields .= sprintf('<input type="hidden" name="_search_directory[order]" value="%s">', $order);
			}
		}
		return $hidden_fields;
	}
	
	/* 
	 * Use a custom search form template if one was provided
	 * (Advanced search mode only)
	 */
	function use_custom_search_form_template($form)
	{
		$template_path = $this->get_template_path('search-staff-members-form.php');
		if ( file_exists($template_path) ) {
			$view_vars = array(
				'staff_categories' => $this->get_all_staff_categories(),
			);
			return $this->render_template( $template_path, $view_vars );
		}
		else {
			return $form;
		}
	}
	
/*
	 * Filters the search by our custom fields (first name, last name, category)
	 * if they are specified in the REQUEST params
	 */
	function filter_search_query($query)
	{
		// only filter the main query when advanced search params are specified
		if( !empty($_REQUEST['_search_directory']) && $query->is_main_query() )
		{
			// turn off Relevanssi filters to un-break search
			// http://www.relevanssi.com/knowledge-base/how-to-disable-relevanssi/			
			remove_filter('posts_request', 'relevanssi_prevent_default_request'); 
			remove_filter('the_posts', 'relevanssi_query');
			
			$meta_conditions = array();
			$tax_conditions = array();
			
			// add any keys present to either the taxonomy query or meta query
			foreach($this->allowed_order_by_keys as $key)
			{
				// skip any unset keys
				if ( empty($_REQUEST['_search_directory'][$key]) ) {
					continue;
				}
				
				if ( $key == 'staff_category' )
				{
					$val = $_REQUEST['_search_directory'][$key];
					if ($val == '-1') {
						continue;
					}
					else {
						$tax_conditions[] = array(
							'taxonomy' => 'staff-member-category',
							'key' => 'term_id',
							'terms' => array($val),
							'operator' => 'IN'
						);
					}
				}
				else				
				{
					$meta_conditions[] = array(
						'key' => '_ikcf_' . $key,
						'value' => $_REQUEST['_search_directory'][$key],
						'compare' => 'LIKE'
					);
				}
			}
			
			if ( !empty($meta_conditions) || !empty($tax_conditions) ) {				
				$query->set('s', ''); // s has to be set to *something* or no search will run
			}
						
			if ( !empty($meta_conditions) )
			{
				$query->set(
					'meta_query',
					array(
						'relation' => 'AND',
						$meta_conditions
					)
				);			
			}
			
			if ( !empty($tax_conditions) )
			{
				$query->set(
					'tax_query',
					array(
						'post_type' => 'staff-member',
						$tax_conditions
					)
				);			
			}
			
			// order by first or last name, depending on request
			$order_by = !empty($_REQUEST['_search_directory']['order_by']) && in_array($_REQUEST['_search_directory']['order_by'], $this->allowed_order_by_keys) ? $_REQUEST['_search_directory']['order_by'] : 'last_name';
			$order = !empty($_REQUEST['_search_directory']['order']) && in_array($_REQUEST['_search_directory']['order'], array('ASC', 'DESC')) ? $_REQUEST['_search_directory']['order'] : 'ASC';
			$meta_key = '_ikcf_' . $order_by;
			
			$query->set('meta_key', $meta_key);
			$query->set('orderby', 'meta_value');
			$query->set('order', $order);
			
		}
	}
	
	/* 
	 *	In the case of advanced searches, this function overrides the search query before it's displayed
	 *  so that it shows the First Name + Last Name, instead of a blank string
	 */
	function get_search_query($s)
	{
		if( (!empty($_REQUEST['_search_directory']['first_name']) || !empty($_REQUEST['_search_directory']['last_name'])) && empty($s) )
		{
			if ( !empty($_REQUEST['_search_directory']['first_name']) ) {
				$s .= $_REQUEST['_search_directory']['first_name'];				
			}
			
			if ( !empty($_REQUEST['_search_directory']['last_name']) ) {
				if ( !empty($s) ) {
					$s .= ' ';
				}
				$s .= $_REQUEST['_search_directory']['last_name'];
			}			
		}	
		return $s;
	}	
	
	/* Import / Export */
		
	/* Looks for a special POST value, and if its found, outputs a CSV of all Staff Members */
	function process_import_export()
	{
		// look for an Export command
		if ( isset($_POST['_company_dir_do_export']) && $_POST['_company_dir_do_export'] == '_company_dir_do_export' ) {
			$exporter = new CompanyDirectoryPlugin_Exporter();
			$exporter->process_export();
			exit();
		}
		// look for an Import command (Direct input, aka "Clipboard" method)
		else if ( isset($_POST['_company_dir_do_direct_import']) ) {
			$importer = new CompanyDirectoryPlugin_Importer($this);
			
			if ( !empty($_POST['csv_data']) ) {		
				$posts = $this->get_csv_data_from_post('csv_data', true);
				$posts = array_map( array($this, 'combine_row_with_headers'), $posts);
				
				if ( !empty($posts) ) {
					
					$importer = $this->Factory->get('GP_Vandelay_Importer');
					$batch_id = $importer->direct_import($posts);
					
					if ( $batch_id ) {
						add_action( 'admin_notices', array( $this, 'display_import_notice' ) );
					}
				}
			}
		}
	}	
	
	/* 
	 * Get CSV data from POST data
	 *
	 * @param string $post_key The POST field  which contains the CSV data
	 * @param bool $skip_first_row Set to true if the first row contains the 
	 * 							   CSV headers, andshould be skipped. 
	 * 							   Default: false.
	 * @returns array The posted CSV data, or empty array if no CSV data found.
	 */
	private function get_csv_data_from_post($post_key = 'csv', $skip_first_row = false)
	{		
		$csv_data = trim ( filter_input(INPUT_POST, $post_key) );
		if ( empty($csv_data) ) {
			return array();
		}
		
		$csv_data = $this->replace_new_lines_inside_quotes($csv_data);		
		$exploded = explode("\n", $csv_data );
		$csv_rows = array_map( 'str_getcsv', $exploded );
		
		if ( $skip_first_row ) {
			array_shift($csv_rows);
		}
	
		return !empty($csv_rows)
			   ? $csv_rows
			   : array();
	}	
	
	private function replace_new_lines_inside_quotes($text)
	{
		return preg_replace_callback('~"[^"]+"~', array($this, 'replace_new_lines_with_escaped_version'), $text);
	}
	
	private function replace_new_lines_with_escaped_version($m)
	{
		return preg_replace('~\r?\n~', '\n', $m[0]);
	}

	private function combine_row_with_headers($row)
	{
		$row = array_pad( $row, count(self::$csv_headers), "" );
		$row = array_combine(self::$csv_headers, $row);
		return $row;
	}
	
	public function display_import_notice()
	{
		$output = sprintf("<h3>%s</h3>", __("Success! Your import is in progress.", 'company-directory'));
		$output .= sprintf("<p>%s</p>", __("Your import job is now running. You will see your Staff Members appearing shortly, and you can check the status of this batch any time on the history tab.", 'company-directory') );
		printf('<div id="messages" class="gp_updated fade"><p>%s</p></div>', $output );
	}
	
	function receive_ajax_import()
	{
		$nonce = filter_input(INPUT_POST, 'vandelay_wpnonce');
		$vandelay_importer = $this->Factory->get('GP_Vandelay_Importer');

		if ( !empty($_POST['data_json']) ) {
			//if valid nonce
			//if current_user_can administrator or super_admin
			$sd_importer = new CompanyDirectoryPlugin_Importer($this);
			if( $vandelay_importer->verify_import_nonce($nonce) &&
				current_user_can('administrator') || current_user_can('super_admin') 
			){				
				@ini_set( 'memory_limit', apply_filters( 'admin_memory_limit', '4096M' ) );
				set_time_limit(0);				
				$json = $vandelay_importer->get_json_data_from_post('data_json', true);
				
				// add overwrite_existing key to each row if option is set
				
				$batch_id = $vandelay_importer->import_from_json($json);
				wp_die( json_encode ( array (
					'status' => 'pending',
					'batch_id' => $batch_id,
					'rows' => count($json)
				) ) );
				
			}
		}
	
		wp_die( json_encode ( array (
			'status' => 'fail',
		) ) );
	}

	/* 
	 * Converts an array of "show" attributes (ie, show_name, show_title, etc)
	 * to a comma separated list of column attributes
	 *
	 * @param $instance array Array of widget attributes
	 *
	 * @return string Comma separated list of attributes 
	 */
	function build_column_list_from_attributes($instance)
	{		
		$cols = '';
		
		$opts['name'] 		= isset($instance['show_name']) ? $instance['show_name'] : true;
		$opts['title'] 		= isset($instance['show_title']) ? $instance['show_title'] : true;
		$opts['bio'] 		= isset($instance['show_bio']) ? $instance['show_bio'] : true;
		$opts['photo'] 		= isset($instance['show_photo']) ? $instance['show_photo'] : true;
		$opts['email'] 		= isset($instance['show_email']) ? $instance['show_email'] : true;
		$opts['phone'] 		= isset($instance['show_phone']) ? $instance['show_phone'] : true;
		$opts['address']	= isset($instance['show_address']) ? $instance['show_address'] : true;
		$opts['website']	= isset($instance['show_website']) ? $instance['show_website'] : true;
				
		// Add each selected column the string we're building
		foreach( $opts as $key => $val ) {
			if ( !empty($val) ) {
				$cols .= sprintf('%s,', $key);				
			}
		}
		
		// allow the user to filter the column list before returning it
		$cols = rtrim($cols, ',');
		
		return apply_filters('staff_list_columns', $cols);
	}
	
	/* 
	 * Ensures that the list of columns includes all show_X attributes
	 *
	 * @param $columns string Comma separated list of column names
	 * @param $instance array Array of widget attributes to consider
	 *
	 * @return string Comma separated list of attributes with missing
					  attributes added
	 */
	function add_missing_column_attributes($columns, $instance)
	{
		$already_included = explode(',', $columns);
		$list_from_atts = explode( ',', $this->build_column_list_from_attributes($instance) );
		$diff = array_diff($list_from_atts, $already_included);
		$combined = $already_included;
		foreach ($diff as $val) {
			$combined[] = $val;
		}
		return implode(',', $combined);
	}
		

	function settings_page_top()
	{
		$title = "Company Directory Settings";
		if (isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true'){
			$this->messages[] = "Company Directory Settings Updated.";
		}
		
		global $pagenow;
		?>
		<script type="text/javascript">
		jQuery(function () {
			if (typeof(gold_plugins_init_coupon_box) == 'function') {
				gold_plugins_init_coupon_box();
			}
		});
		</script>
		<div class="wrap staff_directory_admin_wrap is_pro">
		<h2><?php echo $title; ?></h2>	
		<?php
			if( !empty($this->messages) ){
				foreach($this->messages as $message){
					echo '<div id="messages" class="gp_updated fade">';
					echo '<p>' . $message . '</p>';
					echo '</div>';
				}
				
				$this->messages = array();
			}
	}
	
	function build_grid_css($atts)
	{
		$border_width = 1; // TODO: make an option
		
		// convert overlay color + opacity into an rgba() string
		$overlay_color = $this->convert_color_name_to_hex($atts['grid_overlay_color']);
		$overlay_opacity = $this->normalize_opacity($atts['grid_overlay_opacity']);
		$overlay_rgb_str = $this->hex_to_rgba($overlay_color, $overlay_opacity);

		// convert caption background color + opacity into an rgba() string
		$caption_background_color = $this->convert_color_name_to_hex($atts['grid_caption_background_color']);
		$caption_opacity = $this->normalize_opacity($atts['grid_caption_background_opacity']);
		$caption_rgb_str = $this->hex_to_rgba($caption_background_color, $caption_opacity);

		// normalize name and title colors, by converting names (e.g., "blue")
		// to their corresponding hex values
		$name_color = $this->convert_color_name_to_hex($atts['grid_name_color']);
		$title_color = $this->convert_color_name_to_hex($atts['grid_title_color']);
		
		// normalize photo and height values
		$photo_width = $this->normalize_css_dimension($atts['grid_photo_width']);
		$photo_height = $this->normalize_css_dimension($atts['grid_photo_height']);
		$photo_frame_width = $this->add_to_css_dimension($atts['grid_photo_width'], ($border_width * 2) );
		$photo_frame_height = $this->add_to_css_dimension($atts['grid_photo_height'], ($border_width * 2) );
				

		// determine CSS ID for this grid instance
		$id = !empty($atts['guid'])
			  ? '#' . $atts['guid']
			  : '';
				
		// generate the CSS block to output
		$css = 
		$id . '.staff-grid .staff-member-overlay {
			background-color: ' . $overlay_rgb_str . '
			color: ' . $name_color . ';
		}
		' . $id . '.staff-grid .staff-member .staff-member-overlay a {
			color: ' . $name_color . ';
			border-color: ' . $name_color . ';
			box-shadow: none;
		}
		' . $id . '.staff-grid .staff-member-overlay-inner {
			background-color: ' . $caption_rgb_str . '
		}
		' . $id . '.staff-grid .staff-member .staff-member-name,
		' . $id . '.staff-grid .staff-member .staff-member-name a {
			color: ' . $name_color . ';
			border-color: ' . $name_color . ';
			box-shadow: none;
			font-weight: normal;
		}
		' . $id . '.staff-grid .staff-member .staff-member-title,
		' . $id . '.staff-grid .staff-member .staff-member-title a {
			color: ' . $title_color . ';
			border-color: ' . $title_color . ';
			box-shadow: none;
		}';
		
		// if photo height was specified, add rule for it
		if ( !empty($photo_height) ) {
			$css .= $id . '.staff-grid .staff-photo-placeholder {
				height: ' . $photo_frame_height . ';
			}';
			$css .= $id . '.staff-grid .staff-photo {
				max-height: ' . $photo_frame_height . ';
			}';
			$css .= $id . '.staff-grid .staff-photo img {
				height: ' . $photo_height . ';
			}';
		}
		
		// if photo width was specified, add rule for it
		if ( !empty($photo_width) ) {
			$css .= $id . '.staff-grid .staff-photo-placeholder {
				height: ' . $photo_frame_width . ';
			}';
			$css .= $id . '.staff-grid .staff-photo {
				max-width: ' . $photo_frame_width . ';
			}';
			$css .= $id . '.staff-grid .staff-photo img {
				width: ' . $photo_width . ';
			}';
		}
		
		$css = apply_filters('company_directory_grid_css', $css, $atts);
		return $css;
	}
	
	function convert_color_name_to_hex($color_name)
	{
		$original = $color_name;
		$color_name = strtolower($color_name);
		$color_name = trim($color_name, ' #;');
		$color_name = str_replace(array(' ', '-'), '', $color_name);
		$colors = $this->html_colors_array();
		if ( !empty($colors[$color_name]) ) {
			// matched a color name so return the matching hex code
			return $colors[$color_name];
		} else {
			// could not convert to hex so return the input string unchanged
			return $original;
		}
	}
	
	function normalize_css_dimension($dim, $value_if_no_match = '')
	{
		$dim = strtolower( trim($dim) );
		$px_regex = '/(\d*)(px|%)?/i';
		
		if ( $dim == 'auto' ) {
			return $dim;
		}
		else if ( $this->exact_match_regex($dim, $px_regex) ) {
			if ( !$this->ends_with($dim, 'px') ) {
				$dim .= 'px';
			}
			return $dim;
		} else {
			// didnt match any valid pattern, so return the default string
			return $value_if_no_match;
		}
		
	}
	
	function add_to_css_dimension($dim, $px_to_add)
	{
		$dim = $this->normalize_css_dimension($dim);
		if ($dim == 'auto') {
			return 'auto';
		} else if ( !empty($dim) ) {
			$px_int = intval($dim) + $px_to_add;
			return $px_int . 'px';
		}
		return $dim;
	}
	
	function normalize_opacity( $opacity )
	{
		if ( is_numeric($opacity) && $opacity <= 1 ) {
			$opacity = max(0, $opacity);
			$opacity = min(1, $opacity);
		}
		else {
			$opacity = intval($opacity);
			$opacity = max(0, $opacity);
			$opacity = min(100, $opacity);
			$opacity = $opacity / 100;			
		}		
		return $opacity;
	}
	
	function hex_to_rgba($hexStr, $opacity = '.5')
	{
		$rgb_str = $this->hex_to_rgb($hexStr, true);
		return sprintf('rgba(%s, %s);', $rgb_str, $opacity);
	}
	
	function hex_to_rgb($hexStr, $returnAsString = false, $seperator = ',')
	{
		$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
		$rgbArray = array();
		if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
			$colorVal = hexdec($hexStr);
			$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
			$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
			$rgbArray['blue'] = 0xFF & $colorVal;
		} elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
			$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
			$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
			$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
		} else {
			return false; //Invalid hex color code
		}
		return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
	}
	
	/*
	 * Checks whether the string is an exact match for the given regex.
	 *
	 * @param String $str_check The string to examine
	 * @param String $regex The regex pattern that $str_check should match
	 *
	 * @return bool true if $str_check matches $regex exactly, false if not.
     */								  
	function exact_match_regex($str_check, $regex)
	{
		$matched = ( preg_match($regex, $str_check, $matches) == 1 );
		if ( $matched ) {
			if ( !empty($matches[0]) && ( $matches[0] == $str_check ) ) {
				return true;
			}
		}
		return false;
	}
	
	/*
	 * Checks whether the first string ends with the second string.
	 *
	 * @param String $str_check The string to examine
	 * @param String $maybe_ends_with The string that should appear at the end
	 *								  of $str_check
	 *
	 * @return bool true if $str_check ends with $maybe_ends_with, 
	 * 				false if not.
     */								  
	function ends_with($str_check, $maybe_ends_with)
	{
		$strlen = strlen($str_check);
		$testlen = strlen($maybe_ends_with);
		if ($testlen > $strlen) {
				return false;
		}
		$cmp = substr_compare(
					$str_check,
					$maybe_ends_with,
					$strlen - $testlen, $testlen
			   );
		return ( $cmp === 0 );
	}
	
	function generate_guid()
	{		
		return sprintf( 'staff_list_%s', substr( md5( rand() ), 0, 20) );
	}
	
	function get_template_path($template_name)
	{
		// checks if the file exists in the theme first,
		// otherwise serve the file from the plugin
		if ( $theme_file = locate_template( array ( $template_name ) ) ) {
			$template_path = $theme_file;
		} else {
			$template_path = plugin_dir_path( $this->base_file ) . 'templates/' . $template_name;
		}
		return $template_path;
	}
	
	// Get a list of all staff-member-category terms
	// Pass $hide_empty = true to exclude empty categories
	function get_all_staff_categories($orderby = 'name', $order = 'ASC', $hide_empty = false)
	{
		$taxonomies = array( 
			'staff-member-category',
		);

		$args = array(
			'orderby'           => $orderby, 	// default: 'name'
			'order'             => $order,		// default: 'ASC'
			'hide_empty'        => $hide_empty, // default: false
		); 

		return get_terms($taxonomies, $args);
	}
	
	function render_template($templatePath, $vars = false)
	{
		$templateFile = basename($templatePath);

		// checks if the file exists in the theme first,
		// otherwise serve the file from the plugin
		if ( $theme_file = locate_template( array ( $templateFile ) ) ) {
			$real_template_path = $theme_file;
		} else {
			$real_template_path = $templatePath;
		}

		if (is_array($vars)) {
			extract($vars);
		}

		$html = '' . $real_template_path;
		if (file_exists($real_template_path)) {
			ob_start(); 
			require ($real_template_path);
			$html = ob_get_clean();
		}
		return $html;		
	}
	
	
	function html_colors_array()
	{
		return array(
			'aliceblue' => '#f0f8ff',
			'antiquewhite' => '#faebd7',
			'aqua' => '#00ffff',
			'aquamarine' => '#7fffd4',
			'azure' => '#f0ffff',
			'beige' => '#f5f5dc',
			'bisque' => '#ffe4c4',
			'black' => '#000000',
			'blanchedalmond' => '#ffebcd',
			'blue' => '#0000ff',
			'blueviolet' => '#8a2be2',
			'brown' => '#a52a2a',
			'burlywood' => '#deb887',
			'cadetblue' => '#5f9ea0',
			'chartreuse' => '#7fff00',
			'chocolate' => '#d2691e',
			'coral' => '#ff7f50',
			'cornflowerblue' => '#6495ed',
			'cornsilk' => '#fff8dc',
			'crimson' => '#dc143c',
			'cyan' => '#00ffff',
			'darkblue' => '#00008b',
			'darkcyan' => '#008b8b',
			'darkgoldenrod' => '#b8860b',
			'darkgray' => '#a9a9a9',
			'darkgreen' => '#006400',
			'darkkhaki' => '#bdb76b',
			'darkmagenta' => '#8b008b',
			'darkolivegreen' => '#556b2f',
			'darkorange' => '#ff8c00',
			'darkorchid' => '#9932cc',
			'darkred' => '#8b0000',
			'darksalmon' => '#e9967a',
			'darkseagreen' => '#8fbc8f',
			'darkslateblue' => '#483d8b',
			'darkslategray' => '#2f4f4f',
			'darkturquoise' => '#00ced1',
			'darkviolet' => '#9400d3',
			'deeppink' => '#ff1493',
			'deepskyblue' => '#00bfff',
			'dimgray' => '#696969',
			'dodgerblue' => '#1e90ff',
			'firebrick' => '#b22222',
			'floralwhite' => '#fffaf0',
			'forestgreen' => '#228b22',
			'fuchsia' => '#ff00ff',
			'gainsboro' => '#dcdcdc',
			'ghostwhite' => '#f8f8ff',
			'gold' => '#ffd700',
			'goldenrod' => '#daa520',
			'gray' => '#808080',
			'green' => '#008000',
			'greenyellow' => '#adff2f',
			'honeydew' => '#f0fff0',
			'hotpink' => '#ff69b4',
			'indianred' => '#cd5c5c',
			'indigo' => '#4b0082',
			'ivory' => '#fffff0',
			'khaki' => '#f0e68c',
			'lavender' => '#e6e6fa',
			'lavenderblush' => '#fff0f5',
			'lawngreen' => '#7cfc00',
			'lemonchiffon' => '#fffacd',
			'lightblue' => '#add8e6',
			'lightcoral' => '#f08080',
			'lightcyan' => '#e0ffff',
			'lightgoldenrodyellow' => '#fafad2',
			'lightgrey' => '#d3d3d3',
			'lightgreen' => '#90ee90',
			'lightpink' => '#ffb6c1',
			'lightsalmon' => '#ffa07a',
			'lightseagreen' => '#20b2aa',
			'lightskyblue' => '#87cefa',
			'lightslategray' => '#778899',
			'lightsteelblue' => '#b0c4de',
			'lightyellow' => '#ffffe0',
			'lime' => '#00ff00',
			'limegreen' => '#32cd32',
			'linen' => '#faf0e6',
			'magenta' => '#ff00ff',
			'maroon' => '#800000',
			'mediumaquamarine' => '#66cdaa',
			'mediumblue' => '#0000cd',
			'mediumorchid' => '#ba55d3',
			'mediumpurple' => '#9370d8',
			'mediumseagreen' => '#3cb371',
			'mediumslateblue' => '#7b68ee',
			'mediumspringgreen' => '#00fa9a',
			'mediumturquoise' => '#48d1cc',
			'mediumvioletred' => '#c71585',
			'midnightblue' => '#191970',
			'mintcream' => '#f5fffa',
			'mistyrose' => '#ffe4e1',
			'moccasin' => '#ffe4b5',
			'navajowhite' => '#ffdead',
			'navy' => '#000080',
			'oldlace' => '#fdf5e6',
			'olive' => '#808000',
			'olivedrab' => '#6b8e23',
			'orange' => '#ffa500',
			'orangered' => '#ff4500',
			'orchid' => '#da70d6',
			'palegoldenrod' => '#eee8aa',
			'palegreen' => '#98fb98',
			'paleturquoise' => '#afeeee',
			'palevioletred' => '#d87093',
			'papayawhip' => '#ffefd5',
			'peachpuff' => '#ffdab9',
			'peru' => '#cd853f',
			'pink' => '#ffc0cb',
			'plum' => '#dda0dd',
			'powderblue' => '#b0e0e6',
			'purple' => '#800080',
			'red' => '#ff0000',
			'rosybrown' => '#bc8f8f',
			'royalblue' => '#4169e1',
			'saddlebrown' => '#8b4513',
			'salmon' => '#fa8072',
			'sandybrown' => '#f4a460',
			'seagreen' => '#2e8b57',
			'seashell' => '#fff5ee',
			'sienna' => '#a0522d',
			'silver' => '#c0c0c0',
			'skyblue' => '#87ceeb',
			'slateblue' => '#6a5acd',
			'slategray' => '#708090',
			'snow' => '#fffafa',
			'springgreen' => '#00ff7f',
			'steelblue' => '#4682b4',
			'tan' => '#d2b48c',
			'teal' => '#008080',
			'thistle' => '#d8bfd8',
			'tomato' => '#ff6347',
			'turquoise' => '#40e0d0',
			'violet' => '#ee82ee',
			'wheat' => '#f5deb3',
			'white' => '#ffffff',
			'whitesmoke' => '#f5f5f5',
			'yellow' => '#ffff00',
			'yellowgreen' => '#9acd32'
		);
	}
	
	
	function settings_page_bottom()
	{

	}
	
	function init_updater()
	{
		$this->GP_Plugin_Updater = $this->Factory->get('GP_Plugin_Updater');		
	}	

	function init_galahad()
	{
		$this->GP_Galahad = $this->Factory->get('GP_Galahad');
	}	
}

/**
 * Returns the Staff Category name for the current request.
 *
 * @return string Category name, if a valid category ID is present in the URL.
 * 				  Returns first category name if more than one is specified.
 * 				  Returns Empty string if no valid category ID is present.
 */
function cd_get_staff_search_category_name()
{
	$category_name = '';
	if ( !empty($_REQUEST['_search_directory']['staff_category']) 
		 && intval($_REQUEST['_search_directory']['staff_category']) > 0
	 ) {
		$staff_category_id = intval($_REQUEST['_search_directory']['staff_category']);
		$staff_category = get_term_by('id', $staff_category_id, 'staff-member-category');
		$category_name = !empty($staff_category->name)
					     ? $staff_category->name
					     : '';
	}
	return apply_filters('company_directory_search_get_staff_category_name', $category_name);
}