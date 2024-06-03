<?php
function getEndpointByToken($_endpoint, $_token)
{
    //echo 'endpoint: ' . $_endpoint . ' | token: ' . $_token;
    //Configuracion de la solicitud con cURL
    $ch = curl_init($_endpoint);
    //configurar Headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $_token
    ));
    //configurar que contiene respuesta
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutar la solicitud / pegarle al endpoint
    $respuesta = curl_exec($ch);
    //verificar si existe una respuesta
    if ($respuesta === false) {
        return 'Error en la solicitud: ' . curl_error($ch);
    }
    //cerrar la sesion de cURL
    curl_close($ch);
    return $respuesta;
}
?>