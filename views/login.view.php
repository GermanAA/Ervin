<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | TractoElite</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Fondo sutil y animaciones */
        body { background-color: #f4f6f9; }
        .auth-card { border-radius: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.08); border: none; }
        .fade-in-up { animation: fadeInUp 0.6s ease-out forwards; opacity: 0; transform: translateY(20px); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .brand-icon { font-size: 3.5rem; color: #0d6efd; line-height: 1; }
    </style>
</head>

<body class="d-flex align-items-center min-vh-100">

<div class="container fade-in-up">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            
            <div class="card auth-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <i class="bi bi-truck brand-icon"></i>
                    <h3 class="fw-bold text-dark mt-2">Bienvenido de vuelta</h3>
                    <p class="text-muted">Ingresa tus credenciales para acceder</p>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">

                    <div class="form-floating mb-3">
                        <input type="text" name="usuario" class="form-control" id="usuarioInput" placeholder="Usuario" required>
                        <label for="usuarioInput"><i class="bi bi-person me-2"></i>Usuario</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Contraseña" required>
                        <label for="passwordInput"><i class="bi bi-key me-2"></i>Contraseña</label>
                    </div>

                    <?php if (!empty($errores)) : ?>
                        <div class="alert alert-danger py-2" role="alert">
                            <ul class="mb-0 ps-3">
                                <?php echo $errores ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary btn-lg fw-bold" type="submit">Iniciar Sesión</button>
                    </div>

                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <p class="text-muted mb-0">¿Aún no tienes cuenta? 
                        <a href="registrate.php" class="text-decoration-none fw-bold">Regístrate aquí</a>
                    </p>
                </div>
            </div>

            <div class="text-center mt-3">
                <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>