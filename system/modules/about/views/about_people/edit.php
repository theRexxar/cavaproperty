<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($about) ) {
    $about = (array)$about;
}
$id = isset($about['id']) ? $about['id'] : '';
?>
<div class="admin-box">
    <h3>Edit People</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Name -->
        <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
            <?php echo form_label('Name'. lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name', isset($about['name']) ? $about['name'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('name'); ?></span>
            </div>
        </div>
        
        <!-- Description -->
        <div class="control-group <?php echo form_error('description') ? 'error' : ''; ?>">
            <?php echo form_label('Description'. lang('bf_form_label_required'), 'description', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'description', 
                                                'id'    => 'description', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('description', isset($about['description']) ? $about['description'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('description'); ?></span>
            </div>
        </div>
        
        <!-- Image -->
        <div class="control-group <?php echo form_error('image_id') ? 'error' : '' ?>">
            <?php echo form_label('Image'. lang('bf_form_label_required'), '', array('class' => "control-label") ); ?>
            <div class="controls">
                <span id="span_image_id"> 
                    <input type="hidden" id="image_id" name="image_id" value="<?php echo isset($about['image_id']) ? $about['image_id'] : ''; ?>" />
                    <img width="200" src="<?php echo isset($about['image_id']) && !empty($about['image_id']) ? site_url('files/thumb/'.$about['image_id'].'/200/fit') : img_path().'no_image.jpg'; ?>" />
                </span>
            </div>
            <br />
            <div class="controls">
                <a href="<?php echo site_url(SITE_AREA.'/content/files/fileman/image/?target=image_id'); ?>" class="btn btn-success btn-upload-iframe" data-target="image_id">Add Image</a>
                <a href="#" id="delete-button" class="btn btn-danger delete-image" rel="<?php echo $about['id']; ?>">Remove Image</a>        
                <?php if (form_error('image_id')) echo '<span class="help-inline">'. form_error('image_id') .'</span>'; ?>                  
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit People" />
            or <?php echo anchor(SITE_AREA .'/content/about/about_people', lang('about_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('About.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('about_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('about_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>

<!-- javascript for delete gallery -->
<script>
    var URL_IMAGE   = '<?php echo site_url(SITE_AREA ."/content/about/about_people/delete_image") ?>' ;
</script>