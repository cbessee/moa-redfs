jQuery(function () {
	var remove_error_box = function (f) {
		f.find('.cd_ldap_error').remove();
	};
	var show_error_box = function (f) {
		remove_error_box(f);
		f.find('fieldset:first').prepend('<p class="cd_ldap_error" style="margin:0 0 20px;color:maroon;border:1px solid maroon;border-radius:4px;background:white;padding:10px;max-width:600px;">Error connecting to your LDAP server. Please check your settings and try again.</p>');		
	};
	
	var ldap_next_step = function(current_tab) {
		var all_tabs = current_tab.parents('#ldap_import_tabs:first').find('.ldap_import_step');
		var my_tab_index = all_tabs.index(current_tab);
			
		if (my_tab_index < all_tabs.length) {
			// hide current tab
			current_tab.css('display', 'none');
			
			// show next tab
			var next_tab = jQuery(all_tabs.get(my_tab_index + 1));
			next_tab.css('display', 'block');
		} else {
			alert('complete');		
		}
	};

	
	/*
	// setup LDAP tabsj
	var ldap_tabs = jQuery("#ldap_import_tabs");
	var all_tabs = ldap_tabs.find('.ldap_import_step');
	ldap_tabs.find('.ldap_import_step:gt(0)').css('display', 'none');
	ldap_tabs.find('.ldap_import_step button').on('click', function (ev) {
		// goto next step
		var my_tab_index = all_tabs.index(jQuery(this).parents('.ldap_import_step:first'));
		if (my_tab_index < all_tabs.length) {
			alert('next step');
		} else {
			alert('complete');		
		}
		return false;
	});
	*/
	
	
	var ldap_tabs = jQuery("#ldap_import_tabs");
	var all_tabs = ldap_tabs.find('.ldap_import_step');
	ldap_tabs.find('.ldap_import_step:gt(0)').css('display', 'none');
	
	
/*
	var ldap_tabs = jQuery("#ldap_import_tabs");
	var all_tabs = ldap_tabs.find('.ldap_import_step');
	ldap_tabs.find('.ldap_import_step:gt(0)').css('display', 'none');
	ldap_tabs.find('.ldap_import_step button').on('click', function (ev) {
		// goto next step
		ldap_next_step( jQuery(this).parents('.ldap_import_step:first') );
		return false;
	});
*/	
		
	jQuery('#ldap_test_connection_info').on('click', function () {
		var f = jQuery(this).parents('.ldap_import_step:first');
		var b = jQuery(this);
		
		if ( b.data('working') == true ) {
			return false;
		}
		
		var original_html = b.html();
		b.html('Testing connection..');
		b.data('working', true);
		
		connection_info = {
			'ldap_host': f.find('input[name="ldap_host"]').val(),
			'ldap_port': f.find('input[name="ldap_port"]').val(),
			'ldap_bind_dn': f.find('input[name="ldap_bind_dn"]').val(),
			'ldap_bind_pass': f.find('input[name="ldap_bind_pass"]').val()		
		};
		jQuery.post(
			ajaxurl, 
			{
				'action': 'cd_test_ldap_connection_info',
				'data':   connection_info
			}, 
			function(response) {
				if ( response == 1 ) {
					remove_error_box(f);
					b.html('Success!');
					setTimeout(function () {
						b.data('working', false);
						b.html(original_html);
					}, 1000);
					
					// continue to step 2, field mapping
					ldap_next_step( b.parents('.ldap_import_step:first') );
			} else {
					show_error_box(f);
					b.data('working', false);					
					b.html(original_html);
				}
			}
		);
		return false;
		
	});
	
	jQuery('#ldap_run_import').on('click', function () {
		var f = jQuery(this).parents('form:first');
		var b = jQuery(this);
		
		if ( b.data('working') == true ) {
			return false;
		}
		
		var original_html = b.html();
		b.html('Starting Import...');
		b.data('working', true);
		
		connection_info = {
			'ldap_host': f.find('input[name="ldap_host"]').val(),
			'ldap_port': f.find('input[name="ldap_port"]').val(),
			'ldap_bind_dn': f.find('input[name="ldap_bind_dn"]').val(),
			'ldap_bind_pass': f.find('input[name="ldap_bind_pass"]').val(),
			'ldap_overwrite_existing_records': f.find('input[name="ldap_overwrite_existing_records"]').is(':checked') ? 1 : 0
		};
		jQuery.post(
			ajaxurl, 
			{
				'action': 'cd_run_ldap_import',
				'data':   connection_info
			}, 
			function(response) {
				if ( response.batch_id ) {
					remove_error_box(f);
					b.html('Success!');
					b.data('working', false);					
					
					// continue to step 3, success message
					ldap_next_step( b.parents('.ldap_import_step:first') );
				}
			},
			'json'
			
			
		);
		return false;
		
	});
});