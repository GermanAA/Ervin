<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracto Elite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="fontello-a540fdbf\css\fontello.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                TractoElite
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#Inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Inventario">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contacto">Contacto</a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid text-center">
        <div class="row section" id="Inicio">
            <div class="col-md-12">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img\principal\JumbotronTracto.webp" class="d-block" alt="...">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row section">

            <!-- Hero Section -->

            <h1>Bienvenido a TractoElite</h1>
            <p>Tenemos los remolques que necesitas</p>

            <button type="button" class="btn btn-primary">Learn More</button>


        </div>




        <!-- Search Equipment Inventory Section -->

        <div class="row " id="Inventario">
            <h2 class="text-center mb-4">Busqueda de Equipo - Inventario</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="searchForm">
                        <div class="input-group mb-3">
                            <!-- Search Input -->
                            <input type="text" class="form-control" id="searchQuery" name="query"
                                placeholder="Condición, Fabricante, Modelo, Ubicación o keyword">
                            <!-- Search Button -->
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>

                        <!-- Filters -->
                        <div class="row">

                            <!-- Condition Filter -->
                            <div class="col-md-6">
                                <label for="condition" class="form-label">Condición</label>
                                <select class="form-select" id="condition" name="condition">
                                    <option selected value="">Usado o Nuevo</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Usado">Usado</option>

                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="col-md-6">
                                <label for="category" class="form-label">Fabricante</label>
                                <select class="form-select" id="Fabricante" name="Fabricante">
                                    <option selected value="">Marcas</option>
                                    <option value="GreatDane">GreatDane</option>
                                    <option value="Utility">Utility</option>
                                    <option value="Wabash">Wabash</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Modelo</label>
                                <select class="form-select" id="model" name="model">
                                    <option selected value="">Año</option>
                                    <option value="2015">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2015">2008</option>
                                    <option value="2015">2009</option>
                                    <option value="2015">2010</option>
                                    <option value="2015">2011</option>

                                    <!-- Add more categories as needed -->
                                </select>
                            </div>


                            <!-- Location Filter -->
                            <div class="col-md-6">
                                <label for="location" class="form-label">Ubicación</label>
                                <select class="form-select" id="location" name="location">
                                    <option selected value="">Ciudad</option>
                                    <option value="Queretaro">Queretaro</option>
                                    <option value="Tlalnepantla">Tlalnepantla</option>
                                    <option value="Queretaro">Ciudad De Mexico</option>
                                    

                                    <!-- Add more locations as needed -->
                                </select>
                            </div>
                        </div>

                        <!-- Reset Button -->
                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary">Reset Filters</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="row">

            <!-- Div para mostrar los resultados de la galería -->
            <div class="row" id="gallery"></div>

            <!-- Div para paginación -->
            <div class="row">

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" id="pagination">

                    </ul>

                </nav>

            </div>
        </div>



        <a class="btn-wsp" target="_blank" href="https://wa.me/525666057108?text=Buen%20día...">
            <i class="icon-whatsapp"></i>
        </a>

        <!-- Contact Section -->

        <div class="container my-5">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold text-light">Nuestras Ubicaciones</h2>
                    <p class="text-secondary">Encuentra nuestras oficinas, patio de exhibición y taller de servicio.</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card bg-dark border-secondary h-100 shadow-sm">
                        <div class="card-body p-3">
                            <h5 class="card-title text-white mb-3">🏢 Oficinas </h5>
                            <div class="ratio ratio-16x9">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.452160603592!2d-99.15647422532932!3d19.30617604470734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce01e4d63a6a37%3A0xd6ec11dffe0e9320!2sATZ%20transportes!5e0!3m2!1ses-419!2smx!4v1782753722871!5m2!1ses-419!2smx"
                                    style="border:0; border-radius: 8px;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <p class="text-light mt-3 mb-0 small">
                                <strong>Dirección:</strong>San Benito Mnz 659, Pedregal de Sta Úrsula, Coyoacán, 04600 Ciudad de México, CDMX
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card bg-dark border-secondary h-100 shadow-sm">
                        <div class="card-body p-3">
                            <h5 class="card-title text-white mb-3">🚛 Patio de Equipos</h5>
                            <div class="ratio ratio-16x9">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1795.2611422946402!2d-99.42289067708208!3d19.234239998315918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDE0JzAzLjMiTiA5OcKwMjUnMTkuNiJX!5e1!3m2!1ses-419!2smx!4v1782754333566!5m2!1ses-419!2smx"
                                    style="border:0; border-radius: 8px;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <p class="text-light mt-3 mb-0 small">
                                <strong>Dirección:</strong> 007, 52655 Guadalupe Victoria, Méx.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card bg-dark border-secondary h-100 shadow-sm">
                        <div class="card-body p-3">
                            <h5 class="card-title text-white mb-3">🔧 Patio de Equipos</h5>
                            <div class="ratio ratio-16x9">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d223.91609715144824!2d-98.55763670224803!3d19.59076204097515!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e1!3m2!1ses-419!2smx!4v1782754948506!5m2!1ses-419!2smx"
                                    style="border:0; border-radius: 8px;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <p class="text-light mt-3 mb-0 small">
                                <strong>Dirección:</strong> Periférico Sur, Loma Bonita, 90203 Heroica Cdad. de Calpulalpan, Tlax.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="Contacto">
            <h2 class="text-center mb-5">Como Podemos Ayudarte</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="ContactForm" action="php/submit_contact.php" method="POST">

                        <!-- Nombres -->
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                placeholder="Enter your first name" required>
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                placeholder="Enter your last name" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option selected disabled value="">Selecciona un estado</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Ciudad de México">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                                <!-- Add more states as needed -->
                            </select>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefono</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" required>
                        </div>

                        <!-- Company -->
                        <div class="mb-3">
                            <label for="company" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="company" name="company"
                                placeholder="Enter your company name">
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="5"
                                placeholder="Type your message" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>














    <!-- Footer -->
    <footer class="bg-dark text-light text-center p-4">
        <p>&copy; 2024 TractoElite. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>