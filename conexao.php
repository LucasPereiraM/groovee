<?php
    $host = "localhost";
    $usuario = "root";
    $senha = '';
    $database = "dadoslogin";
    $conn = new mysqli($host,$usuario,$senha,$database);

    if($conn->error){
        die("Falha de conexão ao banco de dados: " . $mysqli->error);
    }
?>