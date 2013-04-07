$(document).ready(function ()
   {
      $(".popup-gallery").click(function (e)
      {
        var self_id = $(this).attr("id");
         ShowDialog(false, self_id);
         e.preventDefault();
      });

      $(".closed").click(function (e)
      {
        var self = $(this);
         HideDialog(self);
         e.preventDefault();
      });
	
   });

function ShowDialog(modal, param)
{
    $("#overlay").show();
    $("#" + param).fadeIn(300);
    //$("table").find("#" + param).fadeIn(300);
    
    if (modal)
    {
     $("#overlay").unbind("click");
    }
    else
    {
     $("#overlay").click(function (e)
     {
    	HideDialog();
     });
    }
}

function HideDialog(param)
{
  $("#overlay").hide();
  $(".gallery-popup").fadeOut(300);
} 

(function($) {
  $(function(){
    
    // generate a slug when the user types a title in
    admin.generate_slug('input[name="title"]', 'input[name="slug"]');
    
    // needed so that Keywords can return empty JSON
    $.ajaxSetup({
      allowEmpty: true
    });

    $('#keywords').tagsInput({
      autocomplete_url:SITE_AREA+'/content/keywords/autocomplete'
    });
    
    // editor switcher
    $('select[name^=type]').live('change', function() {
      chunk = $(this).closest('li.editor');
      textarea = $('textarea', chunk);
      
      // Destroy existing WYSIWYG instance
      if (textarea.hasClass('wysiwyg-simple') || textarea.hasClass('wysiwyg-advanced')) 
      {
        textarea.removeClass('wysiwyg-simple');
        textarea.removeClass('wysiwyg-advanced');
          
        var instance = CKEDITOR.instances[textarea.attr('id')];
          instance && instance.destroy();
      }
      
      
      // Set up the new instance
      textarea.addClass(this.value);
      
      my_wysiwyg.init_ckeditor();
      
    });
    
    
  });
})(jQuery);
