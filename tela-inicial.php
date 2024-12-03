<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drop Pace</title>
    <link rel="stylesheet" href="css/style-telaincial.css">
    <link rel="stylesheet" href="css/banana-alexandre.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/teste.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: black;"> 

    <?php 
        include_once("../Drop-Pace/includes/menu.php")
    ?>  
    <section>
                <div class="container">
                    <br>
                    <br>
                    <h3 style="color: white; text-align: center;">Principais Novidades</h3>
                    
                    <div id="carousel2" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div id="carouselExampleFade" class="carousel slide carousel-fade">
                        <div class="carousel-inner" style="border-radius: 50px;">
                            <div class="carousel-item active">
                            <img src="img/vamover.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="img/travis.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="img/samba.webp" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" style="left: -135px;" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" style="right:-135px;" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    </div>
            </section>
            <section>
                <br>
                <br>
                <h3 style="color: white; text-align: center;">Principais vendas</h3>
                <div class="container" style="padding-top: 0px;padding-bottom: 372px;">
                <div class="card__container">
                    <article class="card__article">
                        <img style="width: 352px;height: 524px;" src="img/pexelsjpg.jpg" alt="image" class="card__img">

                        <div class="card__data">
                            <span class="card__description">Adidas</span>
                            <h2 class="card__title">Campus</h2>
                            <a href="#" class="card__button">Compre Agora</a>
                        </div>
                    </article>

            <article class="card__article">
               <img src="img/dunkzinho.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Nike</span>
                  <h2 class="card__title">Dunk</h2>
                  <a href="#" class="card__button">Compre Agora</a>
               </div>
            </article>

            <article class="card__article">
               <img style="height: 526px;" src="img/amemjpg.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Nike</span>
                  <h2 class="card__title">Air Max 1</h2>
                  <a href="nikeAirMax.php" class="card__button">Compre Agora</a>
               </div>
            </article>
         </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
