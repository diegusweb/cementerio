<b>Debe Llenar el fomulario de Nuevo Difunto</b>
<br><br>
<b><a href="javascript:void(0);" class="formDifunto">Formulario Difunto</a></b>

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