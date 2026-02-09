<?php
session_start();

// Verificar que el usuario esté autenticado y tenga rol de administrador (id_rol = 2)
if (!isset($_SESSION['id_rol']) || $_SESSION['id_rol'] != 2) {
    header("Location: ../login.html");
    exit();
}

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "programacion");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los usuarios registrados para mostrarlos en el formulario
$sql = "SELECT id, nombre_usuario FROM usuarios";
$result = $conn->query($sql);

// Obtener los datos del usuario a editar si se pasa un ID en la URL
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Obtener datos del usuario
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result_usuario = $stmt->get_result();

    if ($result_usuario->num_rows > 0) {
        $usuario = $result_usuario->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit();
    }

    $stmt->close();
}

// Procesar la actualización del usuario
if (isset($_POST['actualizar'])) {
    $rol = $_POST['id_rol'];
    $id_editar = $_POST['id_usuario'];

    $stmt = $conn->prepare("UPDATE usuarios SET id_rol = ? WHERE id = ?");
    $stmt->bind_param("ii", $rol, $id_editar);

    if ($stmt->execute()) {
        echo '<script>alert("Usuario actualizado exitosamente."); window.location = "./usuario.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar el usuario.");</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label {
            font-size: 1.1em;
            margin-bottom: 10px;
            display: block;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1em;
            color: #333;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
        }

        button:hover {
            background-color: #34495e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .cancelar {
            text-align: center;
            margin-top: 20px;
        }

        .cancelar a {
            color: #3498db;
            text-decoration: none;
        }

        .cancelar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Editar Usuario</h1>

        <form method="POST">
            <div class="form-group">
                <label for="id_usuario">Seleccionar Usuario</label>
                <select name="id_usuario" id="id_usuario" required onchange="updateName()">
                    <option value="">Selecciona un usuario</option>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo isset($usuario) && $usuario['id'] == $row['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($row['nombre_usuario']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <?php if (isset($usuario)): ?>
                <div class="form-group">
                    <label for="nombre_usuario">Nombre de Usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="id_rol">Rol</label>
                    <select name="id_rol" id="id_rol" required>
                        <option value="1" <?php echo $usuario['id_rol'] == 1 ? 'selected' : ''; ?>>Usuario</option>
                        <option value="2" <?php echo $usuario['id_rol'] == 2 ? 'selected' : ''; ?>>Administrador</option>
                    </select>
                </div>
            <?php endif; ?>

            <button type="submit" name="actualizar">Actualizar Usuario</button>
        </form>

        <div class="cancelar">
            <a href="./usuario.php">Cancelar</a>
        </div>
    </div>

    <script>
        // Actualizar el nombre de usuario en el campo de texto cuando se selecciona un usuario
        function updateName() {
            var select = document.getElementById('id_usuario');
            var nameInput = document.getElementById('nombre_usuario');
            var selectedOption = select.options[select.selectedIndex];
            nameInput.value = selectedOption ? selectedOption.text : '';
        }
    </script>

</body>
</html>
