=== Plugin Name ===
Contributors: Loongs
Donate link: http://www.loonges.com/
Tags: media, media show, media play, style
Requires at least: 2.3
Tested up to: 2.5
Stable tag: 1.1

Show medias like PJblog's style.

== Description ==

MediaShowStyle is showing medias like PJBlog's style. it supports almost all audio & video formats such as swf, wma, wmv, rm, ra, qt etc. 

== Installation ==

1. Unpack file package using your favorite zip software.
2. Upload `mediashowstyle` folder to the `/wp-content/plugins/` directory
3. Login to wordpress admin  and activate the plugin through the 'Plugins' menu
4. Go to Option => MediaShowStyle tab to config the plugin option

== Frequently Asked Questions ==

= How to contact me? =
If you have any doubt, Please contact me by eamil wdps.cn@gmail.com. I will respond ASAP.

== MediaShowStyle Plugin Configuration Panel ==

This section will allow you config the option whether the medias is display. Default is `checked`. Change to `unchecked` if you do not want to show it.

== Screenshots ==

1. MediaShowStyle plugin configuration panel, it's a showing state.
2. This screen shot description corresponds to tell you how to add the code in the HTML source  editor.
3. A example of results.

== Arbitrary section ==

* Version 1.1
	* Add a type to support the video format flv
* Version 1.0
	* Initial version

== A brief Markdown Example ==

Here is a sample example.

1. Make sure that the option is `checked` in the option panel within wordpress admin
2. Add the codes in the HTML source editor
	
	<div id="mscontent"></div>
	<script type="text/javascript">
	   var mso = new MSObject('swf', 'mymovie', 'movie.swf', '200', '100');
	   mso.write("mscontent");
	</script>
	
	* the MSObject prototype supports a number of parameters, allowing you to have multiple instances across your site
		
		var mso = new MSObject(type, id, url, [width, height]);
		
		* required
			1. `type` - specify the medias type (swf, wma, wmv, rm, ra, qt)
			2. `id` - specify the object id (used in the media object)
			3. `url` - specify the file path
		* elective
			1. `width` - width of the media object display (default is 500)
			2. `height` - height of the media object display (default is 300)
