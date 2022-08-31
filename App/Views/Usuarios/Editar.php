<!-- Modal Editar Usuarios -->
<div class="modal fade" id="edit_<?php echo $usuario['id']; ?>" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="editarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarUsuarioLabel"><i class="fa fa-edit"></i> Editar Usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Usuarios/actualizarUsuario' ?>">
                            <input name="id" type="hidden" value="<?= $usuario['id'] ;?>">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input autofocus name="nombre" autocomplete="off" required type="text"
                                    class="form-control" value="<?= $usuario['nombre'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input autofocus name="correo" autocomplete="off" type="email" class="form-control"
                                    value="<?= $usuario['correo'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="idRol">Tipo de Usuario</label>
                                <select required class="form-control" name="idRol" id="idRol">
                                    <?php foreach ($roles as $rol) { ?>
                                    <option <?= intval($usuario['id_rol']) === intval($rol['id']) ? "selected" : "" ?>
                                        value="<?= $rol['id'] ?>"><?=htmlentities($rol['rol']) ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="1" <?php if ($usuario['estado'] ==
                                            1) { echo 'selected=""'; } ?>> Activo
                                        <?php if ($usuario['estado'] == 1) { echo '(Actual)'; } ?></option>
                                    <option value="0" <?php if ($usuario['estado'] ==
                                            0) { echo 'selected=""'; } ?>> Inactivo
                                        <?php if ($usuario['estado'] == 0) { echo '(Actual)'; } ?></option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
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

<!-- Modal Borrar Usuario -->
<div class="modal fade" id="delete_<?= $usuario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BorrarLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="BorrarLabel">Borrar Usuario ?</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de Borrar el registro?</p>
                <h2 class="text-center"><?= $usuario['nombre']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Cancelar</button>
                <form method="post" action="<?= FOLDER_PATH.'/Usuarios/eliminarUsuario' ?>">
                    <input name="id" type="hidden" value="<?= $usuario['id'] ;?>">
                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"
                            title="Borrar"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>