<?php
include 'conexion.php';
$user = $_POST['usuario'];
$pass = md5($_POST['pass']);

$sentencia = $db->prepare("SELECT * FROM usuarios WHERE correo = ?;");
$sentencia->execute([$user]);

if(!$sentencia->rowCount())
    return false;
        
$result = $sentencia->fetch(PDO::FETCH_OBJ);
        
if(!password_verify(md5($_POST['pass']), $result->pass))
    return false;
        
//        if($result->estado==0) 
//          return $this->renderErrorMessage("El usuario está Inactivo, hablé con el administrador");
        

//$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
if ($result)
    echo json_encode($resultado,JSON_UNESCAPED_UNICODE);

$sentencia = NULL;
$db = NULL;