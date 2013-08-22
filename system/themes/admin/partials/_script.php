<script>
	var BASE_URL							= '<?php echo base_url(); ?>';
	var SITE_URL							= '<?php echo base_url(); ?>';
	var SITE_AREA							= '<?php echo SITE_AREA; ?>';
	var DEFAULT_TITLE						= '<?php echo addslashes($this->settings_lib->item('site.title')); ?>';
	
	var admin								= {};
	admin.theme_url							= '<?php echo Template::theme_url(); ?>';
	admin.foreign_characters				= <?php echo json_encode(accented_characters()); ?>;
</script>