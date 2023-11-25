function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);
    return {
        chars: text.length,
    };
}

$("#actualizarcr").click(function(){
  var url = "/cractualizar";
  tinyMCE.triggerSave();
  var curso_nombre =$("#curso_nombre").val();
  var curso_link =$("#curso_link").val();
  var curso_finicio =$("#curso_finicio").val();
  var curso_fin =$("#curso_fin").val();
  var curso_profesor =$("#curso_profesor").val();
  var fechaini = new Date(($("#curso_finicio").val()));
  var fechafin = new Date(($("#curso_fin").val()));

  if (getStats('curso_nombre').chars < 501) {
  }else{
    Swal.fire( {
        icon: 'error',
        text: 'La Descripción tener maximo 500 caracteres',
        position: 'top',
        showConfirmButton: false,
        timer: 2000
    });
    return false;
  }if (getStats('curso_descripcion').chars < 501) {
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
  if(!curso_nombre){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar el nombre por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!curso_link){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar el link dek evento por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!curso_finicio){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar la fecha de inicio por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(!curso_fin){
      Swal.fire( {
          icon: 'error',
          text: 'Diligenciar la hora de inicio por favor !!!',
          position: 'top',
          showConfirmButton: false,
          timer: 2000
          });
          return false;
  }else if(curso_profesor=="NA"){
      Swal.fire( {
          icon: 'error',
          text: 'Seleccione el Profesor por favor !!!!',
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
  }

  var forData = new FormData(document.getElementById("curso_actualizar"));

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

        $(location).attr('href','/cractivos');
      }
    });

  return false;
})
