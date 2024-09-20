<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Ervin Load</title>
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
          <li class="nav-item">
            <a class="nav-link" href="load.php">Carga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="masiveLoad.php">Masiva</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <header>
      <h1>
        Cargar Información
      </h1>
    </header>

    <div class="col-12">

      <h2>Subir Archivo Excel</h2>
      <form id="excelForm">
        <input type="file" id="excelFile" accept=".xlsx, .xls">
        <button type="button" onclick="processExcel()">Cargar y Procesar</button>
      </form>

      <div id="output"></div>

    </div>




  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Incluye la librería XLSX -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

  <script>
    function processExcel() {
      const fileInput = document.getElementById('excelFile');
      const file = fileInput.files[0];

      if (!file) {
        alert("Por favor, selecciona un archivo.");
        return;
      }

      const reader = new FileReader();

      reader.onload = function(e) {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, {
          type: 'array'
        });

        const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
        const excelData = XLSX.utils.sheet_to_json(firstSheet, {
          header: 1
        });

        console.log(excelData); // Ver los datos en consola

        // Mostrar los datos en HTML
        let output = '<table border="1">';
        excelData.forEach(row => {
          output += '<tr>';
          row.forEach(cell => {
            output += `<td>${cell}</td>`;
          });
          output += '</tr>';
        });
        output += '</table>';
        document.getElementById('output').innerHTML = output;

        // Convertir los datos a formato JSON para enviar a la base de datos
        sendDataToDatabase(excelData);
      };

      reader.readAsArrayBuffer(file);
    }

    function sendDataToDatabase(data) {
      // Envía los datos a un archivo PHP mediante AJAX para procesarlos y guardarlos en la base de datos MySQL
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "upload.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert("Datos enviados exitosamente a la base de datos");
        }
      };

      const jsonData = JSON.stringify({
        excelData: data
      });
      xhr.send(jsonData);
    }
  </script>


</body>

</html>