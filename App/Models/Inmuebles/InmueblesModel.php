<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class InmueblesModel extends Model
{
    public function nuevo($detalle_id, $cuenta)
    {
        $sentencia = $this->db->prepare("INSERT INTO `detalles` (detalle_id, corr_inmueble) VALUES (?, ?) ;");
        return $sentencia->execute([$detalle_id, $cuenta]);
    }

    public function actualizar($id, $detalle_id)
    {
        $cuenta = $detalle_id;
        $sentencia = $this->db->prepare("UPDATE `detalles` SET detalle_id = ?, corr_inmueble = ? WHERE id = ? ;");
        return $sentencia->execute([$detalle_id, $cuenta, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT inm.id, inm.detalle_id, inm.corr_inmueble, det.descripcion AS inmueble, inm.direccion
        FROM `inmuebles` AS inm
        INNER JOIN `detalles` AS det ON inm.detalle_id = det.cuenta_det");
        $sentencia->execute([]);
        $detalles = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $detalles;
    }

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM `inmuebles` WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function porDetalle($detalle_id)
    {
        $sentencia = $this->db->prepare("SELECT corr_inmueble FROM `inmuebles` WHERE detalle_id = ? ;");
        $sentencia->execute([$detalle_id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function tipoDeBien()
    {
        if(!empty($_POST['valor']) && !empty($_POST['ano']) && !empty($_POST['mes'])) {
            $sentencia = $this->db->prepare("SELECT * FROM  `utms` WHERE ano = ? AND mes = ?;");
            $sentencia->execute([$_POST['ano'], $_POST['mes']]);
            $tipo = $sentencia->fetch(PDO::FETCH_OBJ);
        }else{
            $tipo = 'Indeterminado';
        }
        return $tipo;
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("UPDATE `inmuebles` SET activo = ? WHERE id = ?;");
        return $sentencia->execute([0, $id]);
    }

}