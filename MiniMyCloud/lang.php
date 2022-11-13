<?php
$lang_opts = ['es', 'en'];

$lang = $_GET && isset($_GET['lang']) && in_array($_GET['lang'], $lang_opts) ? $_GET['lang'] : "es";

$strings = [
    'inicio' => [
        'es' => 'Inicio',
        'en' => 'Home'
    ],
    'subir' => [
        'es' => 'Subir',
        'en' => 'Upload'
    ],
    'ficheros' => [
        'es' => 'Ficheros',
        'en' => 'Files'
    ],
    'bienvenido' => [
        'es' => 'Bienvenido a MiniMyCloud',
        'en' => 'Welcome to MiniMyCloud'
    ],
    'introduccion' => [
        'es' => 'Desde aquí puedes administrar tus ficheros',
        'en' => 'You can administrate your files from here'
    ],
    'empezar' => [
        'es' => 'Empieza a subir ficheros',
        'en' => 'Start uploading files'
    ],
    'subir_cabecera' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images'
    ],
    'fichero_nombre' => [
        'es' => 'Nombre del fichero:',
        'en' => 'File name:'
    ],
    'fichero_selec' => [
        'es' => 'Selecciona un fichero:',
        'en' => 'Select a file:'
    ],
    'subir_fichero' => [
        'es' => 'Subir fichero',
        'en' => 'Upload file'
    ],
    'error_campo_vacio' => [
        'es' => 'Error: Este campo no puede estar vacío',
        'en' => 'Error: This field cannot be empty'
    ],
    'error_nombre_rep' => [
        'es' => 'Error: Ya existe un fichero con este nombre',
        'en' => 'Error: There already exists a file with such name'
    ],
    'error_extension_invalida' => [
        'es' => 'Extensión de fichero no soportada',
        'en' => 'File extension not supported'
    ],
    'subida_correcta' => [
        'es' => 'Fichero subido correctamente',
        'en' => 'File successfully uploaded'
    ],
    'subir_otro' => [
        'es' => 'Subir otro fichero',
        'en' => 'Upload another file'
    ],
    'ficheros' => [
        'es' => 'Tus ficheros',
        'en' => 'Your files'
    ],
    'sin_ficheros' => [
        'es' => 'No hay ningún fichero subido',
        'en' => 'There are no uploaded files'
    ],
    'imagenes' => [
        'es' => 'Tus imágenes',
        'en' => 'Your images'
    ],
    'sin_imagenes' => [
        'es' => 'No hay ninguna imagen subida',
        'en' => 'There are no uploaded images'
    ]
];

function getString(string $id): string
{
    global $lang, $strings;

    if (isset($strings[$id])) {
        return $strings[$id][$lang];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}
