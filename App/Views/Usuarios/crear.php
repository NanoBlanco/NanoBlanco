<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa fa-users"></i> Usuarios</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Usuarios'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-user-plus"></i> Nuevo Usuario</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Usuarios/guardarUsuario' ?>"
                                onsubmit="return checkForm(this);" id="form-usuario" autocomplete="off">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" required id="nombre" autofocus
                                        placeholder="Nombre del usuario">
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input class="form-control" type="email" name="correo" required id="correo"
                                        placeholder="tu_correo@dominio.com">
                                </div>
                                <div class="form-group">
                                    <label for="idRol">Tipo de Usuario</label>
                                    <select required class="form-control" name="idRol">
                                        <?php foreach ($roles as $rol) { ?>
                                        <option value="<?= $rol['id'] ?>"
                                            <?php if($_SESSION['id_rol'] != 100) {if ($rol['id'] == 1) { echo 'Disabled=""';}} ?>>
                                            <?= $rol['rol'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-control" id="estado" name="estado" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña</label>
                                    <input name="pass" required type="password" class="form-control" id="pass"
                                        placeholder="Escribe tu contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="pass2">Confirma tu contraseña</label>
                                    <input name="pass2" required type="password" class="form-control" id="pass2"
                                        placeholder="Vuelve a escribir tu contraseña">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Guardar
                                </button>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require './App/Views/Templates/js.php'; ?>
<script>
    $(document).ready(function () {
        APP.validacionGeneral('form-usuario');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>