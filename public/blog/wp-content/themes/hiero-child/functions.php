<?php

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'hiero-style' for the Hiero theme.
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style), wp_get_theme()->get('Version')
    );
}

function register_my_menu() {
    register_nav_menu('header-menu-blog', __('Header Menu Blog'));
    register_nav_menu('header-menu-social', __('Header Menu Social'));
    register_nav_menu('footer-menu', __('Footer Menu'));
    register_nav_menu('search-menu', __('Search Menu'));
    register_nav_menu('category-menu', __('Category Menu'));
}

add_action('init', 'register_my_menu');

function enqueue_our_required_stylesheets() {
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_our_required_stylesheets');

function outputcategories() {
    $categories = get_categories();
    foreach ($categories as $category) {
        echo "<ul>"
        . "<li><a href='"
        . get_category_link($category->cat_ID)
        . "'>$category->name</a></li></ul>";
    }
}

function get_excerpt() {
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 300);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = $excerpt . '... <a class="style-read-more" href="' . get_permalink() . '">read more</a>';
    return $excerpt;
}

/**
 * GLOBAL VARIABLES 
 */
global $count;
$count = 0;
global $countAjax;
$countAjax = 0;

function my_enqueue_assets() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('ajax-pagination', get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array('jquery'), '1.0', true);
    wp_localize_script('ajax-pagination', 'ajaxpagination', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'my_enqueue_assets');

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'paged' => $paged,
    );
    $my_posts = new WP_Query($args);
    if ($my_posts->have_posts()) :
        ?>
        <?php

        while ($my_posts->have_posts()) : $my_posts->the_post();

            get_template_part('content-blog-ajax', get_post_format());
            ?>

        <?php endwhile ?>
        <?php

    endif;

    wp_die();
}

function wpsites_list_cats($content) {
    $categories = get_categories();
    echo'<nav id="primary-navigation" class="categories-style" role="navigation">';
    foreach ($categories as $category) {
        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
    }
    echo'</nav>';
    return $content;
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_script('jquery.bxslider.min.js', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js');
    wp_enqueue_script('jquery.easing.1.3.js', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js');
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');


function load_jquery() {
    if (!is_admin()) {
    wp_enqueue_script('jquery');
    }
}
add_action('init', 'load_jquery');
  if( !defined(THEME_IMG_PATH)){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/images' );
  }