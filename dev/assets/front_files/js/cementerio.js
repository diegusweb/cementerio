var time;
$(".nicho").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
        //console.log($(this).attr('data-id'));
        //$('#myModalNewss').modal('show');

        var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id');
        $("#contentDemoadd").load(urlInfo, function () {
            $('#myModalAddNicho').modal('show');
        });
    });

});

$(document).on('mouseleave', '#insideDiv', function () {
    $(".nicho").popover('hide');
});
$(document).on('mouseout', '.nicho', function () {
    time = setTimeout(function () {
        $('.nicho').popover('hide')
    }, 1000);
});
$(document).on('mouseenter', '#insideDiv', function () {
    clearTimeout(time);
});

$('.formSolicitante').click(function(){

    var urlInfo = base_url + "home/showFormSolicitante/";
        $("#contentDemoSol").load(urlInfo, function () {
            $('#myModalAddSolicitante').modal('show');
        });
});

