<?php

$conn = new mysqli("localhost", "root", "", "Programacion");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    // Obtener el id del rol "Usuario" desde la tabla roles
    $resultado = $conn->query("SELECT id FROM roles WHERE nombre_rol = 'Usuario'");
    $rol = $resultado->fetch_assoc();
    $id_rol = $rol['id'];

    // Insertar el nuevo usuario
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contraseña, id_rol) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre_usuario, $contraseña, $id_rol);

    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
    } else {
        echo "Error al registrar usuario: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

?>
