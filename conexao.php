<?php
    $host = "localhost";
    $usuario = "lucas";
    $senha = 'root';
    
    $database = "login";
    $conn = new mysqli($host,$usuario,$senha,$database);

    $databaseMusic = "dtbmusic";
    $connMusic = new mysqli($host,$usuario,$senha,$databaseMusic);

    if($conn->error || $connMusic->error){
        die("Falha de conexão ao banco de dados: " . $conn->error . "<br>" . $connMusic->error);
    }

?>