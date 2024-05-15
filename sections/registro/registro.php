<!--!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/login-signup.css">
    <title>Registrate - Tacos Pipe</title>
</head>

<nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-0 btn-menu">
                <label for="btn-menu">☰</label>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <a href="index.php"><img src="../../resource/TacosPipeLogo.png" alt=""></a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
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
</nav-->    

<?php
$title="Registrate - Tacos";
$style="../../styles/login-signup.css";
include "../../templates/cabecera.php";
include "../../templates/navbar.php";
?>
<body>
    <section id="form-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>¡Registrate!</h1>
                    <form id="registroForm" >
                        <label for="">Correo:</label>
                        <input type="text" name="correo" id=""><br>
                        <label for="">Contraseña:</label>
                        <input type="password" name="contrasena" id=""><br>
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" id=""><br>
                        <label for="">Telefono:</label>
                        <input type="text" name="telefono" id=""><br>
                        <label for="">Dirección:</label>
                        <input type="text" name="direccion" id=""><br>
                
                        <button type="submit">Registrarme</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script>
document.getElementById("registroForm").addEventListener("submit", function(event){
    event.preventDefault(); // Evitar el envío por defecto del formulario

    const formData = new FormData(this); // Obtener los datos del formulario
    const userData = {}; // Objeto para almacenar los datos del usuario

    // Iterar sobre los datos del formulario y guardarlos en el objeto userData
    formData.forEach((value, key) => {
        userData[key] = value;
    });

    console.log(userData);
    // Convertir los datos a formato JSON
    const jsonData = JSON.stringify(userData);

    console.log(jsonData);

    // Enviar los datos al servidor usando Fetch
    fetch("http://localhost/TacosPipePHP/api/usuariosController.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: jsonData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Error al registrarse")
        }else{
            return response.json()
        }
    })
    .then(data => {console.log(data)
        window.location.href = "http://localhost/TacosPipePHP/sections/home/home.php"  
    })
      
    .catch(error => console.log("Error:", error))
        // Aquí puedes manejar el error, como mostrar un mensaje al usuario
    });
 
</script>
<?php
    include "../../templates/footer.php";
?>