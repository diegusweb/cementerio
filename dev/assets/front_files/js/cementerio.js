   var time;
   $(".nicho").mouseenter(function(){
       $(this).popover('show');
       
       $(".secMenu").click(function(){
           console.log($(this).attr('data-id'));
           $('#myModalNewss').modal('show');
       });
       
    });

$(document).on('mouseleave', '#insideDiv', function(){
       $(".nicho").popover('hide');
});
$(document).on('mouseout', '.nicho', function(){
    time=  setTimeout(function(){ $('.nicho').popover('hide')}, 1000);
});
$(document).on('mouseenter', '#insideDiv', function(){
       clearTimeout(time);
});

