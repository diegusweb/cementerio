<b>Debe Llenar el fomulario de Solicitante</b>
<br><br>
<b><a href="#" class="formSolicitante">Formulario Solicitante</a></b>

<?php
echo "----".$this->session->userdata('id_solicitante');
?>
<script>

$('.formSolicitante').click(function(){
 $('#myModalAddForm').modal('hide');
    var urlInfo = base_url + "home/showFormSolicitante/";
        $("#contentDemoSol").load(urlInfo, function () {
           
            $('#myModalAddSolicitante').modal('show');
        });
});

</script>