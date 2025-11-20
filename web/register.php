<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='index.php'>Inicia sesión</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Registro - Intranet</title><link rel='stylesheet' href='style.css'></head>
<body>
<h2>Registrarse</h2>
<form method='POST'>
Usuario: <input type='text' name='username' required><br>
Contraseña: <input type='password' name='password' required><br>
<button type='submit'>Registrar</button>
</form>
</body>
</html>
