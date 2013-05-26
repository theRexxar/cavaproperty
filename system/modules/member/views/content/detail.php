<div class="admin-box">
    
    <span class="form-horizontal">
                
        <!-- Title -->
        <div class="control-group">
            <span class="detail-label">Title :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->title) ? ucwords($member_detail->title) : "--"; ?>
            </div>
        </div>
                
        <!-- Name -->
        <div class="control-group">
            <span class="detail-label">Name :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->first_name) && ! empty($member_detail->last_name) ? ucwords($member_detail->first_name.' '.$member_detail->last_name) : "--"; ?>
            </div>
        </div>

        <!-- Date of Birth -->
        <div class="control-group">
            <span class="detail-label">Date of Birth :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->dob) ? date('d F Y',strtotime($member_detail->dob)) : "--"; ?>
            </div>
        </div>
        
        <!-- Address -->
        <div class="control-group">
            <span class="detail-label">Address :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->address) ? $member_detail->address : "--"; ?>
            </div>
        </div>
        
        <!-- City -->
        <div class="control-group">
            <span class="detail-label">City :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->city) ? $member_detail->city : "--"; ?>
            </div>
        </div>
        
        <!-- Postal Code -->
        <div class="control-group">
            <span class="detail-label">Postal Code :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->postal_code) ? $member_detail->postal_code : "--"; ?>
            </div>
        </div>
        
        <!-- Email -->
        <div class="control-group">
            <span class="detail-label">Email :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->email) ? $member_detail->email : "--"; ?>
            </div>
        </div>
        
        <!-- Phone -->
        <div class="control-group">
            <span class="detail-label">Phone :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->phone) ? $member_detail->phone : "--"; ?>
            </div>
        </div>
        
        <!-- Mobile Phone -->
        <div class="control-group">
            <span class="detail-label">Mobile Phone :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->mobile_phone) ? $member_detail->mobile_phone : "--"; ?>
            </div>
        </div>
        
        <!-- Join Date -->
        <div class="control-group">
            <span class="detail-label">Join Date :</span>
            <div class='detail-content'>
                <?php echo ! empty($member_detail->created_on) ? date('d F Y',strtotime($member_detail->created_on)) : "--"; ?>
            </div>
        </div>
        
        <div class="form-actions">
            <br/>
            <?php echo anchor($_SERVER['HTTP_REFERER'], "Back", 'class="btn btn-warning"'); ?>
        </div>
        
    </span>

</div>