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
    <title>Aprende Java</title>
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
        <h1>Que es Java?</h1>
        <p>A continuacion te explicamos qué es Java y como se utiliza en la programacion.</p>
    </header>

    <main>
        <p>Java es un lenguaje de programacion de alto nivel, orientado a objetos, diseñado para ser independiente de la plataforma. Es ampliamente utilizado en el desarrollo de aplicaciones empresariales, aplicaciones moviles, juegos y sistemas embebidos, entre otros.</p>

        <h2>Caracteristicas principales de Java:</h2>
        <ul>
            <li><strong>Orientado a objetos:</strong> Java sigue el paradigma de la programacion orientada a objetos (POO), lo que significa que se basa en clases y objetos para organizar el codigo.</li>
            <li><strong>Independencia de plataforma:</strong> El código Java puede ejecutarse en cualquier dispositivo que tenga instalada una maquina virtual de Java (JVM), lo que permite escribir el código una vez y ejecutarlo en diferentes plataformas.</li>
            <li><strong>Simplicidad y robustez:</strong> Java es fácil de aprender y está disenado para ser robusto, con un manejo de excepciones y una recolección de basura automatica.</li>
            <li><strong>Seguridad:</strong> Java ofrece un entorno seguro, ya que permite ejecutar aplicaciones en un entorno controlado (la JVM) que evita que el codigo malicioso acceda a recursos no autorizados del sistema operativo.</li>
        </ul>

        <h2>Sintaxis Basica de Java:</h2>
        <p>A continuacion se describen algunos de los conceptos y sintaxis basicos en Java:</p>

        <h3>Variables</h3>
        <p>En Java, se usan variables para almacenar datos. Se deben declarar especificando el tipo de dato y el nombre de la variable.</p>
        <pre><code>int edad = 30; // Declaración de una variable de tipo entero
String nombre = "Juan"; // Declaración de una variable de tipo String</code></pre>

        <h3>Funciones (Métodos)</h3>
        <p>En Java, las funciones se llaman métodos. Un método está asociado a una clase y puede realizar acciones o devolver valores.</p>
        <pre><code>public class MiClase {
    public static void saludar() {
        System.out.println("¡Hola, mundo!");
    }
    
    public static void main(String[] args) {
        saludar(); // Llamada al método saludar
    }
}</code></pre>

        <h3>Condicionales</h3>
        <p>Java usa estructuras condicionales como <code>if</code>, <code>else</code> y <code>switch</code> para ejecutar bloques de codigo basados en condiciones.</p>
        <pre><code>int edad = 18;

if (edad >= 18) {
    System.out.println("Eres mayor de edad");
} else {
    System.out.println("Eres menor de edad");
}</code></pre>

        <h3>Bucles</h3>
        <p>En Java, puedes usar bucles como <code>for</code>, <code>while</code> y <code>do-while</code> para repetir un bloque de codigo múltiples veces.</p>
        <pre><code>for (int i = 0; i < 5; i++) {
    System.out.println("Número: " + i);
}</code></pre>

        <h3>Clases y Objetos</h3>
        <p>Java es un lenguaje orientado a objetos, lo que significa que puedes crear clases y objetos. Una clase es un plano para crear objetos, y un objeto es una instancia de una clase.</p>
        <pre><code>public class Persona {
    String nombre;
    int edad;

    public Persona(String nombre, int edad) {
        this.nombre = nombre;
        this.edad = edad;
    }

    public void saludar() {
        System.out.println("Hola, mi nombre es " + nombre);
    }
}

public class Main {
    public static void main(String[] args) {
        Persona persona1 = new Persona("Juan", 30);
        persona1.saludar(); // Llamada al método saludar
    }
}</code></pre>

        <h2>Ejemplo Completo de un Programa en Java:</h2>
        <p>A continuación, un ejemplo de un programa sencillo que utiliza variables, métodos y clases en Java:</p>
        <pre><code>public class Calculadora {
    public static int sumar(int a, int b) {
        return a + b;
    }

    public static void main(String[] args) {
        int resultado = sumar(5, 3);
        System.out.println("La suma es: " + resultado);
    }
}</code></pre>

        <h2>Conclusion:</h2>
        <p>Java es uno de los lenguajes de programacion más populares y versatiles, utilizado para desarrollar aplicaciones de todo tipo. Gracias a su enfoque orientado a objetos, su portabilidad y su robustez, Java sigue siendo una opcion preferida tanto para el desarrollo de aplicaciones moviles (Android) como de software empresarial.</p>
    </main>
</body>
</html>
