<?php
$countIngresosNicho = 0;
$countExhumacionNicho = 0;
$countLapidaNicho = 0;
$countRenovacionNicho = 0;
$countCremacionNicho = 0;

foreach ($nichos as $valor) {
    if ($valor['tramite'] == "Nicho Enterratorio" || $valor['tramite'] == "Nicho Perpetuidad" || $valor['tramite'] == "Anexion Nicho Perpetuidad") {
        $countIngresosNicho = $countIngresosNicho + 1;
    }

    if ($valor['tramite'] == "Colocacion de Lapida") {
        $countLapidaNicho = $countLapidaNicho + 1;
    }

    if ($valor['tramite'] == "Exhumacion") {
        $countExhumacionNicho = $countExhumacionNicho + 1;
    }

    if (utf8_decode($valor['tramite']) == "Renovacion de 1 a�o para Nichos") {
        $countRenovacionNicho = $countRenovacionNicho + 1;
    }

    if ($valor['tramite'] == "Cremacion") {
        $countCremacionNicho = $countCremacionNicho + 1;
    }
    
   // echo $valor['tramite']."<br>";
}


?>
<!--
<div style="padding:10px;">
    <table width="420" style="float: left; margin-bottom: 10px;" border="1" class="cont" cellpadding="0" cellspacing="0">
        <tr>
            <td width="218" class="title">Bloque Nichos </td>
            <td width="196" class="title">Cantidad</td>
        </tr>
        <tr>
            <td width="218" class="contT">Ingresos de Nichos:</td>
            <td width="196" class="contT"><?php echo $countIngresosNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Exumacion Nichos:</td>
            <td width="196" class="contT"><?php echo $countExhumacionNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Colocacion lapida:</td>
            <td width="196" class="contT"><?php echo $countLapidaNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Cremacion:</td>
            <td width="196" class="contT"><?php echo $countCremacionNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Renovacion:</td>
            <td width="196" class="contT"><?php echo $countRenovacionNicho; ?></td>
        </tr>
    </table>

    <table width="420" border="1"  style="float: right; margin-bottom: 10px;" class="cont" cellpadding="0" cellspacing="0">
        <tr>
            <td width="208" class="title">Bloque Mausoleos</td>
            <td width="206" class="title">Cantidad</td>
        </tr>
        <tr>
            <td width="208" class="contT">Ingresos de Nichos:</td>
            <td width="206" class="contT"><?php echo $countIngresosNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Exumacion Nichos:</td>
            <td width="206" class="contT"><?php echo $countExhumacionNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Colocacion lapida:</td>
            <td width="206" class="contT"><?php echo $countLapidaNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Cremacion:</td>
            <td width="206" class="contT"><?php echo $countCremacionNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Renovacion:</td>
            <td width="206" class="contT"><?php echo $countRenovacionNicho; ?></td>
        </tr>
    </table>
</div>

<div style="padding:10px;">
    <table width="420" style="float: left; margin-bottom: 10px;" border="1" class="cont" cellpadding="0" cellspacing="0">
        <tr>
            <td width="218" class="title">Bloque Sitios </td>
            <td width="196" class="title">Cantidad</td>
        </tr>
        <tr>
            <td width="218" class="contT">Ingresos de Nichos:</td>
            <td width="196" class="contT"><?php echo $countIngresosNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Exumacion Nichos:</td>
            <td width="196" class="contT"><?php echo $countExhumacionNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Colocacion lapida:</td>
            <td width="196" class="contT"><?php echo $countLapidaNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Cremacion:</td>
            <td width="196" class="contT"><?php echo $countCremacionNicho; ?></td>
        </tr>
        <tr>
            <td width="218" class="contT">Renovacion:</td>
            <td width="196" class="contT"><?php echo $countRenovacionNicho; ?></td>
        </tr>
    </table>

    <table width="420" border="1"  style="float: right; margin-bottom: 10px;" class="cont" cellpadding="0" cellspacing="0">
        <tr>
            <td width="208" class="title">Bloque Crematorios</td>
            <td width="206" class="title">Cantidad</td>
        </tr>
        <tr>
            <td width="208" class="contT">Ingresos de Nichos:</td>
            <td width="206" class="contT"><?php echo $countIngresosNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Exumacion Nichos:</td>
            <td width="206" class="contT"><?php echo $countExhumacionNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Colocacion lapida:</td>
            <td width="206" class="contT"><?php echo $countLapidaNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Cremacion:</td>
            <td width="206" class="contT"><?php echo $countCremacionNicho; ?></td>
        </tr>
        <tr>
            <td width="208" class="contT">Renovacion:</td>
            <td width="206" class="contT"><?php echo $countRenovacionNicho; ?></td>
        </tr>
    </table>
</div>

<br><br>-->
    <?php
								foreach($tramite as $row){
									?>
								<tr class="odd gradeX">
									<td class="hidden-phone"><?php echo $row['tramite'];?></td>
									<td class="hidden-phone"><?php //echo $row['clase'];?></td>
									<td class="hidden-phone"><?php echo $row['clase'];?></td>
									<td class="hidden-phone"><?php echo $row['tipo_nicho'];?></td>
									<td class="hidden-phone"><?php echo $row['nro_nicho'];?></td>
									<td class="hidden-phone"><?php echo $row['bloque'];?></td>
									<td class="hidden-phone"><?php echo $row['bloque_nombre'];?></td>
									<td class="hidden-phone"><?php $caras =  array("Norte", "Sud", "Este", "Oeste"); echo $caras[$row['lado']-1];?></td>
									<td class="hidden-phone"><?php echo $row['costo'];?></td>
									<td class="hidden-phone"><?php echo "3.00";?></td>
									<td class="hidden-phone"><?php //echo $row[''];?></td>
								</tr>
								<?php
								}
								?>