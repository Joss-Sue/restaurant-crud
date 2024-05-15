<?php include_once '../../backend/bd_conexion.php';
//session_start();
//$conexion=BD::crearInstancia();

pintarPlatillos(getPlatillos("Platillo"));

function getPlatillos($categoria){
    try {
        $conexion = BD::crearInstancia();

        $sql = "select * from productos where categoria = :categoria and activo=1";
        $resultadoConsulta = $conexion->prepare($sql);
        $resultadoConsulta->execute(['categoria' => $categoria]);
        
        // Obtener todos los resultados
        $platillos = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);
        return $platillos;
        // Mostrar los platillos
        
        
    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function pintarPlatillos($platillos){
    if(isset($platillos)){
        foreach ($platillos as $platillo) {
          echo $htmlCard = <<<HTML
            <div class="row">
                <div class="col-7 food-card">
                    <img src="../../resource/menu/menu2.jpg" alt="">
                    <div class="food-text">
                        <div class="title-price">
                            <h2>{$platillo['nombre']} </h2>
                            <h2>$ {$platillo['costo']} </h2>
                        </div>
                        <p>{$platillo['descripcion']}</p>
                    </div>
                </div>
                <div class="col-5 incdec-button">
                    <div>
                        <button>-</button>
                        <p id="two-number">1</p>
                        <button>+</button>
                    </div>
                </div>
                <div class="col-12 order-now">
                    <button value="{$platillo['id']}">Ordenar</button>
                </div>
            </div>
            HTML;} 
        }else {
           echo "<h1>No hay productos para mostrar :c<h1>";
        }
}

?>