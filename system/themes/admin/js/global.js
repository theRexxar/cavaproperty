/* Nofication Close Buttons */
$('.notification a.close').click(function(e){
	e.preventDefault();

	$(this).parent('.notification').fadeOut();
});

/*
	Check All Feature
$(".check-all").click(function(){
	$("table input[type=checkbox]").attr('checked', $(this).is(':checked'));
});
*/

// action buttons start out as disabled
$(".form-actions button.delete").attr('disabled', 'disabled');

// Check all checkboxes in container grid
$(".check-all").live('click', function () {
	$("input[type=checkbox]").attr('checked', $(this).is(':checked'));

	// Check all?
	$(".form-actions button.delete").removeAttr('disabled');
});

// Enable/Disable action buttons
$('input[name="action_to[]"], input[name="checked[]"], .check-all').live('click', function () {
	var checked_val = $(this).val();
	$("input[value="+checked_val+"]").attr('checked', $(this).is(':checked'));		
	
	if( $('input[name="action_to[]"]:checked').length >= 1 ){
		$(".form-actions button.delete").removeAttr('disabled');
	} else {
		$(".form-actions button.delete").attr('disabled', 'disabled');
	}
	
	if( $('input[name="checked[]"]:checked').length >= 1 ){
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

/*
	Dropdowns
*/
$('.dropdown-toggle').dropdown();

/*
	Set focus on the first form field
*/
$(":input:visible:first").focus();

/*
 Prevent elements classed with "no-link" from linking
*/
// $(".no-link").click(function(e){ e.preventDefault();	});

//functions for codemirror
$('.html_editor').each(function() {
	CodeMirror.fromTextArea(this, {
			mode: 'text/html',
			tabMode: 'indent',
		height : '500px',
		width : '500px',
	});
});

$('.css_editor').each(function() {
	CodeMirror.fromTextArea(this, {
			mode: 'css',
			tabMode: 'indent',
		height : '500px',
		width : '500px',
	});
});

$('.js_editor').each(function() {
	CodeMirror.fromTextArea(this, {
			mode: 'javascript',
			tabMode: 'indent',
		height : '500px',
		width : '500px',
	});
});