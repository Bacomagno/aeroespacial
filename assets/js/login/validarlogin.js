$("#iniciar").click(function(){
    var dataString = "loginUsername=" + $("[type='text']").val() + "&loginPassword=" + $("[type='password']").val();

 //hace la búsqueda
         $.ajax({
               type: "POST",
               url: "Login/iniciosesion",
               data: dataString,
               dataType: "html",
               success: function(data){
                  console.log(data)               ;
                  if (data == 'false'){
                     Swal.fire( {
                        icon: 'error',
                        text: 'Datos Incorrectos, por favor validelos y vuelve a intentarlo !!',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 2000
                      });
                  }else{
                      $(location).attr('href','adm');
                  }
               }
   });
    return false;
});
