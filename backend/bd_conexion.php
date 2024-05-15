<?php
class BD{
    public static $instancia = null;
    public static function crearInstancia(){
        
        if (!isset(self::$instancia) ){
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=localhost;dbname=TACOSPIPEV1','root', '1024', $opciones );
            //echo "conectado";
        }else{
            //echo "error";
        };
        return self::$instancia;

    }
}

?>