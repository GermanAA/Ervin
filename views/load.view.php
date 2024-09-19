<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/603f27fb7e.js"></script>
  <link rel="stylesheet" type="text/css" href="css\estilos.css">
  <title>Ervin Load</title>
</head>

<body>

  <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Ervin USA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item ">

              <a class="nav-link" href="cerrar.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <h1>
        Cargar Información
      </h1>
    </header>

    <div class="col-12">
      <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="col-12">

          <label for="product">Selecciona una foto del producto</label>
          <input type="file" id="product" name="product">


        </div>


        <div class="col-12">

          <label for="condicion">Condición</label>
          <input type="text" id="condicion" name="condicion" class="form-control">

        </div>

        <div class="col-12">

          <label for="fabricante">Fabricante</label>
          <input type="text" id="fabricante" name="fabricante" class="form-control">

        </div>

        <div class="col-12">

          <label for="modelo">Modelo</label>
          <input type="text" id="modelo" name="modelo" class="form-control">

        </div>

        <div class="col-12">

          <label for="ubicacion">Ubicación</label>
          <input type="text" id="ubicacion" name="ubicacion" class="form-control">

        </div>

        <div class="col-12">

          <label for="precio">Precio</label>
          <input type="number" id="precio" name="precio" step="any" class="form-control">

        </div>

        <div class="col-12">

          <label for="estatus">Estatus</label>
          <input type="text" id="estatus" name="estatus" class="form-control">

        </div>

        <div class="col-12 col-sm-12 col-md-12">
          <!-- Fecha-->
          <label for="Fecha">Fecha: </label>
          <input type="date" name="FechaIngreso" id="FechaIngreso" class="form-control" placeholder="Fecha de Consumo" required>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>




  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>





</body>

</html>