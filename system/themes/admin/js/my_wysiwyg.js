var instance;	

function update_instance()
{
	instance = CKEDITOR.currentInstance;
}

var my_wysiwyg = {};

$(document).ready(function(){		
	$(function(){
		my_wysiwyg.init_ckeditor = function(){
			$('textarea.wysiwyg-simple').ckeditor({
				toolbar: [
					['adminimages'],
					['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['ShowBlocks', 'RemoveFormat', 'Source']
					],
				extraPlugins: 'adminimages',
				width: '98%',
				height: 150,
				dialog_backgroundCoverColor: '#000'
			});

			$('textarea.wysiwyg-advanced').ckeditor({
				toolbar: [
					['Maximize'],
					['adminimages', 'adminfiles'],
					['Cut','Copy','Paste','PasteFromWord'],
					['Undo','Redo','-','Find','Replace'],
					['Link','Unlink'],
					['Table','HorizontalRule','SpecialChar'],
					['Bold','Italic','StrikeThrough'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'],
					['Format', 'FontSize', 'Subscript','Superscript', 'NumberedList','BulletedList','Outdent','Indent','Blockquote'],
					['ShowBlocks', 'RemoveFormat', 'Source']
				],
				extraPlugins: 'adminimages,adminfiles',
				extraPlugins: 'adminimages,adminfiles',
				width: '98%',
				height: 250,
				dialog_backgroundCoverColor: '#000',
				removePlugins: 'elementspath'
			});
		};
		my_wysiwyg.init_ckeditor();

	});
});