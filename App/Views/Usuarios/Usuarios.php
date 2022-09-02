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
                <a href="<?= FOLDER_PATH.'/Usuarios/nuevoUsuario' ?>" class="btn btn-outline-danger">
                    <i class="fa fa-plus-circle"></i> Nuevo Usuario
                </a>
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
                                        } ?>
                                        <tr>
                                            <td><?= htmlentities($usuario['nombre']) ?></td>
                                            <td><?= htmlentities($usuario['correo']) ?></td>
                                            <td><?= htmlentities($usuario['rol']) ?></td>
                                            <td style="text-align:center;">
                                                <?= $estado; ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <?php if(isset($_SESSION['permisos'][1]['updt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                        <div class="col-auto">
                                                            <form method="post" action="<?= FOLDER_PATH.'/Usuarios/editarUsuario' ?>">
                                                                <input name="id" type="hidden" value="<?= $usuario['id'] ;?>">
                                                                <button type="submit" class="btn btn-warning btn-sm" title="Editar">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div>
                                                            <button href="#" class="btn btn-warning btn-sm" disabled>
                                                                <i class="fa-solid fa-pen-to-square" title="Editar"></i>
                                                            </button>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if(isset($_SESSION['permisos'][1]['dlt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                        <div class="col-auto">
                                                            <a href="#delete_<?= $usuario['id']; ?>" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" title="Borrar">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </a>
                                                    </div>
                                                    <?php }else{ ?>
                                                        <button href="#" class="btn btn-danger btn-sm" disabled>
                                                            <i class="fa-regular fa-trash-can" title="Borrar"></i>
                                                        </button>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <?php include './App/Views/Usuarios/Borrar.php'; ?>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- /.tile-body -->
            </div> <!-- /.tile -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section> <!-- /.content -->
<?php require './App/Views/Templates/js.php'; ?>
<?php require './App/Views/Templates/Footer.php'; ?>