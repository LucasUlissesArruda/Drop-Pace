<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/loginLucas.css">
    <title>Login</title>
</head>
<body style="background-image: url('img/nike.jpg'); background-size: cover;">
    <br><br><br><br><br>
    <section class="secp1">
        <div class="container">
            <form action="includes/validar.php" class="mb-3" method="POST" >
                <div class="row content d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                <!-- Alerta de Mensagem -->
              <?php 
              if (isset($_GET['mensagem'])) {
                $alertType = ($_GET['tipo'] == 'sucesso') ? 'alert-success' : 'alert-danger';
                echo '<div class="alert ' . $alertType . '" role="alert">' . $_GET['mensagem'] . '</div>'; 
              }
              ?>
                        <div class="box shadow bg-blur p-4" style="backdrop-filter: blur(6px); border-radius: 50px;">
                            <h3 class="mb-4 text-center fs-1">Faça seu Login</h3>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                <label for="">Digite seu Email</label>
                                </div>
                                <div class="form-floating">
                                <input type="password" name="senha" class="form-control" id="senha" placeholder="Password">
                                <label for="">Digite sua Senha</label>
                                </div>
                                <br>
                            <div class="d-grid gap-2 mb-3">
                                <button  class="btn btn-dark btn-lg border-0" style="border-radius: 15px;">Entrar</button>
                            </div>
                            <div class="forgot mb-3 text-right" >
                                <a style="text-decoration: none; color:black" href="#" title="Esqueceu a Senha">Esqueceu a senha?</a>
                            </div>
                            <div class="sing">
                                <a  style="text-decoration: none; " href="CriarConta.php">
                                    <p style="color:black" class="text-center">Não Possui Cadastro?</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
