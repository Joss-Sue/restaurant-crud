<?php
$title="Orden - Tacos Pipe";
$style="../../styles/order-styles.css";
include "../../templates/cabecera.php";
include "../../templates/navbar.php";

?>




    <!-- <h1>Bienvenid@ <?= $_SESSION['usuario_nombre'] ?></h1>
    <a href="./backend/cerrarSesion.php">Cerrar Sesión</a> -->
    
    <body>
        
        <section id="Order">
            <div class="container">
                <div class="row">
                    <div class="col-12 order-top">
                        <h1>¿Qué va a llevar joven?</h1>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-10 do-order">
                    <?php include "generarProductos.php";?>

                        <!--div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu1.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="one-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div-->

                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu2.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos . $platillo['nombre'] .</h2>
                                        <h2>$ .. $platillo['costo'] .</h2>
                                    </div>
                                    <p>. $platillo['descripcion'] .</p>
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
                            <button>Ordenar</button>
                            </div>
                        </div>
                        <!--div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu3.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="three-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu4.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="four-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu5.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="five-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu6.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="six-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div-->
                    </div>
                    <div class="col-1">

                    </div>
                    <!--div class="col-12 order-now">
                        <button>Ordenar</button>
                    </div-->
                </div>
            </div>
        </section>
    <?php include "../../templates/footer.php"; ?>