<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Inmuebles Model
 */
class InmueblesModel extends Model
{
  /**
  * Inicia conexión DB
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Obtiene el usuario de la DB por ID
  */
  public function getUser($id)
  {
    return $this->db->query("SELECT * FROM `usuario` WHERE `id` = $id")->fetch_array(MYSQLI_ASSOC);
  }

}