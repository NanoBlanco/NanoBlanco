<?php require('./App/Views/Templates/Header.php'); ?>

<div class="app-content">
    <div class="tile mb-4">
        <div class="card">
            <div class="card-body wizard-content">
                <h4 class="card-title">Ingreso Inmueble</h4>
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="#" class="mt-5">
                    <div>
                        <h3>Codificación</h3>
                        <section>
                            <label for="id_item">Item </label>
                            <select class="form-control" name="item_id" id="lista1" required>
                                <option value=0>Seleccione un Item...</option>
                                <?php foreach ($items as $item) { ?>
                                <option value="<?= $item['id'] ?>">
                                    <?= $item['item'] ?>
                                </option>
                                <?php } ?>
                            </select>
                            <label for="sub_item_id">Sub Item</label>
                            <select id="select2lista" name="sub_item_id" class="form-control" required>
                            </select>
                            <label for="detalle_id">Detalle</label>
                            <select id="select3lista" name="detalle_id" class="form-control" required>
                            </select>
                            <label for="codifica">Codificación</label>
                            <input id="codifica" name="codifica" type="text" class="required form-control" />
                        </section>
                        <h3>Ubicación</h3>
                        <section>
                            <label for="id_ubicacion">Area</label>
                            <select class="form-control" name="id_ubicacion" id="ubica" required>
                                <option value=0>Seleccione una ubicación...</option>
                                <?php foreach ($ubicaciones as $ubicacion) { ?>
                                <option value="<?= $ubicacion['id'] ?>">
                                    <?= $ubicacion['area'] ?>
                                </option>
                                <?php } ?>
                            </select>
                            <label for="id_departamento">Departamentos</label>
                            <select id="dptos" name="id_departamento" class="form-control" required>
                            </select>
                            <label for="id_seccion">Secciones</label>
                            <select id="listaseccion" name="id_seccion" class="form-control" required>
                            </select>
                        </section>
                        <h3>Detalle</h3>
                        <section>
                            <label for="tipo">Tipo de Bien</label>
                            <select class="form-control" name="tipo" id="tipo" required>
                                <option value=0>Seleccione un tipo...</option>
                                <option value=1>Patrimonial</option>
                                <option value=2>Control</option>
                                <option value=3>Numero 3</option>
                            </select>
                            <label for="adquisicion">Forma de Adquisición</label>
                            <select class="form-control" name="adquisicion" id="adquisicion" required>
                                <option value=0>Seleccione una forma...</option>
                                <option value=1>Financiado</option>
                                <option value=2>Donado</option>
                                <option value=3>Numero 3</option>
                            </select>
                            <label for="financiamiento">Financiamiento</label>
                            <select class="form-control" name="financiamiento" id="financiamiento" required>
                                <option value=0>Seleccione una opcion...</option>
                                <option value=1>Opcion 1</option>
                                <option value=2>Opcion 2</option>
                                <option value=3>Numero 3</option>
                            </select>
                            <label for="proyecto">Proyecto</label>
                            <input id="proyecto" name="proyecto" type="text" class="required form-control" />
                            <label for="fecha">Fecha de Adquisición</label>
                            <input id="fecha" name="fecha" type="date" class="required form-control" />
                        </section>
                            <h3>Finalizar</h3>
                        <section>
                            <div class="form-group">
                                <label class="control-label">Valor de Compra</label>
                                <div class="form-group">
                                    <label class="sr-only" for="valor">Valor </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                        <input class="form-control" type="number" name="valor" id="valor" placeholder="Valor">
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required" />
                            <label for="acceptTerms"> I agree with the Terms and Conditions.</label>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Tabs -->
    
    <!-- <div class="tile mb-4">
        <!-- Nav tabs -->
       <!-- <div class="bs-component">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#codigo">Codificación</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#details">Detalle</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#qr">Qr</a></li>
            </ul>
            <!-- Tab panes -->
          <!--  <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="codigo">
                  <form action="" method="post">
                    <label for="id_item">Item</label>
                    <input id="id_item" name="id_item" type="text" class="required form-control" />
                    <label for="password">Sub Item</label>
                    <input id="password" name="password" type="text" class="required form-control" />
                    <label for="confirm">Detalle</label>
                    <input id="confirm" name="confirm" type="text" class="required form-control" />
                  </form>
                </div>
                <div class="tab-pane fade" id="details">
                  <form action="" method="post">

                  </form>
                </div>
                <div class="tab-pane fade" id="qr">
                  <form action="" method="post">

                  </form>
                </div>
            </div>
        </div>
    </div> -->
</div>

<?php require './App/Views/Templates/js.php'; ?>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/mask/mask.init.jss' ?>"></script>
<?php require('./App/Views/Templates/Footer.php'); ?>