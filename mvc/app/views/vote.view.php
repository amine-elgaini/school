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

    .candidate .card {
      background-color: #76ddff;
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

    .progress {
        height: 10px;
        border-radius: 10px
    }

    .progress div {
        background-color: red
    }

    .text1 {
        font-size: 14px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }
  </style>
</head>
  <body class="vote">
    <?php require './../app/views/inc/nav.view.php'?>
    <!-- message if user did vote before -->
    <?php if ($data['didVote']) :?>
      <div style="top:100px;right:10px" class="position-fixed z-1 me-4 toast align-items-center text-bg-info border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body fs-5">
          <i class="bi bi-info-circle "></i> Salut, <?=$_SESSION['username']?>, Tu Viens De Voter Tu Ne Peux Pas Voter Encore.
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    <?php endif; ?>

    <div style="margin-top: 120px;margin-bottom: 120px" class="container candidate">
      <div class="row">
          <?php
          foreach($data['candidates'] as $candidate) :
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
                            <div class="mt-3 d-flex justify-content-end align-items-center gap-3">
                              <span class="fw-bold"><?=$candidate['vote_count']?></span>

                              <!-- button showed if i voted on or not -->
                              <?php if (!isset($data['didVote']['voteOn'])) {?>
                                <a href="<?=ROOT?>/vote/voted?candidate=<?=$candidate['user_id']?>">
                                  <i class="fs-4 text-danger bi bi-heart"></i>
                                </a>
                              <?php } ?>
                              <?php if(isset($data['didVote']['voteOn']) && $data['didVote']['voteOn'] === $candidate['user_id']) {?>
                                <i class="fs-4 text-danger bi bi-heart-fill"></i>
                              <?php } elseif(isset($data['didVote']['voteOn'])) { ?>
                                <i class="fs-4 text-white bi bi-heart-fill"></i>
                              <?php } ?>
                              
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

    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>