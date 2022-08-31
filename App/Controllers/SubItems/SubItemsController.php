<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'SubItems/SubItemsModel.php';
require_once ROOT.MODL .'Items/ItemsModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de SubItems
*/
class SubItemsController extends Controller
{ 
    private $model;
    private $model_item;
    private $session;

    public function __construct()
    {
        $this->model = new SubItemsModel;
        $this->model_item = new ItemsModel;
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
        $items = $this->model_item->todos();
        $sub_items = $this->model->todos();
        $this->render(__CLASS__, $view, array('items' => $items, 'sub_items'=> $sub_items, 'alert'=> $alert)); 
    }

    public function guardarSubItem()
    {
        if (isset($_POST["item_id"]) && !empty($_POST["item_id"]) && isset($_POST["sub_item"]) && !empty($_POST["sub_item"]) && isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && isset($_POST["cta_contable"]) && !empty($_POST["cta_contable"]))
        {
            $existe = $this->model->porSubItem($_POST["sub_item"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["item_id"],$_POST["sub_item"],$_POST["descripcion"],$_POST["cta_contable"]);
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
        header('location: ../SubItems/?alert='.$alert);
    }

    public function actualizarSubItem()
    {
        if (isset($_POST["item_id"]) && !empty($_POST["item_id"]) && isset($_POST["sub_item"]) && !empty($_POST["sub_item"]) && isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && isset($_POST["cta_contable"]) && !empty($_POST["cta_contable"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["item_id"], $_POST["sub_item"], $_POST['descripcion'], $_POST["cta_contable"]);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }
        }else{
            $alert='error2';
        }
        header('location: ../SubItems/?alert='.$alert);
    }

    public function eliminarSubItem()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../SubItems/?alert='.$alert);
    }

}