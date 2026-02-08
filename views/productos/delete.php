<?php ob_start(); ?>

<h2 class="mb-3">Eliminar Producto</h2>

<div class="card border-danger">
    <div class="card-body">
        <h5 class="card-title text-danger">¿Estas seguro de que deseas eliminar este producto?</h5>

        <table class="table table-bordered mt-3">
            <tr>
                <th>ID</th>
                <td><?php echo $producto['id']; ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
            </tr>
            <tr>
                <th>Stock</th>
                <td><?php echo $producto['stock']; ?></td>
            </tr>
        </table>

        <form action="index.php?controller=producto&action=destroy&id=<?php echo $producto['id']; ?>" method="POST">
            <button type="submit" class="btn btn-danger">Si, Eliminar</button>
            <a href="index.php?controller=producto&action=index" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
