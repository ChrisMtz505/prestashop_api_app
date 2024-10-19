<?php
include 'config.php';

$id = $_GET['id'];
$producto = llamarApi('GET', '/products/' . $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos_producto = [
        'product' => [
            'id' => $id,
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

    $respuesta = llamarApi('PUT', '/products/' . $id, $datos_producto);
    if (isset($respuesta['product']['id'])) {
        echo 'Producto modificado con éxito. ID: ' . $respuesta['product']['id'];
    } else {
        echo 'Error al modificar producto: ' . json_encode($respuesta);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
</head>
<body>
    <h1>Modificar Producto</h1>
    <form method="POST">
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?php echo $producto['product']['name'][0]['value']; ?>" required>
        <br>
        <label for="price">Precio:</label>
        <input type="number" name="price" value="<?php echo $producto['product']['price']; ?>" step="0.01" required>
        <br>
        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" value="<?php echo $producto['product']['quantity']; ?>" required>
        <br>
        <input type="submit" value="Modificar Producto">
    </form>
</body>
</html>
