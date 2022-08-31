<!-- Modal Editar Item -->
<div class="modal fade" id="edit_<?php echo $departamento['id']; ?>" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="editarItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarItemLabel"><i class="fa fa-edit"></i> Editar Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Departamentos/actualizarDepartamento' ?>" id="form-generala" class="form-horizontal" autocomplete="off">
                            <input name="id" type="hidden" value="<?= $departamento['id'] ;?>">
                            <div class="form-group">
                                <label for="id_ubicacion">Area</label>
                                <select required class="form-control" name="id_ubicacion" id="id_ubicacion">
                                    <?php foreach ($ubicaciones as $ubicacion) { ?>
                                    <option <?= intval($ubicacion['id']) === intval($departamento['id_ubicacion']) ? "selected" : "" ?> value="<?=$ubicacion['id'] ?>"> 
                                        <?=$ubicacion['area'] ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                <input class="form-control" type="text" name="departamento" id="departamento" required value="<?= $departamento['departamento'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="responsable">Responsable</label>
                                <input class="form-control" type="text" name="responsable" id="responsable" required value="<?= $departamento['responsable'] ;?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Volver</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p>Por favor rellene todos los campos</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Borrar Item -->
<div class="modal fade" id="delete_<?= $departamento['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BorrarLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="BorrarLabel">Borrar Departamento ?</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de Borrar el registro?</p>
                <h2 class="text-center"><?= $departamento['departamento']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-remove"></i>Cancelar
                </button>
                <form method="post" action="<?= FOLDER_PATH.'/Departamentos/eliminarDepartamento' ?>">
                    <input name="id" type="hidden" value="<?= $departamento['id'] ;?>">
                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>