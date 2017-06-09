<?php 
/*
Template Name: Fullscreen Slider
*/
if ( !post_password_required() ) {
get_header('fullscreen');
the_post();

$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$pf = get_post_format();			
	wp_enqueue_script('gt3_fsGallery_js', get_template_directory_uri() . '/js/fs_gallery.js', array(), false, true);
?>
	<?php 
        $sliderCompile = "";
	if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['slides']) && is_array($gt3_theme_pagebuilder['sliders']['fullscreen']['slides'])) {
		if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['thumbnails']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['thumbnails'] == "off") {
			$thumbs_state = $gt3_theme_pagebuilder['sliders']['fullscreen']['thumbnails'];
			$thmb_class = 'pag-hided';
			$pag_class = 'show-pag';
		} else {
			$thumbs_state = "on";
			$thmb_class = '';
			$pag_class = '';
		}
		if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['autoplay']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['autoplay'] == "off") {
			$autoplay = 0;
		} else {
			$autoplay = 1;
		}
		if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['interval']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['interval'] > 0) {
			$interval = $gt3_theme_pagebuilder['sliders']['fullscreen']['interval'];
		} else {
			$interval = 3300;
		}
		if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['fit_style'])) {
			$fit_style = $gt3_theme_pagebuilder['sliders']['fullscreen']['fit_style'];
		} else {
			$fit_style = "no_fit";
		}
		$sliderCompile .= '<script>gallery_set = [';
		foreach ($gt3_theme_pagebuilder['sliders']['fullscreen']['slides'] as $imageid => $image) {
			if (isset($image['title']['value']) && strlen($image['title']['value'])>0) {$photoTitle = $image['title']['value'];} else {$photoTitle = "";}
			if (isset($image['caption']['value']) && strlen($image['caption']['value'])>0) {$photoCaption  = $image['caption']['value'];} else {$photoCaption = "";}
			if (isset($image['title']['color']) && strlen($image['title']['color'])>0) {$titleColor = $image['title']['color'];} else {$titleColor = "353e3d";}
			if (isset($image['caption']['color']) && strlen($image['caption']['color'])>0) {$captionColor  = $image['caption']['color'];} else {$captionColor = "010101";}

			$sliderCompile .= '{image: "' . wp_get_attachment_url($image['attach_id']) . '", thmb: "'.aq_resize(wp_get_attachment_url($image['attach_id']), "120", "130", true, true, true).'", alt: "' . str_replace('"', "'",  $photoTitle) . '", title: "' . str_replace('"', "'", $photoTitle) . '", description: "' . str_replace('"', "'",  $photoCaption) . '", titleColor: "#'.$titleColor.'", descriptionColor: "#'.$captionColor.'"},';
			
		}
	}		
	$sliderCompile .= "]		
	jQuery(document).ready(function(){
		jQuery('html').addClass('hasPag');
		jQuery('body').fs_gallery({
			fx: 'fade', /*fade, zoom, slide_left, slide_right, slide_top, slide_bottom*/
			fit: '". $fit_style ."',
			slide_time: ". $interval .", /*This time must be < then time in css*/
			autoplay: ".$autoplay.",
			slides: gallery_set
		});
		jQuery('.fs_share').click(function(){
			jQuery('.fs_fadder').removeClass('hided');
			jQuery('.fs_sharing_wrapper').removeClass('hided');
			jQuery('.fs_share_close').removeClass('hided');
		});
		jQuery('.fs_share_close').click(function(){
			jQuery('.fs_fadder').addClass('hided');
			jQuery('.fs_sharing_wrapper').addClass('hided');
			jQuery('.fs_share_close').addClass('hided');
		});
		jQuery('.fs_fadder').click(function(){
			jQuery('.fs_fadder').addClass('hided');
			jQuery('.fs_sharing_wrapper').addClass('hided');
			jQuery('.fs_share_close').addClass('hided');
		});
	});
	</script>";
	
	echo $sliderCompile;
	
	echo '<div class="fw_line loaded fs_gallery '. $thmb_class .'">';
	echo '</div>';
	?>
    <script>
		jQuery(document).ready(function(){
			jQuery('.main_header').removeClass('hided');
		});	
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