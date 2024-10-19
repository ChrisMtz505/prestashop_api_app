<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos_producto = [
        'product' => [
            'name' => [
                'language' => [
                    'id' => 1, // Cambia esto al ID de idioma que necesitas
                    'value' => $_POST['name']
                ]
            ],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
        ]
    ];

    $respuesta = llamarApi('POST', '/products', $datos_producto);
    if (isset($respuesta['product']['id'])) {
        echo 'Producto creado con éxito. ID: ' . $respuesta['product']['id'];
    } else {
        echo 'Error al crear producto: ' . json_encode($respuesta);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>
    <form method="POST">
        <label for="name">Nombre:</label>
        <input type="text" name="name" required>
        <br>
        <label for="price">Precio:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" required>
        <br>
        <input type="submit" value="Crear Producto">
    </form>
</body>
</html>
