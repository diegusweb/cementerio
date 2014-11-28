<script type="text/javascript">
    $('#add-form').validate({
        rules: {
            nombre: {
                minlength: 2,
                required: true
            },
            apellido: {
                minlength: 2,
                required: true,
            },
            ci: {
                required: true,
                number: true
            },
            direccion: {
                required: true,
            },
            actividad: {
                required: true,
            },
            numeroDomicilio: {
                required: true,
            },
            nit: {
                required: true,
                number: true
            },
            telefono: {
                required: true,
                number: true
            },
            celular: {
                number: true
            }


        },
        messages: {
            usser: {
                required: "Campo requerido."
            },
            password: {
                required: "Campo requerido."
            },
            ci: {
                required: "Campo requerido."
            },
            direccion: {
                required: "Campo requerido."
            },
            actividad: {
                required: "Campo requerido."
            },
            numeroDomicilio: {
                required: "Campo requerido."
            },
            nit: {
                required: "Campo requerido."
            },
            telefono: {
                required: "Campo requerido."
            }

        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');

        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
            console.log(element);
        },
        showErrors: function (errorMap, errorList) {

            $.each(this.validElements(), function (index, element) {
                var $element = $(element);
                $element.parents('.control-group').removeClass("error")
                var de = "#" + $element.attr("name");
                $(de).tooltip("destroy");
            });

            $.each(errorMap, function (key, value) {
                console.log(value);
                $("#" + key).parents('.control-group').addClass('error');
                $("#" + key).tooltip("destroy").tooltip({"animation": true, "placement": "right", "trigger": "focus", "title": value});
            });
        },
        //aqui es el funcionamiento del boton guardar
        submitHandler: function (form) {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . "home/addSolicitante"; ?>",
                data: $('#add-form').serialize(),
                success: function (msg) {
                    if (msg > 0) {
                        $('#myModalError').modal('hide');

                        var form = <?php echo $form;?>;
						var pag = urlControllers[<?php echo $pag;?>-1];
						
						if(form == 1){							
							$('.loading').show();
							   var urlInfo = base_url + "home/"+pag+"/" + <?php echo $id;?>+"/"+form;
							   $("#contentDemoadd").load(urlInfo, function () {
								   $('#myModalAddForm').modal('show');
								   $('#myModalAddForm #myModalLabel').html("Pasos de Registros");
								   $('.loading').hide();
								   
							   });
						}
						else{
							$('#myModalError').modal('hide');
							$('.loading').show();
							   var urlInfo = base_url + "home/"+pag+"/" + <?php echo $id;?>+"/"+form;
							   $("#contentDemoadd").load(urlInfo, function () {
								   $('#myModalAddForm').modal('show');
								   $('#myModalAddForm #myModalLabel').html("Registro Tramite");
								   $('.loading').hide();
								   
							   });
						}
						
                    }
                },
                error: function (msg) {
                    alert("Error");
                }
            });
        }
    });

</script>

<form class="cform-form form-horizontal"  id="add-form" method="POST">

    <div class="control-group">
        <label class="control-label" for="inputUsuario">Nombres</label>
        <div class="controls">
            <input type="text" id="nombre" name="nombre" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Apellidos</label>
        <div class="controls">
            <input type="text" id="apellido" name="apellido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Numero Carnet</label>
        <div class="controls">
            <input type="text" id="ci" name="ci" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Direccion</label>
        <div class="controls">
            <input type="text" id="direccion" name="direccion" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Actividad</label>
        <div class="controls">
            <input type="text" id="actividad" name="actividad" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Numero de Domicilio</label>
        <div class="controls">
            <input type="text" id="numeroDomicilio" name="numeroDomicilio" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Manzana</label>
        <div class="controls">
            <input type="text" id="manzana" name="manzana" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">NIT/CI</label>
        <div class="controls">
            <input type="text" id="nit" name="nit" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Telefono</label>
        <div class="controls">
            <input type="text" id="telefono" name="telefono" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Celular</label>
        <div class="controls">
            <input type="text" id="celular" name="celular" value="" >
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn btn-primary">Guardar Solicitante</button>
        </div>
    </div>

</form>