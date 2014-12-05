<?php
foreach($info as $row){
?> 
<table>
<tr>
  <td><strong>Oficialia</strong></td>
  <td><strong><?php echo $row['oficialia'];?></strong></td>
</tr>
 
<tr>
  <td>Libro</td>
  <td><?php echo $row['libro'];?></td>
</tr>
 
<tr>
  <td>Partida</td>
  <td><?php echo $row['partida'];?></td>
</tr>
 
<tr>
  <td>Folio Nro.</td>
  <td><?php echo $row['folioNum'];?></td>
</tr>

<tr>
  <td>Departamento</td>
  <td><?php echo $row['departamento'];?></td>
</tr>

<tr>
  <td>Provincia</td>
  <td><?php echo $row['provincia'];?></td>
</tr>

<tr>
  <td>Localidad</td>
  <td><?php echo $row['localidad'];?></td>
</tr>

<tr>
  <td>Con Fecha de partida</td>
  <td><?php echo $row['fechaPartida'];?></td>
</tr>
<tr>
  <td>Informacion Difuntoo</td>
  <td style="border-bottom :1px solid #333; font-size:14px;"></td>
</tr>
<tr>
  <td>Nombre y Apellido</td>
  <td><?php echo $row['nombreCompletoFallecido'];?></td>
</tr>
<tr>
  <td>Edad Fallecido</td>
  <td><?php echo $row['edadFallecido'];?></td>
</tr>
<tr>
  <td>Fecha y Hora</td>
  <td><?php echo $row['fechaFallecido'];?></td>
</tr>
<tr>
  <td>En localidad</td>
  <td><?php echo $row['localidadFallecido'];?></td>
</tr>
<tr>
  <td>Provincia</td>
  <td><?php echo $row['provinciaFallecido'];?></td>
</tr>
<tr>
  <td>Departamento</td>
  <td><?php echo $row['departamentoFallecido'];?></td>
</tr>
<tr>
  <td>Pais</td>
  <td><?php echo $row['paisFallecido'];?></td>
</tr>
<tr>
  <td>Comprobante de fallecimiento</td>
  <td><?php echo $row['comprobante'];?></td>
</tr><tr>
  <td>Nro Matricula o CI</td>
  <td><?php echo $row['matricula_ci'];?></td>
</tr>
</table>


<?php
}
?>


