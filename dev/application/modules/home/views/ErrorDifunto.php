<b>Debe Llenar el fomulario de Nuevo Difunto</b>
<br><br>

<table style="width:600px;">
<tr>
<td width="150" align="center"><div id="uno" class="solicitud_off"></div></td>
<td width="150" align="center"><div id="dos" class="formDifunto difunto"></div></td>
<td width="150" align="center"><div id="tres" class="tramite_off"></div></td>
</tr>
<tr>
<td width="150" align="center">Formulario Solicitante</td>
<td width="150" align="center"><b><a href="javascript:void(0);" class="formDifunto">Formulario Difunto</a></b></td>
<td width="150" align="center">Formulario Tramite</td>
</tr>
</table>

<script>

$('.formDifunto').click(function(){
 $('#myModalAddForm').modal('hide');
  $('.loading').show();
    //var urlInfo = base_url + "home/showFormDifunto/";
	var urlInfo = base_url + "home/showFormDifunto/"+<?php echo $id;?>+"/"+<?php echo $form;?>+"/"+<?php echo $pag;?>;
        $("#contentDemoM").load(urlInfo, function () {
           
            $('#myModalError').modal('show');
            $('#myModalError #myModalLabel').html("Registro Difunto");
             $('.loading').hide();
        });
});

</script>