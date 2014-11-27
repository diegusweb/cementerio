<b>Debe Llenar el fomulario de Nuevo Difunto</b>
<br><br>

<table style="width:600px;">
<tr>
<td width="150"><div id="uno" class="solicitud_off"></div></td>
<td width="150"><div id="dos" class="formDifunto difunto"></div></td>
<td width="150"><div id="tres" class="tramite_off"></div></td>
</tr>
<tr>
<td width="150">Formulario Solicitante</td>
<td width="150"><b><a href="javascript:void(0);" class="formDifunto">Formulario Difunto</a></b></td>
<td width="150">Formulario Tramite</td>
</tr>
</table>

<script>

$('.formDifunto').click(function(){
 $('#myModalAddForm').modal('hide');
  $('.loading').show();
    var urlInfo = base_url + "home/showFormDifunto/";
        $("#contentDemoDif").load(urlInfo, function () {
           
            $('#myModalAddDifuncto').modal('show');
             $('.loading').hide();
        });
});

</script>