<?php
function mss_add_page(){
	add_options_page('MediaShowStyle Plug-In Management Page', 'MediaShowStyle', 9, __FILE__, 'mss_options_page');
}

function mss_show_info_msg($msg){
	echo '<div id="message" class="updated fade"><p>' . $msg . '</p></div>';
}

function get_mss_check(){
	global $auto_add_ms_code;
	
	return ($auto_add_ms_code ? "checked" : "") ;
}

function mss_options_page(){
	global $auto_add_ms_code;
	
	if (isset($_POST['info_update'])) {
		
		$auto_add_ms_code = $_POST["auto_add_ms_code"];
		
		if(empty($auto_add_ms_code))
			$auto_add_ms_code = 0;
		
		update_option('auto_add_ms_code', $auto_add_ms_code);
		mss_show_info_msg("MediaShowStyle options saved.");
		
	}else if(isset($_POST["info_reset"])){
		
		delete_option('auto_add_ms_code');
		mss_show_info_msg("MediaShowStyle options deleted from the WordPress database.");
		
	}else{
		
		$auto_add_ms_code = get_option('auto_add_ms_code');
		
	}
	
	$mss_check = get_mss_check();
	
	//Options Configuration Page
	_e('
	<div class="wrap">
		<h2>MediaShowStyle</h2>
		<p>This is where you can configure the MediaShowStyle plugin.<br /><br />
		
		<form name="formmss" method="post" action="' . $_SERVER['REQUEST_URI'] . '">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Media Show</th>
				<td>
					<label for="auto_add_ms_code">
					<input name="auto_add_ms_code" type="checkbox" id="auto_add_ms_code" value="1" '.$mss_check.' /> Medias is showing
					</label>
					<br/>default is showing.
				</td>
			</tr>			
		</table>
		<p class="submit">
			<input type="submit" name="info_update" value="Update Options &raquo;" />
		</p>
		</form>
	</div>
	<br/><br/>
	<div class="wrap">
		<h2>Reset Plugin</h2>
		<form name="formmssreset" method="post" action="' . $_SERVER['REQUEST_URI'] . '">
			<p>By pressing the "Reset" button, the plugin will be reset. This means that the stored options will be deleted from the WordPress database. Although it is not necessary, you should consider doing this before uninstalling the plugin, so no trace is left behind.</p>
			<p class="submit">
				<input type="submit" name="info_reset" value="Reset Options &raquo;" />
			</p>
		</from>
	</div>

	');
}

function get_curr_path(){
	$path = dirname(__FILE__);
	$path = str_replace("\\","/",$path);
	$path = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($path,strpos($path,"wp-content/")));
	
	return $path;
}

function mss_exist_MSPanel(){
	global $post;
	
	return substr_count($post->post_content, 'MSPanel') ? 1 : 0 ;
}

function mss_add_ms_code(){
	
	$auto_add_ms_code = get_option('auto_add_ms_code');
	
	if($auto_add_ms_code)
		echo '<link rel="stylesheet" href="'.get_curr_path().'common/style.css" type="text/css" media="screen" />'."\n";
	else
		echo '<link rel="stylesheet" href="'.get_curr_path().'common/style-none.css" type="text/css" media="screen" />'."\n";
	echo '<meta name="pluginpath" content="'.get_curr_path().'common/" />'."\n";
	echo '<script type="text/javascript" src="'.get_curr_path().'common/common.js"></script>'."\n";

}

if(function_exists('add_action')){
	add_action('admin_menu', 'mss_add_page');
	add_action('wp_head', 'mss_add_ms_code', 0);
}

?>