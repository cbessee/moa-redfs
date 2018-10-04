<?php 

/**
 * Add color styling from theme
 */
 
 if( !function_exists( 'vorosa_styles_method' ) ) {
function vorosa_styles_method() {
	$vorosa_opt = vorosa_get_opt();
    wp_enqueue_style(
        'vorosa-inline-style',
        get_template_directory_uri() . '/css/inline-style.css'
    );
	
	
	//metabox function
	//page padding
	$page_padding = get_post_meta( get_the_ID(),'_vorosa_page_padding', true );
	//page title color
	$page_title_color = get_post_meta( get_the_ID(),'_vorosa_page_title_color',true );


	$breadcrumb_bg_overlay_color = get_post_meta( get_the_ID(),'_vorosa_page_title_bg_overlay_color',true );
	$breadcrumb_overlay_opacity = get_post_meta( get_the_ID(),'_vorosa_page_title_overlay_opacity',true );


	$breadcrumb_bg_overlay_color_value = '';
	if(!empty( $breadcrumb_bg_overlay_color )){
			$breadcrumb_bg_overlay_color_value = $breadcrumb_bg_overlay_color;
	}else{
		if( isset($vorosa_opt['vorosa_breadcrumbs_overlay_color'] ) ){
		   $breadcrumb_bg_overlay_color_value = $vorosa_opt['vorosa_breadcrumbs_overlay_color'];
		}			
	}
	if(isset($breadcrumb_bg_overlay_color_value)){
		$breadcrumb_bg_overlay_color_value = 'section.breadcrumbs-area::before{background:'.$breadcrumb_bg_overlay_color_value.'none repeat scroll 0 0}';
	}
	
	
	$breadcrumb_overlay_opacity_value = '0.5';
	if($breadcrumb_overlay_opacity ){
		$breadcrumb_overlay_opacity_value = $breadcrumb_overlay_opacity;
	}else{
		if(isset($vorosa_opt['vorosa__breadcrumbs_overlay_color_opacity']) ? $vorosa_opt['vorosa__breadcrumbs_overlay_color_opacity'] : '' ){
		   $breadcrumb_overlay_opacity_value = $vorosa_opt['vorosa__breadcrumbs_overlay_color_opacity'];
		}			
	}
	if(!empty($breadcrumb_overlay_opacity_value)){
		$breadcrumb_overlay_opacity_value = 'section.breadcrumbs-area::before{opacity:'.$breadcrumb_overlay_opacity_value.'}';
	}

	//footer area overlay
	$footer_bg_overlay_color_value = '';
	if( isset($vorosa_opt['vorosa_footer_overlay_color'] ) ){
		$footer_bg_overlay_color_value = $vorosa_opt['vorosa_footer_overlay_color'];
	}
	if(!empty($footer_bg_overlay_color_value)){
		$footer_bg_overlay_color_value = '.footer-top-area::before{background:'.$footer_bg_overlay_color_value.' none repeat scroll 0 0}';
	}
	//footer area opacity
	$footer_overlay_color_opacity = '';
	if( isset($vorosa_opt['vorosa_footer_overlay_color_opacity'] ) ){
		$footer_overlay_color_opacity = $vorosa_opt['vorosa_footer_overlay_color_opacity'];
	}
	if(!empty($footer_overlay_color_opacity)){
		$footer_overlay_color_opacity = '.footer-top-area::before{opacity:'.$footer_overlay_color_opacity.'}';
	}



	//page title font size
	$page_title_font_size = get_post_meta( get_the_ID(),'_vorosa_page_title_font_sizes',true );
	//breadcrumb padding top
	$breadcrumb_padding_top = get_post_meta( get_the_ID(),'_vorosa_breadcrumb_padding_top',true );
	//breadcrumb padding bottom
	$breadcrumb_padding_bottom = get_post_meta( get_the_ID(),'_vorosa_breadcrumb_padding_bottom',true );

	//breadcrumb padding top
	$breadcrumb_padding_top_value ='';
	if(!empty($breadcrumb_padding_top)){
			$breadcrumb_padding_top_value = $breadcrumb_padding_top;
	}else{
		if(isset($vorosa_opt['vorosa_breadcrumb_lg_height']) ){
		   $breadcrumb_padding_top = $vorosa_opt['vorosa_breadcrumb_lg_height'];
		   $breadcrumb_padding_top_value = $breadcrumb_padding_top['padding-top'];
		}			
	}
	if(!empty($breadcrumb_padding_top_value)){
		$breadcrumb_padding_top_value = '.breadcrumbs-area{padding-top:'.$breadcrumb_padding_top_value.'}';
	}
	//breadcrumb padding bottom
	$breadcrumb_padding_bottom_value = '';
	if(!empty($breadcrumb_padding_bottom)){
			$breadcrumb_padding_bottom_value = $breadcrumb_padding_bottom;
	}else{
		if(isset($vorosa_opt['vorosa_breadcrumb_lg_height']) ){
		   $breadcrumb_padding_bottom = $vorosa_opt['vorosa_breadcrumb_lg_height'];
		   $breadcrumb_padding_bottom_value = $breadcrumb_padding_bottom['padding-bottom'];
		}			
	}
	if(!empty($breadcrumb_padding_bottom_value)){
		$breadcrumb_padding_bottom_value = '.breadcrumbs-area{padding-bottom:'.$breadcrumb_padding_bottom_value.'}';
	}
	//page title color
	if(!empty($page_title_color)){
			$page_title_color= '.breadcrumbs-area .breadcrumbs h2.page-title{color:'.$page_title_color.' !important;}';
	}	
	//page title font
	if(!empty($page_title_font_size)){
		$page_title_font_size = '.breadcrumbs-area .breadcrumbs h2.page-title{font-size:'.$page_title_font_size.' !important;}';
	}

	 //container width
		$container_width='';
		if(isset($vorosa_opt['vorosa_layout_page'])){
		   $container_width = $vorosa_opt['vorosa_layout_page'];
		}
		if(!empty($container_width)){
			$container_width = '.wide-layout .container{width:'.$container_width.'px; }';
		}


	 //container width
		$boxlayout_box_width='';
		$boxlayout_container_width ='';
		if(isset($vorosa_opt['vorosa_boxlayout_box_width'])){
		   $boxlayout_box_width = $vorosa_opt['vorosa_boxlayout_box_width'];
		   $boxlayout_container_width = $boxlayout_box_width;	
		}
		if(!empty($boxlayout_box_width)){
			$boxlayout_box_width = '.site-wrapper.boxed-layout, .boxed-layout .sticky{max-width:'.$boxlayout_box_width.'px}';
		}
		if(!empty($boxlayout_container_width)){
			$boxlayout_container_width = '.site-wrapper.boxed-layout .container, 
			.boxed-layout .sticky .container{width: calc('.$boxlayout_container_width.'px - 30px)}';
		}

		//scroll button bg
		$scroll_bg = '';
		if(isset($vorosa_opt['vorosa_scroll_button_color'])){
		   $scroll_bg = $vorosa_opt['vorosa_scroll_button_color'];
		}
		if(!empty($scroll_bg)){
			$scroll_bg = 'a#scrollUp{background-color:'.$scroll_bg.'; border-color:'.$scroll_bg.'}';
		}


	//pgination bg color
	$pagination_bg='';
	if(isset($vorosa_opt['vorosa_blog_pagination_color'])){
	  $pagination_bg = $vorosa_opt['vorosa_blog_pagination_color'];
	}
	if(!empty($pagination_bg)){
		$pagination_bg ='.post-pagination ul li:hover a,.post-pagination ul li .current{background:'.$pagination_bg.';border-color:'.$pagination_bg.'}';
	}
	//header top text hover
	$headerText_hover='';
	if(isset($vorosa_opt['vorosa_top_link_colors_hover']) ){
	   $headerText_hover = $vorosa_opt['vorosa_top_link_colors_hover'];
	}
	if(!empty($headerText_hover)){
		$headerText_hover = '.top-bar-left-menu ul li a:hover{color:'.$headerText_hover.'}';
	}
	
	//main menu font hover
	$submenu_hover='';
	if(isset($vorosa_opt['vorosa_submenu_hover_colors']) ){
	   $submenu_hover = $vorosa_opt['vorosa_submenu_hover_colors'];
	}
	if(!empty($submenu_hover)){
		$submenu_hover = '.main-menu .menu li .sub-menu li a:hover{color:'.$submenu_hover.'}';
	}
	//main menu font hover
	$menu_hover='';
	if(isset($vorosa_opt['vorosa_menu_hover_colors']) ){
	   $menu_hover = $vorosa_opt['vorosa_menu_hover_colors'];
	}
	if(!empty($menu_hover)){
		$menu_hover = '.main-menu .menu li a:hover, .main-menu .menu li.current_page_item a{color:'.$menu_hover.'}';
	}
	//main menu padding
	$menu_item_spacing='';
	if(isset($vorosa_opt['vorosa_menu_item_spacing'])){
	   $menu_item_spacing = $vorosa_opt['vorosa_menu_item_spacing'];
	}
	if(!empty($menu_item_spacing)){
		$menu_item_spacing = '.primary-nav-wrap ul li + li,.menu > nav > ul > li{margin-left:'.$menu_item_spacing.'px}';
	}
	  //dorpdown menu
	  $dropdown_width='';
	  if(isset($vorosa_opt['vorosa_menu_dropdownwidth']) ){
		$dropdown_width = $vorosa_opt['vorosa_menu_dropdownwidth'];
	  }
	if(!empty($dropdown_width)){
		$dropdown_width = '.primary-nav-wrap .sub-menu{width:'.$dropdown_width.'px;}';
	}
	
	//dorpdown menu bg
	$dropdown_bg='';
	if(isset($vorosa_opt['vorosa_submenu_background_color']) ){
	   $dropdown_bg = $vorosa_opt['vorosa_submenu_background_color'];
	}	
	if(!empty($dropdown_bg)){
		$dropdown_bg = '.primary-nav-wrap .sub-menu{background-color:'.$dropdown_bg.'}';
	}
	  
	//dorpdown menu padding
	$dropdown_padding='';
	if(isset($vorosa_opt['vorosa_dropdown_item_padding'])){
		$dropdown_padding = $vorosa_opt['vorosa_dropdown_item_padding'];
	}
	if(!empty($dropdown_padding)){
		$dropdown_padding = '.primary-nav-wrap .sub-menu  li > a{height:'.$dropdown_padding.'px; line-height:'.$dropdown_padding.'px}';
	}	
	   //breadcrumbs font size
	  $breadcrumb_font ='';
	  if(isset($vorosa_opt['vorosa_breadcrumbs_font_size']) ){
	   $breadcrumb_font = $vorosa_opt['vorosa_breadcrumbs_font_size'];
	  }
	  if(!empty($breadcrumb_font)){
		$breadcrumb_font = '.breadcrumbs ul, .breadcrumbs ul li a, .breadcrumbs ul li{font-size:'.$breadcrumb_font.'px}';
	  }
	   //breadcrumbs font size
	  $breadcrumb_font_hover ='';
	  if(isset($vorosa_opt['vorosa_breadcrumbs_text_hover_blog']) ){
	   $breadcrumb_font_hover = $vorosa_opt['vorosa_breadcrumbs_text_hover_blog'];
	  }
	  if(!empty($breadcrumb_font_hover)){
		$breadcrumb_font_hover = '.breadcrumbs ul li a:hover{color:'.$breadcrumb_font_hover.'}';
	  }

	   //breadcrumbs Mobile Height
	  $vorosa_breadcrumbs_mobile_height_value ='';
	  $vorosa_breadcrumbs_mobile_padding_top = '';
	  $vorosa_breadcrumbs_mobile_padding_bottom = '';
	  if(isset($vorosa_opt['vorosa_breadcrumbs_mobile_height']) ){
	   $vorosa_breadcrumbs_mobile_height_value = $vorosa_opt['vorosa_breadcrumbs_mobile_height'];
	   $vorosa_breadcrumbs_mobile_padding_top = $vorosa_breadcrumbs_mobile_height_value['padding-top'];
	   $vorosa_breadcrumbs_mobile_padding_bottom = $vorosa_breadcrumbs_mobile_height_value['padding-bottom'];
	  }	
	  if(!empty($vorosa_breadcrumbs_mobile_padding_top)){
		  $vorosa_breadcrumbs_mobile_padding_top = '.breadcrumbs-area{padding-top:'.$vorosa_breadcrumbs_mobile_padding_top.'px}';
		  
	  }
	  if(!empty($vorosa_breadcrumbs_mobile_padding_bottom)){
		 $vorosa_breadcrumbs_mobile_padding_bottom = '.breadcrumbs-area{padding-bottom:'.$vorosa_breadcrumbs_mobile_padding_bottom.'px}'; 
	  }


	//blog banner text color
	$vorosa_post_banner_position='';
	if(isset($vorosa_opt['vorosa_bolg_title_position']) ){
	   $vorosa_post_banner_position = $vorosa_opt['vorosa_bolg_title_position'];
	}
	if(!empty($vorosa_post_banner_position)){
		$vorosa_post_banner_position ='.breadcrumb-text{text-align:'.$vorosa_post_banner_position.'}';
	}

	//page padding
	$page_padding_value = '';
	if( isset( $page_padding ) ){
		$page_padding_value = '.page-area{padding:'.$page_padding.'px 0}'; 
	}
	 	
		 		
	//breadcrumbs font
	$breadcrumb_color ='';
	if(isset($vorosa_opt['vorosa_breadcrumbs_font_blog']) ){
		$breadcrumb_color = $vorosa_opt['vorosa_breadcrumbs_font_blog'];
	}
	if(!empty($breadcrumb_color)){
		$breadcrumb_color = '.breadcrumbs ul, .breadcrumbs ul li a, .breadcrumbs ul li{color:'.$breadcrumb_color.'}';
	}

	// Footer Bg
	$footer_bg_styles = '';
	if (isset($vorosa_opt['vorosa_footer_bg_color']) && $vorosa_opt['vorosa_footer_bg_color']) {
		$vorosa_footer_bg_options = $vorosa_opt['vorosa_footer_bg_color'];

		if($vorosa_footer_bg_options['background-color']){
			$footer_bg_styles .= "background-color:{$vorosa_footer_bg_options['background-color']};";
		}

		if(isset($vorosa_footer_bg_options['background-repeat']) ? $vorosa_footer_bg_options['background-repeat'] : ''){
			$footer_bg_styles .= "background-repeat:{$vorosa_footer_bg_options['background-repeat']};";
		}

		if(isset($vorosa_footer_bg_options['background-size']) ? $vorosa_footer_bg_options['background-size'] : ''){
			$footer_bg_styles .= "background-size:{$vorosa_footer_bg_options['background-size']};";
		}

		if(isset($vorosa_footer_bg_options['background-attachment']) ? $vorosa_footer_bg_options['background-attachment'] : ''){
			$footer_bg_styles .= "background-attachment:{$vorosa_footer_bg_options['background-attachment']};";
		}

		if(isset($vorosa_footer_bg_options['background-position']) ? $vorosa_footer_bg_options['background-position'] : ''){
			$footer_bg_styles .= "background-position:{$vorosa_footer_bg_options['background-position']};";
		}

		if(isset($vorosa_footer_bg_options['background-image']) ? $vorosa_footer_bg_options['background-image'] : ''){
			$footer_bg_styles .= "background-image: url('{$vorosa_footer_bg_options['background-image']}');";
		}
	}

	$footer_style_css='';
	if(!empty($footer_bg_styles)){
		$footer_style_css = '.footer-top-area{'.$footer_bg_styles.'}';
	}

	// Copyright Background

	$copyright_bg_styles = '';
	if (isset($vorosa_opt['vorosa_copyrightbg_color']) && $vorosa_opt['vorosa_copyrightbg_color']) {
		$vorosa_copyright_bg_options = $vorosa_opt['vorosa_copyrightbg_color'];

		if($vorosa_footer_bg_options['background-color']){
			$copyright_bg_styles .= "background-color:{$vorosa_copyright_bg_options['background-color']};";
		}
	}
	
	$footer_copyright_style_css='';
	if(!empty($copyright_bg_styles)){
		$footer_copyright_style_css = '.footer-bottom{'.$copyright_bg_styles.'}';
	}



        $custom_css = "
			$container_width
			$boxlayout_box_width
			$boxlayout_container_width
			$scroll_bg
			$page_title_color
			$page_title_font_size
			$breadcrumb_padding_top_value
			$breadcrumb_padding_bottom_value
			$breadcrumb_bg_overlay_color_value
			$breadcrumb_overlay_opacity_value
			$vorosa_post_banner_position
			$breadcrumb_color
			$breadcrumb_font
			$breadcrumb_font_hover
			$pagination_bg
			$headerText_hover
			$menu_item_spacing
			$menu_hover
			$dropdown_width
			$dropdown_bg
			$dropdown_padding
			$submenu_hover
			$page_padding_value
			$footer_bg_overlay_color_value
			$footer_overlay_color_opacity
			$footer_style_css
			$footer_copyright_style_css
			
			@media (max-width: 767px) {
				$vorosa_breadcrumbs_mobile_padding_top
				$vorosa_breadcrumbs_mobile_padding_bottom
			}
 

			";
	
        wp_add_inline_style( 'vorosa-inline-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'vorosa_styles_method',200 );