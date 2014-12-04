<?php
foreach($info as $row){
?> 
<div class="control-group">
        <label class="control-label" for="inputUsuario">Oficialia : <?php echo $row['oficialia'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Libro: <?php echo $row['libro'];?></label>

    </div>
     <div class="control-group">
        <label class="control-label" for="inputPassword">Partida: <?php echo $row['partida'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Folio Nro.: <?php echo $row['folioNum'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Departamento: <?php echo $row['departamento'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Provincia: <?php echo $row['provincia'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Localidad: <?php echo $row['localidad'];?></label>

    </div>
	<div class="control-group">
        <label class="control-label" for="inputPassword">Con Fecha de partida: <?php echo $row['fechaPartida'];?></label>

    </div>
	<br/>
    <div style="border-bottom :1px solid #333; font-size:14px;"><b>Informacion Difunto</b></div>
	<br/>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Nombre y Apellido : <?php echo $row['nombreCompletoFallecido'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Edad Fallecido : <?php echo $row['edadFallecido'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Fecha y Hora : <?php echo $row['fechaFallecido'];?></label>


    </div>
     <div class="control-group">
        <label class="control-label" for="inputPassword">En localidad : <?php echo $row['localidadFallecido'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Provincia : <?php echo $row['provinciaFallecido'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Departamento : <?php echo $row['departamentoFallecido'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Pais : <?php echo $row['paisFallecido'];?></label>

    </div>

    <div class="control-group">
        <label class="control-label" for="inputPassword">Comprobante de fallecimiento : <?php echo $row['comprobante'];?></label>

    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Nro Matricula o CI : <?php echo $row['matricula_ci'];?></label>

    </div>
	<br/>

<?php
}
?>


