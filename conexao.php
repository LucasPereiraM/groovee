<?php
    $host = "localhost";
    $usuario = "root";
    $senha = '';
    $database = "login";
    $conn = new mysqli($host,$usuario,$senha,$database);

    if($conn->error){
        die("Falha de conexão ao banco de dados: " . $mysqli->error);
    }
?>