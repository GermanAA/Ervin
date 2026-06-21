<?php 
// 1. Cargamos el init.php ANTES de hacer cualquier otra cosa (esto ya incluye conexion.php)
require_once 'init.php'; 

// 2. Si el usuario ya está logueado, lo mandamos al inventario (o a paginaprincipal.php)
if (isset($_SESSION['usuario_id']) && isset($_SESSION['usuario'])) {
	header('Location: ' . BASE_URL . 'inventario.php');
    exit();
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturamos los datos
	$usuario = strtolower($_POST['usuario']);
	$password = hash('sha512', $_POST['password']);

    // Preparamos la consulta
	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

    // Usamos FETCH_ASSOC para que traiga los nombres de las columnas exactos
	$resultado = $statement->fetch(PDO::FETCH_ASSOC);

	if ($resultado !== false) {
        // ==========================================
        // AQUÍ ESTÁ LA MAGIA: Aseguramos minúsculas
        // ==========================================
        $_SESSION['usuario_id'] = $resultado['Id']; // <-- Usamos 'id' en minúsculas (ajústalo si en tu BD es diferente)
        $_SESSION['usuario'] = $usuario;
        
        // Lo mandamos directo a inventario.php tras iniciar sesión
        header('Location: ' . BASE_URL . 'paginaprincipal.php'); 
        exit();

	} else {
		$errores .= '<li>Datos Incorrectos</li>';
	}
}

require 'views/login.view.php';
?>