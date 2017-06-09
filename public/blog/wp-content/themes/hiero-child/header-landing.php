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
        <!-- First include jquery js -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <!-- Then include bootstrap js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
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

        <?php wp_head(); ?>
    </head>

    <body class="landing-body" <?php body_class(); ?>>
        <div class="line">
            <header id="masthead" class="site-header side-header-transparent" role="banner">
                <div class=" container">
                    <div class="site-branding site-branding-landing">
                        <div id="header-image">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.png" alt="Logo" width="213px" />
                            </a>
                        </div>
                     
                        <!-- .site-branding --></div>

                    <?php if (!dynamic_sidebar('sidebar-2')) : ?>
                    <?php endif; ?>

                    <nav id="main-navigation" class="main-navigation" role="navigation">

                        <a href="#main-navigation" class="nav-open">Menu</a>
                        <a href="#" class="nav-close">Close</a>
                        <?php
                        wp_nav_menu(array('container_class' => ' sf-menu nav-style', 'theme_location' => 'header-menu-blog'));
                        ?>

                        <!-- #main-navigation --></nav>
                </div>

                <!-- #masthead --></header>

            <div id="main" class="site-main site-main-landing">
                <div class=" container">

                    <?php echo do_shortcode("[smoothslider id='1']"); ?>
                    <script>
                        function windowH() {
                            var wH = $(window).height();

                            $('.site-main,.body.landing-body').css({height: wH});
                        }

                        windowH();
                    </script>