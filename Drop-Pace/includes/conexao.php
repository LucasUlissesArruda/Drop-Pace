<?php 

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "drop-pace";

    $conn = mysqli_connect($host, $user, $password, $database);

    if(!$conn){
        echo "A conexão Falhou. Erro: ". mysqli_connect_error();
    }

?>