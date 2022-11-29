<?php
    $host = "localhost";
    $user = "root";
    $password = "root";
    $db_name = "dadoslogin";

    $con = mysqli_connect($host,$password,$db_name);

    if(mysqli_connect_error()){
        die("Falha de conexão ao banco de dados: " . mysqli_connect_error());
    }
    echo "Conectado com sucesso!";

?>