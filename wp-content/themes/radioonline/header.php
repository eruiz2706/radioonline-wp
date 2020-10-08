<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <header>
        <title><?php wp_title('|', true, 'right');?> <?php bloginfo('name'); ?></title>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <?php wp_head(); ?>
        </header>
    <body <?php body_class(); ?>>

    <header class="site-header">
    

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
            <div class="container-fluid">
                <div class="navbar-brand navbar-center" >
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="img-logo" src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" >
                    </a>
                    <span class="tit-slogan"><h6><?php bloginfo('description'); ?></h6></span>
                </div>
               
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                );
                ?>
               
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </nav>   
        <span class="slider-front"><?php if (is_front_page()) { echo do_shortcode("[metaslider id='22']");} ?></span>
        
    </header>