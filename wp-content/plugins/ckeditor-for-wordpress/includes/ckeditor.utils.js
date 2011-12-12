﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
var	editorCKE;
jQuery(document).ready(function () {
	ckeditorSettings.configuration['on'] = {
		configLoaded : function ( evt ) {
			if (typeof(ckeditorSettings.externalPlugins) != 'undefined') {
				var externals=new Array();
				for(var x in ckeditorSettings.externalPlugins) {
					CKEDITOR.plugins.addExternal(x, ckeditorSettings.externalPlugins[x]);
					externals.push(x);
				}
			}
			evt.editor.config.extraPlugins += (evt.editor.config.extraPlugins ? ','+externals.join(',') : externals.join(','));
			if (typeof(ckeditorSettings.additionalButtons) != 'undefined') {
				for (var x in ckeditorSettings.additionalButtons) {
					evt.editor.config['toolbar_' + evt.editor.config.toolbar].push(ckeditorSettings.additionalButtons[x]);
				}
			}
		}
	};
	CKEDITOR.on( 'instanceReady', function( ev )
	{
		var dtd = CKEDITOR.dtd;
		for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) )
		{
			ev.editor.dataProcessor.writer.setRules( e, ckeditorSettings.outputFormat);
		}
		ev.editor.dataProcessor.writer.setRules( 'br',
			{
				breakAfterOpen : true
			});
		ev.editor.dataProcessor.writer.setRules( 'pre',
			{
				indent: false
			});
		editorCKE = CKEDITOR.instances['content'];
	});

	if(ckeditorSettings.textarea_id != 'comment'){
		edInsertContentOld = function () { return ; };
		if(typeof(window.edInsertContent) != 'undefined'){
			edInsertContentOld = window.edInsertContent;
		}
		window.edInsertContent = function (myField, myValue) {
			if(typeof(CKEDITOR) != 'undefined' && typeof(editorCKE) != 'undefined'){
				editorCKE.insertHtml(myValue);
			} else {
				edInsertContentOld(myField, myValue);
			}
		};
		var autosaveOld = function () { return ; };
		if(typeof(window.autosave) != 'undefined'){
			autosaveOld = window.autosave;
		}

		if(typeof(window.switchEditors) != 'undefined') {
			window.switchEditors.go = function(id, mode) {
				if ('tinymce' == mode) {
					ckeditorOn(id);
				} else {
					ckeditorOff(id);
					jQuery('.js .theEditor').attr('style', 'color: black;');
				}
			};
		}
	}
	if ( ckeditorSettings.qtransEnabled ){

		jQuery('#edButtonHTML').addClass('active');
		jQuery('#edButtonPreview').removeClass('active');
		if(ckeditorSettings.textarea_id != 'comment'){

			ckeditorSettings.textarea_id = 'qtrans_textarea_content';
			ckeditorSettings.configuration['on'].getData = function (evt) {
				evt.data.dataValue = evt.data.dataValue.replace(/(^<\/p>)|(<p>$)/g, '');
				evt.data.dataValue = evt.data.dataValue.replace(/^<p>(\s|\n|\r)*<p>/g, '<p>');
				evt.data.dataValue = evt.data.dataValue.replace(/<\/p>(\s|\n|\r)*<\/p>(\s|\n|\r)*$/g, '<\/p>');
				qtrans_save(evt.data.dataValue);
			};
			if ( jQuery('#'+ckeditorSettings.textarea_id).length && typeof CKEDITOR.instances[ckeditorSettings.textarea_id] == 'undefined' ) {
				CKEDITOR.replace(ckeditorSettings.textarea_id, ckeditorSettings.configuration);
					editorCKE = CKEDITOR.instances[ckeditorSettings.textarea_id];
			}

			window.tinyMCE = tinymce =  getTinyMCEObject();
		}
	}
	else {
		if(ckeditorSettings.autostart && (typeof getUserSetting == 'undefined' || getUserSetting('editor') === '' || getUserSetting('editor') == 'tinymce')){
			ckeditorOn();
		}
	}

	jQuery("#update-gallery").click(function(){
		updateCkeGallery();
	});

});
function ckeditorOn(id) {
	if (typeof(id) != 'undefined' && typeof(CKEDITOR.instances[id]) == 'undefined' )
	{
		setUserSetting( 'editor', 'tinymce' );
		jQuery('#quicktags').hide();
		jQuery('#edButtonPreview').addClass('active');
		jQuery('#edButtonHTML').removeClass('active');
		CKEDITOR.replace(id, ckeditorSettings.configuration);
		if (typeof ckeditorSettings.configuration['extraCss'] != 'undefined')
		{
			CKEDITOR.instances[id].addCss(ckeditorSettings.configuration['extraCss']);
		}
	}
	if ( jQuery('#'+ckeditorSettings.textarea_id).length && (typeof(CKEDITOR.instances) == 'undefined' || typeof(CKEDITOR.instances[ckeditorSettings.textarea_id]) == 'undefined' ) && jQuery("#"+ckeditorSettings.textarea_id).parent().parent().attr('id') != 'quick-press') {
		CKEDITOR.replace(ckeditorSettings.textarea_id, ckeditorSettings.configuration);
		if (typeof ckeditorSettings.configuration['extraCss'] != 'undefined')
		{
			CKEDITOR.instances[ckeditorSettings.textarea_id].addCss(ckeditorSettings.configuration['extraCss']);
		}
		if(ckeditorSettings.textarea_id == 'content') {
			setUserSetting( 'editor', 'tinymce' );
			jQuery('#quicktags').hide();
			jQuery('#edButtonPreview').addClass('active');
			jQuery('#edButtonHTML').removeClass('active');
		}
		else if(ckeditorSettings.textarea_id == 'comment') {
			var labelObj = jQuery('#'+ckeditorSettings.textarea_id).prev('label');
			if (labelObj){
				labelObj.hide();
			}
		}
	}
}

function ckeditorOff(id) {
	if (typeof(id) != 'undefined')
	{
		editorCKE = CKEDITOR.instances[id];
	}else
	{
		editorCKE = CKEDITOR.instances[ckeditorSettings.textarea_id];
	}
	if(typeof(editorCKE) != 'undefined'){
		editorCKE.destroy();
		if(ckeditorSettings.textarea_id == 'content') {
			setUserSetting( 'editor', 'html' );
			jQuery('#quicktags').show();
			jQuery('#edButtonHTML').addClass('active');
			jQuery('#edButtonPreview').removeClass('active');
		}
	}
}

if ( !ckeditorSettings.qtransEnabled ){
	var tinymce = window.tinyMCE = getTinyMCEObject();
}
function getTinyMCEObject()
{
	var tinymce = window.tinyMCE = (function () {
		var tinyMCE = {
			get : function (id) {
				var instant = {
					isHidden : function (){
						editor = CKEDITOR.instances[id];
						if (typeof editorCKE == 'undefined') editorCKE = editor;
						if(typeof(editor) != 'undefined')
						{
							return false;
						}else{
							return true;
						}
					},
					isDirty : function (){return false;},
					execCommand : function (command, integer, val) {
						if(command == 'mceSetContent') {
							editorCKE.setData(val);
						}
						if (command == 'mceInsertContent')
						{
							editorCKE.insertHtml(val);
						}
					},
					onSaveContent : {
							add : function (func) {
								window.tinymceosc = func;
							}
					},
					getContentAreaContainer : function () {
						return {
							offsetHeight : editorCKE.config.height
						};
					},
					hide : function () {
						ckeditorOff(id);
					},
					show : function () {
						ckeditorOn(id);
					},
					save : function(){return;},
					focus : function(){return;},
					plugins: {}
				};

				return instant;
			},
			execCommand : function (command, integer, val) {
				if(command == 'mceAddControl'){
					ckeditorSettings.textarea_id = val;
					if(ckeditorSettings.autostart) {
						ckeditorOn();
					} else {
						document.getElementById('qtrans_textarea_content').removeAttribute('style');
					}
				}
			},
			triggerSave : function(param) {
				if(typeof(CKEDITOR) != 'undefined' && typeof(editorCKE) != 'undefined')
					editorCKE.updateElement();
			},
			activeEditor : {
				isHidden : function (){return false;},
				isDirty : function (){return false;},
				focus : function (){return;},
				plugins : {},
				execCommand : function(command, state, text)
				{
					if (command == "mceInsertContent")
					{
						pattern = /(\[caption.+\])/ig;
						if (pattern.test(text))
						{
							text = text.replace(/&gt;/g, '>');
							text = text.replace(/&lt;/g, '<');
							pattern = /(<[\w'"=\s]+>([\S\s]+)<\/\S+>)/ig;
							text= text.replace(pattern, function(match, cont)
							{
								cont =  cont.replace(/<[\w'"=\s]+>([\S\s]+)<\/\S+>/ig, function(match, cont){
									return cont;
								});
								return cont;
							});
							text = text.replace(/<br\/>|<br>|<br \>|<br \/ >|<br\/ >/i,'');
							text = text.replace(/"/i,'&quot;');
						}

						//setTimeout is required in IE8 when inserting Image gallery from an external modal dialog
						if (typeof editorCKE == 'undefined') editorCKE = CKEDITOR.instances[ckeditorSettings.textarea_id];
						setTimeout(function(){editorCKE.insertHtml(text);}, 0);
					}
				},
				selection : {
					getBookmark : function(name) {return '';}
				},
				windowManager : {
					bookmark: {}
				}
			},
			EditorManager :{
				activeEditor: {
					selection : {
						getNode : function(){
							var obj = jQuery(editorCKE.document.getBody().getHtml());
							var index = 0;
							jQuery.each(obj,function(i, val){
								var images = jQuery("img",jQuery(val));
								jQuery.each(images, function(key, value){
									if (jQuery(value).hasClass('wpGallery, cke_wpgallery'))
									{
										index = i;
										return;
									}
								});
							});
							if (obj.length === 0)
							{
								obj = document.createElement("p");
								return obj;
							}
							return obj[index];
						},
						getBookmark : function(name) {return ;}
					},
					dom :{
						select : function(selector) {

							//get CKEditor content
							var obj = editorCKE.document.getBody().getHtml();
							images =  editorCKE.document.getElementsByTag('img');
							if ( typeof images.$ == 'undefined' || images.$.length == 0) return [];
							for (var i in images.$)
							{
								if ( typeof images.$[i] != 'undefined' && ((CKEDITOR.env.ie && images.$[i].className == 'wpGallery, cke_wpgallery') || images.$[i].classList == 'wpGallery, cke_wpgallery'))
								{
									var element = new CKEDITOR.dom.element(images.$[i]);
									index = i;
									break;
								}
							}
							var results =[];

							if (typeof element != 'undefined')
							{
								results[0] = images.$[index];
								return  results;

							}else
							{
								return [];
							}
						},
						getAttrib : function(el, selector)
						{
							return jQuery(el).attr(selector);
						},
						//function to set new gallery attributes
						setAttrib : function(el, selector, value)
						{
							//get CKEditor content
							var obj = editorCKE.document.getBody().getHtml();
							images =  editorCKE.document.getElementsByTag('img');
							for (var i in images.$)
							{
								if ( typeof images.$[i] != 'undefined' && ((CKEDITOR.env.ie && images.$[i].className == 'wpGallery, cke_wpgallery') || images.$[i].classList == 'wpGallery, cke_wpgallery'))
								{
									var element = new CKEDITOR.dom.element(images.$[i]);
									element.setAttribute('title', value);
									element.setAttribute('data-gallery', '['+value+']');
								}
							}
						},
						decode : function(text) {return text;},
						hasClass : function(element, name)
						{
							var hasClass = jQuery(element).attr('class');
							var pattern = /wpGallery/;
							return pattern.test(hasClass);
						}
					}
				}
			},
			addI18n : function(language, param){
				return ;
			}
		};
		return tinyMCE;
	})();
	return tinymce;
}
var tinyMCEPreInit =  {
	mceInit : function(){
		language : 'en';
	}

};
//function to move cursor after fake gallery image. Turn on frame show
function updateCkeGallery()
{
	jQuery("#add_image").unbind('click');
	jQuery("#add_image").bind('click',function(){return true;});
}