jQuery.fn.fs_post_slider = function (fs_options) {
    //Set Variables
    var fs_el = jQuery(this),
        fs_base = this;
    var fs_interval = setInterval('nextSlide()', fs_options.slide_time);		

    if (fs_options.thmb_state == 'off') {
        set_state = "fs_hide";
    } else {
        set_state = "";
    }
	if (jQuery(window).width() > 860 ) {
		thmb_item_width = 120;
	} else if ((jQuery(window).width() < 860) && (jQuery(window).width() > 400)) {
		thmb_item_width = 60;
	} else {
		thmb_item_width = 40;
	}
    jQuery('body').append('<div class="fs_gallery_wrapper"><ul class="' + fs_options.fit + ' fs_gallery_container ' + fs_options.fx + '"/></div>');
    $fs_container = jQuery('.fs_gallery_container');
    $fw_line = jQuery('.fw_line');

    thisSlide = 0;
	if (fs_options.slides.length == 1) {
		jQuery('html').addClass('one_img');
	}
    while (thisSlide <= fs_options.slides.length - 1) {
        $fs_container.append('<li class="fs_slide slide' + thisSlide + '" data-count="' + thisSlide + '" data-src="' + fs_options.slides[thisSlide].image + '"></li>');
        thisSlide++;
    }
    $fs_container.find('li.slide0').addClass('current-slide').attr('style', 'background:url(' + $fs_container.find('li.slide0').attr('data-src') + ') no-repeat;');
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
		fs_interval = setInterval('nextSlide()', fs_options.slide_time);
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
		fs_interval = setInterval('nextSlide()', fs_options.slide_time);
    }
}

jQuery(window).resize(function () {    
	if (jQuery(window).width() > 860 ) {
		thmb_item_width = 120;
	} else if ((jQuery(window).width() < 860) && (jQuery(window).width() > 400)) {
		thmb_item_width = 60;
	} else {
		thmb_item_width = 40;
	}	
});
jQuery(window).load(function () {
    //jQuery('.fs_thmb_viewport').width(jQuery(window).width() - parseInt(jQuery('body').css('padding-left')) - jQuery('.fs_controls').width() - 20);
	if (jQuery(window).width() > 860 ) {
		thmb_item_width = 120;
	} else if ((jQuery(window).width() < 860) && (jQuery(window).width() > 400)) {
		thmb_item_width = 60;
	} else {
		thmb_item_width = 40;
	}	
});