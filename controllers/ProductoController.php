<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Producto.php';

class ProductoController
{
    private $modelo;

    public function __construct($pdo)
    {
        $this->modelo = new Producto($pdo);
    }

    // Listar todos los productos
    public function index()
    {
        $productos = $this->modelo->getAll();
        $mensaje = $_GET['mensaje'] ?? null;
        require __DIR__ . '/../views/productos/index.php';
    }

    // Mostrar formulario de creacion
    public function create()
    {
        $datos = [];
        $errores = [];
        require __DIR__ . '/../views/productos/create.php';
    }

    // Guardar nuevo producto
    public function store()
    {
        $datos = [
            'nombre'      => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio'      => $_POST['precio'] ?? '',
            'stock'        => $_POST['stock'] ?? '',
        ];

        $errores = $this->validar($datos);

        if (!empty($errores)) {
            require __DIR__ . '/../views/productos/create.php';
            return;
        }

        $this->modelo->create($datos);
        header('Location: index.php?controller=producto&action=index&mensaje=Producto creado exitosamente');
        exit;
    }

    // Mostrar formulario de edicion
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $producto = $this->modelo->getById($id);

        if (!$producto) {
            header('Location: index.php?controller=producto&action=index&mensaje=Producto no encontrado');
            exit;
        }

        $datos = [];
        $errores = [];
        require __DIR__ . '/../views/productos/edit.php';
    }

    // Actualizar producto existente
    public function update()
    {
        $id = $_GET['id'] ?? null;
        $producto = $this->modelo->getById($id);

        if (!$producto) {
            header('Location: index.php?controller=producto&action=index&mensaje=Producto no encontrado');
            exit;
        }

        $datos = [
            'nombre'      => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio'      => $_POST['precio'] ?? '',
            'stock'        => $_POST['stock'] ?? '',
        ];

        $errores = $this->validar($datos);

        if (!empty($errores)) {
            require __DIR__ . '/../views/productos/edit.php';
            return;
        }

        $this->modelo->update($id, $datos);
        header('Location: index.php?controller=producto&action=index&mensaje=Producto actualizado exitosamente');
        exit;
    }

    // Mostrar confirmacion de eliminacion
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $producto = $this->modelo->getById($id);

        if (!$producto) {
            header('Location: index.php?controller=producto&action=index&mensaje=Producto no encontrado');
            exit;
        }

        require __DIR__ . '/../views/productos/delete.php';
    }

    // Ejecutar eliminacion
    public function destroy()
    {
        $id = $_GET['id'] ?? null;
        $this->modelo->delete($id);
        header('Location: index.php?controller=producto&action=index&mensaje=Producto eliminado exitosamente');
        exit;
    }

    // Validaciones
    private function validar($datos)
    {
        $errores = [];

        if (strlen($datos['nombre']) < 3) {
            $errores[] = 'El nombre es obligatorio y debe tener al menos 3 caracteres.';
        }

        if ($datos['precio'] === '' || !is_numeric($datos['precio']) || $datos['precio'] <= 0) {
            $errores[] = 'El precio es obligatorio y debe ser mayor que 0.';
        }

        if ($datos['stock'] === '' || !is_numeric($datos['stock']) || intval($datos['stock']) < 0) {
            $errores[] = 'El stock debe ser un entero no negativo.';
        }

        return $errores;
    }
}
