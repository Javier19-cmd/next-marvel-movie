<?php

// Configuración de limitación de tasa
define('RATE_LIMIT', 100); // Número de solicitudes permitidas
define('RATE_LIMIT_TIME', 3600); // Período de tiempo en segundos (1 hora)
define('RATE_LIMIT_FILE', 'rate_limit.log'); // Archivo de almacenamiento de solicitudes

function rate_limit_exceeded($ip) {
    if (!file_exists(RATE_LIMIT_FILE)) {
        file_put_contents(RATE_LIMIT_FILE, json_encode([]));
    }

    $data = json_decode(file_get_contents(RATE_LIMIT_FILE), true);

    if (!isset($data[$ip])) {
        $data[$ip] = [];
    }

    // Eliminar solicitudes antiguas
    $data[$ip] = array_filter($data[$ip], function($timestamp) {
        return $timestamp > time() - RATE_LIMIT_TIME;
    });

    // Verificar si el límite ha sido excedido
    if (count($data[$ip]) >= RATE_LIMIT) {
        return true;
    }

    // Registrar nueva solicitud
    $data[$ip][] = time();
    file_put_contents(RATE_LIMIT_FILE, json_encode($data));

    return false;
}

// Obtener la IP del usuario
$ip = $_SERVER['REMOTE_ADDR'];

if (rate_limit_exceeded($ip)) {
    http_response_code(429); // Too Many Requests
    echo "Has excedido el límite de solicitudes. Por favor, intenta de nuevo más tarde.";
    exit;
}
?>
