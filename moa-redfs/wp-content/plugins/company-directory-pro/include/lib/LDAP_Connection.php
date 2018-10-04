<?php
	class LDAP_Connection
	{
		
		var $credentials = false;
		
		function __construct($credentials)
		{
			// test credentials: http://www.zflexsoftware.com/index.php/pages/free-online-ldap
			$this->set_credentials($credentials);
		}
		
		function get_credentials($credentials)
		{
			return $this->credentials;
		}
		
		function set_credentials($credentials)
		{
			$this->credentials = $credentials;
		}

		/*
		 * function test_ldap_credentials
		 *
		 * Tests the given LDAP credentials.
		 *
		 * @param array $credentials Active Directory credentials 
		 * @return bool True if connection was successful, 
		 *				false if not.
		 */
		function test_credentials()
		{
			// Connecting to LDAP
			$ds = ldap_connect($this->credentials['host'], $this->credentials['port']);
			if ($ds) {
				ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);	
				$bind_result = ldap_bind($ds, $this->credentials['bind_dn'], $this->credentials['bind_pass']);
				ldap_close($ds);
				return $bind_result ? true : false;
			}			
			return false;
		}				


		/*
		 * function list_users
		 *
		 * Lists all users and their associated metadata
		 * on the server specified by $credentials
		 *
		 * @return array List of users and their metadata 
		 */
		function list_users()
		{
			// connect to active directory server
			// Connecting to LDAP
			$ds = ldap_connect($this->credentials['host'], $this->credentials['port']);
			if ($ds) { 
				ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);	
				$bind_result = ldap_bind($ds, $this->credentials['bind_dn'], $this->credentials['bind_pass']);
			}		
			
			if (!$bind_result) {
				return array();
			}
			
			// get list of users and all associated data (first name, last name, email, address, etc - get all available fields)
			$search_filter = '(sn=*)';
			$result = ldap_search($ds, $ldap_base_dn, $search_filter);
			$users = array(); 
			if (FALSE !== $result) {
				$entries = ldap_get_entries($ds, $result);
				$users = $this->convert_entries_to_array($entries);
			}
			
			// close ldap connection
			ldap_close($ds);
			
			return $users;
		}	
		
		function convert_entries_to_array($entries)
		{
			$users = array();
			
			for ($x=0; $x < $entries['count']; $x++) {
				
				$me = array();
				foreach($entries[$x] as $index => $val) {
					
					if ( is_int($index) ) {
						continue;
					}

					if ( in_array($index, ['count', 'dn', 'objectclass'] ) ) {
						continue;
					}
					
					
					$key = $index;
					$val = $val[0];
					$me[$key] = $val;
				}
				$users[] = $me;
				continue;
			}
			
			return $users;
		}
		
	}
	