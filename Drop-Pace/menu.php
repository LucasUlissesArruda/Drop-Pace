  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .navbar-custom {
      padding: 1rem 2rem;
    }
    .navbar-brand {
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
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
        <div style="font-size: 30px; color:white;" href="#">Drop Pace</div>
      
      <!-- Menu principal -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="#">Marcas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="#">Novidades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="#">Calendário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="#">Feed</a>
          </li>
        </ul>
      </div>

      <a href="login.php">
        <button class="btn btn-custom">Entrar</button>
      </a>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
