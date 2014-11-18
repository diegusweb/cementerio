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
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');

        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
            console.log(element);
        },
        showErrors: function(errorMap, errorList) {

            $.each(this.validElements(), function(index, element) {
                var $element = $(element);
                $element.parents('.control-group').removeClass("error")
                var de = "#" + $element.attr("name");
                $(de).tooltip("destroy");
            });

            $.each(errorMap, function(key, value) {
                console.log(value);
                $("#" + key).parents('.control-group').addClass('error');
                $("#" + key).tooltip("destroy").tooltip({"animation": true, "placement": "right", "trigger": "focus", "title": value});
            });
        },
        //aqui es el funcionamiento del boton guardar
        submitHandler: function(form) {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . "home/addNicho"; ?>",
                data: $('#add-form').serialize(),
                success: function(msg) {
                    if (msg == 'true') {
                        refresh_grid();
                        $('#myModalAdd').modal('hide');

                    }
                },
                error: function(msg) {
                    alert("Error");
                }
            });

        }
    });

</script>
<div class="row">

<form class="cform-form form-horizontal"  id="add-form" method="POST">
<div class="col-md-6">.col-md-6</div>
<div class="col-md-6">.col-md-6</div> 
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Oficialia</label>
        <input type="text" id="oficialia" name="oficialia" value="" >
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Libro</label>
        <div class="controls">
            <input type="text" id="libro" name="libro" value="" >
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="inputPassword">Partida</label>
        <div class="controls">
            <input type="text" id="partida" name="partida" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Folio Nro.</label>
        <div class="controls">
            <input type="text" id="folioNum" name="folioNum" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Departamento</label>
        <div class="controls">
            <input type="text" id="departamento" name="departamento" value="" >
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Provincia</label>
        <div class="controls">
            <input type="text" id="provincia" name="provincia" value="" >
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Fecha de partida</label>
        <div class="controls">
            <input type="text" id="localidad" name="localidad" value="" >
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Nombre y Apellido</label>
        <div class="controls">
            <input type="text" id="nombreCompleto" name="nombreCompleto" value="" >
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Manzana</label>
        <div class="controls">
            <input type="text" id="manzana" name="manzana" value="" >
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn">Guardar Difunto</button>
        </div>
    </div>

</form>

</div>