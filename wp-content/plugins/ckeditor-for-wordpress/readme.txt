﻿=== CKEditor For WordPress ===
Contributors: wiktor, michal_cksource, dczepierga, Dean Lee
Tags: post, wysiwyg, CKEditor, FCKeditor, editor, rich text, rte, rich text editor
Requires at least: 2.0
Tested up to: 3.2
Stable tag: 3.6.2.3
This plugin replaces the default WordPress editor with <a href="http://ckeditor.com/">CKEditor</a>.

== Description ==

This plugin replaces the default WordPress editor with <a href="http://ckeditor.com/">CKEditor</a>.

<strong>CKEditor</strong> is a text editor to be used inside web pages. It's a WYSIWYG editor, which means that the
text being edited on it looks as similar as possible to the results users have when publishing it.
It brings to the web common editing features found on desktop editing applications like Microsoft Word and OpenOffice.

<strong>CKEditor</strong> is compatible with most internet browsers and operating systems, including:
<ul>
<li>Internet Explorer 6+</li>
<li>Firefox 3.0+</li>
<li>Safari</li>
<li>Google Chrome</li>
<li>Opera</li>
</ul>

Live demo is available at <a href="http://wordpress.ckeditor.com/">http://wordpress.ckeditor.com/</a>.

Features:

* Replace the default WordPress editor with CKEditor
* Post comment with CKEditor to provide styled and colorful comments (Optional)
* Build-in file manager and upload manager, also supports <a href="http://ckfinder.com">CKFinder</a> – an AJAX file browser
* Build-in WordPress "read more" Button
* Integration plugin for <a href="http://wordpress.org/extend/plugins/vipers-video-quicktags/">Viper's Video Quicktags</a>
* Intergation plugin for <a href="http://wordpress.org/extend/plugins/wp-polls/">Wp-Polls</a>
* Integration plugin for <a href="http://wordpress.org/extend/plugins/gd-star-rating/">GD Star Rating</a>
* Integration plugin for <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN Gallery</a>
* Integrated with WordPress media buttons
* Configurable output formatting
* Manage and insert smileys into your post
* Customizable toolbar buttons
* Customizable skin
* And more :)

== Installation ==

1. Upload this plugin to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Check your account profile settings and uncheck option "Disable the visual editor when writing" if checked.
4. To install CKFinder, please read ckfinder/readme.txt.

== Screenshots ==

1. Add/Edit post
2. Leave comment through CKEditor
3. Built-in file manager

== Changelog ==

= V3.6.2.3 - 01.12.2011 =

 * This version of CKEditor for WordPress was released due to some issues with upgrading the plugin to version 3.6.2.2. The problem is now fixed.
 * Fix for problem with NextGEN Gallery plugin (http://wordpress.org/support/topic/plugin-ckeditor-for-wordpress-just-updated-to-ckeditor-3622-no-items-in-visual-editor)

= V3.6.2.2 - 29.11.2011 =

 * Fix for form token secure when browser send no http_referer
 * Fix for support qTranslate plugin (http://wordpress.org/support/topic/plugin-ckeditor-for-wordpress-cant-insert-image-or-another-html-tag-from-default-wordpress-media-uploader)
 * Fix for plugin path (http://wordpress.org/support/topic/plugin_path-doesnt-use-wp_plugin_url)
 * Fix for html markups in image caption.
 * Fix for html entities in image caption
 * Add support for language settings (http://wordpress.org/support/topic/ckeditor-language-same-as-configphp-lang)
 * Fix for CSS default Wordpress theme (http://wordpress.org/support/topic/use-theme-css-should-work-fine-with-the-default-theme)
 * Fix for JavaScript autosave.init call error (http://wordpress.org/support/topic/plugin-ckeditor-for-wordpress-ckeditor-for-wordpress-and-mailpress)
 * Fix for unnecessary change html entities in text. Now it only occurs in shortcodes tags in  [] (http://wordpress.org/support/topic/plugin-ckeditor-for-wordpress-using-html-entities-in-the-output)

= V3.6.2.1 - 14.10.2011 =

 * Add security fix (thx to Julio Potier from http://boiteaweb.fr)
 * Fix to Cannot reply to an existing comment (http://wordpress.org/support/topic/plugin-ckeditor-for-wordpress-v362-cannot-reply-to-an-existing-comment)
 * Fix CKEdtior 3.6.2 Update and qTranslate incompatibility (http://wordpress.org/support/topic/plugin-ckeditor-for-wordpress-ckedtior-362-update-and-qtranslate-incompatibility)
 * Change messages for CKFinder configuration

= V3.6.2 - 15.09.2011 =

 * Updated CKEditor to version 3.6.2
 * Fix error : CKEditor is in read only state after closing Wordpress gallery popup (iframe)
 * Add support to "Custom fields template" plugin (http://wordpress.org/extend/plugins/custom-field-template/)
 * Refactor of functions use in Wordpress gallery
 * Add index.html files to directories to protect against directory listing

= V3.6.1.1 DEV - 22.08.2011 =

 * Fix to work when "After the Deadline" plugin is installed.

= V3.6.1 - 19.08.2011 =

 * Plugin naming conventions changed to match CKEditor version.
 * Support for built-in WordPress file gallery added.
 * Support for managing images via WordPress added.
 * Shortcode support improved.

= V1.0.9 - 05.07.2011 =

 * Add compatibility to Wordpress 3.2
 * Updated CKEditor to version 3.6.1


= V1.0.8 - 10.05.2011 =

 * Updated CKEditor to version 3.6
 * Fix error when calling undefinde getUserSetting function in ckeditor.utils.js


= V1.0.7 - 08.04.2011 =

 * Updated CKEditor to version 3.5.3
 * Viper’s Video Quicktags – show buttons only from enabled options
 * Successfully tested with wordpress 3.1


= V1.0.7 DEV - 17.03.2011 =

 * Viper’s Video Quicktags – show buttons only from enabled options
 * Successfully tested with wordpress 3.1

= V1.0.6 - 17.02.2011 =

 * Updated CKEditor to version 3.5.2

= V1.0.5 - 10.02.2011 =

 * Updated CKEditor to version 3.5.1

= V1.0.4 - 05.11.2010 =

 * Updated CKEditor to version 3.5

= V1.0.3 - 05.11.2010 =

 * Updated CKEditor to version 3.4.2
 * Corrected the default set of buttons in that are available in comments

= V1.0.2 - 21.09.2010 =

 * Updated CKEditor to version 3.4.1
 * Fixed qTranslate plugin compatibility
 * Added Bidi (LTR/RTL) buttons to the toolbar
 * Fixed: Reply to comment freezes unless source button is pressed

= V1.0.1 - 14.06.2010 =

* Fixed usage of PHP short tag causing parse error
* Fixed "Read more" button
* Fixed issues when working with the qTranslate extension (unable to save edited content)
* Fixed issues with saving configuration files when using file editor

= V1.0 - 11.06.2010 =

* Updated CKEditor to 3.3.1
* Fixed issue with loading templates inside of CKEditor.
* Fixed compatibility with qTranslate
* Added option to enable/disable SCAYT
* Improved compatibility with WordPress 3.0
* Fixed problem with MediaEmbed plugin (unknown variable ckeditorVariables)
* Fixed built-in file browser

= V1.0 Beta2 - 17.03.2010 =

* Fixed compatibility with PHP4 and with disabled short tags.

= V1.0 Beta - 10.03.2010 =

* Inital beta release.
