<?php
foreach($info as $row){
?> 
<table>
<tr>
  <td width="356"><strong>Oficialia</strong></td>
  <td width="273"><strong><?php echo $row['oficialia'];?></strong></td>
</tr>
 
<tr>
  <td><strong>Libro</strong></td>
  <td><?php echo $row['libro'];?></td>
</tr>
 
<tr>
  <td><strong>Partida</strong></td>
  <td><?php echo $row['partida'];?></td>
</tr>
 
<tr>
  <td><strong>Folio Nro.</strong></td>
  <td><?php echo $row['folioNum'];?></td>
</tr>

<tr>
  <td><strong>Departamento</strong></td>
  <td><?php echo $row['departamento'];?></td>
</tr>

<tr>
  <td><strong>Provincia</strong></td>
  <td><?php echo $row['provincia'];?></td>
</tr>

<tr>
  <td><strong>Localidad</strong></td>
  <td><?php echo $row['localidad'];?></td>
</tr>

<tr>
  <td><strong>Con Fecha de partida</strong></td>
  <td><?php echo $row['fechaPartida'];?></td>
</tr>
<tr>
  <td bgcolor="#CCCCCC"><strong>Informacion Difuntoo</strong></td>
  <td bgcolor="#CCCCCC"></td>
</tr>
<tr>
  <td><strong>Nombre y Apellido</strong></td>
  <td><?php echo $row['nombreCompletoFallecido'];?></td>
</tr>
<tr>
  <td><strong>Edad Fallecido</strong></td>
  <td><?php echo $row['edadFallecido'];?></td>
</tr>
<tr>
  <td><strong>Fecha y Hora</strong></td>
  <td><?php echo $row['fechaFallecido'];?></td>
</tr>
<tr>
  <td><strong>En localidad</strong></td>
  <td><?php echo $row['localidadFallecido'];?></td>
</tr>
<tr>
  <td><strong>Provincia</strong></td>
  <td><?php echo $row['provinciaFallecido'];?></td>
</tr>
<tr>
  <td><strong>Departamento</strong></td>
  <td><?php echo $row['departamentoFallecido'];?></td>
</tr>
<tr>
  <td><strong>Pais</strong></td>
  <td><?php echo $row['paisFallecido'];?></td>
</tr>
<tr>
  <td><strong>Comprobante de fallecimiento</strong></td>
  <td><?php echo $row['comprobante'];?></td>
</tr><tr>
  <td><strong>Nro Matricula o CI</strong></td>
  <td><?php echo $row['matricula_ci'];?></td>
</tr>
</table>



<?php
}
?>


