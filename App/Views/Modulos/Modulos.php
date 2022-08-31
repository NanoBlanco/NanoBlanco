<!---- Encabezado ------>
<?php include './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-solid fa-wave-square"></i> Modulos</h1>
        </div>
        <div class="float-right">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus-circle"></i> Nuevo Modulo</button>
        </div>
        <div class="col-lg-8">
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
                        <div class="alert alert-dismissible alert-danger">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El nombre del Modulo Ya está registrado!</strong>
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
                            <strong>El Modulo ha sido Registrado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'modificado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Modulo ha sido Modificado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'eliminado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Modulo ha sido Eliminado</strong>
                        </div>
                    </div>
            <?php } } ?>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($modulos)) {
                                foreach ($modulos as $Key => $modulo) { 
                                    ?>
                            <tr>
                                <td><?= $modulo['id'] ?></td>
                                <td><?= $modulo['modulo'] ?></td>
                                <td><?= $modulo['descripcion'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="#edit_<?= $modulo['id']; ?>" class="btn btn-warning btn-sm"
                                            data-toggle="modal"><i class="fa-solid fa-pen-to-square"
                                                title="Editar"></i></a>
                                        <a href="#delete_<?= $modulo['id']; ?>" class="btn btn-danger btn-sm"
                                            data-toggle="modal"><i class="fa-regular fa-trash-can"
                                                title="Borrar"></i></a>
                                    </div>
                                </td>
                                <!-- <td>
                                </td> -->
                                <?php include './App/Views/Modulos/Editar.php'; ?>
                            </tr>
                            <?php }} else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay Modulos</td>
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

<?php include './App/Views/Templates/Footer.php'; ?>

<!-- Modal Usuario Nuevo -->
<div class="modal fade" id="staticBackdrop" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-user-plus"></i> Nuevo Modulo
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Modulos/guardarModulo' ?>">
                            <div class="form-group">
                                <label for="modulo">Nombre del Modulo</label>
                                <input type="text" class="form-control" autofocus name="modulo" autocomplete="off"
                                    required placeholder="Nombre del modulo">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion"
                                    placeholder="Breve descripcion del modulo">
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