<?php
	Assets::add_css( array(
		css_path() . 'bootstrap.min.css',
		css_path() . 'bootstrap-responsive.min.css',
		Template::theme_url('css/jquery/ui-lightness/jquery-ui.css'),
	));

	Assets::add_js( array(
		js_path() . 'bootstrap.min.js',
		Template::theme_url('js/jquery/jquery.plugin.livequery.js'),
		Template::theme_url('js/jquery-ui-1.8.13.min.js'),
	));

?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Always force latest IE rendering engine & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php echo isset($toolbar_title) ? $toolbar_title : ''; ?></title>

	<script type="text/javascript">
		var BASE_URL							= '<?php echo base_url(); ?>';
		var SITE_URL							= '<?php echo site_url(); ?>';
		var SITE_AREA							= '<?php echo SITE_AREA; ?>';
	</script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.1.min.js"><\/script>')</script>

	<?php echo Assets::js(); ?>
	<?php // echo $template['metadata']; ?>

	<script type="text/javascript">

		//var CKEDITOR = window.parent.CKEDITOR;

		function windowClose()
		{
			//CKEDITOR.dialog.getCurrent().hide();
		}

		function insertHTML(html)
		{
			
			//window.parent.admin.insertHtml(html);
		}

		(function($)
		{
		
		 //
		 
		})(jQuery);
	</script>
	<?php echo Assets::css(null, true); ?>
	<style type="text/css">
		body{padding:0px}
	</style>
</head>
<body>
	<?php 
		echo Template::message();
		echo Template::yield(); 
	?>
</body>
</html>	
