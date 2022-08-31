<?php
    //////////////////////////////////////
    // Valores de base de datos
    /////////////////////////////////////
    define('HOST', 'localhost');
    define('USER', 'rbservi2_cotizaciones');
    define('PASS', 'Rb-77135117-4');
    define('DB_NAME', 'rbservi2_cotizaciones');

    /**
    * Inicializa conexion
    */
    try {
        $db = new pdo('mysql:host='. HOST .';dbname='. DB_NAME .';charset=utf8',USER,PASS,array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      $this->db = 'Error en la conexion';
      echo 'Error: ' . $e->getMessage();
    }
  