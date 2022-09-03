<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-brands fa-buromobelexperte"></i> Sub-Items</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/SubItems'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa-brands fa-buromobelexperte"></i> Nuevo Sub-item</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/SubItems/guardarSubItem' ?>" id="form-sitem" class="form-horizontal" autocomplete="off">
                                <div class="form-group">
                                    <label for="id_item">Item</label>
                                    <select required class="form-control" name="item_id" id="item_id">
                                        <?php foreach ($items as $item) { ?>
                                        <option value="<?=$item['id'] ?>">
                                            <?=$item['item'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item">Sub-Item</label>
                                    <input class="form-control" type="text" name="sub_item" id="sub_item" required autofocus placeholder="Nombre del Sub-Item">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" required placeholder="Descripción del Sub-Item">
                                </div>
                                <div class="form-group">
                                    <label for="cta_contable">Cuenta Contable</label>
                                    <input class="form-control" type="text" name="cta_contable" id="cta_contable" required placeholder="XX">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require './App/Views/Templates/js.php'; ?>
<script>
    $(document).ready(function () {
        APP.validacionGeneral('form-sitem');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>