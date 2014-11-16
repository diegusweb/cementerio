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


        <div id="myModalNews" class="modal hide fade"  title="Empty the recycle bin?">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                Se enviara un correo a todos los clientes ?</p>
        </div>

    </body>
</html>
