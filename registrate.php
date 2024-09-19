<?php session_start();


if (isset($_SESSION['usuario'])) {
	header ('Location: index.php');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario= filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password= $_POST['password'];
	$password2= $_POST['password2'];

	//echo "$usuario.$password.$password2";
	$errores= '';
	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li> por favor rellena</li>';
		# code...
	} else {
		try {
		//$conexion = new PDO('mysql:host=localhost;dbname=Ervin', 'gz90wnok', 'Julio70AK7');
		//$conexion = new PDO('mysql:host=localhost;dbname=expensesgerman', 'root', '');
		require("conexion.php");

		} catch (PDOException $e) {
			echo "Error:". $e->getMessage();
			
		}
		$statement=$conexion->prepare('SELECT*FROM usuarios where usuario =:usuario LIMIT 1');
		$statement-> execute(array(':usuario'=>$usuario));
		$resultado = $statement->fetch();

		if ($resultado != false){
			$errores .= '<li>El nombre ya existe</li>';
		}

		$password=hash('sha512', $password);
		$password2=hash('sha512', $password2);
		//echo "$usuario.$password.$password2";

		//print_r($ressultado);
		//var_dump($resultado);
	
		if ($password != $password2) {
			$errores.=  '<li>las contraseñas no son iguales</li>';
			# code...
		}
	}
if ($errores =='') {
	$statement= $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass) ');
	$statement-> execute(array(':usuario'=> $usuario, ':pass'=> $password));

header('Location: login.php');
	# code...
}
		
	}


require 'views/registrate.view.php';

 ?>