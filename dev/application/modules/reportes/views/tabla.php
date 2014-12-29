<style>
    body{
        font-size: 11px;
    }
</style>
<script>
    $(function () {



        $('#datetimepicker1d').datetimepicker();
        $('#datetimepicker2d').datetimepicker();

        $("#datetimepicker1d").on("dp.change", function (e) {
            $('#datetimepicker2d').data("DateTimePicker").setMinDate(e.date);
        });
        $("#datetimepicker2d").on("dp.change", function (e) {
            $('#datetimepicker1d').data("DateTimePicker").setMaxDate(e.date);
        });

        var piso = 0;

        $('#funcionario').change(function () {

            piso = $(this).attr('value');
        });

        /* $('#buscar').click(function () {
         
         $('.loading').show();
         
         var urlInfo = base_url + "reportes/showReportes/";
         $(".contenidoReportes").load(urlInfo, {fechaInicio: $('#fechaInicio').val(), fechaFin: $('#fechaFin').val(), funcionario: piso}, function () {
         $('.loading').hide();
         });
         
         });*/

        $.post("<?php echo base_url() . "reportes/getFuncionarios"; ?>", function (nichos) {

            var $comboNichoLibres = $("#funcionario");
            $comboNichoLibres.empty();
            var nn = nichos.users;

            $comboNichoLibres.append("<option value='todos'>todos</option>");
            $.each(nn, function (index, v) {
                $comboNichoLibres.append("<option value=" + v['id_users'] + ">" + v['nombre'] + " " + v['apellido'] + "</option>");
            });

            var func = "<?php echo ($this->session->userdata('funcionario')) ? $this->session->userdata('funcionario') : "0"; ?>";
            $("#funcionario option[value='" + func + "']").attr("selected", true);

        }, 'json');

        var funcc = <?php echo ($this->session->userdata('concepto')) ? $this->session->userdata('concepto') : "0"; ?>;
        $("#concepto option[value='" + funcc + "']").attr("selected", true);

        var funct = "<?php echo ($this->session->userdata('tipo')) ? $this->session->userdata('tipo') : "0"; ?>";
        $("#tipo option[value='" + funct + "']").attr("selected", true);
    });

</script>

<style>
    .titl{
        color:#ffffff;
        cursor: pointer;
    }
</style>

<!-- BEGIN ADVANCED TABLE widget-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE widget-->
        <div class="widget">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Reportes</h4>

            </div>
            <div class="widget-body" style="padding: 10px;">
                <form method="POST" action="<?php echo base_url() . "reportes/showReportes"; ?>">
                    <table width="898" style="float: left; margin-bottom: 10px;" border="0" class="cont" cellpadding="0" cellspacing="0">

                        <tr>
                            <td width="218" class="contT"><div id="datetimepicker1d" class='input-group date' >
                                    <input data-format="yyyy-MM-dd" style="width: 100px;" type="text" id="fechaInicio" value="<?php echo $this->session->userdata('fechaInicio'); ?>" name="fechaInicio" placeholder="Fecha Inicio"></input>
                                    <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                        </i>
                                    </span>
                                </div></td>
                            <td width="337" class="contT"> <div id="datetimepicker2d" class='input-group date' >
                                    <input data-format="yyyy-MM-dd" style="width: 100px;" placeholder="Fecha Fin" type="text" id="fechaFin" value="<?php echo $this->session->userdata('fechaFin'); ?>" name="fechaFin"></input>
                                    <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                        </i>
                                    </span>
                                </div> </td>
                            <td width="337"  class="contT">
                                Funcionario : <select name="funcionario" id="funcionario">
                                    <option value="0">todos</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="218" class="contT">
                                <select style="width: 150px;" name="tipo" id="tipo">
                                    <option value="">Tipo de bloque </option>
                                    <option value="Nicho">Bloque Nicho</option>
                                    <option value="Mausoleo">Bloque Mausoleo</option>
                                    <option value="Cremados">Bloque Crematorios</option>
                                    <option value="Sitio Tierra">Bloque Sitio Tierra</option>
                                </select>
                            </td>
                            <td width="337" class="contT">
                                <select style="width: 150px;" name="concepto" id="concepto">
                                    <option value="">Concepto Todos</option>
                                    <option value="1">Nicho Perpetuidad</option>
                                    <option value="8">Nicho Enterratorio</option>
                                    <option value="3">Ingresar Sitio Tierra</option>
                                    <option value="4">Ingresar a Mausoleo</option>
                                    <option value="5">Renovacion Nichos</option>
                                    <option value="6">Exhumacion</option>
                                    <option value="7">Construccion de cripta</option>
                                    <option value="9">Lapida</option>
                                    <option value="10">Cremar</option>
                                </select>
                            </td>
                            <td><button id="buscar"  type="submit"  class="btn btn-primary btn-lg active">Mostrar Reportes</button>
                                <A id="imprimir" href="<?php echo base_url() . "reportes/exportCheckedApplicants" ?>"  class="btn btn-success btn-lg active">Imprimir Reportes</a></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="contenidoReportes">&nbsp;</td>
                        </tr>
                    </table>
                    <form>

                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Nombre</div></th>
									<th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Difunto</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Concepto</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">F. Tramite</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Responsable</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Clase</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Cuerpo</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Nicho </div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Tipo</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Bloque</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Lado</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Monto</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">R.Boleta</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Total</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Ver</div></th>
                            <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Ver</div></th>
                             <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Boleta</div></th>
                            </tr>
                            </thead>
                            <tbody class="">
                                <?php
                                foreach ($tramite as $row) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td class="hidden-phone"><?php echo $row['nombre'] . " " . $row['apellido']; ?></td>
										 <td class="hidden-phone"><?php echo $row['nombre_difunto'] ?></td>
                                        <td class="hidden-phone"><?php echo utf8_decode($row['tramite']); ?></td>
                                        <td class="hidden-phone"><?php echo ($row['nro_nicho'] > 0) ? $row['fecha_tramite_nicho'] : $row['fecha_tramite']; ?></td>
                                        <td class="hidden-phone"><?php echo $row['user_nombre'] . " " . $row['user_apellido']; ?></td>
                                        <td class="hidden-phone"><?php echo $row['clase']; ?></td>
                                        <td class="hidden-phone"><?php echo $row['tipo_nicho']; ?></td>
                                        <td class="hidden-phone"><?php echo ($row['nro_nicho'] > 0) ? $row['nro_nicho'] : ""; ?></td>
                                        <td class="hidden-phone"><?php echo $row['bloque']; ?></td>
                                        <td class="hidden-phone"><?php echo $row['bloque_nombre']; ?></td>
                                        <td class="hidden-phone"><?php
                                            $caras = array("Norte", "Sud", "Este", "Oeste");
                                            echo ($row['lado'] > 0) ? $caras[$row['lado'] - 1] : "";
                                            ?></td>
                                        <td class="hidden-phone"><?php echo $row['costo']; ?></td>
                                        <td class="hidden-phone"><?php echo "3.00" ?></td>
                                        <td class="hidden-phone"><?php echo $row['costo'] + 3.00; ?></td>
                                       <!-- <td class="hidden-phone"><?php echo ($row['bloque'] == "Mausoleo")?"0.00":"3.00"; ?></td>
                                        <td class="hidden-phone"><?php echo ($row['bloque'] != "Mausoleo")?($row['costo'] + 3.00):$row['costo']; ?></td>-->
                                        <td class="hidden-phone"><a href="#" class="showSolicitante" onClick="showSolicitante(<?php echo $row['id_solicitante']; ?>)">Solicitud</a></td>
                                        <td class="hidden-phone"><a href="#" class="showDifunto" onClick="showDifunto(<?php echo $row['id_difunto']; ?>)">Difunto</a></td>
                                        <td class="hidden-phone"><a href="<?php echo base_url()."home/comprobante/".$row['id_tramite']."/0";?>" >Boleta</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <div style="float: right;">
                            <table width="419" border="0">
                                <tr>
                                    <td width="132" bgcolor="#CCCCCC"><div align="center">Total</div></td>
                                    <td width="46" bgcolor="#CCCCCC"><?php echo $monto; ?></td>
                                    <td width="54" bgcolor="#CCCCCC"><?php echo $sumBoleta; ?></td>
                                    <td width="159" bgcolor="#CCCCCC"><?php echo $sumMonto; ?></td>
                                </tr>
                            </table>

                        </div>
                        </div>
                        </div>
                        <!-- END EXAMPLE TABLE widget-->
                        </div>
                        </div>


