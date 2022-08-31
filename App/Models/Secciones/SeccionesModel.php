<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class SeccionesModel extends Model
{
      
    public function nuevo($id_ubicacion, $id_departamento, $seccion, $responsable)
    {
        $sentencia = $this->db->prepare("INSERT INTO `secciones` (id_ubicacion, id_departamento, seccion, responsable) VALUES (?, ?, ?, ?) ;");
        return $sentencia->execute([$id_ubicacion, $id_departamento, strtoupper($seccion), $responsable]);
    }

    public function actualizar($id, $id_ubicacion, $id_departamento, $seccion, $responsable)
    {
        $sentencia = $this->db->prepare("UPDATE `secciones` SET id_ubicacion = ?, id_$id_departamento = ?, seccion = ?, responsable = ? WHERE id = ? ;");
        return $sentencia->execute([$id_ubicacion, $id_departamento, strtoupper($seccion), $responsable, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT s.id, s.id_ubicacion, s.id_departamento, s.seccion, s.responsable, d.departamento, u.area FROM `secciones` AS s 
        INNER JOIN departamentos AS d ON s.id_departamento = d.id
        INNER JOIN ubicaciones AS u ON u.id = s.id_ubicacion WHERE s.estado = 1");
        $sentencia->execute([]);
        $secciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $secciones;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT id FROM secciones WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function dptosPorArea($id_ubicacion)
    {
        $sentencia = $this->db->prepare("SELECT id, departamento FROM departamentos WHERE id_ubicacion = ? AND estado = ?;");
        $sentencia->execute([$id_ubicacion, 1]);
        $valores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $valores;
    }

    public function porSeccion($seccion)
    {
        $sentencia = $this->db->prepare("SELECT id FROM secciones WHERE seccion = ? ;");
        $sentencia->execute([strtoupper($seccion)]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("UPDATE secciones SET estado = ? WHERE id = ?;");
        return $sentencia->execute([0, $id]);
    }
}