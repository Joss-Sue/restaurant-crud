<nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-0 btn-menu">
                <label for="btn-menu">☰</label>
                <a href="../../backend/cerrarSesion.php">Cerrar Sesión</a>
                <!--trigger Modal login-->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Iniciar Sesión
                </button>
                <!--trigger Modal login-->
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <a href="../../index.php">
                <img src="../../resource/TacosPipeLogo.png" alt="">
                </a>
                
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <?php
                    /*if($user != null && $user != ''){
                        echo '<a href="order.php">¡ORDENA YA!</a>';
                    }else{
                        echo '<a href="login.php">¡ORDENA YA!</a>';
                    }*/
                ?>
            </div>
        </div>
    </div>
    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <a href="#">¡Ordena!</a>
                <a href="#menu">Nuestro menú</a>
                <a href="#">Sucursales</a>
                <a href="#">Nosotros</a>
                <a href="#">Contacto</a>
            </nav>
            <label for="btn-menu">✖️</label>
        </div>
    </div>
</nav>