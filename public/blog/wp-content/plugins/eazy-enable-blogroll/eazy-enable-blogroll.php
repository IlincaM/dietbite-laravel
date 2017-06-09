<?php
/**
 * Plugin Name:       Eazy Enable Blogroll
 * Plugin URI:        http://wordpress.org/extend/plugins/eazy-enable-blogroll/
 * Description:       Enable the WordPress Blogroll for Versions greater than 3.5
 * Version:           1.0.1
 * Author:            Tamás Kiss
 * Author URI:        http://poonk.net
 * Text Domain:       eazy-enable-blogroll
 * License:           GPL2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 */
/*  Copyright 2015  Tamás Kiss  (email : hello@poonk.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if( get_bloginfo( 'version' ) >= 3.5 ) {
  add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

?>