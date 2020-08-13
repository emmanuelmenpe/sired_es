$(function() {
    $('#equipoL').on('change', showVisitante);
});

function showVisitante() {
    var id_local = $(this).val();

    //ajax
    $.get('/equipo/'+id_local+'/local', function (data){
        var equipoV = '<option value="">-</option>';
        for (var i = 0; i < data.length; i++) {
            equipoV += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
           
        }
        // console.log(equipoL);
        $('#equipoV').html(equipoV);
    });
}