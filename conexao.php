<?php
    $host = "localhost";
    $usuario = "root";
    $senha = '';
    $database = "dadoslogin";
    $mysqli = new mysqli($host,$usuario,$senha,$database);

    if($mysqli->error){
        die("Falha de conexão ao banco de dados: " . $mysqli->error);
    }
    echo "Conexão estabelecida com sucesso!";
?>