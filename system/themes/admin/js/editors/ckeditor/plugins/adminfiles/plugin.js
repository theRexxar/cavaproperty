CKEDITOR.plugins.add('adminfiles',
{
	init : function(editor)
	{
		// Add the link and unlink buttons.
		CKEDITOR.dialog.addIframe('adminfiles_dialog', 'Files', SITE_URL + SITE_AREA + '/content/files/wysiwyg/file',700,400);
		editor.addCommand('adminfiles', {exec:adminfiles_onclick} );
		editor.ui.addButton('adminfiles',{ label:'Upload or insert files from library.', command:'adminfiles', icon:this.path+'images/icon.png' });

		// Register selection change handler for the unlink button.
		editor.on( 'selectionChange', function( evt )
		{
			/*
			 * Despite our initial hope, files.queryCommandEnabled() does not work
			 * for this in Firefox. So we must detect the state by element paths.
			 */
			var command = editor.getCommand( 'adminfiles' ),
				element = evt.data.path.lastElement.getAscendant( 'a', true );

			// If nothing or a valid files
			if ( ! element || (element.getName() == 'a' && ! element.hasClass('admin-files')))
			{
				command.setState(CKEDITOR.TRISTATE_OFF);
			}

			else
			{
				command.setState(CKEDITOR.TRISTATE_DISABLED);
			}
		});

	}
} );

function adminfiles_onclick(e)
{
	update_instance();
    // run when admin button is clicked]
    CKEDITOR.currentInstance.openDialog('adminfiles_dialog')
}