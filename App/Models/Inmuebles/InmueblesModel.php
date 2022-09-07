<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class InmueblesModel extends Model
{
    public function nuevo($detalle_id, $cuenta)
    {
        $sentencia = $this->db->prepare("INSERT INTO `detalles` (detalle_id, corr_inmueble) VALUES (?, ?) ;");
        return $sentencia->execute([$detalle_id, $cuenta]);
    }

    public function actualizar($id, $detalle_id)
    {
        $cuenta = $detalle_id;
        $sentencia = $this->db->prepare("UPDATE `detalles` SET detalle_id = ?, corr_inmueble = ? WHERE id = ? ;");
        return $sentencia->execute([$detalle_id, $cuenta, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT inm.detalle_id, det.descripcion AS inmueble, sec.responsable
        FROM `inmuebles` AS inm
        INNER JOIN `seccion` AS sec ON inm.seccion_id = sec.id 
        INNER JOIN `detalles` AS det ON sec.detalle_id = det.cuenta_det");
        $sentencia->execute([]);
        $detalles = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $detalles;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM `inmuebles` WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}