$(document).ready(function() {
    $("#usuario_actualizar").validate({
      rules: {
            usuario_telefono: {
                required: true,
                minlength: 7,
                maxlength:13
            },
            usuario_correo: {
                required: true,
                email: true
            },
          },
          messages: {
            usuario_telefono: {
                required: "Por favor ingrese un número de telefono Valido",
                maxlength:"Maximo 13 caracteres",
                minlength: "El número de telefono debe tener almenos 7 caracteres",
            },
            usuario_correo: {
                required: "Por favor Ingrese una cuenta de correo valida",
                noSpace: "El correo no puede contar con espacios",
                email: "Por favor Ingrese una cuenta de correo"
            },
          },
    });
  });

  $("#usuario_telefono").mouseenter(function(){
      if($("input[name=usuario_telefono")){
          var regex = /[^+\d]/g;

          $("#usuario_telefono").keyup(function(){
          if($("#usuario_telefono").val() == ""){
              $("#usuario_telefono").val("+")
          }
          $("#usuario_telefono").val($("#usuario_telefono").val().replace(regex, ""))
          });

      }
  })

$("#actualizarpr").click(function(){
  $("#usuario_actualizar").validate();
  var forData = new FormData(document.getElementById("usuario_actualizar"));
  // var url = "/pfactualizar";
  var url = "/pfactualizar"

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

        $(location).attr('href','/perfil');
      }
    });
});


function mostrarPassword(){
  var cambio = document.getElementById("usuario_contrasena");
  if(cambio.type == "password"){
    cambio.type = "text";
    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
    cambio.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
}

function mostrarPasswordc(){
  var cambio2 = document.getElementById("usuario_contrasenac");
  if(cambio2.type == "password"){
    cambio2.type = "text";
    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
    cambio2.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
}



$("#actualziarc").click(function(){
  var forData = new FormData(document.getElementById("usuario_actualizarc"));
  var url = "/pfactualizarc";

  if($("input[name='usuario_contrasena']").val() != $("input[name='usuario_contrasenac']").val()){
    Swal.fire( {
      icon: 'error',
      text: 'Las contraseñas no coinciden',
      position: 'top',
      showConfirmButton: false,
      timer: 2000
      });
      return false;
  }else{
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
            timer: 3000,
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

          $(location).attr('href','perfil');
        }
      });
    }

})
