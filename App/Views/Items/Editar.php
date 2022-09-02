<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-brands fa-buffer"></i> Items</h1>
        </div>
        <div class="float-right">
            <?php if(isset($_SESSION['permisos'][1]['ins']) == 1 || $_SESSION['id_rol'] = 100) {?>
                <a href="<?= FOLDER_PATH.'/Items'; ?>" class="btn btn-outline-success">
                    <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-edit"></i> Editar Item</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form class="form-horizontal" id="frmeditar_item" method="post" action="<?= FOLDER_PATH.'/Items/actualizarItem' ?>" autocomplete="off">
                                <input name="id" id="id" type="hidden" value="<?= $item->id ;?>">
                                <div class="form-group">
                                    <label for="item">Item</label>
                                    <input class="form-control" type="text" name="edit_item" id="edit_item" required autofocus value="<?= $item->item ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="edit_descripcion" id="edit_descripcion" required value="<?= $item->descripcion ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="cta_contable">Cuenta Contable</label>
                                    <input class="form-control" type="text" name="edit_cta_contable" id="edit_cta_contable" required value="<?= $item->cta_contable ;?>">
                                </div>
                                <button type="submit" id="editar" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Guardar
                                </button>
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
        $("#frmeditar_item").validate({
        rules: {
            edit_item: "required",
            edit_descripcion: "required",
            edit_cta_contable : "required"
        },
        messages: {
            edit_item: "Por favor ingrese el item",
            edit_descripcion: "Por favor ingrese la descripción",
            edit_cta_contable: "Por favor ingrese la cuenta contable"
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