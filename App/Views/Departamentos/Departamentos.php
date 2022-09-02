<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-solid fa-sitemap"></i> Departamentos</h1>
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
                            <strong>El Departamento a registrar, Ya Existe!</strong>
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
                            <strong>El Departamento ha sido Registrado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'modificado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Departamento ha sido Modificado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'eliminado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Departamento ha sido Eliminado</strong>
                        </div>
                    </div>
            <?php } } ?>
        </div>
        <div class="float-right">
            <?php if(isset($_SESSION['permisos'][8]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus-circle"></i> Nuevo Departamento</button>
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
                                    <th>Responsable</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($departamentos)) {
                                    foreach ($departamentos as $Key => $departamento) { ?>
                                    <tr>
                                        <td><?= $departamento['id'] ?></td>
                                        <td><?= htmlentities($departamento['area']) ?></td>
                                        <td><?= htmlentities($departamento['departamento']) ?></td>
                                        <td><?= htmlentities($departamento['responsable']) ?></td>
                                        <td>
                                            <div class="text-center">
                                                <?php if(isset($_SESSION['permisos'][8]['updt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                <a href="#edit_<?= $departamento['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" title="Editar">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <?php }else{ ?>
                                                <button href="#" class="btn btn-warning btn-sm" disabled>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <?php } ?>
                                                <?php if(isset($_SESSION['permisos'][8]['dlt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                <a href="#delete_<?= $departamento['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" title="Borrar">
                                                    <i class="fa-regular fa-trash-can"></i></a>
                                                <?php }else{ ?>
                                                <button href="#" class="btn btn-danger btn-sm" title="Borrar" disabled>
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <?php include './App/Views/Departamentos/Editar.php'; ?>
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
        APP.validacionGeneral('form-dptos');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>

<!-- Modal Departamento Nuevo -->
<div class="modal fade" id="staticBackdrop" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-brands fa-buromobelexperte"></i> Nuevo Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Departamentos/guardarDepartamento' ?>" id="form-dptos" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <label for="id_item">Area</label>
                                <select required class="form-control" name="id_ubicacion" id="id_ubicacion">
                                    <?php foreach ($ubicaciones as $ubicacion) { ?>
                                    <option value="<?=$ubicacion['id'] ?>">
                                        <?=$ubicacion['area'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                <input class="form-control" type="text" name="departamento" id="departamento" required autofocus placeholder="Departamento">
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