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
    <title>Aprende SQL</title>
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
        <h1>Que es SQL?</h1>
        <p>A continuacion, te explicamos que es SQL y como se utiliza para gestionar bases de datos.</p>
    </header>

    <main>
        <p>SQL (Structured Query Language) es un lenguaje estandar utilizado para gestionar bases de datos relacionales. Se usa para realizar consultas, actualizaciones, inserciones y eliminaciones de datos en las bases de datos.</p>

        <h2>Caracteristicas principales de SQL:</h2>
        <ul>
            <li><strong>Lenguaje declarativo:</strong> SQL permite a los usuarios describir que datos necesitan sin especificar como obtenerlos. La base de datos se encarga de optimizar las consultas.</li>
            <li><strong>Operaciones sobre bases de datos:</strong> SQL permite crear, leer, actualizar y eliminar (CRUD) datos en las bases de datos.</li>
            <li><strong>Soporte para relaciones:</strong> SQL es ideal para trabajar con bases de datos relacionales, donde los datos estan organizados en tablas relacionadas.</li>
            <li><strong>Amplio soporte:</strong> SQL es ampliamente soportado por casi todas las bases de datos relacionales, como MySQL, PostgreSQL, SQLite, SQL Server, Oracle, entre otras.</li>
        </ul>

        <h2>Sintaxis basica de SQL:</h2>
        <p>A continuacion se describen algunas de las operaciones basicas de SQL:</p>

        <h3>1. Crear una base de datos</h3>
        <p>Para crear una base de datos en SQL, usamos el comando <code>CREATE DATABASE</code>.</p>
        <pre><code>CREATE DATABASE mi_base_de_datos;</code></pre>

        <h3>2. Crear una tabla</h3>
        <p>Las tablas en SQL se crean con el comando <code>CREATE TABLE</code>, donde se definen los campos y tipos de datos.</p>
        <pre><code>CREATE TABLE empleados (
    id INT PRIMARY KEY,
    nombre VARCHAR(50),
    edad INT,
    salario DECIMAL(10,2)
);</code></pre>

        <h3>3. Insertar datos</h3>
        <p>Para insertar datos en una tabla, usamos el comando <code>INSERT INTO</code>.</p>
        <pre><code>INSERT INTO empleados (id, nombre, edad, salario)
VALUES (1, 'Juan Pérez', 30, 50000.00);</code></pre>

        <h3>4. Consultar datos</h3>
        <p>Para obtener datos de una tabla, usamos el comando <code>SELECT</code>.</p>
        <pre><code>SELECT * FROM empleados;</code></pre>
        <p>Tambien podemos seleccionar columnas especificas:</p>
        <pre><code>SELECT nombre, salario FROM empleados;</code></pre>

        <h3>5. Filtrar resultados</h3>
        <p>Usamos la clausula <code>WHERE</code> para filtrar los resultados de la consulta.</p>
        <pre><code>SELECT * FROM empleados WHERE edad > 25;</code></pre>

        <h3>6. Actualizar datos</h3>
        <p>Para modificar registros en una tabla, usamos el comando <code>UPDATE</code>.</p>
        <pre><code>UPDATE empleados SET salario = 55000 WHERE id = 1;</code></pre>

        <h3>7. Eliminar datos</h3>
        <p>Para eliminar registros, usamos el comando <code>DELETE</code>.</p>
        <pre><code>DELETE FROM empleados WHERE id = 1;</code></pre>

        <h3>8. Eliminar una tabla</h3>
        <p>Para eliminar una tabla de la base de datos, usamos el comando <code>DROP TABLE</code>.</p>
        <pre><code>DROP TABLE empleados;</code></pre>

        <h2>Relaciones entre tablas</h2>
        <p>En bases de datos relacionales, es comun tener multiples tablas que estan relacionadas entre si. Para establecer relaciones, usamos claves primarias (PRIMARY KEY) y claves foráneas (FOREIGN KEY).</p>
        <pre><code>CREATE TABLE departamentos (
    id INT PRIMARY KEY,
    nombre VARCHAR(50)
);

CREATE TABLE empleados (
    id INT PRIMARY KEY,
    nombre VARCHAR(50),
    id_departamento INT,
    FOREIGN KEY (id_departamento) REFERENCES departamentos(id)
);</code></pre>

        <h2>Operaciones avanzadas</h2>
        <p>SQL tambien permite realizar operaciones mas avanzadas, como:</p>
        <ul>
            <li><strong>JOIN:</strong> Combina filas de dos o mas tablas basadas en una columna comun.</li>
            <pre><code>SELECT empleados.nombre, departamentos.nombre
FROM empleados
JOIN departamentos ON empleados.id_departamento = departamentos.id;</code></pre>
            <li><strong>GROUP BY:</strong> Agrupa los resultados basados en una o mas columnas.</li>
            <pre><code>SELECT id_departamento, AVG(salario) 
FROM empleados 
GROUP BY id_departamento;</code></pre>
            <li><strong>ORDER BY:</strong> Ordena los resultados de una consulta.</li>
            <pre><code>SELECT nombre, salario FROM empleados ORDER BY salario DESC;</code></pre>
        </ul>

        <h2>Conclusion:</h2>
        <p>SQL es el lenguaje esencial para interactuar con bases de datos. Permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) y trabajar con relaciones entre diferentes tablas. Aprender SQL es fundamental para cualquier persona interesada en el desarrollo de aplicaciones que manejan grandes volumenes de datos, como sistemas de gestion de bases de datos, aplicaciones web y mas.</p>
    </main>
</body>
</html>
