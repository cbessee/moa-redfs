<?php
/**
 * vorosa_ Breadcrumbs
 * Since ver 1.0
 * Add this to any template file by calling vorosa__breadcrumbs()
 */

 if(!function_exists('vorosa__breadcrumbs')){

	function vorosa__breadcrumbs(){

		$vorosa_opt = vorosa_get_opt();
		$breadcrumbs_separator = '';
		$breadcrumbs_separator = isset($vorosa_opt['vorosa__breadcrumbs_separator']) ? $vorosa_opt['vorosa__breadcrumbs_separator'] : '';
		if($breadcrumbs_separator){
			$breadcrumbs_separator =  $breadcrumbs_separator;
		}else{
			$breadcrumbs_separator = "/";
		}

		$breadcrumbs_cat = isset($vorosa_opt['vorosa__breadcrumbs_post_cat']) ? $vorosa_opt['vorosa__breadcrumbs_post_cat'] : '';

	  /* === OPTIONS === */
		$text['home']     = 'Home'; // text for the 'Home' link
		$text['category'] = 'Archive by Category "%s"'; // text for a category page
		$text['tax'] 	  = 'Archive for "%s"'; // text for a taxonomy page
		$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
		$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
		$text['author']   = 'Articles Posted by %s'; // text for an author page
		$text['404']      = 'Error 404'; // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter   = '<li>'.$breadcrumbs_separator.'</li>'; // delimiter between crumbs
		$before      = '<li>'; // tag before the current crumb
		$after       = '</li>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$show = 'url';
		$homeLink = get_bloginfo( $show ) . '/';
		$linkBefore = '<li>';
		$linkAfter = '</li>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
		if (is_home() || is_front_page()) {
			if ($showOnHome == 1) echo '<ul><a href="' . $homeLink . '">' . $text['home'] . '</a></ul>';
		} else {
			echo '<ul xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;	
			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					if($breadcrumbs_cat){ echo wp_kses_post( $cats );}
					
				}
				echo wp_kses_post( $before ) . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo wp_kses_post( $before ) . sprintf($text['search'], get_search_query()) . $after;
			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo wp_kses_post( $before ) . get_the_time('d') . $after;
			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo wp_kses_post( $before ) . get_the_time('F') . $after;
			} elseif ( is_year() ) {
				echo wp_kses_post( $before ) . get_the_time('Y') . $after;
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($showCurrent == 1) echo wp_kses_post( $delimiter ) . wp_kses_post( $before ) . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					if($breadcrumbs_cat){ echo wp_kses_post( $cats );}
					if ($showCurrent == 1) echo wp_kses_post( $before ) . get_the_title() . $after;
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo wp_kses_post( $before ) . $post_type->labels->singular_name . $after;
			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				if($breadcrumbs_cat){ echo wp_kses_post( $cats );}
				printf($link, get_permalink($parent), $parent->post_title);
				if ($showCurrent == 1) echo wp_kses_post( $delimiter ) . wp_kses_post( $before ) . get_the_title() . $after;
			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo wp_kses_post( $before ) . get_the_title() . $after;
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo wp_kses_post( $breadcrumbs[$i] );
					if ($i != count($breadcrumbs)-1) echo wp_kses_post( $delimiter );
				}
				if ($showCurrent == 1) echo wp_kses_post( $delimiter ) . wp_kses_post( $before ) . get_the_title() . $after;
			} elseif ( is_tag() ) {
				echo wp_kses_post( $before ) . sprintf($text['tag'], single_tag_title('', false)) . $after;
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo wp_kses_post( $before ) . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo wp_kses_post( $before ) . $text['404'] . $after;
			}
		
			echo '</ul>';
		}
	} // end vorosa__breadcrumbs()
 }