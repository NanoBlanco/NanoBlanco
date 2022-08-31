<!-- <footer>
    <div>
        <b><small>Version 1.3</small></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://rbservicios.cl">RB Servicios SPA</a>.</strong>
    Derechos
    reservados.
</footer> -->

<!-- Essential javascripts for application to work-->  
<script type="text/javascript" src="<?= ASSETS.'/js/jquery-3.3.1.min.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/popper.min.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/bootstrap.min.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/functions_login.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/main.js' ?>"></script>

<!-- The javascript plugin to display page loading on top-->
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/pace.min.js' ?>"></script>

<!-- Page specific javascripts-->
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/select2.min.js'?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/bootstrap-datepicker.min.js'?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/dropzone.js'?>"></script>

<!-- Data table plugin-->
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/jquery-steps/build/jquery.steps.min.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/jquery-validation/dist/jquery.validate.min.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/jquery-validation/dist/localization/messages_es_AR.js' ?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?= ASSETS.'/js/plugins/dataTables.bootstrap.min.js'?>"></script>

<script type="text/javascript">
	// Validacion de entrada de campos en los form
	const formulario = $("#myform-general");
	formulario.validate({
		rules: {},
		messages: {},
		errorPlacement: function (error, element) {
			if (element.closest('.bootsrap-select').length > 0) {
				element.closest('.bootsrap-select').find('.bs-placeholder').after(error);
			} else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
				element.next().after(error);
			} else {
				error.insertAfter(element);
			}
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
		invalidHandler: function (event, validator) {	
		},
		submitHandler: function (form) {
			return true;
		}
	});		
</script>

<script type="text/javascript">
	// JQuery Steps
	// Basic Example with form
	var form = $("#example-form");
	form.validate({
	errorPlacement: function errorPlacement(error, element) {
		element.before(error);
	},
	rules: {
		confirm: {
		equalTo: "#password",
		},
	},
	});
	form.children("div").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	onStepChanging: function (event, currentIndex, newIndex) {
		form.validate().settings.ignore = ":disabled,:hidden";
		return form.valid();
	},
	onFinishing: function (event, currentIndex) {
		form.validate().settings.ignore = ":disabled";
		return form.valid();
	},
	onFinished: function (event, currentIndex) {
		alert("Submitted!");
	},
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		if($('#lista1').val() != ''){
			recargarLista();
		}

		$('#lista1').change(function(){
			recargarLista();
		});
		
		function recargarLista(){
			$.ajax({
				type:"POST",
				url:"./Detalles/cargarDatos",
				data:"item_id=" + $('#lista1').val(),
				success:function(r){
					$('#select2lista').html(r);
				}
			});
		}
	});
</script>

</body>
</html>