$('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
});

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function(e) {
            e.preventDefault();

            let strEmail = document.querySelector('#txtEmail').value;
            let strPassword = document.querySelector('#txtPassword').value;

            if (strEmail == "" || strPassword == "") {
                swal("Por favor", "Escribe usuario y contraseña.", "error");
                return false;
            } else {
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = './loginUser';
                var formData = new FormData(formLogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            window.location = '../../Home';
                        } else {
                            swal("Atención", objData.msg, "error");
                            document.querySelector('#txtPassword').value = "";
                        }
                    } else {
                        swal("Atención", "Error en el proceso", "error");
                    }
                    return false;
                }
            }
        }
    }

    if (document.querySelector("#formResetPass")) {
        let formResetPass = document.querySelector("#formResetPass");
        formResetPass.onsubmit = function(e) {
            e.preventDefault();
            let strEmail = document.querySelector('#emailReset').value;
            if (strEmail === "") {
                document.getElementById('alertLogin').className="alert alert-danger";
                document.getElementById('alertLogin').innerHTML = "El correo electrónico es necesario";
                return false;
            } else {
                var request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');

                var ajaxUrl = '/Login/resetPass';
                var formData = new FormData(formResetPass);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            document.getElementById('alertLogin').className="alert alert-success";
                            document.getElementById('alertLogin').innerHTML = objData.msg;                    
                            // window.location = '/activo';
                        } else {
                            document.getElementById('alertLogin').className="alert alert-danger";
                            document.getElementById('alertLogin').innerHTML = objData.msg;                    
                        }
                    } else {
                        document.getElementById('alertLogin').className="alert alert-danger";
                        document.getElementById('alertLogin').innerHTML = objData.msg;                    
                    }
                    return false;
                }
            }
        }
    }

    if (document.querySelector("#formClave")) {
        let formClave = document.querySelector("#formClave");
        formClave.onsubmit = function(e) {
            e.preventDefault();
            let token = document.querySelector('#txtToken').value;
            let strPassword = document.querySelector('#clave1').value;
            let strPasswordConfirm = document.querySelector('#clave2').value;

            if (strPassword === "" || strPasswordConfirm === "") {
                document.getElementById('mensajeError').className="alert alert-danger";
                document.getElementById('mensajeError').innerHTML = "Debe escribir la clave en ambos campos";
                return false;
            } else {
                if (strPassword.length < 8) {
                    document.getElementById('mensajeError').className="alert alert-danger";
                    document.getElementById('mensajeError').innerHTML = "La clave debe ser al menos de 8 caracteres";
                    return false;
                }
                if (strPassword != strPasswordConfirm) {
                    document.getElementById('mensajeError').className="alert alert-danger";
                    document.getElementById('mensajeError').innerHTML = "Las claves deben ser iguales";                    
                    return false;
                }

                var request = (window.XMLHttpRequest) ?
                    new XMLHttpRequest() :
                    new ActiveXObject('Microsoft.XMLHTTP');
                if (token === "") {
                    var ajaxUrl = '../../Usuarios/setPassword';
                } else {
                    var ajaxUrl = '../../../../Usuarios/setPassword';
                }
                var formData = new FormData(formClave);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            document.getElementById('mensajeError').className="alert alert-success";
                            document.getElementById('mensajeError').innerHTML = objData.msg;
                        } else {
                            document.getElementById('mensajeError').className="alert alert-danger";
                            document.getElementById('mensajeError').innerHTML = objData.msg;                        
                        }
                    } else {
                        document.getElementById('mensajeError').className="alert alert-danger";
                        document.getElementById('mensajeError').innerHTML = objData.msg;                    
                    }
                }
            }
        }
    }

}, false);