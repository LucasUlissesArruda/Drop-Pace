
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: black;
    }
    .navbar-custom {
      padding: 1rem 2rem;
    }
    .navbar-brand {
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
    }
    ul {
      gap: 25px;
    }
    .navbar-nav {
      flex: 1;
      justify-content: center;
    }
    .nav-link {
      margin: 0 1rem;
      font-size: 1rem;
    }
    .nav-link:hover {
      color: #007bff;
    }
    .btn-custom {
      background-color: white;
      color: black;
      font-weight: bold;
      border-radius: 20px;
      padding: 0.5rem 1.5rem;
    }
    .btn-custom:hover {
      background-color: #eaeaea;
    }
  </style>
   
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <!-- Logo -->
       <a style="text-decoration: none;" href="tela-inicial.php">

         <div style="font-size: 30px; color:white;">Drop Pace</div>
       </a>
      
      <!-- Menu principal -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="TelaMarcas.php">Marcas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="TelaProdutos.php">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="#">Novidades</a>
          </li>
        </ul>
      </div>
      <?php 

          session_start();

          if(!isset($_SESSION['idUsuarioLogado'])){
            echo '<a href="login.php">
                    <button class="btn btn-custom">Entrar</button>
                  </a>';

          } elseif(isset($_SESSION['idUsuarioLogado'])){
            echo '<a href="includes/logout.php">
                    <button class="btn btn-custom">Sair</button>
                  </a>';
          }

      ?> 
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
