<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-brands fa-buromobelexperte"></i> Sub-Items</h1>
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
                <h5><i class="fa fa-edit"></i> Editar Detalle</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Detalles/actualizarDetalle' ?>" id="editaDetalles" class="form-horizontal" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $detalle->id ?>">
                                <div class="form-group">
                                    <label for="id_item">Sub Item</label>
                                    <select class="selectDet form-select shadow-none" name="sub_item_id" id="sub_item_id" style="width: 100%; height: 36px">
                                        <?php foreach ($sub_items as $sub_item) { ?>
                                        <option <?= intval($sub_item['id']) === intval($detalle->sub_item_id) ? "selected" : "" ?> value="<?= $sub_item['id'] ?>">
                                            <?= $sub_item['sub_item'] ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="detalle">Detalle</label>
                                    <input class="form-control" type="text" name="detalle" id="detalle" required value="<?= $detalle->detalle ;?>">
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
<script type="text/javascript">
    $(document).ready(function () {
        $(".selectDet").select2();

        $("#editaDetalles").validate({
            rules: {
                detalle: "required"
            },
            messages: {
                detalle: "Por favor ingrese el detalle"
            },

            errorElement: 'div',
            errorClass: 'invalid-feedback',
            focusInvalid: false,
            ignore: "",
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            success: function (element) {
                $(element).removeClass('is-invalid');
            },
            errorPlacement: function (error, element) {
                if (element.closest('.bootsrap-select').length > 0) {
                    element.closest('.bootsrap-select').find('.bs-placeholder').after(error);
                } else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
                    element.next().after(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>