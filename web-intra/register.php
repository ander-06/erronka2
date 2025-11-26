<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $checkUser = $conn->prepare("SELECT id FROM usuarios WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        $error = "❌ El usuario ya está registrado.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            $success = "✅ Registro exitoso. <a href='index.php'>Inicia sesión</a>";
        } else {
            $error = "❌ Error al registrar.";
        }
        $stmt->close();
    }
    $checkUser->close();
}
?>
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<title>Registro - Intranet</title>
<link rel='stylesheet' href='auth.css'>
</head>
<body>
<div class='auth-container'>
<h2>Registrarse</h2>
<?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
<?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
<form method='POST'>
<input type='text' name='username' placeholder='Usuario' required>
<input type='password' name='password' placeholder='Contraseña' required>
<button type='submit'>Registrar</button>
</form>
<p><a href='index.php'>¿Ya tienes cuenta? Inicia sesión</a></p>
</div>
</body>
</html>
