<style>
    .title{
        font-size: 13px;
        color: #fff;
        background-color: #05B2D2;
        padding-left: 5px;
    }
    
    .cont{
        font-size: 14px;
		border-radius: 15px;
    }
    
    .contT{
        background-color:"#f8f8f8";
         padding-left: 5px;
        
    }
	.impri{
		margin: 0 auto;
		width:604.7px;
		height:566.9px;
	}
	.marco{
		margin: 0 auto;
		width:812.5px;
		height:699.2px;
	}

</style>

<div id="marco" class="marco">


<div id="save-form" class="impri">
	<div style="text-align:left;">
		VALLE HERMOSO
		<br>
		UNIDAD CEMENTERIO
		<br>
		asdas
	</div>
	
<p><h4  style="width:640px; text-align: center; padding-top:25px; padding-bottom:25px;">COMPROBANTE<h4/></p>

<table width="640" border="1" class="cont" cellpadding="0" cellspacing="0">
  <tr>
      <td width="196" class="title">Nro.  CARNET</td>
    <td width="475" class="title">NOMBRE Y APELLIDO O RAZON SOCIAL</td>
  </tr>
  <tr>
    <td class="contT"><?php echo $tramite[0]['ci']?></td>
    <td class="contT"><?php echo $tramite[0]['nombre']." ".$tramite[0]['apellido']?></td>
  </tr>
  </table>
<p>&nbsp;</p>
<table width="640" border="1"  class="cont"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="87" class="title">DIRECCION</td>
    <td width="183" class="contT"><?php echo $tramite[0]['direccion']?></td>
    <td width="103" class="title">NRO. CASA</td>
    <td width="178" class="contT"><?php echo $tramite[0]['numero_casa']?></td>
    <td width="219" class="title">TELEFONO(S)</td>
  </tr>
  <tr>
    <td class="title">ACTIVIDAD</td>
    <td class="contT"><?php echo $tramite[0]['actividad']?></td>
    <td class="title">MANZANA</td>
    <td class="contT"><?php echo $tramite[0]['manzana']?></td>
    <td class="contT"><?php echo $tramite[0]['telefono']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="title">NIT/CI</td>
    <td class="contT"><?php echo $tramite[0]['nit']?></td>
    <td class="contT"><?php echo $tramite[0]['celular']?></td>
  </tr>
</table>
<br/>
<p>HA EFECTUADO EL SIGUIENTE PAGO:</p>
<table width="640" border="1" class="cont"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="167" class="title">CODIGO CUENTA</td>
    <td width="461" class="title">CONCEPTO</td>
    <td width="254" class="title">IMPORTE Bs.</td>
  </tr>
  <tr>
    <td class="contT" valign="top"><?php echo $tramite[0]['id_tramite']?></td>
    <td class="contT"><p align="center">CEMENTERIO.- Pago por concepto de</p>
      <p align="center"><?php echo $tramite[0]['tramite']?></p>
      <p align="center"><?php echo $tramite[0]['clase']?></p>
      <p align="center">Cuerpo: <?php echo $tramite[0]['tipo_nicho']?></p>
	  <?php
	    if ($tramite[0]['nro_nicho'] > 0)
		{
			echo " <p align='center'>Numero Nicho: ".$tramite[0]['nro_nicho'];
		}
	  ?>
      <p align="center">Bloque: <?php echo $tramite[0]['bloque']?></p>
      <?php  $caras =  array("Norte", "Sud", "Este", "Oeste");  
	    if (!empty($tramite[0]['lado']))
		{
			echo " <p align='center'>Lado: ".$caras[$tramite[0]['lado']-1];
		}
		?> </p>
      <p align="center">Difunto (a): <?php echo $tramite[0]['nombreCompletoFallecido']?></p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p></td>
    <td valign="top" class="contT" id="testIn"><?php echo $tramite[0]['costo']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="title">REPOSICION DE COMPROBANTE:</td>
    <td class="contT">3.00</td>
	<input type="hidden" class="formTotal" name="total" value="<?php echo $tramite[0]['costo']?>">
	<input type="hidden" class="formTotalLiteral" name="totalLiteral" value="<?php echo $tramite[0]['costo']?>">
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right" >TOTAL Bs.</div></td>
    <td><div class="costoTotal contT"></div></td>
  </tr>
  <tr>
    <td class="contT">SON:</td>
    <td><div class="totalLetras contT"></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br/>
</div>
</div>
<!--<button type="button" id="saveComprobante" class="btn btn-primary btn-lg" aria-label="Left Align">
  Verifica para guardar los Datos de Comprobante
</button>-->
<button type="button" onclick="imprimir();" class="btn btn-primary btn-lg">
  Imprimir
</button>


<script>


var costo= <?php echo $tramite[0]['costo']?>;
var total = (costo + 3.00);
	
var datos = { letras: total};

$('.costoTotal').html(total);
$('.formTotal').val(total);

$.ajax({
	type: "POST",
	url: "<?php echo base_url() . "home/conertirLetras"; ?>",
	data: datos,
	success: function (msg) {
		if (msg != null) {			
			$('.totalLetras').html(msg);  
			$('.formTotalLiteral').val(msg);			
		}
	},
	error: function (msg) {
		alert("Error");
	}
});

$('#saveComprobante').click(function(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url() . "home/AddTramiteNichosss"; ?>",
		data: $('#save-form').serialize(),
		success: function (msg) {
			if (msg > 0) {
				alert("Correcto");			
			}
		},
		error: function (msg) {
			alert("Error");
		}
	});
});

function imprimir(){
  var objeto=document.getElementById('marco');  //obtenemos el objeto a imprimir
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana
  ventana.close();  //cerramos la ventana
}

</script>