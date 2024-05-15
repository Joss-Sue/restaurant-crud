<?php
include_once '../backend/bd_conexion.php';


class UsuarioClass{

    public static $conexion;

    public static function inicializarConexion() {
        self::$conexion = BD::crearInstancia();
    }

    static  function matchLogin($correo, $contrasena, $isRecordar){
        self::inicializarConexion();
        $sql="call getUser(:correo)";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['correo'=>$correo]);
    
        $usuario = $sentencia->fetch();
        
    
        if(!$usuario) {
            echo "error en correo";
           return false;
        }  
    
        if($contrasena == $usuario["CONTRASENA"]){
            
            $_SESSION['usuario_id']=$usuario["ID"];
            
            //$_SESSION['correo']=$usuarios["CORREO"];
            $_SESSION['usuario_nombre']=$usuario["NOMBRE"];
            /*echo'<script type="text/javascript">
            alert("'.$_SESSION['usuario_tipo'].'");
            </script>';*/
            //echo $_SESSION['usuario_nombre'];
            //echo $_SESSION['usuario_id'];
            //header('Location: index.php');
            //echo'<script>
            //window.location.href="home.php";
            //</script>';
            if($isRecordar){
                setcookie('correo',$correo,time()+3600, "/");
                setcookie('contrasena',$contrasena,time()+3600, "/");            
            }
            
        }else{
            
            echo "Error en la contraseña o correo";
            //print_r($usuarios["CONTRASENA"] . "serve");
            //print_r($contrasena . "input");
            return;
        }
    
        //echo "todo bien";
        return true;
    }

    static function registrarUsuario($correo, $contrasena, $nombre, $telefono, $direccion){
        self::inicializarConexion();
        
        try{
        $sqlInsert="insert into usuarios (correo, contrasena, nombre, telefono, direccion) values (:correo, :contrasena, :nombre, :telefono, :direccion);";
        $consultaInsert= self::$conexion->prepare($sqlInsert);
        $consultaInsert->execute(array(
        ':correo'=> $correo,
        ':contrasena'=>$contrasena,
        ':nombre'=>$nombre,
        ':telefono'=>$telefono,
        ':direccion'=>$direccion
        ));

       
        setcookie('correo',$correo,time()+3600, "/");
        setcookie('contrasena',$contrasena,time()+3600, "/");
        return array(true,"insertado con exito");
        
        }catch(PDOException $e){
            if ($e->errorInfo[1] == 1062) {
                $cadena = "El correo electrónico ya está en uso.";
                return array(false, $cadena);
            } else {
                // Otro tipo de error
                return array(false, "Error al insertar usuario: " . $e->getMessage());
            }
        }
    }

    static function editarUsuario($id, $correo, $contrasena, $nombre, $telefono, $direccion){
        self::inicializarConexion();
        $usuario = UsuarioClass::buscarUsuarioByID($id);
        
    
        if($usuario==null) {
           return array(false,"error en id");
        }

        $sqlUpdate="update usuarios set correo = :correo, contrasena = :contrasena, nombre= :nombre, telefono= :telefono, direccion= :direccion ";
        $sentencia2 = self::$conexion-> prepare($sqlUpdate);
        $sentencia2 -> execute(['correo'=>$correo],
                                ['contrasena'=>$contrasena],
                                ['nombre'=>$nombre],
                                ['telefono'=>$telefono],
                                ['direccion'=>$direccion]);

        return array(true,"actualizado con exito");
                                
    }

    static function eliminarUsuario($id){
        self::inicializarConexion();
        $usuario = UsuarioClass::buscarUsuarioByID($id);
        
    
        if($usuario==null) {
           return array(false, "error en id");
        }

        $sqlUpdate="update usuarios set activo = false where id = :id";
        $sentencia2 = self::$conexion-> prepare($sqlUpdate);
        $sentencia2 -> execute(['id'=>$id]);

        setcookie('correo','',-1, '/');
            setcookie('contrasena','',-1, '/');
            //echo '<script>alert("You have been logged out.")</script>;'
            if(session_status()==PHP_SESSION_NONE){
                session_start();
            }
            session_destroy();

        return array(true, "eliminado exitoso");
                                
    }

    static function buscarUsuarioByID($id){
        
        self::inicializarConexion();
        $sql="select * from usuarios where id=:id";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['id'=>$id]);
    
        $usuario = $sentencia->fetch();
        
    
        if(!$usuario) {
           return null;
        }else{
            return $usuario;
        }
    }

    static function matchLoginCookie($correo, $contrasena){
        $sql="call getUser(:correo)";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['correo'=>$correo]);
    
        $usuario = $sentencia->fetch();
    
        if(!$usuario) {
            echo "error en correo";
            return;
        }
    
        if($contrasena == $usuario["CONTRASENA"]){
            
            $_SESSION['usuario_id']=$usuario["ID"];
            $_SESSION['usuario_nombre']=$usuario["NOMBRE"];
            setcookie('correo',$correo,time()+3600,"/");
            setcookie('contrasena',$contrasena,time()+3600,"/");
    
            /*echo '<script>
            alert("Bienvenido de nuevo");
            window.location.href="../dashboard/dashboard.php"
            </script>';*/
    
        }else{
            echo "Error en la contraseña o correo";
        }
    }

}

?>