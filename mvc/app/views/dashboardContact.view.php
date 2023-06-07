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
<body class="dashboardContact">
  <?php require './../app/views/inc/nav.view.php'?>
  <?php
    $contact = $data['contact'];
    $num = 1;
    while (!feof($contact)) {
      $email = str_replace("\n","",fgets($contact));;
      $message = str_replace("\n","",fgets($contact));;
      if (empty($message) || empty($email)) {
        continue;
      }
    ?>
    <div class="card m-4">
      <div class="card-header">
        Gmail: <a href = "mailto: <?=$email?>"><?=$email?></a>
      </div>
      <div class="card-body">
        Message: <?=$message?>
      </div>
    </div>
    <?php
    }
    ?>
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
  </body>
</html>
