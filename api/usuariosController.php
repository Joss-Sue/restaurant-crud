<?php
include "../models/usuarioModel.php";
session_start();
$isFill=(!isset($_COOKIE['correo']))?false:true;


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        {
            if($isFill  && (!isset($_SESSION['usuario_id']))){

                $correo = $_COOKIE["correo"];
                $contrasena = $_COOKIE["contrasena"];
                
                UsuarioClass::matchLoginCookie($correo, $contrasena);
            
            }
        }
        break;
    case 'POST':
        {
            
            $data = json_decode(file_get_contents('php://input'), true);

            if(isset($_SERVER['HTTP_ACTION']) && $_SERVER['HTTP_ACTION'] == 'Login'){
               
                $correo=(isset($data['correo']))?htmlspecialchars($data['correo']):null;
                $contrasena=(isset($data['contrasena']))?$data['contrasena']:null;
                $isRecordar=(isset($data['checkSesion']))?true:false;
    
                if(empty($correo) || empty($contrasena)){
                    echo "debe llenar los campos";
                    exit;
                }

                 UsuarioClass::matchLogin($correo, $contrasena, $isRecordar);
             
            }else{
        
                $correo=(isset($data['correo']))?$data['correo']:null;
                $contrasena=(isset($data['contrasena']))?$data['contrasena']:null;
                $nombre= (isset($data['nombre']))?$data['nombre']:null;
                $telefono= (isset($data['telefono']))?$data['telefono']:null;
                $direccion= (isset($data['direccion']))?$data['direccion']:null;
                //var_dump($data);

                $resultadoFuncion = UsuarioClass::registrarUsuario($correo, $contrasena, $nombre, $telefono, $direccion);

               if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
                }
               }
               break;
            }
    case 'PUT':
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = (isset($data['id']))?$data['id']:null;
            $correo=(isset($data['correo']))?$data['correo']:null;
            $contrasena=(isset($data['contrasena']))?$data['contrasena']:null;
            $nombre= (isset($data['nombre']))?$data['nombre']:null;
            $telefono= (isset($data['telefono']))?$data['telefono']:null;
            $direccion= (isset($data['direccion']))?$data['direccion']:null;
            if(empty($correo) || empty($contrasena) || empty($id)){
                echo "error en correo o contra o id";
                exit;
            }

            $resultadoFuncion = UsuarioClass::editarUsuario($id, $correo, $contrasena, $nombre, $telefono, $direccion);
            if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
            }
            break;
        }
    case 'DELETE':
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = (isset($data['id']))?($data['id']):null;
            
            if(empty($id)){
                echo "error no hay id";
                exit;
            }

            $resultadoFuncion = UsuarioClass::eliminarUsuario($id);
            if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
                }
            break;
        }
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method Not Allowed"));
        break;
}

?>