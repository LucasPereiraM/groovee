<?php
    $host = "localhost";
    $usuario = "root";
    $senha = '';
    
    $database = "login";
    $conn = new mysqli($host,$usuario,$senha,$database);

    $databaseMusic = "dadosmusica";
    $connMusic = new mysqli($host,$usuario, $senha,$databaseMusic);

    if($conn->error || $connMusic->error){
        die("Falha de conexão ao banco de dados: " . $mysqli->error);
    }

?>