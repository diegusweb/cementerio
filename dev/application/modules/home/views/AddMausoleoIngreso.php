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
            if (confirm("Press a button!") == true) {
               $.ajax({
                type: "POST",
                url: "<?php echo base_url() . "home/AddTramiteNicho"; ?>",
                data: $('#add-form').serialize(),
                success: function (msg) {
                    if (msg > 0) {
                        $('#myModalAddForm').modal('hide');
                        $('#myModalComprobante').modal({ show: true, keyboard: false, backdrop: 'static' });

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
                var nn = nichos.nicho_info;

                $.each(nn, function (index, v) {
                    $comboNichoLibres.append("<option value=" + v['id_nicho'] + ">" + v['nicho'] + "</option>");
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
    var tiempo;
    var tramite;

    $('#clase').change(function () {
        clase = $(this).attr('value');
    });
    $('#tiempo').change(function () {
        tiempo = $(this).attr('value');
    });

    $('#tramite').change(function () {
        tramite = $(this).attr('value');
    });

    $('#generarCosto').click(function () {
        console.log(tramite + " " + clase + " " + tiempo)
        if (tramite != "Anexion Nicho Perpetuidad") {
            if (clase == "1ra Clase") {
                if (tiempo == "Perpetuidad") {
                    $('#costo').val($('#costo_perpetuidad_1_clase').val());
                }
                if (tiempo == "5 a�os") {
                    $('#costo').val($('#costo_5_year_1_clase').val());
                }
            }
            if (clase == "2ra Clase") {
                if (tiempo == "Perpetuidad") {
                    $('#costo').val($('#costo_perpetuidad_2_clase').val());
                }
                if (tiempo == "5 a�os") {
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

</script>
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
            <input type="hidden" id="id_bloque" name="id_bloque" value="<?php echo $bloque_info[0]['id_bloque_mausoleo']; ?>" >
            <input type="hidden" id="bloque" name="bloque" value="<?php echo $bloque_info[0]['nombre']; ?>" >
            <?php echo $bloque_info[0]['nombre']; ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRol">Numero de nicho Disponible</label>
        <div class="controls">
            <select class="form-control" id="nichoLibres"  name="numeroNicho">
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
            <select class="form-control" id="tiempo" name="tiempo">
                <option value="">Seleccione un Tiempo</option>
                <option value="Perpetuidad">Perpetuidad</option>
                <option value="5 a�os">5 a�os</option>
            </select>
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
            <input type="hidden" class="form-control"  id="costo_perpetuidad_1_clase" value="<?php echo $bloque_info[0]['costo_perpetuidad_1_clase']; ?>">
            <input type="hidden" class="form-control"  id="costo_perpetuidad_2_clase" value="<?php echo $bloque_info[0]['costo_perpetuidad_2_clase']; ?>">
            <input type="hidden" class="form-control"  id="costo_5_year_1_clase" value="<?php echo $bloque_info[0]['costo_5_year_1_clase']; ?>">
            <input type="hidden" class="form-control"  id="costo_5_year_2_clase" value="<?php echo $bloque_info[0]['costo_5_year_2_clase']; ?>">
            <div><input type="text" class="form-control"  style="width:60px!important" id="costo" name="costo" readonly="true"> Bs <div id="generarCosto"  style="width:60px!important; float: left;">Generar costo</div></div>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <!--aqui se debe mandar al controlador? o a la vista home_view-->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </div>
</form>