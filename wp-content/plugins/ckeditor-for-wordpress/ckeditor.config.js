/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * Documentation:
 * http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
 */

CKEDITOR.editorConfig = function(config) {
	// The minimum editor width, in pixels, when resizing it with the resize handle.
	config.resize_minWidth = 450;

	// Protect PHP code tags (<?...?>) so CKEditor will not break them when
	// switching from Source to WYSIWYG.
	config.protectedSource.push(/<\?[\s\S]*?\?>/g);

	// Define toolbars, you can remove or add buttons.
	// List of all buttons is here: http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html#.toolbar_Full

	// WordPress basic toolbar
	config.toolbar_WordpressBasic = [ [ 'Bold', 'Italic', '-', 'Link', 'Unlink', '-', 'Blockquote' ] ];

	// WordPress full toolbar
	config.toolbar_WordpressFull = [
			['Source'],
			['Undo','Redo'],
			['Image','Table','SpecialChar'],
			['Bold','Italic','Underline'],
			['NumberedList','BulletedList','Indent'],
			['JustifyLeft','JustifyCenter','JustifyRight'],
			['Link','Unlink'],
			['Format','Font','FontSize'],
			['TextColor','BGColor']
		 ];

	// mediaembed plugin
	// config.extraPlugins += (config.extraPlugins ? ',mediaembed' : 'mediaembed' );
	// CKEDITOR.plugins.addExternal('mediaembed', ckeditorSettings.pluginPath + 'plugins/mediaembed/');
};
