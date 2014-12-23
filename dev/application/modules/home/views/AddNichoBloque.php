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
            tiempo: {
                required: true,
            },
            tipo: {
                required: true,
            },
            costo: {
                required: true,
            },
            numeroNichoView: {
                required: true,
            }
        },
        messages: {
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
            var x;
            if (confirm("Confirma que desea guardar!") == true) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "home/AddTramiteNicho"; ?>",
                    data: $('#add-form').serialize(),
                    success: function (msg) {
                        if (msg > 0) {
                            $('#myModalAddForm').modal('hide');
                            $('#myModalComprobante').modal({show: true, keyboard: false, backdrop: 'static'});

                            var link = base_url + "home/comprobante/" + msg;
                            var link2 = link.replace(/\s/g, '');
                            $('#myModalComprobante #contentIdComprobante').html("<a href='" + link2 + "' class='linkComprobante'>Ver comprobante</a>");
                        }
                    },
                    error: function (msg) {
                        alert("Error");
                    }
                });
            } else {
                x = "You pressed Cancel!";
            }


        }
    });
	
	var clase;
    var tiempo;
    var tramite;
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

            $.post("<?php echo base_url() . "home/getNichoslibres"; ?>", datos, function (nichos) {

                var $comboNichoLibres = $("#nichoLibres");
                $comboNichoLibres.empty();

                var $dibujoNichoLibres = $("#navegador");
                $dibujoNichoLibres.empty();

                var nn = nichos.nicho_info;
                // $dibujoNichoLibres.append('<ul>');
                var i = 1;
                var j = 2;

                // var salto = (parseInt($('#lado').attr('data-nicho')));
                //var fila = parseInt($('#lado').attr('data-fila'));


                var salto = 0;
                var fila = 0;
                if($('#lado').val() == 3 || $('#lado').val() == 4){
                    if ($('#lado').attr('data-extra') != null) {
                        var c = $('#lado').attr('data-extra');
                        var elem = c.split('.');

                        salto = elem[1];
                        fila = elem[0];
                    }
                }             
                else {
                    salto = (parseInt($('#lado').attr('data-nicho')));
                    fila = parseInt($('#lado').attr('data-fila'));
                }


                console.log("salto " + salto + " fila " + fila);

                $('#numeroNicho').val('');
                $('#numeroNichoView').val('');
                $dibujoNichoLibres.append("<li style='background-color: #f9dd34;'>1</li>");
                $.each(nn, function (index, v) {
                    //$comboNichoLibres.append("<option value="+v['id_nicho']+">" + v['nicho'] + "</option>");
					 var estado;
					if(v['estado'] == "Libre"){
						estado = "libre";
					}
					else if(v['estado'] == "Perpetuidad"){
						estado = "Perpetuidad";
					}
					else{
						estado = "ocupado";
					}
                    //var estado = (v['estado'] == "Libre") ? "libre" : "ocupado";
                    var box = (v['nicho'] < 10) ? "padding-left: 14px; padding-right: 13px;" : "5px;";

                    $dibujoNichoLibres.append("<li class=" + estado + ' ' + box + " data-id=" + v['id_nicho'] + " style='" + box + "'>" + v['nicho'] + "</li>");
                    if (i == salto) {
                        $dibujoNichoLibres.append("<br>");
                        if (j <= fila) {
                            $dibujoNichoLibres.append("<li style='background-color: #f9dd34;'>" + j + "</li>");
                            j = j + 1;
                        }

                        i = 0;
                    }

                    i = i + 1;
                });
                //$dibujoNichoLibres.append('</ul>');
            }, 'json');


        }
        else
        {
            var $comboNichoLibres = $("#nichoLibres");
            $comboNichoLibres.empty();
            $comboNichoLibres.append("<option>Seleccione un lado</option>");
        }

    });



    $('#clase').change(function () {
        $('#costo').val("");
        clase = $(this).attr('value');
    });
    $('#tiempo').change(function () {
        // tiempo = $(this).attr('value');
    });

    $('#tramite').change(function () {
        $('#costo').val("");
        tramite = $(this).attr('value');
        if (tramite == "Anexion Nicho Perpetuidad") {
			tramite = true;
            tiempo = "Perpetuidad";
			$('#numeroNicho').val('');
			$('#numeroNichoView').val('');
            $('#tiempo').val(tiempo);
        }
        else if (tramite == "Nicho Enterratorio") {
			tramite = false;
            tiempo = "5 años";
			$('#numeroNicho').val('');
			$('#numeroNichoView').val('');
            $('#tiempo').val(tiempo);

        }
        else {
			tramite = false;
            tiempo = "Perpetuidad";
			$('#numeroNicho').val('');
			$('#numeroNichoView').val('');
            $('#tiempo').val(tiempo);
        }
    });

    $('#generarCosto').click(function () {

        if (tramite != "Anexion Nicho Perpetuidad") {
            if (clase == "1ra Clase") {
                if (tiempo == "Perpetuidad") {
                    $('#costo').val($('#costo_perpetuidad_1_clase').val());
                }
                if (tiempo == "5 años") {
                    $('#costo').val($('#costo_5_year_1_clase').val());
                }
            }
            if (clase == "2ra Clase") {
                if (tiempo == "Perpetuidad") {
                    $('#costo').val($('#costo_perpetuidad_2_clase').val());
                }
                if (tiempo == "5 años") {
                    $('#costo').val($('#costo_5_year_2_clase').val());
                }
            }
        }
        else {
            if (clase == "1ra Clase") {
                $('#costo').val("250");
            }
            if (clase == "2ra Clase") {
                $('#costo').val("200");
            }
        }

    });


    $("#navegador").on("click", "li.libre", function (event) {
		if(!tramite){
			$('#numeroNicho').val($(this).attr('data-id'));
			$('#numeroNichoView').val($(this).text());
		}
    });
	
	$("#navegador").on("click", "li.Perpetuidad", function (event) {
		if(tramite){
			 $('#numeroNicho').val($(this).attr('data-id'));
			 $('#numeroNichoView').val($(this).text());
		}
       
    });


</script>

<style>
    #navegador ul{
        list-style-type: none;
        text-align: center;
    }
    #navegador li{
        display: inline;
        text-align: center;
        padding: 2px 10px 1px;
        border: 1px solid;
        cursor:pointer;
    }
    #navegador li a {
        padding: 2px 7px 2px 7px;
        color: #666;
        background-color: #eeeeee;
        border: 1px solid #ccc;
        text-decoration: none;
    }
    #navegador li a:hover{
        background-color: #333333;
        color: #ffffff;
    }

    #navegador .libre{
        background-color: #fff;
    }

    #navegador .ocupado{
        background-color: #ff0000;
    }
	
	#navegador .Perpetuidad{
        background-color: #FFBD5A;
    }

    #navegador .boxX{
        padding-left:5px;
    }

    #navegador .boxL{

    }

    ul, ol {
        margin: 0;
        padding: 0;
    }
</style>

<form class="cform-form form-horizontal"  id="add-form" method="POST">

    <div class="control-group">
        <label class="control-label" for="inputUsuario">Tramite</label>
        <div class="controls">
            <select class="form-control" id="tramite" name="tramite">
                <option value="">Seleccione Tramite</option>
                <option value="Nicho Enterratorio">Nicho Enterratorio</option>
                <option value="Nicho Perpetuidad">Nicho Perpetuidad</option>
                <option value="Anexion Nicho Perpetuidad">Anexion Nicho Perpetuidad</option>
            </select>
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
                $piso = array("Piso 1", "Piso 2");
                for ($i = 1; $i <= $bloque_info[0]['numero_piso']; $i++) {
                    echo "<option value='" . $i . "'>" . $piso[$i - 1] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Lado</label>
        <div class="controls">
            <select class="form-control" id="lado" name="lado" data-extra="<?php echo $bloque_info[0]['extra_caras']; ?>" data-nicho="<?php echo $bloque_info[0]['numero_nichos']; ?>" data-fila="<?php echo $bloque_info[0]['numero_filas']; ?>">
                <option value="">Seleccione un lado</option>
                <?php
                $caras = array("Norte", "Sud", "Este", "Oeste");
                for ($i = 1; $i <= $bloque_info[0]['numero_caras']; $i++) {
                    echo "<option value='" . $i . "'>" . $caras[$i - 1] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Numero de nicho Disponible</label>
        <div class="controls">
            <input type="text" class="form-control" style="width:26px;" id="numeroNichoView" value="" name="numeroNichoView" readonly="true">
            <ul id="navegador" style="width: 30px; height: auto;"</ul>            
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Tipo</label>
        <div class="controls">
            <select class="form-control" id="tipo" name="tipo">
                <option value="">Seleccione tipo</option>
                <option value="Mayor">Mayor</option>
                <option value="Menor">Menor</option>
                <option value="Parvulo">Parvulo</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Tipo Nicho</label>
        <div class="controls">
            <select class="form-control" id="clase" name="clase">
                <option value="">Seleccione una Clase</option>
                <option value="1ra Clase">1ra Clase</option>
                <option value="2ra Clase">2ra Clase</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputRol">Tiempo</label>
        <div class="controls">
            <!--<select class="form-control" id="tiempo" name="tiempo">
                <option value="">Seleccione un Tiempo</option>
                <option value="Perpetuidad">Perpetuidad</option>
                <option value="5 años">5 años</option>
            </select>-->
            <input type="text" class="form-control" name="tiempo"  id="tiempo" value="" readonly="true">
        </div>
    </div>

    <!--<div class="control-group">
         <label class="control-label" for="inputRol">Fecha Tramite</label>
         <div class="controls">
             <input type="datetime" class="form-control" placeholder="Text input" id="fechaTramite" name="fechaTramite">
         </div>
     </div> -->

    <div class="control-group">
        <label class="control-label" for="inputRol">Costo</label>
        <div class="controls">
            <input type="hidden" class="form-control" name="numeroNicho"  id="numeroNicho" value="">
            <input type="hidden" class="form-control"  id="costo_perpetuidad_1_clase" value="<?php echo $bloque_info[0]['costo_perpetuidad_1_clase']; ?>">
            <input type="hidden" class="form-control"  id="costo_perpetuidad_2_clase" value="<?php echo $bloque_info[0]['costo_perpetuidad_2_clase']; ?>">
            <input type="hidden" class="form-control"  id="costo_5_year_1_clase" value="<?php echo $bloque_info[0]['costo_5_year_1_clase']; ?>">
            <input type="hidden" class="form-control"  id="costo_5_year_2_clase" value="<?php echo $bloque_info[0]['costo_5_year_2_clase']; ?>">
            <div><input type="text" class="form-control"  style="width:60px!important" id="costo" name="costo" readonly="true"> Bs <div id="generarCosto"  style="width:92px!important; cursor: pointer; color: blue; float: left;">Generar costo</div></div>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </div>
</form>