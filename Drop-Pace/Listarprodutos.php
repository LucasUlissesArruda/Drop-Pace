<?php

  include_once("includes/conexao.php");

  if(isset($_GET['idProdutos'])){
    $sql = "SELECT * FROM produtos WHERE idProdutos = '{$_GET['idProdutos']}'";
    $resultados = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($resultados);

    $idProdutos = $dados['idProdutos'];
    $nomeProduto = $dados['nomeProduto'];
    $descricaoProduto = $dados['descricaoProduto'];
    $valor = $dados['valor'];
    $qtdeEstoque = $dados['qtdeEstoque'];
    $idmarca = $dados['idmarca'];
    $idCategoria = $dados['idCategoria'];
  } else {
    $idProdutos = 0;
    $nomeProduto = "";
    $descricaoProduto = "";
    $valor = "";
    $qtdeEstoque = "";
    $idmarca = "";
    $idCategoria = "";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Produtos</title>
</head>
<body style="background-color: black;">
    <?php 
        include_once("../Drop-Pace/includes/menu.php")
    ?>  

    <section>
    <div class="container text-center">
        <table class="table table-dark table-hover">
            <br><br><br>
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Estoque</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Editar/Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php 

                include_once("includes/conexao.php");

                $sql = "SELECT produtos.idProdutos, produtos.nomeProduto, produtos.descricaoProduto, produtos.valor, 
                               produtos.qtdeEstoque, marca.descricao AS marca, categoria.descricao AS categoria
                        FROM produtos
                        LEFT JOIN marca ON produtos.idmarca = marca.idmarca
                        LEFT JOIN categoria ON produtos.idCategoria = categoria.idCategoria
                        ORDER BY produtos.idProdutos ASC";

                $resultados = mysqli_query($conn, $sql);

                while($dados = mysqli_fetch_assoc($resultados)) {
                    echo '<tr>
                            <td>'.$dados['idProdutos'].'</td>
                            <td>'.$dados['nomeProduto'].'</td>
                            <td>'.$dados['descricaoProduto'].'</td>
                            <td>R$ '.$dados['valor'].'</td>
                            <td>'.$dados['qtdeEstoque'].'</td>
                            <td>'.$dados['marca'].'</td>
                            <td>'.$dados['categoria'].'</td>
                            <td style="text-align: center;">
                                <a class="btn btn-warning btn-sm" href="cadastrarProdutos.php?idProdutos='.$dados['idProdutos'].'">Editar</a>
                                <a class="btn btn-danger btn-sm" href="includes/excluirProdutos.php?idProdutos='.$dados['idProdutos'].'">Excluir</a>
                            </td>
                          </tr>';
                }

            ?>
            </tbody>
        </table>
    </div>
    </section>

</body>
</html>
