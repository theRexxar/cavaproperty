jQuery(function($){
/*
	// Table action buttons start out as disabled
	$(".form-actions button.delete").attr('disabled', 'disabled');

	// Check all checkboxes in container table or grid
	$(".check-all").live('click', function () {
		$("input[type=checkbox]").attr('checked', $(this).is(':checked'));

		// Check all?
		$(".form-actions button.delete").removeAttr('disabled');
	});

	// Enable/Disable table action buttons
	$('input[name="action_to[]"], .check-all').live('click', function () {
		var checked_val = $(this).val();
		$("input[value="+checked_val+"]").attr('checked', $(this).is(':checked'));		
		
		if( $('input[name="action_to[]"]:checked').length >= 1 ){
			$(".form-actions button.delete").removeAttr('disabled');
		} else {
			$(".form-actions button.delete").attr('disabled', 'disabled');
		}
	});
	
	// Grid/List files list view
	$('a.toggle-view').live('click', function(e){
		e.preventDefault();

		var view = $(this).attr('title');

		// remember the user's preference
		// $.cookie('file_view', view);

		$('a.active-view').removeClass('active-view');
		$(this).addClass('active-view');

		if (view == 'grid')
		{
			hide_view = 'list';
		}
		else
		{
			hide_view = 'grid';
		}

		$('#'+hide_view).fadeOut(50, function() {
			$('#'+view).fadeIn(500);   
		});            
	});
*/
});