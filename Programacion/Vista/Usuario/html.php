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
    <title>Aprende HTML</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="#">Lenguajes</a></li>
            <li><a href="#">Contactanos</a></li>
            <li><a href="./cerrar_sesion.php">Login</a></li>
        </ul>
    </nav>
    <hr>
    
    <header>
        <h1>Que es HTML?</h1>
        <p>A continuacion te explicaremos paso a paso.</p>
    </header>

    <main>
        <p>HTML (HyperText Markup Language) es el lenguaje de marcado utilizado para estructurar contenido en la web. 
            Es el bloque fundamental sobre el que se construyen las paginas web. HTML define la estructura y el contenido de una pagina, 
            como los encabezados, parrafos, imagenes, enlaces y otros elementos.</p>
        
        <h2>Caracteristicas principales de HTML:</h2>
        <ul>
            <li><strong>Estructura basica:</strong> HTML utiliza "etiquetas" para marcar los distintos elementos. 
                Las etiquetas se escriben entre corchetes angulares &lt;&gt;. Por ejemplo:
                <pre><code>&lt;h1&gt; para un encabezado de nivel 1.</code></pre>
                <pre><code>&lt;p&gt; para un parrafo.</code></pre>
                <pre><code>&lt;img&gt; para insertar imagenes.</code></pre>
            </li>
            <li><strong>Etiquetas de apertura y cierre:</strong> La mayoria de las etiquetas HTML tienen una version de apertura y una de cierre.
                La etiqueta de apertura esta escrita como <code>&lt;nombre&gt;</code> y la de cierre como <code>&lt;/nombre&gt;</code>. Por ejemplo:
                <pre><code>&lt;h1&gt;Texto&lt;/h1&gt;</code></pre>
            </li>
            <li><strong>Atributos:</strong> Las etiquetas pueden tener atributos que proporcionan informacion adicional sobre el elemento. Por ejemplo:
                <pre><code>&lt;a href="https://www.ejemplo.com"&gt;Enlace&lt;/a&gt;</code></pre>
                donde <code>href</code> es un atributo que indica la direccion a la que lleva el enlace.
            </li>
            <li><strong>Jerarquia:</strong> HTML tiene una jerarquia, donde los elementos se anidan unos dentro de otros. 
                Por ejemplo, una pagina HTML basica tiene la etiqueta:
                <pre><code>&lt;html&gt; que contiene &lt;head&gt; y &lt;body&gt;</code></pre>
            </li>
        </ul>

        <h2>Etiquetas Comunes en HTML:</h2>
        <p>A continuacion se presentan algunas de las etiquetas mas comunes en HTML:</p>

        <h3>&lt;html&gt;</h3>
        <p>La etiqueta <code>&lt;html&gt;</code> es la raiz de un documento HTML. Todo el contenido de la pagina debe estar dentro de esta etiqueta.</p>
        <pre><code>&lt;html&gt;
    &lt;head&gt;
        &lt;title&gt;Mi Pagina&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Bienvenidos&lt;/h1&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

        <h3>&lt;head&gt;</h3>
        <p>La etiqueta <code>&lt;head&gt;</code> contiene metadatos sobre la pagina, como el título y las configuraciones de los estilos o scripts externos.</p>
        <pre><code>&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Mi Pagina Web&lt;/title&gt;
&lt;/head&gt;</code></pre>

        <h3>&lt;body&gt;</h3>
        <p>El contenido visible de la pagina va dentro de la etiqueta <code>&lt;body&gt;</code>. Es donde se ponen los textos, imagenes, enlaces y demas elementos.</p>
        <pre><code>&lt;body&gt;
    &lt;p&gt;Este es un parrafo en la pagina&lt;/p&gt;
&lt;/body&gt;</code></pre>

        <h3>&lt;h1&gt;, &lt;h2&gt;, &lt;h3&gt;, etc.</h3>
        <p>Estas son etiquetas de encabezado. Se utilizan para definir titulos y subtitulos. <code>&lt;h1&gt;</code> es el titulo principal y va disminuyendo hasta <code>&lt;h6&gt;</code> para los titulos mas pequenos.</p>
        <pre><code>&lt;h1&gt;Este es el encabezado principal&lt;/h1&gt;</code></pre>
        <pre><code>&lt;h2&gt;Este es un subtitulo&lt;/h2&gt;</code></pre>

        <h3>&lt;p&gt;</h3>
        <p>La etiqueta <code>&lt;p&gt;</code> se utiliza para los parrafos de texto.</p>
        <pre><code>&lt;p&gt;Este es un parrafo de ejemplo.&lt;/p&gt;</code></pre>

        <h3>&lt;a&gt;</h3>
        <p>La etiqueta <code>&lt;a&gt;</code> se usa para crear enlaces. El atributo <code>href</code> define la URL a la que lleva el enlace.</p>
        <pre><code>&lt;a href="https://www.example.com"&gt;Haz clic aqui&lt;/a&gt;</code></pre>

        <h3>&lt;img&gt;</h3>
        <p>La etiqueta <code>&lt;img&gt;</code> se usa para insertar imagenes en la pagina. Se utiliza con el atributo <code>src</code> que define la fuente de la imagen y <code>alt</code> que proporciona un texto alternativo si la imagen no se carga.</p>
        <pre><code>&lt;img src="imagen.jpg" alt="Descripcion de la imagen"&gt;</code></pre>

        <h3>&lt;ul&gt; y &lt;ol&gt;</h3>
        <p>Las etiquetas <code>&lt;ul&gt;</code> (lista desordenada) y <code>&lt;ol&gt;</code> (lista ordenada) se utilizan para crear listas. <code>&lt;li&gt;</code> define cada elemento de la lista.</p>
        <pre><code>&lt;ul&gt;
    &lt;li&gt;Elemento 1&lt;/li&gt;
    &lt;li&gt;Elemento 2&lt;/li&gt;
&lt;/ul&gt;</code></pre>

        <h3>&lt;table&gt;, &lt;tr&gt;, &lt;td&gt;, &lt;th&gt;</h3>
        <p>Las etiquetas <code>&lt;table&gt;</code>, <code>&lt;tr&gt;</code>, <code>&lt;td&gt;</code> y <code>&lt;th&gt;</code> se utilizan para crear tablas. <code>&lt;table&gt;</code> crea la tabla, <code>&lt;tr&gt;</code> define las filas, <code>&lt;td&gt;</code> las celdas de datos y <code>&lt;th&gt;</code> define los encabezados de las columnas.</p>
        <pre><code>&lt;table&gt;
    &lt;tr&gt;
        &lt;th&gt;Nombre&lt;/th&gt;
        &lt;th&gt;Edad&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;td&gt;Juan&lt;/td&gt;
        &lt;td&gt;30&lt;/td&gt;
    &lt;/tr&gt;
&lt;/table&gt;</code></pre>

        <h2>Formularios</h2>
        <p>Los formularios permiten a los usuarios enviar informacion a un servidor. Se utilizan las etiquetas <code>&lt;form&gt;</code>, <code>&lt;input&gt;</code>, <code>&lt;label&gt;</code>, entre otras.</p>
        <pre><code>&lt;form action="procesar.php"&gt;
    &lt;label for="nombre"&gt;Nombre:&lt;/label&gt;
    &lt;input type="text" id="nombre" name="nombre"&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;</code></pre>

        <h2>Conclusion:</h2>
        <p>HTML es el punto de partida en el desarrollo web. A medida que vayas aprendiendo, entenderas como combinar HTML con otras tecnologias como CSS y JavaScript para crear sitios web completos e interactivos.</p>
    </main>
</body>
</html>