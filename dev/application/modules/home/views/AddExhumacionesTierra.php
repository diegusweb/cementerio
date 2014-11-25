<script type="text/javascript">
    $('#add-form').validate({
        rules: {
            tramite: {
                required: true
            },
            piso: {
                required: true
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
                url: "<?php echo base_url() . "home/addNicho"; ?>",
                data: $('#add-form').serialize(),
                success: function(msg) {
                    if (msg > 0) {
                        $('#myModalAdd').modal('hide');
                        
                        $('#myModalComprobante').modal('show');
                        
                       var link = base_url+"home/comprobante/"+msg;
                        var link2 = link.replace(/\s/g,'');
                        $('#myModalComprobante #contentIdComprobante').html("<a href='"+link2+"' class='linkComprobante'>Ver comprobante</a>");                      


                    }
                },
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
            var $comboNichoLibres = $("#nichoLibres");
            $comboNichoLibres.empty();
            $comboNichoLibres.append("<option>Seleccione un lado</option>");
        }

	});
</script>
<form class="cform-form form-horizontal"  id="add-form" method="POST">
    
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Tramite</label>
        <div class="controls">
            <input type="hidden" id="exhumacion" name="exhumacion" value="exhumacion" >
			Exhumacion
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Bloque</label>
        <div class="controls">
			<input type="hidden" id="id_bloque" name="id_bloque" value="" >
            <input type="hidden" id="bloque" name="bloque" value="" >
			<?php echo "BLOQUE Tierra";?>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="inputRol">Nro Sitio</label>
        <div class="controls">
             <input type="text" id="numSitio" name="numSitio" value="" >
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo</label>
        <div class="controls">
			<select class="form-control" id="tipo" name="tipo">
			  <option value="">Mayor</option>
			  <option value="">Menor</option>
			</select>
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Fecha Tramite</label>
        <div class="controls">
			<input type="datetime" class="form-control" placeholder="Text input" id="fechaTramite" name="fechaTramite">
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Costo</label>
        <div class="controls">
			<input type="text" class="form-control" placeholder="Text input" id="costo" name="costo">
        </div>
    </div>
	
	    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn">Guardar Cambios</button>
        </div>
    </div>
</form>