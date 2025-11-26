<?php
$host = "192.168.71.30";
$user = "root";
$pass = "Admin123";
$db = "web2erronkabn";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
