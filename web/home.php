<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Orri Nagusia</title><link rel='stylesheet' href='style.css'></head>
<body>
<h1>Bienvenido a Punkets Banku</h1>
<p>Hola, <?php echo $_SESSION['username']; ?>!</p>
<p><a href='https://tu-glpi-link'>Ir a GLPI para incidencias</a></p>
<p>Presentación: Punkets Banku es un banco innovador...</p>
<a href='logout.php'>Cerrar sesión</a>
</body>
</html>
