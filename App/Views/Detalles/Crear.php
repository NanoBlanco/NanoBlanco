<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-solid fa-bullseye"></i> Detalles</h1>
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
                                <div class="form-group">
                                    <label for="item_id">Item</label>
                                    <select class="selectItems custom-select shadow-none" name="item_id" id="item" style="width: 100%; height: 36px">
                                        <option value=0>Seleccione un Item...</option>
                                        <?php foreach ($items as $item) { ?>
                                            <option value="<?= $item['item'] ?>">
                                                <?= $item['descripcion'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_item_id">Sub Item</label>
                                    <select class="select2 custom-select shadow-none" name="sub_item_id" id="sub_items" style="width: 100%; height: 36px">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="detalle">Detalle</label>
                                    <input class="form-control" type="text" name="detalle" id="detalle" required placeholder="Codigo Detalle">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" required placeholder="Descripcion del detalle">
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
        //$(".selectItems").select2();
        $(".select2").select2();
        $("#form-detalle").validate({
            rules: {
                detalle: {
                    required: true,
                    minlength: 3,
                    maxlength: 3
                },
                descripcion: "required",
            },
            messages: {
                detalle: {
                    required: "Por favor ingrese el detalle",
                    minlength: "El detalle debe tener minimo 3 digitos",
                    maxlength: "El detalle debe tener máximo 3 digitos"
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
        $('#item').on('change', function(){
            var id = $('#item').val()
            $.ajax({
                type:"POST",
                url:"../Detalles/cargarSubItems",
                data:{ "item_id" : id },
                success: function(resp) {
                    $('#sub_items').html(resp);
                },
                fail: function() {
                    alert('Hubo un problema con los sub items');
                }
            });
        })
    });
</script>

<?php require './App/Views/Templates/Footer.php'; ?>