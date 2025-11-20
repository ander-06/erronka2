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
        <div class="user-info">
            <span>Hola, <?php echo $_SESSION['username']; ?></span>
            logout.phpCerrar sesión</a>
        </div>
    </nav>

    <header class="header">
        <h1>Ongi etorri Punketsera</h1>
        <p class="subtitle">Zure diruaren etxea.</p>
    </header>

    <section class="intro">
        <h2>Nortzuk gara?</h2>
        <p>Punkets-en, Yassine, Ander, Aritz eta Gaizka gara, zure finantza-beharrei erantzuteko sortutako banka berritzailea. 
        Gure helburua ez da bakarrik zure dirua zaintzea, baita zure etorkizun ekonomikoa seguru eta iraunkorra bihurtzea ere.</p>
    </section>

    <section class="philosophy">
        <h2>Gure Filosofia – Pertsonak lehenik</h2>
        <p>Punketsen, uste dugu bankuek berriro ere pertsonen zerbitzura egon behar dutela. Horregatik, gure bezero bakoitza ez da kontu-zenbaki bat, baizik eta istorio bat, proiektu bat eta amets bat.</p>
        <p>Gure eguneroko lana <strong>konfiantzan</strong>, <strong>gardentasunean</strong> eta <strong>hurbiltasunean</strong> oinarritzen da. 
        Gure asmoa da bezero bakoitzak bere <strong>finantzak</strong> ulertzea, kontrolatzea eta modu <strong>arduratsuan</strong> kudeatzea. 
        Horretarako, aholku pertsonalizatuak, tresna digital modernoen erabilera eta komunikazio zuzena eskaintzen ditugu.</p>
    </section>
</body>
</html>