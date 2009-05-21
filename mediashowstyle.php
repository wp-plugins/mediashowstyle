<?php
/*
Plugin Name: Mediashowstyle
Plugin URI: http://www.loonges.com/blog/plugin/mediashowstyle-plugin.html
Description: Showing medias like PJblog's style, it supports almost all audio & video formats such as swf, wma, wmv, rm, ra, qt etc. You can be customized though <a href="options-general.php?page=mediashowstyle.php">MediaShowStyle tab</a> in the option panel within wordpress admin. See the <a href="http://www.loonges.com/wp-content/plugins/mediashowstyle/readme.txt">documentation</a> for syntax and usage.
Version: 1.1
Author: Loongs
Author URI: http://www.loonges.com
*/

/*  Copyright 2008  Loongs  (email : loongs.cn@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function installMSSOptions(){
	add_option('auto_add_ms_code', '1');
}

function mss_init(){
	
	require(dirname(__FILE__).'/mediashowstyle.client.php');
	
	if(is_admin()){
		register_activation_hook(__FILE__, "installMSSOptions");
	}
	
}

if(function_exists('add_action')){
	add_action('plugins_loaded', 'mss_init');
}
?>