<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vorosa
 */

	$vorosa_opt = vorosa_get_opt();
	$vorosa_blog_layout_opts = $blog_style = '' ;


	$vorosa_blog_style = isset($vorosa_opt['vorosa_blog_style']) ? $vorosa_opt['vorosa_blog_style'] : '';



	if (isset( $vorosa_blog_style ) && 'default' != $vorosa_blog_style ) {
		$blog_style = 'default-blog-grid masonry-blog-grid';
	} else {
		$blog_style = 'masonry-blog-grid';
	}





		if( isset ( $vorosa_opt ['vorosa_sidebarblog_pos'] ) ){
			$vorosa_blog_layout_opts = $vorosa_opt ['vorosa_sidebarblog_pos'];
		}
		
		if( $vorosa_blog_layout_opts == 'single'){
			if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();
		?>
		<!---full width-->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<?php get_template_part( 'template-parts/blog','layout' ); ?>
		</div>
		<?php	
		endwhile; /* End Loop */
		endif;
		}elseif( $vorosa_blog_layout_opts == 'twocolumn'){
	
		if ( have_posts() ) : ?>

		<div class="<?php echo esc_attr( $blog_style ); ?>">
		<?php /* Start the Loop */
		while ( have_posts() ) : the_post();
		?>
		<!---2 column width-->
		<div class="col-xs-12 col-sm-6">
			<?php get_template_part( 'template-parts/blog','layout' ); ?>
		</div>
		
		<?php endwhile; /* End Loop */ ?>
		</div>
		<?php endif; ?>
		<div class="clearfix"></div>
		<div class="col-xs-12 col-sm-12 text-center">
			<?php vorosa_blog_pagination(); ?>
		</div>
		<?php } elseif( $vorosa_blog_layout_opts == 'threecolumn' ){
		if ( have_posts() ) : ?>

		<div class="<?php echo esc_attr( $blog_style ); ?>">
			<?php /* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
			<!---3 column width-->
			<div class="col-xs-12 col-sm-6 <?php if ( !is_archive() ) {echo "col-md-4";} ?>">
				<?php get_template_part( 'template-parts/blog','layout' ); ?>
			</div>
			<?php  endwhile; /* End Loop */ ?>
		</div>
		<?php endif;
		?>
		<div class="clearfix"></div>
		<div class="col-xs-12 col-sm-12 text-center">
			<?php vorosa_blog_pagination(); ?>
		</div>
		<?php } elseif( $vorosa_blog_layout_opts == 'left'){ ?>
		<div class="col-xs-12 col-sm-8 pull-right">
			<?php
				if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
		
				get_template_part( 'template-parts/blog','layout' );
			
				endwhile;/* End Loop */
				endif;
			?>
			<div class="clearfix"></div>
			<div class="col-xs-12 col-sm-12 text-center">
				<?php vorosa_blog_pagination(); ?>
			</div>
		</div>
		<!---left sidebar-->
		<div class="col-xs-12 col-sm-4 mb-30">
			<?php get_sidebar('left'); ?>
		</div>		
		<?php } elseif( $vorosa_blog_layout_opts == 'right'){ ?>
		<div class="col-xs-12 col-sm-8">
			<?php
				if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
		
				get_template_part( 'template-parts/blog','layout' );
			
				endwhile;/* End Loop */
				endif;
			?>
			<div class="clearfix"></div>
			<div class="col-xs-12 col-sm-12 text-center">
				<?php vorosa_blog_pagination(); ?>
			</div>
		</div>
		<!---Right sidebar-->
		<div class="col-xs-12 col-sm-4 mb-30">
			<?php get_sidebar('left'); ?>
		</div>
		<?php } else{ ?>
			<!---right sidebar-->
			<div class="col-xs-12 col-sm-12">
			
				<div class="row <?php echo esc_attr( $blog_style ); ?>">
					<?php
					if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
					<div class="col-xs-12 col-sm-4">
						<?php get_template_part( 'template-parts/blog','layout' ); ?>
					</div>

					<?php 
					endwhile;/* End Loop */
					endif;
					?>
				</div>
				
				<div class="text-center">
					<?php vorosa_blog_pagination(); ?>
				</div>
			</div>
	<?php
	} ?>



