<?php
/**
 * Template Name: Landing Page Template
 *
 * @package aThemes
 */
get_header('landing');
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content', 'landing'); ?>
        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
    </div>
</div><!-- #primary -->
</div>
<?php // get_sidebar();  ?>
<?php get_footer('landing'); ?>
