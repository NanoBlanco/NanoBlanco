<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class DetallesModel extends Model
{
      
    public function nuevo($item_id, $sub_item_id, $detalle, $cuenta, $descripcion)
    {
        $cuenta_det = $item_id.$sub_item_id.$detalle;
        $sentencia = $this->db->prepare("INSERT INTO `detalles` (item_id, sub_item_id, detalle, cuenta, cuenta_det, descripcion) VALUES (?, ?, ?, ?, ?, ?) ;");
        return $sentencia->execute([$item_id, $sub_item_id, $detalle, $cuenta, $cuenta_det, strtoupper($descripcion)]);
    }

    public function actualizar($id, $item_id, $sub_item, $detalle, $descripcion)
    {
        $cuenta = $item_id.$sub_item;
        $cuenta_det = $item_id.$sub_item.$detalle;
        $sentencia = $this->db->prepare("UPDATE `detalles` SET item_id = ?, sub_item_id = ?, detalle = ?, cuenta = ?, cuenta_det = ?, descripcion = ? WHERE id = ? ;");
        return $sentencia->execute([$item_id, $sub_item, $detalle, $cuenta, $cuenta_det, strtoupper($descripcion), $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT d.id, d.item_id, d.sub_item_id, d.detalle, d.cuenta_det, d.descripcion, s.descripcion AS sub_item, i.descripcion AS item 
        FROM `detalles` AS d 
        INNER JOIN `sub_items` AS s ON d.cuenta = s.cuenta 
        INNER JOIN `items` AS i ON s.item_id = i.item");
        $sentencia->execute([]);
        $detalles = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $detalles;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM `detalles` WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function subItemsPorItem($item_id)
    {
        $sentencia = $this->db->prepare("SELECT id, sub_item, cuenta, descripcion FROM `sub_items` WHERE item_id = ? AND estado = ?;");
        $sentencia->execute([$item_id, 1]);
        $valores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $valores;
    }

    public function detallesPorSitem($cuenta)
    {
        $sentencia = $this->db->prepare("SELECT id, detalle, descripcion FROM `detalles` WHERE cuenta = ? AND estado = ?;");
        $sentencia->execute([$cuenta, 1]);
        $valores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $valores;
    }

    public function porDetalle($cuenta, $detalle)
    {
        $sentencia = $this->db->prepare("SELECT id FROM `detalles` WHERE cuenta = ? AND `detalle` = ? ;");
        $sentencia->execute([$cuenta, $detalle]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("UPDATE `detalles` SET estado = ? WHERE id = ?;");
        return $sentencia->execute([0, $id]);
    }
}