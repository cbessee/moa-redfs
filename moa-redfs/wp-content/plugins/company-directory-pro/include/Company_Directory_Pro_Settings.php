<?php
	require_once('lib/LDAP_Connection.php');


	class Company_Directory_Pro_Settings
	{
		function __construct( $factory )
		{
			add_action( 'admin_init', array( $this, 'create_settings' ) );
			$this->options = get_option( 'cd_pro_options' );
			$this->Factory = $factory;
			$this->Importer = $this->Factory->get('GP_Vandelay_Importer');			
			add_action( 'wp_ajax_cd_test_ldap_connection_info', array($this, 'test_ldap_connection_info') );
			add_action( 'wp_ajax_cd_run_ldap_import', array($this, 'run_ldap_import') );
		}
		
		function add_license_settings()
		{
			register_setting( 'company-directory-pro-license-group', 'company_directory_pro_registered_key', array($this, 'handle_check_software_license') );
		}	
		
		/*
		 * Verifies the provided pro credentials before they are saved. Intended to
		 * be called from the sanitization callback of the registration options.
		 *
		 * @param string $new_api_key The API key that's just been entered into the 
		 * 								settings page. Passed by WordPress to the 
		 * 								sanitization callback. Optional.
		 */
		function handle_check_software_license($new_api_key = '')
		{
			// abort if required field is missing
			$lm_action = strtolower( filter_input(INPUT_POST, '_gp_license_manager_action') );
			if ( empty($new_api_key) || empty($lm_action) ) {
				return $new_api_key;
			}
			
			$updater = $this->Factory->get('GP_Plugin_Updater');

			if ( $lm_action == 'activate' ) {
				// attempt to activate the new key with the home server
				$result = $updater->activate_api_key($new_api_key);
			}
			else if ( $lm_action == 'deactivate' ) {
				// attempt to deactivate the key with the home server
				$result = $updater->deactivate_api_key($new_api_key);	
			}
			
			$options = get_option('cd_pro_options');
			$options['api_key'] = $new_api_key;
			update_option('cd_pro_options', $options);
			
			return $new_api_key;
		}
		
		function render_license_information_page()
		{	
			// setup the Sajak tabs for this screen
			$this->tabs = new GP_Sajak( array(
				'header_label' => 'Company Directory Pro - License',
				'settings_field_key' => 'company-directory-pro-license-group', // can be an array
			) );		
			
			$this->tabs->add_tab(
				'company_directory_pro_license', // section id, used in url fragment
				'Pro License', // section label
				array( $this, 'output_registration_options' ), // display callback
				array( // tab options
					'icon' => 'key',
					'show_save_button' => false
				)
			);
			
			// render the page
			//$this->settings_page_top();	
			$this->tabs->display();
			//$this->settings_page_bottom();
		}
		
		function output_registration_options()
		{		
			$this->settings_page_top();
			$options = get_option('cd_pro_options');
			$license_key = $this->get_license_key();			
			?>							
				<h3>Company Directory Pro License</h3>			
				<p>With an active API key, you will be able to receive automatic software updates and contact support directly.</p>
				<?php if ( $this->is_activated() ): ?>		
				<div class="has_active_license" style="color:green;margin-bottom:20px;">
					<?php $expiration = $this->license_expiration_date();
					if ( $expiration == 'lifetime' ):
					?>
					<p><strong>&#x2713; Your API Key has been activated.</p>
					<?php else: ?>				
					<p><strong>&#x2713; Your API Key is active through <?php echo $this->license_expiration_date(); ?></strong>.</p>
					<?php endif; ?>
				</div>
				<input type="hidden" name="_gp_license_manager_action" value="deactivate" />
				<input type="hidden" name="company_directory_pro_registered_key" value="<?php echo htmlentities( $license_key ); ?>" />
				<button class="button">Deactivate</button>
				<?php else: ?>			
				<p>You can find your API key in the email you received upon purchase, or in the <a href="https://goldplugins.com/members/?utm_source=company_directory_pro_plugin&utm_campaign=get_api_key_from_member_portal">Gold Plugins member portal</a>.</p>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="company_directory_pro_registered_key">API Key</label></th>
						<td><input type="text" class="widefat" name="company_directory_pro_registered_key" id="company_directory_pro_registered_key" value="<?php echo htmlentities( $license_key ); ?>" autocomplete="off" />
						</td>
					</tr>
				</table>			
				<input type="hidden" name="_gp_license_manager_action" value="activate" />
				<button class="button">Activate</button>
				<?php endif; ?>			
			<?php 
			$this->settings_page_bottom();
		}
		
		/**
		 * Register and add settings
		 */
		function create_settings()
		{        	      				
			$this->add_license_settings();		
		
			// Generic setting. We need this for some reason so that we have a chance to save everything else.
			register_setting(
				'cd_pro_option_group', // Option group
				'cd_pro_options', // Option name
				array( $this, 'sanitize' ) // Sanitize
			);
			
			//general settings
			 add_settings_section(
				'import_export_settings', // ID
				'Import Settings', // Title
				array( $this, 'print_import_section_info' ), // Callback
				'cd_pro_import_settings' // Page
			);    
			
			//need to do this so these are output after the registration info
			$this->registered_sections[] = 'cd_pro_import_settings';
			
			//we don't need to add this to the registered sections array as these options are directly called
		/*	add_settings_field(
				'cd_pro_duplicate_match_id', // ID
				'Field to Match Duplicates On', // Title 
				array( $this, 'custom_css_callback' ), // Callback
				'cd_pro_import_settings', // Page
				'import_export_settings' // Section           
			);
		*/
		
			add_settings_field(
				'cd_pro_overwrite_existing', // ID
				'Overwrite Existing Records', // Title 
				array( $this, 'overwrite_existing_callback' ), // Callback
				'cd_pro_import_settings', // Page
				'import_export_settings' // Section           
			);

			add_settings_field(
				'cd_pro_duplicate_match_field', // ID
				'Field to Match for Duplicates', // Title 
				array( $this, 'duplicate_match_field_callback' ), // Callback
				'cd_pro_import_settings', // Page
				'import_export_settings' // Section           
			);
		}		
		
	
		/** 
		 * Print the Section text
		 */	
		public function print_import_section_info()
		{
			echo '<p>These options control the import process for all scenarios.</p>';
		}
		
		
		public function overwrite_existing_callback()
		{
			$checked =  isset( $this->options['overwrite_existing'] ) && $this->options['overwrite_existing'] == '0' ? '' : 'checked="checked"'; // defaults to checked
			$input_html = sprintf('<input type="checkbox" id="cd_pro_options_overwrite_existing" name="cd_pro_options[overwrite_existing]" value="1" %s />', $checked);
			$tmpl = 
				'<label for="cd_pro_overwrite_existing">' .
					'<input type="hidden" name="cd_pro_options[overwrite_existing]" value="0" />' .
					$input_html .
					__('Overwrite existing records on import.', 'company-directory') . 
				'</label>';
				
			printf(
				$tmpl,
				isset( $this->options['overwrite_existing'] ) ? esc_attr( $this->options['overwrite_existing']) : ''
			);
		}
		
		public function duplicate_match_field_callback()
		{
			$options = get_option('cd_pro_options');
			$match_field =  !empty( $options['duplicate_match_field'] )
							? $options['duplicate_match_field'] 
							: 'email'; // defaults to email

			$fields = array(
				'title' => __('Full Name', 'company-directory'),
				'email' => __('Email Address', 'company-directory'),
				'phone' => __('Phone Number', 'company-directory')
			);

			$options_html = '';
			foreach ($fields as $field => $label) {
				$sel = ( strcasecmp($field, $match_field) == 0 )
					   ? 'selected="selected"'
					   : '';
				$options_html .= sprintf('<option %s value="%s">%s</option>', $sel, $field , $label);					   
			}
			$select_html = sprintf('<select id="cd_pro_options_duplicate_match_field" name="cd_pro_options[duplicate_match_field]">%s</select>', $options_html);
			printf(
				'%s<br><label for="cd_pro_duplicate_match_field">%s</label>',
				$select_html,
				__('Records will be considered duplicate when these fields match.', 'company-directory')
			);
		}
		
		/**
		 * Import Export page callback
		 */
		public function render_import_export_page()
		{				
			//instantiate tabs object for output basic settings page tabs
			$tabs = new GP_Sajak( array(
				'header_label' => 'Import & Export',
				'settings_field_key' => 'cd_pro_option_group', // can be an array	
			) );
			
			$this->settings_page_top();
		
			$tabs->add_tab(
				'import-staff', // section id, used in url fragment
				'Import from File', // section label
				array($this, 'output_import_staff'), // display callback
				array(
					'class' => 'extra_li_class', // extra classes to add sidebar menu <li> and tab wrapper <div>
					'icon' => 'file-o', // icons here: http://fontawesome.io/icons/
					'show_save_button' => false
				)
			);
		
			$tabs->add_tab(
				'import-staff-from-clipboard', // section id, used in url fragment
				'Import from Clipboard', // section label
				array($this, 'output_import_staff_from_clipboard'), // display callback
				array(
					'class' => 'extra_li_class', // extra classes to add sidebar menu <li> and tab wrapper <div>
					'icon' => 'clipboard', // icons here: http://fontawesome.io/icons/
					'show_save_button' => false
				)
			);
		
			$tabs->add_tab(
				'import-staff-from-ldap', // section id, used in url fragment
				'Import from LDAP / Active&nbsp;Directory', // section label
				array($this, 'output_import_staff_from_ldap'), // display callback
				array(
					'class' => 'extra_li_class', // extra classes to add sidebar menu <li> and tab wrapper <div>
					'icon' => 'user-plus', // icons here: http://fontawesome.io/icons/
					'show_save_button' => false
				)
			);
		
			$tabs->add_tab(
				'export-staff', // section id, used in url fragment
				'Export', // section label
				array($this, 'output_export_staff'), // display callback
				array(
					'class' => 'extra_li_class', // extra classes to add sidebar menu <li> and tab wrapper <div>
					'icon' => 'arrow-right', // icons here: http://fontawesome.io/icons/
					'show_save_button' => false					
				)
			);
		
			$tabs->add_tab(
				'import-export-settings', // section id, used in url fragment
				'Settings', // section label
				array($this, 'output_import_export_settings'), // display callback
				array(
					'class' => 'extra_li_class', // extra classes to add sidebar menu <li> and tab wrapper <div>
					'icon' => 'gear', // icons here: http://fontawesome.io/icons/
					'show_save_button' => true
				)
			);

			$tabs->add_tab(
				'import-staff-history', // section id, used in url fragment
				'History', // section label
				array($this, 'output_import_staff_history'), // display callback
				array(
					'class' => 'extra_li_class', // extra classes to add sidebar menu <li> and tab wrapper <div>
					'icon' => 'clock-o', // icons here: http://fontawesome.io/icons/
					'show_save_button' => false
				)
			);
			
			$tabs->display();
			
			$this->settings_page_bottom();	
		}
		
		function output_import_staff()
		{
			printf( '<h1>%s</h1>', __('Import Staff Members', 'company-directory') );

			// output a Vandelay drop target for CSV files!
			$importer = $this->Factory->get('GP_Vandelay_Importer');
			echo $importer->wizard();
		}
		
		function output_import_staff_from_clipboard()
		{
			?>		
			<form method="POST" action="" enctype="multipart/form-data">
				<fieldset>
					<?php 
						//CSV Importer
						StaffDirectoryPlugin_Importer::output_form();
					?>
				</fieldset>
			</form>
			<?php
		}

		function output_import_staff_from_ldap()
		{
			?>		
			<h2>Import Staff from LDAP or Active Directory</h2>
			<hr>
			<div id="ldap_import_tabs">
				<div class="ldap_import_step">
					<p>First, enter your connection information below. We will attempt to connect to your server with this information, but will not import any records yet.</p>
					<br>
					<fieldset>
						<div>
							<strong><label for="ldap_host">Hostname:</label></strong><br>						
							<input name="ldap_host" value="" type="text" style="min-width:400px" />
						</div>
						<div>
							<strong><label for="ldap_port">Port:</label></strong><br>
							<input name="ldap_port" value="389" type="text" style="width:80px" />
						</div>
						<div>
							<strong><label for="ldap_bind_dn">Bind DN:</label></strong><br>
							<input name="ldap_bind_dn" value="" type="text" style="min-width:400px" />
						</div>
						<div>
							<strong><label for="ldap_bind_pass">Bind Password:</label></strong><br>
							<input name="ldap_bind_pass" value="" type="password" style="min-width:400px" />
						</div>
						<br>
						<div>
							<button class="button button-primary" type="button" id="ldap_test_connection_info">Test Connection &amp; Continue &raquo;</button>
						</div>
						
						<input name="do_ldap_import" value="1" type="hidden" />
						<?php 
							//CSV Importer
							//StaffDirectoryPlugin_Importer::output_form();
						?>
					</fieldset>
				</div>
				<div class="ldap_import_step">
					<h3>Success</h3>
					<br>
					<p>The test connection was successful. To import, click Continue now.</p>
					<div>
						<label>
						<?php $checked = isset( $this->options['overwrite_existing'] ) && $this->options['overwrite_existing'] == '0' ? '' : 'checked="checked"';	?>
							<input type="checkbox" name="ldap_overwrite_existing_records" value="1" <?php echo $checked; ?>/> <?php _e('Overwrite existing records on import.'); ?>
						</label>
					</div>
					<br>
					<br>
					<button type="button" class="button button-primary" id="ldap_run_import">Import Now</button>
					<br>
				</div>
				<div class="ldap_import_step">
					<h3>Success! Your import is in progress</h3>
					<p>Your import job is now running. You will see your Staff Members appearing shortly, and you can check the status of this batch any time on the history tab.</p>
				</div>
			</div><!--#ldap_import_tabs-->
			<?php
		}
		
		function output_import_export_settings()
		{			
			// Output each registered settings group
			if(count($this->registered_sections) > 0){
				foreach ($this->registered_sections as $registered_section) {
					do_settings_sections( $registered_section );
				}					
			}
		}

		function output_import_staff_history()
		{
			?>
			<h1>Import History</h1>
			<div id="vandelay_import_history_wrapper">
			<?php
				$importer = $this->Factory->get('GP_Vandelay_Importer');
				echo $importer->get_history();
			?>
			</div>
			<?php
		}
		
		function output_export_staff()
		{
			?>
			<form method="POST" action="" enctype="multipart/form-data">	
				<fieldset>
					<h1>Export Staff Members</h1>
					<?php 
						//CSV Exporter
						StaffDirectoryPlugin_Exporter::output_form();
					?>
				</fieldset>
			</form>
			<?php
		}

		/* 
		 * Helper functions 
		*/

		function get_license_key()
		{
			$options = get_option('cd_pro_options');
			$license_key = !empty($options) && !empty($options['api_key'])
						   ? trim($options['api_key'])
						   : '';
			return $license_key;
		}
		
		function is_activated()
		{
			$key = $this->get_license_key();
			if ( empty($key) ) {
				return false;
			}
			
			$updater = $this->Factory->get('GP_Plugin_Updater');
			return $updater->has_active_license();
		}
		
		function license_expiration_date()
		{
			$updater = $this->Factory->get('GP_Plugin_Updater');
			$expiration = $updater->get_license_expiration();
			
			// handle lifetime licenses
			if ('lifetime' == $expiration) {
				return 'lifetime';
			}
			
			// convert to friendly date
			return ( !empty($expiration) )
				   ? date_i18n( get_option('date_format', 'M d, Y'), $expiration)
				   : '';
		}
		
		/* 
		 * Pulls ldap connection information from $_POST if it is present.
		 * @return array The values from POST. Empty strings for missing keys.
		 */
		function collect_ldap_credentials_from_post()
		{
			$post_data = $_POST['data'];
			$credentials = array(
				'host' => !empty($post_data['ldap_host']) ? $post_data['ldap_host'] : '',
				'port' => !empty($post_data['ldap_port']) ? $post_data['ldap_port'] : '',
				'bind_dn' => !empty($post_data['ldap_bind_dn']) ? $post_data['ldap_bind_dn'] : '',
				'bind_pass' => !empty($post_data['ldap_bind_pass']) ? $post_data['ldap_bind_pass'] : '',
				'overwrite_existing' => !empty($post_data['ldap_overwrite_existing_records']) ? $post_data['ldap_overwrite_existing_records'] : 0,
			);
			return $credentials;
		}
		
		/* 
		 * Pulls LDAP credentials from $_POST, and tries to connect.
		 * @return bool True if the test connection succeeded, false if not.
		 */
		function test_ldap_connection_info()
		{
			$credentials = $this->collect_ldap_credentials_from_post();
			$ldap = new LDAP_Connection($credentials);
			$good = $ldap->test_credentials();			
			wp_die( $good ? '1' : '0' );
		}
		
		/* 
		 * Pulls LDAP credentials from $_POST, connects, and imports		 
		 * all users visible to the system. Overwrites existing users
		 * if the POST value is set.
		 * 
		 */
		function run_ldap_import()
		{
			$credentials = $this->collect_ldap_credentials_from_post();
			$ldap = new LDAP_Connection($credentials);
			$users = $this->load_staff_from_ldap($ldap, $credentials['overwrite_existing']);

			if ( !empty($users) ) {
				$importer = $this->Factory->get('GP_Vandelay_Importer');
				$batch_id = $importer->direct_import($users);
			}
			die( json_encode( array('batch_id' => $batch_id ) ) );
		}
		
		/* 
		 * Searches $arr for the keys listed in $key_list. Returns the value 
		 * of the first matched key, or $default_val if no match.
		 * 
		 * @param array $key_list List of keys (strings) to check, in order
		 * @param array $arr The array to search
		 * @param mixed $default_val The value to return if no match is found (optional).
		 * @return mixed The value if a key was matched, or $default_val if no 
		 *				 key matched.
		 */
		function array_pluck_value_in_order($key_list, $arr, $default_val = '')
		{
			foreach($key_list as $key) {
				if ( isset($arr[$key]) ) {
					return $arr[$key];
				} else if ( isset($arr[ strtolower($key) ]) ) {
					return $arr[ strtolower($key) ];
				}
				else if ( isset($arr[ strtoupper($key) ]) ) {
					return $arr[ strtoupper($key) ];
				}
			}
			return $default_val;
		}
		
		/* 
		 * Given an LDAP connection, loads the list of all users visible.
		 * 
		 * @param LDAP Connection $ldap An LDAP Connection object.
		 * @param bool $overwrite_existing Whether to overwrite existing 
		 *								   objects in the database (true),
		 *								   or skip them (false, default)
		 * @return array A list of users, in an array format which can be 
		 *				 imported.
		 */
		function load_staff_from_ldap($ldap, $overwrite_existing = false)
		{
			 $users = $ldap->list_users();
			 $user_list = array();
			 foreach($users as $user) {
				 $new_user = $this->reformat_ldap_entry($user);
				 $new_user['overwrite_existing'] = $overwrite_existing;
				 $user_list[] = $new_user;
			 }
			 return $user_list;						
		}
		
		/* 
		 * Format each entry in array with keys:
		 *	'Full Name',
		 *	'Body',
		 *	'First Name',
		 *	'Last Name',
		 *	'Title',
		 *	'Phone',
		 *	'Email',
		 *	'Address',
		 *	'Website',
		 *	'Categories',
		 *	'Photo'
		 * 
		 * @param array $entry The unformatted LDAP entry (i.e., an ldap_search result)
		 * @return array Array with the expected keys, and corresponding values
		 * 				  pulled from the LDAP entry as much as possible.
		 */
		function reformat_ldap_entry($entry)
		{
			 $correct_values = array(
				'Full Name'=> array('displayName', 'cn'),
				'Body'=> array('description'),
				'First Name'=> array('givenName'),
				'Last Name'=> array('sn', 'surname'),
				'Title'=> array('title'),
				'Phone'=> array('telephoneNumber', 'homePhone', 'otherTelephone'),
				'Email'=> array('mail', 'email'),
				'Website'=> array('wWWHomePage', 'url')
			);
			$new_entry = array();
			foreach($correct_values as $key => $key_list) {
				$new_entry[$key] = $this->array_pluck_value_in_order($key_list, $entry);
			}
			
			// if Full Name is empty, try to build from First and Last
			// falls back to email if if no names specified at all
			if ( empty($new_entry['Full Name']) ) {
				if ( !empty($new_entry['First Name']) || !empty($new_entry['Last Name']) ) {
					$new_entry['Full Name'] = trim( $new_entry['First Name'] . ' ' . $new_entry['Last Name'] );
				}
				else if ( !empty($new_entry['Email']) ) {
					$new_entry['Full Name'] = trim( $new_entry['Email'] );
				}
			}
			
			// add address
			$new_entry['Address'] = $this->build_address_from_ldap($entry);
			
			// if a "department" field is present, try to match it to a category
			$cats = $this->get_category_id_from_department_name($entry);
			if ( !empty($cats) ) {
				$new_entry['Categories'] = $cats;
			}
			
			return apply_filters('cd_import_reformat_ldap_entry', $new_entry, $entry);
		}
		
		/* 
		 * Given an LDAP entry, looks for a department field, and if one is found
		 * tries to convert it to a staff-member-category taxonomy term id.
		 * 
		 * @param array $entry The LDAP entry (i.e., an ldap_search result)
		 * @return array An array containing the matched staff-member-category IDs,
		 *				 or an empty array if no matches were found.
		 */
		function get_category_id_from_department_name($entry)
		{
			$matched_cats = array();
			if ( !empty($entry['department']) ) {
				$category = get_term_by('name', $entry['department'], 'staff-member-category');
				if ( !empty($category) ) {
					$matched_cats = array(intval($category->term_id));
				}				
			}
			return apply_filters('cd_import_match_category_ids', $matched_cats, $entry);
		}
		
		/* 
		 * Given an LDAP entry, combines the individual address fields into 
		 * a mailing address.
		 * 
		 * @param array $entry The LDAP entry (i.e., an ldap_search result)
		 * @return string The address, including as much information was 
		 * available. May be empty if no fields were present / non-empty.
		 */
		function build_address_from_ldap($entry)
		{
			$addr = '';
			if ( !empty($entry['streetAddress']) ) {
				$addr .= $entry['streetAddress'] . "\n";
			}
			
			if ( !empty($entry['postOfficeBox']) ) {
				$addr .= $entry['postOfficeBox'] . "\n";
			}
			
			// city
			if ( !empty($entry['l']) ) {
				$addr .= $entry['l'];
			}
			
			// state
			if ( !empty($entry['St']) ) {
				$addr .= ", " . $entry['St'];
			}
			
			// zip
			if ( !empty($entry['postalCode']) ) {
				$addr .= " " . $entry['postalCode'];
			}
			
			// country
			if ( !empty($entry['co']) ) {
				$addr .=  "\n" . $entry['co'];
			}
			
			return $addr;
		}
		
		
		//output top of settings page
		function settings_page_top($show_tabs = true)
		{
			global $pagenow;
			$title = 'Company Directory ' . __('Settings', 'company-directory');
			if( isset($_GET['settings-updated']) 
				&& $_GET['settings-updated'] == 'true' 
				&& $_GET['page'] != 'company-directory-license-settings' 
				&& strpos($_GET['page'], 'license-settings') !== false
			) {
				$this->messages[] = "Settings updated.";
			}
		?>
			<div class="wrapxx xxcompany_directory_admin_wrap">
		<?php
			if( !empty($this->messages) ){
				foreach($this->messages as $message){
					echo '<div id="messages" class="gp_updated fade">';
					echo '<p>' . $message . '</p>';
					echo '</div>';
				}
				
				$this->messages = array();
			}
		?>
			<div id="icon-options-general" class="icon32"></div>
			<?php
		}
		
		//builds the bottom of the settings page
		//includes the signup form, if not pro
		function settings_page_bottom()
		{
			?>
			</div>
			<?php
		}
	}