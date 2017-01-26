$(document).on("click", ".button-new", function () {
    $('#form-edit #typeSection').val('');
    $('#form-edit #title').val('');
    $('#form-edit #content').val('');
});

$(document).on("click", ".button-edit", function () {

    var itemId = $(this).data('id');
    var itemTypeSection = $(this).data('type');
    var itemTitle = $(this).data('title');
    var itemContent = $(this).data('content');


    $('.modal-body #form-edit').attr('action', '/sections/' + itemId);
    $('#form-edit #typeSection').val(itemTypeSection);
    $('#form-edit #title').val(itemTitle);
    $('#form-edit #content').val(itemContent);
    $('.note-editing-area textarea.note-codable').val(itemContent);
    $('.note-editing-area .panel-body p').html(itemContent);
});

$(document).on("click", ".button-show", function () {

    var itemId = $(this).data('id');
    var itemTitle = $(this).data('title');
    var itemTypeSection = $(this).data('type');
    var itemContent = $(this).data('content');

    $('p#title').html(itemTitle);
    $('p#typeSection').html(itemTypeSection);
    $('p#content').html(itemContent);

});
