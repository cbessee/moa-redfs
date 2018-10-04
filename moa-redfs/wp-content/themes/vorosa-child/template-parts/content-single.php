<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vorosa
 */
 while ( have_posts() ) : the_post(); 
$vorosa_opt = vorosa_get_opt();
$vorosa_blog_details_social_share = '';
$vorosa_blog_details_show_title = '';
$vorosa_blog_details_show_meta = '';
$vorosa_blog_details_post_navigation = '';
$vorosa_blog_details_show_author_info = '';
$vorosa_blog_details_show_related_post = '';
$vorosa_blog_details_no_of_column_related_post = '';
$vorosa_blog_details_no_of_column_related_post = '';
$vorosa_blog_details_no_of_item_per_page = '';
$vorosa_blog_details_related_post_title = '';
if( isset ( $vorosa_opt ['vorosa_blog_details_social_share'] ) ){
    $vorosa_blog_details_social_share = $vorosa_opt ['vorosa_blog_details_social_share'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_show_title'] ) ){
    $vorosa_blog_details_show_title = $vorosa_opt ['vorosa_blog_details_show_title'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_show_meta'] ) ){
    $vorosa_blog_details_show_meta = $vorosa_opt ['vorosa_blog_details_show_meta'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_post_navigation'] ) ){
    $vorosa_blog_details_post_navigation = $vorosa_opt ['vorosa_blog_details_post_navigation'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_show_author_info'] ) ){
    $vorosa_blog_details_show_author_info = $vorosa_opt ['vorosa_blog_details_show_author_info'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_show_related_post'] ) ){
    $vorosa_blog_details_show_related_post = $vorosa_opt ['vorosa_blog_details_show_related_post'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_no_of_column_related_post'] ) ){
    $vorosa_blog_details_no_of_column_related_post = $vorosa_opt ['vorosa_blog_details_no_of_column_related_post'];
}
$vorosa_blog_details_no_of_column_related_post_value = ( !empty( $vorosa_blog_details_no_of_column_related_post ) ) ? $vorosa_blog_details_no_of_column_related_post : '4' ;
if( isset ( $vorosa_opt ['vorosa_blog_details_no_of_item_per_page'] ) ){
    $vorosa_blog_details_no_of_item_per_page = $vorosa_opt ['vorosa_blog_details_no_of_item_per_page'];
}
if( isset ( $vorosa_opt ['vorosa_blog_details_related_post_title'] ) ){
    $vorosa_blog_details_related_post_title = $vorosa_opt ['vorosa_blog_details_related_post_title'];
}
?>
    <div class="blog-wrapper">
        <!-- Start Title  -->
        <?php if ( true == $vorosa_blog_details_show_title || true == $vorosa_blog_details_show_meta): ?>
            <div class="blog-title">
                <?php if ( true == $vorosa_blog_details_show_title): ?>
                    <h3><?php the_title(); ?></h3>
                <?php endif ?>
                <?php if ( true == $vorosa_blog_details_show_meta): ?>
                    <div class="blog-meta">
                        <span class="date"><?php the_time('F j, Y'); ?></span> /
                        <span class="workstation"><?php the_category( ', ' ); ?></span>
                    </div>
                <?php endif ?> 
            </div>
        <?php endif ?>
        <!-- End Title  -->
        <!-- Start Thumbnail  -->
        <?php 
        if ( has_post_thumbnail() ) { ?>
		    <div class="blog-slider">
	            <div class="blog-gallery-img">
	                <?php the_post_thumbnail(); ?>
	            </div>
	        </div>
		<?php } ?>
        <!-- End Thumbnail  -->
        <!-- Start info  -->
        <div class="blog-info story-hbtitle">
            <?php the_content(); 
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'vorosa' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'vorosa' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
            ?>
            <?php if(is_singular('post')) { ?>
                <div class="user-info clear">
                    <div class="user-text">
                        <span class="user-name"><?php echo esc_html__('By :', 'vorosa' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
                        <span><?php comments_popup_link( esc_html__('No Comment','vorosa'), esc_html__('1 Comment','vorosa'), esc_html__('% Comments','vorosa'), 'post-comment', esc_html__('Comments off','vorosa') ); ?></span>
                    </div>	
                    <?php if ( true == $vorosa_blog_details_social_share && function_exists('vorosa_sharing_icon_links') ) { ?>
                        <div class="user-share">
                            <span><?php echo esc_html__('Share:', 'vorosa'); ?></span>
                            <?php vorosa_sharing_icon_links();?>
                        </div>
                    <?php } ?>
                </div>
                <?php if ( true == $vorosa_blog_details_post_navigation ) { ?>
                <div class="next-prev">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    if (!empty( $prev_post )): ?>
                    <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="prev-btn" ><i class="fa fa-angle-left"></i><?php echo esc_html__('prev post', 'vorosa' ); ?></a>
                    <?php endif ?>
                    <?php
                    if (!empty( $next_post )): ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="next-btn"><?php echo esc_html__( 'next post', 'vorosa' ); ?><i class="fa fa-angle-right"></i></a>
                    <?php endif; ?>
                </div> 
                <?php } ?>
            <?php } ?>
        </div>
        <!-- End info  -->
        <?php if(is_singular('post')) { ?>
		<?php 
            if ( true == $vorosa_blog_details_show_author_info ) {
               if ( '' !== get_the_author_meta( 'description' ) ) {
                    get_template_part( 'template-parts/biography' );
                } 
            }
        ?>
        <?php if ( true == $vorosa_blog_details_show_related_post ) { ?>
            <div class="related-post">
                <h3 class="sidebar-title related-post-title"><?php echo esc_html( $vorosa_blog_details_related_post_title ); ?></h3>
                <div class="row">
                    <?php
                        $related = get_posts( array( 
                            'category__in' => wp_get_post_categories($post->ID),
                            'numberposts' => $vorosa_blog_details_no_of_item_per_page,
                            'post_type' => 'post', 
                            'post__not_in' => array($post->ID) 
                        ) );
                        if( $related ) foreach( $related as $post ) { 
                        setup_postdata($post); ?>
                        <div class="col-sm-<?php echo esc_attr( $vorosa_blog_details_no_of_column_related_post_value ); ?>">
                            <div class="single-related-post mrg-btm">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>"> 
                                <?php the_post_thumbnail('vorosa_related_post_img_size');  ?> 
                                </a> 
                            <?php endif; ?>
                                <div class="related-post-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <span><?php the_time('F j, Y') ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } wp_reset_postdata(); ?> 
                </div>
            </div>
       <?php } ?>
       <?php 
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
        ?>
        <?php } ?>
    </div>
	<?php endwhile; // End of the loop.

?>