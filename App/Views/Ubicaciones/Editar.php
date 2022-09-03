<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-solid fa-building"></i> Ubicación</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Ubicaciones'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-edit"></i> Editar Ubicación</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form class="form-horizontal" method="post" action="<?= FOLDER_PATH.'/Ubicaciones/actualizarUbicacion' ?>" id="editaUbica" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $ubicacion->id ;?>">
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <input class="form-control" type="text" name="area" id="area" required autofocus value="<?= $ubicacion->area ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input class="form-control" type="text" name="direccion" id="direccion" required value="<?= $ubicacion->direccion ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input class="form-control" type="text" name="responsable" id="responsable" required value="<?= $ubicacion->responsable ;?>">
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
        $("#editaUbica").validate({
            rules: {
                area: "required",
                direccion: "required",
                responsable : "required"
            },
            messages: {
                area: "Por favor ingrese el área",
                direccion: "Por favor ingrese la descripción",
                responsable: "Por favor ingrese el responsable"
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