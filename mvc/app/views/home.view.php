<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='<?=ROOT?>/assets/js/color-modes.js'></script>
  <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
  <title>OFPPT Acceuil</title>
  <style>  
    .feature-icon {
      width: 4rem;
      height: 4rem;
      border-radius: .75rem;
    }

    .icon-square {
      width: 3rem;
      height: 3rem;
      border-radius: .75rem;
    }

    .text-shadow-1 { text-shadow: 0 .125rem .25rem rgba(0, 0, 0, .25); }
    .text-shadow-2 { text-shadow: 0 .25rem .5rem rgba(0, 0, 0, .25); }
    .text-shadow-3 { text-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .25); }

    .card-cover {
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

    .feature-icon-small {
      width: 3rem;
      height: 3rem;
    }
    .candidate .card {
      background-color: #76ddff;;
    }

    .card {
        border: none;
        border-radius: 10px
    }

    .c-details span {
        font-weight: 300;
        font-size: 13px
    }

    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }
  </style>
</head>
  <body class="home">

    <?php require './../app/views/inc/nav.view.php'?>
    <div class="landing d-flex justify-content-evenly align-items-center">
      <div class="content text text-center">
        <h1>Bienvenue a l'OFPPT</h1>
        <p class="lead">
          <?php if (isset($_SESSION['username'])) { ?>
            <p class="lead fw-bold">Vous Pouvez Ajouter Votre Blog En Cliquant Sur Add Blog</p>
            <a href="<?=ROOT?>/blog/add" class="btn btn-primary btn-lg fw-bold">Add Blog</a>
            <?php } else { ?>
              <p class="lead fw-bold">Pour Participer aux Evenements Connectez Vous</p>
              <a href="<?=ROOT?>/login" class="btn btn-primary btn-lg fw-bold">Connectez Vous</a>
          <?php } ?>
        </p>

      </div>
    </div>

    <?php if (isset($_SESSION['username'])) {?>
      <div class="container mt-5 candidate">
        <h2 class="pb-2 border-bottom">Top 3 Gagnants</h2>
        <div class="row py-5">
            <?php
            $prize = 0;
            foreach($data['top3'] as $candidate) :
            $prize++;
            ?>
              <div class="col-md-6 col-lg-4">
                  <div class="card text-black p-3 mb-2">
                      <div class="d-flex justify-content-between align-items-center flex-wrap">
                          <div class="d-flex flex-row align-items-center">
                              <img class="icon" src="<?=ROOT?>/uploads/<?=$candidate['user_img'] ?? 'default_img.png'?>">
                              <div class="ms-2 c-details">
                                  <h6 class="mb-0"><?=$candidate['username']?></h6> <span><?=$candidate['speciality'] ?? 'unknown'?></span>
                              </div>
                          </div>
                          <a class="ms-auto badge rounded-pill text-bg-primary p-2" href="<?=$candidate['project']?>">Project <i class="bi bi-eye-fill"></i></a>
                      </div>
                      <div class="mt-5">
                          <h3 class="heading">Description:<br><?=$candidate['description_project']?></h3>
                          <div class="mt-5">
                              <!-- <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div> -->
                              <div class="mt-3 d-flex justify-content-between align-items-center gap-3">
                                <img class="ms-2" style="width:60px;transform:rotate(-20deg);" src="<?=ROOT?>/assets/imgs/prize<?=$prize?>st.png" alt="">
                                <div class="like">
                                  <span class="fw-bold"><?=$candidate['vote_count']?></span>
                                  <i class="fs-4 text-danger bi bi-heart-fill"></i>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            <?php
            endforeach;
            ?>
        </div>
      </div>
    <?php }?>


    <div class="container px-4 py-5" id="featured-3">
      <h2 class="pb-2 border-bottom">Etes Vous Connecter?</h2>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
          <h3 class="fs-2">Vote</h3>
          <p>Si Vous etes connecter vous aurez le droit de voter et Ajouter des projet</p>
        </div>
        <div class="feature col">
          <h3 class="fs-2">Blog</h3>
          <p>Vous Aurez le droit de participer au blog</p>
        </div>
        <div class="feature col">
          <h3 class="fs-2">Voir Resultat</h3>
          <p>Vous Pourrez Voir Les Resultat De Participants</p>
        </div>
      </div>
    </div>

    <div class="container px-4 py-5" id="custom-cards">
      <h2 class="pb-2 border-bottom">Acceder Aux Page Des Evenements</h2>

      <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <a  class="col d-block" href="<?=ROOT?>/blog/read?blog=25">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?=ROOT?>/assets/imgs/unsplash-photo-1.jpg');">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Lire Sur Evenement</h3>
              </div>
            </div>
        </a>

        <a  class="col d-block" href="<?=ROOT?>/profile">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?=ROOT?>/assets/imgs/unsplash-photo-2.jpg');">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Ajouter Projet</h3>
              </div>
            </div>
        </a>

        <a  class="col d-block" href="<?=ROOT?>/vote">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?=ROOT?>/assets/imgs/unsplash-photo-3.jpg');">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Voter Sur Votre Meuilleur Projet</h3>
              </div>
            </div>
        </a>

      </div>
    </div>

  
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>
