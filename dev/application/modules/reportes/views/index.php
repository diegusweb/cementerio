<script>
	  $(function() {

		$('#datetimepicker1').datetimepicker({
		  language: 'pt-BR',
		  pickTime: false
		});
		
		$('#datetimepicker2').datetimepicker({
		  language: 'pt-BR',
		  pickTime: false
		});
		
		 var piso = 0;
	 
		 $('#funcionario').change(function () {
		 
			piso = $(this).attr('value');
		 });
		
		$('#buscar').click(function(){
			
			$('.loading').show();
			
			var urlInfo = base_url + "reportes/showReportes/";
			$(".contenidoReportes").load(urlInfo, { fechaInicio: $('#fechaInicio').val(), fechaFin: $('#fechaFin').val(), funcionario: piso}, function() {
				$('.loading').hide();
			});
			
		});
		
		 $.post("<?php echo base_url() . "reportes/getFuncionarios"; ?>", function(nichos) {
             
                var $comboNichoLibres = $("#funcionario");          
                $comboNichoLibres.empty();
                var nn = nichos.users;

				$comboNichoLibres.append("<option value='todos'>todos</option>");
                $.each(nn, function(index, v) {          
                   $comboNichoLibres.append("<option value="+v['id_users']+">" + v['nombre'] +" "+v['apellido']+ "</option>");
                });
             }, 'json');
		
		
	  });

</script>

<div>


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

<table width="890" border="1" class="cont" cellpadding="0" cellspacing="0">
<tr>
   <TH class="title">Reportes</TH>
</TR>
<tr>
   <td>Fecha Inicio 
   <div id="datetimepicker1" class="input-append date">
	<input data-format="yyyy-MM-dd" type="text" id="fechaInicio" name="fechaInicio"></input>
	<span class="add-on">
	  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
	  </i>
	</span>
  </div><br>
  Fecha Fin 
   <div id="datetimepicker2" class="input-append date">
	<input data-format="yyyy-MM-dd" type="text" id="fechaFin" name="fechaFin"></input>
	<span class="add-on">
	  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
	  </i>
	</span>
  </div>
  <div>Funcuionario
  <select name="funcionario" id="funcionario">
  <option value="todos">todos</option>
  </select>
  </div>
  <button id="buscar">Mostrar</button>
  </TD>
</TR>
<tr>
   <td class="title">Resultados</td>
</tr>
<tr>
   <td class="contenidoReportes">
   
   </td>
</TR>

</TABLE> 
