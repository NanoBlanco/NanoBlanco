<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class UsuariosModel extends Model
{
     
    /* Función para validar entrada */
    public function validaEntrada($filtro, $dato) {
        if (preg_match("/^" . $filtro . "$/", $dato)) {
            return false;
        } else {
            return true;
        }
    }
    
    public function revisaUsuario($correo)
    {
        $sentencia = $this->db->prepare("SELECT id FROM usuarios WHERE correo = ? ;");
        $sentencia->execute([$correo]);
        return $sentencia->fetch(PDO::FETCH_OBJ);

    }
    public function nuevo($nombre, $correo, $pass, $idRol, $estado)
    {
        $sentencia = $this->db->prepare("INSERT INTO `usuarios` (nombre, correo, pass, id_rol, estado, token) VALUES (?, ?, ?, ?, ?, ?) ;");
        $pass = password_hash(md5($pass), PASSWORD_DEFAULT);
        return $sentencia->execute([$nombre, $correo, $pass, $idRol, $estado,'']);
    }

    public function actualizar($id, $nombre, $correo, $idRol, $estado)
    {
        $sentencia = $this->db->prepare("UPDATE `usuarios` SET nombre = ?, correo = ?, id_rol = ?, estado = ? WHERE id = ? ;");
        return $sentencia->execute([$nombre, $correo, $idRol, $estado, $id]);
    }

    public function todos()
    {
        $sentencia = $this->db->prepare("SELECT user.id, user.nombre, user.correo, user.estado, user.id_rol, rol.rol FROM usuarios AS user INNER JOIN roles AS rol ON user.id_rol = rol.id;");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    }
    

    public function porId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id = ? ;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function eliminar($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id = ?;");
        return $sentencia->execute([$id]);
    }

    public function actualizaClave(int $id, string $password){
        $pass = password_hash(md5($password), PASSWORD_DEFAULT);
        $request = $this->db->prepare("UPDATE usuarios SET pass = ?, token = ? WHERE id = ?; ");
        $request->execute([$pass,'',$id]);
        return $request;
    }

}