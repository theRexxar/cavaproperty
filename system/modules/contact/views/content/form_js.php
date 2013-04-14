//<script>
(function($) {		
		
		$("#date").datepicker();
	
		$( ".tabs" ).tabs();
		admin.chosen();
		
		// Generate a slug from the title
		admin.generate_slug('input[name="title"]', 'input[name="slug"]');
		
		// needed so that Keywords can return empty JSON
		$.ajaxSetup({
			allowEmpty: true
		});

		$('#keywords').tagsInput({
			autocomplete_url: BASE_URL + SITE_AREA + '/content/keywords/autocomplete'
		});
		
		$('select[name=type]').live('change', function() {
			textarea = $('textarea[name="body"]');
			
			// Destroy existing WYSIWYG instance
			if (textarea.hasClass('wysiwyg-simple') || textarea.hasClass('wysiwyg-advanced')) 
			{
				textarea.removeClass('wysiwyg-simple');
				textarea.removeClass('wysiwyg-advanced');
					
				var instance = CKEDITOR.instances[textarea.attr('id')];
			    instance && instance.destroy();
			}
			
			if (textarea.hasClass('html') || textarea.hasClass('markdown')) 
			{
				textarea.removeClass('html');
				textarea.removeClass('markdown');
			}
		
			// Set up the new instance
			textarea.addClass(this.value);
			
			my_wysiwyg.init_ckeditor();
		});
		
		$('#remove_image_id').live('click', function(event) {
			event.preventDefault();
        $('input[name="image_id"]').val('');
        $('#span_image_id img').attr('src', BASE_URL+'assets/images/no_image.jpg');
		});
		
		var iframe = $("a.btn-upload-iframe").iframeDialogLink({
			width: 822,
			height: 500,
			modal: 1,
			resizable: 0,
			zIndex: 10000
		});
		
		var img_ids = new Array();
		var inputs = $('#gallery').find('input');
		for (i = 0; i<inputs.length; i++) {
			img_ids.push(inputs[i].value);
		}
			
		
		$('.remove-image').live('click', function(event) {
			event.preventDefault();
			var image_id = $(this).parent('span').find('input').val();
			img_ids.pop(image_id);
            $(this).parent('span').remove();
			if(img_ids.length == 0 && $('#no-image').is(':hidden'))
				$('#no-image').show();
		});
        
        $(".delete-image").click(function(){
            var id_delete = $(this).attr("rel");
            var self = $(this);
            
            //return confirm('are you sure?');
            $.ajax({
              url: URL_IMAGE +"/"+ id_delete,
              type: 'GET',
              dataType: 'json',
              cache : false,
              success: function(data){
                if(data.success == 1){
                    $('input[name="image_id"]').val('');
                    $('#span_image_id img').attr('src', BASE_URL+'assets/images/no_image.jpg');
                    $('#delete-button').hide();
                }
              }
             });
             
             return false;
        });
        
        $(".delete-gallery").click(function(){
            var id_delete = $(this).attr("rel");
            var self = $(this);
            
            //return confirm('are you sure?');
            $.ajax({
              url: URL_GALLERY +"/"+ id_delete,
              type: 'GET',
              dataType: 'json',
              cache : false,
              success: function(data){
                if(data.success == 1){
                    self.parent().remove();
                }
              }
             });
             
             return false;
        });
		
		admin.insertImage_callback = function(image_id, width, target){
			var close = true;
			
			if(target != 'gallery')
			{					
				$('#span_'+target+' input[name="'+target+'"]').val(image_id);
				$('#span_'+target+' img').attr('src', BASE_URL+'files/thumb/'+image_id + '/200/fit');
			}
			else
			{
				if(img_ids.indexOf(image_id) > -1)
				{
					alert('Image already in gallery');
					close = false;
				}
				else
				{
					var img_gallery = '<span class="img-gallery">'+
														'<input type="hidden" name="images[]" value="'+image_id+'" />' +
														'<img width="100" height="100" src="'+BASE_URL+'files/thumb/'+image_id+'/100/100/fit" />&nbsp;'+
														'<a href="#" class="btn btn-danger remove-image">Remove</a>' +
														'</span>';
					$('#'+target).append(img_gallery);
					img_ids.push(image_id);
				}
			}
			
			if(img_ids.length > 0 && $('#no-image').is(':visible'))
				$('#no-image').hide();
			
			
			if(close)
				$('.presentation').dialog('close');
		};
		
	
})(jQuery);