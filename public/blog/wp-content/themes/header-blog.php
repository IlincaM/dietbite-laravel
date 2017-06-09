<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package aThemes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title('-', true, 'right'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <?php if (get_theme_mod('site_favicon')) : ?>
            <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
        <?php endif; ?>
        <?php if (get_theme_mod('apple_touch_144')) : ?>
            <link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />
        <?php endif; ?>
        <?php if (get_theme_mod('apple_touch_114')) : ?>
            <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />
        <?php endif; ?>
        <?php if (get_theme_mod('apple_touch_72')) : ?>
            <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />
        <?php endif; ?>
        <?php if (get_theme_mod('apple_touch_57')) : ?>
            <link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />
        <?php endif; ?>	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('body-style-color'); ?>>
        <header id="masthead" >
            <div class="site-header-blog">
                <p class="text-header">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
            </div>
            <div class="clearfix container">
                <div class="site-branding site-branding-position">
                    <?php if (get_theme_mod('site_logo')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                    <?php else : ?>			
                        <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
                        <<?php echo $heading_tag; ?> class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                        </<?php echo $heading_tag; ?>>
                        <div class="site-description"><?php bloginfo('description'); ?></div>
                    <?php endif; ?>
                </div>
                <?php if (!dynamic_sidebar('sidebar-2')) : ?>
                <?php endif; ?>
                <nav id="main-navigation-blog" class="main-navigation-blog" role="navigation">
                    <?php wp_nav_menu(array('container_class' => 'clearfix sf-menu-b blog social', 'theme_location' => 'header-menu-social'));
                    ?>
                </nav>
                <nav id="main-navigation-blog" class="main-navigation-blog" role="navigation">
                    <?php //wp_nav_menu(array('container_class' => 'clearfix sf-menu-b blog', 'theme_location' => 'main')); ?>
                    <?php
                    wp_nav_menu(array('container_class' => 'clearfix sf-menu-b blog', 'before' => '<span class="underline">',
                        'after' => '</span>', 'theme_location' => 'header-menu-blog'));
                    ?>
                    <!-- #main-navigation --></nav>  
                <!-- .site-branding --></div>
            <!-- #masthead --></header>
        <div id="main" class="site-main">
            <div class="clearfix container">
                