<?php 

	$vorosa_opt = vorosa_get_opt();

	$column = '';
	if($vorosa_opt['vorosa_copyright_column']== '1'){
		$column = 12 .' text-center';
	}elseif($vorosa_opt['vorosa_copyright_column']== '3'){
		$column = 4;
	}else{
		$column = 6;
	}

?>

<div class="col-sm-<?php echo esc_attr( $column ); ?> col-xs-12">
	<div class="copyright-text">
		<p><?php 
			$vorosa_opt = vorosa_get_opt();

			if(isset( $vorosa_opt['vorosa_copyright'] ) && $vorosa_opt['vorosa_copyright']!=='' ){
				echo wp_kses( $vorosa_opt['vorosa_copyright'] , array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array(),
					'img' => array(
						'src' => array(),
						'alt' => array()
					),
				));
			}else{  
				esc_html_e('Copyright', 'vorosa'); ?>&copy; <?php echo date("Y").' '.get_bloginfo('name');  esc_html_e(' All Rights Reserved.', 'vorosa' ); 
			}

		?></p>
	</div>
</div>