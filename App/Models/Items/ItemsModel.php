<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class ItemsModel extends Model
{
      
    public function nuevo($item, $descripcion, $cta_contable)
    {
        $sentencia = $this->db->prepare("INSERT INTO `items` (item, descripcion, cta_contable) VALUES (?, ?, ?) ;");
        return $sentencia->execute([strtoupper($item), $descripcion, $cta_contable]);
    }

    public function actualizar($id, $item, $descripcion, $cta_contable)
    {
        $sentencia = $this->db->prepare("UPDATE `items` SET item = ?, descripcion = ?, cta_contable = ? WHERE id = ? ;");
        return $sentencia->execute([strtoupper($item), $descripcion, $cta_contable, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT * FROM `items` WHERE estado = 1;");
        $sentencia->execute();
        $items = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $items;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM items WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function porItem($item)
    {
        $sentencia = $this->db->prepare("SELECT * FROM items WHERE item = ? ;");
        $sentencia->execute([strtoupper($item)]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        /* Inactiva Item */
        $sentencia = $this->db->prepare("UPDATE `items` SET estado = ? WHERE id = ? ;");
        $item = $sentencia->execute([0, $id]);
        
        /* Inactiva sub-items */
        $sentencia = $this->db->prepare("UPDATE `sub_items` SET estado = ? WHERE item_id = ? ;");
        $sentencia->execute([0, $id]);
        
        /* Inactiva detalles */
        $sentencia = $this->db->prepare("UPDATE `detalles` SET estado = ? WHERE item_id = ? ;");
        $sentencia->execute([0, $id]);
        return $item;
    }
}