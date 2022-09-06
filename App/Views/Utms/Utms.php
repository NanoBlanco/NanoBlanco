<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; 
setlocale(LC_TIME,"es_ES"); ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa fa-money"></i> UTMs</h1>
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
                        <div class="alert alert-dismissible alert-danger">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El mes del UTM Ya está registrado!</strong>
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
                            <strong>El UTM ha sido Registrado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'modificado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El UTM ha sido Modificado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'eliminado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El UTM ha sido Eliminado</strong>
                        </div>
                    </div>
            <?php } } ?>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Utms/nuevoUtm' ?>" class="btn btn-outline-danger">
                <i class="fa fa-plus-circle"></i> Nuevo UTM
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table id="example2" class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Mes</th>
                                <th>Año</th>
                                <th>Valor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($utms)) {
                                foreach ($utms as $Key => $utm) { ?>
                                    <tr>
                                        <td><?= date("F", mktime(0, 0, 0, $utm['mes'], 10)); ?></td>
                                        <td><?= number_format($utm['ano'],0,'','.') ?></td>
                                        <td><?= number_format($utm['valor'],0,'','.') ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <form method="post" action="<?= FOLDER_PATH.'/Utms/editarUtm' ?>">
                                                        <input name="id" type="hidden" value="<?= $utm['id'] ;?>">
                                                        <button type="submit" class="btn btn-warning btn-sm" title="Editar">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#delete_<?= $utm['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" title="Borrar">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </div>
                                                    
                                            </div>
                                        </td>
                                        <?php include './App/Views/Utms/Borrar.php'; ?>
                                    </tr>
                                <?php }
                            } ?>
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

<?php require './App/Views/Templates/Footer.php'; ?>