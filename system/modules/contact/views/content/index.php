<div class="admin-box">
	<h3>Office List</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Contact.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check" width="1%"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th width="20%">Title</th>
            		<th width="30%">Address</th>
            		<th width="10%">Phone</th>
            		<th width="10%">Fax</th>
            		<th width="15%">Created</th>
            		<th width="15%"></th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Contact.Content.Delete')) : ?>
				<tr>
					<td colspan="8">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('contact_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Contact.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
					<td><?php echo $record->title?></td>
    				<td>
                        <?php 
    						$address = strip_tags($record->address);
    						echo ( strlen($address) > 200 ) ? substr($address,0,198) . '..' : $address;                        
    					?>
                    </td>
					<td><?php echo $record->phone?></td>
					<td><?php echo $record->fax?></td>
    				<td><?php echo date('d M Y - H:i:s',strtotime($record->created_on));?></td>
                    <td class="actions">
    					<?php if (has_permission('Contact.Content.Edit')): ?>
    					<?php 
    						echo anchor(SITE_AREA . '/content/contact/edit/' . $record->id, 
    												'<i class="icon-edit icon-white"></i> <span>Edit</span>', 
    												array('class' => 'btn btn-warning edit edit_file')
										);
    					?>
    					<?php endif; ?>
    					<?php if (has_permission('Contact.Content.Delete')): ?>
    					<?php 
							echo anchor(SITE_AREA . '/content/contact/delete/' . $record->id, 
													'<i class="icon-trash icon-white"></i> <span>Delete</span>', 
													array('class' => 'btn btn-danger confirm', "onclick" => "return confirm('".lang("contact_delete_confirm")."')")
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
</div>