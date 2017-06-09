<?php 
/*
Template Name: Fullscreen Blog
*/
if ( !post_password_required() ) {
get_header('fullscreen');
the_post();
wp_enqueue_script('gt3_mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array(), false, true);
wp_enqueue_script('gt3_jScrollPane', get_template_directory_uri() . '/js/jquery.jscrollpane.min.js', array(), false, true);

$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$pf = get_post_format();			
$onpage = $gt3_theme_pagebuilder['settings']['postsonpage'];
?>
	<div class="fs_wrapper_global">
    <div class="fullscreen_block hided">
	    <div class="fs_listing_module">
        
		<?php 
			global $wp_query_in_shortcodes, $paged;
			if(empty($paged)){
				$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			}
	
			$wp_query_in_shortcodes = new WP_Query();
			$args = array(
				'post_type' => 'post',
                'post_status' => 'publish',
				'posts_per_page' => -1
			);			
	        $wp_query_in_shortcodes->query($args);
	        while ($wp_query_in_shortcodes->have_posts()) : $wp_query_in_shortcodes->the_post();
			$gt3_theme_pagebuilder = get_post_meta(get_the_ID(), "pagebuilder", true);
			$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
			$pf = get_post_format();
		?>
				<div <?php post_class("fs_listing_wrapper"); ?> data-onscreen="<?php echo $onpage; ?>">
					<div class="preview_wrapper">
                    	<?php if (strlen($featured_image[0]) > 0) {
                            $setimg = $featured_image[0];
						}  else {
							$setimg = '';
						}?>
                        <div class="fs_listing_img" data-src="<?php echo $featured_image[0]; ?>" style="background-image:url(<?php echo $featured_image[0]; ?>)"></div>
                        <div class="fs_listing_content">
                        	<div class="fs_content_wrapper">
                                <section class="fs_blog_top">
                                    <h5><a class="fs_listing_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <div class="preview_meta">										
                                        <span class="preview_meta_data"><?php the_time("F d, Y"); ?></span>
                                        <span class="preview_meta_comments"><a href="<?php echo get_comments_link(); ?>"><?php echo __('Comments','theme_localization').": " . get_comments_number(get_the_ID()); ?></a></span>
                                    </div>
                                </section>
                                <article class="fs_listing_content contentarea">
                                    <?php echo get_the_excerpt(); ?> <a class="blogpost_readmore" href="<?php the_permalink(); ?>"><?php echo __('Read more!', 'theme_localization') ?></a>
                                </article>
                            </div>
                        </div>
					</div>
				</div>            
			<?php endwhile; wp_reset_query();?>
        </div>
        <?php 
			$gt3_pagination = gt3_get_theme_pagination(gt3_get_theme_option('fw_posts_per_page'), $type = "show_in_shortcodes");
			if (isset($gt3_pagination) && strlen($gt3_pagination) > 0) {
				echo '<div class="fw_line"><div class="fw_line_wrapper">'.$gt3_pagination.'</div></div>';
				echo '<a href="'.esc_js("javascript:void(0)").'" class="pagline_toggler"></a>';
			}
		?>
	</div>
    </div>
    <script>
		jQuery(document).ready(function($){
			layout_fs();
			if (jQuery(window).width() > 760) {				
				var settings = {
					showArrows: false,
					autoReinitialise: true
				};
				var pane = jQuery('.fullscreen_block');
				pane.jScrollPane(settings);
			}
		});
		jQuery(window).resize(function($){
			layout_fs();
		});
		jQuery(window).load(function($){
			layout_fs();
		});
		function layout_fs() {
			if (window_w > 760) {
				jQuery('.fullscreen_block').width(jQuery(window).width());
				jQuery('.jspTrack').width(jQuery(window).width()-20);				
				jQuery('.fs_listing_wrapper').each(function(){
					jQuery(this).find('.fs_listing_img').empty().css('background-image', 'url('+jQuery(this).find('.fs_listing_img').attr('data-src')+')');
					jQuery(this).width((jQuery(window).width()-10)/jQuery(this).attr('data-onscreen'));
					jQuery('.fs_listing_module').width(jQuery('.fs_listing_wrapper').size()*((jQuery(window).width()-10)/jQuery(this).attr('data-onscreen')));
					jQuery(this).find('.fs_listing_img').height(jQuery(window).height()-jQuery(this).find('.fs_listing_content').height()-32);
				});
			} else {
				jQuery('.fullscreen_block').css('width', 'auto');
				jQuery('.jspTrack').css('width', 'auto');
				jQuery('.fs_listing_wrapper').each(function(){				
					if (jQuery(this).find('.fs_listing_img img').size() == 0) {
						jQuery(this).find('.fs_listing_img').css('background-image', 'none');
						jQuery(this).find('.fs_listing_img').append("<img src="+jQuery(this).find('.fs_listing_img').attr('data-src')+" alt=''>")
					}
				});
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