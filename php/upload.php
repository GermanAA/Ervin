<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['product']) && $_FILES['product']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['product']['tmp_name'];
        $fileName = $_FILES['product']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Asegurar que la extensión esté en minúsculas

        // Verificar si el archivo es WebP
        if ($fileExtension === 'webp') {
            $uploadFileDir = '../img/inv/';
            
            // Verificar si el directorio existe, si no, crearlo
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo "El archivo se ha subido correctamente.";
            } else {
                echo "Hubo un error al mover el archivo.";
            }
        } else {
            echo "El archivo no es un WebP.";
        }
    } else {
        echo "No se ha subido ninguna imagen o ha ocurrido un error.";
    }

    // Obtener otros datos del formulario
    $condicion = $_POST['condicion'] ?? '';
    $fabricante = $_POST['fabricante'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $estatus = $_POST['estatus'] ?? '';
    $fechaIngreso = $_POST['FechaIngreso'] ?? '';

    // Conectar a la base de datos y guardar los datos
    require '../funciones.php';
    $conexion = conexion('Ervin', 'gz90wnok', 'Julio70AK7');

    if (!$conexion) {
        die("Error al conectar con la base de datos.");
    }

    try {
        $statement = $conexion->prepare('
            INSERT INTO Inventario (Condicion, Fabricante, Modelo, Ubicacion, Price, Estatus, FechaIngreso, Ruta)
            VALUES (:Condicion, :Fabricante, :Modelo, :Ubicacion, :Price, :Estatus, :FechaIngreso, :Ruta)
        ');

        $statement->execute(array(
            ':Condicion' => $condicion,
            ':Fabricante' => $fabricante,
            ':Modelo' => $modelo,
            ':Ubicacion' => $ubicacion,
            ':Price' => $precio,
            ':Estatus' => $estatus,
            ':FechaIngreso' => $fechaIngreso,
            ':Ruta' => $fileName // Usar el nombre del archivo subido
        ));

        echo "Datos insertados correctamente en la base de datos.";
    } catch (PDOException $e) {
        echo "Error al insertar los datos: " . $e->getMessage();
    }
}


?>
