<?php
  include_once("includes/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Avaliações</title>
</head>
<body style="background-color: black;">
    <?php 
        include_once("../Drop-Pace/includes/menu.php");
    ?>

    <section>
    <div class="container text-center">
        <table class="table table-dark table-hover">
            <br><br><br>
            <thead>
                <tr>
                  <th scope="col">ID Avaliação</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Nota</th>
                  <th scope="col">Observação</th>
                  <th scope="col">Editar/Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                // Consulta com JOIN para trazer o nome do produto
                $sql = "SELECT produtoavali.idprodutoAvali, produtos.nomeProduto, produtoavali.nota, produtoavali.observacao
                        FROM produtoavali
                        INNER JOIN produtos ON produtoavali.idproduto = produtos.idProdutos
                        ORDER BY produtoavali.idprodutoAvali ASC";
                $resultados = mysqli_query($conn, $sql);

                while($dados = mysqli_fetch_assoc($resultados)) {
                    echo '<tr>
                            <td>'.$dados['idprodutoAvali'].'</td>
                            <td>'.$dados['nomeProduto'].'</td>
                            <td>'.$dados['nota'].'</td>
                            <td>'.$dados['observacao'].'</td>
                            <td style="text-align: center;">
                                <a class="btn btn-warning btn-sm" href="editarAvaliacao.php?idprodutoAvali='.$dados['idprodutoAvali'].'">Editar</a>
                                <a class="btn btn-danger btn-sm" href="excluirAvaliacao.php?idprodutoAvali='.$dados['idprodutoAvali'].'">Excluir</a>
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
