<?php
// Inicia a sessão
session_start();
// Adicionar produto ao carrinho
if (isset($_GET['nome']) && isset($_GET['preco']) && isset($_GET['quantidade'])) {
    $produto = [
        'nome' => $_GET['nome'],
        'preco' => floatval(str_replace(['R$', ','], ['', '.'], $_GET['preco'])),
        'quantidade' => intval($_GET['quantidade']),
        'tamanho' => $_GET['tamanho'],
    ];
    
    // Se o carrinho ainda não existe, cria um array vazio
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
    
    // Adiciona o produto ao carrinho
    $_SESSION['carrinho'][] = $produto;
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



include_once("../Drop-Pace/includes/menu.php");
?> 

     <script>
        nav {
        padding: 15px 20px;
        color: white;
        font-size: 18px;
        text-align: center;
        width: 100%;
    }
     </script>

<!DOCTYPE html>
<html lang="en">
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
                        echo "<tr >
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
        <button id="finalizarCompra" class="btn btn-outline-success btn-lg" onclick="window.location.href='informacoes.php';">Finalizar Compra</button>

            <a href="?clear=1" class="btn btn-outline-danger btn-lg">Limpar Carrinho</a>
        </div>

        

        <h3 class="text-center mt-4">Total: R$ <?= isset($_SESSION['carrinho']) ? number_format(calcularTotal($_SESSION['carrinho']), 2, ',', '.') : '0,00' ?></h3>
    </div>

    <script>

    </script>
</body>
</html>
