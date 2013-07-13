<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($project) ) {
    $project = (array)$project;
}
$id = isset($project['id']) ? $project['id'] : '';
?>
<div class="admin-box">
    <h3>Create Location</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Title -->
        <div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'title', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="title" type="text" name="title" maxlength="255" value="<?php echo set_value('title', isset($project['title']) ? $project['title'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('title'); ?></span>
            </div>
        </div>

        <!-- Slug -->
        <div class="control-group <?php echo form_error('slug') ? 'error' : ''; ?>">
            <?php echo form_label('Slug'. lang('bf_form_label_required'), 'slug', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="slug" type="text" name="slug" maxlength="255" value="<?php echo set_value('slug', isset($project['slug']) ? $project['slug'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('slug'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Location" />
            or <?php echo anchor(SITE_AREA .'/content/project/project_location', lang('project_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
