"use strict";
//window.jQuery = window.$ = jQuery;
var header = jQuery('.main_header'),
    footer = jQuery('footer'),
    logo = jQuery('.logo'),
    window_h = jQuery(window).height(),
    window_w = jQuery(window).width(),
    socials_wrapper = jQuery('.socials_wrapper'),
    socials_list = jQuery('.socials_list'),
    left_sidebar = jQuery('.left-sidebar-block'),
    right_sidebar = jQuery('.right-sidebar-block'),
    main_wrapper = jQuery('.main_wrapper'),
    flcontainer = jQuery('.fl-container');

jQuery(document).ready(function ($) {
    content_update();
    if (jQuery('.flickr_widget_wrapper').size() > 0) {
        jQuery('.flickr_badge_image a').each(function () {
            jQuery(this).append('<div class="flickr_fadder"></div>');
        });
    }
    header.find('.sub-menu li').each(function () {
        if (jQuery(this).hasClass('current-menu-item')) {
            jQuery(this).removeClass();
            jQuery(this).addClass('current-menu-item');
        } else if (jQuery(this).hasClass('current-menu-parent')) {
            jQuery(this).removeClass();
            jQuery(this).addClass('current-menu-parent');
        } else {
            jQuery(this).removeClass();
        }
    });
    header.find('.header_wrapper').append('<a href="javascript:void(0)" class="menu_toggler"></a>');
    header.append('<div class="mobile_menu_wrapper"><ul class="mobile_menu container"/></div>');
    jQuery('.mobile_menu').html(header.find('.menu').html());
    jQuery('.mobile_menu_wrapper').hide();
    jQuery('.menu_toggler').click(function () {
        jQuery('.mobile_menu_wrapper').slideToggle(300);
        jQuery('.main_header').toggleClass('opened');
    });
    setTimeout("jQuery('body').animate({'opacity' : '1'}, 500)", 500);

    socials_list.width(socials_list.find('li').size() * 40);
    socials_wrapper.width(socials_list.find('li').size() * 40);
    jQuery('.socials_toggler').click(function () {
        jQuery(this).toggleClass('toggled');
        socials_wrapper.toggleClass('hided');
    });
	
	if (jQuery('.wrapper404').size() > 0) {    
        jQuery('.wrapper404').css('top', (window_h - jQuery('.wrapper404').height()) / 2 + (header.height() / 2) + 'px');
    }
});

jQuery(window).resize(function () {
    window_h = jQuery(window).height();
    window_w = jQuery(window).width();
    content_update();
	if (jQuery('.wrapper404').size() > 0) {    
        jQuery('.wrapper404').css('top', (window_h - jQuery('.wrapper404').height()) / 2 + (header.height() / 2) + 'px');
    }
	});

jQuery(window).load(function () {
    content_update();
});

function content_update() {
    if (jQuery(window).width() > 760) {
        main_wrapper.css('min-height', window_h - header.height() - footer.height() - parseInt(main_wrapper.css('padding-top')) - parseInt(main_wrapper.css('padding-bottom')) - 4 + 'px');
        if (jQuery('.module_layer_slider').size() > 0 && jQuery('.module_layer_slider').hasClass('first-module') && jQuery('.page_title_block').size() == 0) {
            jQuery('.module_layer_slider.first-module').css('margin-top', -1 * (header.height() + parseInt(main_wrapper.css('padding-top'))));
        }

        logo.css('margin-top', (header.height() - logo.height()) / 2);
        if (left_sidebar.size() > 0 && flcontainer.height() - 16 > left_sidebar.height()) {
            left_sidebar.css('min-height', flcontainer.height() - 16);
        }
        if (right_sidebar.size() > 0 && flcontainer.height() - 16 > right_sidebar.height()) {
            right_sidebar.css('min-height', flcontainer.height() - 16);
        }
    } else {
        if (jQuery('.module_layer_slider').size() > 0 && jQuery('.module_layer_slider').hasClass('first-module') && jQuery('.page_title_block').size() == 0) {
            jQuery('.module_layer_slider.first-module').css('margin-top', '-30px');
        }
    }
}