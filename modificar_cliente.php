<?php
include 'config.php';

$id = $_GET['id'];
$cliente = llamarApi('GET', '/customers/' . $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos_cliente = [
        'customer' => [
            'id' => $id,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'passwd' => $_POST['passwd'],
        ]
    ];

    $respuesta = llamarApi('PUT', '/customers/' . $id, $datos_cliente);
    if (isset($respuesta['customer']['id'])) {
        echo 'Cliente modificado con éxito. ID: ' . $respuesta['customer']['id'];
    } else {
        echo 'Error al modificar cliente: ' . json_encode($respuesta);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
</head>
<body>
    <h1>Modificar Cliente</h1>
    <form method="POST">
        <label for="firstname">Nombre:</label>
        <input type="text" name="firstname" value="<?php echo $cliente['customer']['firstname']; ?>" required>
        <br>
        <label for="lastname">Apellido:</label>
        <input type="text" name="lastname" value="<?php echo $cliente['customer']['lastname']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $cliente['customer']['email']; ?>" required>
        <br>
        <label for="passwd">Contraseña:</label>
        <input type="password" name="passwd" required>
        <br>
        <input type="submit" value="Modificar Cliente">
    </form>
</body>
</html>
