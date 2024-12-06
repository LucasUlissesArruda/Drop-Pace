<?php 

    include_once("conexao.php");

    $idmarca  = $_POST['idmarca'];
    $descricao = $_POST['descricao'];


    if ($idmarca == 0){
        
        $sql2 = "SELECT * FROM marca WHERE descricao = '$descricao'";
        $resultados = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($resultados)>0){
            header("Location: ../cadastrarMarca.php?tipo=erro&mensagem= Marca já exixte.");
        } else {
        
            $sql = "INSERT INTO marca (descricao )
                VALUES ('$descricao')";

            if(mysqli_query($conn, $sql)){
                header("Location: ../listarmarcas.php?tipo=sucesso&mensagem= Salvo com Sucesso!");
            }else{
                header("Location: ../listarmarcas.php?tipo=erro&mensagem= Erro ao Salvar!");
            }
        }
        
    } else {

        $sql = "UPDATE marca SET descricao = '$descricao'
                WHERE idmarca = '$idmarca'";
                
                if(mysqli_query($conn, $sql)){
                    header("Location: ../listarmarcas.php?tipo=sucesso&mensagem= Marca Atualizada com Sucesso!");
                }else{
                    header("Location: ../listarmarcas.php?tipo=erro&mensagem=  Marca Não foi Atualizada!");
                }
    }

    mysqli_close($conn);

?>