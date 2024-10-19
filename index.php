<?php
include 'config.php';

// Listar clientes
$clientes = llamarApi('GET', '/customers');

// Listar productos
$productos = llamarApi('GET', '/products');

// Mostrar vista
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración de PrestaShop</title>
</head>
<body>
    <h1>Panel de Administración de PrestaShop</h1>

    <h2>Clientes</h2>
    <a href="crear_cliente.php">Crear Cliente</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes['customers'] as $cliente): ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['firstname'] . ' ' . $cliente['lastname']; ?></td>
                <td>
                    <a href="mostrar_cliente.php?id=<?php echo $cliente['id']; ?>">Ver</a>
                    <a href="modificar_cliente.php?id=<?php echo $cliente['id']; ?>">Modificar</a>
                    <a href="eliminar_cliente.php?id=<?php echo $cliente['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Productos</h2>
    <a href="crear_producto.php">Crear Producto</a>
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

    <h2>Probar Endpoint Restringido</h2>
    <a href="test_endpoint.php">Probar Endpoint</a>

</body>
</html>
