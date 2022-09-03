<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-solid fa-sitemap"></i> Secciones</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Secciones'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-edit"></i> Editar Sección</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form class="form-horizontal" method="post" action="<?= FOLDER_PATH.'/Secciones/actualizarSeccion' ?>" id="editaSeccion" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $seccion->id ?>">
                                <div class="form-group">
                                    <label for="id_ubicacion">Area</label>
                                    <select class="selectUbica custom-select shadow-none" name="id_ubicacion" id="ubicacion" style="width: 100%; height: 36px">
                                        <?php foreach ($ubicaciones as $ubicacion) { ?>
                                        <option <?= intval($ubicacion['id']) === intval($seccion->id_ubicacion) ? "selected" : "" ?> value="<?= $ubicacion['id'] ?>">
                                            <?= $ubicacion['area'] ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_departamento">Departamento</label>
                                    <select class="selectDpto custom-select shadow-none" name="id_departamento" id="dptos" style="width: 100%; height: 36px">
                                        <?php  foreach ($departamentos as $departamento) {  ?>
                                        <option <?= intval($departamento['id']) === intval($seccion->id_departamento) ? "selected" : ""  ?> value="<?= $departamento['id']  ?>"> <?= $departamento['departamento'] ?>
                                    </option>
                                    <?php  }  ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="seccion">Sección</label>
                                    <input class="form-control" type="text" name="seccion" id="seccion" required value="<?= $seccion->seccion ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input class="form-control" type="text" name="responsable" id="responsable" required value="<?= $seccion->responsable ;?>">
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
        $(".selectDpto").select2();
        $("#editaSeccion").validate({
            rules: {
                seccion: "required",
                responsable: "required"
            },
            messages: {
                seccion: "Por favor ingrese la sección",
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
        $('#ubicacion').on('change', function(){
            var id = $('#ubicacion').val()
            $.ajax({
                type:"POST",
                url:"../Secciones/cargarDptos",
                data:{ "id_ubicacion" : id },
                success: function(resp) {
                    $('#dptos').html(resp);
                },
                fail: function() {
                    alert('Hubo un problema con los departamentos');
                }
            });
        })
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>