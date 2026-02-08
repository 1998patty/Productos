<?php

$host = 'shortline.proxy.rlwy.net';
$port = '21110';
$dbname = 'railway';
$user = 'root';
$password = 'JTupbxHtbedMRwlDjdOUTeGnDGMzqpAD';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    die("Error de conexion: " . $e->getMessage());
}
