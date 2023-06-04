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
  <body class="vote">
    <?php require './../app/views/inc/nav.view.php'?>
    <section style="padding: 90px 0;" class="position-relative">
      <!-- show if this user voted before -->
      <?php if ($data['didVote']) :?>
        <div class="position-absolute z-1 top-0 end-0 me-4 toast align-items-center text-bg-info border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body fs-5">
            <i class="bi bi-info-circle "></i> Hi <?=$_SESSION['username']?>, You Already Voted You Can't Vote Again!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; ?>
      <div class="container d-flex flex-wrap justify-content-center gap-4">

        <?php
        foreach($data['candidates'] as $candidate) :
        ?>
        <div class="card" style="max-width: 400px;">
          <div class="card-header d-flex align-items-center gap-3">
            <img src="<?=ROOT?>/uploads/default_img.png" class="rounded" style="width:50px;height:50px">
            <p class="m-0 fs-5" >
              <?=$candidate['username']?><span class="fs-6">(<?=$candidate['full_name']?>)</span>
              <span class="text-primary fw-bold"><?=$candidate['vote_count']?>/Votes</span>
            </p> 
          </div>

          <div class="card-body">
            I built A School Website. Using Html, Css, Js. I tried Also To Make It Responsive On Pc And Phones And Other Devices
          </div>

          <div class="card-footer d-flex justify-content-end align-items-center gap-2">
            <?=isset($data['didVote']['voteOn']) && $data['didVote']['voteOn'] === $candidate['user_id']?'<i class="fs-3 me-auto text-success bi bi-check-circle-fill"></i>':'<i class="fs-3 me-auto bi bi-check-circle"></i>'?>
            <?php if (!isset($data['didVote']['voteOn'])) {?>
              <a style="width:fit-content" class="btn btn-success d-flex align-items-center gap-1" href="<?=ROOT?>/vote/voted?candidate=<?=$candidate['user_id']?>">
                <i class="bi bi-check2"></i><span>Vote</span>
              </a>
            <?php }?>
            <a style="width:fit-content" class="btn btn-primary d-flex align-items-center gap-1" href="<?=$candidate['project']?>">
              <i class="bi bi-eye"></i><span>View</span>
            </a>
          </div>

        </div>
        <?php
        endforeach;
        ?>

      </div>
    </section>

    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>