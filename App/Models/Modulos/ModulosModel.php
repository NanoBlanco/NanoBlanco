<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class ModulosModel extends Model
{
     
    public function nuevo($modulo, $descrip)
    {
        $sentencia = $this->db->prepare("INSERT INTO `modulos` (modulo, descripcion) VALUES (?, ?) ;");
        $sentencia->execute([$modulo, $descrip]);
        $id = $this->db->lastInsertId();
        if($id !=0 ){
            $sql = $this->db->prepare("SELECT id FROM roles");
            $sql->execute([]);
            $roles=$sql->fetchAll(PDO::FETCH_OBJ);
            foreach($roles as $rol){
                $this->insertPermisos($rol->id, $id, 0, 0, 0, 0);
            }
        }
        return $sentencia;
    }

    public function actualizar($id, $modulo, $descrip)
    {
        $sentencia = $this->db->prepare("UPDATE `modulos` SET modulo = ?, descripcion = ? WHERE id = ? ;");
        return $sentencia->execute([$modulo, $descrip, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT * FROM `modulos` ;");
        $sentencia->execute();
        $modulos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $modulos;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM modulos WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function revisaModulo($modulo)
    {
        $sentencia = $this->db->prepare("SELECT id FROM modulos WHERE modulo = ? ;");
        $sentencia->execute([$modulo]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM modulos WHERE id = ?;");
        return $sentencia->execute([$id]);
    }
}