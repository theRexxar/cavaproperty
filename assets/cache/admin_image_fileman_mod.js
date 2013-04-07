function insertImage(id, alt)
{
	var target = jQuery('input[name="target"]').val();
	var img_width = document.getElementById('insert_width').value;
	window.parent.admin.insertFile(id, img_width, target, window.parent.admin.insertImage_callback);
}

function insertFile(id, alt)
{
	var target = jQuery('input[name="target"]').val();
	window.parent.admin.insertFile(id, alt, target, window.parent.admin.insertFile_callback);
}

(function($)
{
	$(function()
	{		
    //tooltip
		$('#images-container img').hover( function() {
		    $(this).attr('title', 'Click to insert image');
		});		
    
		/**
		 * left files navigation handler
		 *  - handles loading of different folders
		 *  - manipulates dom classes etc
		 */
		$('#files-nav li a').live('click', function(e) {
				
			e.preventDefault();
			
			var href_val = $(this).attr('href');
			
			//remove existing 'current' classes
			$('#files-nav li').removeClass('current');
			
			//add class to click anchor parent
			$(this).parent('li').addClass('current');
			
			//remove any notifications
			$( 'div.notification' ).fadeOut('fast');
            
			if ($(this).attr('title') != 'upload')
			{
				$('#files_right_pane').load(href_val + ' #files-wrapper', function() {
					$(this).children().fadeIn('slow');
				});
			}
			else
			{
				var box = $('#upload-box');
				if (box.is( ":visible" ))
				{
					// Hide - slide up.
					box.fadeOut( 800 );
				}
				else
				{
					// Show - slide down.
					box.fadeIn( 800 );
					 
				}
			}
    });
		
		$( '#upload-box span.close' ).live('click', function() {
			
			$( '#upload-box' ).fadeOut( 800, function() {
				$(this).find('input[type=text], input[type=file]').val('');
			});
			
		});		
        
		$('select[name=parent_id]').live('change', function() {
			var folder_id = $(this).val();
			var controller = $(this).attr('title');
			var href_val = SITE_URL + SITE_AREA + '/content/files/wysiwyg/' + controller + '/' + folder_id;
			$('#files_right_pane').load(href_val + ' #files-wrapper', function() {
				$(this).children().fadeIn('slow');
				var class_exists = $('#folder-id-' + folder_id).html();
				$( 'div.notification' ).fadeOut('fast');
				if(class_exists !== null)
				{
					$('#files-nav li').removeClass('current');
					$('li#folder-id-'+folder_id).addClass('current'); 
				}				  
			});
		})

		$( '#files_right_pane' ).livequery(function() {
			$(this).children().fadeIn('slow');
			$('#upload-box').hide();
		});
		
		$('input[name="userfile"]').change( function (e) {
			$('input[name="name"]').val(e.target.files[0].name);
    });
		
	});
})(jQuery);
