<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-solid fa-user-tie"></i> Roles</h1>
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
                    <strong>El nombre del Rol Ya está registrado!</strong>
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
                    <strong>El Rol ha sido Registrado</strong>
                </div>
            </div>
            <?php } elseif ($alert == 'modificado') { ?>
            <div class="bs-component">
                <div class="alert alert-dismissible alert-success">
                    <button class="close" type="button" data-dismiss="alert">×</button>
                    <strong>El Rol ha sido Modificado</strong>
                </div>
            </div>
            <?php } elseif ($alert == 'permiso') { ?>
            <div class="bs-component">
                <div class="alert alert-dismissible alert-success">
                    <button class="close" type="button" data-dismiss="alert">×</button>
                    <strong>Los Permisos han sido configurados</strong>
                </div>
            </div>

            <?php } } ?>
        </div>
        <div class="float-right">
            <?php if(isset($_SESSION['permisos'][6]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa fa-plus-circle"></i> Nuevo Rol
            </button>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table id="example2" class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($roles)) {
                                foreach ($roles as $Key => $rol) { 
                                    if (!$rol['estado']) {
                                        $estado='<span class="badge badge-danger">Inactivo</span>';
                                    } else {
                                        $estado='<span class="badge badge-success">Activo</span>';
                                    }
                                    ?>
                            <tr>
                                <td><?= $rol['id'] ?></td>
                                <td><?= $rol['rol'] ?></td>
                                <td><?= $rol['descripcion'] ?></td>
                                <td style="text-align:center;">
                                    <?= $estado; ?>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <form method="post" action="<?= FOLDER_PATH.'/Roles/permisos' ?>">
                                            <?php if(isset($_SESSION['permisos'][7]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                            <input name="idRolP" type="hidden" value="<?= $rol['id'] ;?>">
                                            <button type="submit" class="btn btn-info btn-sm" title="Permisos"><i
                                                    class="fa-solid fa-key"></i></button>
                                            <?php }else{ ?>
                                            <button href="#" class="btn btn-info btn-sm" title="Permisos" disabled><i
                                                    class="fa-solid fa-key"></i></button>
                                            <?php } ?>

                                            <?php if(isset($_SESSION['permisos'][6]['updt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                            <a href="#edit_<?= $rol['id']; ?>" class="btn btn-warning btn-sm"
                                                data-toggle="modal" title="Editar"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <?php }else{ ?>
                                            <button href="#" class="btn btn-warning btn-sm" disabled><i
                                                    class="fa-solid fa-pen-to-square" title="Editar"></i></button>
                                            <?php } ?>
                                            <?php if(isset($_SESSION['permisos'][6]['dlt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                            <a href="#delete_<?= $rol['id']; ?>" class="btn btn-danger btn-sm"
                                                data-toggle="modal"><i class="fa-regular fa-trash-can"
                                                    title="Borrar"></i></a>
                                            <?php }else{ ?>
                                            <button href="#" class="btn btn-danger btn-sm" disabled><i
                                                    class="fa-regular fa-trash-can" title="Borrar"></i></button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </td>
                                <?php include './App/Views/Roles/Editar.php'; ?>
                            </tr>
                            <?php }} else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay Roles</td>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php require './App/Views/Templates/js.php'; ?>
<script>
    $(document).ready(function () {
        APP.validacionGeneral('form-rol');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>

<!-- Modal Usuario Nuevo -->
<div class="modal fade" id="staticBackdrop" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-user-plus"></i> Nuevo Rol
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Roles/guardarRol' ?>" id="form-rol">
                            <div class="form-group">
                                <label for="rol">Nombre del Rol</label>
                                <input type="text" class="form-control" autofocus name="rol" autocomplete="off" required
                                    placeholder="Nombre del rol">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select required class="form-control" name="estado">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
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