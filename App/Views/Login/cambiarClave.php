<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.'/css/main.css' ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Reinicio Clave</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Reinicio de Clave</h1>
        </div>
        <div class="login-box">
            <form class="login-form"  method="post" action="" id="formClave" autocomplete="off">
                <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $data['id']; ?>" required>
                <input type="hidden" id="txtEmail" name="txtEmail" value="<?= $data['email']; ?>" required>
                <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token']; ?>" required>
                <h3 class="login-head"><i class="fas fa-key"></i> Cambiar contraseña</h3>
                <div class="form-group">
                    <label for="clave1">Nueva Clave</label>
                    <input class="form-control" type="password" name="clave1" id="clave1" placeholder="Ingrese la nueva clave">
                </div>
                <div class="form-group">
                    <label for="clave2">Confirme la Clave</label>
                    <input class="form-control" type="password" name="clave2" id="clave2" placeholder="Repita la nueva clave">
                </div>
                <div class="row" id="mensajeError"></div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Reiniciar</button>
                </div>
            </form>
        </div>
    </section>

    <script>
    const base_url = "<?= '/'; ?>";
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