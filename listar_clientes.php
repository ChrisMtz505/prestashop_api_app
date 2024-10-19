<?php
include 'config.php';

// Listar clientes
$clientes = llamarApi('GET', '/customers');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
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
    <a href="index.php">Volver</a>
</body>
</html>
