<?php

session_start();

//hola
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'pruebaphp'
);

if(mysqli_connect_errno()){
    echo 'Conexion fallida: ', mysqli_connect_error();
    exit();
}

?>