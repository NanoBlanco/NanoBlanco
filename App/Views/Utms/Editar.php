<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa fa-money"></i> UTMS</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Utms'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-edit"></i> Editar UTMs</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Utms/actualizarUtm' ?>" id="editaUtm" class="form-horizontal" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $utm->id ?>">
                                <div class="form-group">
                                    <label for="id_item">Mes</label>
                                    <select class="selectUtm form-select shadow-none" name="mes" id="mes" style="width: 100%; height: 36px">
                                        <option value="1" <?php if ($utm->mes == 1) { echo 'selected=""'; } ?>> Enero </option>
                                        <option value="1" <?php if ($utm->mes == 2) { echo 'selected=""'; } ?>> Febrero </option>
                                        <option value="1" <?php if ($utm->mes == 3) { echo 'selected=""'; } ?>> Marzo </option>
                                        <option value="1" <?php if ($utm->mes == 4) { echo 'selected=""'; } ?>> Abril </option>
                                        <option value="1" <?php if ($utm->mes == 5) { echo 'selected=""'; } ?>> Mayo </option>
                                        <option value="1" <?php if ($utm->mes == 6) { echo 'selected=""'; } ?>> Junio </option>
                                        <option value="1" <?php if ($utm->mes == 7) { echo 'selected=""'; } ?>> Julio </option>
                                        <option value="1" <?php if ($utm->mes == 8) { echo 'selected=""'; } ?>> Agosto </option>
                                        <option value="1" <?php if ($utm->mes == 9) { echo 'selected=""'; } ?>> Septiembre </option>
                                        <option value="1" <?php if ($utm->mes == 10) { echo 'selected=""'; } ?>> Octubre </option>
                                        <option value="1" <?php if ($utm->mes == 11) { echo 'selected=""'; } ?>> Noviembre </option>
                                        <option value="1" <?php if ($utm->mes == 12) { echo 'selected=""'; } ?>> Diciembres </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ano">Año</label>
                                    <input class="form-control" type="text" name="ano" id="ano" required value="<?= $utm->ano ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input class="form-control" type="text" name="valor" id="valor" required value="<?= $utm->valor ;?>">
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
        $(".selectUtm").select2();

        $("#editaUtm").validate({
            rules: {
                ano: "required",
                valor: {
                    required: true,
                    min: 0
                }
            },
            messages: {
                ano: "Por favor ingrese el año",
                valor: {
                    required: "Por favor ingrese el año",
                    min: "El valor debe ser mayor que 0"
                }
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