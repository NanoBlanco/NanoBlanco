<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Roles/RolesModel.php';
require_once LIBS_ROUTE .'Session.php';
 
/**
* Controlador de Roles
*/
class RolesController extends Controller
{ 
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new RolesModel;
        $this->session = new Session();
        $this->session->init();
      
        if($this->session->getStatus() === 1 || empty($this->session->get('email')))
            exit('Acceso denegado');
    }

    public function exec()
    {
        $this->show();
    }

    public function show($view='', $alert='')
    {
        $roles = $this->model->todos();
        $this->render(__CLASS__, $view, array('roles' => $roles, 'alert'=> $alert)); 
    }

    public function guardarRol()
    {
        if (isset($_POST["rol"]) && !empty($_POST["rol"]) && isset($_POST["estado"]) )
        {
            $existe = $this->model->revisaRol($_POST["rol"]);
            if(!$existe){
                $inserto = $this->model->nuevo($_POST["rol"],$_POST["estado"]);
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
        header('location: ../Roles/?alert='.$alert);
    }

    public function actualizarRol()
    {
        if (isset($_POST["rol"]) && !empty($_POST["rol"]) && isset($_POST["id"]) && isset($_POST["estado"]))
        {
            $inserto = $this->model->actualizar($_POST["id"], $_POST["rol"], $_POST['estado']);
            if($inserto > 0){
                $alert = 'modificado';
            } else {
                $alert = 'error1';
            }

        }else{
            $alert='error2';
        }
        header('location: ../Roles/?alert='.$alert);
    }

    public function eliminarRol()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])){
            $this->model->eliminar($_POST["id"]);
            $alert='eliminado';
        }
        header('location: ../Roles/?alert=$alert');
    }

    public function permisos()
    {
        if (isset($_POST["idRolP"]) && !empty($_POST["idRolP"])){
            $permisos  = $this->model->permisos($_POST["idRolP"]); 
            $nombreRol = $this->model->porId($_POST["idRolP"]);
            $view='Permisos';
            $this->render(__CLASS__, $view, array('permisos'=>$permisos, 'nombre'=>$nombreRol));
            exit();
        }
        header('location: ../Roles');
    }
    
    public function guardarPermisos()
    {
        if($_POST)
        {
            $idrol = intval($_POST['idRol']);
            $modulos = $_POST['modulos'];
            $this->model->deletePermisos($idrol);
            foreach ($modulos as $modulo) {
                $idModulo = $modulo['id_modulo'];
                $r = empty($modulo['vw']) ? 0 : 1;
                $w = empty($modulo['ins']) ? 0 : 1;
                $u = empty($modulo['updt']) ? 0 : 1;
                $d = empty($modulo['dlt']) ? 0 : 1;
                $requestPermiso = $this->model->insertPermisos($idrol, $idModulo, $r, $w, $u, $d);
            }
            if($requestPermiso->rowCount() > 0)
            {
                $alert='permiso';
            }else{
                $alert='error1';
            }
        }
        header('location: ../Roles/?alert='.$alert);
    }

}