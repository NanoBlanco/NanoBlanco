<!-- Modal Borrar Item -->
<div class="modal fade" id="delete_<?= $vehiculo['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="BorrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="BorrarLabel">Borrar Vehiculo ?</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de Borrar el registro?</p>
                <h2 class="text-center"><?= $vehiculo['vehiculo']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Cancelar
                </button>
                <form method="post" action="<?= FOLDER_PATH.'/Vehiculos/eliminarVehiculo' ?>">
                    <input name="id" type="hidden" value="<?= $vehiculo['id'] ;?>">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-regular fa-trash-can" title="Borrar"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>