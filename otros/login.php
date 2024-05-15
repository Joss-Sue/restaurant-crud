<?php include_once './backend/bd_conexion.php';
session_start();
$conexion=BD::crearInstancia(); 

if($_SERVER['REQUEST_METHOD']){
    //print_r($_POST);

    $correo=(isset($_POST['correo']))?htmlspecialchars($_POST['correo']):null;
    $contrasena=(isset($_POST['contrasena']))?$_POST['contrasena']:null;
    //print_r($contrasena . "input");
    
    $sql="SELECT * FROM usuarios WHERE correo=:correo";
    $sentencia = $conexion-> prepare($sql);
    $sentencia -> execute(['correo'=>$correo]);

    $usuarios = $sentencia->fetch(PDO::FETCH_ASSOC);
    //print_r($usuarios["CONTRASENA"] . "serve");

    

    if($contrasena == $usuarios["CONTRASENA"]){
        $_SESSION['usuario_id']=$usuarios["ID"];
        $_SESSION['correo_id']=$usuarios["CORREO"];
        $_SESSION['usuario_nombre']=$usuarios["NOMBRE"];
        echo $_SESSION['usuario_nombre'];
        //header('Location: index.php');
        echo'<script type="text/javascript">
        alert("Inicio de sesion con exito");
        window.location.href="index.php";
        </script>';
    }else{
        
        echo "Error en la contraseña o correo";
        //print_r($usuarios["CONTRASENA"] . "serve");
        //print_r($contrasena . "input");
    }
    //$sentencia -> bindParam(':correo',$correo);
    //$sentencia -> execute();
    //$resultado = $sentencia -> fetch();
}

?>