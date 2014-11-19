var time;
$(".nicho").mouseenter(function () {
    $(this).popover('show');

    $(".secMenu").click(function () {
        console.log($(this).text());
        //$('#myModalNewss').modal('show');
        
       switch($(this).text()) {
            case "INGRESAR":
                var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddNicho').modal('show');
                });
                break;
            case "EXHUMAR":
               "asd";
                break;
            case "RENOVAR":
               "asd";
                break;
            case "AÑADIR LAPIDA":
               "asd";
                break;
            case "CREMACION":
               "asd";
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
                var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddNicho').modal('show');
                });
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
        console.log($(this).text());
        //$('#myModalNewss').modal('show');
        
       switch($(this).text()) {
            case "INGRESAR":
                var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddNicho').modal('show');
                });
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
                var urlInfo = base_url + "home/showFormAddNichoBloque/" + $(this).attr('data-id');
                $("#contentDemoadd").load(urlInfo, function () {
                    $('#myModalAddNicho').modal('show');
                });
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

    var urlInfo = base_url + "home/showFormSolicitante/";
        $("#contentDemoSol").load(urlInfo, function () {
            $('#myModalAddSolicitante').modal('show');
        });
});

