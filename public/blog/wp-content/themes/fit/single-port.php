<?php 
if ( !post_password_required() ) {
/* LOAD PAGE BUILDER ARRAY */
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
$pf = get_post_format();
$gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];

/* ADD 1 view for this post */
$post_views = (get_post_meta(get_the_ID(), "post_views", true) > 0 ? get_post_meta(get_the_ID(), "post_views", true) : "0");
update_post_meta(get_the_ID(), "post_views", (int)$post_views + 1);

$portfolioType = gt3_get_theme_option('default_portfolio_style');
if (isset($gt3_theme_pagebuilder['settings']['portfolio_style'])) {	
	if ($gt3_theme_pagebuilder['settings']['portfolio_style'] == 'simple-portfolio-post') { 
		$portfolioType = 'simple-portfolio-post';
	}
	if ($gt3_theme_pagebuilder['settings']['portfolio_style'] == 'fw-portfolio-post') { 
		$portfolioType = 'fw-portfolio-post';
	}
}
if ($portfolioType == 'fw-portfolio-post') {
	get_header('fullscreen');
} else {
	get_header();
}
the_post();
if ($portfolioType == 'simple-portfolio-post') { ?>
<div class="content_wrapper">
    <div class="container simple-post-container">
        <div class="content_block <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?> row">
            <div class="fl-container <?php echo (($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "hasRS" : ""); ?>">
                <div class="row">
                    <div class="posts-block simple-post <?php echo($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "left-sidebar" ? "hasLS" : ""); ?>">                   
                       	<?php include ("ext/pf_type1.php"); ?>
                        <div class="contentarea">
                            <div class="row">
                                <div class="span12 module_cont module_blog_page module_none_padding">
                                    <div class="blog_post_page portfolio_post blog_post_content">
                                    	<div class="simple-post-top">
											<?php if (!isset($gt3_theme_pagebuilder['settings']['show_title']) || $gt3_theme_pagebuilder['settings']['show_title'] == "yes") { ?>
												<h1><?php the_title(); ?></h1>
                                            <?php } ?>            
                                            
                                            <section class="listing_meta">
                                                <span><?php echo get_the_time("F d, Y") ?></span>
                                                <span><?php _e('by', 'theme_localization'); ?> <?php echo the_author_posts_link(); ?></span>
                                                <span><?php _e('in', 'theme_localization'); ?> <?php 
                                                    $terms = get_the_terms( get_the_ID(), 'portcat' );
                                                    if ( $terms && ! is_wp_error( $terms ) ) {
                                                        $draught_links = array();
                                                        foreach ( $terms as $term ) {
                                                            $draught_links[] = '<a href="'.get_term_link($term->slug, "portcat").'">'.$term->name.'</a>';
                                                        }
                                                        $on_draught = join( ", ", $draught_links );
                                                        $show_cat = true;
                                                    }
        
                                                    if ($terms !== false) {
                                                        echo $on_draught;
                                                    } else {
                                                        echo "Uncategorized";
                                                    }
                                                ?></span>
                                                <?php 
                                                    if (isset($gt3_theme_pagebuilder['page_settings']['portfolio']['skills']) && is_array($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'])) {
                                                        foreach ($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'] as $skillkey => $skillvalue) {
                                                            echo "<span class='preview_skills'>".esc_attr($skillvalue['name']).": ".esc_attr($skillvalue['value'])."</span>";
                                                        }
                                                    }
                                                ?>
                                            </section>
										</div>
                                        <div class="blog_post_content">
                                            <article class="contentarea">
                                                <?php
                                                global $contentAlreadyPrinted;
                                                if ($contentAlreadyPrinted !== true) {
                                                    echo '<div class="row"><div class="span12">';
                                                    the_content(__('Read more!','theme_localization'));
                                                    echo '</div><div class="clear"></div></div>';
                                                }
                                                wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages','theme_localization') . ': </span>', 'after' => '</div>' ) );
                                                ?>
                                            </article>
										</div>
                                        <section class="blog_post-footer">
                                            <div class="prev_next_links">
                                                <?php next_post_link('<div class="fleft">%link</div>') ?>
                                                <?php previous_post_link('<div class="fright">%link</div>') ?>                                                    
                                            </div>
                                            <div class="blogpost_share">
                                                <a target="_blank"
                                                   href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>"
                                                   class="share_facebook"><i
                                                        class="stand_icon icon-facebook-square"></i></a>
                                                <a target="_blank"
                                                   href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen($featured_image[0])>0) ? $featured_image[0] : gt3_get_theme_option("logo"); ?>"
                                                   class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>                                                            
                                                <a target="_blank"
                                                   href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>"
                                                   class="share_tweet"><i class="stand_icon icon-twitter"></i></a>                                                       
                                                <a target="_blank"
                                                   href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"
                                                   class="share_gplus"><i class="icon-google-plus-square"></i></a>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </section>
                                    </div><!--.blog_post_page -->
                                </div>
                            </div>
                            
							<?php
                            if (gt3_get_theme_option("related_posts") == "on") {

								$posts_per_line = 3;

                                echo '<div class="row"><div class="span12 module_cont module_small_padding module_feature_posts single_feature">';

                                $new_term_list = get_the_terms(get_the_id(), "portcat");
                                $echoallterm = '';
                                $echoterm = array();
                                if (is_array($new_term_list)) {
                                    foreach ($new_term_list as $term) {
                                        $echoterm[] = $term->term_id;
                                    }
                                }
                                if (is_array($echoterm) && count($echoterm)>0) {
                                    $post_type_terms = implode(",", $echoterm);
                                } else {
                                    $post_type_terms = "";
                                }

                                echo do_shortcode("[feature_portfolio
                                heading_color=''
                                heading_size='h3'
                                heading_text='" . __('Related Works', 'theme_localization') . "'
                                number_of_posts='".$posts_per_line."'
                                posts_per_line=".$posts_per_line."
                                sorting_type='random'
                                related='yes'
                                now_open_pageid='".get_the_id()."'
                                post_type_terms='".$post_type_terms."'
                                post_type='port'][/feature_portfolio]");
                                echo '</div></div>';
                            }

                            if ( comments_open() && gt3_get_theme_option("portfolio_comments") == "enabled" ) {
                            ?>
                            <div class="row">
                                <div class="span12">
                                    <?php comments_template(); ?>
                                </div>
                            </div>
							<?php } ?>
                        </div><!-- .contentarea -->
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
		//Fullscreen Type
	wp_enqueue_script('gt3_fsGallery_js', get_template_directory_uri() . '/js/fs_post_slider.js', array(), false, true);
	wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);
	wp_enqueue_script('gt3_mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array(), false, true);
    $sliderCompile = "";
	if ($pf == "image" && isset($gt3_theme_pagebuilder['post-formats']['images'])) {
		foreach ($gt3_theme_pagebuilder['post-formats']['images'] as $imgid => $img) {
			$first_img = wp_get_attachment_url($img['attach_id']);
			break;
		}
			
		if (isset($gt3_theme_pagebuilder['post-formats']['images']) && is_array($gt3_theme_pagebuilder['post-formats']['images'])) {
			$sliderCompile .= '<script>gallery_set = [';
			foreach ($gt3_theme_pagebuilder['post-formats']['images'] as $imageid => $image) {
				$sliderCompile .= '{image: "' . wp_get_attachment_url($image['attach_id']) . '"},';
				
			}
		}		
		$sliderCompile .= "]		
		jQuery(document).ready(function(){
			jQuery('html').addClass('hasPag');
			jQuery('body').fs_post_slider ({
				fx: 'fade',
				fit: 'no_fit',
				slide_time: 3000,
				slides: gallery_set
			});
		});
		</script>";
	} else if ($pf == "video") {
		//Video BG
		$sliderCompile .= "
		<script>
			jQuery(document).ready(function(){
				jQuery('html').addClass('fw_post_video');
			});
		</script>";

		$video_url = $gt3_theme_pagebuilder['post-formats']['videourl'];
		echo "<div class='fw_background bg_video'>";

		#YOUTUBE
		$is_youtube = substr_count($video_url, "youtu");
		if ($is_youtube > 0) {
			$videoid = substr(strstr($video_url, "="), 1);
			echo "<iframe width=\"100%\" height=\"100%\" src=\"http://www.youtube.com/embed/" . $videoid . "?controls=0&autoplay=1&showinfo=0&modestbranding=1&wmode=opaque&rel=0\" frameborder=\"0\" allowfullscreen></iframe></div>";
		}
	
		#VIMEO
		$is_vimeo = substr_count($video_url, "vimeo");
		if ($is_vimeo > 0) {
			$videoid = substr(strstr($video_url, "m/"), 2);
			echo "<iframe src=\"http://player.vimeo.com/video/" . $videoid . "?autoplay=1&loop=0\" width=\"100%\" height=\"100%\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>";
		}
		
	?>
    <script>
		jQuery(document).ready(function() {
			jQuery('.fw_background').height(jQuery(window).height());
			jQuery('.main_header').removeClass('hided');
			jQuery('.fw_background').addClass('loaded');
			if (jQuery(window).width() > 1024) {
				if (jQuery('.bg_video').size() > 0) {
					if (((jQuery(window).height()+150)/9)*16 > jQuery(window).width()) {				
						jQuery('iframe').height(jQuery(window).height()+150).width(((jQuery(window).height()+150)/9)*16);
						jQuery('iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'top' : "-75px", 'margin-top' : '0px'});
					} else {
						jQuery('iframe').width(jQuery(window).width()).height(((jQuery(window).width())/16)*9);
						jQuery('iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'margin-top' : (-1*jQuery('iframe').height()/2)+'px', 'top' : '50%'});
					}
				}
			} else if (jQuery(window).width() < 760) {
				jQuery('.bg_video').height(jQuery(window).height()-jQuery('.main_header').height());
				jQuery('iframe').height(jQuery(window).height()-jQuery('.main_header').height());
			} else {
				jQuery('.bg_video').height(jQuery(window).height());
				jQuery('iframe').height(jQuery(window).height());				
			}
		});
		jQuery(window).resize(function() {
			jQuery('.fw_background').height(jQuery(window).height());
			if (jQuery(window).width() > 1024	) {
				if (jQuery('.bg_video').size() > 0) {
					if (((jQuery(window).height()+150)/9)*16 > jQuery(window).width()) {
						jQuery('iframe').height(jQuery(window).height()+150).width(((jQuery(window).height()+150)/9)*16);
						jQuery('iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'top' : "-75px", 'margin-top' : '0px'});
					} else {
						jQuery('iframe').width(jQuery(window).width()).height(((jQuery(window).width())/16)*9);
						jQuery('iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'margin-top' : (-1*jQuery('iframe').height()/2)+'px', 'top' : '50%'});
					}
				}
			} else if (jQuery(window).width() < 760) {
				jQuery('.bg_video').height(jQuery(window).height()-jQuery('.main_header').height());
				jQuery('iframe').height(jQuery(window).height()-jQuery('.main_header').height());
			} else {
				jQuery('.bg_video').height(jQuery(window).height());
				jQuery('iframe').height(jQuery(window).height());				
			}
		});
	</script>
    <?php				
	} else {
		//Standart & Audio BG
		$sliderCompile .= "
		<script>
			jQuery(document).ready(function(){
				jQuery('html').addClass('fw_post_stnd');
				jQuery('.hide_content').removeClass('hided');
				jQuery('.fw_line').addClass('set2top');
				jQuery('.fw_post_hidder').addClass('showme');				
			});
		</script>";
		
		if ($gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] == "default" && (gt3_get_theme_option('default_layout') !== "boxed" || gt3_get_theme_option('default_layout') !== "bgimage")) {
			echo "<div class='fw_post_bg' style='background-image:url(".gt3_get_theme_option('bg_img').")'></div>";
		}		
	}
	echo $sliderCompile;
	?>
    <div class="fw_line loaded fs_gallery">
    <?php echo '
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider_prev"></a>
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider-info"></a>
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider-view">'. (get_post_meta(get_the_ID(), "post_views", true) > 0 ? get_post_meta(get_the_ID(), "post_views", true) : "0") .'</a>
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider-like post_likes '. (isset($_COOKIE['like'.get_the_id()]) ? "already_liked" : "") .'" data-postid="'. get_the_id() .'">'.  (get_post_meta(get_the_id(), "post_likes", true) > 0 ? get_post_meta(get_the_id(), "post_likes", true) : "0") .'</a>
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider-comments">'. get_comments_number(get_the_ID()) .'</a>
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider-share"></a>
        <a href="'.esc_js("javascript:void(0)").'" class="fs_slider_next"></a>';
		?>
        <div class="share_wrapper">
            <a target="_blank" href="http://www.facebook.com/share.php?u=<?php get_permalink() ?>" class="share_facebook"><i class="stand_icon icon-facebook-sign"></i></a>
    
            <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php get_permalink() ?>&media=<?php (strlen($featured_image[0])>0) ? $featured_image[0] : gt3_get_theme_option("logo") ?>" class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>
            
            <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php get_permalink() ?>&amp;url=<?php get_permalink() ?>" class="share_tweet"><i class="stand_icon icon-twitter"></i></a>
            <a target="_blank" href="https://plus.google.com/share?url=<?php get_permalink() ?>" class="share_gplus"><i class="icon-google-plus-sign"></i></a>		
        </div>			
	</div>
    <a href="<?php echo esc_js("javascript:void(0)");?>" class="hide_content hided"></a>
    <script>
		jQuery(document).ready(function($) {
			<?php if (get_the_content() !== '' || (isset($gt3_theme_pagebuilder['modules']) && is_array($gt3_theme_pagebuilder['modules']) && count($gt3_theme_pagebuilder['modules'])>0)) { 
			} else {
				echo "jQuery('html').addClass('noContent')";
			}
			?>			
			
			jQuery('body').css('opacity', 1);
			centerWindow();			
			jQuery('.post_likes').click(function(){
			var post_likes_this = jQuery(this);
				if (!$.cookie('like'+post_likes_this.attr('data-postid'))) {
					$.post(gt3_ajaxurl, {
						action:'add_like_post',
						post_id:jQuery(this).attr('data-postid')
					}, function (response) {
						$.cookie('like'+post_likes_this.attr('data-postid'), 'true', { expires: 7, path: '/' });
						post_likes_this.addClass('already_liked');						
						post_likes_this.text(response);
					});
				}
			});
			
			if (!jQuery("html").hasClass('noContent')) {
				jQuery('.fs_slider-info').click(function(){
					jQuery('.hide_content').removeClass('hided');
					jQuery('.fw_line').addClass('set2top');
					jQuery('.fw_post_hidder').addClass('showme');
				});
			}
			jQuery('.hide_content').click(function(){
				jQuery('.hide_content').addClass('hided');
				jQuery('.fw_line').removeClass('set2top');
				jQuery('.fw_post_hidder').removeClass('showme');
			});
			jQuery('.fs_slider-comments').click(function() {
				if (jQuery('#comments').size() > 0) {
					jQuery('.hide_content').removeClass('hided');
					jQuery('.fw_line').addClass('set2top');
					jQuery('.fw_post_hidder').addClass('showme');
					setTimeout("jQuery('html, body').stop().animate({scrollTop: jQuery('#comments').offset().top-30}, 300)",200);
				}
			});
			jQuery('.fs_slider-share').click(function(){
				jQuery('.share_wrapper').toggleClass('showme');
			});
			jQuery('.fs_slide').click(function(){
				jQuery('.share_wrapper').removeClass('showme');
			});
			jQuery('.share_wrapper a').click(function(){
				jQuery('.share_wrapper').removeClass('showme');
			});

			if (!jQuery("html").hasClass('noContent')) {				
				$('html').on('mousewheel', function(event) {
					if (event.deltaY < 0 && jQuery(window).scrollTop() < 1) {
						jQuery('.fs_slider-info').click();
					}

				});			
			}			
		});

		jQuery(window).resize(function($) {
			centerWindow();
		});

		jQuery(window).load(function($) {
			centerWindow();
		});	
		
		function centerWindow() {
			setTop = (window_h - jQuery('.fw_post_wrapper').height()-jQuery('.fw_line').height())/2 + jQuery('.fw_line').height()/2 + header.height()/2;
			if (setTop < header.height()+jQuery('.fw_line').height()+60) {
				jQuery('.fw_post_wrapper').addClass('fixed');
				jQuery('body').addClass('addPadding');
				jQuery('.fw_post_wrapper').css('top', jQuery('.fw_line').height() + header.height()+70+'px');
			} else {
				jQuery('.fw_post_wrapper').css('top', setTop +'px');
				jQuery('.fw_post_wrapper').removeClass('fixed');
				jQuery('body').removeClass('addPadding');
			}
		}
	</script>
<?php if (get_the_content() !== '' || (isset($gt3_theme_pagebuilder['modules']) && is_array($gt3_theme_pagebuilder['modules']) && count($gt3_theme_pagebuilder['modules'])>0)) { ?>
<div class="fw_post_hidder">
    <div class="fw_post_wrapper">
        <div class="content_wrapper">
            <div class="container">
                <div class="content_block <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?> row">
                    <div class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "hasRS" : ""); ?>">
                        <div class="row">						
                            <div class="posts-block simple-post <?php echo($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "left-sidebar" ? "hasLS" : ""); ?>">
                            	<?php if ($pf == "audio") {
									include("ext/pf_type1.php");
								}
								?>                            
                                <div class="contentarea">                            
                                    <div class="row">
                                        <div class="span12 module_cont module_none_padding module_blog_page">
                                            <div class="blog_post_page">
                                                <div class="simple-post-top">
                                                    <?php if (!isset($gt3_theme_pagebuilder['settings']['show_title']) || $gt3_theme_pagebuilder['settings']['show_title'] !== "no") { ?>
                                                        <h1><?php the_title(); ?></h1>
                                                    <?php } ?>
                                                <section class="listing_meta">
                                                    <span><?php echo get_the_time("F d, Y") ?></span>
                                                    <span><?php _e('by', 'theme_localization'); ?> <?php echo the_author_posts_link(); ?></span>
                                                    <span><?php _e('in', 'theme_localization'); ?> <?php 
                                                        $terms = get_the_terms( get_the_ID(), 'portcat' );
                                                        if ( $terms && ! is_wp_error( $terms ) ) {
                                                            $draught_links = array();
                                                            foreach ( $terms as $term ) {
                                                                $draught_links[] = '<a href="'.get_term_link($term->slug, "portcat").'">'.$term->name.'</a>';
                                                            }
                                                            $on_draught = join( ", ", $draught_links );
                                                            $show_cat = true;
                                                        }
            
                                                        if ($terms !== false) {
                                                            echo $on_draught;
                                                        } else {
                                                            echo "Uncategorized";
                                                        }
                                                    ?></span>
                                                    <?php 
                                                        if (isset($gt3_theme_pagebuilder['page_settings']['portfolio']['skills']) && is_array($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'])) {
                                                            foreach ($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'] as $skillkey => $skillvalue) {
                                                                echo "<span class='preview_skills'>".esc_attr($skillvalue['name']).": ".esc_attr($skillvalue['value'])."</span>";
                                                            }
                                                        }
                                                    ?>
                                                </section>
                                            </div>
                                            <div class="blog_post_content">
                                                <article class="contentarea">
                                                    <?php
                                                    global $contentAlreadyPrinted;
                                                    if ($contentAlreadyPrinted !== true) {
                                                        echo '<div class="row"><div class="span12">';
                                                        the_content(__('Read more!','theme_localization'));
                                                        echo '</div><div class="clear"></div></div>';
                                                    }
                                                    wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages','theme_localization') . ': </span>', 'after' => '</div>' ) );
                                                    ?>
                                                </article>
                                            </div>
                                            <section class="blog_post-footer">
                                                <div class="prev_next_links">
                                                    <?php next_post_link('<div class="fleft">%link</div>') ?>
                                                    <?php previous_post_link('<div class="fright">%link</div>') ?>                                                    
                                                </div>
                                                <div class="blogpost_share">
                                                    <a target="_blank"
                                                       href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>"
                                                       class="share_facebook"><i
                                                            class="stand_icon icon-facebook-square"></i></a>
                                                    <a target="_blank"
                                                       href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen($featured_image[0])>0) ? $featured_image[0] : gt3_get_theme_option("logo"); ?>"
                                                       class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>                                                            
                                                    <a target="_blank"
                                                       href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>"
                                                       class="share_tweet"><i class="stand_icon icon-twitter"></i></a>                                                       
                                                    <a target="_blank"
                                                       href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"
                                                       class="share_gplus"><i class="icon-google-plus-square"></i></a>
    
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </section>
                                        </div><!--.blog_post_page -->
                                    </div>
                                </div>
                                
                                <?php
                                if (gt3_get_theme_option("related_posts") == "on") {
    
                                    $posts_per_line = 3;
    
                                    echo '<div class="row"><div class="span12 module_cont module_small_padding module_feature_posts single_feature">';
    
                                    $new_term_list = get_the_terms(get_the_id(), "portcat");
                                    $echoallterm = '';
                                    $echoterm = array();
                                    if (is_array($new_term_list)) {
                                        foreach ($new_term_list as $term) {
                                            $echoterm[] = $term->term_id;
                                        }
                                    }
                                    if (is_array($echoterm) && count($echoterm)>0) {
                                        $post_type_terms = implode(",", $echoterm);
                                    } else {
                                        $post_type_terms = "";
                                    }
    
                                    echo do_shortcode("[feature_portfolio
                                    heading_color=''
                                    heading_size='h3'
                                    heading_text='" . __('Related Works', 'theme_localization') . "'
                                    number_of_posts='".$posts_per_line."'
                                    posts_per_line=".$posts_per_line."
                                    sorting_type='random'
                                    related='yes'
                                    now_open_pageid='".get_the_id()."'
                                    post_type_terms='".$post_type_terms."'
                                    post_type='port'][/feature_portfolio]");
                                    echo '</div></div>';
                                }
    
                                if ( comments_open() && gt3_get_theme_option("portfolio_comments") == "enabled" ) {
                                ?>
                                <div class="row">
                                    <div class="span12">
                                        <?php comments_template(); ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- .contentarea -->
                            </div>
                            <?php get_sidebar('left'); ?>
                        </div>
                        <div class="clear"><!-- ClearFix --></div>
                    </div>
                    </div>
                    <!-- .fl-container -->
                    <?php get_sidebar('right'); ?>
                    <div class="clear"><!-- ClearFix --></div>
                    <div class="hideme">

                    <?php get_footer(); ?>
                                </div>
                            </div>
                            <!-- .container -->
                        </div>
                    </div>    
                </div>

	<?php } else {
		echo '<div class="hideme">';
		get_footer();	
		}
	}
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