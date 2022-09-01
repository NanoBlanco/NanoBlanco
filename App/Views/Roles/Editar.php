<!-- Modal Editar Roles -->
<div class="modal fade" id="edit_<?= $rol['id']; ?>" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="editarRolLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarRolLabel"><i class="fa fa-edit"></i> Editar Rol
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Roles/actualizarRol' ?>" id="form-rol">
                            <input name="id" type="hidden" value="<?= $rol['id'] ;?>">
                            <div class="form-group">
                                <label for="rol">Nombre del Rol</label>
                                <input type="text" class="form-control" autofocus name="rol" required value="<?= $rol['rol'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select required class="form-control" name="estado">
                                    <option <?= intval($rol['estado']) === 1 ? "selected" : "" ?> value="1">Activo
                                    </option>
                                    <option <?= intval($rol['estado']) === 0 ? "selected" : "" ?> value="0">Inactivo
                                    </option>
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
                <p>Por favor rellene todos los campos</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Borrar Rol -->
<div class="modal fade" id="delete_<?= $rol['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BorrarLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="BorrarLabel">Borrar Rol ?</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de Borrar el registro?</p>
                <h2 class="text-center"><?= $rol['rol']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Cancelar</button>
                <form method="post" action="<?= FOLDER_PATH.'/Roles/eliminarRol' ?>">
                    <input name="id" type="hidden" value="<?= $rol['id'] ;?>">
                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"
                            title="Borrar"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>