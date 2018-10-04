<?php

/*=======================================================

*    Register Post type

* =======================================================*/

if ( ! function_exists('vorosa_custom_post') ) {

	function vorosa_custom_post() {

		// vorosa Gallery

		$labels = array(

			'name'                  => _x( 'Gallerys', 'Post Type General Name', 'vorosa' ),

			'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'vorosa' ),

			'menu_name'             => __( 'Gallery', 'vorosa' ),

			'name_admin_bar'        => __( 'Gallery', 'vorosa' ),

			'archives'              => __( 'Item Archives', 'vorosa' ),

			'parent_item_colon'     => __( 'Parent Item:', 'vorosa' ),

			'all_items'             => __( 'All Items', 'vorosa' ),

			'add_new_item'          => __( 'Add New Item', 'vorosa' ),

			'add_new'               => __( 'Add New', 'vorosa' ),

			'new_item'              => __( 'New Item', 'vorosa' ),

			'edit_item'             => __( 'Edit Item', 'vorosa' ),

			'update_item'           => __( 'Update Item', 'vorosa' ),

			'view_item'             => __( 'View Item', 'vorosa' ),

			'search_items'          => __( 'Search Item', 'vorosa' ),

			'not_found'             => __( 'Not found', 'vorosa' ),

			'not_found_in_trash'    => __( 'Not found in Trash', 'vorosa' ),

			'featured_image'        => __( 'Featured Image', 'vorosa' ),

			'set_featured_image'    => __( 'Set featured image', 'vorosa' ),

			'remove_featured_image' => __( 'Remove featured image', 'vorosa' ),

			'use_featured_image'    => __( 'Use as featured image', 'vorosa' ),

			'insert_into_item'      => __( 'Insert into item', 'vorosa' ),

			'uploaded_to_this_item' => __( 'Uploaded to this item', 'vorosa' ),

			'items_list'            => __( 'Items list', 'vorosa' ),

			'items_list_navigation' => __( 'Items list navigation', 'vorosa' ),

			'filter_items_list'     => __( 'Filter items list', 'vorosa' ),

		);

		$args = array(

			'label'                 => __( 'Gallery', 'vorosa' ),

			'labels'                => $labels,

			'supports'              => array( 'title','editor','thumbnail', 'custom-fields', 'excerpt'),

			'hierarchical'          => false,

			'public'                => true,

			'show_ui'               => true,

			'show_in_menu'          => true,

			'menu_position'         => 5,

			'menu_icon'             => 'dashicons-desktop',

			'show_in_admin_bar'     => true,

			'show_in_nav_menus'     => true,

			'can_export'            => true,

			'has_archive'           => true,		

			'exclude_from_search'   => false,

			'publicly_queryable'    => true,

			'capability_type'       => 'page',

		);

		register_post_type( 'gallerys', $args );

	

		// Causes

		$labels = array(

			'name'                  => _x( 'Causess', 'Post Type General Name', 'vorosa' ),

			'singular_name'         => _x( 'Causes', 'Post Type Singular Name', 'vorosa' ),

			'menu_name'             => __( 'Causes', 'vorosa' ),

			'name_admin_bar'        => __( 'Causes', 'vorosa' ),

			'archives'              => __( 'Item Archives', 'vorosa' ),

			'parent_item_colon'     => __( 'Parent Item:', 'vorosa' ),

			'all_items'             => __( 'All Items', 'vorosa' ),

			'add_new_item'          => __( 'Add New Item', 'vorosa' ),

			'add_new'               => __( 'Add New Causes', 'vorosa' ),

			'new_item'              => __( 'New Item', 'vorosa' ),

			'edit_item'             => __( 'Edit Item', 'vorosa' ),

			'update_item'           => __( 'Update Item', 'vorosa' ),

			'view_item'             => __( 'View Item', 'vorosa' ),

			'search_items'          => __( 'Search Item', 'vorosa' ),

			'not_found'             => __( 'Not found', 'vorosa' ),

			'not_found_in_trash'    => __( 'Not found in Trash', 'vorosa' ),

			'featured_image'        => __( 'causes Image', 'vorosa' ),

			'set_featured_image'    => __( 'Set causes image', 'vorosa' ),

			'remove_featured_image' => __( 'Remove causes image', 'vorosa' ),

			'use_featured_image'    => __( 'Use as causes image', 'vorosa' ),

			'insert_into_item'      => __( 'Insert into item', 'vorosa' ),

			'uploaded_to_this_item' => __( 'Uploaded to this item', 'vorosa' ),

			'items_list'            => __( 'Items list', 'vorosa' ),

			'items_list_navigation' => __( 'Items list navigation', 'vorosa' ),

			'filter_items_list'     => __( 'Filter items list', 'vorosa' ),

		);

		$args = array(

			'label'                 => __( 'Causes', 'vorosa' ),

			'labels'                => $labels,

			'supports'              => array( 'title','editor','thumbnail', 'custom-fields', 'excerpt'),

			'hierarchical'          => false,

			'public'                => true,

			'show_ui'               => true,

			'show_in_menu'          => true,

			'menu_position'         => 6,

			'menu_icon'             => 'dashicons-calendar-alt',

			'show_in_admin_bar'     => true,

			'show_in_nav_menus'     => true,

			'can_export'            => true,

			'has_archive'           => true,		

			'exclude_from_search'   => false,

			'publicly_queryable'    => true,

			'capability_type'       => 'page',

		);

		register_post_type( 'causes', $args );

		

		// Events

		/*$labels = array(

			'name'                  => _x( 'Events', 'Post Type General Name', 'vorosa' ),

			'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'vorosa' ),

			'menu_name'             => __( 'Event', 'vorosa' ),

			'name_admin_bar'        => __( 'Event', 'vorosa' ),

			'archives'              => __( 'Item Archives', 'vorosa' ),

			'parent_item_colon'     => __( 'Parent Item:', 'vorosa' ),

			'all_items'             => __( 'All Items', 'vorosa' ),

			'add_new_item'          => __( 'Add New Item', 'vorosa' ),

			'add_new'               => __( 'Add New event', 'vorosa' ),

			'new_item'              => __( 'New Item', 'vorosa' ),

			'edit_item'             => __( 'Edit Item', 'vorosa' ),

			'update_item'           => __( 'Update Item', 'vorosa' ),

			'view_item'             => __( 'View Item', 'vorosa' ),

			'search_items'          => __( 'Search Item', 'vorosa' ),

			'not_found'             => __( 'Not found', 'vorosa' ),

			'not_found_in_trash'    => __( 'Not found in Trash', 'vorosa' ),

			'featured_image'        => __( 'event Image', 'vorosa' ),

			'set_featured_image'    => __( 'Set event image', 'vorosa' ),

			'remove_featured_image' => __( 'Remove event image', 'vorosa' ),

			'use_featured_image'    => __( 'Use as event image', 'vorosa' ),

			'insert_into_item'      => __( 'Insert into item', 'vorosa' ),

			'uploaded_to_this_item' => __( 'Uploaded to this item', 'vorosa' ),

			'items_list'            => __( 'Items list', 'vorosa' ),

			'items_list_navigation' => __( 'Items list navigation', 'vorosa' ),

			'filter_items_list'     => __( 'Filter items list', 'vorosa' ),

		);

		$args = array(

			'label'                 => __( 'Event', 'vorosa' ),

			'labels'                => $labels,

			'supports'              => array( 'title','editor','thumbnail', 'custom-fields', 'excerpt'),

			'hierarchical'          => false,

			'public'                => true,

			'show_ui'               => true,

			'show_in_menu'          => true,

			'menu_position'         => 7,

			'menu_icon'             => 'dashicons-calendar-alt',

			'show_in_admin_bar'     => true,

			'show_in_nav_menus'     => true,

			'can_export'            => true,

			'has_archive'           => true,		

			'exclude_from_search'   => false,

			'publicly_queryable'    => true,

			'capability_type'       => 'page',

		);

		register_post_type( 'event', $args );
		*/
		

		

		

	}

	add_action( 'init', 'vorosa_custom_post');

}