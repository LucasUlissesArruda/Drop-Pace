<?php

  include_once("includes/conexao.php");

  if(isset($_GET['idmarca'])){
    $sql = "SELECT * FROM marca WHERE idmarca = '{$_GET['idmarca']}'";
    $resultados = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($resultados);


    $idmarca = $dados ['idmarca'];
    $descricao = $dados ['descricao'];

  } else{
    $idmarca =0;
    $descricao = "";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <title>Document</title>
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
                  <th scope="col">IdMarca</th>
                  <th scope="col">Marcas</th>
                  <th scope="col">Editar/Excluir</th>
                </tr>
              </thead>
                <tbody>
                <?php 
        
                    include_once("includes/conexao.php");

                    $sql = "SELECT * FROM marca ORDER BY idmarca ASC";

                    $resultados = mysqli_query($conn, $sql);

                    while($dados = mysqli_fetch_assoc($resultados)) {
                    echo'<tr>
                            <td>'.$dados['idmarca']. '</td>
                            <td>'.$dados['descricao']. '</td>
                            <td style= "text-align: center;" >
                            <a class="btn btn-warning btn-sm" href="cadastrarMarca.php?idmarca='.$dados['idmarca']. '">Editar</a>
                            <a class="btn btn-danger btn-sm" href="includes/excluirMarca.php?idmarca='.$dados['idmarca'].'">Excluir</a>
                            </td>
                            </tr>';

                    }

                ?>
               </tbody>
          </table>
    </div>
            
        </div>
    </section>


</body>
</html>