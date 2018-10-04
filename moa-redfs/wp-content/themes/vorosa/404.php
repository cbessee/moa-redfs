<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vorosa
 */
$vorosa_opt = vorosa_get_opt();
get_header(); ?>
<div class="page-not-found-wrap">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="pnf-inner-wrap">
	                <div class="pnf-inner text-center">

	                	<?php if ( 'image' == $vorosa_opt['vorosa_404_control']): ?>
	                		<img src="<?php echo esc_url( $vorosa_opt['vorosa_404_img']['url']); ?>" alt="<?php echo esc_attr('Not Found'); ?>">
	                	<?php elseif('title' == $vorosa_opt['vorosa_404_control']): ?>
	                		<h1><?php echo esc_attr($vorosa_opt['vorosa_404_title']); ?></h1> 
	                	<?php else: ?>
	                		<h1><?php echo esc_html__('404','vorosa'); ?></h1>
	                	<?php endif; ?>
						
						<?php if($vorosa_opt['vorosa_404_subtitle']): ?>
	                    	<h2><?php echo esc_attr( $vorosa_opt['vorosa_404_subtitle'] ); ?></h2>
	                   	<?php else: ?>
	                   		<h2><?php echo esc_html__('PAGE NOT FOUND','vorosa'); ?></h2>
	                  	<?php endif; ?>

	                   <?php if($vorosa_opt['vorosa_404_info']): ?>
	                   	 <p><?php echo esc_attr($vorosa_opt['vorosa_404_info']); ?></p>
	                    <?php else: ?>
	                    	<p><?php echo esc_html__('The page you are looking for does not exist or has been moved.' , 'vorosa'); ?> </p>
	                    <?php endif; ?>

	                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">
	                    	<?php
		                    	if( $vorosa_opt['vorosa_button_text'] ){
		                    		echo esc_html( $vorosa_opt['vorosa_button_text'] );
		                    	} else {
		                    		echo esc_html__('Go back to Home Page' , 'vorosa');
		                    	}
	                    	?>
	                    </a>
	                </div>
                </div>
            </div>
		</div>
	</div>	
</div>
<?php
get_footer();
