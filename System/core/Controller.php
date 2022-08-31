<?php
defined('BASEPATH') or exit('No se permite acceso directo');
 
/**
* Controlador base 
*/
abstract class Controller
{
  /**
   * @var object
   */
  private $view;

  /**
   * Inicializa la vista
   */
  public function render($controller_name = '', $view='', $params = array())
  {
    $this->view = new View($controller_name, $view, $params);
  }

  /**
   * Metodo estándar
   */
  abstract public function exec();
}