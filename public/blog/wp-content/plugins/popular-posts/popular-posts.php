<?php
/*
  Plugin Name: Ilinca's Popular Posts
  Description: A simple plugin that tracks popular posts based on views and display them in a widget.
  Version:     0.1
  Author:     Moncea Ilinca
  License:     GPL2
 */
function style_popular_posts_style() {
    wp_register_style('style_popular_posts_style', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_style('style_popular_posts_style');
}
add_action('init', 'style_popular_posts_style');

/**
 * Post Popularity Counter
 */
function my_popular_post_views($postID) {
    $total_key = 'views';
    //Get current 'views' field
    $total = get_post_meta($postID, $total_key, true);
    //If current 'views' field is empty, set it to zero
    if ($total == '') {
        delete_post_meta($postID, $total_key);
        add_post_meta($postID, $total_key, '0');
    } else {
    //If current 'views' fiels has a value, add 1 to that value
        $total++;
        update_post_meta($postID, $total_key, $total);
    }
}
/**
 * Dynamically inject counter into single posts
 */
function my_count_popular_posts($post_id) {
    //Check that this is a sigle post and that user is a visitor
    if (!is_single())
        return;
    if (!is_user_logged_in())
        return;
    //Get the post ID
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    //Run Post Popularity Counter on post
    my_popular_post_views($post_id);
}
add_action('wp_head', 'my_count_popular_posts');
/**
 * Add popular post function data to All Posts table
 */
function my_add_views_column($defaults) {
    $defaults['post_views'] = 'View Count';
    return $defaults;
}
add_filter('manage_posts_columns', 'my_add_views_column');
function my_display_views($column_name) {
    if ($column_name === 'post_views') {
        echo (int) get_post_meta(get_the_ID(), 'views', true);
    }
}
add_action('manage_posts_custom_column', 'my_display_views', 5, 2);
/**
 * Adds Popular Posts widget.
 */
class popular_posts extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'popular_posts', // Base ID
                esc_html__('Popular', 'text_domain'), // Name
                array('description' => esc_html__('Displays the five most popular posta', 'text_domain'),) // Args
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'meta_key' => 'views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
            'thumb_default' => plugins_url('default.png', __FILE__), // Default thumbnail image.
            'thumb_default_show' => true, // Show default thumb if none found (if false, don't show thumb at all).
        );
// The Query
        $the_query = new WP_Query($query_args);
// The Loop
        if ($the_query->have_posts()) {
            $i = 0;
            echo "<ul class='widget-popular'>";
            while ($the_query->have_posts()) {
                $the_query->the_post();
                echo "<a href='" . get_permalink() . "'>";
                echo '<li class=post-number-' . $i++ . '>';
                echo "<div class='entry-thumbnail-my-style entry-thumbnail-" . $i++ . "'>";
// Check if the post has a Post Thumbnail assigned to it.

                if (has_post_thumbnail()) {
                    echo the_post_thumbnail();
                } else {
                    echo "<img class='attachment-post-thumbnail size-post-thumbnail wp-post-image' src='" . plugins_url('default.png', __FILE__) . "'/>";
                }
                echo "</div>";
                echo "<div class='entry-summary-my-style entry-summary-" . $i++ . "'>";
                $content = get_the_title();
                $trimmed_content = wp_trim_words($content, 4, '<a href="' . get_permalink() . '">...[read more]</a>');
                echo "<p class='content-post-" . $i++ . "'>";
                echo $trimmed_content;
                echo "</p>";
                echo '</div>';
                echo '</a></li>';
            }
            echo '</ul>';
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }
        echo $args['after_widget'];
    }
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Popular', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}
// class popular_posts
// register popular_posts widget
function register_popular_posts_widget() {
    register_widget('popular_posts');
}
add_action('widgets_init', 'register_popular_posts_widget');

