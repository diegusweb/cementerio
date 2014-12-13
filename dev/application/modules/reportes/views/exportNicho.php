<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$filename);
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>Reporte Nichos</h3>
<br>
<?php
$caras = array("Norte", "Sud", "Este", "Oeste");

foreach ($bloque as $row) {
    echo "<span style='color:#ff0000'><b><i><u>" . $row['nombre'] . "</span></u></i></b><br>";
    for ($j = 1; $j <= $row['numero_piso']; $j++) {
        echo "<b style='color:#35aa47'><i>Piso " . $j . "</i></b><br>";

        for ($i = 1; $i <= $row['numero_caras']; $i++) {

            echo "<b style='color:darkorchid'>Lado " . $caras[$i - 1] . "</b><br>";
            echo "<b>Nichos Libres" . "</b><br>";
            foreach ($nicho as $rowa) {
                if ($j == $rowa['piso']) {
                    if ($i == $rowa['cara']) {
                        if ($row['id_bloque_nicho'] == $rowa['id_bloque']) {
                            if ($rowa['estado'] == "Libre") {
                                echo $rowa['nicho'] . ", ";
                            }
                        }
                    }
                }
            }
            echo "<br><b>Nichos Ocupados</b>" . "<br>";
            foreach ($nicho as $rowa) {
                if ($j == $rowa['piso']) {
                    if ($i == $rowa['cara']) {
                        if ($row['id_bloque_nicho'] == $rowa['id_bloque']) {
                             if ($rowa['estado'] == "Ocupado" || $rowa['estado'] == "Renovar" || $rowa['estado'] == "Perpetuidad" || $rowa['estado'] == "Renovado") {
                                echo $rowa['nicho'] . ", ";
                            }
                        }
                    }
                }
            }
            echo "<br><br>";
        }
    }
}
?>