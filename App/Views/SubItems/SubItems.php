<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-brands fa-buromobelexperte"></i> Sub-Items</h1>
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
                            <strong>El Item a registrar, Ya Existe!</strong>
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
                            <strong>El Item ha sido Registrado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'modificado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Item ha sido Modificado</strong>
                        </div>
                    </div>
                <?php } elseif ($alert == 'eliminado') { ?>
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            <strong>El Item ha sido Eliminado</strong>
                        </div>
                    </div>
            <?php } } ?>
        </div>
        <div class="float-right">
            <?php if(isset($_SESSION['permisos'][8]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
                <a href="<?= FOLDER_PATH.'/SubItems/nuevoSubItem' ?>" class="btn btn-outline-danger">
                    <i class="fa fa-plus-circle"></i> Nuevo Sub Item
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
                                    <th>Item</th>
                                    <th>Sub-Item</th>
                                    <th>Descripción</th>
                                    <th>Cta Contable</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            if(!empty($sub_items)) {
                                foreach ($sub_items as $Key => $sub_item) { ?>
                                <tr>
                                    <td><?= htmlentities($sub_item['item']) ?></td>
                                    <td><?= htmlentities($sub_item['sub_item']) ?></td>
                                    <td><?= htmlentities($sub_item['descripcion']) ?></td>
                                    <td><?= $sub_item['cta_contable'] ?></td>
                                    <td>
                                        <div class="row">
                                            <?php if(isset($_SESSION['permisos'][8]['updt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                <div class="col-auto">
                                                    <form method="post" action="<?= FOLDER_PATH.'/SubItems/editarSubItem' ?>">
                                                        <input name="id" type="hidden" value="<?= $sub_item['id'] ;?>">
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
                                            <?php if(isset($_SESSION['permisos'][8]['dlt']) == 1 || $_SESSION['id_rol'] = 100) {?>
                                                <div class="col-auto">
                                                    <a href="#delete_<?= $sub_item['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" title="Borrar">
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
                                    <?php include './App/Views/SubItems/Borrar.php'; ?>
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
<?php require './App/Views/Templates/Footer.php'; ?>
