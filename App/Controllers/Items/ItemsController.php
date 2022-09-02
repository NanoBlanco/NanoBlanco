<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Items/ItemsModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de Items
*/
class ItemsController extends Controller
{ 
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new ItemsModel;
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
        $items = $this->model->todos();
        $this->render(__CLASS__, $view, array('items' => $items, 'alert'=> $alert)); 
    }

    public function guardarItem()
    {
        if (isset($_POST["item"]) && !empty($_POST["item"]) && isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && isset($_POST["cta_contable"]) && !empty($_POST["cta_contable"]))
        {
            $existe = $this->model->porItem($_POST["item"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["item"],$_POST["descripcion"],$_POST["cta_contable"]);
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
        header('location: ../Items/?alert='.$alert);
    }

    public function actualizarItem()
    {
        if (isset($_POST["edit_item"]) && !empty($_POST["edit_item"]) && isset($_POST["id"]) && isset($_POST["edit_descripcion"]) && isset($_POST["edit_cta_contable"]) && !empty($_POST["edit_cta_contable"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["edit_item"], $_POST['edit_descripcion'], $_POST["edit_cta_contable"]);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }
        }else{
            $alert='error2';
        }
        header('location: ../Items/?alert='.$alert);
    }

    public function nuevoItem()
    {
        $view='Crear';
        $this->render(__CLASS__, $view, array());
        exit();
    }

    public function editarItem() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $item = $this->model->porId($_POST['id']);
            $view='Editar';
            $this->render(__CLASS__, $view, array('item'=>$item));
        }
        exit();
    }

    public function eliminarItem()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Items/?alert='.$alert);
    }

}