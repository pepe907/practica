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
    <title>Aprende PHP</title>
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
        <h1>Que es PHP?</h1>
        <p>A continuacion, te explicamos que es PHP y como se utiliza para desarrollar aplicaciones web dinamicas.</p>
    </header>

    <main>
        <p>PHP (Hypertext Preprocessor) es un lenguaje de programacion de proposito general, especialmente disenado para el desarrollo web. Se ejecuta en el servidor, lo que significa que genera contenido dinamico para las paginas web antes de enviarlas al navegador del usuario.</p>

        <h2>Caracteristicas principales de PHP:</h2>
        <ul>
            <li><strong>Lenguaje del lado del servidor:</strong> PHP es interpretado y se ejecuta en el servidor, lo que permite generar contenido dinamico que cambia segun las interacciones del usuario.</li>
            <li><strong>Facil de integrar con bases de datos:</strong> PHP es muy eficaz para trabajar con bases de datos, especialmente con MySQL, lo que lo hace ideal para desarrollar aplicaciones web como sistemas de gestion de contenido y foros.</li>
            <li><strong>Ampliamente soportado:</strong> PHP es compatible con la mayoria de servidores web, como Apache y Nginx, y funciona en casi todos los sistemas operativos.</li>
            <li><strong>Sintaxis similar a C:</strong> Si ya tienes conocimientos de otros lenguajes de programacion como C, Java o JavaScript, aprender PHP sera mas sencillo.</li>
        </ul>

        <h2>Sintaxis basica de PHP:</h2>
        <p>A continuacion se describen algunos de los conceptos y sintaxis basicos en PHP:</p>

        <h3>Variables</h3>
        <p>En PHP, las variables se definen con el simbolo <code>$</code>, y no necesitan declarar el tipo de dato.</p>
        <pre><code>&lt;?php
$nombre = "Juan";
$edad = 25;
echo "Hola, mi nombre es " . $nombre . " y tengo " . $edad . " años.";
?&gt;</code></pre>

        <h3>Funciones</h3>
        <p>Las funciones en PHP se definen con la palabra clave <code>function</code>.</p>
        <pre><code>&lt;?php
function saludar($nombre) {
    echo "Hola, " . $nombre . "!";
}
saludar("Juan");
?&gt;</code></pre>

        <h3>Condicionales</h3>
        <p>PHP soporta estructuras condicionales como <code>if</code>, <code>else</code> y <code>elseif</code>.</p>
        <pre><code>&lt;?php
$edad = 18;

if ($edad >= 18) {
    echo "Eres mayor de edad.";
} else {
    echo "Eres menor de edad.";
}
?&gt;</code></pre>

        <h3>Bucles</h3>
        <p>PHP soporta bucles como <code>for</code>, <code>while</code> y <code>foreach</code>.</p>
        <pre><code>&lt;?php
for ($i = 0; $i < 5; $i++) {
    echo "Número: " . $i . "&lt;br&gt;";
}
?&gt;</code></pre>

        <h3>Arrays</h3>
        <p>Los arrays en PHP pueden ser indexados o asociativos. Un array indexado tiene claves numericas, mientras que un array asociativo tiene claves de tipo cadena.</p>
        <pre><code>&lt;?php
$colores = array("rojo", "verde", "azul");
echo $colores[1];  // Imprime 'verde'

$persona = array("nombre" => "Juan", "edad" => 30);
echo $persona["nombre"];  // Imprime 'Juan'
?&gt;</code></pre>

        <h3>Formularios y envio de datos</h3>
        <p>PHP es ampliamente utilizado para procesar formularios y manejar datos enviados por el usuario a traves de metodos como GET y POST.</p>
        <pre><code>&lt;form action="procesar.php" method="POST"&gt;
    Nombre: &lt;input type="text" name="nombre"&gt;&lt;br&gt;
    Edad: &lt;input type="text" name="edad"&gt;&lt;br&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;</code></pre>
        <p>El archivo <code>procesar.php</code> podria manejar los datos de la siguiente manera:</p>
        <pre><code>&lt;?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    echo "Nombre: " . $nombre . "&lt;br&gt;";
    echo "Edad: " . $edad;
}
?&gt;</code></pre>

        <h2>Conexion a bases de datos MySQL</h2>
        <p>PHP se utiliza comunmente para interactuar con bases de datos. A continuacion se muestra como conectar PHP con una base de datos MySQL.</p>
        <pre><code>&lt;?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "mi_base_de_datos";

$conn = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa!";
?&gt;</code></pre>

        <h2>Conclusion:</h2>
        <p>PHP es un lenguaje muy utilizado para el desarrollo web, especialmente para la creacion de aplicaciones web dinamicas. Su integracion con bases de datos y su flexibilidad lo hacen esencial en el desarrollo de sitios web complejos. Aprender PHP es fundamental para cualquier persona interesada en el desarrollo web del lado del servidor.</p>
    </main>
</body>
</html>