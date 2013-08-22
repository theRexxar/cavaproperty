<div class="admin-box">

	<div style="float: right; clear: both; margin-top: 5px; margin-right: 10px;">
		<form method="get" action="<?php echo site_url('admin/content/project/project_property'); ?>"> 
            <select name="category" style="margin-bottom: 10px; width: 150px;">
            	<option value="">-Select Category-</option>
				<option value="primary" <?php if($this->input->get('category') == "primary") { echo "selected='selected'"; } ?>>Primary</option>
				<option value="secondary" <?php if($this->input->get('category') == "secondary") { echo "selected='selected'"; } ?>>Secondary</option>
			</select>
			<input type="submit" value="Search" style="margin-bottom: 10px;" />
			<input type="button" value="Clear" onclick="parent.location='<?php echo site_url('admin/content/project/project_property') ?>'" />
		</form>
	</div>

	<h3>Property List</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Project.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check" width="1%"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
            		<th width="15%">Type</th>
            		<th width="15%">Developer</th>
            		<th width="15%">Image</th>
            		<th width="20%">Title</th>
            		<th width="10%">Marketing</th>
            		<th width="10%">Created</th>
            		<th width="15%"></th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Project.Content.Delete')) : ?>
				<tr>
					<td colspan="8">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('project_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Project.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				    <td>
				    	<?php echo $record->title_type?>
				    	<br />
				    	<strong>
				    		<em>(<?php echo ucfirst($record->category); ?>)</em>
				    	</strong>
				    </td>
				    <td><?php echo $record->title_developer?></td>
				    <td>
                        <img src="<?php echo base_url().'files/large/'.$record->image_id.'/200/200' ?>" />
                    </td>
				    <td><?php echo $record->title?></td>
    				<td><?php echo $record->name_marketing?></td>
    				<td><?php echo date('d M Y - H:i:s',strtotime($record->created_on));?></td>
                    <td class="actions">
    					<?php if (has_permission('Project.Content.Edit')): ?>
    					<?php 
    						echo anchor(SITE_AREA . '/content/project/project_property/edit/' . $record->id, 
    												'<i class="icon-edit icon-white"></i> <span>Edit</span>', 
    												array('class' => 'btn btn-warning edit edit_file')
										);
    					?>
    					<?php endif; ?>
    					<?php if (has_permission('Project.Content.Delete')): ?>
    					<?php 
							echo anchor(SITE_AREA . '/content/project/project_property/delete/' . $record->id, 
													'<i class="icon-trash icon-white"></i> <span>Delete</span>', 
													array('class' => 'btn btn-danger confirm', "onclick" => "return confirm('".lang("project_delete_confirm")."')")
                                        ); 
    					?>
    					<?php endif; ?>
    				</td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="8">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
    
    <?php echo $this->pagination->create_links(); ?>
</div>