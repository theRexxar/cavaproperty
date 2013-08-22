<div class="admin-box">

	<div style="float: right; clear: both;">
		<h3>
            <em>Total Confirmed Calendar :</em> <strong><?php echo $total_confirmed; ?></strong> | 
    		<em>Total Rejected Calendar :</em> <strong><?php echo $total_rejected; ?></strong> | 
    		<em>Total Pending Calendar :</em> <strong><?php echo $total_pending; ?></strong>
        </h3>
	</div>

	<h3><?php echo $page_title ?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Marketing.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check" width="1%"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th width="20%">Marketing</th>
            		<th width="20%">Member</th>
            		<th width="15%">Property</th>
            		<th width="10%">Date</th>
            		<th width="10%">Status</th>
            		<th width="10%">Created</th>
            		<th width="15%"></th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Marketing.Content.Delete')) : ?>
				<tr>
					<td colspan="8">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('marketing_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Marketing.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
				
					<td><?php echo $record->name_marketing?></td>
					<td><?php echo $record->first_name_member.' '.$record->last_name_member?></td>
					<td><?php echo $record->title_property?></td>
    				<td><?php echo date('d F Y',strtotime($record->date));?></td>
					<td><?php echo ucfirst($record->status)?></td>
    				<td><?php echo date('d M Y - H:i:s',strtotime($record->created_on));?></td>
                    <td class="actions" style="text-align: center;">
    					<?php if (has_permission('Marketing.Content.Edit')): ?>
    					<?php/* 
    						echo anchor(SITE_AREA . '/content/marketing/edit/' . $record->id, 
    												'<i class="icon-edit icon-white"></i> <span>Edit</span>', 
    												array('class' => 'btn btn-warning edit edit_file')
										);*/
    					?>
    					<?php endif; ?>

    					<?php 
    						echo anchor(SITE_AREA . '/content/marketing/marketing_calendar/detail/' . $record->id, 
    												'<span>Detail</span>', 
    												array('class' => 'btn')
										);
    					?>

    					<br>

    					<?php 
    						if($record->status == 'pending')
    						{
    							echo anchor(SITE_AREA . '/content/marketing/marketing_calendar/confirm/' . $record->id, 
    												'<i class="icon-edit icon-white"></i> <span>Confirm</span>', 
    												array('class' => 'btn btn-warning', 'style' => 'margin-top: 5px;', "onclick" => "return confirm('".lang("marketing_confirm_confirm")."')")
										);

    							echo anchor(SITE_AREA . '/content/marketing/marketing_calendar/reject/' . $record->id, 
	    												'<i class="icon-trash icon-white"></i> <span>Reject</span>', 
	    												array('class' => 'btn btn-danger', 'style' => 'margin-top: 5px;', "onclick" => "return confirm('".lang("marketing_reject_confirm")."')")
											);
    						}
    					?>

    					<?php if (has_permission('Marketing.Content.Delete')): ?>
    					<?php /*
							echo anchor(SITE_AREA . '/content/marketing/marketing_calendar/delete/' . $record->id, 
													'<i class="icon-trash icon-white"></i> <span>Delete</span>', 
													array('class' => 'btn btn-danger confirm', 'style' => 'margin-top: 5px;', "onclick" => "return confirm('".lang("marketing_delete_confirm")."')")
                                        ); */
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