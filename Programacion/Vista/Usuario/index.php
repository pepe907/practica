<?php
session_start(); // Inicia la sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) { // Aquí usamos $_SESSION['usuario'] que es lo que guardamos al loguearse
    // Si no está logueado, redirigir al login
    header("Location: ../login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Aprendiendo</title>
</head>
<body>

   <nav>
        <div class="logo">Tu codigo</div>
        <ul id="menu" class="menu">
            <li><a href="./index.php" class="active">Inicio</a></li>
            <li><a href="./lenguajes.php">Lenguajes</a></li>
            <li><a href="#">Contáctanos</a></li>
            <li><a href="./cerrar_sesion.php">Cerrar Sesion</a></li>
        </ul>
        <span class="menu-icon" id="menu-icon">&#9776;</span>  <!-- Icono de menú hamburguesa -->
    </nav>
    
    <h1>Hola, ¿Quieres Aprender a Programar? Estás en el lugar Correcto</h1>
    <hr>
    <div class="Contenedor">
        <div class="Caja">
            <h2>Curso de HTML</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEc9A_S6BPxCDRp5WjMFEfXrpCu1ya2OO-Lw&s" alt="HTML">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./html.php">Aprender</a></button>
        </div>

        <div class="Caja">
            <h2>Curso de CSS</h2>
            <img src="https://c76c7bbc41.mjedge.net/wp-content/uploads/2014/10/css3.jpg" alt="CSS">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./css.php">Aprender</a></button>
        </div>

        <div class="Caja">
            <h2>Curso de JavaScript</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT51BMMUr2H27skg69TPo-ohN15vKM_fFeX0A&s" alt="JavaScript">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./js.php">Aprender</a></button>
        </div>

        <div class="Caja">
            <h2>Curso de Java</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-iFC6k8ZpqwQjDj-I4ekrh92xnQzWR2bHQw&s" alt="Java">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./java.php">Aprender</a></button>
        </div>

        <div class="Caja">
            <h2>Curso de Python</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHCr8Hopv55dVfVQWBaTde4lun4OGQLYgc_g&s" alt="Python">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./python.php">Aprender</a></button>
        </div>

        <div class="Caja">
            <h2>Curso de PHP</h2>
            <img src="https://nestrategia.com/wp-content/uploads/2019/04/php-desarrollo-web.png" alt="PHP">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./php.php">Aprender</a></button>
        </div>

        <div class="Caja">
            <h2>Curso de SQL</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQM91T1S4z84bTfnQg-ExIMn9MW_bs43wkg5g&s" alt="SQL">
            <p>Inicia hoy y prepárate para ser un profesional</p>
            <p>¡Gratis!</p>
            <button><a href="./SQL.php">Aprender</a></button>
        </div>
    </div>
    
</body>
</html>