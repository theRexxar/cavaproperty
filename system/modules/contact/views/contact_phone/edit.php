<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($contact) ) {
    $contact = (array)$contact;
}
$id = isset($contact['id']) ? $contact['id'] : '';
?>
<div class="admin-box">
    <h3>Edit Phone Form</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Name -->
        <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
            <?php echo form_label('Name'. lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name', isset($contact['name']) ? $contact['name'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('name'); ?></span>
            </div>
        </div>

        <!-- Phone -->
        <div class="control-group <?php echo form_error('phone') ? 'error' : ''; ?>">
            <?php echo form_label('Phone'. lang('bf_form_label_required'), 'phone', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="phone" type="text" name="phone" maxlength="255" value="<?php echo set_value('phone', isset($contact['phone']) ? $contact['phone'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('phone'); ?></span>
            </div>
        </div>

        <!-- Other Phone -->
        <div class="control-group <?php echo form_error('other_phone') ? 'error' : ''; ?>">
            <?php echo form_label('Other Phone'. lang('bf_form_label_required'), 'other_phone', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="other_phone" type="text" name="other_phone" maxlength="255" value="<?php echo set_value('other_phone', isset($contact['other_phone']) ? $contact['other_phone'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('other_phone'); ?></span>
            </div>
        </div>

        <!-- Subject -->
        <div class="control-group <?php echo form_error('subject') ? 'error' : ''; ?>">
            <?php echo form_label('Subject', 'subject', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="subject" type="text" name="subject" maxlength="255" value="<?php echo set_value('subject', isset($contact['subject']) ? $contact['subject'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('subject'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Phone Form" />
            or <?php echo anchor(SITE_AREA .'/content/contact/contact_phone', lang('contact_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Contact.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('contact_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('contact_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
