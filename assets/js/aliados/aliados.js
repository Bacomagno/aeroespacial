$(document).ready(function() {
    $('#aliadosactivos').DataTable();
} );

$(document).ready(function() {
    $('#aliadosinactivos').DataTable();
} );

function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

// Funcion: Validar formulario de Crear banner, Envio de data para crear Banner
$("#aliadoc").click(function(){
    $("#aliado_crear").validate();
    var url = "/alcrear";
    tinyMCE.triggerSave();
    var aliado_nombres =$("#aliado_nombres").val();
    var aliado_apellidos =$("#aliado_apellidos").val();
    var aliado_descripcion =$("#aliado_descripcion").val();

    if (getStats('aliado_descripcion').chars < 2001) {
    }else{
      Swal.fire( {
          icon: 'error',
          text: 'El Titulo debe tener maximo 2000 caracteres',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
      });
      return false;
    }
    if(!aliado_nombres){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el campo Nombres por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!aliado_apellidos){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el campo Apellidos por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!aliado_descripcion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el campo Perfil por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }
    var forData = new FormData(document.getElementById("aliado_crear"));

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

          $(location).attr('href','alactivos');
        }
      });

    return false;
})
