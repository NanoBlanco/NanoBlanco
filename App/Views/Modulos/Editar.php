<!-- Modal Editar Modulo -->
<div class="modal fade" id="edit_<?= $modulo['id']; ?>" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="editarModLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModLabel"><i class="fa fa-edit"></i> Editar Modulo
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Modulos/actualizarModulo' ?>" id="form-modulo" autocomplete="off">
                            <input name="id" type="hidden" value="<?= $modulo['id'] ;?>">
                            <div class="form-group">
                                <label for="modulo">Modulo</label>
                                <input type="text" class="form-control" autofocus name="modulo" required
                                    value="<?= $modulo['modulo'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" required
                                    value="<?= $modulo['descripcion'] ;?>">
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

<!-- Modal Borrar Modulo -->
<div class="modal fade" id="delete_<?= $modulo['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BorrarLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="BorrarLabel">Borrar ?</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de Borrar el modulo?</p>
                <h2 class="text-center"><?= $modulo['modulo']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Cancelar</button>
                <form method="post" action="<?= FOLDER_PATH.'/Modulos/eliminarModulo' ?>">
                    <input name="id" type="hidden" value="<?= $modulo['id'] ;?>">
                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"
                            title="Borrar"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>