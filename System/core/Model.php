<?php
defined('BASEPATH') or exit('No se permite acceso directo');

/**
 * Modelo base
 */
class Model
{
  /**
  * @var object
  */
  protected $db;

  /**
  * Inicializa conexion
  */
  public function __construct()
  {
    try {
      $this->db = new pdo('mysql:host='. HOST .';dbname='. DB_NAME .';charset=utf8',USER,PASSWORD,array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      $this->db = 'Error en la conexion';
      echo 'Error: ' . $e->getMessage();
    }
  }
  
  public function insertPermisos(int $idRol, int $idModulo, int $r, int $w, int $u, int $d)
  {
      $sentencia = $this->db->prepare("INSERT INTO permisos (id_rol,id_modulo,ins,vw,updt,dlt) VALUES(?,?,?,?,?,?);");
      $sentencia->execute([$idRol,$idModulo,$w,$r,$u,$d]);
      return $sentencia;
  }
  /**
  * Finaliza conexion
  */
  public function __destruct()
  {
    $this->db = null;
  }
}