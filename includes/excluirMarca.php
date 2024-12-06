<?php 

    include_once("conexao.php");

    $idmarca = $_GET['idmarca'];

    $sql = "DELETE FROM marca WHERE idmarca = '$idmarca'";

    if(mysqli_query($conn, $sql)){
        header("Location: ../Listarmarcas.php?tipo=sucesso&mensagem=Marca Excluida com Sucesso!!");
    }
    else{
        header("Location: ../Listarmarcas.php?tipo=erro&mensagem=Erro ao excluir Marca!!");
    }

?>