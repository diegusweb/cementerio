<script type="text/javascript">
    $('#add-form').validate({
        rules: {
            tramite: {
                required: true
            },
            tipo: {
                required: true
            },
           costo: {
                required: true
            }
            

        },
        messages: {

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
                url: "<?php echo base_url() . "home/AddTramiteBajoTierra"; ?>",
                data: $('#add-form').serialize(),
                success: function(msg) {
                    if (msg > 0) {
                         $('#myModalAddForm').modal('hide');
                        $('#myModalComprobante').modal('show');
                        
                        var link = base_url+"home/comprobante/"+msg;
                        var link2 = link.replace(" ","");
                        $('#myModalComprobante #contentIdComprobante').html("<a href='"+link2+"' class='linkComprobante'>Ver comprobante</a>");                      


                    }
                },
                error: function(msg) {
                    alert("Error");
                }
            });

        }
    });

	$('#tipo').change(function () {        
		if($(this).attr('value') == "Mayor"){
			$('#costo').val(103);
		}
		else if($(this).attr('value') == "Menor"){
			$('#costo').val(83);
		}
		else{
			$('#costo').val(43);
		}
	});
</script>
<form class="cform-form form-horizontal"  id="add-form" method="POST">
    
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Tramite</label>
		<div class="controls">
            <input type="text" id="tramite" name="tramite" value="Ingresar Sitio Tierra" readonly="true">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Bloque</label>
        <div class="controls">
			<input type="hidden" id="id_bloque" name="id_bloque" value="<?php echo $bloque_info[0]['id_bloque_bajo_tierra']; ?>" >
            <input type="hidden" id="bloque" name="bloque" value="<?php echo $bloque_info[0]['nombre']; ?>" >
            <?php echo $bloque_info[0]['nombre']; ?>
        </div>
    </div>

	
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo</label>
        <div class="controls">
			<select class="form-control" id="tipo" name="tipo">
			<option value="">Seleccion Tipo</option>
			  <option value="Mayor">Mayor</option>
			  <option value="Menor">Menor</option>
			  <option value="Parvulo">Parvulo </option>
			</select>
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