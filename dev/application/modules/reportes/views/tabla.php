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
        }, 'json');


    });

</script>
<!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Managed Table</h4>
                            
                        </div>
                        <div class="widget-body">
						<form method="POST" action="<?php echo base_url()."reportes/showReportes";?>">
						<table width="898" style="float: left; margin-bottom: 10px;" border="0" class="cont" cellpadding="0" cellspacing="0">
	
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
									<button id="buscar"  type="submit"  class="btn btn-primary btn-lg active">Mostrar Reportes</button>
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
						<form>
						
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th  class="hidden-phone"><div align="center">Nombre</div></th>
									<th  class="hidden-phone"><div align="center">Concepto</div></th>
									<th  class="hidden-phone"><div align="center">Clase</div></th>
									<th class="hidden-phone"><div align="center">Cuerpo</div></th>
									<th class="hidden-phone"><div align="center">Nicho </div></th>
									<th  class="hidden-phone"><div align="center">Tipo</div></th>
									<th  class="hidden-phone"><div align="center">Bloque</div></th>
									<th  class="hidden-phone"><div align="center">Lado</div></th>
									<th class="hidden-phone"><div align="center">Monto</div></th>
									<th  class="hidden-phone"><div align="center">Reposición Boleta</div></th>
									<th  class="hidden-phone"><div align="center">Total</div></th>
									
                                </tr>
                            </thead>
                            <tbody class="">
								<?php
								foreach($tramite as $row){
									?>
								<tr class="odd gradeX">
									<td class="hidden-phone"><?php echo $row['tramite'];?></td>
									<td class="hidden-phone"><?php //echo $row['clase'];?></td>
									<td class="hidden-phone"><?php echo $row['clase'];?></td>
									<td class="hidden-phone"><?php echo $row['tipo_nicho'];?></td>
									<td class="hidden-phone"><?php echo $row['nro_nicho'];?></td>
									<td class="hidden-phone"><?php echo $row['bloque'];?></td>
									<td class="hidden-phone"><?php echo $row['bloque_nombre'];?></td>
									<td class="hidden-phone"><?php $caras =  array("Norte", "Sud", "Este", "Oeste"); echo ($row['lado'] > 0)? $caras[$row['lado']-1] : "";?></td>
									<td class="hidden-phone"><?php echo $row['costo'];?></td>
									<td class="hidden-phone"><?php echo "3.00";?></td>
									<td class="hidden-phone"><?php echo ($row['costo'] + 3.00);?></td>
								</tr>
								<?php
								}
								?>
                                
                                </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>