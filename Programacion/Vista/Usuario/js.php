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
    <link rel="stylesheet" href="./css/html.css">
    <title>Aprende JavaScript</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="#">Lenguajes</a></li>
            <li><a href="#">Contactanos</a></li>
            <li><a href="./cerrar_sesion.php">Cerrar Sesion</a></li>
        </ul>
    </nav>
    <hr>
    
    <header>
        <h1>Que es JavaScript?</h1>
        <p>A continuacion te explicamos paso a paso que es JavaScript y como se utiliza en el desarrollo web.</p>
    </header>

    <main>
        <p>JavaScript es un lenguaje de programacion interpretado que se utiliza principalmente para crear interactividad en las paginas web. 
        Es uno de los lenguajes fundamentales para el desarrollo web junto con HTML y CSS. 
        JavaScript permite manipular el contenido de una pagina web de forma dinamica, es decir, 
        puede modificar el HTML y CSS despues de que la pagina haya sido cargada.</p>

        <h2>Caracteristicas principales de JavaScript:</h2>
        <ul>
            <li><strong>Lenguaje interpretado:</strong> JavaScript se ejecuta en el navegador web y no necesita ser compilado antes de su uso.</li>
            <li><strong>Interactividad:</strong> Permite crear aplicaciones web interactivas, como formularios dinamicos, validaciones en tiempo real, animaciones y juegos.</li>
            <li><strong>Manipulacion del DOM:</strong> JavaScript puede interactuar con el Documento Object Model (DOM), que es una representacion estructurada de la pagina web, para modificar su contenido, estructura y estilo.</li>
            <li><strong>Lenguaje basado en eventos:</strong> JavaScript responde a eventos como clics de raton, teclas presionadas o desplazamiento del raton para activar acciones en la pagina.</li>
        </ul>

        <h2>Sintaxis Basica de JavaScript:</h2>
        <p>A continuacion se describen algunos de los conceptos y sintaxis basicos en JavaScript:</p>

        <h3>Variables</h3>
        <p>Las variables se utilizan para almacenar datos. En JavaScript, se pueden declarar variables usando <code>let</code>, <code>const</code>, o <code>var</code>.</p>
        <pre><code>let nombre = "Juan"; // Declarar una variable con let
const edad = 30; // Declarar una constante con const</code></pre>

        <h3>Funciones</h3>
        <p>Las funciones son bloques de codigo que se pueden ejecutar cuando se invocan. En JavaScript, se definen usando la palabra clave <code>function</code>.</p>
        <pre><code>function saludar(nombre) {
    alert("Hola, " + nombre);
}

saludar("Juan"); // Llamada a la función</code></pre>

        <h3>Condicionales</h3>
        <p>Los condicionales permiten ejecutar diferentes bloques de codigo segun una condicion.</p>
        <pre><code>let edad = 18;

if (edad >= 18) {
    alert("Eres mayor de edad");
} else {
    alert("Eres menor de edad");
}</code></pre>

        <h3>Bucles</h3>
        <p>Los bucles permiten ejecutar un bloque de codigo varias veces. Un ejemplo es el bucle <code>for</code>.</p>
        <pre><code>for (let i = 0; i < 5; i++) {
    console.log("Número " + i);
}</code></pre>

        <h3>Eventos</h3>
        <p>JavaScript puede responder a eventos de usuario como clics, desplazamiento, teclas presionadas, entre otros. Por ejemplo, puedes ejecutar una funcion al hacer clic en un boton.</p>
        <pre><code>&lt;button onclick="alert('¡Hola!')"&gt;Haz clic aqui&lt;/button&gt;</code></pre>

        <h3>Manipulacion del DOM</h3>
        <p>JavaScript permite modificar el contenido de la pagina web accediendo a los elementos del DOM.</p>
        <pre><code>let titulo = document.getElementById("miTitulo");
titulo.innerHTML = "Nuevo título";</code></pre>

        <h2>Ejemplo Completo de una Pagina Web con JavaScript:</h2>
        <p>A continuacion, te mostramos un ejemplo donde se manipulan elementos de la pagina con JavaScript:</p>

        <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Mi Página con JavaScript&lt;/title&gt;
        &lt;script&gt;
            function cambiarColor() {
                document.body.style.backgroundColor = "lightblue";
            }
        &lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;header&gt;
            &lt;h1 id="miTitulo"&gt;Bienvenidos a mi página&lt;/h1&gt;
            &lt;button onclick="cambiarColor()"&gt;Cambiar color de fondo&lt;/button&gt;
        &lt;/header&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

        <h2>Conclusion:</h2>
        <p>JavaScript es esencial para el desarrollo de paginas web dinamicas y modernas. Con JavaScript, puedes agregar interactividad, crear aplicaciones web avanzadas y manipular los elementos HTML y CSS de manera eficiente. Es uno de los lenguajes mas populares y poderosos en el mundo de la programacion web.</p>
    </main>
</body>
</html>
