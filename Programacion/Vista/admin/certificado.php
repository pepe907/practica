<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "programacion");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Asegurarse de que el parámetro 'id' esté presente en la URL
if (!isset($_GET['id'])) {
    echo 'Error: No se ha proporcionado un ID válido.';
    exit();  // Detiene la ejecución del script si no se pasa el ID
}

$id_certificado = $_GET['id'];

// Obtener el certificado autorizado
$sql = "SELECT u.nombre_usuario, c.nombre_certificado, c.fecha_registro 
        FROM certificados c
        JOIN usuarios u ON c.id_usuario = u.id 
        WHERE c.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_certificado);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Verificar que se encontró el certificado
if (!$row) {
    echo 'No se encontró el certificado.';
    exit();  // Detiene la ejecución si no se encuentra el certificado
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Finalización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 20px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .certificado {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .certificado h3 {
            text-align: center;
            font-size: 1.8em;
            color: #333;
            margin-bottom: 20px;
        }

        .certificado p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 15px;
        }

        .certificado .info {
            font-size: 1.1em;
            color: #444;
        }

        .btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Certificado de Finalización</h1>

    <div class="certificado">
        <h3>Certificado para: <?php echo htmlspecialchars($row['nombre_usuario']); ?></h3>
        <p><strong>Certificado otorgado:</strong> <?php echo htmlspecialchars($row['nombre_certificado']); ?></p>
        <p class="info"><strong>Fecha de emisión:</strong> <?php echo date('d/m/Y', strtotime($row['fecha_registro'])); ?></p>
        <p class="info"><strong>Fecha de registro del certificado:</strong> <?php echo date('d/m/Y', strtotime($row['fecha_registro'])); ?></p>
    </div>

    <a href="certificados.php" class="btn">Volver a la lista de certificados</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
