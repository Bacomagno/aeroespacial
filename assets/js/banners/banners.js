function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

$(document).ready(function() {
    $('#bannersactivos').DataTable();
} );


// Funcion: Buscar información en la tabla principal
$("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

// Funcion: Validar filtro de fechas de publicacion
$("#buscarfecha").click(function(){
    var forData = new FormData(document.getElementById("banner_fechas"));
    var url = "Banners/bannersactivos";
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

// Funcion: Validar formulario de Crear banner, Envio de data para crear Banner
$("#bannerc").click(function(){
    $("#banner_crear").validate();
    tinyMCE.triggerSave();

    var url = "/bcrear";
    var banner_path =$("input[name='banner_path']").val();
    var banner_nombre =$("#banner_nombre").val();
    var banner_ipublicacion =$("input[name='banner_ipublicacion']").val();
    var banner_fpublicacion =$("input[name='banner_fpublicacion']").val();
    var banner_descripcion =$("textarea[name='banner_descripcion']").val();
    var fechaini = new Date(($("input[name='banner_ipublicacion']").val()));
    var fechafin = new Date(($("input[name='banner_fpublicacion']").val()));

      if (getStats('banner_descripcion').chars < 201) {
      }else{
        Swal.fire( {
            icon: 'error',
            text: 'La descripción debe tener maximo 200 caracteres',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
      }
      if (getStats('banner_nombre').chars < 101) {
      }else{
        Swal.fire( {
            icon: 'error',
            text: 'El Nombre debe tener maximo 100 caracteres',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
      }

      if(!banner_nombre){
          Swal.fire( {
              icon: 'error',
              text: 'Diligenciar el nombre por favor !!!',
              position: 'top',
              showConfirmButton: false,
              timer: 2000
              });
              return false;
      }else if(!banner_ipublicacion){
          Swal.fire( {
              icon: 'error',
              text: 'Diligenciar la fecha de inicio publicación por favor !!!',
              position: 'top',
              showConfirmButton: false,
              timer: 2000
              });
              return false;
      }else if(!banner_fpublicacion){
          Swal.fire( {
              icon: 'error',
              text: 'Diligenciar la fecha de finalización de publicación por favor !!!',
              position: 'top',
              showConfirmButton: false,
              timer: 2000
              });
              return false;
      }else if(!banner_descripcion){
          Swal.fire( {
              icon: 'error',
              text: 'Diligenciar la descripción por favor !!!',
              position: 'top',
              showConfirmButton: false,
              timer: 2000
              });
              return false;
      }else if(fechaini.getTime() > fechafin.getTime()){
          Swal.fire( {
              icon: 'error',
              text: 'La Fecha fin de publicación es inferior a la Fecha inicio de publicación !!',
              position: 'top',
              showConfirmButton: false,
              timer: 2000
          });
          return false;
      }else if(!banner_path){
              Swal.fire( {
                  icon: 'error',
                  text: 'Adjuntar la imagen del banner por favor !!!',
                  position: 'top',
                  showConfirmButton: false,
                  timer: 2000
                  });
                  return false;
          }

    var forData = new FormData(document.getElementById("banner_crear"));

    $.ajax({
        type: "POST",
        url: url,
        data: forData,
        contentType: false,
        processData: false,
        success: function(data){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          },1500)

          Toast.fire({
            icon: 'success',
            title: 'Creado'
          },1500)

          $(location).attr('href','bactivos');
        }
      });

    return false;
})

// Funcion: Limpiar el filtro de fechas
$("#limpiarfecha").click(function(){
    document.getElementById('banner_fechas').reset();
    $(location).attr('href','bactivos');
})

// Funcion: Limpiar el filtro de fechas
$("#limpiarfechai").click(function(){
    document.getElementById('banner_fechas').reset();
    $(location).attr('href','binactivos');
})
