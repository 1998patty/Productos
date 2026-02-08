<?php ob_start(); ?>

<h2 class="mb-3">Crear Nuevo Producto</h2>

<?php if (!empty($errores)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errores as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="index.php?controller=producto&action=store" method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
               value="<?php echo htmlspecialchars($datos['nombre'] ?? ''); ?>" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo htmlspecialchars($datos['descripcion'] ?? ''); ?></textarea>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0.01"
               value="<?php echo htmlspecialchars($datos['precio'] ?? ''); ?>" required>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" min="0"
               value="<?php echo htmlspecialchars($datos['stock'] ?? ''); ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Producto</button>
    <a href="index.php?controller=producto&action=index" class="btn btn-secondary">Cancelar</a>
</form>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
