<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package aThemes
 */
get_header('blog');
global $count;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => '3',
    'paged' => 1,
);
$my_posts = new WP_Query($args);
?>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <?php if ($my_posts->have_posts()) : ?>
            <div class="my-posts">
                <?php while ($my_posts->have_posts()) : $my_posts->the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to overload this in a child theme then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('content-blog', get_post_format());
                    $count++; //add 1 to our counter every time we loop through a post
                    $categories = get_the_category($post->ID);
                    ?>

                <?php endwhile; ?>

                <?php athemes_content_nav('nav-below'); ?>
            </div>
        <button class="loadmore"><i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i> Load More <i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left" aria-hidden="true"></i></button>
        <?php else : ?>

            <?php get_template_part('no-results', 'index'); ?>

        <?php endif; ?>

        <!-- #content --></div>
    <!-- #primary --></div>
<?php get_sidebar(); ?>
<?php get_footer('blog'); ?>

<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var page = 2;
    jQuery(function ($) {
        $('body').on('click', '.loadmore', function () {
            var data = {
                'action': 'load_posts_by_ajax',
                'page': page,
                'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
            };

            $.post(ajaxurl, data, function (response) {
                $('.my-posts').append(response);
                page++;
            });
        });
    });
</script>