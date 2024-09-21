<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ervin USA Replica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/Logo-Header.png" alt="Logo" width="30" height="50" class="d-inline-block align-text-top">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid text-center">
        <div class="row section">
            <div class="col-md-12">
                <div class="cycling-banner-background-photo"
                    style="min-height: 174.9px; background-image: url('https://ervinusa.com/wp-content/uploads/2020/06/ervin-hero.jpg'); background-size: cover; background-position: center;">
                </div>
            </div>
        </div>

        <div class="row section">

            <!-- Hero Section -->

            <h1>Welcome to Ervin USA</h1>
            <p>Providing the highest quality products for over 100 years</p>
            <a href="#" class="btn btn-primary mt-3">Learn More</a>


        </div>

        <!-- About Section -->

        <div class="row section">
            <div class="col-md-6">
                <img src="https://ervinusa.com/wp-content/uploads/2020/06/ervin-about.jpg" alt="About Us"
                    class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>Ervin USA is a leader in the metal shot and grit industry. Our focus is on delivering the best
                    products with superior customer service.</p>
                <a href="#" class="btn btn-outline-secondary">Read More</a>
            </div>
        </div>

        <!-- Search Equipment Inventory Section -->

        <div class="row section">
            <h2 class="text-center mb-4">Search Equipment Inventory</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <!-- Search Input -->
                            <input type="text" class="form-control" id="searchQuery" name="query"
                                placeholder="Enter equipment name, model, or keyword" required>
                            <!-- Search Button -->
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>

                        <!-- Filters -->
                        <div class="row">

                            <!-- Condition Filter -->
                            <div class="col-md-6">
                                <label for="condition" class="form-label">Condition</label>
                                <select class="form-select" id="condition" name="condition">
                                    <option selected value="">All Conditions</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="col-md-6">
                                <label for="category" class="form-label">Fabricante</label>
                                <select class="form-select" id="category" name="category">
                                    <option selected value="">All Categories</option>
                                    <option value="machinery">Machinery</option>
                                    <option value="tools">Tools</option>
                                    <option value="accessories">Accessories</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Modelo</label>
                                <select class="form-select" id="model" name="model">
                                    <option selected value="">All Categories</option>
                                    <option value="machinery">Machinery</option>
                                    <option value="tools">Tools</option>
                                    <option value="accessories">Accessories</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>


                            <!-- Location Filter -->
                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <select class="form-select" id="location" name="location">
                                    <option selected value="">All Locations</option>
                                    <option value="warehouse1">Warehouse 1</option>
                                    <option value="warehouse2">Warehouse 2</option>
                                    <option value="warehouse3">Warehouse 3</option>
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

            <!-- Where results will be displayed -->
            <div id="searchResults"></div>



        </div>
        <br>



        <!-- Contact Section -->

        <div class="row">
            <h2 class="text-center mb-5">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="submit_contact.php" method="POST">

                        <!-- Nombres -->
                        <div class="mb-3">
                            <label for="nombres" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                placeholder="Enter your first name" required>
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                placeholder="Enter your last name" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label for="estado" class="form-label">State</label>
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
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" required>
                        </div>

                        <!-- Company -->
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" name="company"
                                placeholder="Enter your company name">
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
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