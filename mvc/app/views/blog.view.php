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

  <style>
    .card-custom {
      overflow: hidden;
      min-height: 450px;
      box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
    }

    .card-custom-img {
      height: 200px;
      min-height: 200px;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      border-color: inherit;
    }

    /* First border-left-width setting is a fallback */
    .card-custom-img::after {
      position: absolute;
      content: '';
      top: 161px;
      left: 0;
      width: 0;
      height: 0;
      border-style: solid;
      border-top-width: 40px;
      border-right-width: 0;
      border-bottom-width: 0;
      border-left-width: 545px;
      border-left-width: calc(575px - 5vw);
      border-top-color: transparent;
      border-right-color: transparent;
      border-bottom-color: transparent;
      border-left-color: inherit;
    }

    .card-custom-avatar img {
      border-radius: 50%;
      box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
      position: absolute;
      top: 100px;
      left: 1.25rem;
      width: 100px;
      height: 100px;
    }
  </style>

  </head>
  <body class="blog">
    <?php require './../app/views/inc/nav.view.php'?>

    <!-- Landing Image -->
    <div class="landing p-4 p-md-5 rounded text-bg-dark">
        <div class="content col-md-6 px-0">
          <h1 class="display-4 fst-italic">cette page concerne des blog</h1>
          <p class="lead my-3">Vous Pouvez Trouver Des Article, Des Evenements..., Et Tout Ce Qui concerne Votre Formation.</p>
        </div>
    </div>
    
    <!-- Blogs -->
    <div class="container mb-5">
      <div class="row pt-5 m-auto d-flex justify-content-center">
        <?php foreach($data['blogs'] as $blog) { ?>
          <div class="col-sm-8 col-md-6 col-lg-4 pb-3">

            <div class="card text-dark card-custom bg-white border-white border-0">
              <div class="card-custom-img" style="background-image: url(<?=ROOT . '/uploads/'.$blog['img']?>);"></div>
              <div class="card-custom-avatar">
                <img class="img-fluid" src="<?=ROOT?>/uploads/<?=$blog['user_img'] ?? 'default_img.png'?>" alt="Avatar" />
              </div>
              <div class="mx-4 mt-2 d-flex align-items-center justify-content-between">
                <small>Name: <?=$blog['username']?></small>
                <span class="text-muted">|</span>
                <small class="ps-2">
                  At: <?=date('M j Y', strtotime($blog['blog_date']))?>
                </small>
              </div>
              <div style="height:80px;overflow:auto;" class="card-body">
              <h4 class="card-title"><?=$blog['title']?></h4>
              <p class="card-text">
                <?=substr($blog['text'], 0, 100) . '...'?>
              </p>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-between" style="background: inherit; border-color: inherit;">
                <span class="">
                  <i class=" fs-5 text-danger bi bi-heart-fill"></i> 
                  <?=$blog['like_count']?>
                </span>
                <a href="<?=ROOT?>/blog/read?blog=<?=$blog['blog_id']?>" class="btn btn-primary">Read All</a>
              </div>
            </div>

          </div>
        <?php } ?>
      </div>
    </div>

    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>
