<?php
include 'config.php';

$id = $_GET['id'];
$producto = llamarApi('GET', '/products/' . $id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Producto</title>
</head>
<body>
    <h1>Detalles del Producto</h1>
    <p>ID: <?php echo $producto['product']['id']; ?></p>
    <p>Nombre: <?php echo $producto['product']['name'][0]['value']; ?></p>
    <p>Precio: <?php echo $producto['product']['price']; ?></p>
    <p>Cantidad: <?php echo $producto['product']['quantity']; ?></p>
    <a href="index.php">Volver</a>
</body>
</html>
