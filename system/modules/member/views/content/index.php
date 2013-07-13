<div class="admin-box">
	<h3>Member List</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Member.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check" width="1%"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>

					<th width="20%">Name</th>
					<th width="20%">Email</th>
					<th width="15%">Phone</th>
					<th width="15%">Mobile Phone</th>
            		<th width="15%">Created</th>
            		<th width="15%"></th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Member.Content.Delete')) : ?>
				<tr>
					<td colspan="17">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('member_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Member.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
				
					<td><?php echo $record->first_name.' '.$record->last_name ?></td>
					<td><?php echo $record->email ?></td>
					<td><?php echo $record->phone ?></td>
					<td><?php echo $record->mobile_phone ?></td>
    				<td><?php echo date('d M Y - H:i:s',strtotime($record->created_on));?></td>
                    <td class="actions" style="text-align: center;">
    					<?php if (has_permission('Member.Content.Edit')): ?>
    					<?php /*
    						echo anchor(SITE_AREA . '/content/member/edit/' . $record->id, 
    												'<i class="icon-edit icon-white"></i> <span>Edit</span>', 
    												array('class' => 'btn btn-warning edit edit_file')
										);*/
    					?>
    					<?php endif; ?>

    					<?php 
							echo anchor(SITE_AREA . '/content/member/detail/' . $record->id, 
													'<span>Detail</span>', 
													array('class' => 'btn confirm', 'style' => 'margin-bottom: 5px')
                                        ); 
    					?>

    					<br>

    					<?php 
    						if($record->block == "Y")
    						{
								echo anchor(SITE_AREA . '/content/member/unblock/' . $record->id, 
														'<i class="icon-trash icon-white"></i> <span>Unblock</span>', 
														array('class' => 'btn btn-warning confirm', "onclick" => "return confirm('".lang("member_unblock_confirm")."')")
	                                        ); 
    						}
    						else
    						{
								echo anchor(SITE_AREA . '/content/member/block/' . $record->id, 
														'<i class="icon-trash icon-white"></i> <span>Block</span>', 
														array('class' => 'btn btn-warning confirm', "onclick" => "return confirm('".lang("member_block_confirm")."')")
	                                        ); 
    						}
    					?>

    					<?php if (has_permission('Member.Content.Delete')): ?>
    					<?php 
							echo anchor(SITE_AREA . '/content/member/delete/' . $record->id, 
													'<i class="icon-trash icon-white"></i> <span>Delete</span>', 
													array('class' => 'btn btn-danger confirm', "onclick" => "return confirm('".lang("member_delete_confirm")."')")
                                        ); 
    					?>
    					<?php endif; ?>
    				</td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
    
    <?php echo $this->pagination->create_links(); ?>
</div>