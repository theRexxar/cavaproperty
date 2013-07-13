<div class="alert alert-block alert-notification fade in ">
	<a class="close" data-dismiss="alert">&times;</a>
	<h4 class="alert-heading"><?php echo lang('file_folders.confirm_delete'); ?></h4>
</div>
	
<?php Template::block('nav', 'content/nav'); ?>
<div class="admin-box">
<?php if ($file_folders): ?>
	
	<h3><?php echo lang('file_folders.delete_title'); ?></h3>

	<?php echo form_open(SITE_AREA . '/content/files/folders/delete/', array('class' => 'form-inline')); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="20"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all', 'checked' => TRUE)); ?></th>
					<th><?php echo lang('files.name_label'); ?></th>
					<th width="100" class="align-center"><?php echo lang('file_folders.created_label'); ?></th>
					<th class="align-center">Subfolders</th>
					<th class="align-center">Files</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($file_folders as $folder): ?>
				<tr>
					<td><?php echo form_checkbox('action_to[]', $folder->id, TRUE); ?></td>
					<td><?php echo anchor(SITE_AREA . '/content/files/folder/' . $folder->id, repeater('&raquo; ', $folder->depth) . $folder->name, 'title="' . $folder->name .'" data-path="' . $folder->virtual_path . '" class="folder-hash"'); ?></td>
					<td class="align-center"><?php echo date('Y-m-d', $folder->date_added); ?></td>
					<td class="align-center"><?php echo $folder->count_subfolders; ?></td>
					<td class="align-center"><?php echo $folder->count_files; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		
			
		<div class="form-actions">		
			<button class="btn btn-danger" value="yes" name="submit" type="submit">
				<span><?php echo lang('file_folders.yes'); ?></span>
			</button>		
			<a href="<?php echo site_url(SITE_AREA.'/content/files'); ?>" class="btn btn-success">
				<span><?php echo lang('file_folders.no'); ?></span>
			</a>			
		</div>
	<?php echo form_close(); ?>
<?php endif; ?>
</div>