<!DOCTYPE html>

<?php
require 'lang.php';

$todosFicheros = scandir('./files');
$extensionesPermitidas = ['pdf', 'gif', 'png', 'jpeg'];
$ficheros = [];
$imagenes = [];
if ($todosFicheros !== false) {
    foreach ($todosFicheros as $fic) {
        $extension = pathinfo($fic, PATHINFO_EXTENSION);
        if (in_array($extension, $extensionesPermitidas)) {
            switch ($extension) {
                case 'pdf':
                    $ficheros[] = $fic;
                    break;
                default:
                    $imagenes[] = $fic;
                    break;
            }
        }
    }
}
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
            <div><a href="cloud.php?lang=<?= $lang ?>"><?= getString("ficheros") ?></a></div>
        </nav>
        <div id="lang">
            <form action="#" method="GET">
                <select name="lang">
                    <option value="es" <?php if ($lang == 'es') {
                                            echo 'selected';
                                        } ?>>Español</option>
                    <option value="en" <?php if ($lang == 'en') {
                                            echo 'selected';
                                        } ?>>English</option>
                </select>
                <input type="submit" value="Ok">
            </form>
        </div>
    </header>

    <main>
        <h1><?= getString("ficheros") ?></h1>
        <?php if ($ficheros) {
            echo '<ul>';
            for ($i = 0; $i < sizeof($ficheros); $i++) { ?>
                <li><a href="./files/<?= $ficheros[$i] ?>" download><?= $ficheros[$i] ?></a></li>
            <?php }
            echo '</ul>'; ?>
        <?php } else { ?>
            <p><?= getString("sin_ficheros") ?></p>
        <?php } ?>

        <h1><?= getString("imagenes") ?></h1>
        <?php if ($imagenes) {
            for ($i = 0; $i < sizeof($imagenes); $i++) { ?>
                <img src="./files/<?= $imagenes[$i] ?>" alt="imagen" style="width: 95vw;">
            <?php }
        } else { ?>
            <p><?= getString("sin_imagenes") ?></p>
        <?php } ?>
    </main>

    <footer>
        <p>© 2022 DWES, Inc.</p>
    </footer>

</body>

</html>

<!-- foreach ($ficherosTxt as $fic) {
    echo "$fic\n";
} -->