<?php
session_start();

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

// Pegar as formas de pagamento
$sql_formas_pagamento = "SELECT idformaPagamento, descPagamento FROM formapagamento";
$result_formas_pagamento = $conn->query($sql_formas_pagamento);

// Pegar os descontos disponíveis
$sql_descontos = "SELECT iddesconto, porcentagem FROM desconto";
$result_descontos = $conn->query($sql_descontos);

// Processar o envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se os valores foram enviados corretamente
    if (isset($_POST['idDesconto']) && isset($_POST['idformaPagamento'])) {
        $idDesconto = $_POST['idDesconto']; // ID do desconto selecionado
        $idformaPagamento = $_POST['idformaPagamento']; // ID da forma de pagamento

        // Calcular o valor total da compra
        $valorTotalCompra = 0;
        if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
            foreach ($_SESSION['carrinho'] as $item) {
                $valorTotalCompra += $item['preco'] * $item['quantidade'];
            }
        }

        // Calcular o frete
        if ($valorTotalCompra > 1000) {
            $frete = 0; // Frete grátis
        } else {
            $frete = 100; // Frete de R$ 100
        }

        // Inserir a venda (compra) na tabela 'vendas'
        $dataVenda = date('Y-m-d'); // Data da venda
        // Aqui você pode usar um ID fictício para o cliente, caso seja necessário
        $idcliente = 1; // Exemplo de ID de cliente. Ajuste conforme necessário.
        
        $sql_venda = "INSERT INTO vendas (dataVendas, idClientes, idDesconto, idformaPagamento, frete) 
                      VALUES ('$dataVenda', '$idcliente', '$idDesconto', '$idformaPagamento', '$frete')";
        if ($conn->query($sql_venda) === TRUE) {
            // Obter o ID da venda inserida
            $idvenda = $conn->insert_id;

            // Registrar os itens da compra (os produtos no carrinho)
if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    foreach ($_SESSION['carrinho'] as $item) {
        // Gerar um ID aleatório para o produto
        $idProduto = rand(2, 7); // Gera um número aleatório entre 1 e 100 (ajuste conforme necessário)
        $precoTotal = $item['preco'] * $item['quantidade'];

        // Inserir o item na tabela vendaproduto
        $sql_venda_produto = "INSERT INTO vendaproduto (preco, precototal, qtde, idVendas, idprodutos) 
                              VALUES ('{$item['preco']}', '$precoTotal', '{$item['quantidade']}', '$idvenda', '$idProduto')";
        if (!$conn->query($sql_venda_produto)) {
            echo "Erro ao inserir produto: " . $conn->error;
        }
    }
}


            // Após salvar no banco, limpar o carrinho
            unset($_SESSION['carrinho']);
            $sucesso = true; // Variável para indicar sucesso
        } else {
            echo "Erro ao registrar venda: " . $conn->error;
        }
    } else {
        echo "Erro: Campos 'idDesconto' ou 'idformaPagamento' não foram preenchidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações da Venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/bonita.jpg');
            background-size: cover;
        }
        .comeco {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            backdrop-filter: blur(2px);
            border-radius: 50px;
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="comeco">
    <form method="POST" class="container">
        <div class="row content d-flex justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="box">
                    <h3 class="mb-4 text-center fs-1" style="color: black;">Finalize sua Compra</h3>
                    
                    <!-- Campo do Desconto -->
                    <select name="idDesconto" class="form-control" required>
                        <option value="">Selecione um Desconto</option>
                        <?php while($row = $result_descontos->fetch_assoc()) { ?>
                            <option value="<?php echo $row['iddesconto']; ?>"><?php echo $row['porcentagem']; ?>%</option>
                        <?php } ?>
                    </select>

                    <!-- Select para escolher a forma de pagamento -->
                    <select name="idformaPagamento" class="form-control" required>
                        <option value="">Selecione a Forma de Pagamento</option>
                        <?php while($row = $result_formas_pagamento->fetch_assoc()) { ?>
                            <option value="<?php echo $row['idformaPagamento']; ?>"><?php echo $row['descPagamento']; ?></option>
                        <?php } ?>
                    </select>
                    
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-outline-dark btn-custom">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal de Confirmação -->
<?php if (isset($sucesso) && $sucesso): ?>
    <div class="modal fade show" id="modalConfirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Compra Finalizada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sua compra foi finalizada com sucesso! Agradecemos pela sua compra.
                </div>
                <div class="modal-footer">
                    <a href="tela-inicial.php" class="btn btn-secondary">Voltar para a Página Inicial</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
