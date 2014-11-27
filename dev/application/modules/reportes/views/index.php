<script>
    $(function () {

       
        
         $('#datetimepicker1').datetimepicker();
           $('#datetimepicker2').datetimepicker();
           
            $("#datetimepicker1").on("dp.change",function (e) {
               $('#datetimepicker2').data("DateTimePicker").setMinDate(e.date);
            });
            $("#datetimepicker2").on("dp.change",function (e) {
               $('#datetimepicker1').data("DateTimePicker").setMaxDate(e.date);
            });

        var piso = 0;

        $('#funcionario').change(function () {

            piso = $(this).attr('value');
        });

        $('#buscar').click(function () {

            $('.loading').show();

            var urlInfo = base_url + "reportes/showReportes/";
            $(".contenidoReportes").load(urlInfo, {fechaInicio: $('#fechaInicio').val(), fechaFin: $('#fechaFin').val(), funcionario: piso}, function () {
                $('.loading').hide();
            });

        });

        $.post("<?php echo base_url() . "reportes/getFuncionarios"; ?>", function (nichos) {

            var $comboNichoLibres = $("#funcionario");
            $comboNichoLibres.empty();
            var nn = nichos.users;

            $comboNichoLibres.append("<option value='todos'>todos</option>");
            $.each(nn, function (index, v) {
                $comboNichoLibres.append("<option value=" + v['id_users'] + ">" + v['nombre'] + " " + v['apellido'] + "</option>");
            });
        }, 'json');


    });

</script>


    <style>
        .title{
            font-size: 13px;
            color: #fff;
            background-color: #05B2D2;
            padding-left: 8px;
        }

        .cont{
            font-size: 14px;
        }

        .contT{
            background-color:"#f8f8f8";
            padding-left: 5px;

        }
        .contenidoReportes{
            min-height:200px
        }
    </style>
    <table width="898" style="float: left; margin-bottom: 10px;" border="0" class="cont" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3" class="title"><div align="center">REPORTES</div></td>
        </tr>
        <tr>
            <td width="218" class="contT">Fecha Inicio </td>
            <td width="337" class="contT">  <div id="datetimepicker1" class='input-group date' >
                    <input data-format="yyyy-MM-dd" type="text" id="fechaInicio" name="fechaInicio"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
                </div></td>
            <td width="337" rowspan="3" class="contT">
                <button id="buscar"  type="button"  class="btn btn-primary btn-lg active">Mostrar Reportes</button>
            </td>
        </tr>
        <tr>
            <td width="218" class="contT">Fecha Fin </td>
            <td width="337" class="contT"><div id="datetimepicker2" class='input-group date' >
                    <input data-format="yyyy-MM-dd" type="text" id="fechaFin" name="fechaFin"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
                </div></td>
        </tr>
        <tr>
            <td width="218" class="contT">Funcuionario</td>
            <td width="337" class="contT"><select name="funcionario" id="funcionario">
                    <option value="todos">todos</option>
                </select> </td>
        </tr>
        <tr>
            <td colspan="3" class="contenidoReportes">&nbsp;</td>
        </tr>
    </table>