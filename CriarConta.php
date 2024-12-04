<?php 
include_once("includes/conexao.php");

if (isset($_GET['idclientes'])) {
  $sql = "SELECT * FROM clientes WHERE idclientes = '{$_GET['idclientes']}'";
  $resultados = mysqli_query($conn, $sql);
  $dados = mysqli_fetch_assoc($resultados);

  $idclientes = $dados['idclientes'];
  $nomeCliente = $dados['nomeCliente'];
  $cpf = $dados['cpf'];
  $email = $dados['email'];
  $endereco = $dados['endereco'];
  $cep = $dados['cep'];
  $senha = $dados['senha'];
} else {
  $idclientes = 0;
  $nomeCliente = "";
  $cpf = "";
  $email = "";
  $endereco = "";
  $cep = "";
  $senha = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/estilo.js" defer></script>
  <link rel="stylesheet" href="css/style2Lucas.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>Login</title>
</head>

<body style="background-image: url('img/test.jpg'); background-size: cover;">
  <div class="comeco">
    <form action="includes/salvar.usuarios.php" method="POST">
      <div class="container">
        <br><br>
        <div class="row content d-flex justify-content-center align-items-center">
          <div class="col-md-5">
            <br><br><br>
            <div class="box shadow bg-blur p-4" style="backdrop-filter: blur(2px); border-radius: 50px; background-color: white;">
              <h3 class="mb-4 text-center fs-1" style="color: black;">Crie Sua Conta</h3>
              
              <div class="row">
                <div class="col-md-12">
                  <!-- Correção: Remoção do espaço extra no 'name' -->
                  <input type="hidden" name="idUsuarios" value="<?php echo $idUsuarios; ?>">
                  <input name="nomeCliente" value="<?php echo $nomeCliente; ?>" type="text" class="form-control" required placeholder="Digite Seu Nome">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input name="email" type="email" value="<?php echo $email; ?>" class="form-control" placeholder="Digite seu Email">
                </div>
              </div>

              

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input type="text" name="endereco" value="<?php echo $endereco ?>" class="form-control" required placeholder="Digite seu Endereço">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input name="cpf" type="text" value="<?php echo $cpf; ?>" class="form-control" placeholder="Digite seu Cpf">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input type="text" name="cep" value="<?php echo $cep ?>" class="form-control" required placeholder="Digite seu Cep">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input type="password" name="senha" class="form-control" value="<?php echo $senha; ?>" placeholder="Digite Sua Senha" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12" style="text-align: center;">
                  <br>
                  <button style="width: 200px;" class="btn btn-outline-dark">Cadastrar</button>
                </div>
              </div>

              <!-- Alerta de Mensagem -->
              <?php 
              if (isset($_GET['mensagem'])) {
                $alertType = ($_GET['tipo'] == 'sucesso') ? 'alert-success' : 'alert-danger';
                echo '<div class="alert ' . $alertType . '" role="alert">' . $_GET['mensagem'] . '</div>'; 
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
