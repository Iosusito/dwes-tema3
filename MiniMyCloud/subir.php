<!DOCTYPE html>

<?php
require "lang.php";

$validExtensions = ['application/pdf', 'image/gif', 'image/png', 'image/jpeg'];

$nombreVacio = false;

if ($_POST) {
    // Miramos nombre
    if (isset($_POST['file_name'])) {
        $file_name = $_POST['file_name'];

        //se sanea el nombre
        $file_name_saneado = htmlspecialchars(trim($file_name));

        //se valida el nombre (que no esté vacío)
        if (mb_strlen($file_name_saneado) == 0) {
            $nombreVacio = true;
        }
    } else {
        $nombreVacio = true;
    }

    // Miramos fichero
    if (
        $_FILES && isset($_FILES['file']) &&
        $_FILES['file']['error'] === UPLOAD_ERR_OK &&
        $_FILES['file']['size'] > 0
    ) {
        $file = $_FILES['file'];

        //extension valida?
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file['tmp_name']);
        if (in_array($mime_type, $validExtensions)) {

            if (!$nombreVacio) {

                //nombre repetido??
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $nombreFichero = $file_name_saneado . '.' . $extension;
                if (!file_exists('./files/' . $nombreFichero)) {

                    //subimos el fichero
                    $rutaFicheroDestino = './files/' . $nombreFichero;
                    $ficheroSubido = move_uploaded_file($file['tmp_name'], $rutaFicheroDestino); //true o false
                } else {
                    //nombre repetido
                    $nombreRepetido = true;
                }
            }
        } else {
            //extension no valida
            $extensionNoValida = true;
        }
    } else {
        //no hay fichero
        $ficheroNoEnviado = true;
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
            <div><strong><?= getString("subir") ?></strong></div>
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
        <h1><?= getString("subir_cabecera") ?></h1>

        <?php if (isset($ficheroSubido) && $ficheroSubido) { ?>
            <!-- El fichero se ha subido sin ningún problema -->
            <p><?= $nombreFichero . ': ' . getString("subida_correcta") ?></p>
            <p><a href="subir.php?lang=<?= $lang ?>"><?= getString("subir_otro") ?></a></p>
        <?php } else { ?>
            <!-- El formulario -->
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="file_name"><?= getString("fichero_nombre") ?></label>
                    <input type="text" name="file_name" <?php if (isset($_POST['file_name'])) {
                                                            echo "value=\"$file_name_saneado\"";
                                                        } ?>>
                    <?php if (isset($nombreVacio) && $nombreVacio) { ?>
                        <p id="error_nombre_vacio"><?= getString("error_campo_vacio") ?></p>
                    <?php }
                    if (isset($nombreRepetido) && $nombreRepetido) { ?>
                        <p id="error_nombre_rep"><?= getString("error_nombre_rep") ?></p>
                    <?php } ?>
                </div>
                <div>
                    <label for="file"><?= getString("fichero_selec") ?></label>
                    <input type="file" name="file">
                    <?php if (isset($ficheroNoEnviado) && $ficheroNoEnviado) { ?>
                        <p id="error_fichero_vacio"><?= getString("error_campo_vacio") ?></p>
                    <?php }
                    if (isset($extensionNoValida) && $extensionNoValida) { ?>
                        <p id="error_extension_invalida"><?= getString("error_extension_invalida") ?></p>
                    <?php } ?>
                </div>
                <input type="submit" value="<?= getString("subir_fichero") ?>">
            </form>
        <?php } ?>

    </main>

    <footer>
        <p>© 2022 DWES, Inc.</p>
    </footer>
</body>

</html>
