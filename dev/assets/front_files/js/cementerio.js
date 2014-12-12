var time;
var urlControllers = ["showFormAddNichoBloque", "showFormAddExhumarBloque", 
"showFormRenovacionNicho","showFormAddLapidaBloque","showFormAddDMausoleo","showFormExhumarMausoleo","showFormLapidaMausoleo",
"showFormCremaciones","showFormExhumarCremaciones","showFormRenovarCremaciones","showFormSitioTierra","showFormExhumarSitioTierra",
"showFormRenovarSitioTierra","showFormCriptaSitioTierra"];

$(".nicho").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
        $('.loading').show();
       switch($(this).text()) {
            case "INGRESAR":
                var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Registro Nicho');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
               var urlInfo = base_url + "home/showFormAddExhumarBloque/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Registro Exhumar Nicho');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "RENOVAR":
                var urlInfo = base_url + "home/showFormRenovacionNicho/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Registro Renovacion Nichos');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "AÑADIR LAPIDA":
               var urlInfo = base_url + "home/showFormAddLapidaBloque/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Renovacion de Nichos');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "CREMACION":
               var urlInfo = base_url + "home/showFormCremaciones/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Cremaciones');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
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
        $('.loading').show();
        
       switch($(this).text()) {
            case "INGRESAR":
                 var urlInfo = base_url + "home/showFormAddDMausoleo/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Ingresar a Mausoleo');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
                var urlInfo = base_url + "home/showFormExhumarMausoleo/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Exumar Mausoleo');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "AÑADIR LAPIDA":
               var urlInfo = base_url + "home/showFormLapidaMausoleo/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Añadir Lapida Mausoleo');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
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
        $('.loading').show();
   
       switch($(this).text()) {
            case "INGRESAR":
                 var urlInfo = base_url + "home/showFormCremaciones/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Ingresar Cremados');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
                var urlInfo = base_url + "home/showFormExhumarCremaciones/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Exumacion Cremados');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
			case "RENOVAR":
                var urlInfo = base_url + "home/showFormRenovarCremaciones/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Renovar Cremados');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
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
       $('.loading').show();
        
       switch($(this).text()) {
            case "INGRESAR":
                var urlInfo = base_url + "home/showFormSitioTierra/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Ingresar Sitio Tierra');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
            case "EXHUMAR":
               var urlInfo = base_url + "home/showFormExhumarSitioTierra/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Ingresar Sitio Tierra');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;
			case "RENOVAR":
               var urlInfo = base_url + "home/showFormRenovarSitioTierra/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Renovar Sitio Tierra');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
                break;	
            case "AUTORIZACION CONST.CRIPTA":
               var urlInfo = base_url + "home/showFormCriptaSitioTierra/" + $(this).attr('data-id')+"/"+$(this).attr('data-form');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddForm #myModalLabel').text('Construccion Cripta Sitio Tierra');
                    $('#myModalAddForm').modal({ show: true, keyboard: false, backdrop: 'static' });
                    $('.loading').hide();
                });
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
           
            $('#myModalAddSolicitante').modal({ show: true, keyboard: false, backdrop: 'static' });
        });
});

function showSolicitante(id){
 //$('#myModalAddForm').modal('hide');
 console.log(id);
    var urlInfo = base_url + "reportes/showSolicitante/"+id;
        $("#contentDemoR").load(urlInfo, function () {
            $('#myModalReport #myModalLabel').text('Informacion Solicitante');
            $('#myModalReport').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
        });
};

function showDifunto(id){
 //$('#myModalAddForm').modal('hide');
    var urlInfo = base_url + "reportes/showDifunto/"+id;
        $("#contentDemoR").load(urlInfo, function () {
            $('#myModalReport #myModalLabel').text('Informacion Difunto');
            $('#myModalReport').modal({ show: true, keyboard: false, backdrop: 'static' });
        });
};
