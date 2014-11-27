<b>Debe Llenar el fomulario de Solicitante para empezar</b>
<br><br>
<!--<b><a href="javascript:void(0);" class="formSolicitante">Formulario Solicitante</a></b>-->

<table style="width:600px;">
<tr>
<td width="150"><div id="uno" class="solicitud"></div></td>
<td width="150"><div id="dos" class="difunto_off"></div></td>
<td width="150"><div id="tres" class="tramite_off"></div></td>
</tr>
<tr>
<td width="150"><b><a href="javascript:void(0);" class="formSolicitante">Formulario Solicitante</a></b></td>
<td width="150">Formulario Difunto</td>
<td width="150">Formulario Tramite</td>
</tr>
</table>

<script>

var soli = <?php echo $this->session->userdata('id_solitantes');?>;
var dif = <?php echo $this->session->userdata('id_difuntos');?>;



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