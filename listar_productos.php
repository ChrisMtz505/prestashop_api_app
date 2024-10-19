<?php
include 'config.php';

// Listar productos
$productos = llamarApi('GET', '/products');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos['products'] as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['name'][0]; ?></td>
                <td>
                    <a href="mostrar_producto.php?id=<?php echo $producto['id']; ?>">Ver</a>
                    <a href="modificar_producto.php?id=<?php echo $producto['id']; ?>">Modificar</a>
                    <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Volver</a>
</body>
</html>
