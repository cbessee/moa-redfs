<?php
/**
 * The template for displaying Comments.
 *
 *
 * @package Aedificator
 */
?>
<?php if ( ! post_password_required() ) { ?>
<div class="comments comment-form-container">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php _e( 'Comments are currently closed.', 'aedificator' ); ?></p><?php endif; ?>
	<?php if ($comments) : ?>
		<h3>
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'aedificator' ), get_the_title() );
				} else {
					printf(
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'aedificator'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>
		<ul class="commentlist">
		    <?php wp_list_comments(); ?>
		</ul>
	<?php endif; ?>
	<p><?php paginate_comments_links(); ?></p>
	<?php comment_form(); ?>
</div>
<?php } ?>
