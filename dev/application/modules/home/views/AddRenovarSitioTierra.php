<script type="text/javascript">
    $('#add-form').validate({
        rules: {
            tramite: {
                required: true
            },
            piso: {
                required: true
            },
            difunto: {
                required: true,
            },
            tipo: {
                required: true,
            },
            costo: {
                required: true,
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
var x;
            if (confirm("Press a button!") == true) {
                $.ajax({
                type: "POST",
                url: "<?php echo base_url() . "home/AddTramiteCremadosRenovar"; ?>",
                data: $('#add-form').serialize(),
                success: function(msg) {
                    if (msg > 0) {
                        $('#myModalAddForm').modal('hide');
                        
                        $('#myModalComprobante').modal({ show: true, keyboard: false, backdrop: 'static' });
                        
                        var link = base_url+"home/comprobante/"+msg;
                        var link2 = link.replace(/\s/g,'');
                        $('#myModalComprobante #contentIdComprobante').html("<a href='"+link2+"' class='linkComprobante'>Ver comprobante</a>");                      

                    }
                },
                error: function(msg) {
                    alert("Error");
                }
            });
            } else {
                x = "You pressed Cancel!";
            }
            

        }
    });


	
	$('#tipo').change(function () {        
			if($(this).attr('value') == "Mayor"){
				$('#costo').val(160);
			}
			else{
				$('#costo').val(103);
			}
	});
</script>
<form class="cform-form form-horizontal"  id="add-form" method="POST">
    
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Tramite</label>
        <div class="controls">
            <input type="text" id="tramite" name="tramite" value="Renovar Sitio Tierra" readonly="true">
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
        <label class="control-label" for="inputRol">Difuntos</label>
        <div class="controls">
			<select class="form-control" id="difunto"  name="difunto">
			 <option value="">Seleccione difunto</option>
				<?php
				foreach($difuntos_info as $row){
					echo "<option value='".$row['id_difunto']."'>".$row['nombreCompletoFallecido']."</option>";
				}
				?>
            </select>
        </div>
    </div>
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo</label>
        <div class="controls">
			<select class="form-control" id="tipo" name="tipo">
			  <option value="">Seleccione tipo</option>
			  <option value="Mayor">Mayor</option>
			  <option value="Menor">Menor</option>
			</select>
        </div>
    </div>
	
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Costo</label>
        <div class="controls">
			<input type="text" class="form-control" style="width:60px!important" id="costo" name="costo" readonly="true"> Bs
        </div>
    </div>
	
	    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn">Guardar Cambios</button>
        </div>
    </div>
</form>