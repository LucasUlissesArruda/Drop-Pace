<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>
    <?php 
        include_once("../Drop-Pace/includes/menu.php")
    ?> 

<div class="container">
        <br><br><br><br>
        <h4 style="text-align: center; color: white;">Selecione o'que deseja fazer</h4>

        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-4">
                    <br><br>
                    <h4 style="text-align: center; color: white;">Cadastrar Produtos</h4>
                    <br><br>
                    <a href="cadastrarProdutos.php">
                        <button style="margin-left: 268px;"  class="btn btn-outline-light">Cadastrar</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <br><br>
                    <h4 style="text-align: center; color: white;">Listar Produtos</h4>
                    <br><br>
                    <a href="Listarprodutos.php">
                        <button style="margin-left: 258px;"  class="btn btn-outline-light">Listar Produtos</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <br><br>
                    <h4 style="text-align: center; color: white;">Listar Avaliações</h4>
                    <br><br>
                    <a href="ListarAvaliacoes.php">
                        <button style="margin-left: 258px;"  class="btn btn-outline-light">Avaliações</button>
                    </a>
                </div>
            </div>
        </div>


    </div>
    
</body>
</html>