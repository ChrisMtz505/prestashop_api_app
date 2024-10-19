<?php
include 'config.php';


$respuesta = llamarApi('GET', '/invalid_endpoint');

if (isset($respuesta['errors'])) {
    echo 'Endpoint restringido correctamente.';
} else {
    echo 'Se accedió al endpoint: ' . json_encode($respuesta);
}
?>
