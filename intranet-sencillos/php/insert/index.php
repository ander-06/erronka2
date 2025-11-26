<?php
header('Content-Type: application/json; charset=utf-8');

// Conexión incluida aquí
$host = '192.168.71.30';
$db   = 'web2erronkabn';
$user = 'root';
$pass = 'Admin123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error conexión: '.$e->getMessage()]);
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    echo json_encode(['success' => false, 'message' => 'Faltan datos']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);

    echo json_encode(['success' => true, 'message' => 'Usuario registrado']);
} 
catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: '.$e->getMessage()]);
}
?>