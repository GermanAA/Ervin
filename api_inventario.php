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
            echo json_encode(['status' => 'success', 'data' => $data]);
            break;

        case 'create':
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
            echo json_encode(['status' => 'success', 'message' => 'Equipo registrado correctamente.']);
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
?>