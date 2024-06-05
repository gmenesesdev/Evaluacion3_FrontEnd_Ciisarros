<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terrasol Parcelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Brain Framework - Testimonial -->
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/testimonials/testimonial-3/assets/css/testimonial-3.css" />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- CSS Interno -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Script de Google ReCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <main>
        <div class="container">
            <!-- Nosotros -->
            <section id="nosotros">
                <?php include 'componentes/nosotros.php' ?>
            </section>
            <section id="parcelas">
                <?php include 'componentes/parcelas.php' ?>
            </section>

            <!--TEST-->
            <!-- Se valida correcto funcionamiento, revisar el comentario sobre el link al backend, linea 89-->
            <section id="test-parcela">
                <div class="container mx-auto row">
                    <?php
                    include_once 'functions/funciones.php';
                    $endpoint = 'http://localhost:8080/backend-sec71-evaluacion3/v1/parcela/';
                    $token = 'get';
                    //!IMPORTANTE: Cambiar el endpoint por el de su backend (en este caso estoy usando un backend local)
                    // $endpointParcela = getEndpointByToken('http://localhost/backend-sec71-evaluacion2/v1/parcela/', 'get');
                    $endpointParcela = getEndpointByToken($endpoint, $token);
                    //transformar el contenido del endpoint en formato JSON
                    $endpointParcela = json_decode($endpointParcela, true);

                    // Verifica si hay elementos en $endpointParcela['data']
                    if (isset($endpointParcela['data']) && is_array($endpointParcela['data']) && count($endpointParcela['data']) > 0) {
                        // Inicializa un contador
                        $contador = 0;

                        foreach ($endpointParcela['data'] as $datoParcela) {
                            // Si el contador es par, muestra el bloque de "Solo Terreno", de lo contrario, muestra el bloque de "Casa en Parcela"
                            if ($contador % 2 == 0) {
                                include 'componentes/solo_terreno.php';
                            } else {
                                include 'componentes/casa_en_parcela.php';
                            }
                            // Incrementa el contador
                            $contador++;
                        }
                    } else {
                        // En caso de que no haya elementos en $endpointParcela['data'], muestra un mensaje de error o maneja la situación de alguna otra manera
                        echo "No hay datos disponibles";
                    }
                    ?>
                </div>
            </section>
            <!-- DIV cierre parcelas -->
        </div>
        <!-- Testimonios -->
        <!-- Procederé a realizar el carrusel de testimonios, estoy probando una librería de JS para esto, les comentaré sobre los avances -->
        <section id="testimonios">
            <?php include 'componentes/testimonios.php' ?>
        </section>

        <!-- Preguntas Frecuentes -->
        <section id="preguntasFrecuentes">
            <div class="container pt-5">
                <h1 id="preguntas" class="mb-5">Preguntas Frecuentes</h1>
                <?php
                include_once 'functions/funciones.php';
                $endpoint = 'http://localhost:8080/backend-sec71-evaluacion3/v1/pregunta_frecuente/';
                $token = 'get';
                //!IMPORTANTE: Cambiar el endpoint por el de su backend (en este caso estoy usando un backend local)
                // $endpointParcela = getEndpointByToken('http://localhost/backend-sec71-evaluacion2/v1/parcela/', 'get');
                $endpointPregunta = getEndpointByToken($endpoint, $token);
                //transformar el contenido del endpoint en formato JSON
                $endpointPregunta = json_decode($endpointPregunta, true);

                foreach ($endpointPregunta['data'] as $datoPregunta) {
                    include 'componentes/preguntas.php';
                }
                ?>
            </div>
        </section>

        <!-- Contacto -->
        <section id="contacto">
            <?php include 'componentes/contacto.php' ?>
        </section>

        <!-- Boton Inicio -->
        <button onclick="topFunction()" id="myBtn" title="Volver al inicio">
            <i class="bi bi-arrow-up"></i>
        </button>
        <!-- Footer -->
        <footer>
            <?php include 'componentes/footer.php' ?>
        </footer>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>