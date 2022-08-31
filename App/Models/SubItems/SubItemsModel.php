<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class SubItemsModel extends Model
{
      
    public function nuevo($item_id, $sub_item, $descripcion, $cta_contable)
    {
        $sentencia = $this->db->prepare("INSERT INTO `sub_items` (item_id, sub_item, descripcion, cta_contable) VALUES (?, ?, ?, ?) ;");
        return $sentencia->execute([$item_id, strtoupper($sub_item), $descripcion, $cta_contable]);
    }

    public function actualizar($id, $item_id, $sub_item, $descripcion, $cta_contable)
    {
        $sentencia = $this->db->prepare("UPDATE `sub_items` SET item_id = ?, sub_item = ?, descripcion = ?, cta_contable = ? WHERE id = ? ;");
        return $sentencia->execute([$item_id, strtoupper($sub_item), $descripcion, $cta_contable, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT s.id,s.item_id,s.sub_item,s.descripcion,s.cta_contable,i.item FROM `sub_items` AS s INNER JOIN items AS i ON s.item_id = i.id WHERE s.estado = 1;");
        $sentencia->execute();
        $sub_items = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $sub_items;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM sub_items WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function porSubItem($sub_item)
    {
        $sentencia = $this->db->prepare("SELECT * FROM sub_items WHERE sub_item = ? ;");
        $sentencia->execute([strtoupper($sub_item)]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("UPDATE sub_items SET estado = ? WHERE id = ?;");
        $sItem = $sentencia->execute([0, $id]);
        
        /* Inactiva detalles */
        $sentencia = $this->db->prepare("UPDATE `detalles` SET estado = ? WHERE sub_item_id = ? ;");
        $sentencia->execute([0, $id]);
        
        return $sItem;
    }
}