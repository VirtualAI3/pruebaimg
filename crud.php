<?php
$archivo = (isset($_FILES['image'])) ? $_FILES['image'] : null;

$error = '';
$data = '';
$msg='';
$estado=false;
$estadoDeCarga='';
if (isset($_FILES['image'])) {
    $error="Se cargo el archivo";
    $estado=true;
    $ruta_temporal = $_FILES['image']['tmp_name'];

    // Obtener información de la imagen
    $info = getimagesize($ruta_temporal);
    $tipo = $info['mime'];

    // Crear una imagen a partir del archivo temporal
    $msg=$info;
} else {
    $error="El archivo no se ha cargado";
    $estado=false;
} 
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // El archivo se cargó correctamente
    $estadoDeCarga='1';
} elseif ($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
    // No se seleccionó ningún archivo
    $estadoDeCarga='2';
} elseif ($_FILES['image']['error'] === UPLOAD_ERR_INI_SIZE || $_FILES['image']['error'] === UPLOAD_ERR_FORM_SIZE) {
    // El archivo excede el tamaño máximo permitido
    $estadoDeCarga='3';
} else {
    // Otro error durante la carga del archivo
    $estadoDeCarga='4';
}
$data=['error' => $error,'estado' => $estado,'estadoDeCarga' => $estadoDeCarga,'msg'=>$msg];
/*$file = $_FILES["image"]["name"]; //Nombre de nuestro archivo

$url_temp = $_FILES["image"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

//dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
$url_insert = dirname(__FILE__) . "/images"; //Carpeta donde subiremos nuestros archivos

//Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

//movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
if (move_uploaded_file($url_temp, $url_target)) {
    echo "El archivo ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}*/
print json_encode($data, JSON_UNESCAPED_UNICODE);
