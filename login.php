<?php 


// 1. Cargamos el init.php ANTES de hacer cualquier otra cosa
require_once 'init.php'; 

// 2. Si el usuario ya está logueado, lo mandamos al sistema
if (isset($_SESSION['usuario'])) {
	header('Location: ' . BASE_URL . 'paginaprincipal.php');
    exit();
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);

	try {
		//$mysql = new PDO('mysql:host=localhost;dbname=Expensesgerman', 'root', '');
		require("conexion.php");
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}

	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
    $_SESSION['usuario_id'] = $resultado['Id']; // Revisa que 'Id' sea exactamente como se llama la columna en tu tabla 'usuarios'
    $_SESSION['usuario'] = $usuario;
    header('Location: ' . BASE_URL . 'paginaprincipal.php'); // O load.php, la ruta a la que quieras ir
    exit();

	} else {
		$errores .= '<li>Datos Incorrectos</li>';
	}
}

require 'views/login.view.php';

?>