<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Ubicaciones/UbicacionesModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de Ubicaciones
*/
class UbicacionesController extends Controller
{ 
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new UbicacionesModel;
        $this->session = new Session();
        $this->session->init();
      
        if($this->session->getStatus() === 1 || empty($this->session->get('email')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->show();
    }

    public function show($view='',$alert='')
    {
        $ubicaciones = $this->model->todos();
        $this->render(__CLASS__, $view, array('ubicaciones' => $ubicaciones, 'alert'=> $alert)); 
    }

    public function guardarUbicacion()
    {
        if (isset($_POST["area"]) && !empty($_POST["area"]) && isset($_POST["direccion"]) && !empty($_POST["direccion"]) && isset($_POST["responsable"]) && !empty($_POST["responsable"]))
        {
            $existe = $this->model->porArea($_POST["area"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["area"],$_POST["direccion"],$_POST["responsable"]);
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
        header('location: ../Ubicaciones/?alert='.$alert);
    }

    public function actualizarUbicacion()
    {
        if (isset($_POST["area"]) && !empty($_POST["area"]) && isset($_POST["id"]) && isset($_POST["direccion"]) && isset($_POST["responsable"]) && !empty($_POST["responsable"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["area"], $_POST['direccion'], $_POST["responsable"]);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }
        }else{
            $alert='error2';
        }
        header('location: ../Ubicaciones/?alert='.$alert);
    }

    public function nuevaUbicacion()
    {
        $view='Crear';
        $this->render(__CLASS__, $view, array());
        exit();
    }

    public function editarUbicacion() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $ubicacion = $this->model->porId($_POST['id']);
            $view='Editar';
            $this->render(__CLASS__, $view, array('ubicacion'=>$ubicacion));
        }
        exit();
    }

    public function eliminarUbicacion()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Ubicaciones/?alert='.$alert);
    }

}