<?php
// Inicia a sessão
session_start();

// Adicionar produto ao carrinho
if (isset($_GET['nome'], $_GET['preco'], $_GET['quantidade'], $_GET['tamanho'])) {
    // Valida os parâmetros recebidos
    $produto = [
        'nome' => htmlspecialchars($_GET['nome']), // Protege contra injeção de HTML
        'preco' => floatval(str_replace(['R$', ','], ['', '.'], $_GET['preco'])), // Preço convertido para float
        'quantidade' => intval($_GET['quantidade']), // Quantidade convertida para inteiro
        'tamanho' => htmlspecialchars($_GET['tamanho']) // Tamanho
    ];

    // Valida se a quantidade e o preço são válidos
    if ($produto['quantidade'] <= 0 || $produto['preco'] <= 0) {
        echo "<script>alert('Quantidade ou preço inválido.');</script>";
    } else {
        // Se o carrinho ainda não existe, cria um array vazio
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Adiciona o produto ao carrinho
        $_SESSION['carrinho'][] = $produto;
    }
}

// Função para calcular o total
function calcularTotal($carrinho) {
    $total = 0;
    foreach ($carrinho as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }
    return $total;
}

// Caso queira limpar o carrinho
if (isset($_GET['clear']) && $_GET['clear'] == '1') {
    unset($_SESSION['carrinho']);
}

// Verifica se a compra foi finalizada
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Dados de venda
    $idDesconto = $_POST['idDesconto']; // ID do desconto selecionado
    $idformaPagamento = $_POST['idformaPagamento']; // ID da forma de pagamento

    // Conectar ao banco de dados
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'drop-pace';
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Verifique se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserir a venda (compra) na tabela 'vendas'
    $dataVenda = date('Y-m-d'); // Data da venda
    $idcliente = 1; // Exemplo de ID de cliente. Ajuste conforme necessário.

    $sql_venda = "INSERT INTO vendas (dataVendas, idClientes, idDesconto, idformaPagamento) 
                  VALUES ('$dataVenda', '$idcliente', '$idDesconto', '$idformaPagamento')";

    if ($conn->query($sql_venda) === TRUE) {
        // Obter o ID da venda inserida
        $idvenda = $conn->insert_id;

        // Registrar os itens da compra (os produtos no carrinho)
        if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
            foreach ($_SESSION['carrinho'] as $item) {
                // Certifique-se de que o campo correto está sendo usado
                $idProduto = isset($item['idProduto']) ? $item['idProduto'] : null; // Ajuste o índice aqui

                if ($idProduto) { // Insere apenas se o idProduto existir
                    $precoTotal = $item['preco'] * $item['quantidade'];
                    $sql_venda_produto = "INSERT INTO vendaproduto (preco, precototal, qtde, idVendas, idprodutos) 
                                          VALUES ('{$item['preco']}', '$precoTotal', '{$item['quantidade']}', '$idvenda', '$idProduto')";
                    if (!$conn->query($sql_venda_produto)) {
                        echo "Erro ao inserir produto: " . $conn->error;
                    }
                } else {
                    echo "Erro: Produto inválido no carrinho.";
                }
            }
        }

        // Após salvar no banco, limpar o carrinho
        unset($_SESSION['carrinho']);
        $sucesso = true; // Variável para indicar sucesso
    } else {
        echo "Erro ao registrar venda: " . $conn->error;
    }
}

include_once("../Drop-Pace/includes/menu.php");
?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: black; color: white;">
    <div class="container my-5">
        <h1 class="text-center mb-4">Carrinho de Compras</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr style="color: white;">
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Tamanho</th>
                    <th>Preço Total</th>
                </tr>
            </thead>
            <tbody style="color: white;">
                <?php
                // Verifica se o carrinho existe e tem produtos
                if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
                    foreach ($_SESSION['carrinho'] as $item) {
                        echo "<tr>
                                <td>{$item['nome']}</td>
                                <td>{$item['quantidade']}</td>
                                <td>{$item['tamanho']}</td>
                                <td>R$ " . number_format($item['preco'] * $item['quantidade'], 2, ',', '.') . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Carrinho vazio</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <button id="finalizarCompra" class="btn btn-outline-success btn-lg" data-bs-toggle="modal" data-bs-target="#confirmarModal">Finalizar Compra</button>
            <a href="?clear=1" class="btn btn-outline-danger btn-lg">Limpar Carrinho</a>
        </div>

        <h3 class="text-center mt-4">Total: R$ <?= isset($_SESSION['carrinho']) ? number_format(calcularTotal($_SESSION['carrinho']), 2, ',', '.') : '0,00' ?></h3>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmarModal" tabindex="-1" aria-labelledby="confirmarModalLabel" aria-hidden="true" style="color: black;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarModalLabel">Confirmar Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="color: black;">
                    Você está prestes a finalizar sua compra. Deseja continuar?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="informacoes.php">
                        <button type="submit" class="btn btn-outline-dark">Confirmar</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
