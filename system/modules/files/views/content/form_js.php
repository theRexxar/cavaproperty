//<script>
$('#file-input').change(function (e) {
    window.loadImage(
        e.target.files[0],
        function (img) {
            $('#img-preview').html(img);
						$('input[name="name"]').val(e.target.files[0].name);
        },
        {maxWidth: 80, maxHeight: 80}
    );
});
