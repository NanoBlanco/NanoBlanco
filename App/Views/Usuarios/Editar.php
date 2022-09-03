<!---- Encabezado ------>
<?php require './App/Views/Templates/Header.php'; ?>

<section class="app-content">
    <div class="app-title">
        <!-- Content Header (Page header) -->
        <div class="float-left">
            <h1><i class="fa fa-users"></i> Usuarios</h1>
        </div>
        <div class="float-right">
            <a href="<?= FOLDER_PATH.'/Usuarios'; ?>" class="btn btn-outline-success">
                <i class="fa fa-reply" aria-hidden="true"></i> Regresar al listado
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h5><i class="fa fa-user"></i> Edita Usuario</h5>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="<?= FOLDER_PATH.'/Usuarios/actualizarUsuario' ?>" 
                                id="editaUsuario" autocomplete="off">
                                <input name="id" type="hidden" value="<?= $usuario->id ;?>">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $usuario->nombre ;?>" autofocus required >
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input class="form-control" type="email" name="correo" id="correo" value="<?= $usuario->correo ;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="idRol">Tipo de Usuario</label>
                                    <select required class="form-control" name="idRol" id="idRol">
                                        <?php foreach ($roles as $rol) { ?>
                                        <option <?= intval($usuario->id_rol) === intval($rol['id']) ? "selected" : "" ?>
                                            value="<?= $rol['id'] ?>"><?=htmlentities($rol['rol']) ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-control" id="estado" name="estado" required>
                                        <option value="1" <?php if ($usuario->estado == 1) { echo 'selected=""'; } ?>> Activo
                                            <?php if ($usuario->estado == 1) { echo '(Actual)'; } ?>
                                        </option>
                                        <option value="0" <?php if ($usuario->estado == 0) { echo 'selected=""'; } ?>> Inactivo
                                            <?php if ($usuario->estado == 0) { echo '(Actual)'; } ?>
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                                    Guardar</button>

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
        $("#editaUsuario").validate({
        rules: {
            nombre: {
                    required: true,
                    minlength: 8
            },
            correo: {
					required: true,
					email: true
					}
        },
        messages: {
            nombre: {
                required: "Por favor ingrese el nombre",
                minlength: "El Item debe tener al menos 8 caracteres"
            },
            correo: "Por favor ingrese un correo válido"
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
    });
</script>
<?php require './App/Views/Templates/Footer.php'; ?>
