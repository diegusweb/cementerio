<style>
    .contenidoMapa{
        width: 1020px;
        height: 623px;
        background-color: #E0DFE3;
        position: absolute;
        display: block;
        background-image: url("<?php echo RESOURCES_PATH; ?>/img/PLANTA.jpg");
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
    .titleBorder{
        border-bottom:solid 1px #222;
    }

    #insideDiv ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        width: 170px;
    }

    #insideDiv li {
        float: left;
    }

    #insideDiv a:link, a:visited {
        display: block;
        width: 150px;
        color: #333;
        background-color: #ffffff;
        padding: 4px;
        text-decoration: none;
        text-transform: uppercase;
    }

    #insideDiv a:hover, a:active {
        background-color: #cccccc;
    }
</style>

<script>
    var showFormNicho;

    $(document).ready(function () {

        $("#example1").click(function (e) {
            var pos = $(this).offset();
            var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;

            $("#wrapper2").text("X: " + x + " Y: " + y);
        });

        $(".nicho").tooltip();

    });
</script>
<div id="myModalAddForm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Nueva Nicho</h3>
    </div>
    <div class="modal-body">
        <p id="contentDemoadd">One fine body…</p>
    </div>
</div>

<div id="myModalComprobante" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Mostrar Comprobante</h3>
    </div>
    <div class="modal-body">
        <p id="contentIdComprobante"></p>
    </div>
</div>


<div id="example1" class="contenidoMapa">

    <?php
    foreach ($bloque_nicho as $valor) {
        $d = explode(",", $valor['position']);
        ?>
        <div id="<?php echo $valor['nombre']; ?>"  data-container="body" data-html="true" data-toggle="popover" data-placement="right" 
             data-content='<div id="insideDiv"><div class="titleBorder"><b><?php echo $valor['nombre'] ?> - NICHOS</b></div><br>		 
             <ul>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "1";?>" data-id="<?php echo $valor['id_bloque_nicho'] ?>">INGRESAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valor['id_bloque_nicho'] ?>">EXHUMAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valor['id_bloque_nicho'] ?>">RENOVAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valor['id_bloque_nicho'] ?>">AÑADIR LAPIDA</a></li>
             <!--<li><a href="javascript:void(0);" class="secMenu" data-id="<?php echo $valor['id_bloque_nicho'] ?>">CREMACION</a></li>-->
             </ul>
             </div>' style="top:<?php echo $d[1]; ?>px; left: <?php echo $d[0]; ?>px; position: absolute;" class="nicho"></div>
             <?php
         }

         foreach ($bloque_mausoleo as $valorm) {
             $d = explode(",", $valorm['position']);
             ?>
        <div id="<?php echo $valorm['nombre']; ?>"  data-container="body" data-html="true" data-toggle="popover" data-placement="right" 
             data-content='<div id="insideDiv"><div class="titleBorder"><b><?php echo $valorm['nombre'] ?> - MAUSOLEO</b></div><br>
             <ul>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "1";?>" data-id="<?php echo $valorm['id_bloque_mausoleo'] ?>">INGRESAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorm['id_bloque_mausoleo'] ?>">EXHUMAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorm['id_bloque_mausoleo'] ?>">AÑADIR LAPIDA</a></li>

             </ul>

             </div>' style="top:<?php echo $d[1]; ?>px; left: <?php echo $d[0]; ?>px; position: absolute;" class="mausoleo"></div>
             <?php
         }

         foreach ($bloque_cremado as $valorc) {
             $d = explode(",", $valorc['position']);
             ?>
        <div id="<?php echo $valorc['nombre']; ?>"  data-container="body" data-html="true" data-toggle="popover" data-placement="right" 
             data-content='<div id="insideDiv"><div class="titleBorder"><b><?php echo $valorc['nombre'] ?> - CREMADOS</b></div><br>
             <ul>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "1";?>" data-id="<?php echo $valorc['id_bloque_cremado'] ?>">INGRESAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorc['id_bloque_cremado'] ?>">EXHUMAR</a></li>
			 <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorc['id_bloque_cremado'] ?>">RENOVAR</a></li>
             </ul>
             </div>' style="top:<?php echo $d[1]; ?>px; left: <?php echo $d[0]; ?>px; position: absolute;" class="cremados"></div>
             <?php
         }

         foreach ($bloque_bajo_tierra as $valorc) {
             $d = explode(",", $valorc['position']);
             ?>
        <div id="<?php echo $valorc['nombre']; ?>"  data-container="body" data-html="true" data-toggle="popover" data-placement="right" 
             data-content='<div id="insideDiv"><div class="titleBorder"><b><?php echo $valorc['nombre'] ?> - BAJO TIERRA</b></div><br>
             <ul>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "1";?>" data-id="<?php echo $valorc['id_bloque_bajo_tierra'] ?>">INGRESAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorc['id_bloque_bajo_tierra'] ?>">EXHUMAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorc['id_bloque_bajo_tierra'] ?>">RENOVAR</a></li>
             <li><a href="javascript:void(0);" class="secMenu" data-form="<?php echo "2";?>" data-id="<?php echo $valorc['id_bloque_bajo_tierra'] ?>">AUTORIZACION CONST.CRIPTA</a></li>
             </ul>

             </div>' style="top:<?php echo $d[1]; ?>px; left: <?php echo $d[0]; ?>px; position: absolute;" class="bajoTierra"></div>
        <?php
    }
    ?>

</div>