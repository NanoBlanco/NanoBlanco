<?php include './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div>
            <h1><i class="fa-regular fa-address-card"></i> Permisos de <?=' '.$nombre->rol ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="post" action="<?= FOLDER_PATH.'/Roles/guardarPermisos' ?>">
                    <input type="hidden" id="idRrol" name="idRol" value="<?= $nombre->id; ?>" required="">
                    <div class="tile-body">
                        <table id="example2" class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Modulo</th>
                                    <th>Registrar</th>
                                    <th>Actualizar</th>
                                    <th>Borrar</th>
                                    <th>Revisar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($permisos as $permiso) { 
                                    $rCheck = $permiso['vw']   == 1 ? " checked " : 0;
                                    $wCheck = $permiso['ins']  == 1 ? " checked " : 0;
                                    $uCheck = $permiso['updt'] == 1 ? " checked " : 0;
                                    $dCheck = $permiso['dlt']  == 1 ? " checked " : 0;
                                ?>
                                <tr>
                                    <td>
                                        <?= $permiso['id'] ?>
                                        <input type="hidden" name="modulos[<?= $permiso['id']?>][id_modulo]"
                                            value="<?= $permiso['id']?>">
                                    </td>
                                    <td><?= $permiso['modulo'] ?></td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" <?= $wCheck ?>
                                                    name="modulos[<?= $permiso['id']?>][ins]"><span
                                                    class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" <?= $uCheck ?>
                                                    name="modulos[<?= $permiso['id']?>][updt]"><span
                                                    class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" <?= $dCheck ?>
                                                    name="modulos[<?= $permiso['id']?>][dlt]"><span
                                                    class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" <?= $rCheck ?>
                                                    name="modulos[<?= $permiso['id']?>][vw]"><span
                                                    class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> <!-- /.tile-body -->
                    <div class="text-center">
                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                            Guardar</button>
                    </div>
                </form>
            </div> <!-- /.tile -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section> <!-- /.content -->
<?php include './App/Views/Templates/Footer.php'; ?>