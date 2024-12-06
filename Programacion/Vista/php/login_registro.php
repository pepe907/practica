<?php
session_start(); // Inicia la sesión

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "programacion");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se recibieron los datos del formulario
if (isset($_POST['nombre_usuario']) && isset($_POST['contraseña'])) {
    $usuario = trim($_POST['nombre_usuario']); // Eliminar espacios innecesarios
    $contrasena = trim($_POST['contraseña']);  // Contraseña ingresada

    // Consulta preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        // Comparar contraseñas en texto plano
        if (password_verify($contrasena, $user_data['contraseña'])) {
            // Establecer sesión
            $_SESSION['usuario'] = $user_data['nombre_usuario']; // Guardamos el nombre de usuario
            $_SESSION['user_id'] = $user_data['id']; // Guardamos el ID de usuario
            $_SESSION['id_rol'] = $user_data['id_rol']; // Guardamos el ID del rol (referencia a la tabla roles)

            // Verificar si es un admin
            if ($user_data['id_rol'] == 2) {
                // Redirigir a admin
                header("Location: ../admin/index.php"); 
                exit();
            } else {
                // Redirigir a usuario normal
                header("Location: ../usuario/index.php"); 
                exit();
            }
        } else {
            echo '<script>
                    alert("Contraseña incorrecta.");
                    window.location = "../login.html";
                  </script>';
        }
    } else {
        echo '<script>
                alert("Usuario no encontrado.");
                window.location = "../login.html";
              </script>';
    }
} else {
    echo '<script>
            alert("Por favor, completa todos los campos.");
            window.location = "../login.html";
          </script>';
}

$conn->close();
?>
