//<script>
$('#folder_path').change(function(){
	window.location.href='<?php echo site_url(SITE_AREA.'/content/files/folder'); ?>?path='+ $('#folder_path').val() + '&filter=' + $('#filter').val();
	return false;
});

$('#filter').change(function(){
	window.location.href='<?php echo site_url(SITE_AREA.'/content/files/folder'); ?>?path='+ $('#folder_path').val() + '&filter=' + $('#filter').val();
	return false;
});