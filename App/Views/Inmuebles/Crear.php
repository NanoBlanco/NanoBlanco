<?php require('./App/Views/Templates/Header.php'); ?>

<div class="app-content">
    <div class="app-title">
        <div class="float-left">
            <h1><i class="fa-solid fa-building-circle-check"></i> Inmuebles</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Inmuebles'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
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
                            <select class="select2 custom-select shadow-none" name="item_id" id="listaItems" style="width: 100%; height: 36px" required>
                                <option value=0>Seleccione un Item...</option>
                                <option value='008'>EDIFICACIONES</option>
                                <option value='012'>TERRENO</option>
                                <!-- <?php foreach ($items as $item) { ?>
                                <option value="<?= $item['item'] ?>">
                                    <?= $item['descripcion'] ?>
                                </option>
                                <?php } ?> -->
                            </select>
                            <label for="sub_item_id">Sub Item</label>
                            <select class="select2 custom-select shadow-none" id="listaSub_Items" name="sub_item_id" style="width: 100%; height: 36px" required>
                            </select>
                            <label for="detalle_id">Detalle</label>
                            <select class="select2 custom-select shadow-none" id="listaDetalles" name="detalle_id" style="width: 100%; height: 36px" required>
                            </select>
                            <label for="codifica">Codificación</label>
                            <input type="hidden" id="corr_inmueble" name="corr_inmueble" />
                            <input class="form-control" type="text" id="codifica" name="codifica" readonly/>
                        </section>
                        <h3>Datos</h3>
                        <section>
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección del inmueble" required>
                            
                            <label for="no_rol">No de Rol</label>
                            <input type="text" class="form-control" name="no_rol" id="no_rol" placeholder="Rol del inmueble" required>

                            <label for="destino">Destino del Inmnueble</label>
                            <input type="text" class="form-control" name="destino" id="destino" placeholder="Destino del inmueble" required>

                            <label for="escritura">Escritura</label>
                            <input type="text" class="form-control" name="escritura" id="escritura" placeholder="No de escritura del inmueble" required>

                            <label for="cbr">Inscripción CBR</label>
                            <input type="text" class="form-control" name="cbr" id="cbr" placeholder="Inscripción CBR del inmueble" required>

                            <label for="comodato">Comodato</label>
                            <input type="text" class="form-control" name="comodato" id="comodato" placeholder="No comodato del inmueble" required>
                        </section>

                        <h3>Detalle</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="fechaAdq">Fecha de Adquisición</label>
                                        <input class="form-control" type="date" id="fechaAdq" name="fechaAdq" required/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Valor de Compra / Avaluo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input class="required form-control" type="text" name="valor" id="valor" data-inputmask='"mask": "999.999.999"' data-mask>
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                        </div>
                                    </div>
                                    <input class="form-control" type="hidden" id="tipodeinm" name="tipodeinm" />

                                    <div class="form-group">
                                        <label for="tipo">Valor Actual</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input class="form-control" type="text" id="valor_actual" name="valor_actual" readonly/>
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                        </div>
                                    </div>

                                    <!-- <label for="tipoBien">Tipo de Bien</label>
                                    <input class="form-control" type="text" id="tipoBien" name="tipoBien" readonly /> -->

                                    <label for="medidas" id="medida">Medidas </label>
                                    <input class="required form-control" type="number" id="medidas" name="medidas" />

                                </div>
                                <div class="col-lg-5 offset-lg-1">

                                    <label for="adquisicion">Forma de Adquisición</label>
                                    <select class="form-control" name="adquisicion" id="adquisicion" required>
                                        <option value=0>Seleccione una forma...</option>
                                        <option value=1>Financiado</option>
                                        <option value=2>Donado</option>
                                        <option value=3>Comprado</option>
                                    </select>
                                    <label for="financiamiento">Financiamiento</label>
                                    <select class="form-control" name="financiamiento" id="financiamiento" required>
                                        <option value=0>Seleccione un financiamiento</option>
                                        <option value=1>Fondos  Propios</option>
                                        <option value=2>Fondos Externos</option>
                                        <option value=3>Fondos Mixtos</option>
                                    </select>
                                    
                                    <label for="proyecto">Proyecto</label>
                                    <input id="proyecto" name="proyecto" type="text" class="required form-control" />
                                    
                                    <label for="fec_incorpora">Fecha de incorporación</label>
                                    <input id="fec_incorpora" name="fec_incorpora" type="date" class="required form-control" />
                                    
                                    <label for="alta">No de alta</label>
                                    <input id="alta" name="alta" type="text" class="required form-control" />
                                    
                                </div>
                            </div>
                        </section>
                            <h3>Finalizar</h3>
                        <section>
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
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/inputmask/jquery.inputmask.min.js' ?>"></script>
<script>
    //$(".select2").select2();
    //Money Euro
    $('[data-mask]').inputmask()
    $(document).ready(function(){

        // Carga lista de Sub Items
        $('#listaItems').change(function(){
            $.ajax({
                type:"POST",
                url:"../Detalles/cargarSubItems",
                data: {
                    "item_id" : $('#listaItems').val()
                },
                success:function(r){
                    $('#listaSub_Items').html(r);
                }
            });
        });
    
        // Carga lista de Detalles
        $('#listaSub_Items').change(function(){
            $.ajax({
                type:"POST",
                url:"../Inmuebles/cargarDetalles",
                data: {
                    "cuenta_subitem" : $('#listaItems').val()+$('#listaSub_Items').val()
                },
                success:function(r){
                    $('#listaDetalles').html(r);
                }
            });
        });

        // Crea codificación
        $('#listaDetalles').on('change', function() {
            $.ajax({
                type:"POST",
                url:"../Inmuebles/creaCode",
                data: {
                    "detalle_id" : $('#listaItems').val()+$('#listaSub_Items').val()+$('#listaDetalles').val()
                },
                success:function(r){
                    $('#corr_inmueble').val(r);
                    $('#codifica').val($('#listaItems').val()+'-'+$('#listaSub_Items').val()+'-'+$('#listaDetalles').val()+'-'+r);
                }
            });
            $('#tipodeinm').val($("#listaDetalles option:selected").text());
            if($('#tipodeinm').val() == 'TERRENO') {
                document.getElementById('medida').innerHTML = 'Medida en mts cuadrados';
            } else if ($('#tipodeinm').val() == 'CONTAINERS') {
                document.getElementById('medida').innerHTML = 'Medida de dimensión';
            } else {
                document.getElementById('medida').innerHTML = 'Medida de construcción'; 
            }
        });

        // Carga lista de Departamentos
        $('#listaubicacion').change(function(){
            $.ajax({
                type:"POST",
                url:"../Secciones/cargarDptos",
                data: {
                    "id_ubicacion" : $('#listaubicacion').val()
                },
                success:function(r){
                    $('#listadptos').html(r);
                }
            });
        });

        // Carga lista de Secciones
        $('#listadptos').change(function(){
            $.ajax({
                type:"POST",
                url:"../Inmuebles/cargarSecciones",
                data: {
                    "dpto_id" : $('#listadptos').val()
                },
                success:function(r){
                    $('#listaseccion').html(r);
                }
            });
        });
        
        // Crea Tipo de Bien
        // $('#valor').on('change', function() {
        //     fecha = new Date($('#fechaAdq').val());
        //     $.ajax({
        //         type:"POST",
        //         url:"../Inmuebles/cargarTipo", 
        //         data: {
        //             "ano" : fecha.getFullYear(),
        //             "mes": fecha.getMonth(),
        //             "valor" : $('#valor').val()
        //         },
        //         success:function(r){
        //             $('#tipoBien').val(r);
        //         }
        //     });
        // });
        

    });

</script>
<?php require('./App/Views/Templates/Footer.php'); ?>