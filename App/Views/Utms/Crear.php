<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
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
                <h5><i class="fa fa-money"></i> Nuevo Utm</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Utms/guardarUtm' ?>" id="form-utm" autocomplete="off">
                                <div class="form-group">
                                    <label for="mes">Mes</label>
                                    <select class="selectMes custom-select shadow-none" name="mes" id="mes" style="width: 100%; height: 36px" required>
                                        <option value=0>Seleccione un Mes...</option>
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ano">Año</label>
                                    <input type="number" class="form-control" name="ano" required placeholder="Año del UTM">
                                </div>
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="number" class="form-control" name="valor" required placeholder="Valor del UTM">
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
        $(".selectMes").select2();
        APP.validacionGeneral('form-utm');
    });
</script>

<?php require './App/Views/Templates/Footer.php'; ?>
