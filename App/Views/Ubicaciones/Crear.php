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
                <h5><i class="fa-solid fa-building"></i> Nueva Ubicación</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form id="form-ubica" method="post" action="<?= FOLDER_PATH.'/Ubicaciones/guardarUbicacion' ?>" class="form-horizontal" autocomplete="off">
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <input class="form-control" type="text" name="area" id="area" required autofocus placeholder="Nombre del área">
                                </div>
                                
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input class="form-control" type="text" name="direccion" id="direccion" required placeholder="Dirección del área">
                                </div>
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input class="form-control" type="text" name="responsable" id="responsable" required placeholder="Nombre del responsable">
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
        APP.validacionGeneral('form-ubica');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>
