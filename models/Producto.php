<?php

class Producto
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Obtener todos los productos
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM productos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // Obtener un producto por su ID
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Crear un nuevo producto
    public function create($datos)
    {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $datos['nombre'],
            $datos['descripcion'],
            $datos['precio'],
            $datos['stock']
        ]);
    }

    // Actualizar un producto existente
    public function update($id, $datos)
    {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $datos['nombre'],
            $datos['descripcion'],
            $datos['precio'],
            $datos['stock'],
            $id
        ]);
    }

    // Eliminar un producto por su ID
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
