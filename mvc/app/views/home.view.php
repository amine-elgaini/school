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
  <title>OFPPT Cover</title>
</head>
  <body class="home">

    <?php require './../app/views/inc/nav.view.php'?>
    <div class="landing d-flex justify-content-evenly align-items-center">
      <div class="content text text-center">
        <h1>Welcome To OFPPT</h1>
        <p class="lead fw-bold">Here You Will Learn Web Dev, With Our Cours, Execises and Some Adivices So You Can Find Your Job Easly</p>
        <p class="lead">
          <a href="<?=ROOT?>/cours" class="btn btn-primary btn-lg fw-bold">Start With Our Cours</a>
        </p>

      </div>
    </div>

    <?php if (isset($_SESSION['username'])) {?>
      <div class="divider border"></div>
      <section class="winners container py-5">
        <h1 style="font-size:60px;white-space:nowrap;" class="fw-light text-center my-5">Top Three Winners</h1>
        <div class="d-flex flex-wrap justify-content-center gap-4">

          <?php
          $prize = 0;
          $prizeTrophy = ['prize1st', 'prize2st', 'prize3st'];
          foreach($data['top3'] as $data) :
            $img=$prizeTrophy[$prize++];
          ?>
            <div class="card position-relative m-5 <?=$prize == 1 ? 'bg-warning text-black' : null?>" style="max-width: 400px;">
              <img style="max-width: 80px;left: -50px;transform:rotate(-40deg);" class="position-absolute" src="<?=ROOT?>/assets/imgs/<?=$img?>.png">
              <div class="card-header d-flex align-items-center gap-3">
                <img class="img-thumbnail" src="<?=ROOT?>/uploads/<?=$data['user_img']??'default_img.png'?>" class="rounded" style="width:50px;height:50px">
                <p class="m-0 fs-5" >
                  <?=$data['username']?><span class="fs-6">(<?=$data['full_name']?>)</span>
                  <span class="text-primary fw-bold"><?=$data['vote_count']?>/Votes</span>
                </p> 
              </div>

              <div class="card-body d-flex align-items-center" style="height:140px;overflow:auto;">
                <?=$data['description_project'];?>
              </div>

              <div class="card-footer text-end">
                <a class="btn btn-primary" href="<?=$data['project']?>">View</a>
              </div>

            </div>
          <?php
          endforeach;
          ?>

        </div>
      </section>
    <?php }?>
  
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>
