$(function(){
    "use strict"

    $('.select2').select2();

    $(".search-select").select2({
        allowClear: true
    });

    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>&nbsp;Loading...");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#dataTbl').dataTable({
        responsive: true
    });

    $(".fsub").change(function(){
        $(this).closest("form").submit();
    })
});