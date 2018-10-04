<?php

// initial theme setup

function my_theme_enqueue_styles() {

    $parent_style = 'vorosa-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
	);
	
	wp_enqueue_script( 'script-name', get_stylesheet_directory_uri() . '/js/slider.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}

/*
// add custom taxonomies to staff members

add_action( 'init', 'create_staff_taxonomies', 0 );

function create_staff_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Task Forces', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Task Force', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Task Forces', 'textdomain' ),
		'all_items'         => __( 'All Task Forces', 'textdomain' ),
		'parent_item'       => __( 'Parent Task Force', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Task Force:', 'textdomain' ),
		'edit_item'         => __( 'Edit Task Force', 'textdomain' ),
		'update_item'       => __( 'Update Task Force', 'textdomain' ),
		'add_new_item'      => __( 'Add New Task Force', 'textdomain' ),
		'new_item_name'     => __( 'New Task Force Name', 'textdomain' ),
		'menu_name'         => __( 'Task Force', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'task-force' ),
	);

    register_taxonomy( 'task-force', array( 'staff-member' ), $args );

    // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Technical Committees', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Technical Committee', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Technical Committees', 'textdomain' ),
		'all_items'         => __( 'All Technical Committees', 'textdomain' ),
		'parent_item'       => __( 'Parent Technical Committee', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Technical Committee:', 'textdomain' ),
		'edit_item'         => __( 'Edit Technical Committee', 'textdomain' ),
		'update_item'       => __( 'Update Technical Committee', 'textdomain' ),
		'add_new_item'      => __( 'Add New Technical Committee', 'textdomain' ),
		'new_item_name'     => __( 'New Technical Committee Name', 'textdomain' ),
		'menu_name'         => __( 'Technical Committee', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'technical-committee' ),
	);

    register_taxonomy( 'technical-committee', array( 'staff-member' ), $args );

    // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Ex-Comms', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Ex-Comm', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Ex-Comms', 'textdomain' ),
		'all_items'         => __( 'All Ex-Comms', 'textdomain' ),
		'parent_item'       => __( 'Parent Ex-Comm', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Ex-Comm:', 'textdomain' ),
		'edit_item'         => __( 'Edit Ex-Comm', 'textdomain' ),
		'update_item'       => __( 'Update Ex-Comm', 'textdomain' ),
		'add_new_item'      => __( 'Add New Ex-Comm', 'textdomain' ),
		'new_item_name'     => __( 'New Ex-Comm Name', 'textdomain' ),
		'menu_name'         => __( 'Ex-Comm', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'ex-comm' ),
	);

    register_taxonomy( 'ex-comm', array( 'staff-member' ), $args );
}
*/

function custom_menu_page_removing() {
	remove_menu_page( 'edit.php?post_type=causes' );
	remove_menu_page( 'edit.php?post_type=gallerys' );
}
add_action( 'admin_menu', 'custom_menu_page_removing');

function obfuscate_email_url($email, $params = array()) {
	if (!is_array($params)) {
        $params = array();
    }

    // Tell search engines to ignore obfuscated uri
    if (!isset($params['rel'])) {
        $params['rel'] = 'nofollow';
    }

    $neverEncode = array('.', '@', '+'); // Don't encode those as not fully supported by IE & Chrome

    $urlEncodedEmail = '';
    for ($i = 0; $i < strlen($email); $i++) {
        // Encode 25% of characters
        if (!in_array($email[$i], $neverEncode) && mt_rand(1, 100) < 25) {
            $charCode = ord($email[$i]);
            $urlEncodedEmail .= '%';
            $urlEncodedEmail .= dechex(($charCode >> 4) & 0xF);
            $urlEncodedEmail .= dechex($charCode & 0xF);
        } else {
            $urlEncodedEmail .= $email[$i];
        }
    }
    $obfuscatedEmailUrl = getObfuscatedEmailAddress('mailto:' . $urlEncodedEmail);

    return $urlEncodedEmail;
}

function getObfuscatedEmailAddress($email)
{
    $alwaysEncode = array('.', ':', '@');

    $result = '';

    // Encode string using oct and hex character codes
    for ($i = 0; $i < strlen($email); $i++) {
        // Encode 25% of characters including several that always should be encoded
        if (in_array($email[$i], $alwaysEncode) || mt_rand(1, 100) < 25) {
            if (mt_rand(0, 1)) {
                $result .= '&#' . ord($email[$i]) . ';';
            } else {
                $result .= '&#x' . dechex(ord($email[$i])) . ';';
            }
        } else {
            $result .= $email[$i];
        }
    }

    return $result;
}

/**
 * Allows visitors to page forward/backwards in any direction within month view
 * an "infinite" number of times (ie, outwith the populated range of months).
 */
if ( class_exists( 'Tribe__Events__Main' ) ) {
	class ContinualMonthViewPagination {
	    public function __construct() {
	        add_filter( 'tribe_events_the_next_month_link', array( $this, 'next_month' ) );
	        add_filter( 'tribe_events_the_previous_month_link', array( $this, 'previous_month' ) );
	    }
	    public function next_month() {
	        $url = tribe_get_next_month_link();
	        $text = tribe_get_next_month_text();
	        $date = Tribe__Events__Main::instance()->nextMonth( tribe_get_month_view_date() );
	        return '<a data-month="' . $date . '" href="' . $url . '" rel="next">' . $text . ' <span>&raquo;</span></a>';
	    }
	    public function previous_month() {
	        $url = tribe_get_previous_month_link();
	        $text = tribe_get_previous_month_text();
	        $date = Tribe__Events__Main::instance()->previousMonth( tribe_get_month_view_date() );
	        return '<a data-month="' . $date . '" href="' . $url . '" rel="prev"><span>&laquo;</span> ' . $text . ' </a>';
	    }
	}
	new ContinualMonthViewPagination;
}
