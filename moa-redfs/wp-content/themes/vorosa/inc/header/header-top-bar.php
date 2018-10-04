<?php 
/*
 * vorosa Main menu
 * Author: Grand-Themes
 * Author URI: http://wphash.com/
 * Version: 1.0.0
 * ======================================================
 */

$vorosa_opt = vorosa_get_opt(); 

   $topbar_widht = $vorosa_opt['vorosa_header_top_width'];
        if( isset( $topbar_widht ) && true == $topbar_widht ){
            $topbar_widht = 'container-fluid';
        }else {
            $topbar_widht = 'container';
    }

?>

    <div class="header-top-area">
        <div class="<?php echo esc_attr( $topbar_widht ); ?>">
            <div class="row">
                <div class="header-top-bar">
                    <div class="col-md-6 col-sm-6">
                    <?php                       
                        if( $vorosa_opt['vorosa_left_content_section'] == '1'){
                            ?>
                            <div class="header-social">
                                <ul>
                                   <?php  
                                        foreach($vorosa_opt['vorosa_social_icons'] as $key=>$value ) { 
                                         if($value!=''){
                                            if($key=='vimeo'){
                                             echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
                                            } else {
                                             echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
                                            }
                                           }
                                        } 
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }elseif( $vorosa_opt['vorosa_left_content_section'] == '2'){
                            ?>
                            <div class="top-bar-left-menu">
                                <?php 
                                    wp_nav_menu(array(
                                        'theme_location' => 'left-menu',
                                        'container'      => false,
                                    ));
                                ?>
                            </div>
                            <?php
                        }elseif( $vorosa_opt['vorosa_left_content_section'] == '4'){
                            ?>                              
                            <div class="top-bar-left-content">
                                <p>
                                    <?php if( isset($vorosa_opt['vorosa_left_text_area']) && $vorosa_opt['vorosa_left_text_area']!='' ) {
                                        echo wp_kses($vorosa_opt['vorosa_left_text_area'], array(
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
                                            esc_html_e('Lorem ipsum dolor sit amet', 'vorosa');
                                        }
                                    ?>
                                </p>
                            </div>                              
                            <?php
                        }elseif( $vorosa_opt['vorosa_left_content_section'] == '5'){
                        }else{
                            ?>
                            <div class="header-info">
                                <?php if( !empty( $vorosa_opt['vorosa_left_contact_email'] ) ): ?>
                                <span class="mail-us"><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html( $vorosa_opt['vorosa_left_contact_email'] ); ?>" target="_top">  <?php echo esc_html( $vorosa_opt['vorosa_left_contact_email'] ); ?></a></span>
                                    
                                <?php endif; if( !empty($vorosa_opt['vorosa_left_contact_info'] ) ): ?>
                                    <span><i class="fa fa-phone"></i><a href="tel:<?php echo esc_html( $vorosa_opt['vorosa_left_contact_info'] ); ?>">  <?php echo esc_html( $vorosa_opt['vorosa_left_contact_info'] ); ?></a></span>
                                <?php endif; ?>
                            </div>
                        <?php
                        }
                    ?>
                    </div> 
                    <div class="col-md-6 col-sm-6">
                    <?php $vorosa_opt = vorosa_get_opt();
                        if( $vorosa_opt['vorosa_right_contactinfo'] == '1'){
                            ?>
                            <div class="header-social text-right">
                                <ul>
                                   <?php 
                                        foreach($vorosa_opt['vorosa_social_icons'] as $key=>$value ) { 
                                         if($value!=''){
                                            if($key=='vimeo'){
                                             echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
                                            } else {
                                             echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
                                            }
                                           }
                                        } 
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }elseif( $vorosa_opt['vorosa_right_contactinfo'] == '2'){
                            ?>
                            <div class="top-bar-left-menu text-right">
                                <?php 
                                    wp_nav_menu(array(
                                        'theme_location' => 'right-menu',
                                    ));
                                ?>
                            </div>
                            <?php
                        }elseif( $vorosa_opt['vorosa_right_contactinfo'] == '4'){
                            ?>                              
                            <div class="top-bar-left-content text-right">
                                <p>
                                    <?php if( isset($vorosa_opt['vorosa_right_text_area']) && $vorosa_opt['vorosa_right_text_area']!='' ) {
                                        echo wp_kses($vorosa_opt['vorosa_right_text_area'], array(
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
                                            esc_html_e('Lorem ipsum dolor sit amet', 'vorosa');
                                        }
                                    ?>
                                    </p>
                            </div>                              
                            <?php
                        }elseif( $vorosa_opt['vorosa_right_contactinfo'] == '5'){
                        }else{
                            ?>
                            <div class="header-info text-right">
                                <?php if( !empty( $vorosa_opt['vorosa_right_contact_email'] ) ): ?>
                                    <span class="mail-us"><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html( $vorosa_opt['vorosa_right_contact_email'] ); ?>" target="_top">  <?php echo esc_html( $vorosa_opt['vorosa_right_contact_email'] ); ?></a></span>
                                <?php endif; if( !empty( $vorosa_opt['vorosa_right_contact_info'] ) ): ?>
                                   <span><i class="fa fa-phone"></i><a href="tel:<?php echo esc_html( $vorosa_opt['vorosa_right_contact_info'] ); ?>">  <?php echo esc_html( $vorosa_opt['vorosa_right_contact_info'] ); ?></a></span>
                                <?php endif; ?>
                            </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    