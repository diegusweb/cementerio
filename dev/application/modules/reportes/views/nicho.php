<script>
    function imprimir() {
        var objeto = document.getElementById('marco');  //obtenemos el objeto a imprimir
        var ventana = window.open('', '_blank');  //abrimos una ventana vacía nueva
        ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
        ventana.document.close();  //cerramos el documento
        ventana.print();  //imprimimos la ventana
        ventana.close();  //cerramos la ventana
    }

</script>
<A id="imprimir" href="#" onclick="imprimir();" class="btn btn-success btn-lg active">Imprimir Reporte Nichos</a></td>

<div id="marco">

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
</div>