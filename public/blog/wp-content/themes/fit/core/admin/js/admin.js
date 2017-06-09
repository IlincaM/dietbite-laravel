window.jQuery = window.$ = jQuery;

jQuery(function ($) {
	/*menu icons*/
	if (jQuery('.field-css-classes').size() > 0) {
		var insert_id = '',
		current_val = ''
		jQuery('.field-css-classes').each(function(){
			current_input = jQuery(this).find('.edit-menu-item-classes');
			current_val = current_input.val();
			if (current_val.length > 0) {
				jQuery(this).find('label').before('<label class="choose_icon_label">Choose menu icon:</label><div class="show_menu_icon" data-id="'+current_input.attr('id')+'"><i class="'+current_val+'"></i></div>');
			} else {
				jQuery(this).find('label').before('<label class="choose_icon_label">Choose menu icon:</label><div class="show_menu_icon" data-id="'+current_input.attr('id')+'"><i class="icon-bookmark-o"></i></div>');
				current_input.val('icon-bookmark-o');
			}
		});
		jQuery('.submit-add-to-menu').click(function(){
			setTimeout("add_menu_item()",2000);
		});
		
		jQuery('body').append('<div class="menu_icons_fadder" style="display:none;"></div>');
		jQuery('body').append('<div class="menu_icons_popup" style="display:none;"><ul class="icons_list social_icon_icon"><li class="stand_social"><i class="stand_icon icon-glass" data-icon-code="icon-glass"></i></li><li class="stand_social"><i class="stand_icon icon-music" data-icon-code="icon-music"></i></li><li class="stand_social"><i class="stand_icon icon-search" data-icon-code="icon-search"></i></li><li class="stand_social"><i class="stand_icon icon-envelope-o" data-icon-code="icon-envelope-o"></i></li><li class="stand_social"><i class="stand_icon icon-heart" data-icon-code="icon-heart"></i></li><li class="stand_social"><i class="stand_icon icon-star" data-icon-code="icon-star"></i></li><li class="stand_social"><i class="stand_icon icon-star-o" data-icon-code="icon-star-o"></i></li><li class="stand_social"><i class="stand_icon icon-user" data-icon-code="icon-user"></i></li><li class="stand_social"><i class="stand_icon icon-film" data-icon-code="icon-film"></i></li><li class="stand_social"><i class="stand_icon icon-th-large" data-icon-code="icon-th-large"></i></li><li class="stand_social"><i class="stand_icon icon-th" data-icon-code="icon-th"></i></li><li class="stand_social"><i class="stand_icon icon-th-list" data-icon-code="icon-th-list"></i></li><li class="stand_social"><i class="stand_icon icon-check" data-icon-code="icon-check"></i></li><li class="stand_social"><i class="stand_icon icon-times" data-icon-code="icon-times"></i></li><li class="stand_social"><i class="stand_icon icon-search-plus" data-icon-code="icon-search-plus"></i></li><li class="stand_social"><i class="stand_icon icon-search-minus" data-icon-code="icon-search-minus"></i></li><li class="stand_social"><i class="stand_icon icon-power-off" data-icon-code="icon-power-off"></i></li><li class="stand_social"><i class="stand_icon icon-signal" data-icon-code="icon-signal"></i></li><li class="stand_social"><i class="stand_icon icon-cog" data-icon-code="icon-cog"></i></li><li class="stand_social"><i class="stand_icon icon-trash-o" data-icon-code="icon-trash-o"></i></li><li class="stand_social"><i class="stand_icon icon-home" data-icon-code="icon-home"></i></li><li class="stand_social"><i class="stand_icon icon-file-o" data-icon-code="icon-file-o"></i></li><li class="stand_social"><i class="stand_icon icon-clock-o" data-icon-code="icon-clock-o"></i></li><li class="stand_social"><i class="stand_icon icon-road" data-icon-code="icon-road"></i></li><li class="stand_social"><i class="stand_icon icon-download" data-icon-code="icon-download"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-o-down" data-icon-code="icon-arrow-circle-o-down"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-o-up" data-icon-code="icon-arrow-circle-o-up"></i></li><li class="stand_social"><i class="stand_icon icon-inbox" data-icon-code="icon-inbox"></i></li><li class="stand_social"><i class="stand_icon icon-play-circle-o" data-icon-code="icon-play-circle-o"></i></li><li class="stand_social"><i class="stand_icon icon-repeat" data-icon-code="icon-repeat"></i></li><li class="stand_social"><i class="stand_icon icon-refresh" data-icon-code="icon-refresh"></i></li><li class="stand_social"><i class="stand_icon icon-list-alt" data-icon-code="icon-list-alt"></i></li><li class="stand_social"><i class="stand_icon icon-lock" data-icon-code="icon-lock"></i></li><li class="stand_social"><i class="stand_icon icon-flag" data-icon-code="icon-flag"></i></li><li class="stand_social"><i class="stand_icon icon-headphones" data-icon-code="icon-headphones"></i></li><li class="stand_social"><i class="stand_icon icon-volume-off" data-icon-code="icon-volume-off"></i></li><li class="stand_social"><i class="stand_icon icon-volume-down" data-icon-code="icon-volume-down"></i></li><li class="stand_social"><i class="stand_icon icon-volume-up" data-icon-code="icon-volume-up"></i></li><li class="stand_social"><i class="stand_icon icon-qrcode" data-icon-code="icon-qrcode"></i></li><li class="stand_social"><i class="stand_icon icon-barcode" data-icon-code="icon-barcode"></i></li><li class="stand_social"><i class="stand_icon icon-tag" data-icon-code="icon-tag"></i></li><li class="stand_social"><i class="stand_icon icon-tags" data-icon-code="icon-tags"></i></li><li class="stand_social"><i class="stand_icon icon-book" data-icon-code="icon-book"></i></li><li class="stand_social"><i class="stand_icon icon-bookmark" data-icon-code="icon-bookmark"></i></li><li class="stand_social"><i class="stand_icon icon-print" data-icon-code="icon-print"></i></li><li class="stand_social"><i class="stand_icon icon-camera" data-icon-code="icon-camera"></i></li><li class="stand_social"><i class="stand_icon icon-font" data-icon-code="icon-font"></i></li><li class="stand_social"><i class="stand_icon icon-bold" data-icon-code="icon-bold"></i></li><li class="stand_social"><i class="stand_icon icon-italic" data-icon-code="icon-italic"></i></li><li class="stand_social"><i class="stand_icon icon-text-height" data-icon-code="icon-text-height"></i></li><li class="stand_social"><i class="stand_icon icon-text-width" data-icon-code="icon-text-width"></i></li><li class="stand_social"><i class="stand_icon icon-align-left" data-icon-code="icon-align-left"></i></li><li class="stand_social"><i class="stand_icon icon-align-center" data-icon-code="icon-align-center"></i></li><li class="stand_social"><i class="stand_icon icon-align-right" data-icon-code="icon-align-right"></i></li><li class="stand_social"><i class="stand_icon icon-align-justify" data-icon-code="icon-align-justify"></i></li><li class="stand_social"><i class="stand_icon icon-list" data-icon-code="icon-list"></i></li><li class="stand_social"><i class="stand_icon icon-outdent" data-icon-code="icon-outdent"></i></li><li class="stand_social"><i class="stand_icon icon-indent" data-icon-code="icon-indent"></i></li><li class="stand_social"><i class="stand_icon icon-video-camera" data-icon-code="icon-video-camera"></i></li><li class="stand_social"><i class="stand_icon icon-picture-o" data-icon-code="icon-picture-o"></i></li><li class="stand_social"><i class="stand_icon icon-pencil" data-icon-code="icon-pencil"></i></li><li class="stand_social"><i class="stand_icon icon-map-marker" data-icon-code="icon-map-marker"></i></li><li class="stand_social"><i class="stand_icon icon-adjust" data-icon-code="icon-adjust"></i></li><li class="stand_social"><i class="stand_icon icon-tint" data-icon-code="icon-tint"></i></li><li class="stand_social"><i class="stand_icon icon-pencil-square-o" data-icon-code="icon-pencil-square-o"></i></li><li class="stand_social"><i class="stand_icon icon-share-square-o" data-icon-code="icon-share-square-o"></i></li><li class="stand_social"><i class="stand_icon icon-check-square-o" data-icon-code="icon-check-square-o"></i></li><li class="stand_social"><i class="stand_icon icon-arrows" data-icon-code="icon-arrows"></i></li><li class="stand_social"><i class="stand_icon icon-step-backward" data-icon-code="icon-step-backward"></i></li><li class="stand_social"><i class="stand_icon icon-fast-backward" data-icon-code="icon-fast-backward"></i></li><li class="stand_social"><i class="stand_icon icon-backward" data-icon-code="icon-backward"></i></li><li class="stand_social"><i class="stand_icon icon-play" data-icon-code="icon-play"></i></li><li class="stand_social"><i class="stand_icon icon-pause" data-icon-code="icon-pause"></i></li><li class="stand_social"><i class="stand_icon icon-stop" data-icon-code="icon-stop"></i></li><li class="stand_social"><i class="stand_icon icon-forward" data-icon-code="icon-forward"></i></li><li class="stand_social"><i class="stand_icon icon-fast-forward" data-icon-code="icon-fast-forward"></i></li><li class="stand_social"><i class="stand_icon icon-step-forward" data-icon-code="icon-step-forward"></i></li><li class="stand_social"><i class="stand_icon icon-eject" data-icon-code="icon-eject"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-left" data-icon-code="icon-chevron-left"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-right" data-icon-code="icon-chevron-right"></i></li><li class="stand_social"><i class="stand_icon icon-plus-circle" data-icon-code="icon-plus-circle"></i></li><li class="stand_social"><i class="stand_icon icon-minus-circle" data-icon-code="icon-minus-circle"></i></li><li class="stand_social"><i class="stand_icon icon-times-circle" data-icon-code="icon-times-circle"></i></li><li class="stand_social"><i class="stand_icon icon-check-circle" data-icon-code="icon-check-circle"></i></li><li class="stand_social"><i class="stand_icon icon-question-circle" data-icon-code="icon-question-circle"></i></li><li class="stand_social"><i class="stand_icon icon-info-circle" data-icon-code="icon-info-circle"></i></li><li class="stand_social"><i class="stand_icon icon-crosshairs" data-icon-code="icon-crosshairs"></i></li><li class="stand_social"><i class="stand_icon icon-times-circle-o" data-icon-code="icon-times-circle-o"></i></li><li class="stand_social"><i class="stand_icon icon-check-circle-o" data-icon-code="icon-check-circle-o"></i></li><li class="stand_social"><i class="stand_icon icon-ban" data-icon-code="icon-ban"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-left" data-icon-code="icon-arrow-left"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-right" data-icon-code="icon-arrow-right"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-up" data-icon-code="icon-arrow-up"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-down" data-icon-code="icon-arrow-down"></i></li><li class="stand_social"><i class="stand_icon icon-share" data-icon-code="icon-share"></i></li><li class="stand_social"><i class="stand_icon icon-expand" data-icon-code="icon-expand"></i></li><li class="stand_social"><i class="stand_icon icon-compress" data-icon-code="icon-compress"></i></li><li class="stand_social"><i class="stand_icon icon-plus" data-icon-code="icon-plus"></i></li><li class="stand_social"><i class="stand_icon icon-minus" data-icon-code="icon-minus"></i></li><li class="stand_social"><i class="stand_icon icon-asterisk" data-icon-code="icon-asterisk"></i></li><li class="stand_social"><i class="stand_icon icon-exclamation-circle" data-icon-code="icon-exclamation-circle"></i></li><li class="stand_social"><i class="stand_icon icon-gift" data-icon-code="icon-gift"></i></li><li class="stand_social"><i class="stand_icon icon-leaf" data-icon-code="icon-leaf"></i></li><li class="stand_social"><i class="stand_icon icon-fire" data-icon-code="icon-fire"></i></li><li class="stand_social"><i class="stand_icon icon-eye" data-icon-code="icon-eye"></i></li><li class="stand_social"><i class="stand_icon icon-eye-slash" data-icon-code="icon-eye-slash"></i></li><li class="stand_social"><i class="stand_icon icon-exclamation-triangle" data-icon-code="icon-exclamation-triangle"></i></li><li class="stand_social"><i class="stand_icon icon-plane" data-icon-code="icon-plane"></i></li><li class="stand_social"><i class="stand_icon icon-calendar" data-icon-code="icon-calendar"></i></li><li class="stand_social"><i class="stand_icon icon-random" data-icon-code="icon-random"></i></li><li class="stand_social"><i class="stand_icon icon-comment" data-icon-code="icon-comment"></i></li><li class="stand_social"><i class="stand_icon icon-magnet" data-icon-code="icon-magnet"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-up" data-icon-code="icon-chevron-up"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-down" data-icon-code="icon-chevron-down"></i></li><li class="stand_social"><i class="stand_icon icon-retweet" data-icon-code="icon-retweet"></i></li><li class="stand_social"><i class="stand_icon icon-shopping-cart" data-icon-code="icon-shopping-cart"></i></li><li class="stand_social"><i class="stand_icon icon-folder" data-icon-code="icon-folder"></i></li><li class="stand_social"><i class="stand_icon icon-folder-open" data-icon-code="icon-folder-open"></i></li><li class="stand_social"><i class="stand_icon icon-arrows-v" data-icon-code="icon-arrows-v"></i></li><li class="stand_social"><i class="stand_icon icon-arrows-h" data-icon-code="icon-arrows-h"></i></li><li class="stand_social"><i class="stand_icon icon-bar-chart-o" data-icon-code="icon-bar-chart-o"></i></li><li class="stand_social"><i class="stand_icon icon-twitter-square" data-icon-code="icon-twitter-square"></i></li><li class="stand_social"><i class="stand_icon icon-facebook-square" data-icon-code="icon-facebook-square"></i></li><li class="stand_social"><i class="stand_icon icon-camera-retro" data-icon-code="icon-camera-retro"></i></li><li class="stand_social"><i class="stand_icon icon-key" data-icon-code="icon-key"></i></li><li class="stand_social"><i class="stand_icon icon-cogs" data-icon-code="icon-cogs"></i></li><li class="stand_social"><i class="stand_icon icon-comments" data-icon-code="icon-comments"></i></li><li class="stand_social"><i class="stand_icon icon-thumbs-o-up" data-icon-code="icon-thumbs-o-up"></i></li><li class="stand_social"><i class="stand_icon icon-thumbs-o-down" data-icon-code="icon-thumbs-o-down"></i></li><li class="stand_social"><i class="stand_icon icon-star-half" data-icon-code="icon-star-half"></i></li><li class="stand_social"><i class="stand_icon icon-heart-o" data-icon-code="icon-heart-o"></i></li><li class="stand_social"><i class="stand_icon icon-sign-out" data-icon-code="icon-sign-out"></i></li><li class="stand_social"><i class="stand_icon icon-linkedin-square" data-icon-code="icon-linkedin-square"></i></li><li class="stand_social"><i class="stand_icon icon-thumb-tack" data-icon-code="icon-thumb-tack"></i></li><li class="stand_social"><i class="stand_icon icon-external-link" data-icon-code="icon-external-link"></i></li><li class="stand_social"><i class="stand_icon icon-sign-in" data-icon-code="icon-sign-in"></i></li><li class="stand_social"><i class="stand_icon icon-trophy" data-icon-code="icon-trophy"></i></li><li class="stand_social"><i class="stand_icon icon-github-square" data-icon-code="icon-github-square"></i></li><li class="stand_social"><i class="stand_icon icon-upload" data-icon-code="icon-upload"></i></li><li class="stand_social"><i class="stand_icon icon-lemon-o" data-icon-code="icon-lemon-o"></i></li><li class="stand_social"><i class="stand_icon icon-phone" data-icon-code="icon-phone"></i></li><li class="stand_social"><i class="stand_icon icon-square-o" data-icon-code="icon-square-o"></i></li><li class="stand_social"><i class="stand_icon icon-bookmark-o" data-icon-code="icon-bookmark-o"></i></li><li class="stand_social"><i class="stand_icon icon-phone-square" data-icon-code="icon-phone-square"></i></li><li class="stand_social"><i class="stand_icon icon-twitter" data-icon-code="icon-twitter"></i></li><li class="stand_social"><i class="stand_icon icon-facebook" data-icon-code="icon-facebook"></i></li><li class="stand_social"><i class="stand_icon icon-github" data-icon-code="icon-github"></i></li><li class="stand_social"><i class="stand_icon icon-unlock" data-icon-code="icon-unlock"></i></li><li class="stand_social"><i class="stand_icon icon-credit-card" data-icon-code="icon-credit-card"></i></li><li class="stand_social"><i class="stand_icon icon-rss" data-icon-code="icon-rss"></i></li><li class="stand_social"><i class="stand_icon icon-hdd-o" data-icon-code="icon-hdd-o"></i></li><li class="stand_social"><i class="stand_icon icon-bullhorn" data-icon-code="icon-bullhorn"></i></li><li class="stand_social"><i class="stand_icon icon-bell" data-icon-code="icon-bell"></i></li><li class="stand_social"><i class="stand_icon icon-certificate" data-icon-code="icon-certificate"></i></li><li class="stand_social"><i class="stand_icon icon-hand-o-right" data-icon-code="icon-hand-o-right"></i></li><li class="stand_social"><i class="stand_icon icon-hand-o-left" data-icon-code="icon-hand-o-left"></i></li><li class="stand_social"><i class="stand_icon icon-hand-o-up" data-icon-code="icon-hand-o-up"></i></li><li class="stand_social"><i class="stand_icon icon-hand-o-down" data-icon-code="icon-hand-o-down"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-left" data-icon-code="icon-arrow-circle-left"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-right" data-icon-code="icon-arrow-circle-right"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-up" data-icon-code="icon-arrow-circle-up"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-down" data-icon-code="icon-arrow-circle-down"></i></li><li class="stand_social"><i class="stand_icon icon-globe" data-icon-code="icon-globe"></i></li><li class="stand_social"><i class="stand_icon icon-wrench" data-icon-code="icon-wrench"></i></li><li class="stand_social"><i class="stand_icon icon-tasks" data-icon-code="icon-tasks"></i></li><li class="stand_social"><i class="stand_icon icon-filter" data-icon-code="icon-filter"></i></li><li class="stand_social"><i class="stand_icon icon-briefcase" data-icon-code="icon-briefcase"></i></li><li class="stand_social"><i class="stand_icon icon-arrows-alt" data-icon-code="icon-arrows-alt"></i></li><li class="stand_social"><i class="stand_icon icon-users" data-icon-code="icon-users"></i></li><li class="stand_social"><i class="stand_icon icon-link" data-icon-code="icon-link"></i></li><li class="stand_social"><i class="stand_icon icon-cloud" data-icon-code="icon-cloud"></i></li><li class="stand_social"><i class="stand_icon icon-flask" data-icon-code="icon-flask"></i></li><li class="stand_social"><i class="stand_icon icon-scissors" data-icon-code="icon-scissors"></i></li><li class="stand_social"><i class="stand_icon icon-files-o" data-icon-code="icon-files-o"></i></li><li class="stand_social"><i class="stand_icon icon-paperclip" data-icon-code="icon-paperclip"></i></li><li class="stand_social"><i class="stand_icon icon-floppy-o" data-icon-code="icon-floppy-o"></i></li><li class="stand_social"><i class="stand_icon icon-square" data-icon-code="icon-square"></i></li><li class="stand_social"><i class="stand_icon icon-bars" data-icon-code="icon-bars"></i></li><li class="stand_social"><i class="stand_icon icon-list-ul" data-icon-code="icon-list-ul"></i></li><li class="stand_social"><i class="stand_icon icon-list-ol" data-icon-code="icon-list-ol"></i></li><li class="stand_social"><i class="stand_icon icon-strikethrough" data-icon-code="icon-strikethrough"></i></li><li class="stand_social"><i class="stand_icon icon-underline" data-icon-code="icon-underline"></i></li><li class="stand_social"><i class="stand_icon icon-table" data-icon-code="icon-table"></i></li><li class="stand_social"><i class="stand_icon icon-magic" data-icon-code="icon-magic"></i></li><li class="stand_social"><i class="stand_icon icon-truck" data-icon-code="icon-truck"></i></li><li class="stand_social"><i class="stand_icon icon-pinterest" data-icon-code="icon-pinterest"></i></li><li class="stand_social"><i class="stand_icon icon-pinterest-square" data-icon-code="icon-pinterest-square"></i></li><li class="stand_social"><i class="stand_icon icon-google-plus-square" data-icon-code="icon-google-plus-square"></i></li><li class="stand_social"><i class="stand_icon icon-google-plus" data-icon-code="icon-google-plus"></i></li><li class="stand_social"><i class="stand_icon icon-money" data-icon-code="icon-money"></i></li><li class="stand_social"><i class="stand_icon icon-caret-down" data-icon-code="icon-caret-down"></i></li><li class="stand_social"><i class="stand_icon icon-caret-up" data-icon-code="icon-caret-up"></i></li><li class="stand_social"><i class="stand_icon icon-caret-left" data-icon-code="icon-caret-left"></i></li><li class="stand_social"><i class="stand_icon icon-caret-right" data-icon-code="icon-caret-right"></i></li><li class="stand_social"><i class="stand_icon icon-columns" data-icon-code="icon-columns"></i></li><li class="stand_social"><i class="stand_icon icon-sort" data-icon-code="icon-sort"></i></li><li class="stand_social"><i class="stand_icon icon-sort-desc" data-icon-code="icon-sort-desc"></i></li><li class="stand_social"><i class="stand_icon icon-sort-asc" data-icon-code="icon-sort-asc"></i></li><li class="stand_social"><i class="stand_icon icon-envelope" data-icon-code="icon-envelope"></i></li><li class="stand_social"><i class="stand_icon icon-linkedin" data-icon-code="icon-linkedin"></i></li><li class="stand_social"><i class="stand_icon icon-undo" data-icon-code="icon-undo"></i></li><li class="stand_social"><i class="stand_icon icon-gavel" data-icon-code="icon-gavel"></i></li><li class="stand_social"><i class="stand_icon icon-tachometer" data-icon-code="icon-tachometer"></i></li><li class="stand_social"><i class="stand_icon icon-comment-o" data-icon-code="icon-comment-o"></i></li><li class="stand_social"><i class="stand_icon icon-comments-o" data-icon-code="icon-comments-o"></i></li><li class="stand_social"><i class="stand_icon icon-bolt" data-icon-code="icon-bolt"></i></li><li class="stand_social"><i class="stand_icon icon-sitemap" data-icon-code="icon-sitemap"></i></li><li class="stand_social"><i class="stand_icon icon-umbrella" data-icon-code="icon-umbrella"></i></li><li class="stand_social"><i class="stand_icon icon-clipboard" data-icon-code="icon-clipboard"></i></li><li class="stand_social"><i class="stand_icon icon-lightbulb-o" data-icon-code="icon-lightbulb-o"></i></li><li class="stand_social"><i class="stand_icon icon-exchange" data-icon-code="icon-exchange"></i></li><li class="stand_social"><i class="stand_icon icon-cloud-download" data-icon-code="icon-cloud-download"></i></li><li class="stand_social"><i class="stand_icon icon-cloud-upload" data-icon-code="icon-cloud-upload"></i></li><li class="stand_social"><i class="stand_icon icon-user-md" data-icon-code="icon-user-md"></i></li><li class="stand_social"><i class="stand_icon icon-stethoscope" data-icon-code="icon-stethoscope"></i></li><li class="stand_social"><i class="stand_icon icon-suitcase" data-icon-code="icon-suitcase"></i></li><li class="stand_social"><i class="stand_icon icon-bell-o" data-icon-code="icon-bell-o"></i></li><li class="stand_social"><i class="stand_icon icon-coffee" data-icon-code="icon-coffee"></i></li><li class="stand_social"><i class="stand_icon icon-cutlery" data-icon-code="icon-cutlery"></i></li><li class="stand_social"><i class="stand_icon icon-file-text-o" data-icon-code="icon-file-text-o"></i></li><li class="stand_social"><i class="stand_icon icon-building-o" data-icon-code="icon-building-o"></i></li><li class="stand_social"><i class="stand_icon icon-hospital-o" data-icon-code="icon-hospital-o"></i></li><li class="stand_social"><i class="stand_icon icon-ambulance" data-icon-code="icon-ambulance"></i></li><li class="stand_social"><i class="stand_icon icon-medkit" data-icon-code="icon-medkit"></i></li><li class="stand_social"><i class="stand_icon icon-fighter-jet" data-icon-code="icon-fighter-jet"></i></li><li class="stand_social"><i class="stand_icon icon-beer" data-icon-code="icon-beer"></i></li><li class="stand_social"><i class="stand_icon icon-h-square" data-icon-code="icon-h-square"></i></li><li class="stand_social"><i class="stand_icon icon-plus-square" data-icon-code="icon-plus-square"></i></li><li class="stand_social"><i class="stand_icon icon-angle-double-left" data-icon-code="icon-angle-double-left"></i></li><li class="stand_social"><i class="stand_icon icon-angle-double-right" data-icon-code="icon-angle-double-right"></i></li><li class="stand_social"><i class="stand_icon icon-angle-double-up" data-icon-code="icon-angle-double-up"></i></li><li class="stand_social"><i class="stand_icon icon-angle-double-down" data-icon-code="icon-angle-double-down"></i></li><li class="stand_social"><i class="stand_icon icon-angle-left" data-icon-code="icon-angle-left"></i></li><li class="stand_social"><i class="stand_icon icon-angle-right" data-icon-code="icon-angle-right"></i></li><li class="stand_social"><i class="stand_icon icon-angle-up" data-icon-code="icon-angle-up"></i></li><li class="stand_social"><i class="stand_icon icon-angle-down" data-icon-code="icon-angle-down"></i></li><li class="stand_social"><i class="stand_icon icon-desktop" data-icon-code="icon-desktop"></i></li><li class="stand_social"><i class="stand_icon icon-laptop" data-icon-code="icon-laptop"></i></li><li class="stand_social"><i class="stand_icon icon-tablet" data-icon-code="icon-tablet"></i></li><li class="stand_social"><i class="stand_icon icon-mobile" data-icon-code="icon-mobile"></i></li><li class="stand_social"><i class="stand_icon icon-circle-o" data-icon-code="icon-circle-o"></i></li><li class="stand_social"><i class="stand_icon icon-quote-left" data-icon-code="icon-quote-left"></i></li><li class="stand_social"><i class="stand_icon icon-quote-right" data-icon-code="icon-quote-right"></i></li><li class="stand_social"><i class="stand_icon icon-spinner" data-icon-code="icon-spinner"></i></li><li class="stand_social"><i class="stand_icon icon-circle" data-icon-code="icon-circle"></i></li><li class="stand_social"><i class="stand_icon icon-reply" data-icon-code="icon-reply"></i></li><li class="stand_social"><i class="stand_icon icon-github-alt" data-icon-code="icon-github-alt"></i></li><li class="stand_social"><i class="stand_icon icon-folder-o" data-icon-code="icon-folder-o"></i></li><li class="stand_social"><i class="stand_icon icon-folder-open-o" data-icon-code="icon-folder-open-o"></i></li><li class="stand_social"><i class="stand_icon icon-smile-o" data-icon-code="icon-smile-o"></i></li><li class="stand_social"><i class="stand_icon icon-frown-o" data-icon-code="icon-frown-o"></i></li><li class="stand_social"><i class="stand_icon icon-meh-o" data-icon-code="icon-meh-o"></i></li><li class="stand_social"><i class="stand_icon icon-gamepad" data-icon-code="icon-gamepad"></i></li><li class="stand_social"><i class="stand_icon icon-keyboard-o" data-icon-code="icon-keyboard-o"></i></li><li class="stand_social"><i class="stand_icon icon-flag-o" data-icon-code="icon-flag-o"></i></li><li class="stand_social"><i class="stand_icon icon-flag-checkered" data-icon-code="icon-flag-checkered"></i></li><li class="stand_social"><i class="stand_icon icon-terminal" data-icon-code="icon-terminal"></i></li><li class="stand_social"><i class="stand_icon icon-code" data-icon-code="icon-code"></i></li><li class="stand_social"><i class="stand_icon icon-reply-all" data-icon-code="icon-reply-all"></i></li><li class="stand_social"><i class="stand_icon icon-star-half-o" data-icon-code="icon-star-half-o"></i></li><li class="stand_social"><i class="stand_icon icon-location-arrow" data-icon-code="icon-location-arrow"></i></li><li class="stand_social"><i class="stand_icon icon-crop" data-icon-code="icon-crop"></i></li><li class="stand_social"><i class="stand_icon icon-code-fork" data-icon-code="icon-code-fork"></i></li><li class="stand_social"><i class="stand_icon icon-chain-broken" data-icon-code="icon-chain-broken"></i></li><li class="stand_social"><i class="stand_icon icon-question" data-icon-code="icon-question"></i></li><li class="stand_social"><i class="stand_icon icon-info" data-icon-code="icon-info"></i></li><li class="stand_social"><i class="stand_icon icon-exclamation" data-icon-code="icon-exclamation"></i></li><li class="stand_social"><i class="stand_icon icon-superscript" data-icon-code="icon-superscript"></i></li><li class="stand_social"><i class="stand_icon icon-subscript" data-icon-code="icon-subscript"></i></li><li class="stand_social"><i class="stand_icon icon-eraser" data-icon-code="icon-eraser"></i></li><li class="stand_social"><i class="stand_icon icon-puzzle-piece" data-icon-code="icon-puzzle-piece"></i></li><li class="stand_social"><i class="stand_icon icon-microphone" data-icon-code="icon-microphone"></i></li><li class="stand_social"><i class="stand_icon icon-microphone-slash" data-icon-code="icon-microphone-slash"></i></li><li class="stand_social"><i class="stand_icon icon-shield" data-icon-code="icon-shield"></i></li><li class="stand_social"><i class="stand_icon icon-calendar-o" data-icon-code="icon-calendar-o"></i></li><li class="stand_social"><i class="stand_icon icon-fire-extinguisher" data-icon-code="icon-fire-extinguisher"></i></li><li class="stand_social"><i class="stand_icon icon-rocket" data-icon-code="icon-rocket"></i></li><li class="stand_social"><i class="stand_icon icon-maxcdn" data-icon-code="icon-maxcdn"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-circle-left" data-icon-code="icon-chevron-circle-left"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-circle-right" data-icon-code="icon-chevron-circle-right"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-circle-up" data-icon-code="icon-chevron-circle-up"></i></li><li class="stand_social"><i class="stand_icon icon-chevron-circle-down" data-icon-code="icon-chevron-circle-down"></i></li><li class="stand_social"><i class="stand_icon icon-html5" data-icon-code="icon-html5"></i></li><li class="stand_social"><i class="stand_icon icon-css3" data-icon-code="icon-css3"></i></li><li class="stand_social"><i class="stand_icon icon-anchor" data-icon-code="icon-anchor"></i></li><li class="stand_social"><i class="stand_icon icon-unlock-alt" data-icon-code="icon-unlock-alt"></i></li><li class="stand_social"><i class="stand_icon icon-bullseye" data-icon-code="icon-bullseye"></i></li><li class="stand_social"><i class="stand_icon icon-ellipsis-h" data-icon-code="icon-ellipsis-h"></i></li><li class="stand_social"><i class="stand_icon icon-ellipsis-v" data-icon-code="icon-ellipsis-v"></i></li><li class="stand_social"><i class="stand_icon icon-rss-square" data-icon-code="icon-rss-square"></i></li><li class="stand_social"><i class="stand_icon icon-play-circle" data-icon-code="icon-play-circle"></i></li><li class="stand_social"><i class="stand_icon icon-ticket" data-icon-code="icon-ticket"></i></li><li class="stand_social"><i class="stand_icon icon-minus-square" data-icon-code="icon-minus-square"></i></li><li class="stand_social"><i class="stand_icon icon-minus-square-o" data-icon-code="icon-minus-square-o"></i></li><li class="stand_social"><i class="stand_icon icon-level-up" data-icon-code="icon-level-up"></i></li><li class="stand_social"><i class="stand_icon icon-level-down" data-icon-code="icon-level-down"></i></li><li class="stand_social"><i class="stand_icon icon-check-square" data-icon-code="icon-check-square"></i></li><li class="stand_social"><i class="stand_icon icon-pencil-square" data-icon-code="icon-pencil-square"></i></li><li class="stand_social"><i class="stand_icon icon-external-link-square" data-icon-code="icon-external-link-square"></i></li><li class="stand_social"><i class="stand_icon icon-share-square" data-icon-code="icon-share-square"></i></li><li class="stand_social"><i class="stand_icon icon-compass" data-icon-code="icon-compass"></i></li><li class="stand_social"><i class="stand_icon icon-caret-square-o-down" data-icon-code="icon-caret-square-o-down"></i></li><li class="stand_social"><i class="stand_icon icon-caret-square-o-up" data-icon-code="icon-caret-square-o-up"></i></li><li class="stand_social"><i class="stand_icon icon-caret-square-o-right" data-icon-code="icon-caret-square-o-right"></i></li><li class="stand_social"><i class="stand_icon icon-eur" data-icon-code="icon-eur"></i></li><li class="stand_social"><i class="stand_icon icon-gbp" data-icon-code="icon-gbp"></i></li><li class="stand_social"><i class="stand_icon icon-usd" data-icon-code="icon-usd"></i></li><li class="stand_social"><i class="stand_icon icon-inr" data-icon-code="icon-inr"></i></li><li class="stand_social"><i class="stand_icon icon-jpy" data-icon-code="icon-jpy"></i></li><li class="stand_social"><i class="stand_icon icon-rub" data-icon-code="icon-rub"></i></li><li class="stand_social"><i class="stand_icon icon-krw" data-icon-code="icon-krw"></i></li><li class="stand_social"><i class="stand_icon icon-btc" data-icon-code="icon-btc"></i></li><li class="stand_social"><i class="stand_icon icon-file" data-icon-code="icon-file"></i></li><li class="stand_social"><i class="stand_icon icon-file-text" data-icon-code="icon-file-text"></i></li><li class="stand_social"><i class="stand_icon icon-sort-alpha-asc" data-icon-code="icon-sort-alpha-asc"></i></li><li class="stand_social"><i class="stand_icon icon-sort-alpha-desc" data-icon-code="icon-sort-alpha-desc"></i></li><li class="stand_social"><i class="stand_icon icon-sort-amount-asc" data-icon-code="icon-sort-amount-asc"></i></li><li class="stand_social"><i class="stand_icon icon-sort-amount-desc" data-icon-code="icon-sort-amount-desc"></i></li><li class="stand_social"><i class="stand_icon icon-sort-numeric-asc" data-icon-code="icon-sort-numeric-asc"></i></li><li class="stand_social"><i class="stand_icon icon-sort-numeric-desc" data-icon-code="icon-sort-numeric-desc"></i></li><li class="stand_social"><i class="stand_icon icon-thumbs-up" data-icon-code="icon-thumbs-up"></i></li><li class="stand_social"><i class="stand_icon icon-thumbs-down" data-icon-code="icon-thumbs-down"></i></li><li class="stand_social"><i class="stand_icon icon-youtube-square" data-icon-code="icon-youtube-square"></i></li><li class="stand_social"><i class="stand_icon icon-youtube" data-icon-code="icon-youtube"></i></li><li class="stand_social"><i class="stand_icon icon-xing" data-icon-code="icon-xing"></i></li><li class="stand_social"><i class="stand_icon icon-xing-square" data-icon-code="icon-xing-square"></i></li><li class="stand_social"><i class="stand_icon icon-youtube-play" data-icon-code="icon-youtube-play"></i></li><li class="stand_social"><i class="stand_icon icon-dropbox" data-icon-code="icon-dropbox"></i></li><li class="stand_social"><i class="stand_icon icon-stack-overflow" data-icon-code="icon-stack-overflow"></i></li><li class="stand_social"><i class="stand_icon icon-instagram" data-icon-code="icon-instagram"></i></li><li class="stand_social"><i class="stand_icon icon-flickr" data-icon-code="icon-flickr"></i></li><li class="stand_social"><i class="stand_icon icon-adn" data-icon-code="icon-adn"></i></li><li class="stand_social"><i class="stand_icon icon-bitbucket" data-icon-code="icon-bitbucket"></i></li><li class="stand_social"><i class="stand_icon icon-bitbucket-square" data-icon-code="icon-bitbucket-square"></i></li><li class="stand_social"><i class="stand_icon icon-tumblr" data-icon-code="icon-tumblr"></i></li><li class="stand_social"><i class="stand_icon icon-tumblr-square" data-icon-code="icon-tumblr-square"></i></li><li class="stand_social"><i class="stand_icon icon-long-arrow-down" data-icon-code="icon-long-arrow-down"></i></li><li class="stand_social"><i class="stand_icon icon-long-arrow-up" data-icon-code="icon-long-arrow-up"></i></li><li class="stand_social"><i class="stand_icon icon-long-arrow-left" data-icon-code="icon-long-arrow-left"></i></li><li class="stand_social"><i class="stand_icon icon-long-arrow-right" data-icon-code="icon-long-arrow-right"></i></li><li class="stand_social"><i class="stand_icon icon-apple" data-icon-code="icon-apple"></i></li><li class="stand_social"><i class="stand_icon icon-windows" data-icon-code="icon-windows"></i></li><li class="stand_social"><i class="stand_icon icon-android" data-icon-code="icon-android"></i></li><li class="stand_social"><i class="stand_icon icon-linux" data-icon-code="icon-linux"></i></li><li class="stand_social"><i class="stand_icon icon-dribbble" data-icon-code="icon-dribbble"></i></li><li class="stand_social"><i class="stand_icon icon-skype" data-icon-code="icon-skype"></i></li><li class="stand_social"><i class="stand_icon icon-foursquare" data-icon-code="icon-foursquare"></i></li><li class="stand_social"><i class="stand_icon icon-trello" data-icon-code="icon-trello"></i></li><li class="stand_social"><i class="stand_icon icon-female" data-icon-code="icon-female"></i></li><li class="stand_social"><i class="stand_icon icon-male" data-icon-code="icon-male"></i></li><li class="stand_social"><i class="stand_icon icon-gittip" data-icon-code="icon-gittip"></i></li><li class="stand_social"><i class="stand_icon icon-sun-o" data-icon-code="icon-sun-o"></i></li><li class="stand_social"><i class="stand_icon icon-moon-o" data-icon-code="icon-moon-o"></i></li><li class="stand_social"><i class="stand_icon icon-archive" data-icon-code="icon-archive"></i></li><li class="stand_social"><i class="stand_icon icon-bug" data-icon-code="icon-bug"></i></li><li class="stand_social"><i class="stand_icon icon-vk" data-icon-code="icon-vk"></i></li><li class="stand_social"><i class="stand_icon icon-weibo" data-icon-code="icon-weibo"></i></li><li class="stand_social"><i class="stand_icon icon-renren" data-icon-code="icon-renren"></i></li><li class="stand_social"><i class="stand_icon icon-pagelines" data-icon-code="icon-pagelines"></i></li><li class="stand_social"><i class="stand_icon icon-stack-exchange" data-icon-code="icon-stack-exchange"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-o-right" data-icon-code="icon-arrow-circle-o-right"></i></li><li class="stand_social"><i class="stand_icon icon-arrow-circle-o-left" data-icon-code="icon-arrow-circle-o-left"></i></li><li class="stand_social"><i class="stand_icon icon-caret-square-o-left" data-icon-code="icon-caret-square-o-left"></i></li><li class="stand_social"><i class="stand_icon icon-dot-circle-o" data-icon-code="icon-dot-circle-o"></i></li><li class="stand_social"><i class="stand_icon icon-wheelchair" data-icon-code="icon-wheelchair"></i></li><li class="stand_social"><i class="stand_icon icon-vimeo-square" data-icon-code="icon-vimeo-square"></i></li><li class="stand_social"><i class="stand_icon icon-try" data-icon-code="icon-try"></i></li><li class="stand_social"><i class="stand_icon icon-plus-square-o" data-icon-code="icon-plus-square-o"></i></li><li class="stand_social"><i class="stand_icon icon-space-shuttle" data-icon-code="icon-space-shuttle"></i></li><li class="stand_social"><i class="stand_icon icon-slack" data-icon-code="icon-slack"></i></li><li class="stand_social"><i class="stand_icon icon-envelope-square" data-icon-code="icon-envelope-square"></i></li><li class="stand_social"><i class="stand_icon icon-wordpress" data-icon-code="icon-wordpress"></i></li><li class="stand_social"><i class="stand_icon icon-openid" data-icon-code="icon-openid"></i></li><li class="stand_social"><i class="stand_icon icon-university" data-icon-code="icon-university"></i></li><li class="stand_social"><i class="stand_icon icon-graduation-cap" data-icon-code="icon-graduation-cap"></i></li><li class="stand_social"><i class="stand_icon icon-yahoo" data-icon-code="icon-yahoo"></i></li><li class="stand_social"><i class="stand_icon icon-google" data-icon-code="icon-google"></i></li><li class="stand_social"><i class="stand_icon icon-reddit" data-icon-code="icon-reddit"></i></li><li class="stand_social"><i class="stand_icon icon-reddit-square" data-icon-code="icon-reddit-square"></i></li><li class="stand_social"><i class="stand_icon icon-stumbleupon-circle" data-icon-code="icon-stumbleupon-circle"></i></li><li class="stand_social"><i class="stand_icon icon-stumbleupon" data-icon-code="icon-stumbleupon"></i></li><li class="stand_social"><i class="stand_icon icon-delicious" data-icon-code="icon-delicious"></i></li><li class="stand_social"><i class="stand_icon icon-digg" data-icon-code="icon-digg"></i></li><li class="stand_social"><i class="stand_icon icon-pied-piper" data-icon-code="icon-pied-piper"></i></li><li class="stand_social"><i class="stand_icon icon-pied-piper-alt" data-icon-code="icon-pied-piper-alt"></i></li><li class="stand_social"><i class="stand_icon icon-drupal" data-icon-code="icon-drupal"></i></li><li class="stand_social"><i class="stand_icon icon-joomla" data-icon-code="icon-joomla"></i></li><li class="stand_social"><i class="stand_icon icon-language" data-icon-code="icon-language"></i></li><li class="stand_social"><i class="stand_icon icon-fax" data-icon-code="icon-fax"></i></li><li class="stand_social"><i class="stand_icon icon-building" data-icon-code="icon-building"></i></li><li class="stand_social"><i class="stand_icon icon-child" data-icon-code="icon-child"></i></li><li class="stand_social"><i class="stand_icon icon-paw" data-icon-code="icon-paw"></i></li><li class="stand_social"><i class="stand_icon icon-spoon" data-icon-code="icon-spoon"></i></li><li class="stand_social"><i class="stand_icon icon-cube" data-icon-code="icon-cube"></i></li><li class="stand_social"><i class="stand_icon icon-cubes" data-icon-code="icon-cubes"></i></li><li class="stand_social"><i class="stand_icon icon-behance" data-icon-code="icon-behance"></i></li><li class="stand_social"><i class="stand_icon icon-behance-square" data-icon-code="icon-behance-square"></i></li><li class="stand_social"><i class="stand_icon icon-steam" data-icon-code="icon-steam"></i></li><li class="stand_social"><i class="stand_icon icon-steam-square" data-icon-code="icon-steam-square"></i></li><li class="stand_social"><i class="stand_icon icon-recycle" data-icon-code="icon-recycle"></i></li><li class="stand_social"><i class="stand_icon icon-car" data-icon-code="icon-car"></i></li><li class="stand_social"><i class="stand_icon icon-taxi" data-icon-code="icon-taxi"></i></li><li class="stand_social"><i class="stand_icon icon-tree" data-icon-code="icon-tree"></i></li><li class="stand_social"><i class="stand_icon icon-spotify" data-icon-code="icon-spotify"></i></li><li class="stand_social"><i class="stand_icon icon-deviantart" data-icon-code="icon-deviantart"></i></li><li class="stand_social"><i class="stand_icon icon-soundcloud" data-icon-code="icon-soundcloud"></i></li><li class="stand_social"><i class="stand_icon icon-database" data-icon-code="icon-database"></i></li><li class="stand_social"><i class="stand_icon icon-file-pdf-o" data-icon-code="icon-file-pdf-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-word-o" data-icon-code="icon-file-word-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-excel-o" data-icon-code="icon-file-excel-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-powerpoint-o" data-icon-code="icon-file-powerpoint-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-image-o" data-icon-code="icon-file-image-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-archive-o" data-icon-code="icon-file-archive-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-audio-o" data-icon-code="icon-file-audio-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-video-o" data-icon-code="icon-file-video-o"></i></li><li class="stand_social"><i class="stand_icon icon-file-code-o" data-icon-code="icon-file-code-o"></i></li><li class="stand_social"><i class="stand_icon icon-vine" data-icon-code="icon-vine"></i></li><li class="stand_social"><i class="stand_icon icon-codepen" data-icon-code="icon-codepen"></i></li><li class="stand_social"><i class="stand_icon icon-jsfiddle" data-icon-code="icon-jsfiddle"></i></li><li class="stand_social"><i class="stand_icon icon-life-ring" data-icon-code="icon-life-ring"></i></li><li class="stand_social"><i class="stand_icon icon-circle-o-notch" data-icon-code="icon-circle-o-notch"></i></li><li class="stand_social"><i class="stand_icon icon-rebel" data-icon-code="icon-rebel"></i></li><li class="stand_social"><i class="stand_icon icon-empire" data-icon-code="icon-empire"></i></li><li class="stand_social"><i class="stand_icon icon-git-square" data-icon-code="icon-git-square"></i></li><li class="stand_social"><i class="stand_icon icon-git" data-icon-code="icon-git"></i></li><li class="stand_social"><i class="stand_icon icon-hacker-news" data-icon-code="icon-hacker-news"></i></li><li class="stand_social"><i class="stand_icon icon-tencent-weibo" data-icon-code="icon-tencent-weibo"></i></li><li class="stand_social"><i class="stand_icon icon-qq" data-icon-code="icon-qq"></i></li><li class="stand_social"><i class="stand_icon icon-weixin" data-icon-code="icon-weixin"></i></li><li class="stand_social"><i class="stand_icon icon-paper-plane" data-icon-code="icon-paper-plane"></i></li><li class="stand_social"><i class="stand_icon icon-paper-plane-o" data-icon-code="icon-paper-plane-o"></i></li><li class="stand_social"><i class="stand_icon icon-history" data-icon-code="icon-history"></i></li><li class="stand_social"><i class="stand_icon icon-circle-thin" data-icon-code="icon-circle-thin"></i></li><li class="stand_social"><i class="stand_icon icon-header" data-icon-code="icon-header"></i></li><li class="stand_social"><i class="stand_icon icon-paragraph" data-icon-code="icon-paragraph"></i></li><li class="stand_social"><i class="stand_icon icon-sliders" data-icon-code="icon-sliders"></i></li><li class="stand_social"><i class="stand_icon icon-share-alt" data-icon-code="icon-share-alt"></i></li><li class="stand_social"><i class="stand_icon icon-share-alt-square" data-icon-code="icon-share-alt-square"></i></li><li class="stand_social"><i class="stand_icon icon-bomb" data-icon-code="icon-bomb"></i></li></ul></div>');

		jQuery(document).on('click', '.show_menu_icon', function(){
			insert_id = jQuery(this).attr('data-id');
			jQuery('.menu_icons_fadder').fadeIn(300);
			jQuery('.menu_icons_popup').fadeIn(300);
		});
		jQuery('.menu_icons_fadder').click(function(){
			jQuery('.menu_icons_fadder').fadeOut(300);
			jQuery('.menu_icons_popup').fadeOut(300);
		});
		jQuery('.menu_icons_popup').find('li').click(function(){
			jQuery('#'+insert_id).val(jQuery(this).find('i').attr('data-icon-code'));
			jQuery('.show_menu_icon[data-id='+insert_id+']').find('i').removeClass().addClass(jQuery(this).find('i').attr('data-icon-code'));
			jQuery('.menu_icons_fadder').fadeOut(300);
			jQuery('.menu_icons_popup').fadeOut(300);
			insert_id = '';
		});
	}

    /* SIDEBAR MANAGER */
    jQuery(document).on('click', '.admin_create_new_sidebar_btn', function () {
        var sidebar_name = jQuery(this).parents('.add_new_sidebar').find('.admin_create_new_sidebar').val();
        if (sidebar_name == "") {
            alert("Sidebar must be named");
            return false;
        }
        jQuery(this).parents('.admin_mix-tab-control').find('.admin_sidebars_list').append('<div class="admin_sidebar_item"><input type="hidden" name="theme_sidebars[]" value="' + sidebar_name + '"><span class="admin_sidebar_name admin_visual_style1">' + sidebar_name + '</span><input type="button" class="admin_delete_this_sidebar admin_img_button cross" name="delete_this_sidebar" value="X"></div>');
        jQuery(this).parents('.add_new_sidebar').find('.create_new_sidebar').val("");
    });
    jQuery(document).on('click', '.admin_delete_this_sidebar', function () {
        var agree = confirm("Are you sure?");
        if (!agree)
            return false;
        jQuery(this).parents('.admin_sidebar_item').remove();
    });
    /* END SIDEBAR MANAGER */


    /*
     Hide/Show tabs
     */
    jQuery('.admin_l-mix-tabs-item').click(function () {
        jQuery('.admin_l-mix-tabs-item').removeClass('active');
        jQuery('.admin_mix-tab').hide();

        var data_tabname = jQuery(this).find('.admin_l-mix-tab-title').attr('data-tabname');

        jQuery(this).addClass('active');
        jQuery('.' + data_tabname).show();
        jQuery('#form-tab-id').val(data_tabname);

        return false;
    });

    /*
     Hide/Show tabs
     */
    jQuery('.admin_l-mix-tabs-list li').first().addClass('active');
    jQuery('.admin_mix-tabs .admin_mix-tab').first().show();

    /*
     Autoopen tab in admin
     */
    var admin_tab_now_open = jQuery('#form-tab-id').val();
    if (admin_tab_now_open !== "") {
        jQuery('.admin_l-mix-tabs-item').removeClass('active');
        jQuery('#' + admin_tab_now_open).addClass('active');
        jQuery('.admin_mix-tab').hide();
        jQuery('.' + admin_tab_now_open).show();
    }

    jQuery('.fadeout').delay(2000).fadeOut("slow");


    // ajax button
    jQuery('.admin_mix_ajax_button').click(function () {

        var $this = jQuery(this),
            $loader = $this.next(),
            $msgs = $loader.next(),
            id = $this.data('id'),
            _confirm = $this.data('confirm') || true,
            data = window.ajaxButtonData[id];

        if (_confirm) {
            if (!confirm('Are you sure?')) {
                return false;
            }
            ;
        }
        ;

        $loader.show();
        jQuery.post(admin_ajax, data, function (data) {
            $loader.hide();
        }, 'json');

        return false;
    });

    jQuery(document).on('keyup', '.itemTitle', function () {
        var thistitle = jQuery(this).val();
        jQuery(this).parents(".thisitem").find(".echotitle").html(thistitle);
    });

    jQuery(document).on('keyup', '.price_feature .expanded_text1', function () {
        var thistitle = jQuery(this).val();
        jQuery(this).parents(".price_feature").find(".option_title").html(thistitle);
    });

    jQuery(document).on("click", ".deleteThisSlide", function () {

        var temp = jQuery(this).parents(".mainPageSliderItem").find("li");

        jQuery(this).parents("li").remove();

        var tempi = -1;
        temp.each(function (index) {
            jQuery(this).find(".itemorder").val(tempi);
            tempi = tempi + 1;
        });

    });

    jQuery(document).on("click", ".editThisSlide", function () {
        jQuery(this).parents(".thisitem").find(".hiddenArea").fadeToggle();
    });

    jQuery(document).on("click", ".uploadImg", function () {
        formfield = jQuery('.uploadImg').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        window.thisUploadButton = jQuery(this);

        window.send_to_editor = function (html) {
            imgurl = jQuery('img', html).attr('src');
            thisUploadButton.parents(".fr").find(".itemImage").val(imgurl);
            tb_remove();
        }

        return false;
    });

    jQuery(document).on("click", ".gt3UploadImg", function () {
        formfield = jQuery(this).attr('name');
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        window.thisUploadButton = jQuery(this);

        window.send_to_editor = function (html) {
            imgurl = jQuery('img', html).attr('src');
            thisUploadButton.val(imgurl);
            tb_remove();
        }

        return false;
    });


    jQuery(window).load(function () {
        /* COLOR PICKER */
        jQuery('.cpicker').ColorPicker({
            onSubmit:function (hsb, hex, rgb, el) {
                jQuery(el).val(hex);
                jQuery(el).ColorPickerHide();
                jQuery(".cpicker.focused").next().css("background-color", "#" + hex);
            },
            onBeforeShow:function () {
                jQuery(this).ColorPickerSetColor(this.value);
            },
            onHide:function () {
                jQuery("input").removeClass("focused");
            },
            onChange:function (hsb, hex, rgb) {
                jQuery(".cpicker.focused").val(hex);
                jQuery(".cpicker.focused").next().css("background-color", "#" + hex);
            }
        })
            .bind('keyup', function () {
                jQuery(this).ColorPickerSetColor(this.value);
            });


        /* POST FORMATS */
        /* list of all containers: #portslides_sectionid_inner, #audio_sectionid_inner, #video_sectionid_inner, #default_sectionid_inner */
        var nowpostformat = jQuery('#post-formats-select input:checked').val();
        var nowNEWpostformat = jQuery('.post-format-options a.active').attr("data-wp-format");

        if (nowpostformat == 'image' || nowNEWpostformat == 'image') {
            jQuery('#portslides_sectionid_inner').show();
        }
        if (nowpostformat == 'video') {
            jQuery('#video_sectionid_inner').show();
        }
        if (nowpostformat == 'audio') {
            jQuery('#audio_sectionid_inner').show();
        }
        if (nowpostformat == '0' || nowNEWpostformat == 'standard') {
            jQuery('#default_sectionid_inner').show();
        }

        /* ON CHANGE */
        /* WP <=3.5 */
        jQuery('#post-formats-select input').click(function () {
            jQuery('#portslides_sectionid_inner, #audio_sectionid_inner, #video_sectionid_inner, #default_sectionid_inner').hide();
            var nowclickformat = jQuery(this).val();
            if (nowclickformat == 'image') {
                jQuery('#portslides_sectionid_inner').show();
            }
            if (nowclickformat == 'audio') {
                jQuery('#audio_sectionid_inner').show();
            }
            if (nowclickformat == 'video') {
                jQuery('#video_sectionid_inner').show();
            }
            if (nowclickformat == '0') {
                jQuery('#default_sectionid_inner').show();
            }
        });
        /* WP >=3.6 */
        jQuery('.post-format-options a').click(function () {
            jQuery('#portslides_sectionid_inner, #audio_sectionid_inner, #video_sectionid_inner, #default_sectionid_inner').hide();
            var nowclickformat = jQuery(this).attr("data-wp-format");
            if (nowclickformat == 'image') {
                jQuery('#portslides_sectionid_inner').show();
            }
            if (nowclickformat == 'standard') {
                jQuery('#default_sectionid_inner').show();
            }
        });

        /* Show tab on start */
        if (jQuery("#form-tab-id").val() == "") {
            jQuery("#form-tab-id").val(jQuery(".l-mix-tabs-list li.active a").attr("data-tabname"))
        }

        jQuery(".cpicker.admin_textoption").each(function (index) {
            var already_selected_color = jQuery(this).val();
            jQuery(this).next().css("background-color", "#" + already_selected_color);
        });

        jQuery('.cpicker.admin_textoption').keyup(function (event) {
            var now_enter_color = jQuery(this).val();
            jQuery(this).next().css("background-color", "#" + now_enter_color);
        });

    });

    jQuery('.cpicker').focus(function () {
        jQuery(this).addClass("focused");
    });

    /* SELECT BOX */
    jQuery(".admin_mix-container select, .admin_newselect, .strip_select").selectBox();
    /* END SELECT BOX */

    jQuery(document).ready(function () {
		jQuery('.custom_select_img_preview').click(function(){
			jQuery(this).find('img').remove();
			jQuery('.custom_select_img_attachid').val('');
		});
		
		if (jQuery('.sidebar_layout').val() == 'none') {
			jQuery('.sidebar_none').slideUp(1);
		}
		if (jQuery('.sidebar_layout').val() == 'default') {
			if (jQuery('.select_sidebar').hasClass('sidebar_none')) {
				jQuery('.sidebar_none').slideUp(1);
			}			
		}
		
		jQuery('.sidebar_layout').change(function(){
			if (jQuery(this).val() == 'no-sidebar') {
				jQuery('.select_sidebar').stop().slideUp(300);
			} else {
				jQuery('.select_sidebar').stop().slideDown(300);
			}
			if (jQuery(this).val() == 'default') {
				if (jQuery('.select_sidebar').hasClass('sidebar_none')) {
					jQuery('.select_sidebar').stop().slideUp(300);
				} else {
					jQuery('.select_sidebar').stop().slideDown(300);
				}
			}
		});

		if (jQuery('.page_layout').val() == 'clean') {
			jQuery('.boxed_options').slideUp(1);
		}
		if (jQuery('.page_layout').val() == 'default') {
			if (jQuery('.boxed_options').hasClass('no_boxed')) {
				jQuery('.boxed_options').slideUp(1);
			}			
		}

		jQuery('.page_layout').change(function(){
			if (jQuery(this).val() == 'clean') {
				jQuery('.boxed_options').stop().slideUp(300);
			} else {
				jQuery('.boxed_options').stop().slideDown(300);
			}
			if (jQuery(this).val() == 'default') {
				if (jQuery('.boxed_options').hasClass('no_boxed')) {
					jQuery('.boxed_options').stop().slideUp(300);
				} else {
					jQuery('.boxed_options').stop().slideDown(300);
				}
			}
		});
		
        jQuery('select.fontselector').change(function () {
            var newval = jQuery(this).val();

            var customfontstatus = "disabled";

            if(fontsarray.length>0){
                for ( keyVar in fontsarray ) {
                    if (newval==fontsarray[keyVar]) {
                        customfontstatus = "enabled";
                    }
                }
            }

            if (customfontstatus!=="enabled") {
                newval_font = newval.replace(new RegExp(" ", 'g'), "+");
                if (newval_font !== "Arial" && newval_font !== "Verdana" && newval_font !== "Times New Roman" && newval_font !== "Helvetica" && newval_font !== "Courier New" && newval_font !== "Tahoma") {
                    jQuery("head").append("<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=" + newval_font + "'>");
                }
                jQuery(this).parents(".admin_input").find(".font_preview").css("font-family", newval);
            } else {
                jQuery(this).parents(".admin_input").find(".font_preview").css("font-family", newval);
            }
        });

        jQuery("select.fontselector").each(function(){
            jQuery(this).triggerHandler("change");
        })


    });

});

function remove_responce_message () {
    jQuery("#wpwrap").css("opacity", "1");
    jQuery(".result_message").remove();
}

/* SAVING ADMIN SETTINGS WITH AJAX */
jQuery("document").ready(function($) {
    jQuery(".admin_page_settings .admin_save_all").click(function() {
        jQuery("#wpwrap").css("opacity", "0.5");
        var data = jQuery(".admin_page_settings").serialize();
        jQuery.post(ajaxurl, { action:'save_admin_settings', json_string:data }, function(response) {
            jQuery("body").append("<div class='result_message'>"+response+"</div>");
            setTimeout(remove_responce_message , 2000);
        });
        return false;
    });
    jQuery(".admin_page_settings .admin_reset_settings").click(function() {
        var agree = confirm("Are you sure?");
        if (!agree)
            return false;
        jQuery("#wpwrap").css("opacity", "0.5");
        jQuery.post(ajaxurl, { action:'reset_admin_settings' }, function(response) {
            jQuery("body").append("<div class='result_message'>"+response+"</div>");
            setTimeout(remove_responce_message , 2000);
            window.location.reload();
        });
        return false;
    });

    jQuery(".add-new-strip").click(function(){
        var data = {
            action:'get_unused_id_ajax'
        };
        var striproottag = jQuery(this);

        waiting_state_start();

        jQuery.post(ajaxurl, data, function (response) {


            striproottag.parents(".gt3settings_box_content").find(".append_items").append('<li class="strip_block"><div class="sort_drug strip_head">Strip item</div><div class="strip_block_container"><input type="text" value="" name="pagebuilder[strips][' + response + '][striptitle1]" placeholder="Title 1" class="strip_input"><input type="text" value="" name="pagebuilder[strips][' + response + '][striptitle2]" placeholder="Title 2" class="strip_input"><input type="text" placeholder="Button Text" name="pagebuilder[strips][' + response + '][linktext]" value="" class="strip_input"><input type="text" placeholder="Link" name="pagebuilder[strips][' + response + '][link]" value="" class="strip_input"><input type="text" placeholder="Image" name="pagebuilder[strips][' + response + '][image]" value="" class="gt3UploadImg strip_input"><span class="remove_strip">[x]</span></div></li>');
            jQuery('.strip_cont .append_items').sortable({ placeholder:'ui-state-highlight', handle:'.sort_drug' });
			jQuery(".strip_select").selectBox();
            waiting_state_end();			
        });
    });

    jQuery('.strip_cont .append_items').sortable({ placeholder:'ui-state-highlight', handle:'.sort_drug' });

    jQuery(document).on('click', '.remove_strip', function () {
        jQuery(this).parents("li").remove();
    });
});


var file_frame;
jQuery('.add_image_from_wordpress_library_popup').live('click', function( event ){
    var custom_select_select_image = jQuery(this).parents(".boxed_options");
    event.preventDefault();

    if ( file_frame ) {
        file_frame.open();
        return;
    }

    file_frame = wp.media.frames.file_frame = wp.media({
        title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        multiple: false
    });

    file_frame.on( 'select', function() {
        attachment = file_frame.state().get('selection').first().toJSON();
        custom_select_select_image.find(".custom_select_img_attachid").val(attachment.id);
       	custom_select_select_image.find(".custom_select_img_preview").html("<img src='"+attachment.url+"' alt=''>");
    });

    file_frame.open();
});

var file_frame_new;
jQuery('.select_attach_id_from_media_library').live('click', function( event ){
    var select_image_root = jQuery(this).parents(".select_image_root");
    event.preventDefault();

    if ( file_frame_new ) {
        file_frame_new.open();
        return;
    }

    file_frame_new = wp.media.frames.file_frame = wp.media({
        title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        multiple: false
    });

    file_frame_new.on( 'select', function() {
        attachment = file_frame_new.state().get('selection').first().toJSON();
        select_image_root.find(".select_img_attachid").val(attachment.id);
        select_image_root.find(".select_img_preview").html("<img src='"+attachment.url+"' alt=''>");
    });

    file_frame_new.open();
});

function add_menu_item() {
	jQuery('.field-css-classes').each(function(){
		if(jQuery(this).find('.show_menu_icon').size() > 0) {} else {
			jQuery(this).find('label').before('<label class="choose_icon_label">Choose menu icon:</label><div class="icon-bookmark-o show_menu_icon" data-id="'+jQuery(this).find('input.edit-menu-item-classes').attr('id')+'"><i class="icon-bookmark-o"></i></div>');
			jQuery(this).find('.edit-menu-item-classes').val('icon-bookmark-o');
		}
	});			
}
