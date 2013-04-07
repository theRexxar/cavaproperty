<?php Template::block('nav', 'content/nav'); ?>
<div class="admin-box">	
	<h3><?php echo lang('files.upload_title'); ?></h3>
	<?php echo form_open_multipart(SITE_AREA.'/content/files/upload/'.$folder->id.'/ajax', array('id'=>'fileupload','class' => 'form-inline')); ?>
		<table id="" class="table table-striped">
		<thead>
			<tr>
				<th colspan="6">				
	
					<div class="row fileupload-buttonbar">
					
							<div class="buttons-group">
									<span class="btn btn-success fileinput-button">
											<i class="icon-plus icon-white"></i>
											<span>Add files...</span>
											<input type="file" name="userfile" multiple="multiple">
									</span>
									<button type="submit" class="btn btn-primary start">
											<i class="icon-upload icon-white"></i>
											<span>Start upload</span>
									</button>
									<button type="reset" class="btn btn-info cancel">
											<i class="icon-ban-circle icon-white"></i>
											<span>Cancel upload</span>
									</button>
									<a href="<?php echo site_url(SITE_AREA.'/content/files/folder/'.$folder->id ); ?>" class="btn btn-warning">
											<i class="icon-arrow-left icon-white"></i>
											<span>Back</span>
									</a>
							</div>
							
					</div>
				
				</th>
			</tr>
			<tr>
				<th width="10%">Preview</th>
				<th width="30%">Name</th>
				<th width="5%">Size</th>
				<th width="20%">Progress</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
		<tfoot>
			<tr>
				<td colspan="6">&nbsp;</td>
			</tr>
		</tfoot>
		</table>
	<?php echo form_close(); ?>
</div>
		
		
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td width="10%" class="preview"><span class="fade"></span></td>
        <td width="30%" class="name">
					<span>{%=file.name%}</span>
					<input type="hidden" name="name" value="{%=file.name%}">
					<input type="hidden" name="folder_id" value="<?php echo $folder->id; ?>">
				</td>
        <td width="5%" class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td width="20%" class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td width="20%">
                <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error || file.status == 'error') { %}
            <td class="error" colspan="6">
							<span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.message%}
						</td>
        {% } else { %}
						<td class="success" colspan="6">
							<span class="label label-success">{%=locale.fileupload.success%}</span> {%=file.message%}
						</td>
        {% } %}
    </tr>
{% } %}
</script>