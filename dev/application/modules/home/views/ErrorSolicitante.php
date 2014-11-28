<b>Debe Llenar el fomulario de Solicitante para empezar</b>
<br><br>
<!--<b><a href="javascript:void(0);" class="formSolicitante">Formulario Solicitante</a></b>-->

<table style="width:600px;">
<tr>
<td width="150" align="center"><div id="uno" class="solicitud"></div></td>
<td width="150" align="center"><div  id="dos" class="difunto_off"></div></td>
<td width="150" align="center"><div  id="tres" class="tramite_off"></div></td>
</tr>
<tr>
<td width="150"><div align="center"><b><a href="javascript:void(0);" class="formSolicitante">Formulario Solicitante</a></b></div></td>
<td width="150"><div align="center">Formulario Difunto</div></td>
<td width="150"><div align="center">Formulario Tramite</div></td>
</tr>
</table>

<script>


$('.formSolicitante').click(function(){
 $('#myModalAddForm').modal('hide');
  $('.loading').show();
    var urlInfo = base_url + "home/showFormSolicitante/";
        $("#contentDemoSol").load(urlInfo, function () {
            $('.loading').hide();
            $('#myModalAddSolicitante').modal('show');
        });
});

</script>