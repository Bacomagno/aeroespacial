$(document).ready(function() {
    $('#prospectos').DataTable();
} );


// Funcion: Validar filtro de fechas de publicacion
$("#buscarfecha").click(function(){

    var fechaini = new Date(($("input[name='fechaini']").val()));
    var fechafin = new Date(($("input[name='fechafin']").val()));
    if(fechaini.getTime() > fechafin.getTime()){
        Swal.fire( {
            icon: 'error',
            text: 'la fecha fin es inferior a la fecha de inicio !!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
    }else if (!($("input[name='fechafin']").val()) && ($("input[name='fechaini']").val())){
        Swal.fire( {
            icon: 'error',
            text: 'Validar fecha fin!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
    }else if (($("input[name='fechafin']").val()) && !($("input[name='fechaini']").val())){
        Swal.fire( {
            icon: 'error',
            text: 'Validar fecha inicio!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
    }else if (!($("input[name='fechafin']").val()) && !($("input[name='fechaini']").val())){
        Swal.fire( {
            icon: 'error',
            text: 'Validar fechas!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
    }

});

// Funcion: Limpiar el filtro de fechas
$("#limpiarfecha").click(function(){
    document.getElementById('prospectos_fechas').reset();
    $(location).attr('href','prospectos');
})
