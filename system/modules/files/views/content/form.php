<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php Template::block('nav', 'content/nav'); ?>
<div class="admin-box">
	<?php if( isset($file) ) : ?>
		<h3><?php echo sprintf(lang('files.edit_title'), $file->name); ?></h3>
		<?php $id = isset($file->id) ? $file->id : '';
		?>
	<?php else: ?>	
		<h3><?php echo lang('files.upload_title'); ?></h3>
	<?php endif; ?>	

	<?php echo form_open_multipart(uri_string(), array('id'=>'form-fileupload','class' => 'form-horizontal')); ?>
	<fieldset>
	
		<div class="control-group <?php echo form_error('userfile') ? 'error' : ''; ?>">
			<?php echo form_label(lang('files.file_label'). lang('bf_form_label_required'), 'userfile', array('class' => "control-label") ); ?>
			<div class='controls'>				
				<span class="btn btn-success fileinput-button">
						<i class="icon-plus icon-white"></i>
						<span><?php echo isset($file->name) ? 'Change file' : 'Add file'; ?></span>
						<input type="file" name="userfile" id="file-input">
				</span>
				<span id="img-preview">
					<?php if(isset($file->id)): ?>
							
						<?php if ($file->type === 'i'): ?>
							<img title="<?php echo $file->name; ?>" src="<?php echo site_url('files/thumb/'.$file->id.'/80/80?cache=clear'); ?>" alt="<?php echo $file->name; ?>" />
						<?php else: ?>
							<img alt="o" src="<?php echo site_url('assets/images/admin/'.$file->type.'.png'); ?>">
						<?php endif; ?>
					<?php endif; ?>
				</span>		
			</div>
		</div>	
	
		<?php form_input(array('name'=>'name', 'id'=>'name'), isset($file->name) ? $file->name : '', lang('files.name_label')); ?>
							
		<div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
			<?php echo form_label(lang('files.name_label'). lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
			<div class='controls'>
				<input id="name"type="text" value="<?php echo isset($file->name) ? $file->name : ''; ?>" name="name">
				<span class="help-inline"><?php echo form_error('name'); ?></span>
			</div>
		</div>
		
		<div class="control-group <?php echo form_error('description') ? 'error' : ''; ?>">
			<?php echo form_label(lang('files.description_label'), 'description', array('class' => "control-label") ); ?>
			<div class="controls">
				<?php echo form_textarea(array(
					'name'	=> 'description',
					'id'	=> 'description',
					'value'	=> isset($file->description) ? $file->description : '',
					'rows'	=> '3',
					'cols'	=> '50'
					)); 
				?>				
				<span class="help-inline"><?php echo form_error('description'); ?></span>
			</div>
		</div>
		
		<?php echo form_dropdown(	array('name'=>'folder_id', 'id'=>'folder_id'), 
															$folders_tree,
															isset($file->folder_id) ? $file->folder_id : '',
															lang('files.folder_label'). lang('bf_form_label_required')
														); 
		?>
		
		<div class="form-actions">
			<button name="submit" type="submit" class="btn btn-primary" value="save">
					<i class="icon-upload icon-white"></i>
					<span>Save</span>
			</button>
			<a href="<?php echo site_url(SITE_AREA.'/content/files'. (isset($file->folder_id) ? '/folder/'.$file->folder_id : '') ); ?>" class="btn btn-warning">
					<i class="icon-ban-circle icon-white"></i>
					<span>Back</span>
			</a>
		</div>

		
	</fieldset>
	<?php echo form_close(); ?>
</div>