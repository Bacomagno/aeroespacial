<body>
    <div class="page login-page">
        <div class="back-img" style="background-image: url(<?php echo IP_SERVER ?>public/images/intros/unihorizonte-convenio_NASA-2-o_e.jpg); background-size: cover;">
            <div class="container ">
                <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner">
                    <img src="<?php echo IP_SERVER ?>assets/images/logo.png" alt="Logo" style="width: 100%; height: 100%;">
                    <!-- <div class="logo text-uppercase"><span></span><strong class="text-primary">NASA - UNIHORIZONTE</strong></div>
                    <p>Escuela de aprendizaje</p> -->
                    <form id="login" method="post" action="" class="text-left form-validate">
                    <div class="form-group-material">
                        <input id="login-Username" type="text" name="loginUsername" required data-msg="Por favor ingrese su usuario" class="input-material">
                        <label for="login-Username" class="label-material">Usuario</label>
                    </div>
                    <div class="form-group-material">
                        <input id="login-password" type="password" name="loginPassword" required data-msg="Por favor ingrese su contraseña" class="input-material">
                        <label for="login-password" class="label-material">Contraseña</label>
                    </div>
                    <div class="form-group text-center">
                      <input type="submit" id="iniciar" name="Iniciar" value="Iniciar" class="btn btn-primary">
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </div>
                    </form>
                    <!-- <a type="button" data-toggle="modal" data-target="#myModal" class="forgot-pass">Olvido su contraseña?</a> -->
                    <a href="<?php echo IP_SERVER ?>" class="forgot-pass">Volver</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo IP_SERVER ?>assets/js/login/validarlogin.js"></script>
