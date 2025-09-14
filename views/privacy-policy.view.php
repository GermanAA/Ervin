<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Web</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/styles.css">
    <link rel="stylesheet" type="text/css" href="fontello-a540fdbf\css\fontello.css">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11460488693">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-11460488693');
    </script>
</head>

<body>

    <div class="container">


        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GA Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Pricing">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" href="#Contacto">Contacto</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" href="privacy-policy.php">Aviso de Privacidad </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="row card text-center box">
            <canvas id="particleCanvas">

            </canvas>
            <div class="card-body">
                <h1>Desarrollo Web de Alta Calidad</h1>
                <p>Potencia tu negocio con soluciones web innovadoras y personalizadas.</p>
                <a href="#myForm" type="button" class="btn btn-primary btn-lg">Contáctanos</a>

            </div>

        </div>



        <div class="row box" id="Pricing">
            <div class="col-sm-12 card">
                <h2 class="text-center">Aviso de Privacidad</h2>

                <p class="text-center">TractoElite, con domicilio en CDMX, México, es responsable del tratamiento de los datos personales que usted nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>

                <h2>1. Finalidad del tratamiento de datos</h2>
                <p>Los datos personales que recabamos a través de nuestros formularios de contacto, WhatsApp u otros medios digitales serán utilizados para las siguientes finalidades:</p>
                <ul>
                    <li>Atender solicitudes de información sobre nuestros servicios</li>
                    <li>Cotizaciones y seguimiento a clientes potenciales</li>
                    <li>Agendar citas o servicios a domicilio</li>
                    <li>Envío de promociones, ofertas y novedades (opcional)</li>
                </ul>

                <h2>2. Datos recabados</h2>
                <p>Los datos que podríamos solicitar incluyen:</p>
                <ul>
                    <li>Nombre completo</li>
                    <li>Número de teléfono</li>
                    <li>Correo electrónico</li>
                    <li>Dirección (en caso de agendar servicio a domicilio)</li>
                </ul>

                <h2>3. Limitación de uso y divulgación de datos</h2>
                <p>Tus datos personales no serán compartidos con terceros, salvo que sea necesario para cumplir con obligaciones legales o contractuales. Implementamos medidas de seguridad administrativas, técnicas y físicas para proteger tu información.</p>

                <h2>4. Derechos ARCO</h2>
                <p>Tú, como titular de los datos, puedes ejercer en cualquier momento tus derechos de Acceso, Rectificación, Cancelación u Oposición (ARCO) mediante una solicitud al correo:
                    <a href="mailto:contacto@clean-up.mx">info@ga-technology-services.com</a>
                </p>

                <h2>5. Cambios al aviso de privacidad</h2>
                <p>Este aviso puede ser actualizado en cualquier momento. Te recomendamos revisarlo periódicamente en nuestro sitio web:
                    <a href="https://ga-technology-services.com" target="_blank">https://ga-technology-services.com/</a>
                </p>

            </div>

        </div>



        <a class="btn-wsp" target="_blank" href="https://wa.me/525522619648?text=Buen%20día...">
            <i class="icon-whatsapp"></i>
        </a>



        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="myForm" method="POST" class="">
            <div class="row justify-content-md-center box" id="Contacto">

                <div class="col-sm-12 Contacto">

                    <h2>Solicita una Consulta Gratuita</h2>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                </div>



                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje:</label>
                        <textarea id="message" class="form-control" name="message" required></textarea>
                    </div>
                </div>
                <div class="g-recaptcha" data-sitekey="6Ld_QsMqAAAAAJvREOuFK8KMJMqzK2wCwMEeUZhS"></div>
                <div class="col-sm-12 col-md-10"><button type="submit" class="btn btn-primary" name="action">Enviar</button>
                </div>
            </div>
        </form>


        <div class="row">
            <footer>
                <p class="card">&copy; GA Tech. Todos los derechos reservados.</p>
            </footer>
        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>