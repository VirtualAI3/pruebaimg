<?php
$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;

$error = '';
$data = '';
$msg='';
if (isset($_FILES['archivo'])) {
    $error="Se cargo el archivo";
    $data=['error' => $error];
} else {
    $error="El archivo no se ha cargado";
    $data=['error' => $error];
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
