<script type="text/javascript">
    $('#add-form').validate({
        rules: {
            usser: {
                minlength: 2,
                required: true
            },
            password: {
                minlength: 2,
                required: true,
            },
            rol: {
                required: true,
            },
            nombre: {
                required: true,
            },
            apellido: {
                required: true,
            }
            

        },
        messages: {
            usser: {
                required: "Campo requerido."
            },
            password: {
                required: "Campo requerido."
            },
            rol: {
                required: "Campo requerido."
            },
            nombre: {
                required: "Campo requerido."
            },
            apellido: {
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
                //cuando presione el boton guardar
                // se lo manda al controlador home y al metodo addUsuario 
                url: "<?php echo base_url() . "home/addUsuario"; ?>",
                data: $('#add-form').serialize(),
//                si el mensaje del metodo de controlador es
//                true que se refresque el grid
//                y que se oculte el modal
                success: function(msg) {
                    if (msg == 'true') {
                        refresh_grid();
                        $('#myModalAdd').modal('hide');

                    }
                },
//                        si el controlador no existe 
//                me devuelve error
                error: function(msg) {
                    alert("Error");
                }
            });

        }
    });

	$('.lados').change(function() {
		alert( "Handler for .change() called." );
		var lado = $(this).val();
		
		if(lado != ""){
			//creamos un objeto JSON
            var datos = {
                lado : $(this).val(),
				idBloque : $(this).val()  				
            };

            $.post("<?php echo base_url() . "home/getNichoslibres"; ?>", datos, function(nichos) {

                var $comboNichoLibres = $("#nichoLibres");

                $comboNichoLibres.empty();

                $.each(nichos, function(index, nichos) {

                    $comboNichoLibres.append("<option value=".nichos.id_nicho.">" + nichos.nicho + "</option>");
                });
            }, 'json');
		}
		else
        {
            // limpiamos el combo e indicamos que se seleccione un país
            var $comboNichoLibres = $("#nichoLibres");
            $comboNichoLibres.empty();
            $comboNichoLibres.append("<option>Seleccione un Nicho</option>");
        }

	});
</script>
<form class="cform-form form-horizontal"  id="add-form" method="POST">
    
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Tramite</label>
        <div class="controls">
            <select class="form-control">
			  <option value="">Nicho Enterratorio</option>
			  <option value="">Nicho Perpetuidad</option>
			  <option value="">Anexión Nicho Perpetuidad</option>
			</select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Bloque</label>
        <div class="controls">
            <input type="text" id="Bloque" name="Bloque" value="" >
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="inputRol">Piso</label>
        <div class="controls">
            <select class="form-control">
			  <option value="">Piso 1</option>
			  <option value="">Piso 2</option>
			</select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Lado</label>
        <div class="controls">
            <select class="form-control">
			  <option value="">Norte</option>
			  <option value="">Sud</option>
			  <option value="">Este</option>
			  <option value="">Oeste</option>
			</select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Numero de nicho Disponible</label>
        <div class="controls">
			<select class="form-control" id="nichoLibres">
			</select>
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo Nicho</label>
        <div class="controls">
			<select class="form-control">
			  <option value="">1ra Clase</option>
			  <option value="">2ra Clase</option>
			</select>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn">Guardar Cambios</button>
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Tiempo</label>
        <div class="controls">
			<select class="form-control">
			  <option value="">Perpetuidad</option>
			  <option value="">5 años</option>
			</select>
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo</label>
        <div class="controls">
			<select class="form-control">
			  <option value="">Mayor</option>
			  <option value="">Niño</option>
			  <option value="">Parvulo</option>
			</select>
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Fecha Tramite</label>
        <div class="controls">
			<input type="datetime" class="form-control" placeholder="Text input">
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Costo</label>
        <div class="controls">
			<input type="text" class="form-control" placeholder="Text input">
        </div>
    </div>
</form>