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
    <h3>Create City</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Location -->
        <div class="control-group <?php echo form_error('location_id') ? 'error' : ''; ?>">
            <?php echo form_label('Location'. lang('bf_form_label_required'), 'location_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="location_id" id="location_id" no_parent="1" style="width: 230px;" >
                    <?php foreach($location AS $location_list) : ?>
                    <option value="<?php echo $location_list->id; ?>" <?php echo isset($project['location_id']) && $location_list->id == $project['location_id'] ? 'selected="selected"' : ""; ?> ><?php echo $location_list->title; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="help-inline"><?php echo form_error('location_id'); ?></span>
            </div>
        </div>
        
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
            <input type="submit" name="save" class="btn btn-primary" value="Create City" />
            or <?php echo anchor(SITE_AREA .'/content/project/project_city', lang('project_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
