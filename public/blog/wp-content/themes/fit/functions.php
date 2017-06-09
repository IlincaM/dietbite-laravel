<?php

if (!isset($content_width)) $content_width = 940;

function gt3_get_theme_pagebuilder($postid, $args = array())
{
    $gt3_theme_pagebuilder = get_post_meta($postid, "pagebuilder", true);
    if (!is_array($gt3_theme_pagebuilder)) {
        $gt3_theme_pagebuilder = array();
    }

    if (!isset($gt3_theme_pagebuilder['settings']['show_content_area'])) {
        $gt3_theme_pagebuilder['settings']['show_content_area'] = "yes";
    }
    if (!isset($gt3_theme_pagebuilder['settings']['show_page_title'])) {
        $gt3_theme_pagebuilder['settings']['show_page_title'] = "yes";
    }
    if (isset($args['not_prepare_sidebars']) && $args['not_prepare_sidebars'] == "true") {

    } else {
        if (!isset($gt3_theme_pagebuilder['settings']['layout-sidebars']) || $gt3_theme_pagebuilder['settings']['layout-sidebars'] == "default") {
            $gt3_theme_pagebuilder['settings']['layout-sidebars'] = gt3_get_theme_option("default_sidebar_layout");
        }
    }

    return $gt3_theme_pagebuilder;
}

function gt3_get_theme_sidebars_for_admin()
{
    $theme_sidebars = gt3_get_theme_option("theme_sidebars");
    if (!is_array($theme_sidebars)) {
        $theme_sidebars = array();
    }

    return $theme_sidebars;
}

function gt3_get_theme_option($optionname, $defaultValue = "")
{
    $returnedValue = get_option(GT3_THEMESHORT . $optionname, $defaultValue);

    if (gettype($returnedValue) == "string") {
        return stripslashes($returnedValue);
    } else {
        return $returnedValue;
    }
}

function gt3_the_theme_option($optionname, $beforeoutput = "", $afteroutput = "")
{
    $returnedValue = get_option(GT3_THEMESHORT . $optionname);

    if (strlen($returnedValue) > 0) {
        echo $beforeoutput . stripslashes($returnedValue) . $afteroutput;
    }
}

function gt3_get_if_strlen($str, $beforeoutput = "", $afteroutput = "")
{
    if (strlen($str) > 0) {
        return $beforeoutput . $str . $afteroutput;
    }
}

function gt3_delete_theme_option($optionname)
{
    return delete_option(GT3_THEMESHORT . $optionname);
}

function gt3_update_theme_option($optionname, $optionvalue)
{
    if (update_option(GT3_THEMESHORT . $optionname, $optionvalue)) {
        return true;
    }
}

function gt3_messagebox($actionmessage)
{
    $compile = "<div class='admin_message_box fadeout'>" . $actionmessage . "</div>";
    return $compile;
}

function gt3_theme_comment($comment, $args, $depth)
{
    $max_depth_comment = $args['max_depth'];
    if ($max_depth_comment > 4) {
        $max_depth_comment = 4;
    }
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="stand_comment">
        <div class="commentava wrapped_img">
            <?php echo get_avatar($comment->comment_author_email, 128); ?>
            <div class="img_inset"></div>
        </div>
        <div class="thiscommentbody">
            <div class="comment_info">
                <span
                    class="author_name"><?php printf('%s', get_comment_author_link()) ?> <?php edit_comment_link('(Edit)', '  ', '') ?></span>
                <span class="date"><?php printf('%1$s', get_comment_date("F d, Y")) ?></span>
                <?php comment_reply_link(array_merge($args, array('before' => ' <span class="comments">', 'after' => '</span>', 'depth' => $depth, 'reply_text' => __('Reply', 'theme_localization'), 'max_depth' => $max_depth_comment))) ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <p><em><?php _e('Your comment is awaiting moderation.', 'theme_localization'); ?></em></p>
            <?php endif; ?>
            <?php comment_text() ?>
        </div>
        <div class="clear"></div>
    </div>
<?php
}

#Custom paging
function gt3_get_theme_pagination($range = 10, $type = "")
{
    if ($type == "show_in_shortcodes") {
        global $paged, $wp_query_in_shortcodes;
        $wp_query = $wp_query_in_shortcodes;
    } else {
        global $paged, $wp_query;
    }

    if (empty($paged)) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    }

    $max_page = $wp_query->max_num_pages;
    if ($max_page > 1) {
        echo '<ul class="pagerblock">';
    }
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        $ppl = "<span class='btn_prev'></span>";
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo "<li><a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<li><a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo "<li><a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a></li>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo "<li><a href='" . get_pagenum_link($i) . "'";
                if ($i == $paged) echo " class='current'";
                echo ">$i</a></li>";
            }
        }
        $npl = "<span class='btn_next'></span>";
    }
    if ($max_page > 1) {
        echo '</ul>';
    }
}

function gt3_the_pb_custom_bg_and_color($gt3_theme_pagebuilder, $args = array())
{
    if (!isset($gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'])) {
        $gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] = "default";
    }

    if ($gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] == "default") {
        $layout_type = gt3_get_theme_option("default_layout");
        $bgimg_url = gt3_get_theme_option("bg_img");
        $bgpattern_url = gt3_get_theme_option("bg_pattern");
        $bgcolor_hash = gt3_get_theme_option("default_bg_color");
    } else {
        $layout_type = $gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'];
        $bgimg_url = wp_get_attachment_url($gt3_theme_pagebuilder['page_settings']['page_layout']['img']['attachid']);
        $bgpattern_url = wp_get_attachment_url($gt3_theme_pagebuilder['page_settings']['page_layout']['img']['attachid']);
        $bgcolor_hash = $gt3_theme_pagebuilder['page_settings']['page_layout']['color']['hash'];
    }

    if (is_404() || $layout_type == "bgimage") {
        if (isset($args['classes_for_body']) && $args['classes_for_body'] == true) {
            return "page_with_custom_background_image";
        } else {
            echo '<div class="custom_bg img_bg" style="background-image: url(\'' . $bgimg_url . '\'); background-color:#' . $bgcolor_hash . ';"></div>';
        }
        return true;
    }
    if ($layout_type == "boxed") {
        if (isset($args['classes_for_body']) && $args['classes_for_body'] == true) {
            return "page_with_custom_pattern";
        } else {
            echo '<div class="custom_bg" style="background-image: url(\'' . $bgpattern_url . '\'); background-color:#' . $bgcolor_hash . ';"></div>';
        }
        return true;
    }
}

if (!function_exists('gt3_get_default_pb_settings')) {
    function gt3_get_default_pb_settings()
    {
        $gt3_theme_pagebuilder['settings']['layout-sidebars'] = gt3_get_theme_option("default_sidebar_layout");
        $gt3_theme_pagebuilder['settings']['left-sidebar'] = "Default";
        $gt3_theme_pagebuilder['settings']['right-sidebar'] = "Default";
        $gt3_theme_pagebuilder['settings']['bg_image']['status'] = gt3_get_theme_option("show_bg_img_by_default");
        $gt3_theme_pagebuilder['settings']['bg_image']['src'] = gt3_get_theme_option("bg_img");
        $gt3_theme_pagebuilder['settings']['custom_color']['status'] = gt3_get_theme_option("show_bg_color_by_default");
        $gt3_theme_pagebuilder['settings']['custom_color']['value'] = gt3_get_theme_option("default_bg_color");
        $gt3_theme_pagebuilder['settings']['bg_image']['type'] = gt3_get_theme_option("default_bg_img_position");

        return $gt3_theme_pagebuilder;
    }
}

if (!function_exists('gt3_get_selected_pf_images')) {
    function gt3_get_selected_pf_images($gt3_theme_pagebuilder)
    {
        if (!isset($compile)) {
            $compile = '';
        }
        if (isset($gt3_theme_pagebuilder['post-formats']['images']) && is_array($gt3_theme_pagebuilder['post-formats']['images'])) {
            if (count($gt3_theme_pagebuilder['post-formats']['images']) == 1) {
                $onlyOneImage = "oneImage";
            } else {
                $onlyOneImage = "";
            }
            $compile .= '
                <div class="slider-wrapper theme-default">
                    <div class="nivoSlider ' . $onlyOneImage . '">
            ';

            if (is_array($gt3_theme_pagebuilder['post-formats']['images'])) {
                foreach ($gt3_theme_pagebuilder['post-formats']['images'] as $imgid => $img) {
                    $compile .= '
                        <img src="' . aq_resize(wp_get_attachment_url($img['attach_id']), "1170", "563", true, true, true) . '" data-thumb="' . aq_resize(wp_get_attachment_url($img['attach_id']), "1170", "563", true, true, true) . '" alt="" />
                    ';

                }
            }

            $compile .= '
                    </div>
                </div>
            ';

        }

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

        wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
        return $compile;
    }
}

if (!function_exists('gt3_HexToRGB')) {
    function gt3_HexToRGB($hex = "ffffff")
    {
        $color = array();
        if (strlen($hex)<1) {$hex = "ffffff";}

        if (strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex, 0, 1) . $r);
            $color['g'] = hexdec(substr($hex, 1, 1) . $g);
            $color['b'] = hexdec(substr($hex, 2, 1) . $b);
        } else if (strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
        }

        return $color['r'] . "," . $color['g'] . "," . $color['b'];
    }
}

if (!function_exists('gt3_smarty_modifier_truncate')) {
    function gt3_smarty_modifier_truncate($string, $length = 80, $etc = '... ',
                                          $break_words = false, $middle = false)
    {
        if ($length == 0)
            return '';

        if (mb_strlen($string, 'utf8') > $length) {
            $length -= mb_strlen($etc, 'utf8');
            if (!$break_words && !$middle) {
                $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
            }
            if (!$middle) {
                return mb_substr($string, 0, $length, 'utf8') . $etc;
            } else {
                return mb_substr($string, 0, $length / 2, 'utf8') . $etc . mb_substr($string, -$length / 2, utf8);
            }
        } else {
            return $string;
        }
    }
}

#Get all portfolio category inline (With Ajax)
function showPortCategoryWithAjax($postid = "")
{
    if (!isset($term_list)) {
        $term_list = '';
    }
    $permalink = get_permalink();
    $args = array('taxonomy' => 'Category');
    $terms = get_terms('portcat', $args);
    $count = count($terms);
    $i = 0;
    $iterm = 1;

    if ($count > 0) {
        if (!isset($_GET['slug'])) $all_current = 'selected';
        $cape_list = '';
        $term_list .= '<li class="' . $all_current . '">';

        $term_list .= '<a href="#filter" data-option-value="*">' . ((gt3_get_theme_option("translator_status") == "enable") ? get_text("translator_portfolio_all") : __('All','theme_localization')) . '</a>
		</li>';
        $termcount = count($terms) ;
        if (is_array($terms)) {
            foreach ($terms as $term) {
                $i++;
                $permalink = esc_url(add_query_arg("slug", $term->slug, $permalink));
                $term_list .= '<li ';
                if (isset($_GET['slug'])) {
                    $getslug = $_GET['slug'];
                } else {
                    $getslug = '';
                }
                if (strnatcasecmp($getslug, $term->name) == 0) $term_list .= 'class="selected"';

                $tempname = strtr($term->name, array(
                    ' ' => '-',
                ));
                $tempname = strtolower($tempname);

                $term_list .= '><a href="#filter" data-option-value=".' . $tempname . '" title="View all post filed under ">' . $term->name . '</a>
                    <div class="filter_fadder"></div>
                </li>';
                if ($count != $i) $term_list .= ' '; else $term_list .= '';
                #if ($iterm<$termcount) {$term_list .= '<li class="sep fltr_after">:</li>';}
                $iterm++;
            }
        }
        echo '<ul class="optionset" data-option-key="filter">' . $term_list . '</ul>';
    }
}

function gt3_show_social_icons($array) {
    $compile = "<ul class='socials_list'>";
    foreach ($array as $key => $value) {
        if (strlen(gt3_get_theme_option($value['uniqid']))>0) {
            $compile .= "<li><a class='".$value['class']."' target='".$value['target']."' href='".gt3_get_theme_option($value['uniqid'])."' title='".$value['title']."'></a></li>";
        }
    }
    $compile .= "</ul>";
    if (is_array($array) && count($array) > 0) {
        return $compile;
    } else {
        return "";
    }
}

add_action("wp_head", "wp_head_mix_var");
function wp_head_mix_var() {
    echo "<script>var ".GT3_THEMESHORT."var = true;</script>";
}


function gt3_change_pw_text($content) {
    if (gt3_get_theme_option("demo_server") == "true") {
    $content = str_replace(
        'This content is password protected. To view it please enter your password below:',
        'This content is password protected. To view it please enter your password (hint: 12345) below:',
        $content);
    return $content;
    } else {
        return $content;
    }
}
add_filter('the_content','gt3_change_pw_text');


function gt3_get_field_media_and_attach_id ($name, $attach_id, $previewW = "200px", $previewH = null, $classname = "") {
    return "<div class='select_image_root ".$classname."'>
        <input type='hidden' name='".$name."' value='".$attach_id."' class='select_img_attachid'>
        <div class='select_img_preview'><img src='".($attach_id>0 ? aq_resize(wp_get_attachment_url( $attach_id ), $previewW, $previewH, true, true, true) : "")."' alt=''></div>
        <input type='button' class='button button-secondary button-large select_attach_id_from_media_library' value='Select'>
    </div>";
}


function showJSInFooter() {
    if (isset($GLOBALS['showOnlyOneTimeJS']) && is_array($GLOBALS['showOnlyOneTimeJS'])) {
        foreach ($GLOBALS['showOnlyOneTimeJS'] as $id => $js) {
            echo $js;
        }
    }
}
add_action('wp_footer', 'showJSInFooter');

require_once("core/loader.php");


function gt3_custom_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    $title = get_bloginfo( 'name', 'display' ) . $title;

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'gt3_custom_wp_title', 10, 2 );

?>