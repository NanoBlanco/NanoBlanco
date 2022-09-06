<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-brands fa-buffer"></i> Items</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Items'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
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
                                    <input class="form-control" type="text" name="edit_item" id="edit_item" value="<?= $item->item ;?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="edit_descripcion" id="edit_descripcion" required value="<?= $item->descripcion ;?>">
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
                edit_item: {
                    required: true,
                    minlength: 3,
                    maxlength: 3
                },
                edit_descripcion: "required",
            },
            messages: {
                edit_item: {
                    required: "Por favor ingrese el item",
                    minlength: "El item debe tener minimo 3 digitos",
                    maxlength: "El item debe tener máximo 3 digitos"
                },
                edit_descripcion: "Por favor ingrese la descripción",
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