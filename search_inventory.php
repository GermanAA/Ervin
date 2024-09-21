<?php
// Conexión a la base de datos (ajusta tus credenciales)
$host = '107.180.48.193';
$dbname = 'Ervin';
$username = 'gz90wnok';
$password = 'Julio70AK7';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Obtener los datos enviados desde el formulario
$query = isset($_POST['query']) ? $_POST['query'] : '';
$condition = isset($_POST['condition']) ? $_POST['condition'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$model = isset($_POST['model']) ? $_POST['model'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';

// Construir la consulta SQL dinámica
$sql = "SELECT * FROM Inventario WHERE (Condicion LIKE :query OR Fabricante LIKE :query OR Modelo LIKE :query)";

if ($condition) {
    $sql .= " AND condition = :condition";
}
if ($category) {
    $sql .= " AND category = :category";
}
if ($model) {
    $sql .= " AND model = :model";
}
if ($location) {
    $sql .= " AND location = :location";
}

$stmt = $pdo->prepare($sql);

// Parámetros para la consulta
$stmt->bindValue(':query', '%' . $query . '%');
if ($condition) {
    $stmt->bindValue(':condition', $condition);
}
if ($category) {
    $stmt->bindValue(':category', $category);
}
if ($model) {
    $stmt->bindValue(':model', $model);
}
if ($location) {
    $stmt->bindValue(':location', $location);
}

// Ejecutar la consulta
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mostrar los resultados
if ($results) {
    echo '<table class="table">';
    echo '<thead><tr><th>Name</th><th>Model</th><th>Condition</th><th>Category</th><th>Location</th></tr></thead>';
    echo '<tbody>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['Condicion']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Fabricante']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Modelo']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Ubicacion']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Estatus']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo 'No results found.';
}
?>
