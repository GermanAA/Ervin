<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="styles/estilos.css">
	<link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.min.css">


	<title>Iniciar Sesión</title>


</head>

<body class="text-center bg-light">



	<div class="container text-dark mt-4 ">


		<div class="row justify-content-center ">
			<div class="col-12 col-sm-6 col-md-6">
				<h3 class="">Iniciar Sesión</h3>
				<hr class="border border-dark">
			</div>
		</div>


		<div class="row justify-content-center mt-3">
			<div class="col-12 col-sm-6 col-md-6">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="" name="login">



					<div class="form-group row">

						<div class="col-1">
							<i class="fas fa-user fa-2x dark mt-3"></i>
						</div>

						<div class="col-11">
							<input type="text" name="usuario" class="form-control mt-3" placeholder="Usuario">
						</div>


					</div>

					<div class="form-group row">

						<div class="col-1">
							<i class="fas fa-key fa-2x dark mt-3 "></i>
						</div>

						<div class="col-11">
							<input type="password" name="password" class="form-control mt-3" placeholder="Contraseña">
						</div>

					</div>



					<div class="form-group row justify-content-center">
						<div class="col-6">
							<button class="btn btn-primary btn-lg" type="submit">Enviar</button>
						</div>
					</div>

					<br />

					<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>

					<?php if (!empty($errores)) : ?>

						<div class="error">
							<ul>
								<?php echo $errores ?>
							</ul>
						</div>

					<?php endif; ?>

				</form>

				<p class="texto-registrate">
					¿Aún no tienes cuenta?
					<a href="">Registrate</a>
				</p>

			</div>
		</div>
	</div>






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<!--<script src="js/jquery-3.2.1.min.js"></script>-->


</body>

</html>