<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-solid fa-store"></i> Sección</h1>
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
                            <strong>La Sección a registrar, Ya Existe!</strong>
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
                            <strong>La Sección ha sido Registrada</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'modificado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>La Sección ha sido Modificada</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'eliminado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>La Sección ha sido Eliminada</strong>
                        </div>
                    </div>
            <?php } } ?>
        </div>
        <div class="float-right">
            <?php if(isset($_SESSION['permisos'][8]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa fa-plus-circle"></i> Nueva Sección
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
                                    <th>Area</th>
                                    <th>Departamento</th>
                                    <th>Sección</th>
                                    <th>Responsable</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($secciones)) {
                                    foreach ($secciones as $seccion) { ?>
                                        <tr>
                                            <td><?= $seccion['id'] ?></td>
                                            <td><?= htmlentities($seccion['area']) ?></td>
                                            <td><?= htmlentities($seccion['departamento']) ?></td>
                                            <td><?= htmlentities($seccion['seccion']) ?></td>
                                            <td><?= htmlentities($seccion['responsable']) ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <?php if(isset($_SESSION['permisos'][8]['updt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                    <a href="#edit_<?= $seccion['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" title="Editar">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <?php }else{ ?>
                                                    <button href="#" class="btn btn-warning btn-sm" disabled>
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <?php } ?>
                                                    <?php if(isset($_SESSION['permisos'][8]['dlt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                    <a href="#delete_<?= $seccion['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" title="Borrar">
                                                        <i class="fa-regular fa-trash-can"></i></a>
                                                    <?php }else{ ?>
                                                    <button href="#" class="btn btn-danger btn-sm" title="Borrar" disabled>
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <?php include './App/Views/Secciones/Editar.php'; ?>
                                        </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div> <!-- /.table -->
                </div> <!-- /.body -->
            </div> <!-- /.tile -->
        </div> <!-- /.md-12 -->
    </div> <!-- /.row -->
</section>
<!-- /.content -->
<?php require './App/Views/Templates/js.php'; ?>
<script>
    $(document).ready(function () {
        APP.validacionGeneral('form-seccion');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>

<!-- Modal Sección Nuevo -->
<div class="modal fade" id="staticBackdrop" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-store"></i> Nueva Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Secciones/guardarSeccion' ?>" id="form-seccion" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <label for="id_ubicacion">Ubicación</label>
                                <select class="form-control" name="id_ubicacion" id="ubica" required>
                                    <option value=0>Seleccione una ubicación...</option>
                                    <?php foreach ($ubicaciones as $ubicacion) { ?>
                                    <option value="<?= $ubicacion['id'] ?>">
                                        <?= $ubicacion['area'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <label for="id_departamento">Departamentos</label>
                            <select id="dptos" name="id_departamento" class="form-control">
                            </select>
 
                            <div class="form-group">
                                <label for="seccion">Sección</label>
                                <input class="form-control" type="text" name="seccion" id="seccion" required placeholder="Sección">
                            </div>

                            <div class="form-group">
                                <label for="responsable">Responsable</label>
                                <input class="form-control" type="text" name="responsable" id="responsable" required placeholder="Nombre del Responsable">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Volver</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>