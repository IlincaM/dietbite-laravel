<?php 
/* Template Name: Vertically Stretched Page */
if ( !post_password_required() ) {
get_header('fullscreen'); the_post();
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
?>
<?php if (!isset($gt3_theme_pagebuilder['settings']['show_title']) || $gt3_theme_pagebuilder['settings']['show_title'] == "yes") { 
	$TitleClass = "hasTitle";
} else {
	$TitleClass = "noTitle";
}
?>
<div class="fw_content_wrapper">
    <div class="content_wrapper <?php echo $TitleClass ?>">
        <div class="container">
            <div class="content_block row <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?>">
                <div class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "hasRS" : ""); ?>">
                    <div class="row">
                        <div class="posts-block <?php echo($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "left-sidebar" ? "hasLS" : ""); ?>">
                        <?php if (!isset($gt3_theme_pagebuilder['settings']['show_title']) || $gt3_theme_pagebuilder['settings']['show_title'] !== "no") { ?>
                            <div class="page_title_block">
                                <h1 class="title"><?php the_title(); ?></h1>
                            </div>
                        <?php } ?>                    
                            <div class="contentarea">
                                <?php
                                the_content(__('Read more!', 'theme_localization'));
                                wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'theme_localization') . ': ', 'after' => '</div>'));
								if (gt3_get_theme_option('page_comments') == "enabled") {?>
								<div class="row">
									<div class="span12">
										<?php comments_template(); ?>
									</div>
								</div>							
								<?php }?>
                            </div>
                        </div>
                        <?php get_sidebar('left'); ?>
                    </div>
                </div>
                <?php get_sidebar('right'); ?>
            </div>
        </div>
    </div>
</div>
<script>
	jQuery(document).ready(function(){
		centerWindow();
	});
	jQuery(window).load(function(){
		centerWindow();
	});
	jQuery(window).resize(function(){
		centerWindow();
	});
	function centerWindow() {
		setTop = (window_h - jQuery('.fw_content_wrapper').height())/2 + header.height()/2;
		if (setTop < header.height()+60) {
			jQuery('.fw_content_wrapper').addClass('fixed');
			jQuery('body').addClass('addPadding');
			jQuery('.fw_content_wrapper').css('top', header.height()+60+'px');
		} else {
			jQuery('.fw_content_wrapper').css('top', setTop +'px');
			jQuery('.fw_content_wrapper').removeClass('fixed');
			jQuery('body').removeClass('addPadding');
		}
	}
</script>

<?php get_footer('fullscreen'); 
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