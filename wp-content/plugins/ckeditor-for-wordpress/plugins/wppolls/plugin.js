﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add( 'wppolls',
{
	init : function( editor )
	{
		// Register the toolbar buttons.
		editor.ui.addButton( 'WPPolls',
			{
				label : 'Insert Poll',
				icon : this.path + 'images/poll.gif',
				command : 'wppolls'
			});

		// Register the commands.
		editor.addCommand( 'wppolls',
		{
			exec : function()
			{
				var pollId = insertPoll('visual', '');
				if (pollId)
					editor.insertText(pollId);
			}
		});
	}
});
