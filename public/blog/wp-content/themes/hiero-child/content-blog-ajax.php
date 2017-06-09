<?php
/**
 * @package aThemes
 */

?>

<div class="container-fluid container-fluid-style">
    <div class="row">
        <article id="post-<?php the_ID(); ?>"<?php post_class('article-' . $count) ?>>
            <?php $categories = get_the_category($post->ID);
            ?>

            <div class="col-style">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail">
                        <span class="label label-default label-my-style"><?php echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>'; ?></span>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail('thumb-featured'); ?>

                        </a>
                    </div>

                <?php endif; ?>
            </div>
            <div class=" content-style">


                <h2 class="h2-content-style"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php if ('post' == get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php athemes_posted_on(); ?>
                        <!-- .entry-meta -->
                        <hr class="color-hr">
                    </div>
                <?php endif; ?>
                <div class="sumary-content-style">
                    <div class="content-style-div">
                        <?php echo get_excerpt(); ?>
                    </div> 
                    <!-- .entry-summary --></div>

            </div>


            <!-- #post-<?php the_ID(); ?>--></article>

    </div>
</div>