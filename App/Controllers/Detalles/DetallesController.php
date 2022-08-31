<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Detalles/DetallesModel.php';
require_once ROOT.MODL .'SubItems/SubItemsModel.php';
require_once ROOT.MODL .'Items/ItemsModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Controlador de SubItems
*/
class DetallesController extends Controller
{ 
    private $model;
    private $model_item;
    private $model_sub_item;
    private $session;

    public function __construct()
    {
        $this->model = new DetallesModel; 
        $this->model_sub_item = new SubItemsModel;
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
        $sub_items = $this->model_sub_item->todos();
        $detalles = $this->model->todos();
        $this->render(__CLASS__, $view, array('items' => $items, 'sub_items'=>$sub_items, 'detalles' => $detalles, 'alert'=> $alert)); 
    }

    public function cargarDatos()
    {
        $item_id = $_POST['item_id']; 
        $rows = $this->model->subItemsPorItem($item_id);

        if($rows > 0){
            $cadena="<label for='sub_item'>Sub Item</label> 
            <select required class='form-control' id='lista2' name='sub_item_id'>";
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['id'].'>'.utf8_encode($row['sub_item']).'</option>';
            }
        }
                    
        echo  $cadena."</select>";
    }
    public function guardarDetalle()
    {
        if (isset($_POST["item_id"]) && !empty($_POST["item_id"]) && isset($_POST["sub_item_id"]) && !empty($_POST["sub_item_id"]) && isset($_POST["detalle"]) && !empty($_POST["detalle"]))
        {
            $existe = $this->model->porDetalle($_POST["detalle"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["item_id"],$_POST["sub_item_id"],$_POST["detalle"]);
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
        header('location: ../Detalles/?alert='.$alert);
    }

    public function actualizarDetalle()
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
        header('location: ../Detalles/?alert='.$alert);
    }

    public function eliminarDetalle()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Detalles/?alert='.$alert);
    }

}