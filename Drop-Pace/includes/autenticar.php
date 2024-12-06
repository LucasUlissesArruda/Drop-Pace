<?php 

    include_once("conexao.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";

    $resultados = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultados)>0) {
       // header("Location: ../vendas.php");
    }
    else {
        echo mysqli_error($conn);
        header("Location: ../tela-inicial.php?tipo=erro&mensagem= E-mail e/ou Senha Incorretos!");
    }

?>