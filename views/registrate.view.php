<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="styles/estilos.css">
	<link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.min.css">


	<title>Registrate</title>


</head>

<body class="text-center text-white">

	<div class="container  text-white mt-5">

		<div class="row justify-content-center ">
			<div class="col-12 col-sm-6 col-md-6">
				<h1 class="titulo">Registrate </h1>
				<hr class="border">
			</div>
		</div>

		<div class="row justify-content-center mt-3">
			<div class="col-12 col-sm-6 col-md-6">

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">

					<div class="form-group row">

						<div class="col-1">
							<i class="fas fa-user fa-2x mt-1"></i>
						</div>

						<div class="col-11">
							<input type="text" name="usuario" class="form-control mt-1" placeholder="Usuario">
						</div>
					</div>

					<div class="form-group row">

						<div class="col-1">
							<i class="fas fa-key fa-2x mt-1"></i>
						</div>

						<div class="col-11">

							<input type="password" name="password" class="form-control mt-1" placeholder="Contraseña">
						</div>
					</div>

					<div class="form-group row">

						<div class="col-1">
							<i class="fas fa-key fa-2x mt-1"></i>
						</div>

						<div class="col-11">
							<input type="password" name="password2" class="form-control mt-1" placeholder="Repetir Contraseña">
						</div>
					</div>

					<div class="row justify-content-center mt-3 ">

						<div class="col-3">

							<button class="btn btn-primary btn-block" type="submit">Enviar</button>

						</div>
					</div>

					<div class="row justify-content-center mt-3 ">
						<div class="col-6">

							<p class="texto-registrate">¿ya tienes cuenta?
								<a href="login.php">Iniciar Sesión</a>
							</p>

						</div>
					</div>

					<?php if (!empty($errores)): ?>
						<div class="error">
							<ul>
								<?php echo $errores ?>
							</ul>
						</div>

					<?php endif; ?>
				</form>
			</div>
		</div>



	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<!--<script src="js/jquery-3.2.1.min.js"></script>-->


</body>

</html>