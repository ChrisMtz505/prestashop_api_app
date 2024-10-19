<?php

define('API_URL', 'http://localhost:8080/admin123/index.php/configure/advanced/webservice-keys/?_token=6qU-QPToxkwVeSs2hENF-TdkjZzRV5f39UMuj2BBQM4');
define('API_KEY', 'EXNYMYNILMHZA4S5QVP5VUZ1TEHBNL1D');

function llamarApi($metodo, $endpoint, $datos = false) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, API_URL . $endpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Authorization: ' . API_KEY,
        'Content-Type: application/json',
    ]);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($metodo));
    if ($datos) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos));
    }
    $respuesta = curl_exec($curl);
    curl_close($curl);
    return json_decode($respuesta, true);
}
?>
