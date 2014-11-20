<b>Debe Llenar el fomulario de Nuevo Difunto</b>
<br><br>
<b><a href="#" class="formDifunto">Formulario Difunto</a></b>

<script>

$('.formDifunto').click(function(){
 $('#myModalAddForm').modal('hide');
    var urlInfo = base_url + "home/showFormDifunto/";
        $("#contentDemoDif").load(urlInfo, function () {
           
            $('#myModalAddDifuncto').modal('show');
        });
});

</script>