<?php require BASE_PATH . 'views/templates/header.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* Animación de entrada hacia arriba */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    /* Retrasos para que las tarjetas entren una por una */
    .delay-1 { animation-delay: 0.2s; }
    .delay-2 { animation-delay: 0.4s; }
    .delay-3 { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animación del camión en movimiento */
    .truck-container {
        width: 100%;
        overflow: hidden;
        position: relative;
        height: 60px;
        margin-bottom: 20px;
        border-bottom: 3px dashed #dee2e6;
    }

    .moving-truck {
        position: absolute;
        bottom: 0;
        left: -50px;
        font-size: 2.5rem;
        color: #0d6efd; /* Azul de Bootstrap */
        animation: driveTruck 8s linear infinite;
    }

    @keyframes driveTruck {
        0% { left: -50px; transform: rotate(0deg); }
        10% { transform: translateY(-3px) rotate(-2deg); } /* Pequeño bache */
        20% { transform: translateY(0) rotate(0deg); }
        100% { left: 100%; }
    }

    /* Efecto Hover para las tarjetas */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        cursor: pointer;
    }
    
    .icon-large {
        font-size: 3rem;
        color: #495057;
    }
</style>

<div class="container mt-4">
    
    <div class="row fade-in-up">
        <div class="col-12 text-center mb-4">
            <h1 class="fw-bold text-dark">Bienvenido al Centro de Control Logístico</h1>
            <p class="text-muted fs-5">Hola, <span class="text-primary fw-bold"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span>. ¿Qué gestionaremos hoy?</p>
        </div>
    </div>

    <div class="row fade-in-up delay-1">
        <div class="col-12">
            <div class="truck-container">
                <i class="bi bi-truck moving-truck"></i>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        
        <div class="col-md-4 mb-4 fade-in-up delay-1">
            <a href="<?php echo BASE_URL; ?>inventario.php" class="text-decoration-none">
                <div class="card shadow-sm h-100 hover-card text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-boxes icon-large mb-3 text-primary"></i>
                        <h4 class="card-title fw-bold text-dark">Inventario</h4>
                        <p class="card-text text-muted">Gestiona los equipos, refacciones y existencias en el almacén.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4 fade-in-up delay-2">
            <div class="card shadow-sm h-100 hover-card text-center p-4" onclick="proximamente()">
                <div class="card-body">
                    <i class="bi bi-truck-front-fill icon-large mb-3 text-success"></i>
                    <h4 class="card-title fw-bold text-dark">Flota Activa</h4>
                    <p class="card-text text-muted">Supervisa el estado y rutas de las unidades de transporte.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 fade-in-up delay-3">
            <div class="card shadow-sm h-100 hover-card text-center p-4" onclick="proximamente()">
                <div class="card-body">
                    <i class="bi bi-clipboard-data icon-large mb-3 text-warning"></i>
                    <h4 class="card-title fw-bold text-dark">Reportes</h4>
                    <p class="card-text text-muted">Visualiza métricas, ingresos y rendimiento operativo.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // Pequeña función para las tarjetas que aún no tienen módulo
    function proximamente() {
        Swal.fire({
            icon: 'info',
            title: 'Próximamente',
            text: 'Este módulo está en desarrollo.',
            confirmButtonColor: '#0d6efd'
        });
    }
</script>

<?php require BASE_PATH . 'views/templates/footer.php'; ?>