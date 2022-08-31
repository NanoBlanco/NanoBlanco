<?php require('./App/Views/Templates/Header.php'); ?>

<!-- <main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Tablero</h1>
            <p>breve descripcion</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">Indicadores de Gestion</div>
            </div>
        </div>
    </div>
</main> -->


<div class="app-content">
    <!-- ============================================================== -->
    <!-- tile  -->
    <!-- ============================================================== -->
    <div class="tile mb-4">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-body wizard-content">
                <h4 class="card-title">Ingreso Inmueble</h4>
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="#" class="mt-5">
                    <div>
                        <h3>Codificación</h3>
                        <section>
                            <label for="userName">User name *</label>
                            <input id="userName" name="userName" type="text" class="required form-control" />
                            <label for="password">Password *</label>
                            <input id="password" name="password" type="text" class="required form-control" />
                            <label for="confirm">Confirm Password *</label>
                            <input id="confirm" name="confirm" type="text" class="required form-control" />
                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Detalle</h3>
                        <section>
                            <label for="name">First name *</label>
                            <input id="name" name="name" type="text" class="required form-control" />
                            <label for="surname">Last name *</label>
                            <input id="surname" name="surname" type="text" class="required form-control" />
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="email" class="required email form-control" />
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control" />
                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Código y Foto</h3>
                        <section>
                            <ul>
                                <li>Foo</li>
                                <li>Bar</li>
                                <li>Foobar</li>
                            </ul>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End tile  -->
    <!-- ============================================================== -->
    
    <!-- Tabs -->
    
    <div class="tile mb-4">
        <!-- Nav tabs -->
        <div class="bs-component">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#other">Other</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home">
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                </div>
                <div class="tab-pane fade" id="profile">
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                </div>
                <div class="tab-pane fade" id="other">
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by
        <a href="https://www.wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

  
<?php require('./App/Views/Templates/Footer.php'); ?>