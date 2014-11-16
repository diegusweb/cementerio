<style>
    .contenidoMapa{
        width: 1030px;
        height: 700px;
        background-color: #E0DFE3;
        position: absolute;
        display: block;
    }

#fila1, #fila2,#fila3,#fila4,#fila5,#fila6,#fila7,#fila8,#fila9,#fila10 {
    display: table-row;
}
#columna1, #columna2, #columna3 , #columna4, #columna5, #columna6 , #columna7 , #columna8, #columna9, #columna10 {
    display: table-cell;
    border: 1px solid #000;
    vertical-align: middle;
    padding: 10px;
}
</style>

<script>
    $(document).ready(function() {
       /* var x = $("#wrapper2").offset().left;
        var y = $("#wrapper2").offset().top;

        console.log('x: ' + x + ' y: ' + y);*/
        
        
         /*$('#example1').click(function(e){
            var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;
            $('#wrapper2').html("X: " + x + " Y: " + y); 
            //company-48
        });*/
        
        $("#example1").click(function(e) {
        var pos = $(this).offset();
        var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;
            
        $("#wrapper2").text("X: " + x + " Y: " + y);
      });
      
      $(".nicho").click(function(e) {
        var pos = $(this).offset();
        var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;
            
       alert($(this).attr('id'));
      });
      
      //$('#colu').html('<div class="nicho"></div>').offset({ top: 351  , left: 50})
      
      
});
</script>
<p id="wrapper2">sss</p>
<div id="example1" class="contenidoMapa">
    
    <div id="colu" style="top:51px; left: 50px; position: absolute;" class="nicho">Columna 1</div>
    
    <div id="colu1" style="top:0px; left: 0px; position: absolute;" class="nicho">Columna 2</div>
    
    <div id="colu3" style="top:100px; left: 100px; position: absolute;" class="mausoleo">Columna 2</div>
    
    <div id="colu4" style="top:400px; left: 400px; position: absolute;" class="bajoTierra"></div>
    
</div>