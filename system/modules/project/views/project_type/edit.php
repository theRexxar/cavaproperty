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
    <h3>Edit Type</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Category -->
        <div class="control-group <?php echo form_error('category_id') ? 'error' : ''; ?>">
            <?php echo form_label('Category'. lang('bf_form_label_required'), 'category_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="category_id" id="category_id" no_parent="1" style="width: 230px;" >
                    <?php foreach($category AS $category_list) : ?>
                    <option value="<?php echo $category_list->id; ?>" <?php echo isset($project['category_id']) && $category_list->id == $project['category_id'] ? 'selected="selected"' : ""; ?> ><?php echo $category_list->title; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="help-inline"><?php echo form_error('category_id'); ?></span>
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

        <!-- Description -->
        <div class="control-group <?php echo form_error('description') ? 'error' : ''; ?>">
            <?php echo form_label('Description', 'description', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'description', 
                                                'id'    => 'description', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('description', isset($project['description']) ? $project['description'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('description'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Type" />
            or <?php echo anchor(SITE_AREA .'/content/project/project_type', lang('project_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Project.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('project_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('project_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
