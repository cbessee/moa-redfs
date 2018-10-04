<?php
/*=======================================================
*    Register Custom Taxonomy
* =======================================================*/
// Register Gallery Custom Taxonomy
if(!function_exists('vorosa_gallery_custom_category')){
	function vorosa_gallery_custom_category() {
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'vorosa' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'vorosa' ),
			'menu_name'                  => __( 'Categories', 'vorosa' ),
			'all_items'                  => __( 'All Items', 'vorosa' ),
			'parent_item'                => __( 'Parent Item', 'vorosa' ),
			'parent_item_colon'          => __( 'Parent Item:', 'vorosa' ),
			'new_item_name'              => __( 'New Item Name', 'vorosa' ),
			'add_new_item'               => __( 'Add New Item', 'vorosa' ),
			'edit_item'                  => __( 'Edit Item', 'vorosa' ),
			'update_item'                => __( 'Update Item', 'vorosa' ),
			'view_item'                  => __( 'View Item', 'vorosa' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'vorosa' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'vorosa' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'vorosa' ),
			'popular_items'              => __( 'Popular Items', 'vorosa' ),
			'search_items'               => __( 'Search Items', 'vorosa' ),
			'not_found'                  => __( 'Not Found', 'vorosa' ),
			'no_terms'                   => __( 'No items', 'vorosa' ),
			'items_list'                 => __( 'Items list', 'vorosa' ),
			'items_list_navigation'      => __( 'Items list navigation', 'vorosa' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'gallery_cat', array( 'gallerys' ), $args );
	}
	add_action( 'init', 'vorosa_gallery_custom_category', 0 );

}
