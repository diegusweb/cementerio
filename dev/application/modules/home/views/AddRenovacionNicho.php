<script type="text/javascript">
    $('#add-form').validate({
        rules: {
            tramite: {
                required: true
            },
            piso: {
                required: true
            },
            lado: {
                required: true,
            },
            clase: {
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

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . "home/AddTramiteNichoRenovacion"; ?>",
                data: $('#add-form').serialize(),
                success: function(msg) {
                    if (msg > 0) {
                        $('#myModalAddForm').modal('hide');
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

	var piso = 0;
	 
	 $('#piso').change(function () {
	 
        piso = $(this).attr('value');
	 });

    $('#lado').change(function () {
        var lado = 0;
        lado = $(this).attr('value');
		
        if (lado > 0) {
            //creamos un objeto JSON
            var datos = {
                lado: $(this).val(),
                idBloque: <?php echo $bloque_info[0]['id_bloque_nicho']; ?>,
				piso: piso
            };

            $.post("<?php echo base_url() . "home/getNichosOcupados"; ?>", datos, function(nichos) {
             
                var $comboNichoLibres = $("#nichoLibres");          
                $comboNichoLibres.empty();
                var nn = nichos.nicho_info;
             
                $.each(nn, function(index, v) {          
                   $comboNichoLibres.append("<option value="+v['id_nicho']+">" + v['nicho'] + "</option>");
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
	
	var clase;
	var tipo;
	
	$('#tipo').change(function () {        
        tipo = $(this).attr('value');		
	});
	$('#clase').change(function () {        
        clase = $(this).attr('value');		
	});
	
	$('#generarCosto').click(function(){
		if(tipo == "Mayor"){
			if(clase == "Nuevo"){
				$('#costo').val(163);
			}
			if(clase == "Antiguo"){
				$('#costo').val(83);
			}
		}
		if(tipo == "Menor"){
			if(clase == "Nuevo"){
				$('#costo').val(103);
			}
			if(clase == "Antiguo"){
				$('#costo').val(63);
			}
		}
	});
</script>
<form class="cform-form form-horizontal"  id="add-form" method="POST">
    
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Tramite</label>
		<div class="controls">
			<input type="text" id="tramite" name="tramite" value="Renovacion de 1 año para Nichos"  readonly="true">
		</div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Bloque</label>
        <div class="controls">
			<input type="hidden" id="id_bloque" name="id_bloque" value="<?php echo $bloque_info[0]['id_bloque_nicho']; ?>" >
            <input type="hidden" id="bloque" name="bloque" value="<?php echo $bloque_info[0]['nombre']; ?>" >
            <?php echo $bloque_info[0]['nombre']; ?>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="inputRol">Piso</label>
        <div class="controls">
            <select class="form-control" id="piso" name="piso">
                <option value="">Seleccione un Piso</option>
				<?php
				$piso =  array("Piso 1", "Piso 2");
				for($i=1; $i <= $bloque_info[0]['numero_piso']; $i++){
					echo "<option value='".$i."'>".$piso[$i-1]."</option>";
				}
				?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Lado</label>
        <div class="controls">
            <select class="form-control" id="lado" name="lado">
                 <option value="">Seleccione un lado</option>
            <?php
            $caras =  array("Norte", "Sud", "Este", "Oeste");
            for($i=1; $i <= $bloque_info[0]['numero_caras']; $i++){
                echo "<option value='".$i."'>".$caras[$i-1]."</option>";
            }
            ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Numero de nicho</label>
        <div class="controls">
			<select class="form-control" id="nichoLibres"  name="numeroNicho">
            </select>
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo Nicho</label>
        <div class="controls">
			<select class="form-control" id="clase" name="clase">
			  <option value="">Seleccione Tipo Nicho</option>
			  <option value="Antiguo">Antiguo</option>
			  <option value="Nuevo">Nuevo</option>
			</select>
        </div>
    </div>	
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Tipo</label>
        <div class="controls">
			<select class="form-control" id="tipo" name="tipo">
			  <option value="">Seleccione Tipo</option>
			  <option value="Mayor">Mayor</option>
			  <option value="Menor">Menor</option>
			</select>
        </div>
    </div>	
	
	<div class="control-group">
        <label class="control-label" for="inputRol">Costo</label>
        <div class="controls">
			<div><input type="text" class="form-control"  style="width:60px!important" id="costo" name="costo" readonly="true"> Bs <div id="generarCosto"  style="width:60px!important; float: left;">Generar costo</div></div>
        </div>
    </div>
	
	    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn">Guardar Cambios</button>
        </div>
    </div>
</form>