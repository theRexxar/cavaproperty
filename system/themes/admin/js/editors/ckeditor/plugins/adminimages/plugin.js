CKEDITOR.plugins.add('adminimages',
{
    requires: ['iframedialog'],
    init : function(editor)
    {
        CKEDITOR.dialog.addIframe('adminimage_dialog', 'Images', SITE_URL + SITE_AREA + '/content/files/wysiwyg/image',800,500)
        editor.addCommand('adminimages', {exec:adminimage_onclick});
        editor.ui.addButton('adminimages',{ label:'Upload or insert images from library', command:'adminimages', icon:this.path+'images/icon.png' });

		editor.on('selectionChange', function(evt)
		{
			/*
			 * Despite our initial hope, document.queryCommandEnabled() does not work
			 * for this in Firefox. So we must detect the state by element paths.
			 */
			var command = editor.getCommand('adminimages'),
				element = evt.data.path.lastElement.getAscendant('img', true);

			// If nothing or a valid document
			if ( ! element || (element.getName() == 'img' && element.hasClass('admin-image')))
			{
				command.setState(CKEDITOR.TRISTATE_OFF);
			}

			else
			{
				command.setState(CKEDITOR.TRISTATE_DISABLED);
			}
		});
	},

	// Create a filter which re-writes { site_url } and { base_url } to the JS constants SITE_URL and BASE_URL when rendering a wysiwyg preview
	// This means that img src values can contain the above template variables, and ckeditor will render the image correctly.
	// Having { site_url } in image src values allows the site to change URL without all images breaking
	afterInit : function( editor )
	{
		var dataProcessor = editor.dataProcessor,
			dataFilter = dataProcessor && dataProcessor.dataFilter;

		if ( !dataFilter )
			return;

		dataFilter.addRules(
		{
			elements:
			{
				'img': function(element)
				{
					// Replace both url-encoded and non-url-encoded forms of { site_url } and { base_url } with their corresponding JS constants
					// (FF produces a urlencoded version, chrome and IE don't)
					var src = element.attributes.src;
					src = src.replace("{ site_url }", SITE_URL).replace("%7B20site_url%20%7D", SITE_URL);
					src = src.replace("{ base_url }", BASE_URL).replace("%7B%20base_url%20%7D", BASE_URL);
					element.attributes.src = src;

					return element;
				}
			}
		})
	}
});

function adminimage_onclick(e)
{
	update_instance();
    // run when admin button is clicked]
    CKEDITOR.currentInstance.openDialog('adminimage_dialog')
}