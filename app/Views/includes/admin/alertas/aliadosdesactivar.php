<script>
function autoload(){
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
        title: 'Desactivado'
      },1500)
console.log("aca");
      window.location.href='<?php echo IP_SERVER."alactivos"; ?>';
}
</script>

<body onload="autoload()"></body>
