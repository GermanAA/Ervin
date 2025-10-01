<?php
// Conexión a la base de datos
$host = '107.180.48.193';
$dbname = 'Ervin';
$username = 'gz90wnok';
$password = 'Julio70AK7';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username , $password);

// Parámetros de búsqueda y paginación
$query = $_POST['query'] ?? '';
//echo ($query);
//$query = 2014;
$condition = $_POST['condition'] ?? '';
//echo ($condition);
//$condition = 'Usado';
//echo($condition);
$Fabricante = $_POST['Fabricante'] ?? '';
$model = $_POST['model'] ?? '';
$location = $_POST['location'] ?? '';
$page = $_POST['page'] ?? 1;
$items_per_page = 4;
$offset = ($page - 1) * $items_per_page;

// Construcción de la consulta SQL
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
    $sql .= " AND  Modelo = :Modelo";
    $params[':Modelo'] = $model;
}

if ($location !== '') {
    $sql .= " AND Ubicacion = :Ubicacion";
    $params[':Ubicacion'] = $location;
}

$sql .= " LIMIT :offset, :limit";
$params[':offset'] = $offset;
$params[':limit'] = $items_per_page;

// Preparar y ejecutar la consulta
$stmt = $pdo->prepare($sql);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
}
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener el total de productos para calcular las páginas
$countSql = "SELECT COUNT(*) FROM Inventario WHERE Modelo LIKE :query";
$countStmt = $pdo->prepare($countSql);
$countStmt->execute([':query' => '%' . $query . '%']);
$total_items = $countStmt->fetchColumn();
$total_pages = ceil($total_items / $items_per_page);

// Formato JSON de respuesta
$response = [
    'items' => array_map(function ($item) {
        return [
            'Condicion' => $item['Condicion'],
            'Fabricante' => $item['Fabricante'],
            'Modelo' => $item['Modelo'],
            'Ubicacion' => $item['Ubicacion'],
            'image_url' => "img/inv/{$item['Ruta']}"
        ];
    }, $items),
    'total_pages' => $total_pages,
    'current_page' => (int) $page
];

header('Content-Type: application/json');
echo json_encode($response);
?>
