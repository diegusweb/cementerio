<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$filename);
header("Pragma: no-cache");
header("Expires: 0");
?>
<h1 id="page"><?php echo $title ?></h1>
<br class="clearfloat" />
 <table class="table table-striped table-bordered" id="sample_1">
        <thead>
            <tr>
                <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Nombre</div></th>
				<th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Difunto</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Concepto</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">F. Tramite</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Responsable</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Clase</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Cuerpo</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Nicho </div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Tipo</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Bloque</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Lado</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Monto</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">R.Boleta</div></th>
        <th bgcolor="#32c2cd" class="hidden-phone titl"><div align="center">Total</div></th>


        </tr>
        </thead>
        <tbody class="">
            <?php
            foreach ($tramite as $row) {
                ?>
                <tr class="odd gradeX">
                    <td class="hidden-phone"><?php echo $row['nombre'] . " " . $row['apellido']; ?></td>
                                                             <td class="hidden-phone"><?php echo $row['nombre_difunto'] ?></td>
                    <td class="hidden-phone"><?php echo utf8_decode($row['tramite']); ?></td>
                    <td class="hidden-phone"><?php echo ($row['nro_nicho'] > 0) ? $row['fecha_tramite_nicho'] : $row['fecha_tramite']; ?></td>
                    <td class="hidden-phone"><?php echo $row['user_nombre'] . " " . $row['user_apellido']; ?></td>
                    <td class="hidden-phone"><?php echo $row['clase']; ?></td>
                    <td class="hidden-phone"><?php echo $row['tipo_nicho']; ?></td>
                    <td class="hidden-phone"><?php echo ($row['nro_nicho'] > 0) ? $row['nro_nicho'] : ""; ?></td>
                    <td class="hidden-phone"><?php echo $row['bloque']; ?></td>
                    <td class="hidden-phone"><?php echo $row['bloque_nombre']; ?></td>
                    <td class="hidden-phone"><?php
                        $caras = array("Norte", "Sud", "Este", "Oeste");
                        echo ($row['lado'] > 0) ? $caras[$row['lado'] - 1] : "";
                        ?></td>
                    <td class="hidden-phone"><?php echo $row['costo']; ?></td>
                    <td class="hidden-phone"><?php echo "3.00" ?></td>
                    <td class="hidden-phone"><?php echo $row['costo'] + 3.00; ?></td>
                   <!-- <td class="hidden-phone"><?php echo ($row['bloque'] == "Mausoleo")?"0.00":"3.00"; ?></td>
                    <td class="hidden-phone"><?php echo ($row['bloque'] != "Mausoleo")?($row['costo'] + 3.00):$row['costo']; ?></td>-->
                    <td class="hidden-phone"><a href="#" class="showSolicitante" onClick="showSolicitante(<?php echo $row['id_solicitante']; ?>)">Solicitud</a></td>
                    <td class="hidden-phone"><a href="#" class="showDifunto" onClick="showDifunto(<?php echo $row['id_difunto']; ?>)">Difunto</a></td>
                    <td class="hidden-phone"><a href="<?php echo base_url()."home/comprobante/".$row['id_tramite']?>" >Boleta</a></td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>