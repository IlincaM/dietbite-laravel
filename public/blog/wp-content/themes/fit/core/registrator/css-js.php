<?php

#Frontend
if (!function_exists('css_js_register')) {
    function css_js_register()
    {
        $wp_upload_dir = wp_upload_dir();

        #CSS
        wp_enqueue_style('gt3_default_style', get_bloginfo('stylesheet_url'));
        wp_enqueue_style("gt3_theme", get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style("gt3_responsive", get_template_directory_uri() . '/css/responsive.css');		
        if (gt3_get_theme_option("default_theme_skin") == "dark") {
            wp_enqueue_style('skin', get_template_directory_uri() . '/css/dark.css');
        }		
        wp_enqueue_style("gt3_custom", $wp_upload_dir['baseurl'] . "/" . "custom.css");

        #JS
        wp_enqueue_script("jquery");
        wp_enqueue_script('gt3_theme_js', get_template_directory_uri() . '/js/theme.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'css_js_register');

#Additional files for plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('nextgen-gallery/nggallery.php')) {
    if (!function_exists('nextgen_files')) {
        function nextgen_files()
        {
            wp_enqueue_style("gt3_nextgen", get_template_directory_uri() . '/css/nextgen.css');
            wp_enqueue_script('gt3_nextgen_js', get_template_directory_uri() . '/js/nextgen.js', array(), false, true);
        }
    }
    add_action('wp_enqueue_scripts', 'nextgen_files');
}

#Admin
add_action('admin_enqueue_scripts', 'admin_css_js_register');
function admin_css_js_register()
{
    #CSS (MAIN)
    wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/core/admin/css/jquery-ui.css');
    wp_enqueue_style('colorpicker_css', get_template_directory_uri() . '/core/admin/css/colorpicker.css');
    wp_enqueue_style('gallery_css', get_template_directory_uri() . '/core/admin/css/gallery.css');
    wp_enqueue_style('colorbox_css', get_template_directory_uri() . '/core/admin/css/colorbox.css');
    wp_enqueue_style('selectBox_css', get_template_directory_uri() . '/core/admin/css/jquery.selectBox.css');
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/core/admin/css/admin.css');
    #CSS OTHER

    #JS (MAIN)
    wp_enqueue_script('admin_js', get_template_directory_uri() . '/core/admin/js/admin.js');
    wp_enqueue_script('ajaxupload_js', get_template_directory_uri() . '/core/admin/js/ajaxupload.js');
    wp_enqueue_script('colorpicker_js', get_template_directory_uri() . '/core/admin/js/colorpicker.js');
    wp_enqueue_script('selectBox_js', get_template_directory_uri() . '/core/admin/js/jquery.selectBox.js');
    wp_enqueue_script('backgroundPosition_js', get_template_directory_uri() . '/core/admin/js/jquery.backgroundPosition.js');
    wp_enqueue_script(array("jquery-ui-core", "jquery-ui-dialog", "jquery-ui-sortable"));
    wp_enqueue_media();
}

#Data for creating static css/js files.
$text_headers_font = gt3_get_theme_option("text_headers_font");

$h1_font_size = gt3_get_theme_option("h1_font_size");
$h1_line_height = substr(gt3_get_theme_option("h1_font_size"), 0, -2);
$h1_line_height = (int)$h1_line_height+2;$h1_line_height = $h1_line_height."px";

$h2_font_size = gt3_get_theme_option("h2_font_size");
$h2_line_height = substr(gt3_get_theme_option("h2_font_size"), 0, -2);
$h2_line_height = (int)$h2_line_height+2;$h2_line_height = $h2_line_height."px";

$h3_font_size = gt3_get_theme_option("h3_font_size");
$h3_line_height = substr(gt3_get_theme_option("h3_font_size"), 0, -2);
$h3_line_height = (int)$h3_line_height+2;$h3_line_height = $h3_line_height."px";

$h4_font_size = gt3_get_theme_option("h4_font_size");
$h4_line_height = substr(gt3_get_theme_option("h4_font_size"), 0, -2);
$h4_line_height = (int)$h4_line_height+2;$h4_line_height = $h4_line_height."px";

$h5_font_size = gt3_get_theme_option("h5_font_size");
$h5_line_height = substr(gt3_get_theme_option("h5_font_size"), 0, -2);
$h5_line_height = (int)$h5_line_height+2;$h5_line_height = $h5_line_height."px";

$h6_font_size = gt3_get_theme_option("h6_font_size");
$h6_line_height = substr(gt3_get_theme_option("h6_font_size"), 0, -2);
$h6_line_height = (int)$h6_line_height+2;$h6_line_height = $h6_line_height."px";

$custom_css = new cssJsGenerator(
    $filename = "custom.css",
    $filetype = "css",
    $output = '
    /* CSS HERE */
	body {
		background:#'.gt3_get_theme_option("default_bg_color").';
	}
	p, td, div,
	.listing_meta span a,
	.prev_next_links a,
	.prev_next_links a:before,
	.comment_info span a {
		color:#'.gt3_get_theme_option("main_text_color").';
		font-weight:'.gt3_get_theme_option("content_weight").';
	}
	.pagerblock li a,
	.pagerblock li:before,
	.optionset li a,
	.optionset li:before,
	a:hover,
	.featured_items_meta span,
	.featured_items_meta span a,
	.featured_items_meta span a:hover,
	.featured_items_meta span:before  {
		color:#'.gt3_get_theme_option("main_text_color").';
		font-weight:'.gt3_get_theme_option("content_weight").';
	}
	footer, footer .copyright,
	section.socials li a:before,
	section.socials li a:hover:before {
		color:#'.gt3_get_theme_option("footer_text").';
	}
	footer {
		background-color:#'.gt3_get_theme_option("footer_bg").';
		border-bottom:4px solid #'.gt3_get_theme_option("theme_color1").';
	}
	.main_header ul.menu > li > ul.sub-menu > li {
		background-color:#'.gt3_get_theme_option("main_menu_2nd_bg_color_even").';
	}
	.main_header ul.menu > li > ul.sub-menu > li:nth-child(odd) {
		background-color:#'.gt3_get_theme_option("main_menu_2nd_bg_color_odd").';
	}
	.main_header ul.menu > li > ul.sub-menu > li > ul.sub-menu > li {
		background-color:#'.gt3_get_theme_option("main_menu_3rd_bg_color_even").';
	}
	.main_header ul.menu > li > ul.sub-menu > li > ul.sub-menu > li:nth-child(odd) {
		background-color:#'.gt3_get_theme_option("main_menu_3rd_bg_color_odd").';
	}
	.main_header ul.menu > li > a,
	.main_header ul.menu > li > a span,
	.main_header ul.menu > li > a span i {
		color:#'.gt3_get_theme_option("main_menu_text_color").';
	}
	.main_header ul.sub-menu > li > a,
	.main_header ul.sub-menu > li > a span,
	.main_header ul.sub-menu > li > a:hover span,
	.mobile_menu_wrapper a,
	.mobile_menu_wrapper a span {
		color:#'.gt3_get_theme_option("submenu_text_color").';
	}
	.main_header ul.sub-menu {
		border-bottom:#'.gt3_get_theme_option("theme_color1").' 4px solid;
	}
	.main_header ul.menu > li > ul.sub-menu > li > ul.sub-menu > li {
		background-color:#'.gt3_get_theme_option("main_menu_3rd_bg_color").';
	}
	.main_header ul.menu > li > ul.sub-menu > li > ul.sub-menu > li > a,
	.main_header ul.menu > li > ul.sub-menu > li > ul.sub-menu > li > a span {
		color:#'.gt3_get_theme_option("main_menu_3rd_text_color").';
	}
	.main_header ul.sub-menu > li:hover > a,
	.main_header ul.sub-menu > li:hover > a span,
	.main_header ul.sub-menu > li.current-menu-item > a,
	.main_header ul.sub-menu > li.current-menu-item > a span,
	.main_header ul.sub-menu > li.current-menu-parent > a,
	.main_header ul.sub-menu > li.current-menu-parent > a span {
		color:#'.gt3_get_theme_option("submenu_hover_color").';
	}
	.main_header ul.sub-menu > li:hover,
	.main_header ul.sub-menu > li.current-menu-item,
	.main_header ul.sub-menu > li.current-menu-parent {
		background-color:#'.gt3_get_theme_option("theme_color1").'!important;
	}
	
	.right-sidebar-block,
	.left-sidebar-block {
		background-color:#'.gt3_get_theme_option("sidebar_bg_color").'!important;
	}

	::selection {background:#'.gt3_get_theme_option("theme_color1").';}
	::-moz-selection {background:#'.gt3_get_theme_option("theme_color1").';}

	.highlighted_colored,
	.main_header,
	.socials_toggler:hover,
	.title:before,
	.search_oops:before,
	.sidepanel .sidebar_header:before,
	.strip_template figure a,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	.box_month,
	.shortcode_button.btn_type5,
	.shortcode_button.btn_type1:hover,
	.price_item_btn a:hover,
	.most_popular .price_item_btn a,
	.most_popular .price_item_title,
	.icons_toggler:hover,
	.jspDrag,
	.fw_line a:hover,
	.widget_tag_cloud a:hover,
	.with_marker .headInModule:before,
	.shortcode_iconbox > a:hover .iconbox_wrapper .ico,
	.contentarea .time_table table tr:nth-child(odd) th:first-child {
		background-color:#'.gt3_get_theme_option("theme_color1").';
	}
	.module_team .teamlink:hover,
	#mc_signup_submit:hover,
	.shortcode_accordion_item_title.state-active:before,
	.contentarea .time_table table tr:first-child th:first-child {
		background:#'.gt3_get_theme_option("theme_color1").'!important;
	}
	.gallery_item_wrapper .gallery_fadder,
	.featured_items .img_block .featured_item_fadder,
	.widget_flickr .flickr_badge_image a .flickr_fadder {
		background:rgba('.gt3_HexToRGB(gt3_get_theme_option("theme_color1")).',0);
	}
	.gallery_item_wrapper:hover .gallery_fadder,
	.featured_items .img_block:hover .featured_item_fadder {
		background:rgba('.gt3_HexToRGB(gt3_get_theme_option("theme_color1")).',0.95);
	}
	.widget_flickr .flickr_badge_image a:hover .flickr_fadder {
		background:rgba('.gt3_HexToRGB(gt3_get_theme_option("theme_color1")).',0.8);
	}
	.jspTrack {
		background:rgba('.gt3_HexToRGB(gt3_get_theme_option("theme_color1")).',0.5);
	}
	a,
	blockquote.shortcode_blockquote.type5:before,
	ol li:before,
	ul li:before,
	h1.title404,
	.listing_meta span a:hover,
	.optionset li.selected a,
	.optionset li a:hover,
	.testimonials_title,
	.featured_items_title a:hover,
	.fs_listing_title:hover,
	.fs_blog_top .preview_meta a:hover,
	.prev_next_links a:hover,
	.prev_next_links a:hover:before,
	.featured_items_meta span a:hover,
	.comment_info span a:hover,
	.blogpost_title a:hover {
		color:#'.gt3_get_theme_option("theme_color1").';
	}
	
	.time_table a:hover {
		color:#'.gt3_get_theme_option("theme_color1").'!important;
	}
	
	.main_header.short_header .menu > li > a > span:before {
		border-right-color:rgba('.gt3_HexToRGB(gt3_get_theme_option("theme_color1")).',0.85)!important;
	}
	blockquote.shortcode_blockquote.type5 .blockquote_wrapper,
	.widget_tag_cloud a:hover,
	.columns2 .portfolio_item .portfolio_item_wrapper h5,
	.columns3 .portfolio_item .portfolio_item_wrapper h5,
	.columns4 .portfolio_item .portfolio_item_wrapper h5,
	.team_title,
	.fs_blog_top,
	.simple-post-top,
	.widget_search .search_form {
		border-color:#'.gt3_get_theme_option("theme_color1").';
	}

	*,
	.optionset li:before,
	.pagerblock li:before,
	.main_header .sub-menu span,
	.promoblock_wrapper h5 {
		font-family:'. gt3_get_theme_option("main_content_font") .';
		font-weight:'.gt3_get_theme_option("content_weight").';
	}
	p, td, div,
	blockquote p {
		font-size:'.gt3_get_theme_option("main_content_font_size").';
		line-height:'.gt3_get_theme_option("main_content_line_height").';		
	}
	h1, h2, h3, h4, h5, h6,
	h1 span, h2 span, h3 span, h4 span, h5 span, h6 span,
	h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
		font-family: '. $text_headers_font .';
		-moz-osx-font-smoothing:grayscale;
		-webkit-font-smoothing:antialiased;    
		text-decoration:none!important;
		padding:0;
		color:#'. gt3_get_theme_option("header_text_color") .';
	}

	.iconbox_header .ico i {
		color:#'. gt3_get_theme_option("header_text_color") .';
	}
	.title {
		color:#'. gt3_get_theme_option("pagetitle_header_text_color") .';
	}
	h1, h2, h3, h4, h5, h6,
	h1 span, h2 span, h3 span, h4 span, h5 span, h6 span,
	h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
	h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
	.sidebar_header,
	.box_month,
	.box_day,
	.shortcode_button,
	a.shortcode_button,
	.shortcode_tab_item_title,
	.easyPieChart,
	.easyPieChart span,
	.faq .shortcode_toggles_item_title .ico:before,
	.price_item_btn a,
	.widget_search .search_form input.field_search,
	.contentarea table tr:first-child th,
	.contentarea table tr th {
		font-weight:'. gt3_get_theme_option("headings_weight") .';
	}
	
	h1, h1 span, h1 a {
		font-size:'. $h1_font_size .';
		line-height:'. $h1_line_height .';
	}
	h2, h2 span, h2 a {
		font-size:'. $h2_font_size .';
		line-height:'. $h2_line_height .';
	}
	h3, h3 span, h3 a {
		font-size:'. $h3_font_size .';
		line-height:'. $h3_line_height .';
	}
	h4, h4 span, h4 a {
		font-size:'. $h4_font_size .';
		line-height:'. $h4_line_height .';
	}
	h5, h5 span, h5 a {
		font-size:'. $h5_font_size .';
		line-height:'. $h5_line_height .';
	}
	h6, h6 span, h6 a {
		font-size:'. $h6_font_size .';
		line-height:'. $h6_line_height .';
	}
	
	.dropcap.type2,
	.dropcap.type5,
	.pagerblock li a.current,
	.pagerblock li a:hover,
	.price_item.most_popular .price_item_cost h1,
	.price_item.most_popular .price_item_cost h5 {
		color:#'.gt3_get_theme_option("theme_color1").';
	}
	.module_cont hr.type3,
	.portfolio_dscr_top,
	.featured_items_title h5 {
		border-color:#'.gt3_get_theme_option("theme_color1").';
	}
	
	.main_header .menu > li > a,
	.main_header .menu > li > a:before {
		background:#'.gt3_get_theme_option("menu_color15").';
	}
	.main_header .menu > li.parent-menu-1 > a,
	.main_header .menu > li.parent-menu-1 > a:before {
		background:#'.gt3_get_theme_option("menu_color1").';
	}
	.main_header .menu > li.parent-menu-2 > a,
	.main_header .menu > li.parent-menu-2 > a:before {
		background:#'.gt3_get_theme_option("menu_color2").';
	}
	.main_header .menu > li.parent-menu-3 > a,
	.main_header .menu > li.parent-menu-3 > a:before {
		background:#'.gt3_get_theme_option("menu_color3").';
	}
	.main_header .menu > li.parent-menu-4 > a,
	.main_header .menu > li.parent-menu-4 > a:before {
		background:#'.gt3_get_theme_option("menu_color4").';
	}
	.main_header .menu > li.parent-menu-5 > a,
	.main_header .menu > li.parent-menu-5 > a:before {
		background:#'.gt3_get_theme_option("menu_color5").';
	}
	.main_header .menu > li.parent-menu-6 > a,
	.main_header .menu > li.parent-menu-6 > a:before {
		background:#'.gt3_get_theme_option("menu_color6").';
	}
	.main_header .menu > li.parent-menu-7 > a,
	.main_header .menu > li.parent-menu-7 > a:before {
		background:#'.gt3_get_theme_option("menu_color7").';
	}
	.main_header .menu > li.parent-menu-8 > a,
	.main_header .menu > li.parent-menu-8 > a:before {
		background:#'.gt3_get_theme_option("menu_color8").';
	}
	.main_header .menu > li.parent-menu-9 > a,
	.main_header .menu > li.parent-menu-9 > a:before {
		background:#'.gt3_get_theme_option("menu_color9").';
	}
	.main_header .menu > li.parent-menu-10 > a,
	.main_header .menu > li.parent-menu-10 > a:before {
		background:#'.gt3_get_theme_option("menu_color10").';
	}
	.main_header .menu > li.parent-menu-11 > a,
	.main_header .menu > li.parent-menu-11 > a:before {
		background:#'.gt3_get_theme_option("menu_color11").';
	}
	.main_header .menu > li.parent-menu-12 > a,
	.main_header .menu > li.parent-menu-12 > a:before {
		background:#'.gt3_get_theme_option("menu_color12").';
	}
	.main_header .menu > li.parent-menu-13 > a,
	.main_header .menu > li.parent-menu-13 > a:before {
		background:#'.gt3_get_theme_option("menu_color13").';
	}
	.main_header .menu > li.parent-menu-14 > a,
	.main_header .menu > li.parent-menu-14 > a:before {
		background:#'.gt3_get_theme_option("menu_color14").';
	}
	.main_header .menu > li.parent-menu-15 > a,
	.main_header .menu > li.parent-menu-15 > a:before {
		background:#'.gt3_get_theme_option("menu_color15").';
	}	
	.strip_template .strip-text h3 {
		font-family:#'.gt3_get_theme_option('main_font').';
	}

@media only screen and (max-width: 760px) {
	.main_header ul.sub-menu > li:hover {
		background:none!important;
	}		
	.main_header ul.sub-menu > li:hover,
	.main_header ul.sub-menu > li.current-menu-item,
	.main_header ul.sub-menu > li.current-menu-parent {
		background:none!important;
	}

	.main_header .mobile_menu > li > a {
		background:#'.gt3_get_theme_option("menu_color15").';
		text-transform:uppercase;
	}
	.main_header .mobile_menu > li > a span {
		font-weight:bold;
		font-size:18px;	
	}
	.main_header .mobile_menu > li.parent-menu-1 > a {
		background:#'.gt3_get_theme_option("menu_color1").';
	}
	.main_header .mobile_menu > li.parent-menu-2 > a {
		background:#'.gt3_get_theme_option("menu_color2").';
	}
	.main_header .mobile_menu > li.parent-menu-3 > a {
		background:#'.gt3_get_theme_option("menu_color3").';
	}
	.main_header .mobile_menu > li.parent-menu-4 > a {
		background:#'.gt3_get_theme_option("menu_color4").';
	}
	.main_header .mobile_menu > li.parent-menu-5 > a {
		background:#'.gt3_get_theme_option("menu_color5").';
	}
	.main_header .mobile_menu > li.parent-menu-6 > a {
		background:#'.gt3_get_theme_option("menu_color6").';
	}
	.main_header .mobile_menu > li.parent-menu-7 > a {
		background:#'.gt3_get_theme_option("menu_color7").';
	}
	.main_header .mobile_menu > li.parent-menu-8 > a {
		background:#'.gt3_get_theme_option("menu_color8").';
	}
	.main_header .mobile_menu > li.parent-menu-9 > a {
		background:#'.gt3_get_theme_option("menu_color9").';
	}
	.main_header .mobile_menu > li.parent-menu-10 > a {
		background:#'.gt3_get_theme_option("menu_color10").';
	}
	.main_header .mobile_menu > li.parent-menu-11 > a {
		background:#'.gt3_get_theme_option("menu_color11").';
	}
	.main_header .mobile_menu > li.parent-menu-12 > a {
		background:#'.gt3_get_theme_option("menu_color12").';
	}
	.main_header .mobile_menu > li.parent-menu-13 > a {
		background:#'.gt3_get_theme_option("menu_color13").';
	}
	.main_header .mobile_menu > li.parent-menu-14 > a {
		background:#'.gt3_get_theme_option("menu_color14").';
	}
	.main_header .mobile_menu > li.parent-menu-15 > a {
		background:#'.gt3_get_theme_option("menu_color15").';
	}

	.main_header ul.mobile_menu ul.sub-menu > li > a {
		background-color:#'.gt3_get_theme_option("main_menu_2nd_bg_color_even").';
	}
	.main_header ul.mobile_menu ul.sub-menu > li:nth-child(odd) > a {
		background-color:#'.gt3_get_theme_option("main_menu_2nd_bg_color_odd").';
	}	
	.main_header ul.mobile_menu > li > ul.sub-menu > li > ul.sub-menu > li > a {
		background-color:#'.gt3_get_theme_option("main_menu_3rd_bg_color_even").';
	}
	.main_header ul.mobile_menu > li > ul.sub-menu > li > ul.sub-menu > li:nth-child(odd) > a {
		background-color:#'.gt3_get_theme_option("main_menu_3rd_bg_color_odd").';
	}	

	.main_header li.current-menu-item > a {
		background-color:#'.gt3_get_theme_option("theme_color1").'!important;
	}

}
    '
);

?>