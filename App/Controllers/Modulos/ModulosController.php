<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Modulos/ModulosModel.php';
require_once LIBS_ROUTE .'Session.php';
 
/**
* Controlador de Modulos
*/
class ModulosController extends Controller
{ 
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new ModulosModel;
        $this->session = new Session();
        $this->session->init();
      
        if($this->session->getStatus() === 1 || empty($this->session->get('email')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->show();
    }

    public function show($view='', $alert='')
    {
        $modulos = $this->model->todos();
        $this->render(__CLASS__, $view, array('modulos' => $modulos, 'alert'=> $alert)); 
    }

    public function guardarModulo()
    {
        if (isset($_POST["modulo"]) && !empty($_POST["modulo"]) && isset($_POST["descripcion"]) )
        {
            $existe = $this->model->revisaModulo($_POST["modulo"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["modulo"],$_POST["descripcion"]);
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
        header('location: ../Modulos/?alert='.$alert);
    }

    public function actualizarModulo()
    {
        if (isset($_POST["modulo"]) && !empty($_POST["modulo"]) && isset($_POST["id"]) && isset($_POST["descripcion"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["modulo"], $_POST['descripcion']);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }

        }else{
            $alert='error2';
        }
        header('location: ../Modulos/?alert='.$alert);
    }

    public function eliminarModulo()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Modulos/?alert='.$alert);
    }
}