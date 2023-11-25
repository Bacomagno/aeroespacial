function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

$("#actualizarev").click(function(){

  var url = "/evactualizar";
  tinyMCE.triggerSave();
  var evento_nombre =$("#evento_nombre").val();
  var evento_descripcion =$("#evento_descripcion").val();
  var evento_link =$("#evento_link").val();
  var evento_finicio =$("#evento_finicio").val();
  var evento_hinicio =$("#evento_hinicio").val();
  var evento_fin =$("#evento_fin").val();
  var evento_hfin =$("#evento_hfin").val();
  var evento_encargado =$("#evento_encargado").val();
  var fechaini = new Date(($("#evento_finicio").val()));
  var fechafin = new Date(($("#evento_fin").val()));

  if (getStats('evento_descripcion').chars < 501) {
  }else{
    Swal.fire( {
        icon: 'error',
        text: 'La Descripción tener maximo 500 caracteres',
        position: 'top',
        showConfirmButton: false,
        timer: 2000
    });
    return false;
  }
  if(!evento_nombre){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar el nombre por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!evento_descripcion){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar la descripción o contenido del evento por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!evento_link){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar el link dek evento por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!evento_finicio){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar la fecha de inicio por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!evento_hinicio){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar la hora de inicio por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if (fechafin < fechaini){
    Swal.fire( {
        icon: 'error',
        text: 'La fecha de finalización no puede ser inferior a la fecha de inicio !!!',
        position: 'top',
        showConfirmButton: false,
        timer: 2000
        });
        return false;
  }else if(!evento_encargado){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar el nombre del sponsor o encargado del evento por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }

  var forData = new FormData(document.getElementById("evento_actualizar"));

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

        $(location).attr('href','/evactivos');
      }
    });


  return false;


  })
