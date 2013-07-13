
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($member) ) {
    $member = (array)$member;
}
$id = isset($member['id']) ? $member['id'] : '';
?>
<div class="admin-box">
    <h3>Member</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('member_title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'member_title', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_title" type="text" name="member_title" maxlength="255" value="<?php echo set_value('member_title', isset($member['member_title']) ? $member['member_title'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_title'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_first_name') ? 'error' : ''; ?>">
            <?php echo form_label('First Name'. lang('bf_form_label_required'), 'member_first_name', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_first_name" type="text" name="member_first_name" maxlength="255" value="<?php echo set_value('member_first_name', isset($member['member_first_name']) ? $member['member_first_name'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_first_name'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_last_name') ? 'error' : ''; ?>">
            <?php echo form_label('Last Name'. lang('bf_form_label_required'), 'member_last_name', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_last_name" type="text" name="member_last_name" maxlength="255" value="<?php echo set_value('member_last_name', isset($member['member_last_name']) ? $member['member_last_name'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_last_name'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_dob') ? 'error' : ''; ?>">
            <?php echo form_label('Date of Birth'. lang('bf_form_label_required'), 'member_dob', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_dob" type="text" name="member_dob"  value="<?php echo set_value('member_dob', isset($member['member_dob']) ? $member['member_dob'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_dob'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_address') ? 'error' : ''; ?>">
            <?php echo form_label('Address'. lang('bf_form_label_required'), 'member_address', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'member_address', 'id' => 'member_address', 'rows' => '5', 'cols' => '80', 'value' => set_value('member_address', isset($member['member_address']) ? $member['member_address'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('member_address'); ?></span>
        </div>

        </div>
        <div class="control-group <?php echo form_error('member_city') ? 'error' : ''; ?>">
            <?php echo form_label('City'. lang('bf_form_label_required'), 'member_city', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_city" type="text" name="member_city" maxlength="255" value="<?php echo set_value('member_city', isset($member['member_city']) ? $member['member_city'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_city'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_postal_code') ? 'error' : ''; ?>">
            <?php echo form_label('Postal Code'. lang('bf_form_label_required'), 'member_postal_code', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_postal_code" type="text" name="member_postal_code" maxlength="11" value="<?php echo set_value('member_postal_code', isset($member['member_postal_code']) ? $member['member_postal_code'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_postal_code'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_email') ? 'error' : ''; ?>">
            <?php echo form_label('Email'. lang('bf_form_label_required'), 'member_email', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_email" type="text" name="member_email" maxlength="255" value="<?php echo set_value('member_email', isset($member['member_email']) ? $member['member_email'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_email'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_phone') ? 'error' : ''; ?>">
            <?php echo form_label('Phone'. lang('bf_form_label_required'), 'member_phone', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_phone" type="text" name="member_phone" maxlength="20" value="<?php echo set_value('member_phone', isset($member['member_phone']) ? $member['member_phone'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_phone'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_mobile_phone') ? 'error' : ''; ?>">
            <?php echo form_label('Mobile Phone'. lang('bf_form_label_required'), 'member_mobile_phone', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_mobile_phone" type="text" name="member_mobile_phone" maxlength="20" value="<?php echo set_value('member_mobile_phone', isset($member['member_mobile_phone']) ? $member['member_mobile_phone'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_mobile_phone'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('member_password') ? 'error' : ''; ?>">
            <?php echo form_label('Password'. lang('bf_form_label_required'), 'member_password', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="member_password" type="text" name="member_password" maxlength="255" value="<?php echo set_value('member_password', isset($member['member_password']) ? $member['member_password'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('member_password'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Member" />
            or <?php echo anchor(SITE_AREA .'/content/member', lang('member_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Member.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('member_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('member_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
