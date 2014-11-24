<style>
    .title{
        font-size: 13px;
        color: #fff;
        background-color: #05B2D2;
        padding-left: 5px;
    }
    
    .cont{
        font-size: 14px;
    }
    
    .contT{
        background-color:"#f8f8f8";
         padding-left: 5px;
        
    }
</style>




<p><h4>COMPROBANTE INGRESO<h4/></p>
<form method="POST">

<table width="640" border="1" class="cont" cellpadding="0" cellspacing="0">
  <tr>
      <td width="196" class="title">Nro.  CARNET</td>
    <td width="475" class="title">NOMBRE Y APELLIDO O RAZON SOCIAL</td>
  </tr>
  <tr>
    <td class="contT"><input type="hidden" name="ci" value="<?php echo $tramite[0]['ci']?>"><?php echo $tramite[0]['ci']?></td>
    <td class="contT"><input type="hidden" name="nombreCompleto" value="<?php echo $tramite[0]['nombre']." ".$tramite[0]['apellido']?>"><?php echo $tramite[0]['nombre']." ".$tramite[0]['apellido']?></td>
  </tr>
  </table>
<p>&nbsp;</p>
<table width="640" border="1"  class="cont"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="87" class="title">DIRECCION</td>
    <td width="183" class="contT"><input type="hidden" name="direccion" value="<?php echo $tramite[0]['direccion']?>"><?php echo $tramite[0]['direccion']?></td>
    <td width="103" class="title">NRO. CASA</td>
    <td width="178" class="contT"><input type="hidden" name="numero_casa" value="<?php echo $tramite[0]['numero_casa']?>"><?php echo $tramite[0]['numero_casa']?></td>
    <td width="219" class="title">TELEFONO(S)</td>
  </tr>
  <tr>
    <td class="title">ACTIVIDAD</td>
    <td class="contT"><input type="hidden" name="actividad" value="<?php echo $tramite[0]['actividad']?>"><?php echo $tramite[0]['actividad']?></td>
    <td class="title">MANZANA</td>
    <td class="contT"><input type="hidden" name="manzana" value="<?php echo $tramite[0]['manzana']?>"><?php echo $tramite[0]['manzana']?></td>
    <td class="contT"><input type="hidden" name="telefono" value="<?php echo $tramite[0]['telefono']?>"><?php echo $tramite[0]['telefono']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="title">NIT/CI</td>
    <td class="contT"><input type="hidden" name="nit" value="<?php echo $tramite[0]['nit']?>"><?php echo $tramite[0]['nit']?></td>
    <td class="contT"><input type="hidden" name="celular" value="<?php echo $tramite[0]['celular']?>"><?php echo $tramite[0]['celular']?></td>
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
    <td class="contT">&nbsp;</td>
    <td class="contT"><p align="center">CEMENTERIO.- Pago por concepto de</p>
      <p align="center"><input type="hidden" name="tramite" value="<?php echo $tramite[0]['tramite']?>"><?php echo $tramite[0]['tramite']?></p>
      <p align="center"><input type="hidden" name="clase" value="<?php echo $tramite[0]['clase']?>"><?php echo $tramite[0]['clase']?></p>
      <p align="center">Cuerpo: <input type="hidden" name="tipo_nicho" value="<?php echo $tramite[0]['tipo_nicho']?>"><?php echo $tramite[0]['tipo_nicho']?></p>
      <p align="center">Numero Nicho: <input type="hidden" name="nro_nicho" value="<?php echo $tramite[0]['nro_nicho']?>"><?php echo $tramite[0]['nro_nicho']?></p>
      <p align="center">Bloque: <input type="hidden" name="bloque" value="<?php echo $tramite[0]['bloque']?>"><?php echo $tramite[0]['bloque']?></p>
      <p align="center">Lado: <?php  $caras =  array("Norte", "Sud", "Este", "Oeste"); echo $caras[$tramite[0]['lado']-1]?> <input type="hidden" name="lado" value="<?php echo $caras[$tramite[0]['lado']-1]?>"></p>
      <p align="center">Difunto (a): <input type="hidden" name="nombreCompletoFallecido" value="<?php echo $tramite[0]['nombreCompletoFallecido']?>"><?php echo $tramite[0]['nombreCompletoFallecido']?></p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p></td>
    <td valign="top" class="contT" id="testIn"><input type="hidden" name="costo" value="<?php echo $tramite[0]['costo']?>"><?php echo $tramite[0]['costo']?></td>
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
    <td>SON:</td>
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
<button type="button" id="saveComprobante" class="btn btn-primary btn-lg" aria-label="Left Align">
  Guardas Datos de Comprobante de Ingreso
</button>
<form>
<script>


var costo= <?php echo $tramite[0]['costo']?>;
var total = (costo + 3.20);
	
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

</script>