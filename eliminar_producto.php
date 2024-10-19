<?php
include 'config.php';

$id = $_GET['id'];
$respuesta = llamarApi('DELETE', '/products/' . $id);

if (isset($respuesta['success'])) {
    echo 'Producto eliminado con éxito.';
} else {
    echo 'Error al eliminar producto: ' . json_encode($respuesta);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
</head>
<body>
    <h1>Eliminar Producto</h1>
    <p>Producto eliminado. <a href="index.php">Volver</a></p>
</body>
</html>
