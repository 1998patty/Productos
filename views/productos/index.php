<?php ob_start(); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Productos</h2>
    <a href="index.php?controller=producto&action=create" class="btn btn-success">+ Nuevo Producto</a>
</div>

<?php if (isset($mensaje)): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?php echo htmlspecialchars($mensaje); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (empty($productos)): ?>
    <div class="alert alert-info">No hay productos registrados.</div>
<?php else: ?>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Fecha de Creacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?php echo $p['id']; ?></td>
                    <td><?php echo htmlspecialchars($p['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($p['descripcion']); ?></td>
                    <td>$<?php echo number_format($p['precio'], 2); ?></td>
                    <td><?php echo $p['stock']; ?></td>
                    <td><?php echo $p['created_at']; ?></td>
                    <td>
                        <a href="index.php?controller=producto&action=edit&id=<?php echo $p['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?controller=producto&action=delete&id=<?php echo $p['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
