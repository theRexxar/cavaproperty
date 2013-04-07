<?php Template::block('nav', 'content/nav'); ?>
<div class="admin-box">	
	<?php echo form_open(SITE_AREA . '/content/files/action', array('class' => 'form-inline'));?>	
	
		<h3><?php echo $crumbs; ?></h3>
		
		<div id="files-toolbar">
            
			<label class="control-label" for="folder_path"><?php echo lang('file_folders.subfolders_label'); ?></label>
			<?php //echo form_dropdown(array('name'=>'folder_path','id'=>'folder_path','no_parent'=>true), $sub_folders, $folder->virtual_path); ?>
            
            <select name="folder_path" id="folder_path" no_parent="1">
                <?php foreach($sub_folders as $key=>$val) : ?>
                <option value="<?php echo $key; ?>" <?php echo $key == $folder->virtual_path ? 'selected="selected"' : ""; ?> ><?php echo $val; ?></option>
                <?php endforeach; ?>
            </select>
			
			<label class="control-label" for="filter"><?php echo lang('files.filter_label'); ?></label>
			<?php //echo form_dropdown(array('name'=>'filter','id'=>'filter','no_parent'=>true), array('' => lang('files.dropdown_select_all')) + $types, $selected_filter); ?>
                        
            <select name="filter" id="filter" no_parent="1">
                <option value="" ><?php echo lang('files.dropdown_select_all'); ?></option>
                <?php foreach($types as $key=>$val) : ?>
                <option value="<?php echo $key; ?>" <?php echo $key == $selected_filter ? 'selected="selected"' : ""; ?> ><?php echo $val; ?></option>
                <?php endforeach; ?>
            </select>
            
		<?php if (has_permission('Files.Content.Edit')): ?>	
			<?php echo form_hidden('folder_id', $folder->id); ?>
			<a href="<?php echo site_url(SITE_AREA . '/content/files/upload/'.$folder->id);?>" class="btn btn-primary" id="btn-upload">
				<i class="icon-upload icon-white"></i>
				<span><?php echo lang('files.upload_title'); ?></span>				
			</a>
		<?php endif; ?>	
		
			<a href="<?php echo site_url(SITE_AREA . '/content/files'); ?>" class="btn btn-warning">
				<i class="icon-arrow-left icon-white"></i>
				<span>Back</span>
			</a>
		
		<?php if ($files): ?>
			<div id="files-display">	
				<a href="#" title="grid" class="toggle-view"><?php echo lang('files.display_grid'); ?></a>
				<a href="#" title="list" class="toggle-view active-view"><?php echo lang('files.display_list'); ?></a>
			</div>
		<?php endif; ?>	
		
		</div>

		<?php if ($files): ?>
		<div id="grid" class="list-items">
		
			<div id="check-all" class="control-group">
				<div class="controls">				
					<div class="inputs-list">
						<label>
							<?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all grid-check-all')); ?>
							<span><?php echo lang('files.check-all'); ?></span>
						</label>
					</div>
				</div>
			</div>
			
			<ul class="grid clearfix">
			<?php foreach($files as $file): ?>
				<li>
					<div class="actions">
					<?php echo form_checkbox('action_to[]', $file->id); ?>
					<?php
						if (has_permission('Files.Content.Download'))
						{
							echo anchor('files/download/' . $file->id, lang('files.download_label'), array('class' => 'download_file'));
						}
						
							if (has_permission('Files.Content.Edit'))
						{
							echo anchor(SITE_AREA . '/content/files/edit/' . $file->id, lang('file_folders.edit'), array('class' => 'edit_file'));
						}
						
						if (has_permission('Files.Content.Delete'))
						{
							echo anchor(SITE_AREA . '/content/files/delete/' . $file->id, lang('file_folders.delete'), array('class'=>'confirm'));
						}
					?>
					</div>
				<?php if ($file->type === 'i'): ?>
				<a title="<?php echo $file->name; ?>" href="<?php echo base_url() . config_item('files_folder') . $file->filename; ?>" rel="colorbox">
					<img title="<?php echo $file->name; ?>" width="64" src="<?php echo site_url('files/thumb/' . $file->id . '/64/64'); ?>" alt="<?php echo $file->name; ?>" />
				</a>
				<?php else: ?>
					<img alt="o" src="<?php echo site_url('assets/images/admin/'.$file->type.'.png'); ?>">
				<?php endif; ?>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
		
		<table class="table table-striped" id="list">
			<thead>
				<tr>
					<th width="20" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')); ?></th>
					<th width="20" class="align-center">#</th>
					<th><?php echo lang('files.type_label'); ?></th>
					<th><?php echo lang('files.name_label'); ?></th>
					<th width="100" class="align-center"><?php echo lang('file_folders.created_label'); ?></th>
					<th width="250">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($files as $file): ?>
				<tr>
					<td class="align-center"><?php echo form_checkbox('action_to[]', $file->id); ?></td>
					<td class="align-center"><?php echo $file->id; ?></td>
					<td><?php echo lang('files.type_'.$file->type); ?></td>
					<td><?php echo strlen($file->name) > 25 ? '<span title="' . $file->name . '">' . ellipsize($file->name, 25, .8) . '</span>' : $file->name; ?></td>
					<td class="align-center"><?php echo date('Y-m-d',$file->date_added); ?></td>
					<td class="actions">
					<?php
						if (has_permission('Files.Content.Download'))
						{
							echo anchor('files/download/' . $file->id, 
													'<i class="icon-download icon-white"></i> <span>'.lang('files.download_label').'</span>', 
													array('class' => 'btn btn-success download download_file')
												);
						}
					?>
						
					<?php
						if (has_permission('Files.Content.Edit'))
						{
							echo anchor(SITE_AREA . '/content/files/edit/' . $file->id, 
													'<i class="icon-edit icon-white"></i> <span>'.lang('file_folders.edit').'</span>', 
													array('class' => 'btn btn-warning edit edit_file')
												);
						}
					?>
						
					<?php
						if (has_permission('Files.Content.Delete'))
						{
							echo anchor(SITE_AREA . '/content/files/delete/' . $file->id, 
													'<i class="icon-trash icon-white"></i> <span>'.lang('file_folders.delete').'</span>', 
													array('class' => 'btn btn-danger confirm')
												);
						}
					?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		
		<div class="form-actions">
			<button type="submit" name="btnAction" value="delete" class="btn btn-danger delete" disabled="disabled">
				<i class="icon-trash icon-white"></i>
				<span><?php echo lang('file_folders.delete'); ?></span>
			</button>
		</div>

		<?php else: ?>		
		<table class="table table-striped" id="list">
			<tr>
				<td><?php echo lang('files.no_files');?></td>
			</tr>
		</table>
		<?php endif; ?>
	<?php echo form_close();?>
</div>