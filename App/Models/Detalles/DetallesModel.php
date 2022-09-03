<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class DetallesModel extends Model
{
      
    public function nuevo($item_id, $sub_item_id, $detalle)
    {
        $sentencia = $this->db->prepare("INSERT INTO `detalles` (item_id, sub_item_id, detalle) VALUES (?, ?, ?) ;");
        return $sentencia->execute([$item_id, $sub_item_id, strtoupper($detalle)]);
    }

    public function actualizar($id, $item_id, $sub_item, $detalle)
    {
        $sentencia = $this->db->prepare("UPDATE `detalles` SET item_id = ?, sub_item = ?, detalle = ? WHERE id = ? ;");
        return $sentencia->execute([$item_id, $sub_item, strtoupper($detalle), $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT d.id, d.item_id, d.sub_item_id, i.item, s.sub_item, d.detalle FROM `detalles` AS d 
        INNER JOIN sub_items AS s ON s.id = d.sub_item_id
        INNER JOIN items AS i ON i.id = s.item_id  WHERE d.estado = 1;");
        $sentencia->execute();
        $detalles = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $detalles;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM detalles WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function subItemsPorItem($item_id)
    {
        $sentencia = $this->db->prepare("SELECT id, sub_item FROM sub_items WHERE item_id = ? AND estado = ?;");
        $sentencia->execute([$item_id, 1]);
        $valores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $valores;
    }

    public function detallesPorSitem($sub_item_id)
    {
        $sentencia = $this->db->prepare("SELECT id, detalle FROM detalles WHERE sub_item_id = ? AND estado = ?;");
        $sentencia->execute([$sub_item_id, 1]);
        $valores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $valores;
    }

    public function porDetalle($detalle)
    {
        $sentencia = $this->db->prepare("SELECT id FROM detalles WHERE detalle = ? ;");
        $sentencia->execute([strtoupper($detalle)]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("UPDATE detalles SET estado = ? WHERE id = ?;");
        return $sentencia->execute([0, $id]);
    }
}