<?php
/**
 * The template part for displaying an Author biography
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vorosa
 */


$author_info = get_userdata(get_the_author_meta( 'ID' ));
$author_role = implode(', ', $author_info->roles);

?>



<div class="author author-box">
	<div class="author-img">
	    <?php 
	    	$ht_author_bio_avatar_size = apply_filters( 'ht_author_bio_avatar_size', 120 );
			echo get_avatar( get_the_author_meta( 'user_email' ), $ht_author_bio_avatar_size );
	    ?>
	</div>
	<div class="author-info">
	    <h4>
	        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php echo get_the_author(); ?> <span>(<?php echo esc_attr($author_role ); ?>)</span></a>
	    </h4>
	    <p><?php the_author_meta( 'user_description' ); ?></p>
	</div>
</div>
