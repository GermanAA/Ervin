<?php


// 1. Cargamos el guardián
require_once 'init.php';

// 2. Le decimos al navegador que vamos a devolver datos en formato JSON
header('Content-Type: application/json');

// Recibimos la acción a realizar
$action = isset($_POST['action']) ? $_POST['action'] : '';
// --- NUEVO BLOQUE DE SEGURIDAD INTERNA ---
$acciones_privadas = ['create', 'update', 'delete'];

// Si la acción es privada y el usuario NO ha iniciado sesión, bloqueamos el acceso
if (in_array($action, $acciones_privadas)) {
    if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario'])) {
        echo json_encode(['status' => 'error', 'message' => 'Acceso denegado. Por favor, inicia sesión.']);
        exit(); // Detenemos la ejecución aquí mismo
    }
}

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

        case 'search':
            // Parámetros de búsqueda y paginación
            $query = $_POST['query'] ?? '';
            $condition = $_POST['condition'] ?? '';
            $Fabricante = $_POST['Fabricante'] ?? '';
            $model = $_POST['model'] ?? '';
            $location = $_POST['location'] ?? '';
            $page = $_POST['page'] ?? 1;
            $items_per_page = 4; // Sugiero 8 para que cuadre perfecto en grid de 4 columnas (2 filas)
            $offset = ($page - 1) * $items_per_page;

            // 1. Construcción de la consulta SQL dinámica
            $sql = "SELECT * FROM Inventario WHERE (Condicion LIKE :query OR Fabricante LIKE :query OR Modelo LIKE :query OR Ubicacion LIKE :query)";
            $params = [':query' => '%' . $query . '%'];

            if ($condition !== '') {
                $sql .= " AND Condicion = :condition";
                $params[':condition'] = $condition;
            }
            if ($Fabricante !== '') {
                $sql .= " AND Fabricante = :Fabricante";
                $params[':Fabricante'] = $Fabricante;
            }
            if ($model !== '') {
                $sql .= " AND Modelo = :Modelo";
                $params[':Modelo'] = $model;
            }
            if ($location !== '') {
                $sql .= " AND Ubicacion = :Ubicacion";
                $params[':Ubicacion'] = $location;
            }

            // 2. SOLUCIÓN AL BUG DE PAGINACIÓN: Contamos usando EXACTAMENTE los mismos filtros
            $countSql = str_replace("SELECT *", "SELECT COUNT(*)", $sql);
            $countStmt = $conexion->prepare($countSql);
            foreach ($params as $key => $value) {
                $countStmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }
            $countStmt->execute();
            $total_items = $countStmt->fetchColumn();
            $total_pages = ceil($total_items / $items_per_page);

            // 3. Añadimos LIMIT para traer solo los de esta página
            $sql .= " ORDER BY Id DESC LIMIT :offset, :limit";
            $params[':offset'] = $offset;
            $params[':limit'] = $items_per_page;

            $stmt = $conexion->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // 4. Formatear la respuesta
            $response = [
                'status' => 'success',
                'items' => array_map(function ($item) {

                    // SOLUCIÓN DE RUTAS: Compatible con fotos viejas y fotos nuevas
                    if (strpos($item['Ruta'], 'uploads/') === 0) {
                        $rutaFinal = $item['Ruta']; // Es una foto nueva (ej: uploads/remolques/15/foto.jpg)
                    } else if (!empty($item['Ruta'])) {
                        $rutaFinal = "img/principal/{$item['Ruta']}"; // Es una foto vieja
                    } else {
                        $rutaFinal = "img/placeholder.jpg"; // No tiene foto
                    }

                    return [
                        'Condicion' => $item['Condicion'],
                        'Fabricante' => $item['Fabricante'],
                        'Modelo' => $item['Modelo'],
                        'Ubicacion' => $item['Ubicacion'],
                        'Estatus' => $item['Estatus'],
                        'image_url' => $rutaFinal
                    ];
                }, $items),
                'total_pages' => $total_pages,
                'current_page' => (int) $page
            ];

            echo json_encode($response);
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

            // --- 5. ACTUALIZAR LA RUTA PRINCIPAL EN LA BD ---
            // Usaremos la foto de frente como portada. Si existe, guardamos su ruta.
            if (isset($rutas_guardadas['foto_frente'])) {
                $ruta_portada = $rutas_guardadas['foto_frente'];
                $update_stmt = $conexion->prepare("UPDATE Inventario SET Ruta = :ruta WHERE Id = :id");
                $update_stmt->execute([
                    ':ruta' => $ruta_portada,
                    ':id' => $id_remolque
                ]);
            }

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
