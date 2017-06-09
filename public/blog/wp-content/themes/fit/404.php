<?php get_header('fullscreen');?>
    <div class="wrapper404">
        <div class="container404">
        	<h1 class="title404"><?php echo __('404 Error', 'theme_localization'); ?></h1>
            <form name="search_field" method="get" action="<?php echo home_url(); ?>" class="search_form search404">
                <input type="text" name="s" value=""
                       placeholder="<?php _e('Search the site...', 'theme_localization'); ?>" class="field_search">
            </form>
            <div class="text404">
                <h5><?php echo __('Oops! Not Found!', 'theme_localization'); ?></h5>
                <?php echo __('Apologies, but we were unable to find what you were looking for.', 'theme_localization'); ?>            
            </div>
            <div class="clear"></div>
        </div>        
    </div>
    <div class="custom_bg img_bg" style="background-image: url(<?php echo gt3_get_theme_option('bg_img'); ?>); background-color:#<?php echo gt3_get_theme_option('default_bg_color'); ?>;"></div>
    
<?php get_footer('fullscreen'); ?>