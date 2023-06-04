<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='<?=ROOT?>/assets/js/color-modes.js'></script>
  <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/css/qcm.css" rel="stylesheet">
  <title>OFPPT Cover</title>
</head>
  <body class="exercises h-100">
    <a href="<?=ROOT?>/home" class="fs-5 position-fixed btn btn-primary m-3 d-flex align-items-center gap-1"><i class="bi bi-door-open"></i>Exit</a>
    <section class="login h-100 pt-3">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xl-6 col-lg-8 col-md-10">
            <div class="text-center my-5">
              <img src="<?=ROOT?>/assets/imgs/front_end.png" alt="logo"  style="width:200px">
            </div>
            <div class="the_test card shadow-lg">

              <div class="<?=isset($data['note'])?'d-none':null?> card-header d-flex justify-content-between fw-bold">
                <div>Category: <span class="text-primary category"><?=$data['subject']?></span></div>
                |
                <div>Questions Num: <span class="text-primary question_num">?</span></div>
              </div> 
              
              <div class="card-body" style="height:45vh;">
                <!-- This erea it will be questions -->
                <?php
                if (!isset($data['note'])) {
                  echo "<img class='d-block h-100 m-auto img-fluid' src='".ROOT."/assets/imgs/problem_solving.png'>";
                } else {
                  echo '<p class="h-100 d-flex justify-content-center align-items-center text-success fw-bold" style="font-size: 70px;">'.$data['note'].'/10</p>';
                }?>
              </div>
              
              <div class="<?=isset($data['note'])?'d-none':null?> card-footer d-flex justify-content-between align-items-center">
                <!-- This erea it will be just Finished questions and resul  -->
                <button class="start ms-auto btn btn-primary">Start</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
    <script src='<?=ROOT?>/assets/js/main.js'></script>
    <?php
    if (!isset($data['note'])) {
      echo "<script src='".ROOT."/assets/js/qcm.js'></script>";
    }?>
  </body>
</html>