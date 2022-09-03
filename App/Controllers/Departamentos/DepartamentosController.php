<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Departamentos/DepartamentosModel.php';
require_once ROOT.MODL .'Ubicaciones/UbicacionesModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de Departamentos
*/
class DepartamentosController extends Controller
{ 
    private $model;
    private $model_area;
    private $session;

    public function __construct()
    {
        $this->model = new DepartamentosModel;
        $this->model_area = new UbicacionesModel;
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
        $ubicaciones = $this->model_area->todos();
        $departamentos = $this->model->todos();
        $this->render(__CLASS__, $view, array('ubicaciones' => $ubicaciones, 'departamentos'=> $departamentos, 'alert'=> $alert)); 
    }

    public function guardarDepartamento()
    {
        if (isset($_POST["id_ubicacion"]) && !empty($_POST["id_ubicacion"]) && isset($_POST["departamento"]) && !empty($_POST["departamento"]) && isset($_POST["responsable"]) && !empty($_POST["responsable"]))
        {
            $existe = $this->model->porDepartamento($_POST["departamento"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["id_ubicacion"], $_POST["departamento"], $_POST["responsable"]);
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
        header('location: ../Departamentos/?alert='.$alert);
    }

    public function actualizarDepartamento()
    {
        if (isset($_POST["id_ubicacion"]) && !empty($_POST["id_ubicacion"]) && isset($_POST["departamento"]) && !empty($_POST["departamento"]) && isset($_POST["responsable"]) && !empty($_POST["responsable"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["id_ubicacion"],$_POST["departamento"],$_POST["responsable"]);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }
        }else{
            $alert='error2';
        }
        header('location: ../Departamentos/?alert='.$alert);
    }

    public function nuevoDpto()
    {
        $ubicaciones = $this->model_area->todos();
        $view='Crear';
        $this->render(__CLASS__, $view, array('ubicaciones'=>$ubicaciones));
        exit();
    }

    public function editarDpto() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $departamento = $this->model->porId($_POST['id']);
            $ubicaciones = $this->model_area->todos();
            $view='Editar';
            $this->render(__CLASS__, $view, array('departamento'=>$departamento, 'ubicaciones'=>$ubicaciones));
        }
        exit();
    }

    public function eliminarDepartamento()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Departamentos/?alert='.$alert);
    }

}