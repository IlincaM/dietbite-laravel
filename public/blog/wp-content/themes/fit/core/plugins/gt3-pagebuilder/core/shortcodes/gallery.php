<?php

class show_gallery {

	public function register_shortcode($shortcodeName) {
		function shortcode_show_gallery($atts, $content = null) {
			
			wp_enqueue_script('gt3_lightbox_js', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), false, true);
			wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);

            $compile = "";

			extract( shortcode_atts( array(
                'heading_alignment' => 'left',
                'heading_size' => $GLOBALS["pbconfig"]['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'preview_thumbs_format' => 'rectangle',
                'images_in_a_row' => '4',
                'width' => $GLOBALS["pbconfig"]['gallery_module_default_width'],
                'height' => $GLOBALS["pbconfig"]['gallery_module_default_height'],
                'galleryid' => '',
			), $atts ) );

            switch($images_in_a_row) {
                case '1':
                    $rowClass = "images_in_a_row_1";
                    break;
					
                case '2':
                    $rowClass = "images_in_a_row_2";
                    break;

                case '3':
                    $rowClass = "images_in_a_row_3";
                    break;

                case '4':
                    $rowClass = "images_in_a_row_4";
                    break;
            }
			
			if ($preview_thumbs_format == "square") {
				$width = "540px";
				$height = "540px";
			} else {
				$width = "540px";
				$height = "392px";
			}

            $all_likes = gt3pb_get_option("likes");
            $all_views = gt3pb_get_option("views");

            #heading
            if (strlen($heading_color)>0) {$custom_color = "color:#{$heading_color};";}
            if (strlen($heading_text)>0) {
                $compile .= "<div class='bg_title'><".$heading_size." style='".(isset($custom_color) ? $custom_color : '') . ((strlen($heading_alignment) > 0 && $heading_alignment !== 'left') ? 'text-align:'.$heading_alignment.';' : '')."' class='headInModule'>{$heading_text}</".$heading_size."></div>";
            }

			$compile .= "<div class='list-of-images ".$rowClass."'>";

            $galleryPageBuilder = get_plugin_pagebuilder($galleryid);

            if (isset($galleryPageBuilder['sliders']['fullscreen']['slides']) && is_array($galleryPageBuilder['sliders']['fullscreen']['slides'])) {
                foreach ($galleryPageBuilder['sliders']['fullscreen']['slides'] as $imageid => $image) {

                    $all_views[$imageid] = (isset($all_views[$imageid]) ? $all_views[$imageid] : 0)+1;

                    if (isset($image['title']['value']) && strlen($image['title']['value'])>0) {$photoTitleOutput = $image['title']['value'];} else {$photoTitleOutput = "";}
                    if (isset($image['caption']['value']) && strlen($image['caption']['value'])>0) {$photoCaption  = $image['caption']['value'];} else {$photoCaption = "";}
                        $compile .= '
                        <div class="gallery_item">
							<div class="gallery_item_padding">
								<div class="gallery_item_wrapper">';
									if ($image['slide_type'] == "image") {
										$compile .= '<a href="'.wp_get_attachment_url($image['attach_id']).'" class="img_lightbox" title="'.$photoCaption.'"></a>';
									} else {
										$compile .= '<a href="'. $image['src'] .'" class="video_lightbox" title="'.$photoCaption.'"></a>';
									}									
									$compile .= '<img class="gallery-stand-img" src="'.aq_resize(wp_get_attachment_url($image['attach_id']), $width, $height, true, true, true).'" alt="'.$photoTitleOutput.'" width="'.substr($width, 0, -2).'" height="'.substr($height, 0, -2).'">
									<div class="gallery_fadder"></div>
									<span class="ico_plus"></span>
								</div>
							</div>
                        </div>
                        ';

                    unset($photoTitleOutput, $photoCaption);
                }
                gt3pb_update_option("views", $all_views);
            }

			$compile .= "
            <div class='clear'></div>
            </div>
            ";
            $GLOBALS['showOnlyOneTimeJS']['lightBox'] = "
			<script>
				jQuery(document).ready(function($) {
					if (jQuery('.img_lightbox').size() > 0) {
						jQuery('.img_lightbox').magnificPopup({type: 'image',gallery: {enabled:true}});
					}
					if (jQuery('.video_lightbox').size() > 0) {
						jQuery('.video_lightbox').magnificPopup({type: 'iframe',gallery: {enabled:true}});
					}
				});
			</script>
			";
			
			return $compile;
			
		}
		add_shortcode($shortcodeName, 'shortcode_show_gallery');
	}
}

add_action( 'wp_ajax_add_like_attachment', 'gt3_add_like' );
add_action( 'wp_ajax_nopriv_add_like_attachment', 'gt3_add_like' );
function gt3_add_like() {
    $all_likes = gt3pb_get_option("likes");
    $attach_id = absint($_POST['attach_id']);
    $all_likes[$attach_id] = (isset($all_likes[$attach_id]) ? $all_likes[$attach_id] : 0)+1;
    gt3pb_update_option("likes", $all_likes);
    echo $all_likes[$attach_id];
    die();
}

#Shortcode name
$shortcodeName="show_gallery";
$shortcode_show_gallery = new show_gallery();
$shortcode_show_gallery->register_shortcode($shortcodeName);

?>