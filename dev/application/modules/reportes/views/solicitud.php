<?php
foreach($info as $row){
?>
    <div class="control-group">
        <label class="control-label" for="inputUsuario">Nombres : <?php echo $row['nombre'];?></label> 

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Apellidos : <?php echo $row['apellido'];?></label> 

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Numero Carnet : <?php echo $row['ci'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Direccion : <?php echo $row['direccion'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Actividad : <?php echo $row['actividad'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Numero de Domicilio : <?php echo $row['numero_casa'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Manzana : <?php echo $row['manzana'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">NIT/CI : <?php echo $row['nit'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Telefono : <?php echo $row['telefono'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Celular : <?php echo $row['celular'];?></label>

    </div>

<?php
}
?>