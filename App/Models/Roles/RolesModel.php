<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class RolesModel extends Model
{
     
    public function nuevo($nombre, $estado)
    {
        $sentencia = $this->db->prepare("INSERT INTO `roles` (rol, estado) VALUES (?, ?) ;");
        $sentencia->execute([$nombre, $estado]);
        $id = $this->db->lastInsertId();
        if($id !=0 ){
            $sql = $this->db->prepare("SELECT id FROM modulos");
            $sql->execute([]);
            $modulos=$sql->fetchAll(PDO::FETCH_OBJ);
            foreach($modulos as $modulo){
                $this->insertPermisos($id, $modulo->id, 0, 0, 0, 0);
            }
        }
        return $sentencia;
    }

    public function actualizar($id, $nombre, $estado)
    {
        $sentencia = $this->db->prepare("UPDATE `roles` SET rol = ?, estado = ? WHERE id = ? ;");
        return $sentencia->execute([$nombre, $estado, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT * FROM `roles` ;");
        $sentencia->execute();
        $roles = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $roles;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM roles WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function revisaRol($rol)
    {
        $sentencia = $this->db->prepare("SELECT id FROM roles WHERE rol = ? ;");
        $sentencia->execute([$rol]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM roles WHERE id = ?;");
        return $sentencia->execute([$id]);
    }

    /** -----------------------------------------------*/
    /** Carga la Información para la vista de Permisos */
    /** -----------------------------------------------*/
    public function permisos($id){
        $sentencia = $this->db->prepare("SELECT modulos.id, modulos.modulo, permisos.id_rol, permisos.ins, permisos.updt, permisos.dlt, permisos.vw FROM permisos INNER JOIN modulos ON permisos.id_modulo = modulos.id WHERE permisos.id_rol = ?;");
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePermisos(int $idRol)
    {
        $sentencia = $this->db->prepare("DELETE FROM permisos WHERE id_rol = ?");
        $sentencia->execute([$idRol]);
        return $sentencia;
    }

    // public function insertPermisos(int $idRol, int $idModulo, int $r, int $w, int $u, int $d)
    // {
    //     $sentencia = $this->db->prepare("INSERT INTO permisos (id_rol,id_modulo,ins,vw,updt,dlt) VALUES(?,?,?,?,?,?);");
    //     $sentencia->execute([$idRol,$idModulo,$w,$r,$u,$d]);
    //     return $sentencia;
    // }

    public function permisosModulo(int $idRol){
        $sql = $this->db->prepare("SELECT id_modulo, vw, ins, updt, dlt  FROM permisos p WHERE p.id_rol = ?");
        $sql->execute([$idRol]);
        $sql=$sql->fetchAll(PDO::FETCH_ASSOC);
        $arrPermisos = array();
        for ($i=0; $i < count($sql); $i++) { 
            $arrPermisos[$sql[$i]['id_modulo']] = $sql[$i];
        }
        return $arrPermisos;
    }

}