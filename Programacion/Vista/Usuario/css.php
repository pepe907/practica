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
    <title>Aprende CSS</title>
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
        <h1>Que es CSS?</h1>
        <p>A continuacion te explicaremos paso a paso.</p>
    </header>

    <main>
        <p>CSS (Cascading Style Sheets) es un lenguaje utilizado para definir el estilo visual de las paginas web. CSS permite cambiar la apariencia de los elementos HTML, como los colores, fuentes, margenes
            , alineacion y disposicion de los elementos en la pagina.</p>

        <h2>Caracteristicas principales de CSS:</h2>
        <ul>
            <li><strong>Separacion de contenido y estilo:</strong> HTML se utiliza para estructurar el contenido, mientras que CSS se usa para definir su presentacion visual.</li>
            <li><strong>Seleccion de elementos:</strong> Con CSS, se pueden seleccionar elementos HTML mediante selectores (como clases, id, etiquetas, entre otros) y aplicarles estilos especificos.</li>
            <li><strong>Herencia:</strong> En CSS, los elementos pueden heredar propiedades de sus elementos padre, lo que permite aplicar estilos de forma eficiente.</li>
            <li><strong>Cascada:</strong> CSS sigue una jerarquia de reglas que determina que estilos se aplican a los elementos cuando hay conflicto entre ellos.</li>
        </ul>

        <h2>Propiedades Comunes en CSS:</h2>
        <p>A continuacion te mostramos algunas de las propiedades más comunes de CSS:</p>

        <h3>color</h3>
        <p>La propiedad <code>color</code> se usa para cambiar el color del texto.</p>
        <pre><code>p { color: red; }</code></pre>

        <h3>background-color</h3>
        <p>La propiedad <code>background-color</code> se utiliza para cambiar el color de fondo de un elemento.</p>
        <pre><code>div { background-color: yellow; }</code></pre>

        <h3>font-family</h3>
        <p>Esta propiedad permite cambiar la tipografia del texto.</p>
        <pre><code>h1 { font-family: Arial, sans-serif; }</code></pre>

        <h3>padding</h3>
        <p>La propiedad <code>padding</code> define el espacio interior entre el contenido de un elemento y su borde.</p>
        <pre><code>div { padding: 20px; }</code></pre>

        <h3>margin</h3>
        <p>La propiedad <code>margin</code> define el espacio exterior entre un elemento y los demas elementos circundantes.</p>
        <pre><code>p { margin: 15px; }</code></pre>

        <h3>border</h3>
        <p>La propiedad <code>border</code> se usa para agregar un borde alrededor de un elemento.</p>
        <pre><code>div { border: 2px solid black; }</code></pre>

        <h3>text-align</h3>
        <p>Esta propiedad se utiliza para alinear el texto dentro de un elemento.</p>
        <pre><code>h2 { text-align: center; }</code></pre>

        <h3>display</h3>
        <p>La propiedad <code>display</code> define como se muestran los elementos en la pagina. 
            Algunos valores comunes son <code>block</code>, <code>inline</code>, <code>flex</code>, y <code>grid</code>.</p>
        <pre><code>div { display: flex; justify-content: center; }</code></pre>

        <h3>position</h3>
        <p>La propiedad <code>position</code> permite definir como se posiciona un elemento en la página. 
            Los valores comunes son <code>static</code>, <code>relative</code>, <code>absolute</code>, y <code>fixed</code>.</p>
        <pre><code>div { position: relative; top: 10px; left: 20px; }</code></pre>

        <h3>width y height</h3>
        <p>Estas propiedades se utilizan para definir el ancho y la altura de un elemento.</p>
        <pre><code>img { width: 300px; height: 200px; }</code></pre>

        <h2>Ejemplo Completo de una Pagina Web con CSS:</h2>
        <p>A continuacion, te mostramos un ejemplo de como se utiliza CSS en una pagina HTML:</p>

        <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Mi Página Web&lt;/title&gt;
        &lt;link rel="stylesheet" href="estilos.css"&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;header&gt;
            &lt;h1&gt;Bienvenidos a mi página web&lt;/h1&gt;
        &lt;/header&gt;
        &lt;main&gt;
            &lt;h2&gt;Mi primer diseño con CSS&lt;/h2&gt;
            &lt;p&gt;Aquí aprenderás cómo dar estilo a tu contenido web usando CSS.&lt;/p&gt;
        &lt;/main&gt;
        &lt;footer&gt;
            &lt;p&gt;&copy; 2024 Mi Sitio Web&lt;/p&gt;
        &lt;/footer&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

        <h2>Conclusion:</h2>
        <p>CSS es una herramienta poderosa para controlar el aspecto visual de las paginas web.
            Al aprender CSS, podras crear sitios web profesionales y visualmente atractivos. Combinado con HTML, 
            CSS te permitira disenar paginas web funcionales y bien estructuradas.</p>
    </main>
</body>
</html>
