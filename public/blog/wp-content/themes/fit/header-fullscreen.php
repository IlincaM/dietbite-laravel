<?php 
	$gt3page_settings = gt3_get_theme_pagebuilder(@get_the_ID());
?>
<!DOCTYPE html>
<html <?php language_attributes();?> class="fullscreen_page">
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php echo((gt3_get_theme_option("responsive") == "on") ? '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' : ''); ?>
    <link rel="shortcut icon" href="<?php echo gt3_get_theme_option('favicon'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo gt3_get_theme_option('apple_touch_57'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo gt3_get_theme_option('apple_touch_72'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo gt3_get_theme_option('apple_touch_114'); ?>">
    <title><?php wp_title(); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script type="text/javascript">
        var gt3_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php echo gt3_get_if_strlen(gt3_get_theme_option("custom_css"), "<style>", "</style>") . gt3_get_if_strlen(gt3_get_theme_option("code_before_head"));
    globalJsMessage::getInstance()->render();
    wp_head(); ?>
</head>

<body <?php body_class(array(gt3_the_pb_custom_bg_and_color(gt3_get_theme_pagebuilder(@get_the_ID()), array("classes_for_body" => true)))); ?>>
    <header class="main_header">
        <div class="header_wrapper">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php gt3_the_theme_option("logo"); ?>" alt=""  width="<?php gt3_the_theme_option("header_logo_standart_width"); ?>" height="<?php gt3_the_theme_option("header_logo_standart_height"); ?>" class="logo_def"><img src="<?php gt3_the_theme_option("logo_retina"); ?>" alt="" width="<?php gt3_the_theme_option("header_logo_standart_width"); ?>" height="<?php gt3_the_theme_option("header_logo_standart_height"); ?>" class="logo_retina"></a>
            <nav>
                <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker($showtitles = false))); ?>
            </nav>
            <div class="clear"></div>
        </div>
    </header>