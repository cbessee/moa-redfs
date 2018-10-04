<?php
/**
 * About
 *
 * @package Best_Business
 */

$config = array(
	'menu_name' => esc_html__( 'About Best Business', 'best-business' ),
	'page_name' => esc_html__( 'About Best Business', 'best-business' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - v', 'best-business' ), 'Best Business' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use! We want to make sure you have the best experience using %1$s and that is why we gathered here all the necessary information for you. We hope you will enjoy using %1$s.', 'best-business' ), 'Best Business' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','best-business' ),
			'url'  => 'https://axlethemes.com/downloads/best-business/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','best-business' ),
			'url'  => 'https://axlethemes.com/theme-demo/?demo=best-business',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','best-business' ),
			'url'    => 'https://axlethemes.com/documentation/best-business/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','best-business' ),
			'url'  => 'https://wordpress.org/support/theme/best-business/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'best-business' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'best-business' ),
		'demo_content'        => esc_html__( 'Demo Content', 'best-business' ),
		'useful_plugins'      => esc_html__( 'Useful Plugins', 'best-business' ),
		'support'             => esc_html__( 'Support', 'best-business' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'best-business' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'best-business' ),
			'text'                => esc_html__( 'Even if you are a long-time WordPress user, we still believe you should give our documentation a very quick read.', 'best-business' ),
			'button_label'        => esc_html__( 'View Documentation', 'best-business' ),
			'button_link'         => 'https://axlethemes.com/documentation/best-business/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'best-business' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'best-business' ),
			'button_label'        => esc_html__( 'Check Recommended Actions', 'best-business' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=best-business-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Theme Demo Content', 'best-business' ),
			'text'                => esc_html__( 'You can easily import demo content as we have bundled demo content file within the theme folder. Importer plugin is needed.', 'best-business' ),
			'button_label'        => esc_html__( 'Demo Content', 'best-business' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=best-business-about&tab=demo_content' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'best-business' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'best-business' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'best-business' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'View Theme Demo', 'best-business' ),
			'text'                => esc_html__( 'To get quick glance of the theme, please visit theme demo.', 'best-business' ),
			'button_label'        => esc_html__( 'View Demo', 'best-business' ),
			'button_link'         => 'https://axlethemes.com/theme-demo/?demo=best-business',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Child Theme', 'best-business' ),
			'text'                => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'best-business' ),
			'button_label'        => esc_html__( 'About Child Theme', 'best-business' ),
			'button_link'         => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','best-business' ),
				'description' => esc_html__( 'Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'best-business' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'best-business' ) . '</a>',
			),
			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'best-business' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content.', 'best-business' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Demo content.
	'demo_content' => array(
		'description' => sprintf( esc_html__( 'Demo content files are bundled within this theme. %1$s plugin is needed to import demo content. Please make sure plugin is installed and activated. If you have not installed the plugin, please go to Installed Plugins page under Appearance. After plugin activation, go to Import Demo Data menu under Appearance.', 'best-business' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'best-business' ) . '</a>' ),
		),

	// Useful plugins.
	'useful_plugins' => array(
		'description'        => esc_html__( 'This theme supports some helpful WordPress plugins to enhance your website.', 'best-business' ),
		'plugins_list_title' => esc_html__( 'Useful Plugins List:', 'best-business' ),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'best-business' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'Got theme support question or found bug? Best place to ask your query is our dedicated Support forum.', 'best-business' ),
			'button_label' => esc_html__( 'Contact Support', 'best-business' ),
			'button_link'  => esc_url( 'https://axlethemes.com/support-forum/forum/best-business/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'best-business' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Please check our theme documentation for detailed information on how to setup and use theme.', 'best-business' ),
			'button_label' => esc_html__( 'View Documentation', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/documentation/best-business/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'best-business' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'best-business' ),
			'button_label' => esc_html__( 'View Pro Version', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/downloads/best-business-pro/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Pre-sale Queries', 'best-business' ),
			'icon'         => 'dashicons dashicons-cart',
			'text'         => esc_html__( 'Have any query before purchase, you are more than welcome to ask.', 'best-business' ),
			'button_label' => esc_html__( 'Pre-sale Question?', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/pre-sale-question/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'best-business' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'Needed any customization for the theme, you can request from here.', 'best-business' ),
			'button_label' => esc_html__( 'Customization Request', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/customization-request/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'best-business' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'best-business' ),
			'button_label' => esc_html__( 'About Child Theme', 'best-business' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

	// Upgrade.
	'upgrade_to_pro' => array(
		'description'  => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'best-business' ),
		'button_label' => esc_html__( 'Upgrade to Pro', 'best-business' ),
		'button_link'  => 'https://axlethemes.com/downloads/best-business-pro/',
		'is_new_tab'   => true,
	),

);

Best_Business_About::init( apply_filters( 'best_business_about_filter', $config ) );
