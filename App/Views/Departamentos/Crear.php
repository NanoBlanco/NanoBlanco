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
                <h5><i class="fa-solid fa-sitemap"></i> Nuevo Departamento</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                        <form method="post" action="<?= FOLDER_PATH.'/Departamentos/guardarDepartamento' ?>" id="form-dptos" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <label for="id_item">Area</label>
                                <select class="selectUbica form-select shadow-none" name="id_ubicacion" id="id_ubicacion" style="width: 100%; height: 36px">
                                    <?php foreach ($ubicaciones as $ubicacion) { ?>
                                    <option value="<?=$ubicacion['id'] ?>">
                                        <?=$ubicacion['area'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                <input class="form-control" type="text" name="departamento" id="departamento" required autofocus placeholder="Departamento">
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
</section>

<?php require './App/Views/Templates/js.php'; ?>
<script>
    $(document).ready(function () {
        $(".selectUbica").select2();
        APP.validacionGeneral('form-dptos');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>