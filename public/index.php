<?php

// Front Controller - Punto de entrada de la aplicacion

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/ProductoController.php';

$controller = $_GET['controller'] ?? 'producto';
$action = $_GET['action'] ?? 'index';

if ($controller === 'producto') {
    $productoController = new ProductoController($pdo);

    $accionesPermitidas = ['index', 'create', 'store', 'edit', 'update', 'delete', 'destroy'];

    if (in_array($action, $accionesPermitidas)) {
        $productoController->$action();
    } else {
        echo "<h3>Accion no encontrada.</h3>";
        echo "<a href='index.php?controller=producto&action=index'>Volver al inicio</a>";
    }
} else {
    echo "<h3>Controlador no encontrado.</h3>";
    echo "<a href='index.php?controller=producto&action=index'>Volver al inicio</a>";
}
