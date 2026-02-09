<?php
session_start();

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['id_rol']) || $_SESSION['id_rol'] != 2) {
    header("Location: ../login.html");
    exit();
}

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "programacion");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener todos los usuarios si no se está buscando
$search = isset($_POST['search']) ? $_POST['search'] : '';
if ($search != '') {
    // Buscar usuario por nombre
    $sql = "SELECT id, nombre_usuario, id_rol, fecha_registro FROM usuarios WHERE nombre_usuario LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("s", $searchTerm);
} else {
    // Si no hay búsqueda, mostrar todos los usuarios
    $sql = "SELECT id, nombre_usuario, id_rol, fecha_registro FROM usuarios";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        .container {
            display: flex;
        }

        /* Barra lateral */
        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: white;
            padding: 30px 15px;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            color: #ecf0f1;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 10px;
            text-decoration: none;
            font-size: 16px;
            margin: 10px 0;
        }

        .sidebar a:hover {
            background-color: #2c3e50;
        }

        /* Contenedor principal */
        .main-content {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .usuarios-lista {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .carta {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .carta:hover {
            transform: translateY(-5px);
        }

        .carta h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }

        .carta p {
            font-size: 1em;
            color: #666;
        }

        .carta .rol {
            font-weight: bold;
            color: #3498db;
        }

        .carta .info {
            margin-top: 15px;
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }

        .carta .actividades {
            margin-top: 20px;
            width: 100%;
            font-size: 0.9em;
            color: #666;
        }

        .carta a {
            display: inline-block;
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .carta a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <!-- Barra lateral -->
    <div class="sidebar">
        <h2>Panel de Admin</h2>
        <a href="./index.php">Inicio</a>
        <a href="./usuario.php">Usuarios</a>
        <a href="./carnet.php">Carnet de Usuarios</a>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <h1>Carnet de Usuarios</h1>

        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <form method="POST">
                <input type="text" name="search" placeholder="Buscar usuario..." value="<?php echo htmlspecialchars($search); ?>">
            </form>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <div class="usuarios-lista">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="carta">
                        <h3><?php echo htmlspecialchars($row['nombre_usuario']); ?></h3>
                        <p class="rol">Rol: <?php echo $row['id_rol'] == 1 ? 'Usuario' : 'Administrador'; ?></p>
                        <div class="info">
                            <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                            <p><strong>Fecha de registro:</strong> <?php echo date('d/m/Y H:i', strtotime($row['fecha_registro'])); ?></p>
                        </div>

                        <!-- Mostrar las actividades registradas -->
                        <div class="actividades">
                            <strong>Actividades recientes:</strong>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "programacion");
                            $stmt = $conn->prepare("SELECT actividad, fecha FROM registros_actividades WHERE id_usuario = ? ORDER BY fecha DESC LIMIT 5");
                            $stmt->bind_param("i", $row['id']);
                            $stmt->execute();
                            $activityResult = $stmt->get_result();
                            
                            if ($activityResult->num_rows > 0) {
                                while ($activity = $activityResult->fetch_assoc()) {
                                    echo "<p><strong>" . date('d/m/Y H:i', strtotime($activity['fecha'])) . ":</strong> " . htmlspecialchars($activity['actividad']) . "</p>";
                                }
                            } else {
                                echo "<p>No hay actividades registradas.</p>";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No hay usuarios registrados.</p>
        <?php endif; ?>
    </div>

</body>
</html>
