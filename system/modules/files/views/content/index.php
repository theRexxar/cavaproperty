<?php Template::block('nav', 'content/nav'); ?>
<div class="admin-box">
	<h3><?php echo lang('file_folders.manage_title'); ?></h3>

	<?php if ($file_folders): ?>
	<?php echo form_open(SITE_AREA . '/content/files/folders/action', array('class' => 'ajax-form', 'id'=>'folders_list'));?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="20">
						<?php if (has_permission('Files.Content.Delete')): ?>
						<?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')); ?>
						<?php endif; ?>
					</th>
					<th><i class="icon-folder-open"></i> <?php echo lang('files.name_label'); ?></th>
					<th><?php echo lang('file_folders.slug_label'); ?>
					<th width="100" class="align-center"><?php echo lang('file_folders.created_label'); ?></th>
					<th width="200"></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($file_folders as $folder): ?>
				<tr>
					<td>
						<?php if (has_permission('Files.Content.Delete')): ?>
						<?php echo form_checkbox('action_to[]', $folder->id); ?>
						<?php endif; ?>
					</td>
					<td>
						<?php echo anchor(SITE_AREA . '/content/files/folder/' . $folder->id, '<i class="icon-share"></i> ' . repeater('&raquo; ', $folder->depth) . $folder->name, 'title="' . $folder->name .'" data-path="' . $folder->virtual_path . '" class="folder-hash ajaxify"'); ?>
						</td>
					<td><?php echo $folder->slug; ?></td>
					<td class="align-center"><?php echo date('Y-m-d', $folder->date_added); ?></td>
					<td class="actions">
						<?php if (has_permission('Files.Content.Edit')): ?>
						<?php 
									echo anchor(SITE_AREA . '/content/files/folders/edit/' . $folder->id, 
															'<i class="icon-edit icon-white"></i> <span>'.lang('file_folders.edit').'</span>', 
															array('class' => 'btn btn-warning edit edit_file')
														);
						?>
						<?php endif; ?>
						<?php if (has_permission('Files.Content.Delete')): ?>
						<?php 
									echo anchor(SITE_AREA . '/content/files/folders/delete/' . $folder->id, 
															'<i class="icon-trash icon-white"></i> <span>'.lang('file_folders.delete').'</span>', 
															array('class' => 'btn btn-danger confirm')
														); 
						?>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
			
		<?php if (has_permission('Files.Content.Delete')): ?>
		<div class="form-actions">
			<button type="submit" name="btnAction" value="delete" class="btn btn-danger delete" disabled="disabled">
				<i class="icon-trash icon-white"></i>
				<span><?php echo lang('file_folders.delete'); ?></span>
			</button>
		</div>
		<?php endif; ?>
		
		<?php echo form_close();?>
	<?php else: ?>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td><?php echo lang('file_folders.no_folders');?></td>
				</tr>
			</tbody>
		</table>
	<?php endif; ?>
</div>