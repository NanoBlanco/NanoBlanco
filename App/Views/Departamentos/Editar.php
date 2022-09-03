<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-solid fa-sitemap"></i> Departamentos</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Departamentos'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-edit"></i> Editar Departamento</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form class="form-horizontal" method="post" action="<?= FOLDER_PATH.'/Departamentos/actualizarDepartamento' ?>" id="editaDpto" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $departamento->id ;?>">
                                <div class="form-group">
                                    <label for="id_ubicacion">Area</label>
                                    <select class="selectUbica form-select shadow-none" name="id_ubicacion" id="id_ubicacion" style="width: 100%; height: 36px">
                                        <?php foreach ($ubicaciones as $ubicacion) { ?>
                                        <option <?= intval($ubicacion['id']) === intval($departamento->id_ubicacion) ? "selected" : "" ?> value="<?=$ubicacion['id'] ?>"> 
                                            <?=$ubicacion['area'] ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="departamento">Departamento</label>
                                    <input class="form-control" type="text" name="departamento" id="departamento" required value="<?= $departamento->departamento ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input class="form-control" type="text" name="responsable" id="responsable" required value="<?= $departamento->responsable ;?>">
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
        $(".selectUbica").select2();
        $("#editaDpto").validate({
            rules: {
                departamento: "required",
                responsable: "required"
            },
            messages: {
                departamento: "Por favor ingrese el departamento",
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
