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
    .secMenu{
        cursor: pointer;
    }
</style>

<script>
    $(document).ready(function () {
        /* var x = $("#wrapper2").offset().left;
         var y = $("#wrapper2").offset().top;
         
         console.log('x: ' + x + ' y: ' + y);*/


        /*$('#example1').click(function(e){
         var x = e.pageX - this.offsetLeft;
         var y = e.pageY - this.offsetTop;
         $('#wrapper2').html("X: " + x + " Y: " + y); 
         //company-48
         });*/

        $("#example1").click(function (e) {
            var pos = $(this).offset();
            var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;

            $("#wrapper2").text("X: " + x + " Y: " + y);
        });

        $(".nicho").click(function (e) {
            var pos = $(this).offset();
            var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;

            alert($(this).attr('id'));
        });

        //$('#colu').html('<div class="nicho"></div>').offset({ top: 351  , left: 50})

        $(".nicho").tooltip();
    });
</script>
<div id="myModalNewss" class="modal hide fade" style="width: 500px; height: 300px;" title="Empty the recycle bin?">
    sadasdasdsa
</div>
<div id="example1" class="contenidoMapa">

    <?php
    foreach ($bloque_nicho as $valor) {
        $d = explode(",", $valor['position']);
        ?>
        <div id="<?php echo $valor['nombre']; ?>"  data-container="body" data-html="true" data-toggle="popover" data-placement="right" 
             data-content='<div id="insideDiv"><div><?php echo $valor['nombre'] ?></div><br><div class="secMenu" data-id="<?php echo $valor['id_bloque_nicho']?>">INGRESAR</div><div class="secMenu" data-id="<?php echo $valor['id_bloque_nicho']?>">EXUMAR</div>
             <div class="secMenu" data-id="<?php echo $valor['id_bloque_nicho']?>">RENOVAR</div>
             <div class="secMenu" data-id="<?php echo $valor['id_bloque_nicho']?>">AÑADIR LAPIDA</div>
             <div class="secMenu" data-id="<?php echo $valor['id_bloque_nicho']?>">CREMACION</div></div>' style="top:<?php echo $d[1]; ?>px; left: <?php echo $d[0]; ?>px; position: absolute;" class="nicho"></div>
        <?php
    }
    ?>
    <!-- <div id="colu" style="top:51px; left: 50px; position: absolute;" class="nicho">Columna 1</div>
     
     <div id="colu1" style="top:0px; left: 0px; position: absolute;" class="nicho">Columna 2</div>
     
     <div id="colu3" style="top:100px; left: 100px; position: absolute;" class="mausoleo">Columna 2</div>
     
     <div id="colu4" style="top:400px; left: 400px; position: absolute;" class="bajoTierra"></div>-->

</div>