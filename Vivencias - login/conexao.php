<?php

$usuario = 'root';
$senha = 'vertrigo';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->error){
    die("Não foi possivel conectar ao banco de dados: " . $mysqli->error);
}