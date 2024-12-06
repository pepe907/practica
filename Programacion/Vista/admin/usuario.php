<?php
session_start(); // Inicia la sesión

// Verificar que el usuario esté autenticado y que tenga rol de administrador (id_rol = 2)
if (!isset($_SESSION['id_rol']) || $_SESSION['id_rol'] != 2) {
    // Si no es admin, redirigir a login
    header("Location: ../login.html");
    exit();
}

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "programacion");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el formulario para agregar un nuevo usuario
if (isset($_POST['agregar'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);  // Encriptar la contraseña
    $rol = $_POST['id_rol'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contraseña, id_rol) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre_usuario, $contraseña, $rol);

    if ($stmt->execute()) {
        echo '<script>alert("Usuario agregado exitosamente."); window.location = "usuarios.php";</script>';
    } else {
        echo '<script>alert("Error al agregar el usuario."); window.location = "usuarios.php";</script>';
    }

    $stmt->close();
}

// Procesar la eliminación de un usuario
if (isset($_GET['eliminar'])) {
    $id_usuario = $_GET['eliminar'];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id_usuario);

    if ($stmt->execute()) {
        echo '<script>alert("Usuario eliminado exitosamente."); window.location = "usuarios.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar el usuario."); window.location = "usuarios.php";</script>';
    }

    $stmt->close();
}

// Consultar los usuarios registrados
$sql = "SELECT id, nombre_usuario, id_rol FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        /* Barra lateral */
        .sidebar {
            height: 100%;
            width: 250px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 1.1em;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        /* Contenido principal */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .usuarios-lista {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .carta {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .carta h3 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }

        .carta p {
            color: #666;
        }

        /* Formulario de agregar usuario */
        .form-agregar {
            margin-top: 20px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
        }

        .form-agregar input,
        .form-agregar select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-agregar button {
            background-color: #2c3e50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-agregar button:hover {
            background-color: #34495e;
        }

    </style>
</head>
<body>

    <!-- Barra Lateral -->
    <div class="sidebar">
        <h2 style="text-align:center; color:white;">Admin Panel</h2>
        <a href="./index.php">Inicio</a>
        <a href="./usuario.php">Usuarios</a>
        <a href="./carnet.php">Carnet</a>
        <a href="../cerrar-sesion.php">Cerrar sesión</a>
    </div>

    <!-- Contenido Principal -->
    <div class="main-content">
        <h1>Usuarios Registrados</h1>

        <!-- Formulario para agregar un nuevo usuario -->
        <div class="form-agregar">
            <h3>Agregar Usuario</h3>
            <form method="POST" action="usuarios.php">
                <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <select name="id_rol" required>
                    <option value="1">Usuario</option>
                    <option value="2">Administrador</option>
                </select>
                <button type="submit" name="agregar">Agregar Usuario</button>
            </form>
        </div>

        <div class="usuarios-lista">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="carta">
                    <h3><?php echo htmlspecialchars($row['nombre_usuario']); ?></h3>
                    <p>ID: <?php echo $row['id']; ?></p>
                    <p>Rol: <?php echo $row['id_rol'] == 2 ? 'Administrador' : 'Usuario'; ?></p>
                    <a href="edi-usuario.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $row['id']; ?>" style="color: red; text-decoration: none; margin-left: 10px;">Eliminar</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
