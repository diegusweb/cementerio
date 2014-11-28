<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

        <style type='text/css'>
            body
            {
                font-family: Arial;
                font-size: 14px;
            }
            a {
                color: blue;
                text-decoration: none;
                font-size: 14px;
            }
            a:hover
            {
                text-decoration: underline;
            }

            .modal.fade.in {
                left: 35% !important;
                top: 3%;
            }


        </style>
        <script type="text/javascript">
            var demo;

            $("document").ready(function () {

                $('.infoSucursalDiv').click(function () {
                    $('#myModalNews').modal('show');
                });

                $('.nicho').draggable({
                    containment: '#myModalNews',
                    zIndex: 200,
                    start: function (event, ui) {
                        xpos = ui.position.left;
                        ypos = ui.position.top;

                        //console.log(xpos+" - "+ypos)
                    },
                    // when dragging stops
                    stop: function (event, ui) {
                        // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
                        var xmove = ui.position.left;
                        var ymove = ui.position.top;

                        var pos = Math.round(xmove) + "," + Math.round(ymove);
                        $('.positionSet').attr('value', pos);

                        $('#myModalNews').modal('hide');

                    }}).css("position", "absolute");

                //mausoleo
                $('.infoMausoleoDiv').click(function () {
                    $('#myModalMausoleo').modal('show');
                });

                $('.mausoleo').draggable({
                    containment: '#myModalMausoleo',
                    zIndex: 200,
                    start: function (event, ui) {
                        xpos = ui.position.left;
                        ypos = ui.position.top;
                    },
                    // when dragging stops
                    stop: function (event, ui) {
 
                        var xmove = ui.position.left;
                        var ymove = ui.position.top;

                        var pos = Math.round(xmove) + "," + Math.round(ymove);
                        $('.positionSet').attr('value', pos);

                        $('#myModalMausoleo').modal('hide');

                    }}).css("position", "absolute");
                
                
                //cremados
                $('.infoCremadoDiv').click(function () {
                    $('#myModalCremados').modal('show');
                });

                $('.cremados').draggable({
                    containment: '#myModalCremados',
                    zIndex: 200,
                    start: function (event, ui) {
                        xpos = ui.position.left;
                        ypos = ui.position.top;
                    },
                    // when dragging stops
                    stop: function (event, ui) {
 
                        var xmove = ui.position.left;
                        var ymove = ui.position.top;

                        var pos = Math.round(xmove) + "," + Math.round(ymove);
                        $('.positionSet').attr('value', pos);

                        $('#myModalCremados').modal('hide');

                    }}).css("position", "absolute");
                
                //bajo tierra
                $('.infoCbajoTierraDiv').click(function () {
                    $('#myModalCBajoTierra').modal('show');
                });

                $('.bajoTierra').draggable({
                    containment: '#myModalCBajoTierra',
                    zIndex: 200,
                    start: function (event, ui) {
                        xpos = ui.position.left;
                        ypos = ui.position.top;
                    },
                    // when dragging stops
                    stop: function (event, ui) {
 
                        var xmove = ui.position.left;
                        var ymove = ui.position.top;

                        var pos = Math.round(xmove) + "," + Math.round(ymove);
                        $('.positionSet').attr('value', pos);

                        $('#myModalCBajoTierra').modal('hide');

                    }}).css("position", "absolute");

            });
        </script>
    </head>
    <body>
        <div class="row">
            <div class="col-lg-12">

                <!--<div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
                </div>-->
            </div>
        </div><!-- /.row -->
        <div>
            <?php echo $output; ?>
        </div>


        <div id="myModalNews" class="modal hide fade contenidoMapa" style="width: 1020px; height: 623px;" title="Empty the recycle bin?">
            <div id="colu" style="top:0px; left: 0px; position: absolute;" class="nicho"></div>
        </div>
        
        <div id="myModalMausoleo" class="modal hide fade contenidoMapa" style="width: 1020px; height: 623px;" title="Empty the recycle bin?">
            <div id="colu" style="top:0px; left: 0px; position: absolute;" class="mausoleo"></div>
        </div>
        
        <div id="myModalCremados" class="modal hide fade contenidoMapa" style="width: 1020px; height: 623px;" title="Empty the recycle bin?">
            <div id="colu" style="top:0px; left: 0px; position: absolute;" class="cremados"></div>
        </div>
        
        <div id="myModalCBajoTierra" class="modal hide fade contenidoMapa" style="width: 1020px; height: 623px;" title="Empty the recycle bin?">
            <div id="colu" style="top:0px; left: 0px; position: absolute;" class="bajoTierra"></div>
        </div>

    </body>
</html>
