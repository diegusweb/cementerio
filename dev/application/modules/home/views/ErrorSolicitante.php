<b>Debe Llenar el fomulario de Solicitante para empezar</b>
<br><br>
<b><a href="javascript:void(0);" class="formSolicitante">Formulario Solicitante</a></b>


<script>

$('.formSolicitante').click(function(){
 $('#myModalAddForm').modal('hide');
    var urlInfo = base_url + "home/showFormSolicitante/";
        $("#contentDemoSol").load(urlInfo, function () {
           
            $('#myModalAddSolicitante').modal('show');
        });
});

</script>