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

<table width="600" border="1" class="cont" cellpadding="0" cellspacing="0">
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
<table width="600" border="1"  class="cont"  cellpadding="0" cellspacing="0">
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
<table width="600" border="1" class="cont"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="167" class="title">CODIGO CUENTA</td>
    <td width="421" class="title">CONCEPTO</td>
    <td width="254" class="title">IMPORTE Bs.</td>
  </tr>
  <tr>
    <td class="contT">&nbsp;</td>
    <td class="contT"><p align="center">CEMENTERIO.- Pago por concepto de</p>
      <p align="center"><?php echo $tramite[0]['tramite']?></p>
      <p align="center"><?php echo $tramite[0]['clase']?></p>
      <p align="center">Cuerpo: <?php echo $tramite[0]['tipo_nicho']?></p>
      <p align="center">Numero Nicho: <?php echo $tramite[0]['nro_nicho']?></p>
      <p align="center">Bloque: <?php echo $tramite[0]['bloque']?></p>
      <p align="center">Lado: <?php  $caras =  array("Norte", "Sud", "Este", "Oeste"); echo $caras[$tramite[0]['lado']-1]?></p>
      <p align="center">Difunto (a): <?php echo $tramite[0]['nombreCompletoFallecido']?></p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p></td>
    <td valign="top" class="contT"><?php echo $tramite[0]['costo']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="title">REPOSICION DE COMPROBANTE:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right" >TOTAL Bs.</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>SON:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
