<div class="scrollable" id="ajax-content">

<div class="admin-box">
	<h3>Banner List</h3>
                    
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
	<?php 
        $group = "";
        foreach ($records as $record) : 
    ?>
    
    <?php if(!empty($group) AND $group != $record->group_id): ?>
		</tbody>
		</table>
	<?php endif;?>
    
    <?php if($group != $record->group_id): ?>                
        <h4 class="banner-group"><?php echo $groups[$record->group_id]->title;?></h4>
        
        <?php echo form_open($this->uri->uri_string()); ?>        
		<table class="table table-striped" style="margin-bottom: 20px;">
			<thead>
				<tr>
                    <?php if ($this->auth->has_permission('Banner.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<!--<th class="column-check"><input class="check-all" type="checkbox" /></th>-->
					<?php endif;?>
                    
                    <th class="column-check"></th>
                    <th width="10%">Image</th>
            		<th width="15%">Title</th>
            		<th width="30%">Summary</th>
					<th width="10%">URL</th>
					<th width="5%">Publish</th>
            		<th width="10%">Created</th>
            		<th width="20%"></th>
				</tr>
			</thead>
            
            <tfoot>
				<?php if ($this->auth->has_permission('Banner.Content.Delete')) : ?>
				<tr>
					<td colspan="11">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('banner_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
                                                
			<tbody class="sortable">
    <?php endif;?>            
				<tr style="cursor: move;">    
                    <?php if ($this->auth->has_permission('Banner.Content.Delete')) : ?>
					<td style="vertical-align: middle;"><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
                			                    
                    <td width="10%"><?php echo form_hidden('action_to[]', $record->id); ?><img src="<?php echo base_url().'files/large/'.$record->image_id.'/100/100' ?>" /></td>
    				<td width="15%"><?php echo $record->title?></td>
    				<td width="30%">
                        <?php 
    						$summary = strip_tags($record->summary);
    						echo ( strlen($summary) > 100 ) ? substr($summary,0,98) . '..' : $summary;                        
    					?>
                    </td>
                    <td width="10%"><?php echo $record->url?></td>
                    <td width="5%">
                        <?php
                            switch($record->publish)
                            {
                                case "Y" : $publish = "Yes";break;
                                case "N" : $publish = "No";break;
                            } 
                            echo $publish;
                        ?>
                    </td>
    				<td width="10%"><?php echo date('d M Y - H:i:s',strtotime($record->created_on));?></td>
                    <td width="20%" class="actions">
    					<?php if (has_permission('Banner.Content.Edit')): ?>
    					<?php 
    						echo anchor(SITE_AREA . '/content/banner/edit/' . $record->id, 
    												'<i class="icon-edit icon-white"></i> <span>Edit</span>', 
    												array('class' => 'btn btn-warning edit edit_file')
										);
    					?>
    					<?php endif; ?>
    					<?php if (has_permission('Banner.Content.Delete')): ?>
    					<?php 
							echo anchor(SITE_AREA . '/content/banner/delete/' . $record->id, 
													'<i class="icon-trash icon-white"></i> <span>Delete</span>', 
													array('class' => 'btn btn-danger confirm', "onclick" => "return confirm('".lang("banner_delete_confirm")."')")
                                        ); 
    					?>
    					<?php endif; ?>
    				</td>
				</tr>
			
   <?php $group = $record->group_id; ?>
   <?php endforeach; ?>            
			</tbody>
		</table>
        <?php echo form_close(); ?>
                
    <?php else: ?>
        <table class="table table-striped" style="margin-bottom: 20px;">
			<thead>
				<tr>
                    <?php if ($this->auth->has_permission('Banner.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<!--<th class="column-check"><input class="check-all" type="checkbox" /></th>-->
					<?php endif;?>
                    
                    <th class="column-check"></th>
                    <th width="10%">Image</th>
            		<th width="15%">Title</th>
            		<th width="30%">Summary</th>
					<th width="10%">URL</th>
					<th width="5%">Publish</th>
            		<th width="15%">Created</th>
            		<th width="15%"></th>
				</tr>
			</thead>
            
            <tbody>
    			<tr>
    				<td colspan="8">No records found that match your selection.</td>
    			</tr>
            </tbody>
		</table>
	<?php endif; ?>
</div>

</div>