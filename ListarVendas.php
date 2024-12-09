<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Vendas</title>
</head>
<body style="background-color: black;">
    <?php 
        include_once("../Drop-Pace/includes/menu.php");
        include_once("includes/conexao.php");
    ?>

    <section>
        <div class="container text-center">
            <table class="table table-dark table-hover">
                <br><br><br>
                <thead>
                    <tr>
                        <th scope="col">ID Venda</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço Total</th>
                        <th scope="col">Desconto</th>
                        <th scope="col">Frete</th>
                        <th scope="col">Forma de Pagamento</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT vendas.idvendas, vendas.dataVendas, clientes.nomeCliente AS nomeCliente, 
                                produtos.nomeProduto AS nomeProduto, vendaProduto.preco AS precoProduto, 
                                desconto.porcentagem AS descontoDesc, vendas.frete, formapagamento.descPagamento AS descricaoPagamento
                                FROM vendas
                                INNER JOIN clientes ON vendas.idClientes = clientes.idClientes
                                LEFT JOIN desconto ON vendas.idDesconto = desconto.idDesconto
                                INNER JOIN formapagamento ON vendas.idformapagamento = formapagamento.idformaPagamento
                                INNER JOIN vendaProduto ON vendas.idvendas = vendaProduto.idvendas
                                INNER JOIN produtos ON vendaProduto.idprodutos = produtos.idprodutos
                                ORDER BY vendas.idvendas ASC";

                        $resultados = mysqli_query($conn, $sql);

                        while($dados = mysqli_fetch_assoc($resultados)) {
                            // Formatar a data para o formato d/m/Y
                            $dataVendaFormatada = date("d/m/Y", strtotime($dados['dataVendas']));

                            // Calcular o preço total
                            $precoTotal = $dados['precoProduto'] - ($dados['precoProduto'] * ($dados['descontoDesc'] / 100)) + $dados['frete'];

                            // Formatando o preço total como moeda (R$)
                            $precoTotalFormatado = 'R$ ' . number_format($precoTotal, 2, ',', '.');

                            // Formatando o preço do produto e o frete
                            $precoProdutoFormatado = 'R$ ' . number_format($dados['precoProduto'], 2, ',', '.');
                            $freteFormatado = 'R$ ' . number_format($dados['frete'], 2, ',', '.');

                            echo '<tr>
                                    <td>'.$dados['idvendas'].'</td>
                                    <td>'.$dataVendaFormatada.'</td>
                                    <td>'.$dados['nomeCliente'].'</td>
                                    <td>'.$dados['nomeProduto'].'</td>
                                    <td>'.$precoTotalFormatado.'</td> <!-- Exibindo o preço total formatado -->
                                    <td>'.$dados['descontoDesc'].'%</td>
                                    <td>'.$freteFormatado.'</td> <!-- Exibindo o frete formatado -->
                                    <td>'.$dados['descricaoPagamento'].'</td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-warning btn-sm" href="editarVenda.php?idvendas='.$dados['idvendas'].'">Editar</a>
                                        <a class="btn btn-danger btn-sm" href="excluirVenda.php?idvendas='.$dados['idvendas'].'">Excluir</a>
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
