<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login - Intranet</title><link rel='stylesheet' href='style.css'></head>
<body>
<h2>Iniciar Sesión</h2>
<form method='POST'>
Usuario: <input type='text' name='username' required><br>
Contraseña: <input type='password' name='password' required><br>
<button type='submit'>Entrar</button>
</form>
<a href='register.php'>¿No tienes cuenta? Regístrate</a>
</body>
</html>
