<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos_cliente = [
        'customer' => [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'passwd' => $_POST['passwd'],
        ]
    ];

    $respuesta = llamarApi('POST', '/customers', $datos_cliente);
    if (isset($respuesta['customer']['id'])) {
        echo 'Cliente creado con éxito. ID: ' . $respuesta['customer']['id'];
    } else {
        echo 'Error al crear cliente: ' . json_encode($respuesta);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Cliente</h1>
    <form method="POST">
        <label for="firstname">Nombre:</label>
        <input type="text" name="firstname" required>
        <br>
        <label for="lastname">Apellido:</label>
        <input type="text" name="lastname" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="passwd">Contraseña:</label>
        <input type="password" name="passwd" required>
        <br>
        <input type="submit" value="Crear Cliente">
    </form>
</body>
</html>
