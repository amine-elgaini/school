<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="<?=ROOT?>/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>OFPPT Cours</title>
    <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">    

    <style>
      .bd-placeholder-img { 
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>
    <?php require './../app/views/inc/nav.view.php'?>
    <main>

      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">JAVASCRIPT FUNDAMENTAL</h1>
            <p class="lead text-body-secondary">
              From [1-30] you will learn fundamentals like (variables, function...), after that there's advanced concept like (api, promis, asychronos...)
            </p>
            <a href="./exercises" class="fs-5 btn btn-success my-2">exercises On Javascript</a>
          </div>
        </div>
      </section>
      
      <div class="album py-5 bg-body-tertiary">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $cours = $data['cours'];
            $num = 1;
            while (!feof($cours)) {
            ?>
            <div class="col">
              <div class="card shadow-sm">
                <img class="card-img-top"src="<?=ROOT?>/assets/imgs/js_cours.png" alt="">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-sm btn-outline-success fw-bold" href="<?=fgets($cours)?>">cour: <?=$num++?></a>
                    <small class="text-body-secondary"><?=rand(20, 25)?>min</small>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

    </main>

    <script src="<?=ROOT?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
