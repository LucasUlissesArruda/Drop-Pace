<?php 
    include_once("conexao.php");

    session_start();

    // Captura os dados do formulário corretamente
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);


    // Consulta SQL para verificar o email e senha
    $query = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Captura os dados do usuário
        $dados = mysqli_fetch_assoc($result);

        // Salvando informações do usuário na sessão
        $_SESSION['idUsuarioLogado'] = $dados['idclientes'];
        $_SESSION['nomeUsuarioLogado'] = $dados['nomeCliente'];

        $_SESSION['NivelUsuarioLogado'] = $dados['TipoUsuario'];

        // Redireciona para a página principal (home)
        header("Location: ../tela-inicial.php");
    } else {
        // Redireciona de volta para a página de login com uma mensagem de erro
        header("Location: ../login.php?tipo=erro&msg=Login e/ou senha inválidos!");
    }
?>