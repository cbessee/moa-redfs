<?php
	add_action('cmb2_meta_boxes','vorosa_meta_boxes');
	if( ! function_exists('vorosa_meta_boxes') ){
		function vorosa_meta_boxes(){
			$prefix = '_vorosa_';

			$select_page_sidebar = new_cmb2_box( array(
				'id'           		 => $prefix . 'sidebar_options',
				'title'        		 => esc_html__( 'Select Page Sidebar', 'vorosa' ),
				'object_types' 		 => array('page'),
				'context'      		 => 'side',
				'priority'     		 => 'core',
				'show_names'         => true,
			) );

			//left Sidebar 
			$select_page_sidebar->add_field( array(
				'name'               =>  esc_html__( 'Select Left Sidebar', 'vorosa' ),
				'id'                 => $prefix.'page_left_sidebar',
				'type'        		 => 'select',
				'default'     		 => 'default',
				'options'     		 => vorosa_get_sidebars(),
			) );

			//Right Sidebar 
			$select_page_sidebar->add_field( array(
				'name'               =>  esc_html__( 'Select Right Sidebar', 'vorosa' ),
				'id'                 => $prefix.'page_right_sidebar',
				'type'        		 => 'select',
				'default'     		 => 'default',
				'options'     		 => vorosa_get_sidebars(),
			) );			

			$posts = new_cmb2_box( array(
				'id'           		 => $prefix . '_vorosa_post_extra_optons',
				'title'        		 => esc_html__( 'Post Settings', 'vorosa' ),
				'object_types' 		 => array('post'),
				'context'      		 => 'normal',
				'priority'     		 => 'high',
				'show_names'         => true,
			) );

			$posts->add_field( array(
				'name'               =>  esc_html__( 'Select Page Layout', 'vorosa' ),
				'id'                 => $prefix.'post_layout',
				'type'        		 => 'select',
				'default'     		 => 'default',
				'options'     		 => array(
					''     	 		=> esc_html__( 'Select Layout', 'vorosa' ),
					'full'     	 	=> esc_html__( 'Full Width', 'vorosa' ),
					'left'       	=> esc_html__( 'Left Sidebar', 'vorosa' ),
					'right'       	=> esc_html__( 'Right Sidebar', 'vorosa' ),
				),

			) );

			//page breadcrump support
			$pages = new_cmb2_box( array(
				'id'           		 => $prefix . '_vorosa_page_optons',
				'title'        		 => esc_html__( 'Page Settings', 'vorosa' ),
				'object_types' 		 => array( 'page','post'),
				'context'      		 => 'normal',
				'priority'     		 => 'high',
				'show_names'         => true,
			) );

			//menu style
			$pages->add_field( array(
				'name'               =>  esc_html__( 'Select Menu Style', 'vorosa' ),
				'id'                 => $prefix.'page_menu_style',
				'type'        		 => 'select',
				'options'     		 => array(
					'none'     	 	=> esc_html__( 'Select Menu Style', 'vorosa' ),
					'1'       		=> esc_html__( 'Menu Style1', 'vorosa' ),
					'2'       		=> esc_html__( 'Menu Style2', 'vorosa' ),
					'3'       		=> esc_html__( 'One Page Menu', 'vorosa' ),
					'4'       		=> esc_html__( 'Menu Style4', 'vorosa' ),
					'5'       		=> esc_html__( 'Menu Style5', 'vorosa' ),
					'6'       		=> esc_html__( 'Header Default', 'vorosa' ),
				),

			) );

			//menu transparent
			$pages->add_field( array(
				'name'               =>  esc_html__( 'Select Menu Behabior', 'vorosa' ),
				'id'                 => $prefix.'page_menu_transparent',
				'type'        		 => 'select',
				'options'     		 => array(
					''     	 		=> esc_html__( '--- Select --- ', 'vorosa' ),
					'header-transparent'  => esc_html__( 'Menu Transparent', 'vorosa' ),
					'header-normal'  => esc_html__( 'Normal Menu', 'vorosa' ),
				),

			) );

			//Topbar
			$pages->add_field( array(
				'name'               =>  esc_html__( 'Topbar Enable', 'vorosa' ),
				'id'                 => $prefix.'page_topbar_status',
				'type'        		 => 'select',
				'options'     		 => array(
					'default'     	 => esc_html__( '--- Default ---', 'vorosa' ),
					'yes'  			 => esc_html__( 'On', 'vorosa' ),
					'no'  			 => esc_html__( 'Off', 'vorosa' ),
				),

			) );

			//breadcrumb 
			$pages->add_field( array(
				'name'               =>  esc_html__( 'Enable Breadcrumbs', 'vorosa' ),
				'id'                 => $prefix.'page_titlebar_enable',
				'type'        		 => 'select',
				'default'     		 => 'yes',
				'options'     		 => array(
					'yes'     		 => esc_html__( 'Yes', 'vorosa' ),
					'no'             => esc_html__( 'No', 'vorosa' ),
				),
			) );

			//breadcrumb color
			$pages->add_field( array(
				'name'               => esc_html__( 'Breadcrumb Background Color', 'vorosa' ),
				'id'          		 => $prefix .'banner_color',
				'desc'        		 => esc_html__( 'Breadcrumb Background Color', 'vorosa' ),
				'type'               => 'colorpicker',
			) );

			//breadcrumb image
			$pages->add_field( array(
				'name'               => esc_html__( 'Upload Breadcrumb Image', 'vorosa' ),
				'id'          		 => $prefix .'banner_img',
				'desc'        		 => esc_html__( 'upload image here', 'vorosa' ),
				'context'      		 => 'normal',
				'priority'    		 => 'high',
				'type'               => 'file',
			) );

			//page title color
			$pages->add_field( array(
				'name'               => esc_html__( 'BG Overlay Color', 'vorosa' ),
				'id'                 => $prefix .'page_title_bg_overlay_color',
				'desc'               => esc_html__( 'Breadcrumbs Overlay Color', 'vorosa' ),
				'type'               => 'colorpicker',
			) );

			//page title color
			$pages->add_field( array(
				'name'               => esc_html__( 'Overlay Opacity', 'vorosa' ),
				'id'                 => $prefix .'page_title_overlay_opacity',
				'desc'               => esc_html__( 'Breadcrumbs Overlay Opacity ( ex: .0 - 1)', 'vorosa' ),
				'type'               => 'text_small',
			) );

			$pages->add_field( array(
				'name'             => esc_html__( 'Breadcrumbs Text Position', 'vorosa' ),
				'id'               => $prefix .'breadcrumbs_position',
				'desc'             => esc_html__( 'Breadcrumbs text position', 'vorosa' ),
				'type'             => 'select',
				'options'          => array(
					'' 		   	   => esc_html__('Select position','vorosa'),
					'left' 		   => esc_html__('Position left','vorosa'),
					'center' 	   => esc_html__('Position center','vorosa'),
					'right'  	   => esc_html__('Position right','vorosa'),
				)
			) );

			//page title color
			$pages->add_field( array(
				'name'               => esc_html__( 'Page Title Color', 'vorosa' ),
				'id'                 => $prefix .'page_title_color',
				'desc'               => esc_html__( 'Breadcrumbs title color', 'vorosa' ),
				'type'               => 'colorpicker',
			) );

			//page title font size
			$pages->add_field( array(
				'name'               => esc_html__( 'Page Title Font Size', 'vorosa' ),
				'id'                 => $prefix .'page_title_font_sizes',
				'desc'               => esc_html__( 'Breadcrumbs title font size', 'vorosa' ),
				'type'               => 'text_small',
			) );

			//breadcrumb height
			$pages->add_field( array(
				'name'               => esc_html__( 'Breadcrumbs Top Padding', 'vorosa' ),
				'id'                 => $prefix .'breadcrumb_padding_top',
				'desc'               => esc_html__( 'inset padding ex-80', 'vorosa' ),
				'type'               => 'text_small',
			) );

			//breadcrumb height
			$pages->add_field( array(
				'name'               => esc_html__( 'Breadcrumbs Bottom Padding', 'vorosa' ),
				'id'                 => $prefix .'breadcrumb_padding_bottom',
				'desc'               => esc_html__( 'inset padding ex-80', 'vorosa' ),
				'type'               => 'text_small',
			) );

			//page padding
			$pages->add_field( array(
				'name'               => esc_html__( 'Page Padding', 'vorosa' ),
				'id'                 => $prefix .'page_padding',
				'desc'               => esc_html__( 'Page padding', 'vorosa' ),
				'type'               => 'text_small',
			) );

			//Events post	
			$event = new_cmb2_box( array(
				'id'           		 => $prefix . '_vorosa_event_optons',
				'title'        		 => esc_html__( 'Event Settings', 'vorosa' ),
				'object_types' 		 => array('event'),
				'context'      		 => 'normal',
				'priority'     		 => 'high',
				'show_names'         => true,
			) );

			$event->add_field( array(
				'name'               =>  esc_html__( 'Select Event Date', 'vorosa' ),
				'id'                 => $prefix.'event_date',
				'type'        		 => 'text_date',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Select Event Start Time', 'vorosa' ),
				'id'                 => $prefix.'event_time',
				'type'        		 => 'text_time',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Select Event End Time', 'vorosa' ),
				'id'                 => $prefix.'event_time_end',
				'type'        		 => 'text_time',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Select Location', 'vorosa' ),
				'id'                 => $prefix.'event_location',
				'type'        		 => 'text_medium',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Select Phone Number', 'vorosa' ),
				'id'                 => $prefix.'event_hone',
				'type'        		 => 'text_medium',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Website', 'vorosa' ),
				'id'                 => $prefix.'event_website',
				'type'        		 => 'text_medium',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Website Link', 'vorosa' ),
				'id'                 => $prefix.'event_website_link',
				'type'        		 => 'text_url',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Evant Location', 'vorosa' ),
				'desc'               => esc_html__( 'Input latitude longitude Here', 'vorosa' ),
				'id'                 => $prefix.'event_locations',
				'type'        		 => 'text_medium',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Organizer Phone', 'vorosa' ),
				'id'                 => $prefix.'event_organizer_phone',
				'type'        		 => 'text_medium',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Organizer Website', 'vorosa' ),
				'id'                 => $prefix.'event_organizer_website',
				'type'        		 => 'text_medium',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Organizer Website Link', 'vorosa' ),
				'id'                 => $prefix.'event_organizer_website_link',
				'type'        		 => 'text_url',
				)
			);

			$event->add_field( array(
				'name'               =>  esc_html__( 'Select Google Map API Key', 'vorosa' ),
				'desc'               => esc_html__( 'Input Google Map API Key Here', 'vorosa' ),
				'id'                 => $prefix.'event_map_api',
				'type'        		 => 'text_medium',
				)
			);

			//Causes post	
			$causes = new_cmb2_box( array(
				'id'           		 => $prefix . '_vorosa_causes_optons',
				'title'        		 => esc_html__( 'Causes Settings', 'vorosa' ),
				'object_types' 		 => array('causes'),
				'context'      		 => 'normal',
				'priority'     		 => 'high',
				'show_names'         => true,
			) );
			$causes->add_field( array(
				'name'             => esc_html__( 'Select Option', 'vorosa' ),
				'id'               => $prefix.'donate_option_select',
				'type'             => 'radio_inline',
				'options'          => array(
					'form'			=> esc_html__( 'Use donate form', 'vorosa' ),
					'link'			=> esc_html__( 'Use custom link', 'vorosa' ),
				),
				'default'          => 'form'
			) );
			$causes->add_field( array(
				'name'               =>  esc_html__( 'Form Shortcode', 'vorosa' ),
				'id'                 => $prefix.'causes_form_shortcode',
				'type'        		 => 'text',
				'attributes' => array(
			     	'data-conditional-id'    => $prefix.'donate_option_select',
			     	'data-conditional-value' => 'form',
			    	),
				)
			);
			$causes->add_field( array(
				'name'               =>  esc_html__( 'Additional text', 'vorosa' ),
				'id'                 => $prefix.'causes_form_additional_text',
				'type'        		 => 'text',
				'default'			 => 'Some text',
				'attributes' => array(
			     	'data-conditional-id'    => $prefix.'donate_option_select',
			     	'data-conditional-value' => 'link',
			    	),				
				)
			);			
			$causes->add_field( array(
				'name'               =>  esc_html__( 'Form Link', 'vorosa' ),
				'id'                 => $prefix.'causes_form_link',
				'type'        		 => 'text',
				'attributes' => array(
			     	'data-conditional-id'    => $prefix.'donate_option_select',
			     	'data-conditional-value' => 'link',
			    	),
				)
			);
			$causes->add_field( array(
				'name'               =>  esc_html__( 'Button Text', 'vorosa' ),
				'id'                 => $prefix.'causes_form_button_text',
				'type'        		 => 'text',
				'type'        		 => 'text',
				'default'			 => 'Donate Now'
				)
			);

	}
}