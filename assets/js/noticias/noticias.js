
$(document).ready(function() {
    $('#noticiasactivas').DataTable({
      "order": [[3,"asc"]]
    });
} );

$(document).ready(function() {
    $('#noticiasinactivas').DataTable();
} );



// Funcion: Validar filtro de fechas de publicacion
$("#buscarfecha").click(function(){
    var forData = new FormData(document.getElementById("noticias_fechas"));
    var url = "nactivas";
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

function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

// Funcion: Validar formulario de Crear banner, Envio de data para crear Banner
$("#noticiac").click(function(){
    $("#noticia_crear").validate();

    tinyMCE.triggerSave();
    var url = "/ncrear";
    var noticia_titulo =$("#noticia_titulo").val();
    var noticia_contenido =$("#noticia_contenido").val();
    var noticia_adjunto =$("#noticia_adjunto").val();
    var noticia_ipublicacion =$("input[name='noticia_ipublicacion']").val();
    var noticia_fpublicacion =$("input[name='noticia_fpublicacion']").val();
    var fechaini = new Date(($("#noticia_ipublicacion").val()));
    var fechafin = new Date(($("#noticia_fpublicacion").val()));

    if (getStats('noticia_titulo').chars < 101) {
    }else{
      Swal.fire( {
          icon: 'error',
          text: 'El Titulo debe tener maximo 100 caracteres',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
      });
      return false;
    }
    if (getStats('noticia_contenido').chars < 1001) {
    }else{
      Swal.fire( {
          icon: 'error',
          text: 'La Descripción tener maximo 1000 caracteres',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
      });
      return false;
    }
    if(!noticia_titulo){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el titulo por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!noticia_contenido){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el Contenido por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!noticia_ipublicacion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar la fecha de inicio publicación por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!noticia_fpublicacion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar la fecha de finalización de publicación por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000
            });
            return false;
    }else if(!noticia_adjunto){
      Swal.fire( {
          icon: 'error',
          text: 'Agregar imagen adjunto de la noticia por favor !!!',
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
    }

    var forData = new FormData(document.getElementById("noticia_crear"));

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

          $(location).attr('href','nactivas');
        }
      });

    return false;
})

// Funcion: Limpiar el filtro de fechas
$("#limpiarfecha").click(function(){
    document.getElementById('noticias_fechas').reset();
    $(location).attr('href','nactivas');
})

// Funcion: Limpiar el filtro de fechas
$("#limpiarfechai").click(function(){
    document.getElementById('noticias_fechas').reset();
    $(location).attr('href','ninactivas');
})
