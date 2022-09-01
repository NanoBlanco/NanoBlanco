<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Inmuebles/InmueblesModel.php';
require_once ROOT.MODL .'Detalles/DetallesModel.php';
require_once ROOT.MODL .'Items/ItemsModel.php';
require_once ROOT.MODL .'Secciones/SeccionesModel.php';
require_once ROOT.MODL .'Ubicaciones/UbicacionesModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
 * Inmuebles controller
 */
class InmueblesController extends Controller
{
  /**
   * object 
   */
  private $model;
  private $model_item;
  private $model_detalle;
  private $model_seccion;
  private $model_ubicacion;
  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new InmueblesModel();
    $this->model_item = new ItemsModel;
    $this->model_ubicacion = new UbicacionesModel;
    $this->model_detalle = new DetallesModel;
    $this->model_seccion = new SeccionesModel;
    $this->session = new Session();
    $this->session->init();
    
    if($this->session->getStatus() === 1 || empty($this->session->get('email')))
      exit('Acceso denegado');
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    $this->show();
  }

  /**
  * Método de arranque
  */
  public function show($view='',$alert='')
    {
        $items = $this->model_item->todos();
        $ubicaciones = $this->model_ubicacion->todos();
        $this->render(__CLASS__, $view, array('items'=>$items, 'ubicaciones'=>$ubicaciones,'alert'=> $alert)); 
    }

    public function cargarDetalles()
    {
        $sub_item_id = $_POST['sub_item_id']; 
        $rows = $this->model_detalle->detallesPorSitem($sub_item_id);
        $cadena = '<option value="0">Elige una opción</option>';

        if($rows > 0){
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['id'].'>'.utf8_encode($row['detalle']).'</option>';
            }
        }
                    
      echo $cadena;
    }

    public function cargarSecciones()
    {
        $dpto_id = $_POST['dpto_id']; 
        $rows = $this->model_seccion->seccionesPorDpto($dpto_id);
        $cadena = '<option value="0">Elige una opción</option>';

        if($rows > 0){
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['id'].'>'.utf8_encode($row['seccion']).'</option>';
            }
        }
                    
      echo $cadena;
    }
}