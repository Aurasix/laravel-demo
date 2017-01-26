$(document).ready(function(){
    $('.removeImage').on('click', function(){
        if (confirm('Está seguro de eliminar la imagen: ' + $(this).data('name') + '?')) {
            var content = $(this).parent().parent();
            var data = {
                'id': $(this).data('id'),
                '_token': window.globalCSRF
            }
            $.post(window.globalUrlRemoveImage, data, function(res){
                if (res.success) {
                    $('#countImages').html($('#countImages').text() - 1);
                    content.remove();
                }
            });
        }
    });
});
