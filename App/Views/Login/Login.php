<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="<?= ASSETS.'/css/main.css' ?>">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            
        <title>Inicio de Sesion</title>
    </head>

    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1><strong>RB</strong> Servicios</h1> 
            </div>
            <div class="login-box">
                <form class="login-form" method="post" action="<?= FOLDER_PATH.'/Login/signin' ?>" autocomplete="off">
                    <h3 class="login-head">Inicio de Sesion</h3>
                    <div class="form-group">
                        <label for="email" class="control-label"><i class="fas fa-user-secret"></i> &nbsp;Usuario</label>
                        <input class="form-control" type="email" name="email" placeholder="correo@tudominio.com" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label"><i class="fas fa-key"></i> &nbsp;
                            Contraseña</label>
                        <input class="form-control" type="password" name="password" placeholder="Tu clave">
                    </div>
                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox"><span class="label-text">Mantener Conectado</span>
                                </label>
                            </div>
                            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidó la clave ?</a></p>
                        </div>
                    </div>
                    <?php if(!empty($error_message)) {?>
                    <div class="form-group alert alert-danger">
                        <?php print($error_message) ?>
                    </div>
                    <?php } ?>

                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INICIAR</button>
                    </div>
                </form>

                <!-- form reset password -->
                <form class="forget-form" action="" id="formResetPass" name="formResetPass" autocomplete="off">
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidó la clave ?</h3>
                    <div class="form-group">
                        <label for="emailReset" class="control-label">Correo</label>
                        <input class="form-control" type="email" id="emailReset" name="emailReset" placeholder="Tu correo">
                    </div>
                    <div id="alertLogin"></div>
                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>REINICIAR</button>
                    </div>
                    <div class="form-group mt-3">
                        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar</a></p>
                    </div>
                </form>
            </div>
        </section>
        <script>
        const base_url = "<?= FOLDER_PATH; ?>";
        </script>

        <!-- Essential javascripts for application to work-->
        <script src="<?= ASSETS.'/js/jquery-3.3.1.min.js' ?>"></script>
        <script src="<?= ASSETS.'/js/popper.min.js' ?>"></script>
        <script src="<?= ASSETS.'/js/bootstrap.min.js' ?>"></script>
        <script src="<?= ASSETS.'/js/functions_login.js' ?>"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="<?= ASSETS.'/js/plugins/pace.min.js' ?>"></script>
    </body>

</html>