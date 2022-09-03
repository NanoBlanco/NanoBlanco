<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa-brands fa-buffer"></i> Items</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Items'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa-brands fa-buffer"></i> Nuevo Item</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form id="form-items" method="post" action="<?= FOLDER_PATH.'/Items/guardarItem' ?>" class="form-horizontal" autocomplete="off">
                                <div class="form-group">
                                    <label for="item">Item</label>
                                    <input class="form-control" type="text" name="item" id="item" required autofocus placeholder="Nombre del Item">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" required placeholder="Descripción del Item">
                                </div>
                                <div class="form-group">
                                    <label for="cta_contable">Cuenta Contable</label>
                                    <input class="form-control" type="text" name="cta_contable" id="cta_contable" required placeholder="141-XX">
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
        APP.validacionGeneral('form-items');
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>