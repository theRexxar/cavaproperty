<div class="row">

	<div class="column size1of4 media-box">&nbsp;</div>

	<?php if (has_permission('Files.Content.View')): ?>
	<div class="column size1of4 media-box">
		<a href="<?php echo site_url(SITE_AREA .'/content/files') ?>">
			<img src="<?php echo Template::theme_url('images/folder_black_dashboard.png') ?>" />
		</a>

		<p><b><?php echo lang('files.list_file'); ?></b><br/>
		<span><?php echo lang('files.list_file_description'); ?></span>
		</p>
	</div>
	<?php endif; ?>

	<?php if (has_permission('Files.Content.View')): ?>
	<div class="column size1of4  media-box">
		<a href="<?php echo site_url(SITE_AREA .'/content/files/create') ?>">
			<img src="<?php echo Template::theme_url('images/upload_file.png') ?>" />
		</a>

		<p><b><?php echo lang('files.upload_file'); ?></b><br/>
		<span><?php echo lang('files.upload_file_description'); ?></span>
		</p>
	</div>
	<?php endif; ?>

	<?php if (has_permission('Files.Content.View')): ?>
	<div class="column size1of4 media-box">
		<a href="<?php echo site_url(SITE_AREA .'/content/files/folders/create') ?>">
			<img src="<?php echo Template::theme_url('images/folder_black_web_upload.png') ?>" />
		</a>

		<p><b><?php echo lang('files.create_folder'); ?></b><br/>
		<span><?php echo lang('files.create_folder_description'); ?></span>
		</p>
	</div>
	<?php endif; ?>

</div>

<br/>