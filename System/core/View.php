<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Vista base
 */
class View
{
  protected $template;
  protected $controller_name;
  protected $view;
  protected $params;
  
  /**
   * Inicializa valores y el render
   * @param string $controller_name
   * @param array $params. Opcional
   */
  public function __construct($controller_name, $view, $params)
  {
    $this->controller_name = $controller_name;
    $this->view = $view;
    $this->params = $params;
    $this->render();
  }
 
  /**
   * Muestra la vista según el controlador que hizo la petición
   */
  protected function render()
  {
    if(class_exists($this->controller_name)){
      $file_name = str_replace('Controller', '', $this->controller_name);
      $this->template = $this->getContentTemplate($file_name,$this->view);
      echo $this->template;
    }else{
      throw new Exception("Error No existe {$this->controller_name}");
    }
  }

  /**
   * Retorna el render de una vista
   */
  protected function getContentTemplate($file_name,$view='')
  {
    if(empty($view)){
      $file_path = ROOT .'/'. PATH_VIEWS . "$file_name/$file_name" . '.php';
    }else{
      $file_path = ROOT .'/'. PATH_VIEWS . "$file_name/$view" . '.php';
    }
    if(is_file($file_path)){
      extract($this->params);
      ob_start();
      require($file_path); 
      $template = ob_get_contents();
      ob_end_clean();
      return $template;
    }else{
      throw new Exception("Error No existe $file_path");
    }
  }
}