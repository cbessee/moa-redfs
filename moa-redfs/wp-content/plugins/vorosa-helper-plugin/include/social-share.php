<?php

/*
***************************************************************
*  Social sharing icons
***************************************************************
*/

if ( ! function_exists('vorosa_sharing_icon_links') ) {

 function vorosa_sharing_icon_links( ) {

  global $post;

  $html = '<ul>';

   // facebook
   $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink();
   $html .= '<li><a href="'. esc_url( $facebook_url ) .'" target="_blank"><i class="fa fa-facebook"></i></a></li>';

   // twitter
   $twitter_url = 'https://twitter.com/share?'. esc_url(get_permalink()) .'&amp;text='. get_the_title();
   $html .= '<li><a href="'. esc_url( $twitter_url ) .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';

   // google plus
   $google_plus_url = 'https://plus.google.com/share?url='. esc_url(get_permalink());
   $html .= '<li><a href="'. esc_url( $google_plus_url ) .'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';

   // linkedin
   $linkedin_url = 'http://www.linkedin.com/shareArticle?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
   $html .= '<li><a href="'. esc_url( $linkedin_url ) .'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';

   // pinterest
   $pinterest_url = 'https://pinterest.com/pin/create/bookmarklet/?url='. esc_url(get_permalink()) .'&amp;description='. get_the_title() .'&amp;media='. esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID)) );
   $html .= '<li><a href="'. esc_url( $pinterest_url ) .'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';

   // tumblr
   $tumblr_url = 'http://www.tumblr.com/share/link?url='. urlencode( esc_url(get_permalink()) ) .'&amp;name='. urlencode( get_the_title() ) .'&amp;description='. urlencode( get_the_excerpt() );
   $html .= '<li><a href="'. esc_url( $tumblr_url ) .'" target="_blank"><i class="fa fa-tumblr"></i></a></li>';

   // reddit
   $reddit_url = 'http://reddit.com/submit?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
   $html .= '<li><a href="'. esc_url( $reddit_url ) .'" target="_blank"><i class="fa fa-reddit"></i></a></li>';

  $html .= '</ul>';
  echo ''. $html;

 }
}