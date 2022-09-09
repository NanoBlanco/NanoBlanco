<?php
defined('BASEPATH') or exit('No se permite acceso directo');

/**
* Valida la existencia de controladores y metodos
*/
class CoreHelper
{
    public static function validateController($controller)
    {
        if(!is_file(PATH_CONTROLLERS . "{$controller}/{$controller}Controller.php")){
        return false;
        }
        
        return true;
    }

    public static function validateMethodController($controller, $method)
    {
        if(!method_exists($controller, $method))
        return false;
        
        return true;
    }

    public function getModal(string $nameModal, $data)
    {
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once($view_modal);
    }

    // Envio de correos para reinicio de clave
    public static function sendEmail($data,$template)
    {
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;
        //ENVIO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        ob_start();
        require_once("./App/Views/Templates/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);
        return $send;
    }

    public static function getPermisos()
    {
        require_once "./App/Models/Roles/RolesModel.php";
        $objPermisos = new RolesModel();
        $idRol = $_SESSION['id_rol'];
        $_SESSION['permisos'] = $objPermisos->permisosModulo($idRol);
    }

    //Elimina exceso de espacios entre palabras
    public static function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    
    //Genera una contraseña de 10 caracteres
    public function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    
    //Genera un token
    public static function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }

    public function generaCodeQr()
    {
        if(isset($_POST) && !empty($_POST)) {
            include("./Assets/Libs/phpqrcode/qrlib.php"); 
            $codesDir = "./Assets/Libs/codigosqr/";   
            $codeFile = date('d-m-Y-h-i-s').'.png';
            QRcode::png($_POST['formData'], $codesDir.$codeFile, $_POST['ecc'], $_POST['size']); 
            echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
        } else {
            return false;
        }
    }

}