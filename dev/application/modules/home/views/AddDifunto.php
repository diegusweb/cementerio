<script type="text/javascript">
    $('#add-form-dif').validate({
        rules: {
            oficialia: {
                required: true
            },
            libro: {
                required: true
            },
            partida: {
                required: true
            },
            folioNum: {
                required: true
            },
            departamento: {
                required: true
            },
            provincia: {
                required: true
            },
            fechaPartida: {
                required: true
            },
            nombreCompletoFallecido: {
                required: true
            },
            edadFallecido: {
                required: true,
				number: true
            },
            fechaFallecido: {
                required: true
            },
            localidadFallecido: {
                required: true
            },
            provinciaFallecido: {
                required: true
            },
            departamentoFallecido: {
                required: true
            },
            paisFallecido: {
                required: true
            },
            causa: {
                required: true
            },
            comprobante: {
                required: true
            },
            matricula_ci: {
                required: true,
				number: true
            },
            nombreCompletoInscripcion: {
                required: true
            },
            ciInscripcion: {
                required: true,
				number: true
            },
            relacionConDifunto: {
                required: true
            },
            nota: {
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
                url: "<?php echo base_url() . "home/showFormAddDifuncto"; ?>",
                data: $('#add-form-dif').serialize(),
                success: function(mmsg) {
                    if (mmsg > 0) {
                        $('#myModalError').modal('hide');     

                        var form = <?php echo $form;?>;
						var pag = urlControllers[<?php echo $pag;?>-1];
						
						if(form == 1){							
							$('.loading').show();
							   var urlInfo = base_url + "home/"+pag+"/" + <?php echo $id;?>+"/"+form;
							   $("#contentDemoadd").load(urlInfo, function () {
								   $('#myModalAddForm').modal('show');
								   $('#myModalAddForm #myModalLabel').html("Registrar Tramite");
								   $('.loading').hide();
								   
							   });
						}
						else{
							
						}						
                    }
                },
                error: function(mmsg) {
                    alert("Error");
                }
            });

        }
    });
	
	  $(function() {
		$('#datetimepicker1').datetimepicker({
		  language: 'pt-BR',
		});
		
		$('#datetimepicker2').datetimepicker({
		  language: 'pt-BR',
		  pickTime: false
		});
	  });
	  



</script>

<form class="cform-form form-horizontal"  id="add-form-dif" method="POST">
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Oficialia</label>
        <div class="controls">
            <input type="text" id="oficialia" name="oficialia" value="" >
        </div>
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
            <select class="form-control" id="departamento" name="departamento">
                <option value="">Seleccione Departamento</option>
                <option value="Beni">Beni</option>
                <option value="Chuquisaca">Chuquisaca</option>
                <option value="Cochabamba">Cochabamba</option>
                <option value="La Paz">La Paz</option>
                <option value="Oruro">Oruro</option>
                <option value="Pando">Pando</option>
                <option value="Potosí">Potosí</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Tarija">Tarija</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Provincia</label>
        <div class="controls">
            <input type="text" id="provincia" name="provincia" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Localidad</label>
        <div class="controls">
            <input type="text" id="localidad" name="localidad" value="" >
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Con Fecha de partida</label>
        <div class="controls">
		  <div id="datetimepicker2" class="input-append date">
			<input data-format="yyyy-MM-dd" type="text" id="fechaPartida" name="fechaPartida"></input>
			<span class="add-on">
			  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
			  </i>
			</span>
		  </div>
        </div>
    </div>
	<br/>
    <div style="border-bottom :1px solid #333; font-size:14px;"><b>Informacion Difunto</b></div>
	<br/>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Nombre y Apellido</label>
        <div class="controls">
            <input type="text" id="nombreCompletoFallecido" name="nombreCompletoFallecido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Edad Fallecido</label>
        <div class="controls">
            <input type="text" id="edadFallecido" name="edadFallecido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Fecha y Hora</label>
		<div class="controls">
		 <div id="datetimepicker1" class="input-append date">
			<input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="fechaFallecido" name="fechaFallecido"></input>
			<span class="add-on">
			  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
			  </i>
			</span>
		  </div>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="inputPassword">En localidad</label>
        <div class="controls">
            <input type="text" id="localidadFallecido" name="localidadFallecido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Provincia </label>
        <div class="controls">
            <input type="text" id="provinciaFallecido" name="provinciaFallecido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Departamento </label>
        <div class="controls">
            <input type="text" id="departamentoFallecido" name="departamentoFallecido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Pais </label>
        <div class="controls">
            <input type="text" id="paisFallecido" name="paisFallecido" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Por causa de </label>
        <div class="controls">
            <input type="text" id="causa" name="causa" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Comprobante de fallecimiento </label>
        <div class="controls">
            <input type="text" id="comprobante" name="comprobante" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Nro Matricula o CI </label>
        <div class="controls">
            <input type="text" id="matricula_ci" name="matricula_ci" value="" >
        </div>
    </div>
	<br/>
    <div style="border-bottom :1px solid #333; font-size:14px;"><b>Informacion Persona de Inscripcion</b></div>
	<br/>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Nombre y apellido de la persona que pidio inscripcion</label>
        <div class="controls">
            <input type="text" id="nombreCompletoInscripcion" name="nombreCompletoInscripcion" value="<?php echo $nombre;?>" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">CI</label>
        <div class="controls">
            <input type="text" id="ciInscripcion" name="ciInscripcion" value="<?php echo $ci;?>" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Relacion con el difunto</label>
        <div class="controls">
            <input type="text" id="relacionConDifunto" name="relacionConDifunto" value="" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Nota Aclaratoria</label>
        <div class="controls">
            <input type="text" id="nota" name="nota" value="" >
        </div>
    </div>
<br/>
    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn btn-primary">Guardar Informacion del Difunto</button>
        </div>
    </div>

</form>
