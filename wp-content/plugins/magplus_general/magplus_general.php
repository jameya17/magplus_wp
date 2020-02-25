<?php
/*
Plugin Name: Magplus general
Plugin URI: http://magplus.com
Description: General functions used on the site that could be used to any theme
Author: Spathon
Version: 0.1
Author URI: http://www.spathon.com/
License: GPLv2 or later

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
define('MAGPLUS_GENERAL_PLUGIN_DIR', plugin_dir_path(__FILE__));


/**
 *
 *   Widgets
 *
 */
// show latest posts custom posts
require MAGPLUS_GENERAL_PLUGIN_DIR .'widgets/post_type_widget.php';

// The social widgets bar on frontpage
require MAGPLUS_GENERAL_PLUGIN_DIR .'widgets/social_media.php';

// Show a press widget with random quotes and press
require MAGPLUS_GENERAL_PLUGIN_DIR .'widgets/press_quote.php';






