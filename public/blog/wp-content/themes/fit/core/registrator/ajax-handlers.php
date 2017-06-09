<?php

#Upload images
add_action('wp_ajax_mix_ajax_post_action', 'mix_theme_upload_images');
function mix_theme_upload_images()
{
    if (is_admin()) {
        $save_type = $_POST['type'];

        if ($save_type == 'upload') {

            $clickedID = $_POST['data'];
            $filename = $_FILES[$clickedID];
            $filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']);

            $override['test_form'] = false;
            $override['action'] = 'wp_handle_upload';
            $uploaded_file = wp_handle_upload($filename, $override);
            $upload_tracking[] = $clickedID;
            gt3_update_theme_option($clickedID, $uploaded_file['url']);
            if (!empty($uploaded_file['error'])) {
                echo 'Upload Error: ' . $uploaded_file['error'];
            } else {
                echo esc_url($uploaded_file['url']);
            }
        }
    }

    die();
}


#Get last slide ID
add_action('wp_ajax_get_unused_id_ajax', 'get_unused_id_ajax');
if (!function_exists('get_unused_id_ajax')) {
    function get_unused_id_ajax()
    {
        if (is_admin()) {
            $lastid = gt3_get_theme_option("last_slide_id");
            if ($lastid < 3) {
                $lastid = 2;
            }
            $lastid++;

            $mystring = home_url();
            $findme = 'gt3themes';
            $pos = strpos($mystring, $findme);

            if ($pos === false) {
                echo $lastid;
            } else {
                echo str_replace(array("/", "-", "_"), "", substr(wp_get_theme()->get('ThemeURI'), -4, 3)) . date("d") . date("m") . $lastid;
            }

            gt3_update_theme_option("last_slide_id", $lastid);
        }

        die();
    }
}


add_action('wp_ajax_add_like_post', 'gt3_add_like_post');
add_action('wp_ajax_nopriv_add_like_post', 'gt3_add_like_post');
function gt3_add_like_post()
{
    $post_id = absint($_POST['post_id']);
    $post_likes = (get_post_meta($post_id, "post_likes", true) > 0 ? get_post_meta($post_id, "post_likes", true) : "0");
    $new_likes = absint($post_likes) + 1;
    update_post_meta($post_id, "post_likes", $new_likes);
    echo $new_likes;
    die();
}

#Load portfolio works
add_action('wp_ajax_get_portfolio_works', 'get_portfolio_works');
add_action('wp_ajax_nopriv_get_portfolio_works', 'get_portfolio_works');
if (!function_exists('get_portfolio_works')) {
    function get_portfolio_works()
    {
        $html_template = esc_attr($_POST['html_template']);
        $now_open_works = absint($_POST['now_open_works']);
        $works_per_load = absint($_POST['works_per_load']);
        $category = ($_POST['category'] !== "all" ? $_POST['category'] : '');

        $wp_query = new WP_Query();
        $args = array(
            'post_type' => 'port',
            'order' => 'DESC',
            'post_status' => 'publish',
            'offset' => $now_open_works,
            'posts_per_page' => $works_per_load,
        );

        if (strlen($category) > 0) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'portcat',
                    'field' => 'slug',
                    'terms' => $category
                )
            );
        }
        $wp_query->query($args);

        $i = 1;

        while ($wp_query->have_posts()) : $wp_query->the_post();

            $pf = get_post_format();
            if (empty($pf)) $pf = "text";
            $gt3_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());

            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail');
            if (strlen($featured_image[0]) < 1) {
                $featured_image[0] = IMGURL . "/core/your_image_goes_here.jpg";
            }

            if (isset($gt3_pagebuilder['settings']['external_link']) && strlen($gt3_pagebuilder['settings']['external_link']) > 0) {
                $linkToTheWork = $gt3_pagebuilder['settings']['external_link'];
                $target = "target='_blank'";
            } else {
                $linkToTheWork = get_permalink();
                $target = "";
            }

            if (isset($gt3_pagebuilder['settings']['time_spent']) && strlen($gt3_pagebuilder['settings']['time_spent']) > 0) {
                $time_spent_value = $gt3_pagebuilder['settings']['time_spent'];
                $time_spent_html = '<div class="portfolio_descr_time">' . ((get_theme_option("translator_status") == "enable") ? get_text("translator_time_spent") : __('Time spent', 'theme_localization')) . ': <span>' . $time_spent_value . '</span></div>';
            } else {
                $time_spent_value = '';
                $time_spent_html = '';
            }

            if (!isset($echoallterm)) {
                $echoallterm = '';
            }
            $new_term_list = get_the_terms(get_the_id(), "portcat");
            if (is_array($new_term_list)) {
                foreach ($new_term_list as $term) {
                    $tempname = strtr($term->name, array(
                        ' ' => '-',
                    ));
                    $echoallterm .= strtolower($tempname) . " ";
                    $echoterm = $term->name;
                }
            }

            #Portfolio grid
            if ($html_template == "fs_grid_module") {
                $gt3_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
                if (isset($gt3_pagebuilder['settings']['elink']) && $gt3_pagebuilder['settings']['elink'] !== '') {
                    $set_link = $gt3_pagebuilder['settings']['elink'];
                    $set_target = 'target = "_blank"';
                } else {
                    $set_link = get_permalink();
                    $set_target = '';
                }
                echo '
				<div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element portfolio_item loading">
					<div class="portfolio_item_wrapper">
						<div class="portfolio_item_img gallery_item_wrapper">
							<a href="' . $set_link . '" ' . $set_target . '>
								<img src="' . aq_resize($featured_image[0], "460", "460", true, true, true) . '" alt="" width="460" height="460">
								<div class="gallery_fadder"></div>
								<h4 class="portfolio_title">' . get_the_title() . '</h4>
							</a>
						</div>
					</div>
				</div>				
                ';
            }
            #END

            $i++;
            unset($echoallterm, $pf);
        endwhile;

        die();
    }
}


#Ajax import xml
add_action('wp_ajax_ajax_import_dump', 'ajax_import_dump');
if (!function_exists('ajax_import_dump')) {
    function ajax_import_dump()
    {
        if (is_admin()) {
            if (!defined('WP_LOAD_IMPORTERS')) {
                define('WP_LOAD_IMPORTERS', true);
            }

            require_once(TEMPLATEPATH . '/core/xml-importer/importer.php');

            try {
                ob_start();
                $importer = new WP_Import();
                $importer->import(TEMPLATEPATH . '/core/xml-importer/import.xml');
                ob_clean();
            } catch (Exception $e) {
                die(json_encode(array(
                    'message' => $e->getMessage()
                )));
            }
            die(json_encode(array(
                'message' => 'Data was imported successfully'
            )));
        }
    }
}

?>