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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenguajes de Programación</title>
    <link rel="stylesheet" href="./css/lenguaje.css">
</head>
<body>

    <!-- Barra de Navegación -->
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
    
    <!-- Contenido principal -->
    <div class="main-content">
        <h1>Lenguajes de Programación</h1>
        <p>En esta página te presentamos una lista de los lenguajes de programación más importantes, organizados en categorías.</p>
        
        <div class="categoria">
            <h2>Lenguajes de Programación de Alto Nivel</h2>
            <ul class="lenguajes">
                <li>Python</li>
                <li>Java</li>
                <li>C#</li>
                <li>Ruby</li>
            </ul>
        </div>
        
        <div class="categoria">
            <h2>Lenguajes de Programación de Bajo Nivel</h2>
            <ul class="lenguajes">
                <li>C</li>
                <li>C++</li>
                <li>Rust</li>
                <li>Assembly</li>
            </ul>
        </div>
        
        <div class="categoria">
            <h2>Lenguajes para Desarrollo Web</h2>
            <ul class="lenguajes">
                <li>JavaScript</li>
                <li>TypeScript</li>
                <li>PHP</li>
                <li>HTML & CSS (Lenguajes de marcado y estilo)</li>
            </ul>
        </div>
        
        <div class="categoria">
            <h2>Lenguajes Especializados</h2>
            <ul class="lenguajes">
                <li>R (Análisis estadístico)</li>
                <li>MATLAB (Ingeniería y matemáticas)</li>
                <li>SQL (Bases de datos)</li>
                <li>Swift (Desarrollo iOS)</li>
            </ul>
        </div>
        
        <p class="footer">¡Aprender lenguajes de programación abre un mundo de posibilidades!</p>
    </div>

</body>
</html>
