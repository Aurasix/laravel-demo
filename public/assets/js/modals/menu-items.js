$(document).on("click", ".button-new", function () {
    $('#form-edit #title').val('');
    $('#form-edit #content').val('');
});

$(document).on("click", ".button-edit", function () {

    var itemId = $(this).data('id');
    var itemTitle = $(this).data('title');
    var itemContent = $(this).data('content');

    $('.modal-body #form-edit').attr('action', '/menu-items/' + itemId);
    $('#form-edit #title').val(itemTitle);
    $('#form-edit #content').val(itemContent);
    $('.note-editing-area textarea.note-codable').val(itemContent);
    $('.note-editing-area .panel-body p').html(itemContent);
});

$(document).on("click", ".button-show", function () {

    $('p').html('');

    var itemId = $(this).data('id');
    var itemTitle = $(this).data('title');
    var itemContent = $(this).data('content');

    $('p#title').html(itemTitle);
    $('p#content').html(itemContent);

});
