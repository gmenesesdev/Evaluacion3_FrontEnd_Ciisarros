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


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terrasol Parcelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <!-- Header -->
    <header>
        <?php include 'componentes/header.php' ?>
    </header>

    <!-- Inicio -->
    <section id="inicio">
        <?php include 'componentes/inicio.php' ?>
    </section>

    <!-- Nosotros -->
    <section id="nosotros">
        <?php include 'componentes/nosotros.php' ?>
    </section>

    <!-- Parcelas -->
    <section id="parcelas">
        <?php include 'componentes/parcelas.php' ?>
    </section>

    <!-- Solo Terreno -->
    <section id="soloTerreno">
        <?php include 'componentes/solo_terreno.php' ?>
    </section>

    <!-- Casa en Parcela -->
    <section id="casaEnParcela">
        <?php include 'componentes/casa_en_parcela.php' ?>
    </section>

    <!-- Preguntas Frecuentes -->
    <section id="preguntasFrecuentes">
        <?php include 'componentes/preguntas.php' ?>
    </section>

    <!-- Contacto -->
    <section id="contacto">
        <?php include 'componentes/contacto.php' ?>
    </section>


    <!--TEST-->
    <section id="test-parcela">
        <div class="container mx-auto mt-5 row">
            <?php 
            $endpointParcela = getEndpointByToken('http://localhost/backend-sec71-evaluacion2/v1/parcela/', 'get');
            //transformar el contenido del endpoint en formato JSON
            $endpointParcela = json_decode($endpointParcela,true);
            
            foreach($endpointParcela['data'] as $datoParcela){
                include 'componentes/card.php';
            }
            ?>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <?php include 'componentes/footer.php' ?>
    </footer>
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>