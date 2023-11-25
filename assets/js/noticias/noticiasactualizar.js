function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}


$("#actualizarn").click(function(){
  $("#noticia_actualizar").validate();

  var url = "/nactualizar";

  tinyMCE.triggerSave();
  var noticia_titulo =$("#noticia_titulo").val();
  var noticia_ipublicacion =$("#noticia_ipublicacion").val();
  var noticia_fpublicacion =$("#noticia_fpublicacion").val();
  var noticia_contenido =$("#noticia_contenido").val();
  var noticia_adjunto =$("#noticia_adjunto").val();
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
  }else if(!noticia_contenido){
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
  }

  var forData = new FormData(document.getElementById("noticia_actualizar"));



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
          title: 'Actualizado'
        },1500)

        $(location).attr('href','/nactivas');
      }
    });


  return false;


  })
