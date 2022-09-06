<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
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
                <h5><i class="fa fa-edit"></i> Editar Sub Item</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/SubItems/actualizarSubItem' ?>" class="form-horizontal" 
                                id="editaSubItem" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $sub_item->id ;?>">
                                <div class="form-group">
                                    <label for="id_item">Item</label>
                                    <select required class="form-control" name="item_id" id="item_id">
                                        <?php foreach ($items as $item) { ?>
                                        <option <?= $item['item'] === $sub_item->item_id ? "selected" : "" ?> value="<?=$item['item'] ?>"> 
                                            <?=$item['descripcion'] ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item">Sub Item</label>
                                    <input class="form-control" type="text" name="sub_item" id="sub_item" required value="<?= $sub_item->sub_item ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" required value="<?= $sub_item->descripcion ;?>">
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
        $("#editaSubItem").validate({
            rules: {
                sub_item: {
                        required: true,
                        minlength: 3,
                        maxlength: 3
                    },
                    descripcion: "required",
            },
            messages: {
                sub_item: {
                        required: "Por favor ingrese el item",
                        minlength: "El item debe tener minimo 3 digitos",
                        maxlength: "El item debe tener máximo 3 digitos"
                    },
                    descripcion: "Por favor ingrese la descripción",
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
