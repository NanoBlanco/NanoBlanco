<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Inmuebles/InmueblesModel.php';
require_once ROOT.MODL .'Detalles/DetallesModel.php';
require_once ROOT.MODL .'Items/ItemsModel.php';
require_once ROOT.MODL .'SubItems/SubItemsModel.php';
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
        $this->model_sub_item = new SubItemsModel;
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
        $inmuebles = $this->model->todos();
        $ubicaciones = $this->model_ubicacion->todos();
        $this->render(__CLASS__, $view, array('items'=>$items, 'ubicaciones'=>$ubicaciones, 'inmuebles'=>$inmuebles, 'alert'=> $alert)); 
    }

    public function cargarDetalles()
    {
        $rows = $this->model_detalle->detallesPorSitem(($_POST['cuenta_subitem']));
        $cadena = '<option value="0">Elige una opción</option>';
        if($rows > 0){
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['detalle'].'>'.utf8_encode($row['descripcion']).'</option>';
            }
        }
        echo $cadena;
    }

    public function cargarSecciones()
    {
        $rows = $this->model_seccion->seccionesPorDpto($_POST['dpto_id']);
        $cadena = '<option value="0">Elige una opción</option>';
        if($rows > 0){
            foreach ($rows as $row) {
                $cadena=$cadena.'<option value='.$row['id'].'>'.utf8_encode($row['seccion']).'</option>';
            }
        }else{
            $cadena = $cadena.'<option value="0">No hay Secciones Asociadas</option>';
        }
        echo $cadena;
    }

    public function cargarTipo()
    {
        $fila = $this->model->tipoDeBien($_POST['valor'], $_POST['ano'], $_POST['mes']);
        if ($fila != 'Indeterminado')
        {
            if($_POST['valor'] > ($fila->valor*3))
                $cadena = 'Patrimonial';
            if($_POST['valor'] > $fila->valor && $_POST['valor'] < ($fila->valor*3))
                $cadena = 'Control';
            if($_POST['valor'] < $fila->valor)
                $cadena = 'Fungible';
        }else{
            $cadena = 'Indeterminado';
        }
        echo $cadena;
    }

    public function creaCode()
    {
        if(!empty($_POST['detalle_id']))
        {
            $contador=1;
            $cuenta = $this->model->porDetalle($_POST['detalle_id']);
            if($cuenta){
                foreach($cuenta as $fila){
                    $contador++;
                }
                if($contador <= 9) {
                    $cadena='0000'.strval($contador);
                }elseif($contador >= 10 && $contador <= 99){
                    $cadena='000'.strval($contador);
                }elseif($contador >= 100 && $contador <= 999){
                    $cadena='00'.strval($contador);
                }else{
                    $cadena='0'.strval($contador);
                }
            }else{
                $cadena='00001';
            }
        }
        echo $cadena;
    }

    public function nuevoInmueble()
    {
        $inmuebles = $this->model->todos();
        $items = $this->model_item->todos();
        $ubicaciones = $this->model_ubicacion->todos();
        $view='Crear';
        $this->render(__CLASS__, $view, array('inmuebles'=>$inmuebles, 'items'=>$items, 'ubicaciones'=>$ubicaciones));
        exit();
    }

    public function editarInmueble() {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $inmueble = $this->model->porId($_POST['id']);
            $ubicaciones = $this->model_area->todos();
            $view='Editar';
            $this->render(__CLASS__, $view, array('inmueble'=>$inmueble,'ubicaciones'=>$ubicaciones));
        }
        exit();
    }

    public function eliminarInmueble()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert = 'eliminado';
        }
        header('location: ../Inmuebles/?alert='.$alert);
    }
}