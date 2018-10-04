<?php


	require_once('lib/GP_Plugin_Updater/GP_Plugin_Updater.php');
	require_once('lib/GP_Galahad/GP_Galahad.php');
	require_once('lib/GP_Vandelay/gp_vandelay_importer.class.php');
	require_once('lib/Staff_Directory_Background_Import_Process.class.php');

	define('COMPANY_DIRECTORY_PRO_PLUGIN_ID', 7011);
	define('COMPANY_DIRECTORY_PRO_STORE_URL', 'https://goldplugins.com');

	class Company_Directory_Pro_Factory
	{		
		/*
		 * Constructor.
		 *
		 * @param string $_base_file The path to the base file of the plugin. 
		 *							 In most cases, pass the __FILE__ constant.
		 */
		function __construct($_base_file)
		{
			$this->_base_file = $_base_file;
		}
		
		function get($class_name)
		{
			
			switch ($class_name)
			{
				case 'GP_Plugin_Updater':
					return $this->get_gp_plugin_updater();
				break;
				
				case 'GP_Galahad':
					return $this->get_gp_galahad();
				break;
				
				case 'GP_Vandelay_Importer':
					return $this->get_vandelay_importer();
				break;
				
				default:
					return false;
				break;				
			}
		}

		function get_gp_plugin_updater()
		{
			if ( empty($this->GP_Plugin_Updater) ) {
				$api_args = array(
					'version' 	=> $this->get_current_version(),
					'license' 	=> $this->get_license_key(),
					'item_id'   => COMPANY_DIRECTORY_PRO_PLUGIN_ID,
					'author' 	=> 'Gold Plugins',
					'url'       => home_url(),
					'beta'      => false
				);
				$options = array(
					'plugin_name' => 'Company Directory Pro',
					'activate_url' => admin_url('admin.php?page=company-directory-license-information'),
					'info_url' => 'https://goldplugins.com/downloads/company-directory-pro/?utm_source=company_directory_pro&utm_campaign=activate_for_updates&utm_banner=plugin_links',
				);
				$this->GP_Plugin_Updater = new GP_Plugin_Updater(
					COMPANY_DIRECTORY_PRO_STORE_URL, 
					$this->_base_file, 
					$api_args,
					$options
				);
			}
			return $this->GP_Plugin_Updater;
		}
		
		function get_gp_galahad()
		{
			if ( empty($this->GP_Galahad) ) {
				$gp_updater = $this->get('GP_Plugin_Updater');
				$options = array(
					'active_license' => $gp_updater->has_active_license(),
					'plugin_name' => 'Company Directory Pro',
					'license_key' => $this->get_license_key(),
					'patterns' => array(
						'b_a_options',
						'company-directory(.*)',
						'company-directory(.*)',
						'company_directory(.*)',
						'company_directory(.*)',
					)
				);
				$this->GP_Galahad = new GP_Galahad( $options );
			}
			return $this->GP_Galahad;
		}
		
		function get_vandelay_importer()
		{
			if ( empty($this->GP_Vandelay_Importer) ) {			
				// init Vandelay
				$importer_settings = array(
					'headers' => array(
						'Full Name',
						'Body',
						'First Name',
						'Last Name',
						'Title',
						'Phone',
						'Email',
						'Address',
						'Website',
						'Categories',
						'Photo'
					),
					'post_type' => 'staff-member',
					'history_page_url' => admin_url('admin.php?page=company-directory-import-export#tab-import-staff-history')
				);
				$this->GP_Vandelay_Importer = new GP_Vandelay_Importer( $importer_settings );
				add_filter( 'gp_vandelay_create_import_process', array($this, 'create_import_process') );
			}
			return $this->GP_Vandelay_Importer;
		}
		
		/*
		 * Replace Vandelay's background import process with our own, which 
		 * contains the required business logic to import new Staff Members.
		 *
		 * @param mixed $placeholder Always null.
		 *
		 * @return object Staff Directory background import process, which is 
		 * 				  based on Vandelay's base background process class.
		 */
		function create_import_process($placeholder)
		{
			return new Staff_Directory_Background_Import_Process();
		}

		function get_license_key()
		{
			$b_a_options = get_option( 'b_a_options' );
			return !empty($b_a_options) && !empty($b_a_options['api_key'])
				   ? $b_a_options['api_key']
				   : '';
		}

		function get_license_email()
		{
			$b_a_options = get_option( 'b_a_options' );
			return !empty($b_a_options) && !empty($b_a_options['api_key'])
				   ? $b_a_options['api_key']
				   : '';
		}
		
		function get_current_version()
		{
			if ( !function_exists('get_plugin_data') ) {
				include_once(ABSPATH . "wp-admin/includes/plugin.php");
			}
			$plugin_data = get_plugin_data( $this->_base_file );	
			$plugin_version = ( !empty($plugin_data['Version']) && $plugin_data['Version'] !== 'Version' )
							  ? $plugin_data['Version']
							  : '1.0';							
			return $plugin_version;
		}
		
		
	}