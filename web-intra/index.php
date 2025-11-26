<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            $error = "❌ Contraseña incorrecta.";
        }
    } else {
        $error = "❌ Usuario no encontrado.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<title>Login - Intranet</title>
<link rel='stylesheet' href='auth.css'>
</head>
<body>
<div class='auth-container'>
<h2>Iniciar Sesión</h2>
<?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
<form method='POST'>
<input type='text' name='username' placeholder='Usuario' required>
<input type='password' name='password' placeholder='Contraseña' required>
<button type='submit'>Entrar</button>
</form>
<p><a href='register.php'>¿No tienes cuenta? Regístrate</a></p>
</div>
</body>
</html>
