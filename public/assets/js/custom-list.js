$(document).ready(function() {
    $('#tableList').dataTable( {
        //responsive: true,
        "order" :[[0, 'desc']],
        /*"language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }*/
    } );

    $('#tableList tbody').on('click', 'button.delete', function (e) {
        e.preventDefault();

        //init data
        var tr = $(this).parent().parent();
        var slug = $(this).data('slug');
        var title = $('#tableList').data('title');
        var name = $(this).data('name');

        //set data
        $('#elementTitle').text(title);
        $('#elementName').text(name);
        $('#elementDelete').data('slug', slug);
    });

    $('#elementDelete').on('click', function (e) {
        e.preventDefault();

        var slug = $(this).data('slug');
        $.post(window.globalUrlDelete,
            {
                slug: slug,
                _token: window.globalCSRF
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
        return false;
    });

});
