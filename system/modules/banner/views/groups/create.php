<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($banner) ) {
    $banner = (array)$banner;
}
$id = isset($banner['id']) ? $banner['id'] : '';
?>
<div class="admin-box">
    <h3>Create Banner Group</h3>
    
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Title -->
        <div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'title', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="title" type="text" name="title" maxlength="255" value="<?php echo set_value('title', isset($banner['title']) ? $banner['title'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('title'); ?></span>
            </div>
        </div>
        
        <!-- Abbreviation -->
        <div class="control-group <?php echo form_error('abbr') ? 'error' : ''; ?>">
            <?php echo form_label('Abbreviation'. lang('bf_form_label_required'), 'abbr', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="abbr" type="text" name="abbr" maxlength="255" value="<?php echo set_value('abbr', isset($banner['abbr']) ? $banner['abbr'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('abbr'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Create Banner Group" />
            or <?php echo anchor(SITE_AREA .'/content/banner/groups', lang('banner_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
