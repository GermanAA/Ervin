<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ervin USA Replica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">

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

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
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
                            <img src="img\principal\maxresdefault.jpg" class="d-block mw-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img\principal\stoughton-front.jpg" class="d-block mw-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img\principal\trailers-stoughton.jpg" class="d-block w-100" alt="...">
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



        <!-- About Section -->

        <div class="row section">

            <div class="col-md-6 background-div" id="Nosotros">
                <h2>Nosotros</h2>
                <p>Ervin es una empresa familiar que comenzó como una operación unipersonal y se
                    ha convertido en una próspera empresa internacional de venta de semirremolques
                    y remolques de caja seca. Aunque la empresa ha experimentado un éxito y un
                    crecimiento significativos, Ervin se ha mantenido fiel a los valores
                    fundamentales de nuestro fundador, Greg Ervin. </p>
                <a href="#" class="btn btn-outline-secondary">Read More</a>
            </div>
        </div>

        <!-- Search Equipment Inventory Section -->

        <div class="row section" id="Inventario">
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
                                    <option value="Usada">Usada</option>
                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="col-md-6">
                                <label for="category" class="form-label">Fabricante</label>
                                <select class="form-select" id="Fabricante" name="Fabricante">
                                    <option selected value="">Marcas</option>
                                    <option value="GreatDane">GreatDane</option>
                                    <option value="Utility">Utility</option>
                                    <option value="Hiunday">Hiunday</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Modelo</label>
                                <select class="form-select" id="model" name="model">
                                    <option selected value="">Año</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>

                                    <!-- Add more categories as needed -->
                                </select>
                            </div>


                            <!-- Location Filter -->
                            <div class="col-md-6">
                                <label for="location" class="form-label">Ubicación</label>
                                <select class="form-select" id="location" name="location">
                                    <option selected value="">Ciudad</option>
                                    <option value="Queretaro">Queretaro</option>
                                    <option value="Cuautitlan">Cuautitlan</option>

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
            <div class="row" >

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="pagination" >
 
                        </ul>

                    </nav>

            </div>
        </div>





        <!-- Contact Section -->

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
                                <option selected disabled>Select your state</option>
                                <option value="CA">California</option>
                                <option value="TX">Texas</option>
                                <option value="NY">New York</option>
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
        <p>&copy; 2024 Ervin USA. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>