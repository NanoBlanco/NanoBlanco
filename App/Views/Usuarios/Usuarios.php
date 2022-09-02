<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa fa-users"></i> Usuarios</h1>
        </div>
        <div class="col-lg-4">
            <?php 
            if (!empty($_GET['alert'])) {
                $alert=$_GET['alert'];
                if ($alert == 'error2') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>Error en envio de Datos.</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'errorE') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-warning">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Correo del usuario a registrar, Ya Existe!</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'error1') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>Error al registrar</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'registrado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Usuario ha sido Registrado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'modificado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Usuario ha sido Modificado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'eliminado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Usuario ha sido eliminado.</strong>
                        </div>
                    </div>
            <?php } } ?>
        </div>
        <div class="float-right">
            <?php if(isset($_SESSION['permisos'][1]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa fa-plus-circle"></i> Nuevo Usuario
            </button>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($usuarios)) {
                                    foreach ($usuarios as $Key => $usuario) { 
                                        if (!$usuario['estado']) {
                                            $estado='<span class="badge badge-danger">Inactivo</span>';
                                        } else {
                                            $estado='<span class="badge badge-success">Activo</span>';
                                        }
                                ?>
                                <tr>
                                    <td><?= $usuario['id'] ?></td>
                                    <td><?= htmlentities($usuario['nombre']) ?></td>
                                    <td><?= htmlentities($usuario['correo']) ?></td>
                                    <td><?= htmlentities($usuario['rol']) ?></td>
                                    <td style="text-align:center;">
                                        <?= $estado; ?>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php if(isset($_SESSION['permisos'][1]['updt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                            <a href="#edit_<?= $usuario['id']; ?>" class="btn btn-warning btn-sm"
                                                data-toggle="modal" title="Editar">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <?php }else{ ?>
                                            <button href="#" class="btn btn-warning btn-sm" disabled>
                                                <i class="fa-solid fa-pen-to-square" title="Editar"></i>
                                            </button>
                                            <?php } ?>
                                            <?php if(isset($_SESSION['permisos'][1]['dlt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                            <a href="#delete_<?= $usuario['id']; ?>" class="btn btn-danger btn-sm"
                                                data-toggle="modal" title="Borrar">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                            <?php }else{ ?>
                                            <button href="#" class="btn btn-danger btn-sm" disabled>
                                                <i class="fa-regular fa-trash-can" title="Borrar"></i>
                                            </button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <?php include './App/Views/Usuarios/Editar.php'; ?>
                                </tr>
                                <?php }} else { ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">No hay Usuarios</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tile-body -->
            </div>
            <!-- /.tile -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php require './App/Views/Templates/js.php'; ?>
<script>
    $(document).ready(function () {
        APP.validacionGeneral('form-usuario');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>

<!-- Modal Usuario Nuevo -->

<div class="modal fade" id="staticBackdrop" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-user-plus"></i> Nuevo Usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Volver</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>