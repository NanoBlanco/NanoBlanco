<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class DepartamentosModel extends Model
{
      
    public function nuevo($id_ubicacion, $departamento, $responsable)
    {
        $sentencia = $this->db->prepare("INSERT INTO `departamentos` (id_ubicacion, departamento, responsable) VALUES (?, ?, ?) ;");
        return $sentencia->execute([$id_ubicacion, strtoupper($departamento), $responsable]);
    }

    public function actualizar($id, $id_ubicacion, $departamento, $responsable)
    {
        $sentencia = $this->db->prepare("UPDATE `departamentos` SET id_ubicacion = ?, departamento = ?, responsable = ? WHERE id = ? ;");
        return $sentencia->execute([$id_ubicacion, strtoupper($departamento), $responsable, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT d.id, d.id_ubicacion, d.departamento, d.responsable, u.area FROM `departamentos` AS d 
        INNER JOIN ubicaciones AS u ON d.id_ubicacion = u.id 
        WHERE d.estado = 1;");
        $sentencia->execute();
        $deptos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $deptos;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT id FROM `departamentos` WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function porDepartamento($departamento)
    {
        $sentencia = $this->db->prepare("SELECT id FROM `departamentos` WHERE departamento = ? ;");
        $sentencia->execute([strtoupper($departamento)]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("UPDATE `departamentos` SET estado = ? WHERE id = ? ;");
        $sDpto = $sentencia->execute([0, $id]);
        
        /* Inactiva secciones */
        $sentencia = $this->db->prepare("UPDATE `secciones` SET estado = ? WHERE id_departamentos = ? ;");
        $sentencia->execute([0, $id]);
        
        return $sDpto;
    }
}