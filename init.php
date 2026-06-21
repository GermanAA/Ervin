<?php
/**
 * init.php
 *
 * Guardián de seguridad, configuración global y cargador de recursos.
 * Este archivo debe requerirse al inicio de CUALQUIER archivo que sea un punto de entrada.
 */

// ===================================================================
// 1. INICIAR LA SESIÓN
// ===================================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===================================================================
// 2. CONFIGURACIÓN REGIONAL
// ===================================================================
date_default_timezone_set('America/Mexico_City'); // Ajusta tu zona horaria según lo necesites

// ===================================================================
// 3. DEFINIR RUTAS ABSOLUTAS Y CARGAR DEPENDENCIAS (COMPOSER & DOTENV)
// ===================================================================
define('BASE_PATH', __DIR__ . '/');

// Cargar el autoloader de Composer (contiene phpdotenv)
require_once BASE_PATH . 'vendor/autoload.php';

// Inicializar y cargar variables de entorno (.env)
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

// Generar la URL base dinámicamente
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https:' : 'http:';
$host = $_SERVER['HTTP_HOST'];
$script_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__));
$script_path = ($script_path == '/') ? '/' : rtrim($script_path, '/') . '/';

define('BASE_URL', $protocol . '//' . $host . $script_path);

// ===================================================================
// 4. MIDDLEWARE: VALIDAR LA SESIÓN DE USUARIO
// ===================================================================
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Lista de páginas que NO requieren sesión para ser vistas
$paginas_publicas = ['login.php', 'registrate.php', 'index.php', 'api_inventario.php'];

// Si no hay sesión válida Y la página actual NO está en la lista pública, lo expulsamos al login
if ((!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario'])) && !in_array($pagina_actual, $paginas_publicas)) {
    header('Location: ' . BASE_URL . 'login.php');
    exit();
}

// Si el usuario ya está logueado e intenta entrar al login o registro, lo mandamos al dashboard
if ((isset($_SESSION['usuario_id']) && isset($_SESSION['usuario'])) && in_array($pagina_actual, $paginas_publicas)) {
    header('Location: ' . BASE_URL . 'load.php');
    exit();
}

// ===================================================================
// 5. INCLUIR LA CONEXIÓN A LA BASE DE DATOS
// ===================================================================
try {
    require_once BASE_PATH . 'conexion.php';
} catch (Exception $e) { // Capturamos una excepción general por si el error viene antes de PDO
    die("Error crítico del sistema: No se pudo cargar la base de datos.");
}
?>