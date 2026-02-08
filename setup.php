<?php

require __DIR__ . '/config/database.php';

$sql = file_get_contents(__DIR__ . '/database.sql');
$pdo->exec($sql);
echo "Tabla 'productos' creada y 5 productos insertados exitosamente!";
