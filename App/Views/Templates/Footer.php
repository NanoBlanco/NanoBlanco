		<script type="text/javascript">
			// Validacion de entrada de campos en los form
			var APP = function () {
			return {
				validacionGeneral: function (id, reglas, mensajes) {
					const formulario = $('#' + id);
					formulario.validate({
						rules: reglas,
						messages: mensajes,
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
						},
						invalidHandler: function (event, validator) {

						},
						submitHandler: function (form) {
							return true;
						}
					});
				}
			}
		}();

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
				//$('#lista1').val()
				recargarLista();
				
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

		<script type="text/javascript">
			$(document).ready(function(){
				//$('#select2lista').val()
				recargarDet();
				
				$('#select2lista').change(function(){
					recargarDet();
				});
				
				function recargarDet(){
					$.ajax({
						type:"POST",
						url:"./Inmuebles/cargarDetalles",
						data:"sub_item_id=" + $('#select2lista').val(),
						success:function(r){
							$('#select3lista').html(r);
						}
					});
				}
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				//$('#ubica').val()
				recargarDptos();
				
				$('#ubica').change(function(){
					recargarDptos();
				});
				
				function recargarDptos(){
					$.ajax({
						type:"POST",
						url:"./Secciones/cargarDatos",
						data:"id_ubicacion=" + $('#ubica').val(),
						success:function(r){
							$('#dptos').html(r);
						}
					});
				}
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				//$('#dptos').val()
				recargarDet();

				$('#dptos').change(function(){
					recargarDet();
				});
				
				function recargarDet(){
					$.ajax({
						type:"POST",
						url:"./Inmuebles/cargarSecciones",
						data:"dpto_id=" + $('#dptos').val(),
						success:function(r){
							$('#listaseccion').html(r);
						}
					});
				}
			});
		</script>
	</body>
</html>