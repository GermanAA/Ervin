<?php


// 1. Cargamos el guardián
require_once 'init.php';

// 2. Le decimos al navegador que vamos a devolver datos en formato JSON
header('Content-Type: application/json');

// Recibimos la acción a realizar
$action = isset($_POST['action']) ? $_POST['action'] : '';

try {
    switch ($action) {
        case 'read':
            $statement = $conexion->prepare("SELECT * FROM Inventario ORDER BY Id DESC");
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Intentamos convertir a JSON
            $json = json_encode(['status' => 'success', 'data' => $data]);

            // Si falla por caracteres extraños, enviamos un error legible en lugar de una pantalla blanca
            if ($json === false) {
                echo json_encode(['status' => 'error', 'message' => 'Error convirtiendo datos: ' . json_last_error_msg()]);
            } else {
                echo $json;
            }
            break;

        case 'create':
            // --- 1. PRIMERO INSERTAMOS LOS DATOS DE TEXTO ---
            $statement = $conexion->prepare("INSERT INTO Inventario (Condicion, Fabricante, Modelo, Ubicacion, Price, Estatus, FechaIngreso, Ruta) VALUES (:condicion, :fabricante, :modelo, :ubicacion, :price, :estatus, :fechaIngreso, :ruta)");
            $statement->execute([
                ':condicion' => $_POST['condicion'],
                ':fabricante' => $_POST['fabricante'],
                ':modelo' => $_POST['modelo'],
                ':ubicacion' => $_POST['ubicacion'],
                ':price' => $_POST['price'],
                ':estatus' => $_POST['estatus'],
                ':fechaIngreso' => $_POST['fechaIngreso'],
                ':ruta' => $_POST['ruta']
            ]);

            // --- 2. OBTENEMOS EL ID DEL REMOLQUE RECIÉN CREADO ---
            // lastInsertId() nos devuelve el ID autoincremental que MySQL acaba de asignar
            $id_remolque = $conexion->lastInsertId();

            // --- 3. CREAMOS SU CARPETA EXCLUSIVA ---
            // Ejemplo de ruta resultante: uploads/remolques/15/
            $directorio_destino = 'uploads/remolques/' . $id_remolque . '/';

            if (!file_exists($directorio_destino)) {
                // El parámetro "true" permite crear carpetas anidadas si no existen
                mkdir($directorio_destino, 0777, true);
            }

            // --- 4. PROCESAMOS Y GUARDAMOS LAS FOTOS EN SU CARPETA ---
            $inputs_fotos = [
                'foto_frente',
                'foto_lat_izq',
                'foto_lat_der',
                'foto_puertas',
                'foto_suspension',
                'foto_interior',
                'foto_llantas_izq',
                'foto_llantas_der'
            ];

            $rutas_guardadas = [];

            foreach ($inputs_fotos as $input) {
                if (isset($_FILES[$input]) && $_FILES[$input]['error'] === UPLOAD_ERR_OK) {

                    // Limpiamos el nombre original del archivo (reemplazamos espacios por guiones)
                    $nombre_archivo = basename($_FILES[$input]['name']);
                    $nombre_archivo = str_replace(' ', '_', $nombre_archivo);

                    $ruta_final = $directorio_destino . $nombre_archivo;

                    // Movemos el archivo a la carpeta específica de este remolque
                    if (move_uploaded_file($_FILES[$input]['tmp_name'], $ruta_final)) {
                        $rutas_guardadas[$input] = $ruta_final;
                    }
                }
            }

            // --- 5. (OPCIONAL) ESPACIO PARA FUTURA ACTUALIZACIÓN ---
            // Si más adelante agregas columnas en tu BD para guardar las rutas de las fotos,
            // aquí puedes hacer un UPDATE a la tabla 'Inventario' usando el $id_remolque.

            echo json_encode([
                'status' => 'success',
                'message' => 'Equipo registrado. Fotos guardadas en la carpeta: ' . $directorio_destino
            ]);
            break;

        case 'update':
            $statement = $conexion->prepare("UPDATE Inventario SET Condicion=:condicion, Fabricante=:fabricante, Modelo=:modelo, Ubicacion=:ubicacion, Price=:price, Estatus=:estatus, FechaIngreso=:fechaIngreso, Ruta=:ruta WHERE Id=:id");
            $statement->execute([
                ':condicion' => $_POST['condicion'],
                ':fabricante' => $_POST['fabricante'],
                ':modelo' => $_POST['modelo'],
                ':ubicacion' => $_POST['ubicacion'],
                ':price' => $_POST['price'],
                ':estatus' => $_POST['estatus'],
                ':fechaIngreso' => $_POST['fechaIngreso'],
                ':ruta' => $_POST['ruta'],
                ':id' => $_POST['id']
            ]);
            echo json_encode(['status' => 'success', 'message' => 'Equipo actualizado correctamente.']);
            break;

        case 'delete':
            $statement = $conexion->prepare("DELETE FROM Inventario WHERE Id = :id");
            $statement->execute([':id' => $_POST['id']]);
            echo json_encode(['status' => 'success', 'message' => 'Equipo eliminado del inventario.']);
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'Acción no válida']);
            break;
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error de BD: ' . $e->getMessage()]);
}
