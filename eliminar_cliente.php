<?php
include 'config.php';

$id = $_GET['id'];
$respuesta = llamarApi('DELETE', '/customers/' . $id);

if (isset($respuesta['success'])) {
    echo 'Cliente eliminado con éxito.';
} else {
    echo 'Error al eliminar cliente: ' . json_encode($respuesta);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cliente</title>
</head>
<body>
    <h1>Eliminar Cliente</h1>
    <p>Cliente eliminado. <a href="index.php">Volver</a></p>
</body>
</html>
