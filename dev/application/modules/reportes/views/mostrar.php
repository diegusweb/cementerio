
<?php 
$countIngresosNicho = 0;
$countExhumacionNicho = 0;
$countLapidaNicho = 0;
$countRenovacionNicho = 0;
$countCremacionNicho = 0;

foreach ($nichos as $valor) {
	if($valor['tramite'] == "Nicho Enterratorio" || $valor['tramite'] =="Nicho Perpetuidad" || $valor['tramite'] =="Anexion Nicho Perpetuidad"){
		$countIngresosNicho = $countIngresosNicho + 1;
	}
	
	if($valor['tramite'] == "Colocacion de Lapida"){
		$countLapidaNicho = $countLapidaNicho + 1;
	}
	
	if($valor['tramite'] == "Exhumacion"){
		$countExhumacionNicho = $countExhumacionNicho + 1;
	}
	
	if(utf8_decode($valor['tramite']) == "Renovacion de 1 año para Nichos"){
		$countRenovacionNicho = $countRenovacionNicho + 1;
	}
	
	if($valor['tramite'] == "Cremacion"){
		$countCremacionNicho = $countCremacionNicho + 1;
	}
	
}

echo count($nichos);
?>
<br><br>
<p>Cantidad de registros</p>

<p>Bloque Nichos</p>



<p>Ingresos de Nichos: <?php echo $countIngresosNicho;?></p>
<p>Exumacion Nichos : <?php echo $countExhumacionNicho;?></p>
<p>Colocacion lapida : <?php echo $countLapidaNicho;?></p>
<p>Cremacion : <?php echo $countCremacionNicho;?></p>
<p>Renovacion : <?php echo $countRenovacionNicho;?></p>
</div>