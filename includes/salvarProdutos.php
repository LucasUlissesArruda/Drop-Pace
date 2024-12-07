<?php 

    include_once("conexao.php");

    $idProdutos = $_POST ['idProdutos'];

    $descricaoProduto = $_POST ['descricaoProduto'];
    $valor = $_POST ['valor'];
    $nomeProduto = $_POST ['nomeProduto'];
    $qtdeEstoque = $_POST ['qtdeEstoque'];

    $idmarca = $_POST ['idmarca'];
    $idCategoria = $_POST ['idCategoria'];


    if ($idProdutos == 0){
        
        $sql2 = "SELECT * FROM produtos WHERE nomeProduto = '$nomeProduto'";
        $resultados = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($resultados)>0){
            header("Location: ../cadastrarProdutos.php?tipo=erro&mensagem= Produto já exixte.");
        } else {
        
            $sql = "INSERT INTO produtos (descricaoProduto,valor,nomeProduto,qtdeEstoque,idmarca,idCategoria  )
                VALUES ('$descricaoProduto','$valor','$nomeProduto','$qtdeEstoque','$idmarca','$idCategoria')";

            if(mysqli_query($conn, $sql)){
                header("Location: ../listarProdutos.php?tipo=sucesso&mensagem= Salvo com Sucesso!");
            }else{
                header("Location: ../listarProdutos.php?tipo=erro&mensagem= Erro ao Salvar!");
            }
        }
        
    } else { // Atualiza um produto existente
        $sql = "UPDATE produtos 
                SET descricaoProduto = '$descricaoProduto', 
                    valor = '$valor', 
                    nomeProduto = '$nomeProduto', 
                    qtdeEstoque = '$qtdeEstoque', 
                    idmarca = '$idmarca', 
                    idCategoria = '$idCategoria'
                WHERE idProdutos = '$idProdutos'";
    
        if (mysqli_query($conn, $sql)) {
            header("Location: ../listarProdutos.php?tipo=sucesso&mensagem=Produto atualizado com sucesso!");
        } else {
            header("Location: ../listarProdutos.php?tipo=erro&mensagem=Erro ao atualizar o produto!");
        }
    }

    mysqli_close($conn);

?>