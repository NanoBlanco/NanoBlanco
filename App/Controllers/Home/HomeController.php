<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.MODL .'Home/HomeModel.php';
require_once ROOT.MODL .'Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
 * Home controller
 */
class HomeController extends Controller
{
    /**
     * object 
     */
    public $model;

    /**
     * Inicializa valores 
     */
    public function __construct()
    {
        $this->model = new HomeModel();
        $this->session = new Session();
        $this->session->init();
        
        if($this->session->getStatus() === 1 || empty($this->session->get('email')))
            exit('Acceso al Home denegado');
    }

    /**
     * Método estándar
    */
    public function exec()
    {
        $this->show();
    }

    /**
     * Método de ejemplo
    */
    public function show()
    {
        $this->render(__CLASS__); 
    }

    public function logout()
    {
        $this->session->close();
        header('location: /activo/Login/Login.php');
    }

}