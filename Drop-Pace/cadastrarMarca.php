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
    <title>Document</title>
</head>
<body>
    <?php 
        include_once("../Drop-Pace/includes/menu.php")
    ?> 

    <style>
      .form-container {
            max-width: 500px;
            margin: auto;
            padding: 23px;
            background-color: white;
            border-radius: 30px;
        }
    </style>
  
  <div class="container">
    <br>
  <h4 class="text-center" style="color: white;" >Adicionar Nova Marca</h4>
  <br><br>
        <div class="form-container">
            <form action="includes/salvarMarca.php" method="POST">

            <input type="text" name="idmarca" hidden value="<?php  echo $idmarca  ?>">

                <?php 
                if(isset($_GET['mensagem'])){

                    if( $_GET['tipo'] =='sucesso'){
                    echo '<div class = "alert alert-success" role="alert">
                    '.$_GET[ 'mensagem'].'
                    </div>'; 
                    }else{
                    echo '<div class = "alert alert-danger" role="alert">
                    '.$_GET[ 'mensagem'].'
                    </div>';
                    }
                }
                ?>
                
                <div class="form-group" >
                    <label style="color: black; font-size:large" for="marca">Marca</label>
                    <input  style="width: 300px; border: 1px solid black; " name="descricao" type="text" value="<?php echo $descricao ?>" class="form-control" id="Marca" required>
                </div>
                <br><br>
                <button style="border: 1px solid black;" class="btn btn-primary btn-custom">Adicionar Marca</button>
            </form>
        </div>
    </div>
  </div>

</body>
</html>