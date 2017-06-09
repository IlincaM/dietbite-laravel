"use strict";

jQuery(document).ready(function ($) {
    jQuery('.ngg-album-compact').parent().wrap('<div class="fake_wrap"></div>');
    if (jQuery(".ngg-galleryoverview").hasClass("ngg-slideshow")) {
    }
    else {
        jQuery('.ngg-galleryoverview').parent().wrap('<div class="fake_wrap"></div>');
    }
});