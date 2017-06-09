<?php

define("GT3_THEMENAME", "Fit+");
define("GT3_THEMESHORT", "fit_");
define("IMGURL", get_template_directory_uri()."/img");
define("THEMEROOTURL", get_template_directory_uri());

if (!defined("GT3THEME_INSTALLED")) {
    define("GT3THEME_INSTALLED", true);
}

global $gt3_menu_i;
$gt3_menu_i = 0;

?>