<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/603f27fb7e.js"></script>
  <link rel="stylesheet" href="styles/styles.css">

  <title>Ervin Load</title>
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
            <li class="nav-item">
              <a class="nav-link" href="load.php">Carga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="masiveLoad.php">Masiva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cerrar.php">Cerrar Sesión</a>
            </li>


          </ul>
        </div>
      </div>
    </nav>



  <div class="container-fluid">



    <div class="container mt-5">
      <h1 class="mb-4">Formulario de Producto</h1>
      <form id="myForm" class="row g-3">
        <div class="col-md-6">
          <label for="product" class="form-label">Selecciona una foto del producto</label>
          <input type="file" id="product" name="product" accept="image/*" class="form-control">
        </div>

        <!-- Otros campos del formulario -->
        <div class="col-md-6">
          <label for="condicion" class="form-label">Condición</label>
          <input type="text" id="condicion" name="condicion" class="form-control" placeholder="Condición" required>
        </div>

        <div class="col-md-6">
          <label for="fabricante" class="form-label">Fabricante</label>
          <input type="text" id="fabricante" name="fabricante" class="form-control" placeholder="Fabricante" required>
        </div>

        <div class="col-md-6">
          <label for="modelo" class="form-label">Modelo</label>
          <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" required>
        </div>

        <div class="col-md-6">
          <label for="ubicacion" class="form-label">Ubicación</label>
          <input type="text" id="ubicacion" name="ubicacion" class="form-control" placeholder="Ubicación" required>
        </div>

        <div class="col-md-6">
          <label for="precio" class="form-label">Precio</label>
          <input type="number" id="precio" name="precio" class="form-control" placeholder="Precio" required>
        </div>

        <div class="col-md-6">
          <label for="estatus" class="form-label">Estatus</label>
          <input type="text" id="estatus" name="estatus" class="form-control" placeholder="Estatus" required>
        </div>

        <div class="col-md-6">
          <label for="FechaIngreso" class="form-label">Fecha de Ingreso</label>
          <input type="date" id="FechaIngreso" name="FechaIngreso" class="form-control" required>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>




  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/load.js"></script>
  <!--<script src="js/jquery-3.2.1.min.js"></script>-->



</body>

</html>