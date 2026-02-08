-- ============================================
-- Base de datos: railway
-- Tabla: productos
-- ============================================

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- Datos de ejemplo (5 productos)
-- ============================================

INSERT INTO productos (nombre, descripcion, precio, stock) VALUES
('Laptop HP Pavilion', 'Laptop HP Pavilion 15.6 pulgadas, 8GB RAM, 256GB SSD', 12999.99, 15),
('Mouse Logitech G203', 'Mouse gamer Logitech G203 con iluminacion RGB', 499.00, 50),
('Teclado Mecanico Redragon', 'Teclado mecanico Redragon Kumara RGB, switches blue', 899.50, 30),
('Monitor Samsung 24"', 'Monitor Samsung 24 pulgadas Full HD IPS 75Hz', 3499.00, 10),
('Audifonos Sony WH-1000XM4', 'Audifonos inalambricos Sony con cancelacion de ruido', 5999.99, 20);
