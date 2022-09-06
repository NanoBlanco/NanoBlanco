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
                                <input name="item_id" type="hidden" value="<?= $detalle->item_id ?>">
                                <input name="sub_item_id" type="hidden" value="<?= $sub_items->sub_item ?>">
                                <div class="form-group">
                                    <label for="item_id">Item</label>
                                    <select class="selectItems custom-select shadow-none" name="item_id" id="item" style="width: 100%; height: 36px">
                                        <?php foreach ($items as $item) { ?>
                                            <option <?= $item['item'] === $detalle->item_id ? "selected" : "" ?> value="<?= $item['item'] ?>">
                                                <?= $item['descripcion'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_item">Sub Item</label>
                                    <input class="form-control" type="text" name="sub_item" id="subItem" value="<?= $sub_items->descripcion ;?>">
                                    <select class="selectDet form-select shadow-none" name="sub_item_id" id="sub_item" style="width: 100%; height: 36px">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="detalle">Detalle</label>
                                    <input class="form-control" type="text" name="detalle" id="detalle" required value="<?= $detalle->detalle ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" required value="<?= $detalle->descripcion ;?>">
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
                    $('#subItem').val('');
                    $('#sub_item').html(resp);
                },
                fail: function() {
                    alert('Hubo un problema con los sub items');
                }
            });
        })
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>