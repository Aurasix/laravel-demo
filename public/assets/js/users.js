$(document).ready(function(){
    /*
    Remove Photo
     */
    $('.removePhoto').on('click', function(){
        if (confirm('Are you sure delete this photo')) {
            var data = {
                'id': $(this).data('id'),
                '_token': window.globalCSRF
            }
            $.post(window.globalUrlRemovePhoto, data, function(res){
                if (res.success) {
                    $('#photoContent').remove();
                }
            });
        }
    });
});