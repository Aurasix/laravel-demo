/**
 * Creado por Cesar Mamani Dominguez on 18/07/2016.
 * Esta funcion validará los datepickers para trabajar con un rango de fechas.
 *
 */

$(document).ready(function () {

    $('#startDate').datetimepicker({
        widgetPositioning: {
            horizontal: 'right'
        },
        format: 'YYYY-MM-DD',
        debug: false,
        useCurrent: false
    });

    $('#endDate').datetimepicker({
        widgetPositioning: {
            horizontal: 'right'
        },
        format: 'YYYY-MM-DD',
        debug: false,
        useCurrent: false
    });

    $("#startDate").on("dp.change", function (e) {
        $('#endDate').data("DateTimePicker").minDate(e.date);
    });
    $("#endDate").on("dp.change", function (e) {
        $('#startDate').data("DateTimePicker").maxDate(e.date);
    });
});