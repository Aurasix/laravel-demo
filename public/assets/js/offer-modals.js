$(document).ready(function(){
    // Touchspin de inputs
    $("input[name='price']").TouchSpin({
        min: 0,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: 'S/.',
        max: 9999999999,
    });
    $("input[name='originalPrice']").TouchSpin({
        min: 0,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: 'S/.',
        max: 9999999999,
    });
    $("input[name='stock']").TouchSpin({
        min: 0,
        max: 99999999999,
    });
    $("input[name='discountAmount']").TouchSpin({
        min: 0,
        postfix: '%'
    });
    $("input[name='discountPercentage']").TouchSpin({
        min: 0,
        postfix: '%'
    });

    // Eventos del controlador
    /*
     View Offer
     */
    $('.viewOffer').on('click', function(){
        var offer = $(this).parent().parent();
        $('#viewOfferTitle').html(offer.data('title'));
        $('#viewOfferDescription').html(offer.data('description'));
        $('#viewOfferStock').html(offer.data('stock'));
        $('#viewOfferPrice').html(offer.data('price'));
        $('#viewOfferOriginalPrice').html('');
        if (offer.data('originalprice')) {
            $('#viewOfferOriginalPrice').html(offer.data('originalprice'));
        }
        $('#viewOfferDiscountAmount').html(offer.data('discountamount'));
        $('#viewOfferDiscountPercentage').html(offer.data('discountpercentage'));
        $('#viewOfferPosition').html(offer.data('position'));
        if($(offer).data('published') > 0){
            $('#viewOfferPublished').html('<i class="glyphicon glyphicon-ok-circle text-success text-lg"></i>');
        } else {
            $('#viewOfferPublished').html('<i class="glyphicon glyphicon-ban-circle text-danger text-lg"></i>');
        }

    });

    /*
     New Offer
     */
    $('.newOffer').on('click', function(){
        $('#formOffer').attr('action', window.globalUrlStore);
        $('#storeOfferTitle').html('Crear Oferta');
        $('#title').val('');
        $('#description').val('');
        $('#stock').val('');
        $('#price').val('');
        $('#originalPrice').val('');
        $('#discountAmount').val('');
        $('#discountPercentage').val('');
        $('#position').val('');
        $('#published').prop('checked', false);
    });

    /*
     Edit Offer
     */
    $('.editOffer').on('click', function(){
        $('#formOffer').attr('action', window.globalUrlUpdate);
        $('#storeOfferTitle').html('Editar Oferta');
        var offer = $(this).parent().parent();
        console.log($(offer).data());
        $('#offer').val($(offer).data('id'));
        $('#title').val($(offer).data('title'));
        $('#description').val($(offer).data('description'));
        $('#stock').val($(offer).data('stock'));
        $('#price').val($(offer).data('price'));
        $('#originalPrice').val('');
        if ($(offer).data('originalprice')) {
            $('#originalPrice').val($(offer).data('originalprice'));
        }
        $('#discountAmount').val($(offer).data('discountamount'));
        $('#discountPercentage').val($(offer).data('discountpercentage'));
        $('#position').val($(offer).data('position'));
        if($(offer).data('published') > 0){
            $('#published').prop('checked', true);
        } else {
            $('#published').prop('checked', false);
        }
    });
    $('.publishOffer').on('change', function(){
        var offer = $(this).parents().eq($(this).parentsUntil('div.content-offer').length);
        var id = offer.data('id');
        $.post(window.globalUrlPublish,
            {
                'id': id,
                '_token': window.globalCSRF
            },
            function (res) {
                if (res.success) {
                    //toastr.options = {'positionClass': 'toast-bottom-right'};
                    //toastr.error(res.message);
                }

            }, 'json');
    });

    /*
     Delete Offer
     */
    $('.deleteOffer').on('click', function(){
        var offer = $(this).parent().parent();
        $('#deleteOfferTitle').html(offer.data('title'));
        $('#deleteOfferButton').attr('data-id', offer.data('id'));
    });
    $('#deleteOfferButton').on('click', function(){
        var id = $(this).data('id');
        $.post(window.globalUrlDestroy,
            {
                'id': id,
                '_token': window.globalCSRF
            },
            function (res) {
                if (res.success) {
                    top.location.href = window.globalUrlShow;
                }else{
                    //toastr.options = {'positionClass': 'toast-bottom-right'};
                    //toastr.error(res.message);
                    alert(res.message);
                }

            }, 'json');
    });

    $('#flap-1').click(function() {
        $(this).addClass('active');
        $('#flap-2').removeClass('active');
    });

    $('#flap-2').click(function() {
        $(this).addClass('active');
        $('#flap-1').removeClass('active');
    });
});