<!DOCTYPE html>

<?php
require 'lang.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniMyCloud</title>
</head>

<body>
    <header>
        <nav>
            <div>MiniMyCloud</div>
            <div><a href="index.php?lang=<?= $lang ?>"><?= getString("inicio") ?></a></div>
            <div><a href="subir.php?lang=<?= $lang ?>"><?= getString("subir") ?></a></div>
            <div><strong><?= getString("ficheros") ?></strong></div>
        </nav>
        <div id="lang">
            <form action="index.php" method="GET">
                <select name="lang">
                    <option value="es" <?php if ($lang == 'es') { echo 'selected';}?>>Español</option>
                    <option value="en" <?php if ($lang == 'en') { echo 'selected';}?>>English</option>
                </select>
                <input type="submit" value="Ok">
            </form>
        </div>
    </header>

    <main>
        <h1><?= getString("bienvenido")?></h1>
        <h2><?= getString("introduccion") ?></h2>
        <button><a href="subir.php?lang=<?= $lang ?>"><?= getString("empezar") ?></a></button>
    </main>

    <footer>
        <p>© 2022 DWES, Inc.</p>
    </footer>
</body>

</html>
