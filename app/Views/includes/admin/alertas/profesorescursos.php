<script>
function autoload(){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      },10000)
      Toast.fire({
        icon: 'error',
        title: 'El profesor tiene curos relacionados, por favor validar antes de inactivarlo !!'
      },10000)
      sleep(1000).then(() => {
        <?php if($estado == 1){?>
        window.location.href='<?php echo IP_SERVER."cractivos"?>';
        <?php }else if ($estado == 2 ){?>
          window.location.href='<?php echo IP_SERVER."crinactivos"?>';
        <?php }?>
      });
}

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
</script>

<body onload="autoload()"></body>
