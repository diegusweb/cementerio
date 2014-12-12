<b>Debe Llenar el fomulario de Nuevo Difunto</b>
<br><br>

<table style="width:600px;">
<tr>
<td width="150" align="center"><div id="uno" class="solicitud_off"></div></td>
<td width="150" align="center"><div id="dos" class="formDifunto difunto_off"></div></td>
<td width="150" align="center"><div id="tres" class="tramite"></div></td>
</tr>
<tr>
<td width="150" align="center">Formulario Solicitante</td>
<td width="150" align="center">Formulario Difunt</td>
<td width="150" align="center"><b><a href="javascript:void(0);" class="formDifunto">Formulario Tramiteo</a></b></td>
</tr>
</table>

<script>

$('.formDifunto').click(function(){
 $('#myModalAddForm').modal('hide');
  $('.loading').show();
    var urlInfo = base_url + "home/showFormDifunto/";
        $("#contentDemoDif").load(urlInfo, function () {
           
            $('#myModalAddDifuncto').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
             $('.loading').hide();
        });
});

</script>