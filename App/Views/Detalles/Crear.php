<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-brands fa-buromobelexperte"></i> Detalles</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Detalles'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa-solid fa-bullseye"></i> Nuevo Detalle</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Detalles/guardarDetalle' ?>" id="form-detalle" class="form-horizontal" autocomplete="off">
                                <!-- <div class="form-group">
                                    <label for="id_item">Item</label>
                                    <select class="form-control" name="item_id" id="lista1" required>
                                        <option value=0>Seleccione un Item...</option>
                                        <?php foreach ($items as $item) { ?>
                                            <option value="<?= $item['id'] ?>">
                                                <?= $item['item'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="sub_item_id">Sub Item</label>
                                    <select id="select2lista" name="sub_item_id" class="form-control">
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="id_item">Sub Item</label>
                                    <select class="select2 form-select shadow-none" name="sub_item_id" id="sub_item_id" style="width: 100%; height: 36px">
                                    <!-- <select class="form-control" name="sub_item_id" id="sub_item_id" required> -->
                                        <option value=0>Seleccione un Sub Item...</option>
                                        <?php foreach ($sub_items as $sub_item) { ?>
                                            <option value="<?= $sub_item['id'] ?>">
                                                <?= $sub_item['sub_item'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="detalle">Detalle</label>
                                    <input class="form-control" type="text" name="detalle" id="detalle" required placeholder="Detalle">
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
        $(".select2").select2();
        APP.validacionGeneral('form-detalle');
    });
</script>

<?php require './App/Views/Templates/Footer.php'; ?>