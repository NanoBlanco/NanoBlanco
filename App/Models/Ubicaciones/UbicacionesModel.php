<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class UbicacionesModel extends Model
{
      
    public function nuevo($area, $direccion, $responsable)
    {
        $sentencia = $this->db->prepare("INSERT INTO `ubicaciones` (area, direccion, responsable) VALUES (?, ?, ?) ;");
        return $sentencia->execute([strtoupper($area), $direccion, $responsable]);
    }

    public function actualizar($id, $area, $direccion, $responsable)
    {
        $sentencia = $this->db->prepare("UPDATE `ubicaciones` SET area = ?, direccion = ?, responsable = ? WHERE id = ? ;");
        return $sentencia->execute([strtoupper($area), $direccion, $responsable, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT * FROM `ubicaciones` WHERE estado = 1;");
        $sentencia->execute();
        $ubicaciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $ubicaciones;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM ubicaciones WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function porArea($area)
    {
        $sentencia = $this->db->prepare("SELECT * FROM ubicaciones WHERE area = ? ;");
        $sentencia->execute([strtoupper($area)]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        /* Inactiva Item */
        $sentencia = $this->db->prepare("UPDATE `ubicaciones` SET estado = ? WHERE id = ? ;");
        $ubicacion = $sentencia->execute([0, $id]);
        
        /* Inactiva departamentos */
        $sentencia = $this->db->prepare("UPDATE `departamentos` SET estado = ? WHERE id_ubicacion = ? ;");
        $sentencia->execute([0, $id]);
        
        /* Inactiva secciones */
        $sentencia = $this->db->prepare("UPDATE `secciones` SET estado = ? WHERE id_ubicacion = ? ;");
        $sentencia->execute([0, $id]);
        return $ubicacion;
    }
}