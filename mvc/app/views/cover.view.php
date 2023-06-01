<!DOCTYPE html>
<html  class="h-100" lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='<?=ROOT?>/assets/js/color-modes.js'></script>
  <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
  <title>OFPPT Home</title>
</head>
<body class="cover h-100">
  <?php require './../app/views/inc/nav.view.php'?>
  <div class="p-5 background">
    <h1 class='text-center'>Home page view</h1>
    <div>
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum omnis ipsam cumque fuga porro. Voluptas nostrum eius quibusdam dolores ducimus corporis reprehenderit mollitia illo cum? Nesciunt quia error ipsam dolores!
    </div>
    <?php show($_SESSION);?>
  </div>
  <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
</body>
</html>