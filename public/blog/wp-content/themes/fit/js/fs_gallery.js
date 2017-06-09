/* 
 Gallery Slider Script
 Version : 1.0.1
 Site	: under construction
 ---
 Author	: Art Dark
 License : MIT License / GPL License
 */

jQuery.fn.fs_gallery = function (fs_options) {
    //Set Variables
    var fs_el = jQuery(this),
        fs_base = this;
    var fs_interval = setInterval('nextSlide()', fs_options.slide_time);

    if (fs_options.thmb_state == 'off') {
        set_state = "fs_hide";
    } else {
        set_state = "";
    }
    if (fs_options.autoplay == 0) {
        playpause = "fs_play";
        clearInterval(fs_interval);
    } else {
        playpause = "fs_pause";
    }
    if (jQuery(window).width() > 860) {
        thmb_item_width = 120;
    } else if ((jQuery(window).width() < 860) && (jQuery(window).width() > 400)) {
        thmb_item_width = 60;
    } else {
        thmb_item_width = 40;
    }
    jQuery('body').append('<div class="fs_gallery_wrapper"><ul class="' + fs_options.fit + ' fs_gallery_container ' + fs_options.fx + '"/></div>');
    $fs_container = jQuery('.fs_gallery_container');
    $fw_line = jQuery('.fw_line');
    //$fw_line.append('<div class="fs_title_wrapper ' + set_state + '"><h1 class="fs_title"></h1><h6 class="fs_descr"></h6></div>');
    $fw_line.append('<a href="javascript:void(0)" class="fs_slider_prev"/><a href="javascript:void(0)" id="fs_play-pause" class="' + playpause + '"/><div class="fs_thmb_viewport ' + set_state + '"><div class="fs_thmb_wrapper"><ul class="fs_thmb_list" style="width:' + fs_options.slides.length * thmb_item_width + 'px"></ul></div></div><a href="javascript:void(0)" class="fs_slider_next"/>');
    $fs_thmb = jQuery('.fs_thmb_list');
    if (fs_options.autoplay == 0) {
        $fs_thmb.addClass('paused');
    }
    $fs_thmb_viewport = jQuery('.fs_thmb_viewport');

    thisSlide = 0;
    while (thisSlide <= fs_options.slides.length - 1) {
        $fs_container.append('<li class="fs_slide slide' + thisSlide + '" data-count="' + thisSlide + '" data-src="' + fs_options.slides[thisSlide].image + '"></li>');
        $fs_thmb.append('<li class="fs_slide_thmb slide' + thisSlide + '" data-count="' + thisSlide + '" title="' + fs_options.slides[thisSlide].alt + '" style="background-image:url(' + fs_options.slides[thisSlide].thmb + ');"></li>');
        thisSlide++;
    }
    $fs_container.find('li.slide0').addClass('current-slide').attr('style', 'background:url(' + $fs_container.find('li.slide0').attr('data-src') + ') no-repeat;');
    $fs_thmb.find('li.slide0').addClass('current-slide');
    $fs_container.find('li.slide1').attr('style', 'background:url(' + $fs_container.find('li.slide1').attr('data-src') + ') no-repeat;');

    jQuery('.fs_slide_thmb').click(function () {
        goToSlide(parseInt(jQuery(this).attr('data-count')));
    });
    jQuery('.fs_slider_prev').click(function () {
        prevSlide();
    });
    jQuery('.fs_slider_next').click(function () {
        nextSlide();
    });

    jQuery(document.documentElement).keyup(function (event) {
        if ((event.keyCode == 37) || (event.keyCode == 40)) {
            prevSlide();
            // Right Arrow or Up Arrow
        } else if ((event.keyCode == 39) || (event.keyCode == 38)) {
            nextSlide();
        }
    });

    jQuery('#fs_play-pause').click(function () {
        if (jQuery(this).hasClass('fs_pause')) {
            $fs_thmb.addClass('paused');
            jQuery(this).removeClass('fs_pause').addClass('fs_play');
            clearInterval(fs_interval);
        } else {
            $fs_thmb.removeClass('paused');
            jQuery(this).removeClass('fs_play').addClass('fs_pause');
            fs_interval = setInterval('nextSlide()', fs_options.slide_time);
        }
    });

    nextSlide = function () {
        clearInterval(fs_interval);
        thisSlide = parseInt($fs_container.find('.current-slide').attr('data-count'));
        thisSlide++;
        cleanSlide = thisSlide - 2;
        nxtSlide = thisSlide + 1;
        if (thisSlide == $fs_container.find('li').size()) {
            thisSlide = 0;
            cleanSlide = $fs_container.find('li').size() - 3;
            nxtSlide = thisSlide + 1;
        }
        if (thisSlide == 1) {
            cleanSlide = $fs_container.find('li').size() - 2;
        }

        $fs_container.find('.slide' + cleanSlide).attr('style', '');
        $fs_container.find('.slide' + thisSlide).attr('style', 'background:url(' + $fs_container.find('.slide' + thisSlide).attr('data-src') + ') no-repeat;');
        $fs_container.find('.slide' + (nxtSlide)).attr('style', 'background:url(' + $fs_container.find('.slide' + (thisSlide + 1)).attr('data-src') + ') no-repeat;');
        jQuery('.current-slide').removeClass('current-slide');
        jQuery('.slide' + thisSlide).addClass('current-slide');
        console.log(thisSlide + ' ; ' + (thisSlide - 4) + ' ; ' + jQuery('.fs_thmb_list').find('li').size())
        if ((thisSlide > 4) && (thisSlide < jQuery('.fs_thmb_list').find('li').size())) {
            jQuery('.fs_thmb_list').css('left', -1 * (thisSlide - 4) * jQuery('.fs_thmb_list').find('li').width());
        } else {
            jQuery('.fs_thmb_list').css('left', '0px');
        }
        if (!$fs_thmb.hasClass('paused')) {
            fs_interval = setInterval('nextSlide()', fs_options.slide_time);
        }
    }

    prevSlide = function () {
        clearInterval(fs_interval);
        thisSlide = parseInt($fs_container.find('.current-slide').attr('data-count'));
        thisSlide--;
        nxtSlide = thisSlide - 1;
        cleanSlide = thisSlide + 2;
        if (thisSlide < 0) {
            thisSlide = $fs_container.find('li').size() - 1;
            cleanSlide = 1;
        }
        if (thisSlide == $fs_container.find('li').size() - 2) {
            cleanSlide = 0;
        }

        $fs_container.find('.slide' + (cleanSlide)).attr('style', '');
        $fs_container.find('.slide' + thisSlide).attr('style', 'background:url(' + $fs_container.find('.slide' + thisSlide).attr('data-src') + ') no-repeat;');
        $fs_container.find('.slide' + (nxtSlide)).attr('style', 'background:url(' + $fs_container.find('.slide' + (thisSlide + 1)).attr('data-src') + ') no-repeat;');
        jQuery('.current-slide').removeClass('current-slide');
        jQuery('.slide' + thisSlide).addClass('current-slide');
        if ((thisSlide > 4) && (thisSlide < jQuery('.fs_thmb_list').find('li').size())) {
            jQuery('.fs_thmb_list').css('left', -1 * (thisSlide - 4) * jQuery('.fs_thmb_list').find('li').width());
        } else {
            jQuery('.fs_thmb_list').css('left', '0px');
        }
        if (!$fs_thmb.hasClass('paused')) {
            fs_interval = setInterval('nextSlide()', fs_options.slide_time);
        }
    }

    goToSlide = function (set_slide) {
        clearInterval(fs_interval);
        oldSlide = parseInt($fs_container.find('.current-slide').attr('data-count'));
        thisSlide = set_slide
        $fs_container.find('.fs_slide').attr('style', '');
        $fs_container.find('.slide' + thisSlide).attr('style', 'background:url(' + $fs_container.find('.slide' + thisSlide).attr('data-src') + ') no-repeat;');
        $fs_container.find('.slide' + (thisSlide + 1)).attr('style', 'background:url(' + $fs_container.find('.slide' + (thisSlide + 1)).attr('data-src') + ') no-repeat;');
        jQuery('.current-slide').removeClass('current-slide');
        jQuery('.slide' + thisSlide).addClass('current-slide');
        if (!$fs_thmb.hasClass('paused')) {
            fs_interval = setInterval('nextSlide()', fs_options.slide_time);
        }
    }
}

jQuery(document).ready(function ($) {
    var fs_thmb_list = $('.fs_thmb_list');
    fs_thmb_list.mousedown(function () {
        fs_thmb_list.addClass('clicked');
    });
    fs_thmb_list.mouseup(function () {
        fs_thmb_list.removeClass('clicked');
    });
});
jQuery(window).resize(function () {
    jQuery('.fs_thmb_list').width(jQuery('.fs_thmb_list').find('li').size() * jQuery('.fs_thmb_list').find('li').width());
    jQuery('.fs_thmb_list').css('left', '0px');
});
jQuery(window).load(function () {
    jQuery('.fs_thmb_list').width(jQuery('.fs_thmb_list').find('li').size() * jQuery('.fs_thmb_list').find('li').width());
    jQuery('.fs_thmb_list').css('left', '0px');
});