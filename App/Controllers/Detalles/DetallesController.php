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
        $this->model_item = new ItemsModel;
        $this->model_sub_item = new SubItemsModel;
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

    public function cargarSubItems()
    {
        $item_id = $_POST['item_id']; 
        $rows = $this->model->subItemsPorItem($item_id);
        if($rows > 0){
            $cadena = '<option value="0">Elige una opción</option>';
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['sub_item'].'>'.utf8_encode($row['descripcion']).'</option>';
            }
        }          
        echo $cadena;
    }

    public function guardarDetalle()
    {
        if (isset($_POST["item_id"]) && !empty($_POST["item_id"]) && isset($_POST["sub_item_id"]) && !empty($_POST["sub_item_id"]) 
            && isset($_POST["detalle"]) && !empty($_POST["detalle"]) && isset($_POST["descripcion"]) && !empty($_POST["descripcion"]))
        {
            $cuenta = $_POST["item_id"].$_POST["sub_item_id"];
            $existe = $this->model->porDetalle($cuenta, $_POST["detalle"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["item_id"], $_POST["sub_item_id"], $_POST["detalle"], $cuenta, $_POST["descripcion"]);
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
        if (isset($_POST["item_id"]) && !empty($_POST["item_id"]) && isset($_POST["sub_item_id"]) && !empty($_POST["sub_item_id"]) 
            && isset($_POST["detalle"]) && !empty($_POST["detalle"]) && isset($_POST["descripcion"]) && !empty($_POST["descripcion"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["item_id"], $_POST["sub_item_id"], $_POST['detalle'],$_POST["descripcion"]);
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

    public function nuevoDetalle()
    {
        $items = $this->model_item->todos();
        $view='Crear';
        $this->render(__CLASS__, $view, array('items'=>$items));
        exit();
    }

    public function editarDetalle() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $detalle = $this->model->porId($_POST["id"]);
            $items = $this->model_item->todos();
            $sub_items = $this->model_sub_item->porId($detalle->sub_item_id);
            $view='Editar';
            $this->render(__CLASS__, $view, array('items'=>$items, 'sub_items'=>$sub_items, 'detalle'=>$detalle));
        }
        exit();
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