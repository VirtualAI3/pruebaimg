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
print json_encode($data, JSON_UNESCAPED_UNICODE);
