<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($marketing) ) {
    $marketing = (array)$marketing;
}
$id = isset($marketing['id']) ? $marketing['id'] : '';
?>
<div class="admin-box">
    <h3>Agent</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        
        <!-- Name -->
        <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
            <?php echo form_label('Name'. lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name', isset($marketing['name']) ? $marketing['name'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('name'); ?></span>
            </div>
        </div>
                    
        <!-- Phone -->
        <div class="control-group <?php echo form_error('phone') ? 'error' : '' ?>">
            <?php echo form_label('Phone'. lang('bf_form_label_required'), 'phone', array('class' => "control-label") ); ?>
            <div class="controls">
                <input id="phone" type="text" name="phone" value="<?php echo set_value('phone', isset($marketing['phone']) ? $marketing['phone'] : ''); ?>" />
                <span class="help-inline"><?php echo form_error('phone'); ?></span>
            </div>
        </div>
                    
        <!-- Email -->
        <div class="control-group <?php echo form_error('email') ? 'error' : '' ?>">
            <?php echo form_label('Email'. lang('bf_form_label_required'), 'email', array('class' => "control-label") ); ?>
            <div class="controls">
                <input id="email" type="text" name="email" value="<?php echo set_value('email', isset($marketing['email']) ? $marketing['email'] : ''); ?>" />
                <span class="help-inline"><?php echo form_error('email'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Agent" />
            or <?php echo anchor(SITE_AREA .'/content/marketing', lang('marketing_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Marketing.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('marketing_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('marketing_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
