$(document).ready(function() {
    $('#usuariosactivos').DataTable();
} );

$(document).ready(function() {
    $('#usuariosinactivos').DataTable();
} );

// Funcion: Validar filtro de fechas de publicacion
$("#buscarfecha").click(function(){
    var forData = new FormData(document.getElementById("cursos_fechas"));
    var url = "/usactivos";
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


$(document).ready(function(){

  jQuery.validator.addMethod("noSpace", function(value, element) {
      return value == '' || value.trim().length != 0;
    }, "Por favor no usar espacios");

$("#usuario_crear").validate({
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
          usuario_usuario: {
              required: true,
              minlength: 5,
              maxlength:50,
              noSpace: true
          },
          usuario_correo: {
              required: true,
              email: true
          },
          usuario_contrasena: {
              required: true,
              minlength: 8
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
          usuario_usuario: {
              required: "Por favor ingrese un usuario Valido",
              maxlength:"Maximo 50 caracteres",
              minlength: "El usuario debe tener almenos 5 caracteres",
              noSpace: "El usuario no puede contar con espacios"
          },
          usuario_correo: {
              required: "Por favor Ingrese una cuenta de correo valida",
              noSpace: "El correo no puede contar con espacios",
              email: "Por favor Ingrese una cuenta de correo"
          },
          usuario_contrasena: {
              required: "Por favor proporcione una contraseña",
              minlength: "Su contraseña debe tener al menos 8 caracteres"
          },
          usuario_telefono: {
              required: "Por favor ingrese un número de telefono Valido",
              maxlength:"Maximo 13 caracteres",
              minlength: "El número de telefono debe tener almenos 7 caracteres",
          },
    }
  })
});

// Funcion: Validar formulario de Crear usuario, Envio de data para crear usuario
$("#usuarioc").click(function(){
    $("#usuario_crear").validate();
    var forData = new FormData(document.getElementById("usuario_crear"));
    var url = "/uscrear";

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

          $(location).attr('href','usactivos');
        }
      });

    return false;
})

// Funcion: Limpiar el filtro de fechas
$("#limpiarfecha").click(function(){
    document.getElementById('usuarios_fechas').reset();
    $(location).attr('href','usactivos');
})

// Funcion: Limpiar el filtro de fechas
$("#limpiarfechai").click(function(){
    document.getElementById('usuarios_fechas').reset();
    $(location).attr('href','usinactivos');
})
