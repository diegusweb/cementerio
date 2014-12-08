<style>
    .title{
        font-size: 12px;
        color: #fff;
        background-color: #05B2D2;
        padding-left: 5px;
        text-align:center;
    }

    .cont{
        font-size: 13px;
        border-radius:10px;
    }

    .contT{
        background-color:"#f8f8f8";
        padding-left: 5px;

    }


</style>

<div id="marco" style="margin: 0 auto; width:812.5px; height:699.2px;">
    <div style="margin: 0 auto; width:604.7px;">
        <div style="text-align:left;">
            VALLE HERMOSO
            <br>
            UNIDAD CEMENTERIO
            <br>
            Calle final Bolivar acera este
        </div>

        <p><h4  style="width:604.7px;; text-align: center; padding-top:25px; padding-bottom:25px;">COMPROBANTE<h4/></p>
    </div>
    <div id="save-form" style="margin: 0 auto; width:604.7px; height:566.9px;">
<!-- border: 1px solid #333; -->
        <div style=" width:588px; height:125px; padding:6px;  font-size: 14px; border-radius:10px; margin-bottom: 10px;" class="cont">
            <div style="float:left; border: 1px solid #333; width:150px; height:50px; border-radius:10px;">
                <div style="font-size: 12px; text-align: center;">Nro.  CARNET</div>
                <div><?php echo $tramite[0]['ci'] ?></div>
            </div>
            <div style="float:right; border: 1px solid #333; width:420px; height:50px; border-radius:10px;">
                <div style="font-size: 12px; text-align: center;">NOMBRE Y APELLIDO O RAZON SOCIAL</div>
                <div><?php echo $tramite[0]['nombre'] . " " . $tramite[0]['apellido'] ?></div>
            </div>
            <div style="margin-bottom: 10px;  clear: both;"></div>
            <table width="590" border="1" style="font-size: 12px;"  cellpadding="0" cellspacing="0">
                <tr>
                    <td width="80" style="font-size: 12px;">DIRECCION</td>
                    <td width="200" class="contT"><?php echo $tramite[0]['direccion'] ?></td>
                    <td width="70" style="font-size: 12px;">NRO. CASA</td>
                    <td width="80" class="contT"><?php echo $tramite[0]['numero_casa'] ?></td>
                    <td width="80" style="font-size: 12px;">TELEFONO(S)</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;">ACTIVIDAD</td>
                    <td class="contT"><?php echo $tramite[0]['actividad'] ?></td>
                    <td style="font-size: 12px;">MANZANA</td>
                    <td class="contT"><?php echo $tramite[0]['manzana'] ?></td>
                    <td style="font-size: 12px;"><?php echo $tramite[0]['telefono'] ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="font-size: 12px;">NIT/CI</td>
                    <td class="contT"><?php echo $tramite[0]['nit'] ?></td>
                    <td class="contT"><?php echo $tramite[0]['celular'] ?></td>
                </tr>
            </table>
        </div>

        <p>HA EFECTUADO EL SIGUIENTE PAGO:</p>
        <table width="604.7" border="1" class="cont"  cellpadding="0" cellspacing="0">
            <tr>
                <td width="167" style="font-size: 12px; text-align: center;">CODIGO CUENTA</td>
                <td width="461" style="font-size: 12px; text-align: center;">CONCEPTO</td>
                <td width="254" style="font-size: 12px; text-align: center;">IMPORTE Bs.</td>
            </tr>
            <tr>
                <td class="contT" valign="top" style="padding: 20px;"><?php echo "15100";//$tramite[0]['id_tramite'] ?></td>
                <td class="contT">
                    <span  align="center">CEMENTERIO.- Pago por concepto de</span><br>
                    <span align="center"><?php echo $tramite[0]['tramite'] ?></span><br>
                    <span align="center"><?php echo $tramite[0]['clase'] ?></span><br>
                    <span align="center">Cuerpo: <?php echo $tramite[0]['tipo_nicho'] ?></span><br>
                    <?php
                    if ($tramite[0]['nro_nicho'] > 0) {
                        echo " <span align='center'>Numero Nicho: " . $tramite[0]['nro_nicho']."</span><br>";
                    }
                    ?>
                    <span align="center">Bloque: <?php echo $tramite[0]['bloque_nombre'] ?></span><br>
                    <?php
                    $caras = array("Norte", "Sud", "Este", "Oeste");
                    if (!empty($tramite[0]['lado'])) {
                        echo " <span align='center'>Lado: " . $caras[$tramite[0]['lado'] - 1]."</span>";
                    }
                    ?> </p>
                    <span align="center">Difunto (a): <?php echo $tramite[0]['nombreCompletoFallecido'] ?></span><br>

                </td>
                <td valign="top" class="contT" id="testIn"  style="padding: 20px;"><?php echo $tramite[0]['costo'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 12px; text-align: center;">REPOSICION DE COMPROBANTE:</td>
                <td class="contT" style="padding-left: 30px;">3.00</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><div align="right" >TOTAL Bs.</div></td>
                <td><div class="costoTotal contT" style="padding-left: 30px;"></div></td>
            </tr>
            <tr>
                <td class="contT">SON:</td>
                <td><div class="totalLetras contT"></div></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br/>
    </div>
</div>
<!--<button type="button" id="saveComprobante" class="btn btn-primary btn-lg" aria-label="Left Align">
  Verifica para guardar los Datos de Comprobante
</button>-->



<script>
    $('#imprimirView').show();

    var costo = <?php echo $tramite[0]['costo'] ?>;
    var total = (costo + 3.00);

    var datos = {letras: total};

    $('.costoTotal').html(total);
    $('.formTotal').val(total);

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() . "home/conertirLetras"; ?>",
        data: datos,
        success: function (msg) {
            if (msg != null) {
                $('.totalLetras').html(msg);
                $('.formTotalLiteral').val(msg);
            }
        },
        error: function (msg) {
            alert("Error");
        }
    });

    $('#saveComprobante').click(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . "home/AddTramiteNichosss"; ?>",
            data: $('#save-form').serialize(),
            success: function (msg) {
                if (msg > 0) {
                    alert("Correcto");
                }
            },
            error: function (msg) {
                alert("Error");
            }
        });
    });

    function imprimir() {
        var objeto = document.getElementById('marco');  //obtenemos el objeto a imprimir
        var ventana = window.open('', '_blank');  //abrimos una ventana vacía nueva
        ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
        ventana.document.close();  //cerramos el documento
        ventana.print();  //imprimimos la ventana
        ventana.close();  //cerramos la ventana
    }

</script>