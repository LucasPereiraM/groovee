<?php
    $host = "localhost";
    //$usuario = "root";
    //$senha = '';
    $usuario = "lucas";
    $senha = "root";
    
    $database = "database_groovee";
    $conn = new mysqli($host,$usuario,$senha,$database);

    if($conn->error){
        die("Falha de conexão ao banco de dados: " . $conn->error);
    }

?>