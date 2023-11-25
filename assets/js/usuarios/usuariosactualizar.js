/// Función para validar número de telefono
$("#usuario_telefono").mouseenter(function(){
      if($("input[name=usuario_telefono")){
          var regex = /[^+\d]/g;

          $("#usuario_telefono").keyup(function(){
          if($("#usuario_telefono").val() == ""){
              $("#usuario_telefono").val("+")
          }
          $("#usuario_telefono").val($("#usuario_telefono").val().replace(regex,""))
          });

      }
  })

  jQuery.validator.addMethod("noSpace", function(value, element) {
      return value == '' || value.trim().length != 0;
    }, "Por favor no usar espacios");

$("#usuario_actualizar").validate({
    rules: {
          usuario_nombre: {
              required: true,
              minlength: 3,
              maxlength:20
          },
          usuario_apellidos: {
              required: true,
              minlength: 3,
              maxlength:50
          },
          usuario_correo: {
              required: true,
              noSpace: true,
              email: true
          },
          usuario_telefono: {
              required: true,
              minlength: 7,
              maxlength:13
          }

      },
      messages: {
          usuario_nombre: {
              required: "Por favor ingrese un Nombre Valido",
              maxlength:"Maximo 20 caracteres",
              minlength: "El Nombre debe tener almenos 3 caracteres"
          },
          usuario_apellidos: {
              required: "Por favor ingrese un Apellido Valido",
              maxlength:"Maximo 50 caracteres",
              minlength: "El Apellido debe tener almenos 3 caracteres"
          },
          usuario_correo: {
              required: "Por favor Ingrese una cuenta de correo valida",
              noSpace: "El correo no puede contar con espacios",
              email: "Por favor Ingrese una cuenta de correo"
          },
          usuario_telefono: {
              required: "Por favor ingrese un número de telefono Valido",
              maxlength:"Maximo 13 caracteres",
              minlength: "El número de telefono debe tener almenos 7 caracteres",
          },
    }
  });

$("#actualizarus").click(function(){
  $("#usuario_actualizar").validate();
  var forData = new FormData(document.getElementById("usuario_actualizar"));
  var url = "/usactualizar";

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

        $(location).attr('href','/usactivos');
      }
    });

  return false;
})
