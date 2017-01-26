$(document).ready(function(){
    /*
        View Banner
     */
    $('.viewBanner').on('click', function(){
        var banner = $(this).parents().eq($(this).parentsUntil('div.content-banner').length);
        $('#viewBannerTitle').html(banner.data('title'));
        $('#page').val(banner.data('page'));
        $('#viewBannerPage').html($("#page option:selected").text());
        $('#viewBannerImage').html('<img class="img-rounded" src="' + banner.data('path') + '" alt="Imagen de ' + banner.data('image') + '" title="' + banner.data('image') + '" style="display:block; margin: 0 auto; max-width: 100%">');
    });

    /*
        New Banner
     */
    $('.newBanner').on('click', function(){
        $('#formBanner').attr('action', window.globalUrlStore);
        $('#storeBannerTitle').html('Crear Banner');
        $('#title').val('');
        $('#image').val('');
        $('#banner').val('');
        $('#page').val('');
        $('#storeBannerImage').html('');
    });

    /*
        Edit Banner
     */
    $('.editBanner').on('click', function(){
        $('#formBanner').attr('action', window.globalUrlUpdate);
        $('#storeBannerTitle').html('Editar Banner');
        var banner = $(this).parents().eq($(this).parentsUntil('div.content-banner').length);
        $('#title').val($(banner).data('title'));
        $('#banner').val($(banner).data('id'));
        $('#page').val($(banner).data('page'));
        $('#storeBannerImage').html('<img class="img-rounded" src="' + banner.data('path') + '" alt="Imagen de ' + banner.data('image') + '" title="' + banner.data('image') + '" style="display: block; margin: 0 auto; max-width: 100%">');
    });
    $('.publishBanner').on('change', function(){
        var banner = $(this).parents().eq($(this).parentsUntil('div.content-banner').length);
        var id = banner.data('id');
        $.post(window.globalUrlPublish,
            {
                'id': id,
                '_token': window.globalCSRF
            },
            function (res) {
                if (res.success) {
                    //  
                }

            }, 'json');
    });
    $('.content-list').sortable({
        axis: 'y',
        opacity: 0.7,
        placeholder: "ui-state-highlight",
        helper:'clone',
        update: function(event,ui){
            var banners = $(this).sortable('toArray');

            $.post(window.globalUrlSort,
                {
                    'banners': banners,
                    '_token': window.globalCSRF
                },
                function(res){
                    if (res.success) {
                        //alert(res.message);
                        $.notify({
                            type: 'success',
                            icon: 'glyphicon glyphicon-check',
                            message: res.message
                        });
                    }
            });
        }
    });

    /*
        Delete Banner
     */
    $('.deleteBanner').on('click', function(){
        var banner = $(this).parents().eq($(this).parentsUntil('div.content-banner').length);
        $('#deleteBannerTitle').html(banner.data('title'));
        $('#deleteBannerButton').attr('data-id', banner.data('id'));
    });
    $('#deleteBannerButton').on('click', function(){
        var id = $(this).data('id');
        $.post(window.globalUrlDestroy,
            {
                'id': id,
                '_token': window.globalCSRF
            },
            function (res) {
                if (res.success) {
                    top.location.href = window.globalUrlBack;
                }else{
                    //toastr.options = {'positionClass': 'toast-bottom-right'};
                    //toastr.error(res.message);
                    alert(res.message);
                }

            }, 'json');
    });
});
