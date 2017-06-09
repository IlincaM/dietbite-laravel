<?php
/*
Template Name: Striped Page
*/
if ( !post_password_required() ) {
get_header('fullscreen');
?>
<div class="strip_template">
	<?php $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    
    if (isset($gt3_theme_pagebuilder['strips']) && is_array($gt3_theme_pagebuilder['strips'])) {
        $el_count = count($gt3_theme_pagebuilder["strips"]);
        $strip_width = 100/$el_count;	
		if (count($gt3_theme_pagebuilder["strips"]) == '2') {
			$str_type = "double";
		} else {
			$str_type = "";
		}
        ?>
        <figure class="strip-menu <?php echo $str_type; ?>" data-width="<?php echo $strip_width; ?>" data-count="<?php echo count($gt3_theme_pagebuilder["strips"]); ?>">
            <?php foreach ($gt3_theme_pagebuilder['strips'] as $stripid => $stripdata) {
                ?>
            <section class="strip-item" data-href="<?php echo $stripdata['link']; ?>" style="background-image:url(<?php echo $stripdata['image']; ?>); width:<?php echo $strip_width; ?>%;">
            	<div class="mobile-hover"></div>
                <div class="strip-fadder"></div>
                <div class="strip-text">
                    <h1 class="strip-title"><?php echo $stripdata['striptitle1']; ?></h1>
                    <h3 class="strip-caption"><?php echo $stripdata['striptitle2']; ?></h3>
					<a class="strip_btn" href="<?php echo $stripdata['link']; ?>"><i class="stand_icon icon-mail-forward"></i><?php echo $stripdata['linktext']; ?></a>
                </div>
            </section>
            <?php }?>
        </figure>
        <script>
            jQuery(document).ready(function($) {
				jQuery('.strip-text').each(function(){
					jQuery(this).css('top', (window_h - jQuery(this).height())/2 + (header.height()/2) +'px');
				});
                if (window_w > 760 && window_w < 1025) {
                    jQuery('.wrapped_link').click(function(e) {
                        if (!jQuery(this).parents('.strip-item').hasClass('hovered')) {
                            e.preventDefault();
                            jQuery('.strip-item').removeClass('hovered');
                            jQuery(this).parents('.strip-item').addClass('hovered');
                        }
                    });
                } 
				if (window_w < 760)  {
					jQuery('.strip-item').each(function(){
						jQuery(this).append('<a href="'+ jQuery(this).attr('data-href')+'" class="wrapper_href" />');
						if (jQuery('.strip-menu').hasClass('double')) {
							jQuery('.strip-item').css('min-height', (window_h-header.height())/2);
							jQuery(this).find('.strip-title').css('margin-top', (jQuery(this).height()-jQuery(this).find('.strip-title').height()-60)/2);
						}
					});
				}
				if (window_w < 1025 && window_w > 760) {
					jQuery('.mobile-hover').click(function(){
						jQuery('.hovered').removeClass('hovered');
						jQuery(this).parents('section').addClass('hovered');
					});
				}				
            });	
			jQuery(window).resize(function(){
				jQuery('.strip-text').each(function(){
					jQuery(this).css('top', (window_h - jQuery(this).height())/2 + (header.height()/2) +'px');
				});				
			});
        </script>
    <?php } ?> 
</div>
<?php
get_footer('fullscreen'); 
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