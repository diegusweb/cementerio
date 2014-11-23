<style>
    .title{
        font-size: 13px;
        color: #F65D20;
        font-weight: bold;
    }
    
    .cont{
        font-size: 14px;
    }
</style>

<table width="600" border="1" class="cont" cellpadding="0" cellspacing="0">
  <tr>
      <td width="196" class="title">Nro.  CARNET</td>
    <td width="475" class="title">NOMBRE Y APELLIDO O RAZON SOCIAL</td>
  </tr>
  <tr>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['ci']?></td>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['nombre']." ".$tramite[0]['apellido']?></td>
  </tr>
  </table>
<p>&nbsp;</p>
<table width="600" border="1"  class="cont"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="87" class="title">DIRECCION</td>
    <td width="183" bgcolor="#f8f8f8"><?php echo $tramite[0]['direccion']?></td>
    <td width="103" class="title">NRO. CASA</td>
    <td width="178" bgcolor="#f8f8f8"><?php echo $tramite[0]['numero_casa']?></td>
    <td width="219" class="title">TELEFONO(S)</td>
  </tr>
  <tr>
    <td class="title">ACTIVIDAD</td>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['actividad']?></td>
    <td class="title">MANZANA</td>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['manzana']?></td>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['telefono']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="title">NIT/CI</td>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['nit']?></td>
    <td bgcolor="#f8f8f8"><?php echo $tramite[0]['celular']?></td>
  </tr>
</table>
<p>HA EFECTUADO EL SIGUIENTE PAGO:</p>
<table width="600" border="1" class="cont"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="167" class="title">CODIGO CUENTA</td>
    <td width="421" class="title">CONCEPTO</td>
    <td width="254" class="title">IMPORTE Bs.</td>
  </tr>
  <tr>
    <td bgcolor="#f8f8f8">&nbsp;</td>
    <td bgcolor="#f8f8f8"><p align="center">CEMENTERIO.- Pago por concepto de</p>
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
    <td valign="top" bgcolor="#f8f8f8"><?php echo $tramite[0]['costo']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="title">REPOSICION DE COMPROBANTE:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right" class="title">TOTAL Bs.</div></td>
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
