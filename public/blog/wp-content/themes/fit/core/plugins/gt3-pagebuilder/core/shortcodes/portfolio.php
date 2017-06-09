<?php

class portfolio_shortcode
{
    public function register_shortcode($shortcodeName)
    {
        function shortcode_portfolio($atts, $content = null)
        {
			if (!isset($compile)) {$compile='';}

            wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);
			
            extract(shortcode_atts(array(
                'heading_alignment' => 'left',
                'heading_size' => $GLOBALS["pbconfig"]['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'posts_per_page' => '4',
                'view_type' => '1 column',
                'filter' => 'on',
                'selected_categories' => '',
            ), $atts));

            #heading
            if (strlen($heading_color) > 0) {
                $custom_color = "color:#{$heading_color};";
            }
            if (strlen($heading_text) > 0) {
                $compile .= "<div class='bg_title'><" . $heading_size . " style='" . $custom_color . ((strlen($heading_alignment) > 0 && $heading_alignment !== 'left') ? 'text-align:' . $heading_alignment . ';' : '') . "' class='headInModule'>{$heading_text}</" . $heading_size . "></div>";
            }

            switch ($view_type) {
                case "1 column":
                    $view_type_class = "columns1";
                    BREAK;
                case "2 columns":
                    $view_type_class = "columns2";
                    BREAK;
                case "3 columns":
                    $view_type_class = "columns3";
                    BREAK;
                case "4 columns":
                    $view_type_class = "columns4";
                    BREAK;
                case "Fullwidth":
                    $view_type_class = "fw";
                    BREAK;
                case "Masonry":
                    $view_type_class = "masonry";
                    BREAK;
            }						

            $post_type_terms = array();
            if (strlen($selected_categories) > 0) {
                $post_type_terms = explode(",", $selected_categories);
            }

            #Filter
            if ($filter == "on") {
                $compile .= showPortCats($post_type_terms);
            }

            $compile .= '<div class="portfolio_block image-grid ' . $view_type_class . '" id="list">';
            global $wp_query_in_shortcodes;
            $wp_query_in_shortcodes = new WP_Query();
            global $paged;
            $args = array(
                'post_type' => 'port',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => $posts_per_page,
            );

            if (isset($_GET['slug']) && strlen($_GET['slug']) > 0) {
                $post_type_terms = $_GET['slug'];
            }
            if (count($post_type_terms) > 0) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'portcat',
                        'field' => 'id',
                        'terms' => $post_type_terms
                    )
                );
            }

            $wp_query_in_shortcodes->query($args);

            $i = 1;

            while ($wp_query_in_shortcodes->have_posts()) : $wp_query_in_shortcodes->the_post();

                $pf = get_post_format();
                if (empty($pf)) $pf = "text";
                $gt3_theme_pagebuilder = get_plugin_pagebuilder(get_the_ID());

                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail');
                if (strlen($featured_image[0]) < 1) {
                    $featured_image[0] = "";
                }

                if (isset($gt3_theme_pagebuilder['page_settings']['portfolio']['work_link']) && strlen($gt3_theme_pagebuilder['page_settings']['portfolio']['work_link']) > 0) {
                    $linkToTheWork = esc_url($gt3_theme_pagebuilder['page_settings']['portfolio']['work_link']);
                    $target = "target='_blank'";
                } else {
                    $linkToTheWork = get_permalink();
                    $target = "";
                }

                if (!isset($echoallterm)) {
                    $echoallterm = '';
                }
                $new_term_list = get_the_terms(get_the_id(), "portcat");
                if (is_array($new_term_list)) {
                    foreach ($new_term_list as $term) {
                        $tempname = strtr($term->name, array(
                            ' ' => ', ',
                        ));
                        $echoallterm .= strtolower($tempname) . " ";
                        $echoterm = $term->name;
                    }
                } else {
                    $tempname = 'Uncategorized';
                }

                $GLOBALS['showOnlyOneTimeJS']['port_content'] = "
                <script>
                    jQuery(document).ready(function($) {
						jQuery('.portfolio_title').each(function(){
							jQuery(this).css('margin-top', -1*jQuery(this).height()/2+'px');
						});
                    });
                </script>
                ";


                #Portfolio 1
                if ($view_type == "1 column") {
					$port_content_show = ((strlen(get_the_excerpt()) > 0) ? get_the_excerpt() : smarty_modifier_truncate(get_the_content(), 470));
					$porftolio_pb = gt3_get_theme_pagebuilder(get_the_ID());
                    $compile .= '
            <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element row portfolio_item">
                <div class="portfolio_item_img gallery_item_wrapper span6">
					<img src="' . aq_resize($featured_image[0], "570", "380", true, true, true) . '" alt="">
					<div class="gallery_fadder"></div>
					<div class="ico_plus"></div>
                </div>
                <div class="portfolio_dscr span6">
                   	<div class="portfolio_dscr_top">
						<h3><a href="' . $linkToTheWork . '">' . get_the_title() . '</a></h3>
						<section class="listing_meta">
							<span>'. __('by', 'theme_localization') .' '. get_the_author() .'</span>
							<span>'. __('in', 'theme_localization') .' '. $tempname .'</span>'; 
							if (isset($porftolio_pb['page_settings']['portfolio']['skills']) && is_array($porftolio_pb['page_settings']['portfolio']['skills'])) {
								foreach ($porftolio_pb['page_settings']['portfolio']['skills'] as $skillkey => $skillvalue) {
									$compile .= "<span class='preview_skills'>".esc_attr($skillvalue['name']).": ".esc_attr($skillvalue['value'])."</span>";
								}
							}
							$compile .= '					
						</section>						
					</div>
					' . $port_content_show . ' <a href="' . $linkToTheWork . '">'. __('Read more!', 'theme_localization') .'</a>
                </div>
            </div>
            ';
                }
                #END Portfolio 1


                #Portfolio 2
                if ($view_type == "2 columns") {
                    $compile .= '
            <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element portfolio_item">
				<div class="portfolio_item_wrapper">
					<div class="portfolio_item_img gallery_item_wrapper">
						<a href="' . $linkToTheWork . '">
							<img src="' . aq_resize($featured_image[0], "570", "380", true, true, true) . '" alt="">
							<div class="gallery_fadder"></div>
							<div class="ico_plus"></div>
						</a>
					</div>
					<h5><a href="' . $linkToTheWork . '">' . get_the_title() . '</a></h5>
				</div>
            </div>
            ';
                }
                #END Portfolio 2


                #Portfolio 3
                if ($view_type == "3 columns") {
                    $compile .= '
            <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element portfolio_item">
				<div class="portfolio_item_wrapper">
					<div class="portfolio_item_img gallery_item_wrapper">
						<a href="' . $linkToTheWork . '">
							<img src="' . aq_resize($featured_image[0], "570", "430", true, true, true) . '" alt="" width="570" height="430">
							<div class="gallery_fadder"></div>
							<div class="ico_plus"></div>
						</a>
					</div>
					<h5><a href="' . $linkToTheWork . '">' . get_the_title() . '</a></h5>
				</div>
            </div>
            ';
                }
                #END Portfolio 3


                #Portfolio 4
                if ($view_type == "4 columns") {
                    $compile .= '
            <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element portfolio_item">
				<div class="portfolio_item_wrapper">
					<div class="portfolio_item_img gallery_item_wrapper">
						<a href="' . $linkToTheWork . '">
							<img src="' . aq_resize($featured_image[0], "570", "430", true, true, true) . '" alt="" width="570" height="430">
							<div class="gallery_fadder"></div>
							<div class="ico_plus"></div>
						</a>
					</div>
					<h5><a href="' . $linkToTheWork . '">' . get_the_title() . '</a></h5>
				</div>
            </div>
            ';
                }
                #END Portfolio 4

                $i++;
                unset($echoallterm, $pf);
            endwhile;
            $compile .= '<div class="clear"></div></div>';

            $compile .= get_plugin_pagination(10, "show_in_shortcodes");

            wp_reset_query();
            return $compile;
        }

        add_shortcode($shortcodeName, 'shortcode_portfolio');
    }
}

#Shortcode name
$shortcodeName = "portfolio";
$portfolio = new portfolio_shortcode();
$portfolio->register_shortcode($shortcodeName);
?>