<?php
function vorosa_import_files() {
  return array(
    array(
      'import_file_name'           => 'Standard Demo',
      'local_import_file'            => get_stylesheet_directory() . '/inc/demo-importer/default/vorosa.xml',
      'local_import_widget_file'     => get_stylesheet_directory() . '/inc/demo-importer/default/vorosa-wid.wie',
      'local_import_customizer_file' => get_stylesheet_directory() . '/inc/demo-importer/default/vorosa-export.dat',
        'local_import_redux'           => array(
          array(
            'file_path'   => trailingslashit( get_template_directory() ) . '/inc/demo-importer/default/redux_options_vorosa.json',
            'option_name' => 'vorosa_opt',
          ),
        ),
        'import_preview_image_url'     => get_template_directory_uri() .'/screenshot.png',
        'import_notice'                => __( 'After you import this demo, you will have setup all content.', 'vorosa' ),
    ),
    array(
      'import_file_name'           => 'Comming Soon',
      'local_import_file'            => get_stylesheet_directory() . '/inc/demo-importer/default/vorosa.xml',
      'import_widget_file_url'     => get_stylesheet_directory() . '/inc/demo-importer/default/vorosa-wid.wie',
      'local_import_customizer_file' => get_stylesheet_directory() . '/inc/demo-importer/default/vorosa-export.dat',
      'local_import_customizer_file' => get_stylesheet_directory() . '/inc/demo-importer/default/redux_options_vorosa.json',
      
      ),
      'import_preview_image_url'     => get_stylesheet_directory_uri().'/inc/demo-importer/img/1.jpg',
    );


////////////////////////////////////////////////////////////////////
 
}
add_filter( 'pt-ocdi/import_files', 'vorosa_import_files' );

function vorosa_after_import_setup() {
    // Assign menus to their locations.
    $header_menu = get_term_by( 'name', 'main-menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations' , array( 
				'primary' => $header_menu->term_id,
			  
             ) 
        );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'vorosa_after_import_setup' );