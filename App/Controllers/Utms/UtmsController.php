<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Utms/UtmsModel.php';
require_once LIBS_ROUTE .'Session.php';
 
/**
* Controlador de Utms
*/
class UtmsController extends Controller
{ 
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new UtmsModel;
        $this->session = new Session();
        $this->session->init();
      
        if($this->session->getStatus() === 1 || empty($this->session->get('email')))
            exit('Utms Acceso denegado');
    }

    public function exec()
    {
        $this->show();
    }

    public function show($view='', $alert='')
    {
        $utms = $this->model->todos();
        $this->render(__CLASS__, $view, array('utms' => $utms, 'alert'=> $alert)); 
    }

    public function guardarUtm()
    {
        if (isset($_POST["mes"])  && isset($_POST["ano"]) && isset($_POST["valor"]))
        {
            $existe = $this->model->revisaUtm($_POST["mes"],$_POST["ano"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["mes"],$_POST["ano"],$_POST["valor"]);
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
        header('location: ../Utms/?alert='.$alert);
    }

    public function actualizarUtm()
    {
        if (isset($_POST["mes"]) && isset($_POST["id"]) && isset($_POST["valor"]) && isset($_POST["ano"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["mes"], $_POST['ano'], $_POST['valor']);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }

        }else{
            $alert='error2';
        }
        header('location: ../Utms/?alert='.$alert);
    }

    public function nuevoUtm()
    {
        $utms = $this->model->todos();
        $view='Crear';
        $this->render(__CLASS__, $view, array('utms'=>$utms));
        exit();
    }

    public function editarUtm() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $utm = $this->model->porId($_POST["id"]);
            $view='Editar';
            $this->render(__CLASS__, $view, array('utm'=>$utm));
        }
        exit();
    }
    public function eliminarUtm()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Utms/?alert='.$alert);
    }
}