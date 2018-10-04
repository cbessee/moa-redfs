<?php

	// Change products per page
	function vorosa_woocommerce_change_per_page() {
		$vorosa_opt = vorosa_get_opt();
		return $vorosa_opt['product_per_page'];
	}
	add_filter( 'loop_shop_per_page', 'vorosa_woocommerce_change_per_page', 20 );

	// zoom_lense
	add_action('init','single_product_image_zoom_lense');
	function single_product_image_zoom_lense(){
		$vorosa_opt = vorosa_get_opt();
		if($vorosa_opt['vorosa_shop_single_page_gallery_zoom_lense'] == 1){
			add_theme_support( 'wc-product-gallery-zoom' );
		}
	}
	
	// light_box
	add_action('init','single_product_image_light_box');
	function single_product_image_light_box(){
		$vorosa_opt = vorosa_get_opt();
		if($vorosa_opt['vorosa_shop_single_page_gallery_light_box'] == 1){
			add_theme_support( 'wc-product-gallery-lightbox' );
		}

	}

	
	add_theme_support( 'wc-product-gallery-slider' );
 
	add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_add_to_cart',11);

	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',8);

	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',9);
	
	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);

// Single product
 add_action('woocommerce_before_shop_loop_item','vorosa_single_product_start',9);
 add_action('woocommerce_after_shop_loop_item','vorosa_single_product_end',11);

//single product start
 function vorosa_single_product_start(){
	 echo '<div class="single-product">';
 }
 //single product end
 function vorosa_single_product_end(){
	 echo '</div>';
 }
 
 
 //single product image
 add_action('woocommerce_before_shop_loop_item_title','vorosa_single_product_image_start',9);
 add_action('woocommerce_before_shop_loop_item_title','vorosa_single_product_image_end',11);
 
 function vorosa_single_product_image_start(){
	echo '<div class="single-product-image">';
 }
 
 function vorosa_single_product_image_end(){
	echo '</div>';
 }
 
 //single product title
 add_action('woocommerce_shop_loop_item_title','vorosa_single_product_title_start',9);
 add_action('woocommerce_after_shop_loop_item_title','vorosa_single_product_title_end',11);
 
 function vorosa_single_product_title_start(){
	 echo '<div class="single-product-title">';
 }
 
 function vorosa_single_product_title_end(){
	 echo '</div>';
 }
 
 
  /*---woocommerce checkout---*/
 add_action('woocommerce_checkout_after_customer_details','vorosa_chckout_order_start',10);
 add_action('woocommerce_checkout_after_order_review','vorosa_chckout_order_end',15);
 
 function vorosa_chckout_order_start(){
	 echo ' <div class="checkout-order">';
 }

 function vorosa_chckout_order_end(){
	 echo '</div>';
 }
