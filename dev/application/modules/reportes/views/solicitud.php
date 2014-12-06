<?php
foreach($info as $row){
?>
<table>
<tr>
  <td width="241" bgcolor="#f8f8f8"><strong>Nombres</strong></td>
  <td width="193" bgcolor="#f8f8f8"><strong><?php echo $row['nombre'];?></strong></td>
</tr>
 
<tr>
  <td><strong>Apellidos</strong></td>
  <td><?php echo $row['apellido'];?></td>
</tr>
 
<tr>
  <td bgcolor="#f8f8f8"><strong>Numero Carnet</strong></td>
  <td bgcolor="#f8f8f8"><?php echo $row['ci'];?></td>
</tr>
 
<tr>
  <td><strong>Direccion</strong></td>
  <td><?php echo $row['direccion'];?></td>
</tr>

<tr>
  <td bgcolor="#f8f8f8"><strong>Actividad</strong></td>
  <td bgcolor="#f8f8f8"><?php echo $row['actividad'];?></td>
</tr>

<tr>
  <td><strong>Numero de Domicilio</strong></td>
  <td><?php echo $row['numero_casa'];?></td>
</tr>

<tr>
  <td bgcolor="#f8f8f8"><strong>Manzana</strong></td>
  <td bgcolor="#f8f8f8"><?php echo $row['manzana'];?></td>
</tr>

<tr>
  <td><strong>NIT/CI</strong></td>
  <td><?php echo $row['nit'];?></td>
</tr>

<tr>
  <td bgcolor="#f8f8f8"><strong>Celular</strong></td>
  <td bgcolor="#f8f8f8"><?php echo $row['celular'];?></td>
</tr>

</table>


<?php
}
?>