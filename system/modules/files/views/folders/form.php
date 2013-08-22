<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php Template::block('nav', 'content/nav'); ?>
<div class="admin-box">	
	
	<?php if( isset($folder) ) : ?>
		<h3><?php echo sprintf(lang('file_folders.edit_title'), $folder->name); ?></h3>
		<?php $id = isset($folder->id) ? $folder->id : '';
	?>
	<?php else: ?>	
		<h3><?php echo lang('file_folders.create_title'); ?></h3>
	<?php endif; ?>	

	<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal', 'id' => 'form-folders')); ?>
	<fieldset>
							
		<div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
			<?php echo form_label(lang('file_folders.name_label'). lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
			<div class='controls'>
				<input id="name" type="text" value="<?php echo isset($folder->name) ? $folder->name : ''; ?>" name="name">
				<span class="help-inline"><?php echo form_error('name'); ?></span>
			</div>
		</div>
		
		<div class="control-group <?php echo form_error('slug') ? 'error' : ''; ?>">
			<?php echo form_label(lang('file_folders.slug_label'). lang('bf_form_label_required'), 'slug', array('class' => "control-label") ); ?>
			<div class='controls'>
				<input id="slug" type="text" value="<?php echo isset($folder->slug) ? $folder->slug : ''; ?>" name="slug">
				<span class="help-inline"><?php echo form_error('slug'); ?></span>
			</div>
		</div>
		
		<?php echo form_dropdown(	array('name'=>'parent_id','id'=>'parent_id'), 
															array(0 => lang('files.dropdown_no_subfolders')) + $folders_tree, 
															isset($folder->parent_id) ? $folder->parent_id : '',
															lang('file_folders.parent_label')
														); 
		?>		
		
		<div class="form-actions">
			<button name="submit" type="submit" class="btn btn-primary" value="save">
					<i class="icon-upload icon-white"></i>
					<span>Save</span>
			</button>
			<a href="<?php echo site_url(SITE_AREA.'/content/files'); ?>" class="btn btn-warning">
					<i class="icon-arrow-left icon-white"></i>
					<span>Back</span>
			</a>
		</div>
		
	</fieldset>
	<?php echo form_close(); ?>
</div>