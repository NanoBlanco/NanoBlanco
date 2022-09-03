<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-solid fa-store"></i> Secciones</h1>
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
                <h5><i class="fa-solid fa-store"></i> Nueva Sección</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Secciones/guardarSeccion' ?>" id="form-seccion" class="form-horizontal" autocomplete="off">
                                <div class="form-group">
                                    <label for="id_ubicacion">Ubicación</label>
                                    <select class="selectUbica custom-select shadow-none" name="id_ubicacion" id="ubicacion" style="width: 100%; height: 36px">
                                        <option value=0>Seleccione una ubicación...</option>
                                        <?php foreach ($ubicaciones as $ubicacion) { ?>
                                        <option value="<?= $ubicacion['id'] ?>">
                                            <?= $ubicacion['area'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label for="id_departamento">Departamentos</label>
                                <select class="selectDptos custom-select shadow-none" id="dptos" name="id_departamento" style="width: 100%; height: 36px">
                                </select>
                                <div class="form-group">
                                    <label for="seccion">Sección</label>
                                    <input class="form-control" type="text" name="seccion" id="seccion" required placeholder="Sección">
                                </div>
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input class="form-control" type="text" name="responsable" id="responsable" required placeholder="Nombre del Responsable">
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
        $(".selectUbica").select2();
        $(".selectDptos").select2();
        APP.validacionGeneral('form-seccion');
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