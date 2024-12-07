<?php
include_once("includes/conexao.php");

if (isset($_GET['idProdutos'])) {
    $sql = "SELECT * FROM produtos WHERE idProdutos = '{$_GET['idProdutos']}'";
    $resultados = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($resultados);

    $idProdutos = $dados['idProdutos'];
    $descricaoProduto = $dados['descricaoProduto'];
    $valor = $dados['valor'];
    $nomeProduto = $dados['nomeProduto'];
    $qtdeEstoque = $dados['qtdeEstoque'];
    $idmarca = $dados['idmarca'];
    $idCategoria = $dados['idCategoria'];
} else {
    $idProdutos = 0;
    $descricaoProduto = "";
    $valor = "";
    $nomeProduto = "";
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
    <title>Adicionar Produto</title>
</head>
<body>
    <?php 
        include_once("../Drop-Pace/includes/menu.php");
    ?> 

    <style>
      .form-container {
            max-width: 500px;
            margin: auto;
            padding: 23px;
            background-color: white;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
  
    <div class="container">
        <br>
        <h4 class="text-center" style="color: white;">Adicionar Produto</h4>
        <br>
        <div class="form-container">
            <form action="includes/salvarProdutos.php" method="POST">

                <input type="hidden" name="idProdutos" value="<?php echo $idProdutos; ?>">

                <?php 
                if (isset($_GET['mensagem'])) {
                    if ($_GET['tipo'] == 'sucesso') {
                        echo '<div class="alert alert-success" role="alert">' . $_GET['mensagem'] . '</div>'; 
                    } else {
                        echo '<div class="alert alert-danger" role="alert">' . $_GET['mensagem'] . '</div>';
                    }
                }
                ?>
                
                <div class="form-group">
                    <label style="color: black; font-size: large;" for="nomeProduto">Nome do Produto</label>
                    <input name="nomeProduto" type="text" value="<?php echo $nomeProduto; ?>" class="form-control" id="nomeProduto" required>

                    <label style="color: black; font-size: large;" for="descricaoProduto">Descrição do Produto</label>
                    <input name="descricaoProduto" type="text" value="<?php echo $descricaoProduto; ?>" class="form-control" id="descricaoProduto" required>

                    <label style="color: black; font-size: large;" for="valor">Valor do Produto</label>
                    <input name="valor" type="number" step="0.01" value="<?php echo $valor; ?>" class="form-control" id="valor" required>

                    <label style="color: black; font-size: large;" for="qtdeEstoque">Quantidade em Estoque</label>
                    <input name="qtdeEstoque" type="number" value="<?php echo $qtdeEstoque; ?>" class="form-control" id="qtdeEstoque" required>

                    <label style="color: black; font-size: large;" for="idmarca">Marca</label>
                    <select name="idmarca" class="form-control" id="idmarca" required>
                        <option value="">Selecione a Marca</option>
                        <!-- Supondo que as marcas estejam armazenadas no banco -->
                        <?php
                        $sqlMarca = "SELECT * FROM marca";
                        $resultMarca = mysqli_query($conn, $sqlMarca);
                        while ($marca = mysqli_fetch_assoc($resultMarca)) {
                            $selected = ($marca['idmarca'] == $idmarca) ? 'selected' : '';
                            echo "<option value='{$marca['idmarca']}' $selected>{$marca['descricao']}</option>";
                        }
                        ?>
                    </select>

                    <label style="color: black; font-size: large;" for="idCategoria">Categoria</label>
                    <select name="idCategoria" class="form-control" id="idCategoria" required>
                        <option value="">Selecione a Categoria</option>
                        <!-- Supondo que as categorias estejam armazenadas no banco -->
                        <?php
                        $sqlCategoria = "SELECT * FROM categoria";
                        $resultCategoria = mysqli_query($conn, $sqlCategoria);
                        while ($categoria = mysqli_fetch_assoc($resultCategoria)) {
                            $selected = ($categoria['idCategoria'] == $idCategoria) ? 'selected' : '';
                            echo "<option value='{$categoria['idCategoria']}' $selected>{$categoria['descricao']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button class="btn btn-primary btn-custom">Salvar Produto</button>
            </form>
        </div>
    </div>
</body>
</html>
