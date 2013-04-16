$(function() {
	$( ".sortable" ).sortable({
		update: update_order,
		placeholder: "ui-state-highlight",
        axis: 'y'
	}).disableSelection();
});

function update_order(event, ui) {
	order = new Array();
	$('tr', this).each(function(){
		order.push( $(this).find('input[name="action_to[]"]').val() );
	});
	order = order.join(',');

	$.post('<?php echo site_url(SITE_AREA.'/content/banner/ajax_update_positions'); ?>', { order: order }, function() {
		$('tr').removeClass('alt');
		$('tr:even').addClass('alt');
	});
}