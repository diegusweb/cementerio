var time;
$(".nicho").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
        $('.loading').show();
       switch($(this).text()) {
            case "INGRESAR":
                var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Registro Nicho');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
               var urlInfo = base_url + "home/showFormAddExhumarBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Registro Exhumar Nicho');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "RENOVAR":
                var urlInfo = base_url + "home/showFormRenovacionNicho/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Registro Renovacion Nichos');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "AÑADIR LAPIDA":
               var urlInfo = base_url + "home/showFormAddLapidaBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Renovacion de Nichos');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "CREMACION":
               var urlInfo = base_url + "home/showFormCremaciones/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Cremaciones');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;    
        }
        
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

//mausoleo
$(".mausoleo").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
        console.log($(this).text());
        //$('#myModalNewss').modal('show');
        
       switch($(this).text()) {
            case "INGRESAR":
                 var urlInfo = base_url + "home/showFormAddDMausoleo/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Ingresar a Mausoleo');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
                var urlInfo = base_url + "home/showFormExhumarMausoleo/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Exumar Mausoleo');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "AÑADIR LAPIDA":
               var urlInfo = base_url + "home/showFormLapidaMausoleo/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Añadir Lapida Mausoleo');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
   
        }
        
    });

});

$(document).on('mouseleave', '#insideDiv', function () {
    $(".mausoleo").popover('hide');
});
$(document).on('mouseout', '.mausoleo', function () {
    time = setTimeout(function () {
        $('.mausoleo').popover('hide')
    }, 1000);
});
//-------

//cremados
$(".cremados").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
   
       switch($(this).text()) {
            case "INGRESAR":
                 var urlInfo = base_url + "home/showFormCremaciones/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Ingresar Cremados');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
                var urlInfo = base_url + "home/showFormExhumarCremaciones/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Exumacion Cremados');
                    $('#myModalAddForm').modal('show');
                    $('.loading').hide();
                });
                break;
			case "RENOVAR":
               "asd";
                break;
   
        }
        
    });

});

$(document).on('mouseleave', '#insideDiv', function () {
    $(".cremados").popover('hide');
});
$(document).on('mouseout', '.cremados', function () {
    time = setTimeout(function () {
        $('.cremados').popover('hide')
    }, 1000);
});
//-------


//cremados
$(".bajoTierra").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
        console.log($(this).text());
        //$('#myModalNewss').modal('show');
        
       switch($(this).text()) {
            case "INGRESAR":
               "ADSA"
                break;
            case "EXHUMAR":
               "asd";
                break;
            case "AÑADIR LAPIDA":
               "asd";
                break;
   
        }
        
    });

});

$(document).on('mouseleave', '#insideDiv', function () {
    $(".bajoTierra").popover('hide');
});
$(document).on('mouseout', '.bajoTierra', function () {
    time = setTimeout(function () {
        $('.bajoTierra').popover('hide')
    }, 1000);
});
//-------

$(document).on('mouseenter', '#insideDiv', function () {
    clearTimeout(time);
});

$('.formSolicitante').click(function(){
 //$('#myModalAddForm').modal('hide');
    var urlInfo = base_url + "home/showFormDifunto/";
        $("#contentDemoSol").load(urlInfo, function () {
           
            $('#myModalAddSolicitante').modal('show');
        });
});

