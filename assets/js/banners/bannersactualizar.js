function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

$("#actualizarb").click(function(){
  $("#banner_actualizar").validate();
  var url = "/bactualizar";

  tinyMCE.triggerSave();
  var banner_nombre =$("#banner_nombre").val();
  var banner_ipublicacion =$("input[name='banner_ipublicacion']").val();
  var banner_fpublicacion =$("input[name='banner_fpublicacion']").val();
  var banner_descripcion =$("textarea[name='banner_descripcion']").val();
  var banner_path =$("input[name='banner_path']").val();
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
    }
    var forData = new FormData(document.getElementById("banner_actualizar"));

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

        $(location).attr('href','/bactivos');

      }
    });

  return false;

  })
