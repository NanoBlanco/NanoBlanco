<!-- Modal Editar Item -->
<div class="modal fade" id="edit_<?php echo $detalle['id']; ?>" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-labelledby="editarItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarItemLabel"><i class="fa fa-edit"></i> Editar Detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Detalles/actualizarDetalle' ?>" id="form-detalle" class="form-horizontal" autocomplete="off">
                            <input name="id" type="hidden" value="<?= $detalle['id'] ?>">
                            <div class="form-group">
                                <label for="id_item">Item</label>
                                <select required class="form-control" name="item_id" id="lista3">
                                    <?php foreach ($items as $item) { ?>
                                    <option <?= intval($item['id']) === intval($detalle['item_id']) ? "selected" : "" ?> value="<?= $item['id'] ?>">
                                        <?= $item['item'] ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sub_item">Sub-Item</label>
                                <select required class="form-control" name="item_id" id="item_id">
                                    <?php  foreach ($sub_items as $sub_item) {  ?>
                                    <option <?= intval($sub_item['id']) === intval($detalle['sub_item_id']) ? "selected" : ""  ?> value="<?= $sub_item['id']  ?>"> <?= $sub_item['sub_item'] ?>
                                </option>
                                <?php  }  ?> 
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input class="form-control" type="text" name="detalle" id="detalle" required value="<?= $detalle['detalle'] ;?>">
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
<div class="modal fade" id="delete_<?= $detalle['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BorrarLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="BorrarLabel">Borrar Detalle ?</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de Borrar el registro?</p>
                <h2 class="text-center"><?= $detalle['detalle']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Cancelar</button>
                <form method="post" action="<?= FOLDER_PATH.'/Detalles/eliminarDetalle' ?>">
                    <input name="id" type="hidden" value="<?= $detalle['id'] ;?>">
                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>