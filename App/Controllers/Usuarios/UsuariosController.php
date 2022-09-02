<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Usuarios/UsuariosModel.php';
require_once ROOT.MODL .'Roles/RolesModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de Usuarios
*/
class UsuariosController extends Controller 
{ 
    private $model;
    private $modelRol;
    private $session;

    public function __construct()
    {
        $this->model = new UsuariosModel;
        $this->modelRol = new RolesModel;
        $this->session = new Session();
        $this->session->init();

        // session_start();
        // session_regenerate_id(true);
        // if(empty($_SESSION['login']))
        // {
        //     header('Location: '.FOLDER_PATH.'/Login');
        // }

        if($this->session->getStatus() === 1 || empty($this->session->get('email')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->show();
    }

    public function show($view='', $alert='')
    {
        $usuarios = $this->model->todos();
        $roles = $this->modelRol->todos();
        $this->render(__CLASS__, $view, array('usuarios' => $usuarios, 'roles'=>$roles, 'alert'=> $alert)); 
    }

    public function guardarUsuario()
    {
        if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["correo"]) )
        {
            $existe = $this->model->revisaUsuario($_POST["correo"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["nombre"], $_POST["correo"], $_POST['pass'], $_POST['idRol'], $_POST['estado']);
                if($inserto > 0){
                    $alert = 'registrado';
                } else {
                    $alert = 'error1';
                }
            }else{
                $alert='errorE';
            }
        }else{
            $alert = 'error2';
        }
        header('location: ../Usuarios/?alert='.$alert);
    }

    public function actualizarUsuario()
    {
        if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"]) && isset($_POST["correo"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["nombre"], $_POST['correo'], $_POST['idRol'], $_POST['estado']);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }

        }else{
            $alert='error2';
        }
        header('location: ../Usuarios/?alert='.$alert);
    }

    public function eliminarUsuario()
    {
        $alert = '';
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $this->model->eliminar($_POST["id"]);
            $alert='eliminado';
        }
        header('location: ../Usuarios/?alert='.$alert);
    }

    public function perfil()
    {
        $view='Perfil';
        $this->render(__CLASS__, $view, array());
        exit();
    }

    public function nuevoUsuario() {
        $view='crear';
        $this->render(__CLASS__, $view, array());
        exit();
    }

    public function editarUsuario() {
        var_dump($_POST["id"]);
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $usuario = $this->model->porId($_POST['id']);
            $roles = $this->modelRol->todos();
            $view='Editar';
            $this->render(__CLASS__, $view, array('usuario'=>$usuario, 'roles'=>$roles));
        }
        exit();
    }
    public function setPassword(){

        if(empty($_POST['clave1']) || empty($_POST['clave2'])) {
            $arrResponse = array('status' => false, 'msg' => 'Error de datos, Algún campo vacio' );
        }else{
            if(!empty($_POST['idUsuario'])) {
                $idUsuario = $_POST['idUsuario'];
            } else {
                $idUsuario = $_SESSION['idUsuario'];
            }
            $strPassword = $_POST['clave1'];
            $strPasswordConfirm = $_POST['clave2'];
            if($strPassword != $strPasswordConfirm){
                $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no son iguales.' );
            }else{
                $requestPass = $this->model->actualizaClave($idUsuario, $strPassword);
                if($requestPass->rowCount() > 0){
                    $arrResponse = array('status' => true, 'msg' => 'Clave reiniciada con éxito!');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intente más tarde.');
                }
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }
}