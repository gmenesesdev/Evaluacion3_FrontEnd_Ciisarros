<?php
header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Error desconocido'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
    $recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

    if (!empty($recaptchaResponse)) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if ($resultJson->success) {
            // reCAPTCHA verificado con éxito
            $response['success'] = true;
            $response['message'] = 'Verificación exitosa.';
            
            // Procesar los datos del formulario
            $nombre = htmlspecialchars($_POST['nombre']);
            $apellido = htmlspecialchars($_POST['apellido']);
            $email = htmlspecialchars($_POST['email']);
            $direccion = htmlspecialchars($_POST['direccion']);
            $telefono = htmlspecialchars($_POST['telefono']);
            $consulta = htmlspecialchars($_POST['consulta']);
            $mensaje = htmlspecialchars($_POST['mensaje']);

            // Aquí puedes manejar los datos, como guardarlos en una base de datos o enviar un correo electrónico
            $response['data'] = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'consulta' => $consulta,
                'mensaje' => $mensaje
            ];
            
        } else {
            // Verificación fallida
            $response['message'] = 'Verificación fallida. Por favor, inténtelo de nuevo.';
        }
    } else {
        // No se recibió respuesta de reCAPTCHA
        $response['message'] = 'Por favor, completa el reCAPTCHA.';
    }
} else {
    // Método de solicitud no permitido
    $response['message'] = 'Método de solicitud no permitido.';
}

echo json_encode($response);
?>
