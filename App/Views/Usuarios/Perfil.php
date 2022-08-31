<!---- Encabezado ------>
<?php include './App/Views/Templates/Header.php'; ?>

<!-- Main content -->
<main class="app-content">
    <!-- Content Header (Page header) -->
    <div class="app-title">
        <div>
            <h1><i class="fa-regular fa-address-card"></i> Perfil usuario</h1>
        </div>
    </div>
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline"
                            data-toggle="tab">Información</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Cambio de clave</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-timeline">
                    <div class="tile user-settings">
                        <h4 class="line-head">Información Personal</h4>
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <label for="nombre">Nombre Completo : </label>
                                    <input id="nombre" type="text" readonly value="<?= $_SESSION['user'] ;?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label for="correo">Correo : </label>
                                    <input id="correo" type="email" readonly value="<?= $_SESSION['email'] ;?>">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label for="estado">Estado : </label>
                                    <?php 
                                    if ($_SESSION['stat'] == 1) { 
                                        $estado= 'Activo'; 
                                    }else{
                                        $estado= 'Inactivo';
                                    } ?>
                                    <input id="estado" type="text" readonly value="<?= $estado; ?>">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label for="idRol">Tipo de Usuario : </label>
                                    <input id="idRol" type="text" readonly value="<?= $_SESSION['rol'] ;?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Cambio de Clave</h4>
                        <form method="post" action="" id="formClave" autocomplete="off">
                            <input type="hidden" name="txtToken" id="txtToken" value="">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="clave1">Nueva Clave</label>
                                    <input class="form-control" type="password" name="clave1" id="clave1">
                                </div>
                                <div class="col-md-4">
                                    <label for="clave2">Confirme la Clave</label>
                                    <input class="form-control" type="password" name="clave2" id="clave2">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row" id="mensajeError"></div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i> Guardar Cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
const base_url = "<?= './'; ?>";
</script>


<?php include './App/Views/Templates/Footer.php'; ?>