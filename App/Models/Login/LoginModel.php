<?php 
/*--------------------
*  Modelo para Login
*---------------------*/
class LoginModel extends Model
{
  private $intIdUsuario;
  private $strUsuario;
  private $strPassword;
  private $strToken;
  
  public function __construct()
  {
    parent::__construct();
  }

  public function signIn($correo)
  {
          $sentencia = $this->db->prepare("SELECT user.id, user.nombre, user.correo, user.estado, user.pass, user.id_rol, rol.rol FROM usuarios AS user INNER JOIN roles AS rol ON user.id_rol = rol.id WHERE user.correo = ? LIMIT 1;");
          $sentencia->execute([$correo]);
          if ($sentencia->rowCount() < 0) 
              return false;
        
        return $sentencia;
  }

  public function getUserEmail($correo){
      $sql = $this->db->prepare("SELECT id, nombre, correo, estado FROM usuarios WHERE correo = ? AND  estado = ?");
      $sql->execute([$correo,1]);
      if ($sql->rowCount()<0)
          return false;

      return $sql;
  } 

  public function setTokenUser($id, $token){
      $sql = $this->db->prepare("UPDATE usuarios SET token = ? WHERE id = ?");
      $sql->execute([$token,$id]);
      if($sql->rowCount()<0)
          return false;

      return $sql;
  }

  public function getUsuario(string $email, string $token){
      $this->strUsuario = $email;
      $this->strToken = $token;
      $sql = $this->db->prepare("SELECT id FROM usuarios WHERE correo = ? AND token = ? AND estado = ?");
      $sql->execute([$this->strUsuario,$this->strToken,1]);
      if($sql->rowCount()<0)
          return false;

      return $sql->fetch(PDO::FETCH_OBJ);
  }

  public function insertPassword(int $idPersona, string $password){
      $this->intIdUsuario = $idPersona;
      $this->strPassword = $password;
      $sql = $this->db->prepare("UPDATE usuarios SET password = ?, token = ? WHERE id = ?");
      $sql->execute([$this->strPassword,"",$this->intIdUsuario]);
      if($sql->rowCount()<0)
        return false;

      return $sql;
  }

}