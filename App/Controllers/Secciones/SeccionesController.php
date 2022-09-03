<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Secciones/SeccionesModel.php';
require_once ROOT.MODL .'Departamentos/DepartamentosModel.php';
require_once ROOT.MODL .'Ubicaciones/UbicacionesModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de Secciones
*/
class SeccionesController extends Controller
{ 
    private $model;
    private $model_area;
    private $model_dpto;
    private $session;

    public function __construct()
    {
        $this->model = new SeccionesModel; 
        $this->model_dpto = new DepartamentosModel;
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
        $departamentos = $this->model_dpto->todos();
        $secciones = $this->model->todos();
        $this->render(__CLASS__, $view, array('ubicaciones' => $ubicaciones, 'departamentos'=>$departamentos, 'secciones' => $secciones, 'alert'=> $alert)); 
    }

    public function cargarDptos()
    {
        $id_ubicacion = $_POST['id_ubicacion'];
        $rows = $this->model->dptosPorArea($id_ubicacion);
        $cadena = '<option value="0">Elige una opción</option>';
        if($rows > 0){
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['id'].'>'.utf8_encode($row['departamento']).'</option>';
            }
        }
        echo  $cadena;
    }

    public function guardarSeccion()
    {
        if (isset($_POST["id_ubicacion"]) && !empty($_POST["id_ubicacion"]) && isset($_POST["id_departamento"]) && !empty($_POST["id_departamento"]) && isset($_POST["seccion"]) && !empty($_POST["seccion"])
        && isset($_POST["responsable"]) && !empty($_POST["responsable"]))
        {
            $existe = $this->model->porSeccion($_POST["seccion"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["id_ubicacion"],$_POST["id_departamento"],$_POST["seccion"],$_POST["responsable"]);
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
        header('location: ../Secciones/?alert='.$alert);
    }

    public function actualizarSeccion()
    {
        if (isset($_POST["id_ubicacion"]) && !empty($_POST["id_ubicacion"]) && isset($_POST["id_departamento"]) && !empty($_POST["id_departamento"]) && isset($_POST["seccion"]) && !empty($_POST["seccion"])
        && isset($_POST["responsable"]) && !empty($_POST["responsable"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["id_ubicacion"], $_POST["id_departamento"], $_POST['seccion'], $_POST["responsable"]);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }
        }else{
            $alert='error2';
        }
        header('location: ../Secciones/?alert='.$alert);
    }

    public function nuevaSeccion()
    {
        $ubicaciones = $this->model_area->todos();
        $view='Crear';
        $this->render(__CLASS__, $view, array('ubicaciones' => $ubicaciones));
        exit();
    }

    public function editarSeccion() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $ubicaciones = $this->model_area->todos();
            $departamentos = $this->model_dpto->todos();
            $seccion = $this->model->porId($_POST["id"]);
            $view='Editar';
            $this->render(__CLASS__, $view, array('ubicaciones'=>$ubicaciones, 'departamentos'=>$departamentos, 'seccion'=>$seccion));
        }
        exit();
    }

    public function eliminarSeccion()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Secciones/?alert='.$alert);
    }

}