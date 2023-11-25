$(document).ready(function() {
    $('#profesoresactivos').DataTable();
} );

$(document).ready(function() {
    $('#profesoresinactivos').DataTable();
} );

function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

// Funcion: Validar formulario de Crear banner, Envio de data para crear Banner
$("#profesorc").click(function(){
    $("#profesor_crear").validate();
    var url = "/prcrear";
    tinyMCE.triggerSave();
    var profesor_nombres =$("#profesor_nombres").val();
    var profesor_apellidos =$("#profesor_apellidos").val();
    var profesor_descripcion =$("#profesor_descripcion").val();

    if (getStats('profesor_descripcion').chars < 1001) {
    }else{
      Swal.fire( {
          icon: 'error',
          text: 'El Titulo debe tener maximo 1000 caracteres',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
      });
      return false;
    }
    if(!profesor_nombres){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el campo Nombres por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!profesor_apellidos){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el campo Apellidos por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!profesor_descripcion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el campo Perfil por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }
    var forData = new FormData(document.getElementById("profesor_crear"));

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

          $(location).attr('href','practivos');
        }
      });

    return false;
})
