<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class UtmsModel extends Model
{
     
    public function nuevo($mes, $ano, $valor)
    {
        $sentencia = $this->db->prepare("INSERT INTO `utms` (mes, ano, valor) VALUES (?, ?, ?) ;");
        $sentencia->execute([$mes, $ano, $valor]);
        return $sentencia;
    }

    public function actualizar($id, $mes, $ano, $valor)
    {
        $sentencia = $this->db->prepare("UPDATE `utms` SET mes = ?, ano = ?, valor = ? WHERE id = ? ;");
        return $sentencia->execute([$mes, $ano, $valor, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT * FROM `utms` ;");
        $sentencia->execute();
        $utms = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $utms;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM utms WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function revisaUtm($mes, $ano)
    {
        $sentencia = $this->db->prepare("SELECT id FROM utms WHERE mes = ? AND ano = ?;");
        $sentencia->execute([$mes, $ano]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM utms WHERE id = ?;");
        return $sentencia->execute([$id]);
    }
}