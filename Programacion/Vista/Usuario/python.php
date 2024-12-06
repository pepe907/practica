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
    <title>Aprende Python</title>
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
        <h1>Que es Python?</h1>
        <p>A continuacion te explicamos que es Python y como se utiliza en la programacion.</p>
    </header>

    <main>
        <p>Python es un lenguaje de programacion de alto nivel, interpretado, dinamico y orientado a objetos. Es conocido por su simplicidad y legibilidad, lo que lo convierte en uno de los lenguajes mas populares para principiantes y desarrolladores experimentados.</p>

        <h2>Caracteristicas principales de Python:</h2>
        <ul>
            <li><strong>Facil de aprender y usar:</strong> Python tiene una sintaxis simple que es facil de entender, lo que lo convierte en un lenguaje ideal para principiantes.</li>
            <li><strong>Interpretado:</strong> Python no requiere una compilacion previa, lo que facilita la prueba y depuracion del codigo.</li>
            <li><strong>Orientado a objetos:</strong> Python permite programar utilizando clases y objetos, lo que facilita la organizacion y reutilizacion del codigo.</li>
            <li><strong>Amplia libreria estandar:</strong> Python cuenta con una extensa coleccion de bibliotecas que te permiten realizar tareas complejas, como el procesamiento de datos, la creacion de interfaces graficas, desarrollo web, y mucho mas.</li>
        </ul>

        <h2>Sintaxis Basica de Python:</h2>
        <p>A continuacion se describen algunos de los conceptos y sintaxis basicos en Python:</p>

        <h3>Variables</h3>
        <p>En Python, las variables no necesitan ser declaradas con un tipo de dato especifico. El tipo de la variable se asigna automaticamente cuando se le asigna un valor.</p>
        <pre><code>edad = 30  # Variable de tipo entero
nombre = "Juan"  # Variable de tipo string</code></pre>

        <h3>Funciones</h3>
        <p>En Python, las funciones se definen con la palabra clave <code>def</code>.</p>
        <pre><code>def saludar():
    print("¡Hola, mundo!")

saludar()  # Llamada a la función saludar</code></pre>

        <h3>Condicionales</h3>
        <p>Python utiliza estructuras condicionales como <code>if</code>, <code>elif</code>, y <code>else</code> para tomar decisiones basadas en condiciones.</p>
        <pre><code>edad = 18

if edad >= 18:
    print("Eres mayor de edad")
else:
    print("Eres menor de edad")</code></pre>

        <h3>Bucles</h3>
        <p>Python soporta bucles como <code>for</code> y <code>while</code> para ejecutar bloques de codigo de manera repetitiva.</p>
        <pre><code>for i in range(5):
    print("Número:", i)</code></pre>

        <h3>Listas</h3>
        <p>Las listas en Python se utilizan para almacenar colecciones de elementos. Pueden contener elementos de diferentes tipos y son mutables.</p>
        <pre><code>nombres = ["Juan", "Ana", "Luis"]
nombres.append("Carlos")  # Agregar un elemento a la lista
print(nombres)</code></pre>

        <h3>Diccionarios</h3>
        <p>Un diccionario en Python almacena pares de clave-valor. Se define usando llaves <code>{}</>.</p>
        <pre><code>persona = {"nombre": "Juan", "edad": 30}
print(persona["nombre"])  # Acceder a un valor mediante la clave</code></pre>

        <h3>Clases y Objetos</h3>
        <p>Python es un lenguaje orientado a objetos. Puedes crear clases para organizar el codigo y crear objetos de esas clases.</p>
        <pre><code>class Persona:
    def __init__(self, nombre, edad):
        self.nombre = nombre
        self.edad = edad
    
    def saludar(self):
        print("Hola, mi nombre es", self.nombre)

persona1 = Persona("Juan", 30)
persona1.saludar()  # Llamar al método saludar del objeto</code></pre>

        <h2>Ejemplo Completo de un Programa en Python:</h2>
        <p>A continuacion, un ejemplo de un programa sencillo que utiliza variables, funciones y condicionales en Python:</p>
        <pre><code>def calcular_area(base, altura):
    return base * altura

base = 5
altura = 10
area = calcular_area(base, altura)
print(f"El área del triángulo es: {area}")</code></pre>

        <h2>Conclusion:</h2>
        <p>Python es un lenguaje de programacion muy versatil, ideal para principiantes y expertos. Su sintaxis sencilla y su amplia comunidad hacen que sea facil aprender y desarrollar aplicaciones en areas como desarrollo web, ciencia de datos, automatizacion, inteligencia artificial, y mas.</p>
    </main>
</body>
</html>
