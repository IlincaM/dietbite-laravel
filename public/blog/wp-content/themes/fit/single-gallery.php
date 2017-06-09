<?php
if ( !post_password_required() ) {
get_header();
the_post();

/* LOAD PAGE BUILDER ARRAY */
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];

?>

    <div class="content_wrapper">
        <div class="container">
            <div class="content_block <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?> row">
                <div
                    class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "hasRS" : ""); ?>">                    
                    <div class="row">
                        <div
                            class="posts-block <?php echo($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "left-sidebar" ? "hasLS" : ""); ?>">
							<?php if (!isset($gt3_theme_pagebuilder['settings']['show_title']) || $gt3_theme_pagebuilder['settings']['show_title'] == "yes") { ?>
                                <div class="page_title_block">
									<h1 class="title gallery_title"><?php the_title(); ?></h1>
                                </div>
                            <?php } ?>            
                            
                            <article class="contentarea">
                                <?php
                                global $contentAlreadyPrinted;
                                if ($contentAlreadyPrinted !== true) {
                                    echo '<div class="row"><div class="span12">';
										echo do_shortcode("[show_gallery
										heading_alignment=''
										heading_color=''
										heading_size=''
										heading_text=\"\"
										galleryid='".get_the_id()."'
										images_in_a_row='3'
										][/show_gallery]");                                    
                                    echo '</div><div class="clear"></div></div>';
                                }
                                wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages', 'theme_localization') . ': </span>', 'after' => '</div>'));
                                ?>
                            </article>
                        </div>
                        <!--.blog_post_page -->
                    </div>
                </div>

            </div>
            <!-- .contentarea -->
        </div>
        <?php get_sidebar('left'); ?>
    </div>
    <div class="clear"><!-- ClearFix --></div>
    </div><!-- .fl-container -->
<?php get_sidebar('right'); ?>
    <div class="clear"><!-- ClearFix --></div>
    </div>
    </div><!-- .container -->
    </div><!-- .content_wrapper -->

<?php
    get_footer();

} else {
	get_header('centered');
	$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
	if ($gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] == "default" && gt3_get_theme_option('default_layout') == "boxed") {
		echo "<div class='password_bg' style='background-image:url(".gt3_get_theme_option('bg_img').")'></div>";
	}
?>
    <div class="content_wrapper pp_block">
        <div class="container">
        	<h1 class="pp_title"><?php  _e('PASSWORD PROTECTED', 'theme_localization') ?></h1>
			<?php the_content(); ?>
        </div>
    </div>
    <div class="global_center_trigger"></div>	
    <script>
		jQuery(document).ready(function(){
			jQuery('.post-password-form').find('label').find('input').attr('placeholder', 'Enter The Password...');
		});
	</script>
<?php 
	get_footer();
} ?>
?>