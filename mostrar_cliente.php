<?php
include 'config.php';

$id = $_GET['id'];
$cliente = llamarApi('GET', '/customers/' . $id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Cliente</title>
</head>
<body>
    <h1>Detalles del Cliente</h1>
    <p>ID: <?php echo $cliente['customer']['id']; ?></p>
    <p>Nombre: <?php echo $cliente['customer']['firstname']; ?></p>
    <p>Apellido: <?php echo $cliente['customer']['lastname']; ?></p>
    <p>Email: <?php echo $cliente['customer']['email']; ?></p>
    <a href="index.php">Volver</a>
</body>
</html>
