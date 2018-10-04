<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "vorosa_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,

        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),

        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),

        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',

        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,

        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'vorosa' ),
        'page_title'           => esc_html__( 'Theme Options', 'vorosa' ),

        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',

        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,

        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,

        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,

        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',

        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,

        // Choose an priority for the admin bar menu
        'global_variable'      => '',

        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,

        // Show the time the page took to load, etc
        'update_notice'        => true,

        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,

        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',

        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',

        // Permissions needed to access the options panel.
        'menu_icon'            => '',

        // Specify a custom URL to an icon
        'last_tab'             => '',

        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',

        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',

        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,

        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,

        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',

        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,

        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,

        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true, 

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',

        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,

        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                 => array(
            'icon'              => 'el el-question-sign',
            'icon_position'     => 'right',
            'icon_color'        => 'lightgray',
            'icon_size'         => 'normal',
            'tip_style'         => array(
                'color'     => 'red',
                'shadow'    => true,
                'rounded'   => false,
                'style'     => '',
            ),

            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),

            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),

                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );



    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation', 'vorosa' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'vorosa' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions', 'vorosa' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );

    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );

    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Find us on Behance',
        'icon'  => 'el el-behance'
    );

    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Find us on Dribbble',
        'icon'  => 'el el-dribbble'

    );

    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Find us on Instagram',
        'icon'  => 'el el-instagram'
    );

    Redux::setArgs( $opt_name, $args );
    /*
     * ---> END ARGUMENTS
     */
    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'vorosa' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'vorosa' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'vorosa' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'vorosa' )
        )
    );

    Redux::setHelpTab( $opt_name, $tabs );
    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'vorosa' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */
    // -> START Basic Fields
    //layout
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Layout', 'vorosa' ),
        'id'               => 'vorosa_layout',
        'customizer_width' => '400px',
        'icon'             => 'el el-website',
        'fields'           => array(
                array(
                    'id'                    => 'vorosa_layout_width',
                    'type'                  => 'button_set',
                    'title'                 => esc_html__('Theme Layout', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the site layout.', 'vorosa'),
                    'options'               => array(
                        'wide-layout'       => esc_html__('Full Width',  'vorosa'),
                        'boxed-layout'      => esc_html__('Boxed', 'vorosa'), 
                     ), 
                    'default'               => 'wide-layout'
                ),

                array(
                    'id'                    => 'vorosa_layout_page',
                    'type'                  => 'text',
                    'required'              => array('vorosa_layout_width','equals','wide-layout'),
                    'title'                 => esc_html__('Site Width', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the overall site width. Enter value excluding any valid CSS unit, ex: 1170', 'vorosa'),
                ),

                array(
                    'id'                    => 'vorosa_boxlayout_box_width',
                    'type'                  => 'text',
                    'required'              => array('vorosa_layout_width','equals','boxed-layout'),
                    'title'                 => esc_html__('Site Width For Box Layout', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the overall site width. Enter value excluding any valid CSS unit, ex: 1170', 'vorosa'),
                ),

                array(
                    'id'                    => 'vorosa_boxlayout_body_bg',
                    'type'                  => 'background',
                    'required'              => array( 'vorosa_layout_width','equals','boxed-layout'),
                    'output'                => array('body.boxed-layout-active'),
                    'title'                 => esc_html__('Box Layout Background', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the background color when the site is in box layout.', 'vorosa'),
                    'default'               => array(
                    )
                ),

                array(
                    'id'                    => 'vorosa_page_layout_padding',
                    'type'                  => 'spacing',
                    'output'                => array('.page-area'),
                    'title'                 => esc_html__('Page Content Padding', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the top /bottom padding for page content. Enter values including any valid CSS unit, ex: 80px,80px.', 'vorosa'),
                    'mode'                  => 'padding',
                    'units'                 => array('em','px'),
                    'units_extended'        => 'false',
                    'left'                  => 'false',
                    'right'                 => 'false'
                ),

                array(
                    'id'                    => 'vorosa_body_background_color',
                    'type'                  => 'background',
                    'output'                => array('body, .site-wrapper.boxed-layout'),
                    'title'                 => esc_html__('Body Background Color.', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the  background color of the body which is everything below header and above footer.', 'vorosa'),
                ),
            )
        ) 
    );

  //Header top bar
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header', 'vorosa' ),
        'id'         => 'header_id',
        'icon'       =>'el el-arrow-up',
        'fields'     => array(
                array(
                    'id'                    => 'vorosa_header_bg',
                    'type'                  => 'background',
                    'background-attachment' => false,
                    'background-repeat'     => false,
                    'background-size'       => false,
                    'background-position'   => false,
                    'background-image'      => false,
                    'output'                => array('.header-area'),
                    'title'                 => esc_html__('Header Background color', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the header background color( default #ffffff ).', 'vorosa'),
                    'default'               => array(
                    )
                ),

                array(
                    'id'                    => 'vorosa_header_layout',
                    'title'                 => esc_html__('Select Header Layout', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the header layout.', 'vorosa'),
                    'type'                  => 'image_select',
                    'options'               => array(
                        '1'                 => array(
                            'title'         => esc_html__('Header Layout One', 'vorosa'),
                            'img'           => get_template_directory_uri().'/images/optionframework/style1.jpg',
                        ),
                        '2'                 => array(
                            'title'         => esc_html__('Header Layout Two', 'vorosa'),
                            'img'           => get_template_directory_uri(). '/images/optionframework/style2.jpg',
                        ),
                        '3'                 => array(
                            'title'         => esc_html__('Header One Page', 'vorosa'),
                            'img'           => get_template_directory_uri(). '/images/optionframework/style_one_page.jpg',
                        ),
                        '4'                 => array(
                            'title'         => esc_html__('Header Four', 'vorosa'),
                            'img'           => get_template_directory_uri(). '/images/optionframework/style4.png',
                        ),
                        '5'                 => array(
                            'title'         => esc_html__('Header Five', 'vorosa'),
                            'img'           => get_template_directory_uri(). '/images/optionframework/style5.jpg',
                        ),
                        '6'                 => array(
                            'title'         => esc_html__('Header Default ', 'vorosa'),
                            'img'           => get_template_directory_uri(). '/images/optionframework/style-default.jpg',
                        ),
                    ),
                    'default'               => '6'
                ),

                array(
                    'id'                    => 'vorosa_logo_position',
                    'type'                  => 'button_set',
                    'required'              => array('vorosa_header_layout','equals',array('1','3')),
                    'title'                 => esc_html__('Logo Position','vorosa'),
                    'subtitle'              => esc_html__('Controls the position of the logo.','vorosa'),
                    'options'               => array(
                        'left'              => esc_html__('Left','vorosa'),
                        'center'            => esc_html__('Center','vorosa'),
                        'right'             => esc_html__('Right','vorosa'),
                        'left-top'          => esc_html__('Left Top','vorosa'),
                        'center-top'        => esc_html__('Center Top','vorosa'),
                        'right-top'         => esc_html__('Right Top','vorosa'),
                    ), 
                    'default'               => 'left'
                ),

                array(
                    'id'                    => 'vorosa_donate_link5',
                    'type'                  => 'text',
                    'required'              => array('vorosa_header_layout','equals',array('5')),
                    'title'                 => esc_html__('Donate Button Link','vorosa'),
                    'subtitle'              => esc_html__('Input Donate Button Link.','vorosa'),
                    'default'               => 'DONATE'
                ),

                array(
                    'id'                    => 'vorosa_header_full_width',
                    'type'                  => 'switch',
                    'title'                 => esc_html__( 'Full Width Header', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Controls the width of the header area. ', 'vorosa' ),
                    'default'               => false,
                ),

                array(
                    'id'                    => 'vorosa_header_sticky',
                    'type'                  => 'switch',
                    'title'                 => esc_html__( 'Sticky Header', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Turn on to activate the sticky header.', 'vorosa' ),
                    'default'               => true,
                ),

                array(
                    'id'                    => 'vorosa_header_transparent',
                    'type'                  => 'switch',
                    'title'                 => esc_html__( 'Transparent Header', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Turn on to make the header area transparent.', 'vorosa' ),
                    'default'               => true,
                ),
            )
        ) 
    );

  //Header top bar left

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Top Bar left', 'vorosa' ),
        'id'         => 'vorosa_header_left',
        'icon'       =>'el el-arrow-right',
        'subsection' => true,
        'fields'     => array(
                array(
                    'id'                    => 'vorosa_left_content_section',
                    'type'                  => 'button_set',
                    'title'                 => esc_html__( 'Top Bar Left Content', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Controls the content that displays in the top left section.', 'vorosa' ),
                    'options'               => array(
                        '1'                 => esc_html__('Social Icon','vorosa'),
                        '2'                 => esc_html__('Left Menu','vorosa'),      
                        '3'                 => esc_html__('Contact Info','vorosa'),
                        '4'                 => esc_html__('Content','vorosa'),
                        '5'                 => esc_html__('Leave Empty','vorosa'),
                    ),
                    'default'               => '3'
                ),

                array(
                    'id'                    => 'vorosa_left_contact_info',
                    'type'                  => 'text',
                    'required'              => array('vorosa_left_content_section','equals','3'),
                    'title'                 => esc_html__( 'Header Contact Number', 'vorosa' ),
                    'subtitle'              => esc_html__( 'This content will display header contact number on top left bar', 'vorosa' ),
                    'default'               => '0123456789',
                ),

                array(
                    'id'                    => 'vorosa_left_contact_email',
                    'type'                  => 'text',
                    'required'              => array('vorosa_left_content_section','equals','3'),
                    'title'                 => esc_html__( 'Header Contact Email Address', 'vorosa' ),
                    'subtitle'              => esc_html__( 'This content will display header contact email address on top left bar', 'vorosa' ),
                    'default'               => 'mail@example.com',
                ),

                array(
                    'id'                    => 'vorosa_left_text_area',
                    'type'                  => 'editor',
                    'required'              => array('vorosa_left_content_section','equals','4'),
                    'title'                 => esc_html__( 'Header Default Text', 'vorosa' ),
                    'subtitle'              => esc_html__( 'This content will display the default text on top left bar', 'vorosa' ),
                    'args'                  => array(
                        'teeny'             => true,
                        'textarea_rows'     => 2
                    ),
                ),
            )
        ) 
    );

  //Header top bar right
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Top Right Bar', 'vorosa' ),
        'id'         => 'vorosa_header_right',
        'icon'       =>'el el-arrow-right',
        'subsection'=> true,
        'fields'     => array(
                array(
                    'id'                    => 'vorosa_right_contactinfo',
                    'type'                  => 'button_set',
                    'title'                 => esc_html__( 'Top Bar Right Content', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Controls the content that displays in the top left section.', 'vorosa' ),
                    'options'               => array(
                        '1'                 => esc_html__('Social Icon','vorosa'),                        
                        '2'                 => esc_html__('Right Menu','vorosa'),                        
                        '3'                 => esc_html__('Contact Info','vorosa'),                        
                        '4'                 => esc_html__('Content','vorosa'),                        
                        '5'                 => esc_html__('Leave Empty','vorosa'),                        
                    ),
                    'default'               => '1'
                ),

                array(
                    'id'                    => 'vorosa_right_contact_info',
                    'type'                  => 'text',
                    'required'              => array('vorosa_right_contactinfo','equals','3'),
                    'title'                 => esc_html__( 'Header Contact Number', 'vorosa' ),
                    'subtitle'              => esc_html__( 'This content will display header contact number on top right bar.', 'vorosa' ),
                    'default'               => '0123456789',
                ),

                array(
                    'id'                    => 'vorosa_right_contact_email',
                    'type'                  => 'text',
                    'required'              => array('vorosa_right_contactinfo','equals','3'),
                    'title'                 => esc_html__( 'Email Address For Contact Info', 'vorosa' ),
                    'subtitle'              => esc_html__( 'This content will display if you have "Contact Info" email.', 'vorosa' ),
                    'default'               => 'mail@example.com',
                ),

                array(
                    'id'                    => 'vorosa_right_text_area',
                    'type'                  => 'editor',
                    'required'              => array('vorosa_right_contactinfo','equals','4'),
                    'title'                 => esc_html__( 'Header Default Text', 'vorosa' ),
                    'subtitle'              => esc_html__( 'This content will display the default text on top right bar', 'vorosa' ),
                    'args'                  => array(
                        'teeny'             => true,
                        'textarea_rows'     => 2
                    )
                ),
            )
        ) 
    );

    //Header top bar right
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Topbar Customize', 'vorosa' ),
        'id'         => 'vorosa_header_topbar_customize',
        'icon'       =>'el el-arrow-right',
        'subsection'=> true,
        'fields'     => array(
                array(
                    'id'                    => 'vorosa_header_show',
                    'type'                  => 'switch',
                    'title'                 => esc_html__( 'Top Bar', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Turn on if you want to show the top bar area.', 'vorosa' ),
                    'default'               => true,
                ),

                array(
                    'id'                    => 'vorosa_header_top_width',
                    'type'                  => 'switch',
                    'title'                 => esc_html__( 'Full Width Top Bar', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Turn on if you want the top bar to be of full width.', 'vorosa' ),
                    'default'               => false,
                ),

                array(
                    'id'                    => 'vorosa_header_topbg',
                    'type'                  => 'background',
                    'background-attachment' => false,
                    'background-repeat'     => false,
                    'background-size'       => false,
                    'background-position'   => false,
                    'background-image'      => false,
                    'output'                => array('.header-top-area'),
                    'title'                 => esc_html__('Top Bar Background Color', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the background color of the header top bar area( default #1E2127 ).', 'vorosa'),
                    'default'               => array(
                    )
                ),

                 array(
                    'id'                    => 'vorosa_top_text_colors',
                    'type'                  => 'color',
                    'output'                => array('.top-bar-left-content,.header-info' ),
                    'title'                 => esc_html__('Top Bar Text Color', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the color of the top bar text.', 'vorosa'),
                    'transparent'           => false,
                ),

                array(
                    'id'                    => 'vorosa_top_link_colors',
                    'type'                  => 'color',
                    'output'                => array('.header-info span a, .header-social ul li a, .top-bar-left-content p a, .top-bar-left-menu ul li a, .header-social ul li a' ),
                    'title'                 => esc_html__('Top Bar Link Color ', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the link color of the top bar.', 'vorosa'),
                    'transparent'           => false,
                ),

                array(
                    'id'                    => 'vorosa_top_link_colors_hover',
                    'type'                  => 'color',
                    'output'                => array('.header-info span a:hover, .header-social ul li a:hover, .top-bar-left-content p a:hover'),

                    'title'                 => esc_html__('Top Bar Link Hover Color', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the link hover color of the top bar.', 'vorosa'),
                    'transparent'           => false,
                ),

                array(
                    'id'                    => 'vorosa_top_bar_padding',
                    'type'                  => 'spacing',
                    'mode'                  => 'padding',
                    'title'                 => esc_html__('Top Bar padding ', 'vorosa'),
                    'subtitle'              => esc_html__('Controls header Top Bar padding.', 'vorosa'),
                    'right'                 => false,
                    'left'                  => false,
                    'output'                => array('.header-top-area'),
                    'units'                 => array('em','px'),
                    'default'               => array(
                        'padding-top'       => 'px',
                        'padding-right'     => 'px',
                        'padding-bottom'    => 'px',
                        'padding-left'      => 'px',
                        'units'             => 'px',
                    ),
                ),
            )
        ) 
    );

    //Main menu

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu', 'vorosa' ),
        'id'               => 'vorosa-header-contact-top',
        'icon'             => 'el el-lines',
        'customizer_width' => '500px',
        'fields'           => array(
            )
        ) 
    );

    //Menu tryphograpy

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Typography', 'vorosa' ),
        'id'               => 'vorosa_menu_typography',
        'icon'             => 'el el-arrow-right',
        'subsection'       => 'true',
        'customizer_width' => '500px',
        'fields'           => array(
                array(
                    'id'                    => 'vorosa_menufont',
                    'type'                  => 'typography',
                    'title'                 => esc_html__('Menu Font Settings', 'vorosa'),
                    'google'                => true,     
                    'subsets'               => false,
                    'line-height'           => false,
                    'text-transform'        => true,
                    'text-align'            => false,
                    'all_styles'            => true,    
                    'output'                => array('.main-menu > nav > ul > li > a'), 
                    'units'                 => 'px',
                    'subtitle'              => esc_html__('Controls the font settings of the menu text', 'vorosa'),
                    'default'               => array(
                        'google'            => true,
                    )
                ),

                array(
                    'id'                    => 'vorosa_menu_hover_colors',
                    'type'                  => 'color',
                    'output'                => array('.main-menu > nav > ul > li:hover > a:hover' ),
                    'title'                 => esc_html__('Menu Hover Color', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the menu hover color of the menu text(default: #333).', 'vorosa'),
                    'transparent'           => false,
                    'validate'              => 'color',
                ),
             
                array(
                    'id' => 'vorosa_main_menu_padding',
                    'type' => 'spacing',
                    'title' => esc_html__('Main Menu Padding', 'vorosa') ,
                    'subtitle' => esc_html__('Controls the top and bottom padding of the main menu', 'vorosa') ,
                    'output' => array('.main-menu > nav > ul > li') ,
                    'mode' => 'padding',
                    'right' => false,
                    'left' => false,
                    'units_extended' => 'false',
                    'units' => array(
                        'em',
                        'px'
                    ) ,
                    'default' => array(
                        'padding-top' => 'px',
                        'padding-right' => 'px',
                        'padding-bottom' => 'px',
                        'padding-left' => 'px',
                        'units' => 'px',
                    )
                ) ,

                array(
                    'id'                    => 'vorosa_menu_item_spacing',
                    'type'                  => 'text',
                    'title'                 => esc_html__( 'Main Menu Item Spacing', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Controls the menu item spacing of the main menu', 'vorosa' ),    
                ),
            )
        ) 
    );

    //Menu tryphograpy

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Dropdown menu', 'vorosa' ),
        'id'               => 'vorosa_menu_dropdown',
        'icon'             => 'el el-arrow-right',
        'subsection'       => 'true',
        'customizer_width' => '500px',
        'fields'           => array( 
             array(
                    'id'                    => 'vorosa_submenufont',
                    'type'                  => 'typography',
                    'title'                 => esc_html__('Submenu Font Settings', 'vorosa'),
                    'google'                => true,       
                    'subsets'               => false,
                    'line-height'           => false,
                    'transition'            => false,
                    'text-align'            => false,
                    'all_styles'            => true,    
                    'text-transform'        => true,    
                    'output'                => array('.main-menu .sub-menu > li > a'), 
                    'units'                 => 'px',
                    'subtitle'              => esc_html__('Controls the font settings of the submenu text', 'vorosa'),
                    'default'               => array(
                        'google'            => true,
                    )
                ),

                array(
                    'id'                    => 'vorosa_submenu_hover_colors',
                    'type'                  => 'color',
                    'output'                => array('.main-menu .sub-menu > li:hover > a' ),
                    'title'                 => esc_html__('Submenu Hover Color', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the submenu hover color(default: #333).', 'vorosa'),
                    'transparent'           => false,
                    'validate'              => 'color',
                ),

                array(
                    'id'                    => 'vorosa_submenu_background_color',
                    'type'                  => 'color',
                    'title'                 => esc_html__('Submenu Background', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the background color of the submenu', 'vorosa'),
                ),

                 array(
                    'id'                    => 'vorosa_bropdown_bg_hover',
                    'type'                  => 'background',
                    'background-attachment' => false,
                    'background-repeat'     => false,
                    'background-size'       => false,
                    'background-position'   => false,
                    'background-image'      => false,
                    'output'                => array('.main-menu .sub-menu > li:hover > a'),
                    'title'                 => esc_html__('Submenu Hover Background.', 'vorosa'),
                    'subtitle'              => esc_html__('Controls the hover background color of the submenu( default #333 ).', 'vorosa'),
                ),



                 array(
                    'id'                    => 'vorosa_menu_dropdowshowh_color',
                    'output'                => array('.main-menu ul.sub-menu li + li'),
                    'type'                 => 'border',
                    'title'             => esc_html__('Submenu Separator Color', 'vorosa'),
                    'subtitle'          => esc_html__('Controls the separator color of the submenu', 'vorosa'),
                    'right'             => false,
                    'bottom'            => false,
                    'left'              => false,
                ),

                 array(
                    'id'                    => 'vorosa_menu_dropdownwidth',
                    'type'                  => 'text',
                    'title'                 => esc_html__( 'Submenu Width', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Controls the submenu width', 'vorosa' ),
                ),

                  array(
                    'id'                    => 'vorosa_dropdown_item_padding',
                    'type'                  => 'text',
                    'title'                 => esc_html__( 'Submenu Item Height', 'vorosa' ),
                    'subtitle'              => esc_html__( 'Controls the height of the submenu item', 'vorosa' ),
                ),
            )
        ) 
    );

    //Sticky Header Menu

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__( 'Sticky Menu', 'vorosa' ),
        'id'               => 'vorosa_sticky_menu_typography',

        'icon'             => 'el el-arrow-right',

        'subsection'       => 'true',

        'customizer_width' => '500px',

        'fields'           => array(

             array(

                    'id'                    => 'vorosa_menu_link_colors',

                    'type'                  => 'color',

                    'output'                => array('.header-area.header-sticky.sticky nav ul > li > a, .header-area.header-sticky.sticky nav ul li.menu-item-has-children::before' ),

                    'title'                 => esc_html__( 'Sticky Header Menu Text Color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the header menu text color when the header is sticky', 'vorosa' ),

                    'transparent'           => false,

                ),

                array(

                    'id'                    => 'vorosa_header_sticky_bg',

                    'type'                  => 'background',

                    'background-attachment' => false,

                    'background-repeat'     => false,

                    'background-size'       => false,

                    'background-position'   => false,

                    'background-image'      => false,

                    'output'                => array('.header-area.header-sticky.sticky'),

                    'title'                 => esc_html__( 'Sticky Header Background color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the header background color when the header is sticky( default ).', 'vorosa' ),

                ),

                array(

                    'id'                    => 'vorosa_menu_sticky_font',

                    'type'                  => 'color',

                    'output'                => array('.header-sticky.sticky .site-title a' ),

                    'title'                 => esc_html__( 'Sticky Header Logo Text Color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the sticky header logo text color when the header is sticky', 'vorosa' ),

                    'transparent'           => false,

                ),

            )

        ) 

    );

    //Mobile Menu Visibility

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__( 'Mobile Menu', 'vorosa' ),

        'id'               => 'vorosa_Mobile_menu',

        'icon'             => 'el el-arrow-right',

        'subsection'       => 'true',

        'customizer_width' => '500px',

        'fields'           => array(

                array(

                    'id'                    => 'vorosa_mobile_menu_width',

                    'type'                  => 'text',

                    'title'                 => esc_html__( 'Display Mobile Menu at', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls in which screen size the mobile menu will be displayed( ex. 769px )', 'vorosa' ),

                ),

            )

        ) 

    );


    //logo

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__( 'Logo', 'vorosa' ),

        'id'               => 'vorosa_logo',

        'customizer_width' => '400px',

        'icon'             => 'el el-plus-sign',

        'fields'           => array(

                array(

                    'id'                    => 'vorosa_main_logo',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Enable / Disable Logo','vorosa'),

                    'desc'                  => esc_html__('By enabling the logo you will be able to set a logo in the header and by disabling the logo you will be able to set site title in the header.','vorosa'),

                    'options'               => array(

                        '1'                 => 'Enable',

                        '2'                 => 'Disable',

                    ),

                    'default'               => '1'

                ),

                array(

                    'id'                    => 'vorosa_head_logo',

                    'type'                  => 'media',

                    'required'              => array('vorosa_main_logo','equals','1'),

                    'title'                 => esc_html__('Logo','vorosa'),

                    'desc'                  => esc_html__('Upload your logo here','vorosa'),

                    'default'               => array(

                        'url'               => get_template_directory_uri().'/images/logo.png'

                    ),

                ),

                array(

                    'id'                    => 'vorosa_logo_text',

                    'type'                  => 'text',

                    'required'              => array('vorosa_main_logo','equals','2'),

                    'title'                 => esc_html__('Site Title','vorosa'),

                    'desc'                  => esc_html__('Enter your site title here','vorosa'),

                    'default'               => get_bloginfo('name')

                ),

                array(

                    'id'                    => 'vorosa_logo_text_font',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Site Title Font Settings', 'vorosa'),

                    'required'              => array('vorosa_main_logo','equals','2'),

                    'google'                => true,     

                    'subsets'               => false,

                    'line-height'           => false,

                    'text-transform'        => true,

                    'transition'            => false,

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.site-title a'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the font settings of the site title', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

            )

        ) 

    );


    //Page Title Bar

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__( 'Page Title', 'vorosa' ),

        'id'               => 'vorosa_breadcrumbs',

        'customizer_width' => '400px',

        'icon'             => 'el el-adjust-alt',

        'fields'           => array(

                array(

                    'id'                    => 'vorosa_page_title_bar',

                    'title'                 => esc_html__('Show Page Title Area','vorosa'),

                    'subtitle'              => esc_html__('Show or Hide the page title area from here','vorosa'),

                    'type'                  => 'button_set',

                    'options'               => array(

                        '1'                 => esc_html__('Show','vorosa'),

                        '2'                 => esc_html__('Hide','vorosa'),

                    ),

                    'default'               => '1',

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_area',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Show Page Title', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Show or Hide the page title from here', 'vorosa' ),

                    'default'               => true,

                ),

                array(

                    'id'                    => 'vorosa_page_title_colors',

                    'type'                  => 'typography',

                   'title'                  => esc_html__('Page Title Font Settings', 'vorosa'),

                    'google'                => true,     

                    'subsets'               => false,

                    'line-height'           => false,

                    'text-transform'        => true,

                    'transition'            => false,

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.breadcrumbs h2.page-title'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the font settings of page title', 'vorosa'),

                    'default'               => array(

                        'google'            => true,
                        'font-family'       => 'Roboto Slab',
                        'font-weight'       => '700',
                        'text-transform'    => 'capitalize',
                        'font-size'         => '40px',
                        'color'             => '#ffffff'

                    )

                ), 

                array(

                    'id'                    => 'vorosa_breadcrumbs_text',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Page Title Text Alignment','vorosa'),

                    'subtitle'              => esc_html__('Controls the text alignment settings of the page title','vorosa'),

                    'options'               => array(

                        'left'              => esc_html__('left','vorosa'),

                        'center'            => esc_html__('center','vorosa'),

                        'right'             => esc_html__('right','vorosa'),

                    ), 

                    'default'               => 'center'

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_full',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Full Width Page Title', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Turn on to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'vorosa' ),

                    'default'               => false,

                ),

                array(

                    'id'                    => 'vorosa_breadcrumb_lg_height',

                    'type'                  => 'spacing',

                    'title'                 => esc_html__( 'Page Title Area Padding', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the height of the page title area. Enter value excluding any valid CSS unit, ex: 100', 'vorosa' ),

                    'mode'                  => 'padding',

                    'left'                  => false,

                    'right'                 => false,

                    'units_extended'        => 'false',
					
                    'units'                 => array('em','px'),

                    'default'               => array(

                        'padding-top'       => '208px',

                        'padding-right'     => 'px',

                        'padding-bottom'    => '120px',

                        'padding-left'      => 'px',

                        'units'             => 'px',

                        )

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_mobile_height',

                    'type'                  => 'spacing',

                    'title'                 => esc_html__( 'Page Title Area Padding on Mobile', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the height of the page title area on mobile device. Enter value excluding any valid CSS unit, ex: 80', 'vorosa' ),

                    'mode'                  => 'padding',

                    'left'                  => false,

                    'right'                 => false,

                    'units_extended'        => 'false',

                    'units'                 => array('em','px'),

                    'default'               => array(

                        'padding-top'       => 'px',

                        'padding-right'     => 'px',

                        'padding-bottom'    => 'px',

                        'padding-left'      => 'px',

                        'units'             => 'px',

                        )

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_bg_optins',

                    'type'                  => 'background',

                    'title'                 => esc_html__('Background Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the background color of the page title area.', 'vorosa')

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_overlay_color',

                    'type'                  => 'color',

                   'title'                  => esc_html__('Overlay Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the overlay color of the page title area.', 'vorosa'),

                    'transparent'           => false,

                    'validate'              => 'color',

                    'default'               => '#333'

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_overlay_color_opacity',

                    'type'                  => 'slider',

                    'title'                 => esc_html__('Overlay Opacity', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the opacity of the overlay color', 'vorosa'),

                    'desc'                  => esc_html__('Overlay opacity. Min: 0, max: 1, step: .1, default value: .8', 'vorosa'),

                    "default"               => '.5',

                    "min"                   => 0,

                    "step"                  => .1,

                    "max"                   => 1,

                    'resolution'            => 0.1,

                    'display_value'         => 'text',

                )

            )

        ) 

    );

    //breadcrumbs

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Breadcrumb','vorosa'),

        'icon'      => 'el el-arrow-right',

        'id'        => 'vorosa_blog_breadcrumb',

        'subsection'=> true,

        'fields'    => array(

                array(

                    'id'                    => 'vorosa_breadcrumbs_content_blog',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__( 'Show Breadcrumb Content', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls what displays in the breadcrumb area.', 'vorosa' ),

                    'options'               => array (

                        '1'                 => esc_html__('None','vorosa'),

                        '2'                 => esc_html__('Breadcrumbs','vorosa'),

                        '3'                 => esc_html__('Search Box','vorosa'),

                    ),

                    'default'               => '2',

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_mobile',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Breadcrumb on Mobile Devices', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Turn on to display breadcrumb on mobile devices.', 'vorosa' ),

                    'default'               => true,

                ),



                array(

                    'id'                    => 'vorosa_breadcrumbs_separator',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Breadcrumb Separator','vorosa'),

                    'subtitle'              => esc_html__('Set the breadcrumb separator here','vorosa'),

                    'default'               => ' / '

                ),



                array(

                    'id'                    => 'vorosa_breadcrumbs_font_blog',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Breadcrumb Font Settings', 'vorosa'),

                    'google'                => true,      

                    'subsets'               => false,

                    'line-height'           => false,

                    'transition'            => false,

                    'text-align'            => false,

                    'font-style'            => false,    

                    'font-family'           => false,    

                    'font-family'           => false,    

                    'font-weight'           => false,    

                    'output'                => array('.breadcrumbs ul li a,.breadcrumbs ul, .breadcrumbs ul li'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the font settings of the breadcrumb.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_font_size',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Breadcrumb Text Size', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the size of the breadcrumb text.', 'vorosa'),

                 ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_font_blog',

                    'type'                  => 'color',

                    'title'                 => esc_html__('Breadcrumb Text Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls breadcrumb text color.', 'vorosa'),

                 ),

                array(

                    'id'                    => 'vorosa_breadcrumbs_text_hover_blog',

                    'type'                  => 'color',

                    'title'                 => esc_html__('Breadcrumb Text Hover Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls breadcrumb text hover color.', 'vorosa'),

                 ),



                array(

                    'id'                    => 'vorosa_breadcrumbs_post_cat',

                    'type'                  => 'switch',

                    'title'                 => esc_html__('Show Post Categories on Breadcrumb', 'vorosa'),

                    'subtitle'              => esc_html__('Turn on to display the post categories in the breadcrumb path.', 'vorosa'),

                    'default'               => true,

                 ),


            )

        )

    );

     //Header center

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__('Social Icon', 'vorosa'),

        'id'               => 'vorosa-social-icon',

        'icon'             => 'el el-arrow-right',      

        'fields'           => array( 

                array(

                    'id'                    => 'vorosa_social_icons',

                    'type'                  => 'sortable',

                    'title'                 => esc_html__('Social Icons', 'vorosa'),

                    'subtitle'              => esc_html__('Enter social links to show the icons', 'vorosa'),

                    'mode'                  => 'text',

                    'label'                 => true,

                    'options'               => array(        

                        'facebook'          => '',

                        'twitter'           => '',

                        'instagram'         => '',

                        'tumblr'            => '',

                        'pinterest'         => '',

                        'google-plus'       => '',

                        'linkedin'          => '',

                        'behance'           => '',

                        'dribbble'          => '',

                        'youtube'           => '',

                        'vimeo'             => '',

                        'rss'               => '',

                ),

                'default'                   => array(

                    'facebook'              => '#',

                    'twitter'               => '#',

                    'instagram'             => '#',

                    'tumblr'                => '',

                    'pinterest'             => '',

                    'google-plus'           => '#',

                    'linkedin'              => '',

                    'behance'               => '',

                    'dribbble'              => '#',

                    'youtube'               => '',

                    'vimeo'                 => '',

                    'rss'                   => '',

                ),

            ))

        ) 

    );

    //Fonts

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Typography', 'vorosa'),

        'id'        => 'vorosa_fonts',

        'icon'      => 'el el-fontsize',

        'fields'    => array(

                array(

                    'id'                    => 'vorosa_bodyfont',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Body Typography', 'vorosa'),

                    'google'                => true,        

                    'subsets'               => false, 

                    'word-spacing'          => true, 

                    'letter-spacing'        => true,

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('body'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the typography for all body font settings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_bodyfont_link',

                    'type'                  => 'color',

                    'output'                => array( 'a'),

                    'title'                 => esc_html__('Link Color','vorosa'),

                    'subtitle'              => esc_html__('Controls the color of all links.','vorosa'),

                ),

                array(

                    'id'                    => 'vorosa_bodyfont_link_hover',

                    'type'                  => 'color',

                    'output'                => array( 'a:hover, a:focus, a:active'),

                    'title'                 => esc_html__('Link Color Hover','vorosa'),

                    'subtitle'              => esc_html__('Controls the hover color of all links.','vorosa'),

                ),

            )

        ) 

    );


    //Heading font

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Heading Typography', 'vorosa'),

        'id'        => 'vorosa_headingfont',

        'icon'      => 'el el-arrow-right',

        'subsection'=> true,

        'fields'    => array(

                array(

                    'id'                    => 'vorosa_headingfonth1',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Heading H1 Typography', 'vorosa'),

                    'google'                => true,    

                    'text-transform'        => true, 

                    'word-spacing'          => true, 

                    'letter-spacing'        => true,                    

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('h1'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('These settings control the typography for all H1 Headings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_headingfonth2',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Heading H2 Typography', 'vorosa'),

                    'google'                => true,  

                    'text-transform'        => true, 

                    'letter-spacing'        => true,                    

                    'word-spacing'          => true,    

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('h2'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('These settings control the typography for all H2 Headings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_headingfonth3',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Heading H3 Typography', 'vorosa'),

                    'google'                => true, 

                    'text-transform'        => true, 

                    'letter-spacing'        => true,                    

                    'word-spacing'          => true,    

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('h3'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('These settings control the typography for all H3 Headings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_headingfonth4',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Heading H4 Typography', 'vorosa'),

                    'google'                => true,    

                    'text-transform'        => true, 

                    'word-spacing'          => true, 

                    'letter-spacing'        => true,                    

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('h4'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('These settings control the typography for all H4 Headings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_headingfonth5',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Heading H5 Typography', 'vorosa'),

                    'google'                => true,    

                    'text-transform'        => true, 

                    'word-spacing'          => true, 

                    'letter-spacing'        => true,                    

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('h5'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('These settings control the typography for all H5 Headings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_headingfonth6',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Heading H6 Typography', 'vorosa'),

                    'google'                => true,    

                    'text-transform'        => true,  

                    'word-spacing'          => true, 

                    'letter-spacing'        => true,                    

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('h6'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('These settings control the typography for all H6 Headings.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

        )

    ) );

    // Blog options

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Blog', 'vorosa'),

        'icon'      => 'el el-file-edit',

        'id'        => 'vorosa_blog',

        'fields'    => array(

                array(

                    'id'                    => 'vorosa_bolg_title_bar',

                    'type'                  => 'switch',

                    'title'                 => esc_html__('Page Title Area', 'vorosa'),

                    'subtitle'              => esc_html__('Turn on to show the page title area for the assigned blog page in "settings > reading" or blog archive pages.','vorosa'),

                    'default'               => true,

                ),

                array(

                    'id'                    => 'vorosa_readmore_text',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Read More Text', 'vorosa'),

                    'default'               => esc_html__('Read more','vorosa')

                ),

                array(

                    'id'                    => 'vorosa_excerpt_length',

                    'type'                  => 'slider',

                    'title'                 => esc_html__('Excerpt Length On Blog Page', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the excerpt length on blog page','vorosa'),

                    "default"               => 30,

                    "min"                   => 10,

                    "step"                  => 2,

                    "max"                   => 130,

                    'display_value'         => 'text'

                ),

                array(

                    'id'                    => 'vorosa_sidebarblog_pos',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Blog Layout', 'vorosa'),

                    'subtitle'              => esc_html__('Choose your blog Layout', 'vorosa'),

                    'desc'                  => esc_html__('Select blog page Layout', 'vorosa'),

                    'options'               => array(

                        'single'            => esc_html__('Single Column','vorosa'),

                        'twocolumn'         => esc_html__('Blog two column','vorosa'),

                        'threecolumn'       => esc_html__('Blog three colum','vorosa'),

                        'left'              => esc_html__('Blog Left sidebar','vorosa'),

                        'right'             => esc_html__('Blog Right sidebar','vorosa'),

                    ),

                    'default'               => 'threecolumn',

                ),


                array(

                    'id'                    => 'vorosa_blog_style',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Blog Style', 'vorosa'),

                    'subtitle'              => esc_html__('Choose your blog style', 'vorosa'),

                    'desc'                  => esc_html__('Select blog page style', 'vorosa'),

                    'options'               => array(

                        'masonary'         => esc_html__('Default','vorosa'),
                        'default'            => esc_html__('Masonary','vorosa'),

                        

                    ),

                    'default'               => 'default',

                ),
                array(

                    'id'                    => 'vorosa_blog_pheights',

                    'type'                  => 'spacing',

                    'title'                 => esc_html__( 'Blog Page Padding.', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the top and bottom padding of the blog page', 'vorosa' ),

                    'output'                => array('.our-blog-area'),

                    'mode'                  => 'padding',

                    'units_extended'        => 'false',

                    'left'                  => 'false',

                    'right'                 => 'false',

                    'units'                 => array('em','px'),

                    'default'               => array(

                        'padding-top'       => '120px',

                        'padding-right'     => 'px',

                        'padding-bottom'    => '120px',

                        'padding-left'      => 'px',

                        'units'             => 'px',

                        )

                ),

                array(

                    'id'                    => 'vorosa_blog_excerpt',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Blog Excerpt Show / hide', 'vorosa'),

                    'options'               => array(

                        'show'            => esc_html__('Show','vorosa'),

                        'hide'         => esc_html__('Hide','vorosa'),

                    ),

                    'default'               => 'hide',

                ),

                array(

                    'id'                    => 'vorosa_blog_info',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Blog Meta Show / hide', 'vorosa'),

                    'options'               => array(

                        'show'            => esc_html__('Show','vorosa'),

                        'hide'         => esc_html__('Hide','vorosa'),

                    ),

                    'default'               => 'hide',

                ),

                array(

                    'id'       => 'blog_Icon',

                    'type'     => 'media', 

                    'url'      => true,

                    'title'    => __('Media w/ URL', 'vorosa'),

                    'default'  => array(

                        'url'=> get_template_directory_uri().'/images/4.png'

                    ),

                ),

            )

        ) 

    );  

    // Blog archive

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Blog Page Title', 'vorosa'),

        'icon'      => 'el el-arrow-right',

        'id'        => 'vorosa_blog_id',

        'subsection'=> true,

        'fields'    => array(           

                array(

                    'id'                    => 'vorosa_blog_text',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Blog Page Title', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the title text that displays in the page title area of the assigned blog page. This option only works if your front page displays your latest post in "settings > reading" or blog archive pages.','vorosa'),

                    'default'               => 'Blog',

                ),

                array(

                    'id'                    => 'vorosa_bolg_subtitle',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Blog Page Subtitle', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the subtitle text that displays in the page title area of the assigned blog page. This option only works if your front page displays your latest post in "settings > reading" or blog archive pages.','vorosa'),

                ),

                array(

                    'id'                    => 'vorosa_bolg_title_color',

                    'type'                  => 'color',

                    'output'                => array('.bredcrumb-blog h1, .bredcrumb-blog h3 '),

                    'title'                 => esc_html__('Blog Title Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls blog title color.','vorosa'),

                ),

                array(

                    'id'                    => 'vorosa_bolg_title_position',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Blog Title Position', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the position of the blog title','vorosa'),

                    'options'               => array(

                        'left'              => esc_html__('Left','vorosa'),

                        'center'            => esc_html__('Center','vorosa'),

                        'right'             => esc_html__('Right','vorosa'),

                    ),

                    'default'               => 'center',

                ),

                array(

                    'id'                    => 'vorosa_blog_banner',

                    'type'                  => 'background',

                    'title'                 => esc_html__('Blog Page Title Banner', 'vorosa'),

                ),

            )

        ) 

    );  

    // Single blog

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Blog Details', 'vorosa'),

        'icon'      => 'el el-arrow-right',

        'id'        => 'vorosa_blog_single',

        'subsection'=> true,

        'fields'    => array(

                array(

                    'id'                    => 'vorosa_single_pos',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('Blog Details Layout', 'vorosa'),

                    'subtitle'              => esc_html__('Choose your favorite style', 'vorosa'),

                    'options'               => array(

                        'full'              => esc_html__('Full Width','vorosa'),

                        'left'              => esc_html__('Left Sidebar','vorosa'),

                        'right'             => esc_html__('Right sidebar','vorosa'),

                    ),

                    'default'               => 'right',

                ),

                array(

                    'id'                    => 'vorosa_blog_spheights',

                    'type'                  => 'spacing',

                    'title'                 => esc_html__( 'Blog Details Page Padding.', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the top and bottom padding of the single blog page', 'vorosa' ),

                    'output'                => array('.blog-story-area'),

                    'mode'                  => 'padding',

                    'units_extended'        => 'false',

                    'left'                  => 'false',

                    'right'                 => 'false',

                    'units'                 => array('em','px'),

                    'default'               => array(

                        'padding-top'       => 'px',

                        'padding-right'     => '0px',

                        'padding-bottom'    => 'px',

                        'padding-left'      => '0px',

                        'units'             => 'px',

                        )

                ),

                array(

                    'id'                    => 'vorosa_blog_details_show_title',

                    'type'                  => 'switch',

                    'title'                 => esc_html__('Post Title', 'vorosa'),

                    'default'               => false,

                ),

                array(

                    'id'                    => 'vorosa_blog_details_show_meta',

                    'type'                  => 'switch',

                    'title'                 => esc_html__('Post top Meta', 'vorosa'),

                    'default'               => false,

                ),

                array(

                    'id'                    => 'vorosa_blog_details_social_share',

                    'type'                  => 'switch',

                    'title'                 => esc_html__('Social Share', 'vorosa'),

                    'default'               => false,

                ),

                array(

                    'id'                    => 'vorosa_blog_details_post_navigation',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Post Navigation (Next/Previous)', 'vorosa' ),

                    'default'               => true,

                ),

                array(

                    'id'                    => 'vorosa_blog_details_show_author_info',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Show Author Info', 'vorosa' ),

                    'default'               => true,

                ),

                array(

                    'id'                    => 'vorosa_blog_details_show_related_post',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Show Related Post', 'vorosa' ),

                    'default'               => true,

                ),

                array(

                    'id'                    => 'vorosa_blog_details_related_post_title',

                    'type'                  => 'text',

                    'title'                 => esc_html__( 'Related Post Title', 'vorosa' ),

                    'default'               => esc_html__( 'Related Posts', 'vorosa' ),

                ),

                array(

                    'id'                    => 'vorosa_blog_details_no_of_column_related_post',

                    'type'                  => 'select',

                    'title'                 => esc_html__( 'No. of Column Related post', 'vorosa' ),

                        'options'  => array(

                            '12' => '1 Column',

                            '1' => '12 Column',

                            '2' => '6 Column',

                            '3' => '4 Column',

                            '4' => '3 Column',

                            '6' => '2 Column',

                        ),

                    'default'               => 4,

                ),

                array(

                    'id'        => 'vorosa_blog_details_no_of_item_per_page',

                    'type'      => 'slider',

                    'title'     => esc_html__( 'No. of Item per page', 'vorosa' ),

                    'desc'      => esc_html__('Min: -1, max: --, step: 1, default value: 3 (if you want to show all post then set -1 value.)', 'vorosa'),

                    "default"   => 3,

                    "min"       => -1,

                    "step"      => 1,

                    "max"       => 20,

                    'display_value' => 'text'

                ),

            )

    ) );

    // Sidebar

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('Sidebar', 'vorosa'),

        'icon'      => 'el el-arrow-right',

        'id'        => 'vorosa_sidebar',

        'subsection'=> true,

        'fields'    => array(



                array(

                    'id'                    => 'vorosa_sidebar_widget_title',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Widget Title', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the settings of the widget title', 'vorosa'),

                    'google'                => true,       

                    'subsets'               => false, 

                    'text-transform'        => true, 

                    'letter-spacing'        => true, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.sidebar-title'), 

                    'units'                 => 'px',

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_sidebar_widget_title',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Widget Title', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the settings of the widget title', 'vorosa'),

                    'google'                => true,       

                    'subsets'               => false, 

                    'text-transform'        => true, 

                    'letter-spacing'        => true, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.sidebar-title'), 

                    'units'                 => 'px',

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                        => 'vorosa_sidebar_widget_title_spacing',

                    'type'                      => 'spacing',

                    'title'                     => esc_html__( 'Widget Title Spacing', 'vorosa' ),

                    'output'                    => array('.sidebar-title:not(.related-post-title)'),

                    'mode'                      => 'margin',

                    'units_extended'            => 'false',

                    'units'                     => array('em','px'),

                    'default'                   => array(

                        'margin-top'            => 'px',

                        'margin-right'          => 'px',

                        'margin-bottom'         => 'px',

                        'margin-left'           => 'px',

                        'units'                 => 'px',

                    )

                ),

                array(

                    'id'                    => 'vorosa_sidebar_widget_title_separetor',

                    'type'                  => 'background',

                    'background-attachment' => false,

                    'background-size'       => false,

                    'background-position'   => false,

                    'background-image'      => false,

                    'background-repeat'     => false,

                    'output'                => array( '.sidebar-title::before' ),

                    'title'                     => esc_html__( 'Widget Title Separator color', 'vorosa' ),

                    'subtitle'                  => esc_html__( 'Controls the Separator color.', 'vorosa' ),

                ),

            )

    ) );

    //woocommerce
    if(class_exists('woocommerce')):
        Redux::setSection( $opt_name, array(
            'title'      => esc_html__('WooCommerce', 'vorosa'),
            'desc'       => esc_html__('WooCommerce options', 'vorosa'),
            'icon'       => 'el el-shopping-cart',      
            'fields'     => array(
        )) 
    );
    // Product Listing
    Redux::setSection( $opt_name, array(
        'title'        => esc_html__('Product Listing Setting', 'vorosa'),
        'desc'         => esc_html__('Use this section to select options for product.', 'vorosa'),
        'icon'         => 'el-icon-tags',
        'subsection'   => true,      
        'fields'                        => array(
            array(
                'id'                    => 'product_per_page',
                'type'                  => 'slider',
                'title'                 => esc_html__('Products per page', 'vorosa'),
                'subtitle'              => esc_html__('Amount of products per page on shop page.', 'vorosa'),
                "default"               => 20,
                "min"                   => 3,
                "step"                  => 1,
                "max"                   => 48,
                'display_value'         => 'text'

            ),
            array(
                'id'                    => 'vorosa_shop_page_layout',
                'title'                 => esc_html__('Select Shop page layout', 'vorosa'),
                'subtitle'              => esc_html__('Select Shop page layout.', 'vorosa'),
                'type'                  => 'image_select',
                'options'               => array(
                    'left'              => array(
                        'title'         => esc_html__('Left Sidebar', 'vorosa'),
                        'img'           => get_template_directory_uri().'/images/wc-layout/left-sidebar.png',
                    ),
                    'fullw'             => array(
                        'title'         => esc_html__(' Full Width  ', 'vorosa'),
                        'img'           => get_template_directory_uri().'/images/wc-layout/no-sidebar.png',
                    ),
                    'right'             => array(
                        'title'         => esc_html__(' Right Sidebar', 'vorosa'),
                        'img'           => get_template_directory_uri().'/images/wc-layout/right-sidebar.png',
                    ),
                ),
                'default'               => 'right'
            ),
        )) 
    );
     //Woocommerce single page
        Redux::setSection( $opt_name, array(
        'title'            => esc_html__('WooCommerce Single Page', 'vorosa'),
        'id'               => 'vorosa_woo_single',
        'icon'             => 'el el-arrow-right',
        'subsection'       => true,  
        'fields'           => array(                
                   array(
                    'id'                    => 'vorosa_shop_single_page_layout',
                    'title'                 => esc_html__('Select Single Shop page layout', 'vorosa'),
                    'subtitle'              => esc_html__('Select single Shop page layout.', 'vorosa'),
                    'type'                  => 'image_select',
                    'options'               => array(
                        'left'              => array(
                            'title'         => esc_html__('Left Sidebr', 'vorosa'),
                            'img'           => get_template_directory_uri().'/images/wc-layout/left-sidebar.png',
                        ),
                        'fullw'             => array(
                            'title'         => esc_html__('Full Width ', 'vorosa'),
                            'img'           => get_template_directory_uri().'/images/wc-layout/no-sidebar.png',
                        ),
                        'right'             => array(
                            'title'         => esc_html__('Right Sidebar ', 'vorosa'),
                            'img'           => get_template_directory_uri().'/images/wc-layout/right-sidebar.png',
                        ),
                    ),
                    'default'               => 'fullw'
                ),
                 array(
                        'id'                    => 'vorosa_shop_single_page_gallery_zoom_lense',
                        'title'                 => esc_html__('Enable Zoom Lense', 'vorosa'),
                        'subtitle'              => esc_html__('Enable your single product page product image zoom lense.', 'vorosa'),
                        'type'                  => 'switch',
                        'default'               => true,
                ),
                 array(
                        'id'                    => 'vorosa_shop_single_page_gallery_light_box',
                        'title'                 => esc_html__('Enable Lightbox', 'vorosa'),
                        'subtitle'              => esc_html__('Enable your single product page product image lightbox.', 'vorosa'),
                        'type'                  => 'switch',
                        'default'               => true,
                ),
            )
        ));
    endif;

    //footer section

    Redux::setSection($opt_name, array(

        'title'   => esc_html__('Footer setting','vorosa'),

        'id'      => 'vorosa_footer_section',

        'icon'    => 'el el-brush',

        'fields'  => array(

            array(

                'id'                        => 'vorosa_footer_widget',

                'type'                      => 'switch',

                'title'                     => esc_html__( 'Show Footer Widgets Area', 'vorosa' ),

                'subtitle'                  => esc_html__( 'Turn on to display footer widgets area','vorosa' ),

                'default'                   => true,

            ),

            array(

                'id'                        => 'vorosa_footer_layoutcolumns',

                'title'                     => esc_html__('Number of Footer Columns','vorosa'),

                'subtitle'                  => esc_html__( 'Controls the number of columns in the footer.', 'vorosa' ),

                'desc'                      => esc_html__( 'Select the number of columns', 'vorosa' ),

                'type'                      => 'button_set',

                'options'                   => array(

                    '1'                     => esc_html__('One Column','vorosa'),

                    '2'                     => esc_html__('Two Column','vorosa'),

                    '3'                     => esc_html__('Three Column','vorosa'),

                    '4'                     => esc_html__('Four Column','vorosa'),

                ),

                'default'                   => '4'

            ),

            array(

                'id'                        => 'vorosa_footer_bg_color',

                'type'                      => 'background',

                'title'                     => esc_html__( 'Footer Area Background Color', 'vorosa' ),

                'subtitle'                  => esc_html__( 'Control the background color of the footer area(default: #252830).', 'vorosa' ),

                'default'                   => array(
                    'background-color'      => '#2e2e2e'
                )

            ),

            array(

                    'id'                    => 'vorosa_footer_overlay_color',

                    'type'                  => 'color',

                   'title'                  => esc_html__('Overlay Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the overlay color of the footer area.', 'vorosa'),

                    'transparent'           => false,

                    'validate'              => 'color',

            ),

            array(

                    'id'                    => 'vorosa_footer_overlay_color_opacity',

                    'type'                  => 'slider',

                    'title'                 => esc_html__('Overlay Opacity', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the opacity of the overlay color', 'vorosa'),

                    'desc'                  => esc_html__('Overlay opacity. Min: 0, max: 1, step: .1, default value: .8', 'vorosa'),

                    "default"               => .8,

                    "min"                   => 0,

                    "step"                  => .1,

                    "max"                   => 1,

                    'resolution'            => 0.1,

                    'display_value'         => 'text'

            ),

            array(

                'id'                        => 'vorosa_footer_widget_width',

                'type'                      => 'switch',

                'title'                     => esc_html__( 'Full Width Footer', 'vorosa' ),

                'subtitle'                  => esc_html__( 'Turn on to make the footer area full width', 'vorosa' ),

                'default'                   => false,

            ),

            array(

                'id'                        => 'vorosa_footer_widget_height',

                'type'                      => 'spacing',

                'title'                     => esc_html__( 'Footer Padding', 'vorosa' ),

                'subtitle'                  => esc_html__( 'Controls the top and bottom padding for the footer. Enter values excluding any valid CSS unit, ex: 50, 0,', 'vorosa' ),

                'output'                    => array('.single-footer'),

                'mode'                      => 'margin',

                'units_extended'            => 'false',

                'left'                      => 'false',

                'right'                     => 'false',

                'units'                     => array('em','px'),

                'default'                   => array(

                    'margin-top'            => 'px',

                    'margin-right'          => 'px',

                    'margin-bottom'         => 'px',

                    'margin-left'           => 'px',

                    'units'                 => 'px',

                )

            ),

        )

    ));

    //footer typography

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__('Footer Typography', 'vorosa'),

        'id'               => 'vorosa_footer_typography',

        'subsection'       => true,

        'icon'             => 'el el-arrow-right',

        'fields'           => array( 

                array(

                    'id'                    => 'vorosa_footerfont',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Widget Title Typography', 'vorosa'),

                    'google'                => true,       

                    'subsets'               => false, 

                    'text-transform'        => true, 

                    'letter-spacing'        => true, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.footer-title'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the font settings of the widget title', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_footerfontbody',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Footer Body Typography', 'vorosa'),

                    'google'                => true,          

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.footer-brief, .textwidget'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the font settings of the footer body', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                'id'                        => 'vorosa_footer_link',

                'type'                      => 'color',

                'output'                    => array('.footer-top-area a, .single-footer ul li a, .single-footer .footer-social li a'),

                'title'                     => esc_html__( 'Footer Link Color', 'vorosa' ),

                'subtitle'                  => esc_html__( 'Controls the footer link color.', 'vorosa' ),

                ),

                array(

                    'id'                    => 'vorosa_footer_link_hover',

                    'type'                  => 'color',

                    'output'                => array( '.single-footer a:hover, .single-footer ul li a:hover'),

                    'title'                 => esc_html__( 'Footer Link Hover Color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the footer link hover color .', 'vorosa' ),

                ),

            )

        ) );


    Redux::setSection( $opt_name, array(

        'title'            => esc_html__('Copyright Style', 'vorosa'),

        'id'               => 'vorosa_footer_style',

        'subsection'       => true,

        'icon'             => 'el el-arrow-right',

        'fields'           => array( 

            array(

                    'id'                    => 'vorosa_footer_bottom_show',

                    'type'                  => 'switch',

                    'title'                 => esc_html__( 'Copyright Area', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Turn on to display the copyright area.', 'vorosa' ),

                    'default'               => true,

            ),

             array(

                'id'                        => 'vorosa_copyright_style',

                'title'                     => esc_html__('Copyright Style', 'vorosa'),

                'subtitle'                  => esc_html__('Controls the Copyright style.', 'vorosa'),

                'type'                      => 'image_select',

                'options'                   => array(

                    '1'                     => array(

                        'title'             => esc_html__('Copyright Style One', 'vorosa'),

                        'img'               => get_template_directory_uri().'/images/optionframework/copyright1.png',

                    ),

                    '2'                     => array(

                        'title'             => esc_html__('Copyright Style Two', 'vorosa'),

                        'img'               => get_template_directory_uri(). '/images/optionframework/copyright2.jpg',

                    )

                ),

                'default'                   => '1'

                ),

                array(

                    'id'                    => 'vorosa_footer_copyright_width',

                    'type'                  => 'switch',

                    'required'              => array('vorosa_copyright_style','equals', 1),

                    'title'                 => esc_html__( 'Full width Footer', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Turn on to make full width copyright area', 'vorosa' ),

                    'default'               => false,

                ),

                array(

                    'id'                    => 'vorosa_copyright_column',

                    'type'                  => 'image_select', 

                    'required'              => array('vorosa_copyright_style','equals', 1), 

                    'title'                 => esc_html__('Footer Copyright Style','vorosa'),

                    'subtitle'              => esc_html__( 'Choose footer copyright style', 'vorosa' ),

                    'options'               => array(

                        '1'                 => array(

                            'title'         => esc_html__('Style One','vorosa'),

                            'img'           => get_template_directory_uri().'/images/optionframework/fs-1.png',

                        ),

                        '2'                 => array(

                            'title'         =>  esc_html__('Style Two','vorosa'),

                            'img'           => get_template_directory_uri(). '/images/optionframework/fs-2.png',

                        ),

                        '3'                 => array(

                            'title'         => esc_html__('Style Three','vorosa'),

                            'img'           => get_template_directory_uri(). '/images/optionframework/fs-3.png',

                        )

                    ),  

                    'default'               => '1',

                ),

                array(

                    'id'                    => 'vorosa_footer',

                    'type'                  => 'sorter', 

                    'required'              => array('vorosa_copyright_style','equals', 1),    

                    'title'                 => esc_html__( 'Footer Copyright Content','vorosa'),

                    'subtitle'              => esc_html__( 'Enable and disable footer copyright area content just by dragging and dropping.', 'vorosa' ),

                    'options'               => array(

                        'enabled'           => array(

                        'copyright'         => esc_html__('Copyright','vorosa')

                        ),

                        'disabled'          => array(

                        'copyrightmenu'     => esc_html__('Menu','vorosa'),
                        'socialicon'        => esc_html__('Social icon','vorosa')

                        )

                    )               

                ),

                array(

                    'id'                    => 'vorosa_copyright',

                    'type'                  => 'editor',

                    'required'              => array('vorosa_copyright_style','equals', 1), 

                    'title'                 => esc_html__('Copyright Content', 'vorosa'),

                    'subtitle'              => esc_html__('Enter your copyright content here. HTML tags allowed: a, br, em, strong', 'vorosa'),

                    'args'                  => array(

                    'wpautop'               => false,

                    'teeny'                 => true,

                    'textarea_rows'         => 5

                    )

                ),

                array(

                    'id'                    => 'vorosa_copyright2_logo',

                    'type'                  => 'media',

                     'required'             => array('vorosa_copyright_style','equals', 2),

                    'title'                 => esc_html__('Copyright Logo', 'vorosa'),

                    'subtitle'              => esc_html__('Upload logo', 'vorosa'),

                    'default'               => array(

                        'url'               => get_template_directory_uri().'/images/logo.png'

                    ),

                ),

                array(

                    'id'                    => 'vorosa_copyright_copany_info',

                    'type'                  => 'editor',

                     'required'             => array('vorosa_copyright_style','equals', 2),

                    'title'                 => esc_html__('Company Information', 'vorosa'),

                    'subtitle'              => esc_html__('Enter your company information here. HTML tags allowed: a, br, em, strong', 'vorosa'),

                    'default'               => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in', 'vorosa'),

                    'args'                  => array(

                    'wpautop'               => false,

                    'teeny'                 => true,

                    'textarea_rows'         => 5

                    )

                ),

                array(

                    'id'                    => 'vorosa_copyright_social_icon_show',

                    'type'                  => 'switch',

                     'required'             => array('vorosa_copyright_style','equals', 2),

                    'title'                 => esc_html__('Copyright Social Icon Show Hide', 'vorosa'),

                    'subtitle'              => esc_html__('Controls copyright social icon show or hide', 'vorosa'),

                    'default'               => true,

                ),

                array(

                    'id'                    => 'vorosa_copyright_info_two',

                    'type'                  => 'editor',

                     'required'             => array('vorosa_copyright_style','equals', 2),

                    'title'                 => esc_html__('Company Content', 'vorosa'),

                    'subtitle'              => esc_html__('Enter your company information here. HTML tags allowed: a, br, em, strong', 'vorosa'),

                    'default'               => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in', 'vorosa'),

                    'args'                  => array(

                    'wpautop'               => false,

                    'teeny'                 => true,

                    'textarea_rows'         => 5

                    )

                ),

             )

        ) );

    //footer copyright

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__('Copyright Typography', 'vorosa'),

        'id'               => 'vorosa_footer_id',

        'subsection'       => true,

        'icon'             => 'el el-arrow-right',

        'fields'           => array(  

                array(

                    'id'                    => 'vorosa_footer_copyright_height',

                    'type'                  => 'spacing',

                    'title'                 => esc_html__( 'Footer Copyright Padding', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the top and bottom padding of the copyright area. Enter values excluding any valid CSS unit, ex: 20, 20,', 'vorosa' ),

                    'output'                => array('.footer-bottom'),

                    'mode'                  => 'padding',

                    'units_extended'        => 'false',

                    'left'                  => 'false',

                    'right'                 => 'false',

                    'units'                 => array('em','px'),

                    'default'               => array(

                        'padding-top'       => 'px',

                        'padding-right'     => 'px',

                        'padding-bottom'    => 'px',

                        'padding-left'      => 'px',

                        'units'             => 'px',

                    ),

                ),

                array(

                    'id'                    => 'vorosa_copyrightbg_color',

                    'type'                  => 'background',

                    'background-attachment' => false,

                    'background-size'       => false,

                    'background-position'   => false,

                    'background-image'      => false,

                    'background-repeat'     => false,

                    'title'                 => esc_html__( 'Footer Copyright Background Color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Control the background color of the copyright area(default: #222222 ).', 'vorosa' ),

                    'default'               => array(

                        'background-color'  => '#2e2e2e',

                    )

                ),

                array(

                    'id'                    => 'vorosa_footercopyright',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('Footer Copyright Typography', 'vorosa'),

                    'google'                => true,     

                    'subsets'               => false, 

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.copyright-text,.copyright-text > p'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('Controls the font settings of the footer copyright text', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_footer_copyright',

                    'type'                  => 'color',

                    'output'                => array( '.copyright-text a,.footer-bottom ul li a'),

                    'title'                 => esc_html__( 'Footer Copyright Link Color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the link color of the copyright text', 'vorosa' ),

                ),

                array(

                    'id'                    => 'vorosa_footer_copyright_hover',

                    'type'                  => 'color',

                    'output'                => array( '.copyright-text a:hover, .footer-bottom ul li a:hover'),

                    'title'                 => esc_html__( 'Footer Copyright Link Hover Color', 'vorosa' ),

                    'subtitle'              => esc_html__( 'Controls the link hover color of the copyright text(default: #ff7f00).', 'vorosa' ),

                ),

            )

        )

    );


    //404 error page

    Redux::setSection( $opt_name, array(

        'title'     => esc_html__('404 Page', 'vorosa'),

        'id'        => 'vorosa_error_page',  

        'icon'      => 'el-icon-picture',

        'fields'    => array(                

                array(

                    'id'        => 'background_404',

                    'type'      => 'background',

                    'output'    => array('.error-area'),

                    'title'     => esc_html__('404 Page Background', 'vorosa'),

                    'subtitle'  => esc_html__('Controls the background of 404 page.', 'vorosa'),

                    'default'   => array(

                    )

                ),

                array(

                    'id'                    => 'vorosa_404_control',

                    'type'                  => 'button_set',

                    'title'                 => esc_html__('404 Style', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the 404 title or image.', 'vorosa'),

                    'options'               => array(

                        'title'             => esc_html__('Title',  'vorosa'),

                        'image'             => esc_html__('Image', 'vorosa'), 

                     ), 

                    'default'               => 'title'

                ),

                 array(

                    'id'                    => 'vorosa_404_title',

                    'type'                  => 'text',

                    'required'              => array('vorosa_404_control','equals','title'),

                    'title'                 => esc_html__('Title', 'vorosa'),

                    'subtitle'              => esc_html__('Insert your page not found page title ( 404 )', 'vorosa'),

                    'value'                 => '404',

                    'default'               => '404'

                ),

                 array(

                    'id'                    => 'vorosa_404_img',

                    'type'                  => 'media',

                    'required'              => array('vorosa_404_control','equals','image'),

                    'title'                 => esc_html__('Title or 404 Image', 'vorosa'),

                    'subtitle'              => esc_html__('Upload your 404 image.', 'vorosa'),

                ),

                array(

                    'id'                    => 'vorosa_404_subtitle',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Sub Title', 'vorosa'),

                     'subtitle'             => esc_html__('Insert your page not found page subtitle.', 'vorosa'),

                    'default'               => esc_html__('PAGE NOT FOUND', 'vorosa'),

                ), 

                 array(

                    'id'                    => 'vorosa_404_info',

                    'type'                  => 'editor',

                    'title'                 => esc_html__('Information', 'vorosa'),

                    'default'               => esc_html__('The page you are looking for does not exist or has been moved.', 'vorosa'),

                    'args'                  => array(

                        'teeny'             => true,

                        'textarea_rows'     => 5,

                    )

                ),

                array(

                    'id'                    => 'vorosa_button_text',

                    'type'                  => 'text',

                    'title'                 => esc_html__('Button Text', 'vorosa'),

                    'default'               => esc_html__('Go back to home page', 'vorosa'),

                ), 

                array(

                    'id'                    => 'vorosa_404font',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('404 Page Title Font', 'vorosa'),

                    'google'                => true,    

                    'font-style'            => false,    

                    'font-weight'           => false, 

                    'font-family'           => false,

                    'subsets'               => false,

                    'line-height'           => false,

                    'text-align'            => false,

                    'all_styles'            => true,    

                    'output'                => array('.pnf-inner > h1'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('404 page font.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ), 

                array(

                    'id'                    => 'vorosa_404font_subtitle',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('404 Page Title Font', 'vorosa'),

                    'google'                => true,    

                    'font-backup'           => false,    

                    'subsets'               => false, 

                    'line-height'           => false,

                    'text-align'            => false,

                    'text-transform'        => true,    

                    'all_styles'            => true,    

                    'output'                => array('.pnf-inner > h2'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('404 page font.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

                array(

                    'id'                    => 'vorosa_404font_sub',

                    'type'                  => 'typography',

                    'title'                 => esc_html__('404 Page Sub Title Font', 'vorosa'),

                    'google'                => true,    

                    'font-backup'           => false,    

                    'subsets'               => false, 

                    'line-height'           => false,

                    'text-align'            => false,

                    'text-transform'        => true,    

                    'all_styles'            => true,    

                    'output'                => array('.pnf-inner > p'), 

                    'units'                 => 'px',

                    'subtitle'              => esc_html__('404 page sub title font.', 'vorosa'),

                    'default'               => array(

                        'google'            => true,

                    )

                ),

            )

    ) );

    //layout

    Redux::setSection( $opt_name, array(

        'title'            => esc_html__( 'Extra', 'vorosa' ),

        'id'               => 'vorosa_extra',

        'customizer_width' => '400px',

        'icon'             => 'el el-arrow-right',

        'fields'           => array(

                array(

                    'id'                    => 'vorosa_scroll_button_color',

                    'type'                  => 'color',

                    'title'                 => esc_html__('Scroll To Top Button Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls scroll to top button background color', 'vorosa'),

                ),

                array(

                    'id'                    => 'vorosa_blog_pagination_color',

                    'type'                  => 'color',

                    'title'                 => esc_html__('Pagination Hover & Active Background Color', 'vorosa'),

                    'subtitle'              => esc_html__('Controls the background color of pagination when it is hovered over and active', 'vorosa'),

                ),

            )

        ) 

    );