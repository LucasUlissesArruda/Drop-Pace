<?php 

include_once("conexao.php");

$idclientes  = isset($_POST['idclientes']) ? $_POST['idclientes'] : 0; 
$nomeCliente = $_POST['nomeCliente'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cep = $_POST['cep'];

if ($idclientes == 0) { 
    $sql2 = "SELECT * FROM clientes WHERE cpf = '$cpf'";
    $resultados = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($resultados) > 0) {
        header("Location: ../CriarConta.php?tipo=erro&mensagem=Este cliente (CPF) já existe.");
    } else {
        $sql = "INSERT INTO clientes (nomeCliente, cpf, endereco, senha, email, cep)
                VALUES ('$nomeCliente', '$cpf', '$endereco', '$senha', '$email', '$cep')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../login.php?tipo=sucesso&mensagem=Cliente Cadastrado com Sucesso!");
        } else {
            header("Location: ../CriarConta.php?tipo=erro&mensagem=Cliente Não foi Cadastrado!");
        }
    }
} else { 
    $sql = "UPDATE clientes SET 
            nomeCliente = '$nomeCliente', 
            cpf = '$cpf', 
            endereco = '$endereco', 
            senha = '$senha', 
            email = '$email',
            cep = '$cep' 
            WHERE idclientes = '$idclientes'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../tela-inicial.php?tipo=sucesso&mensagem=Cliente Atualizado com Sucesso!");
    } else {
        header("Location: ../lista.Clientes.php?tipo=erro&mensagem=Cliente Não foi Atualizado!");
    }
}

mysqli_close($conn);

?>
