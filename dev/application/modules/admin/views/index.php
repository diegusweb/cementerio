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
                left: 40% !important;
                top: 1%;
            }
            
        </style>
        <script type="text/javascript">
            var demo;
			
            $("document").ready(function () {

                $('.infoSucursalDiv').click(function () {

                    $('#myModalNews').modal('show');
                    /*var urlNoti = "<?php echo base_url(); ?>transaccion/getTraspasos?id=" + id + "&suc=" + sucursal;
                     $("#contentT").load(urlNoti, {id: id, suc: sucursal, nom: nombre}, function() {
                     $('#myModalT').modal('show');
                     });*/
                });
                
                $('.nicho').draggable({  
                    containment: '#myModalNews',
                    zIndex: 200,
                    start: function(event, ui) {
                        xpos = ui.position.left;
                        ypos = ui.position.top;
                        
                        //console.log(xpos+" - "+ypos)
                      },
                  // when dragging stops
                    stop: function(event, ui) {
                      // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
                      var xmove =  ui.position.left;
                      var ymove = ui.position.top;
                      
                       var pos = Math.round(xmove)+","+Math.round(ymove);
                       $('.positionSet').attr('value',pos);
                       
                       $('#myModalNews').modal('hide');

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


        <div id="myModalNews" class="modal hide fade contenidoMapa" style="width: 900px; height: 600px;" title="Empty the recycle bin?">
           <div id="colu" style="top:0px; left: 0px; position: absolute;" class="nicho">Columna 1</div>
        </div>

    </body>
</html>
