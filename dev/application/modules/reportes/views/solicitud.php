<?php
foreach($info as $row){
?>
<table>
<tr>
  <td><strong>Nombres</strong></td>
  <td><strong><?php echo $row['nombre'];?></strong></td>
</tr>
 
<tr>
  <td>Apellidos</td>
  <td><?php echo $row['apellido'];?></td>
</tr>
 
<tr>
  <td>Numero Carnet</td>
  <td><?php echo $row['ci'];?></td>
</tr>
 
<tr>
  <td>Direccion</td>
  <td><?php echo $row['direccion'];?></td>
</tr>

<tr>
  <td>Actividad</td>
  <td><?php echo $row['actividad'];?></td>
</tr>

<tr>
  <td>Numero de Domicilio</td>
  <td><?php echo $row['numero_casa'];?></td>
</tr>

<tr>
  <td>Manzana</td>
  <td><?php echo $row['manzana'];?></td>
</tr>

<tr>
  <td>NIT/CI</td>
  <td><?php echo $row['nit'];?></td>
</tr>

<tr>
  <td>Celular</td>
  <td><?php echo $row['celular'];?></td>
</tr>

</table>



<?php
}
?>