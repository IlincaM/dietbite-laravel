<?php

class blog_shortcode
{

    public function register_shortcode($shortcodeName)
    {
        function shortcode_blog($atts, $content = null)
        {
			wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);			
            if (!isset($compile)) {
                $compile = '';
            }
            extract(shortcode_atts(array(
                'heading_alignment' => 'left',
                'heading_size' => $GLOBALS["pbconfig"]['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'posts_per_page' => '10',
				'posts_per_line' => '3',
				'view_type' => '',
                'masonry' => 'no',
                'cat_ids' => 'all',
            ), $atts));
			
			$masonry_width = 100/$posts_per_line;
			
            #heading
            if (strlen($heading_color) > 0) {
                $custom_color = "color:#{$heading_color};";
            } else {
                $custom_color = '';
            }
            if (strlen($heading_text) > 0) {
                $compile .= "<div class='bg_title'><" . $heading_size . " style='" . $custom_color . ((strlen($heading_alignment) > 0 && $heading_alignment !== 'left') ? 'text-align:' . $heading_alignment . ';' : '') . "' class='headInModule'>{$heading_text}</" . $heading_size . "></div>";
            }

            global $wp_query_in_shortcodes, $paged;

            if (empty($paged)) {
                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            }

            $wp_query_in_shortcodes = new WP_Query();
            $args = array(
                'post_type' => 'post',
                'paged' => $paged,
                'posts_per_page' => $posts_per_page,
            );

            if ($cat_ids !== "all" && $cat_ids !== "") {
                $args['cat'] = $cat_ids;
            }

            $wp_query_in_shortcodes->query($args);
								
            while ($wp_query_in_shortcodes->have_posts()) : $wp_query_in_shortcodes->the_post();
				
                $gt3_theme_pagebuilder = get_post_meta(get_the_ID(), "pagebuilder", true);
                $pf = get_post_format();
				$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                if (empty($pf)) $pf = "text";

				if(get_the_category()) $categories = get_the_category();
				$post_categ = '';
				$separator = ', ';
				if ($categories) {						
					foreach($categories as $category) {
						$post_categ = $post_categ .'<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
					}
				}
				
				if(get_the_tags() !== '') {
					$posttags = get_the_tags();
					
				}			
				if ($posttags) {
					$post_tags = '';
					$post_tags_compile = '<span class="preview_meta_tags">'. __('tags', 'theme_localization') .':';
					foreach($posttags as $tag) {
						$post_tags = $post_tags . '<a href="?tag='.$tag->slug.'">'.$tag->name .'</a>'. ', ';
					}
					$post_tags_compile .= ' '.trim($post_tags, ', ').'</span>';
				} else {
					$post_tags_compile = '';
				}
										
					if ($view_type == "fimage-left") {
						if (strlen($featured_image[0]) > 0) {
							$hasImage = 'hasImage';
							$featured_img = '<div class="preview_image"><img src="'. aq_resize($featured_image[0], "540", "540", true, true, true) .'" /></div>';
						} else {
							$hasImage = '';
							$featured_img = '';
						}
						$compile .= '
						<div class="preview_type1 blog_post_preview '. $hasImage .'">';
						// Top Elements
						$compile .= $featured_img .'
									<div class="preview_top_wrapper">
										<section class="box_date">
											<span class="box_month">'. get_the_time("M") .'</span>
											<span class="box_day">'. get_the_time("d") .'</span>
										</section>
										<h3 class="blogpost_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>
										<section class="listing_meta">
											<span>'. get_the_time("F d, Y") .'</span>
											<span>'. __('by', 'theme_localization') .' <a href="'.get_author_posts_url( get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a></span>									
											<span>'. __('in', 'theme_localization') .' '.trim($post_categ, ', ').'</span>
											<span><a href="' . get_comments_link() . '">'. get_comments_number(get_the_ID()) .' '. __('comments', 'theme_localization') .'</a></span>
											'.$post_tags_compile.'
										</section >
									</div>';		
						$compile .= '<article class="contentarea">
										' . ((strlen(get_the_excerpt()) > 0) ? get_the_excerpt() : get_the_content())   . '
									</article>
						</div><!--.blog_post_preview -->';
					} else {
						if (strlen($featured_image[0]) > 0) {
							$hasImage = 'hasImage';
							$featured_img = '<div class="preview_image blog_post_image"><img src="'. aq_resize($featured_image[0], "1170", "563", true, true, true) .'" /></div>';
						} else {
							$hasImage = '';
							$featured_img = '';
						}						
						$compile .= '
						<div class="blog_post_preview">';
						// Top Elements											
						$compile .= $featured_img . '<div class="blog_content">
										<section class="box_date">
											<span class="box_month">'. get_the_time("M") .'</span>
											<span class="box_day">'. get_the_time("d") .'</span>
										</section>
										<h3 class="blogpost_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>
										<section class="listing_meta">
											<span>'. __('by', 'theme_localization') .' <a href="'.get_author_posts_url( get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a></span>									
											<span>'. __('in', 'theme_localization') .' '.trim($post_categ, ', ').'</span>
											<span><a href="' . get_comments_link() . '">'. get_comments_number(get_the_ID()) .' '. __('comments', 'theme_localization') .'</a></span>										
											'.$post_tags_compile.'
										</section >';
						
						//Featured Image
						$compile .= '<article class="contentarea">
										' . ((strlen(get_the_excerpt()) > 0) ? get_the_excerpt() : get_the_content())   . '
									</article>
							</div>
						</div><!--.blog_post_preview -->';
					}

            endwhile;

            $GLOBALS['showOnlyOneTimeJS']['nivo_slider'] = "
			<script>
				jQuery(document).ready(function($) {
					jQuery('.nivoSlider').each(function(){
						jQuery(this).nivoSlider({
							directionNav: true,
							controlNav: false,
							effect:'fade',
							pauseTime:4000,
							slices: 1
						});
					});
				});
			</script>
			";

            $compile .= get_plugin_pagination("10", "show_in_shortcodes");
			
            wp_reset_query();

            return $compile;
        }

        add_shortcode($shortcodeName, 'shortcode_blog');
    }
}

#Shortcode name
$shortcodeName = "blog";
$blog = new blog_shortcode();
$blog->register_shortcode($shortcodeName);

?>