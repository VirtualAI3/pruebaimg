<?php
$archivo = (isset($_FILES['image'])) ? $_FILES['image'] : null;

$error = '';
$data = '';
$msg='';
$estado=false;
if (isset($_FILES['image'])) {
    $error="Se cargo el archivo";
    $estado=true;
    $data=['error' => $error,'estado' => $estado];
} else {
    $error="El archivo no se ha cargado";
    $estado=false;
    $data=['error' => $error,'estado' => $estado];
}
$file = $_FILES["image"]["name"]; //Nombre de nuestro archivo

$url_temp = $_FILES["image"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

//dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
$url_insert = dirname(__FILE__) . "/images"; //Carpeta donde subiremos nuestros archivos

//Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

//Si la carpeta no existe, la creamos
if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

//movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
if (move_uploaded_file($url_temp, $url_target)) {
    echo "El archivo ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
