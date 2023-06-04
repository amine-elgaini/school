<!DOCTYPE html>
<html  class="h-100" lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='<?=ROOT?>/assets/js/color-modes.js'></script>
  <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
  <title>OFPPT Home</title>
</head>
<body class="home h-100">
  <?php require './../app/views/inc/nav.view.php'?>
<section class="position-relative" style="background-color: #eee;">
  <!-- show If Project Added -->
  <?php if (isset($data['errors'][0])) :?>
    <div class="position-fixed z-1 top-0 mt-3 end-0 me-4 opacity-75 toast align-items-center text-bg-danger border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          Project Do Not Exist
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>

  <!-- show If Project Added -->
  <?php if (isset($data['success'][0])) :?>
    <div class="position-fixed z-1 top-0 mt-3 end-0 me-4 opacity-75 toast align-items-center text-bg-success border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          Project Added
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card">
          <div class="card-body d-flex align-items-center gap-4">
            <div class="image pe-2 border-end border-muted">
              <img src="./uploads/<?=$_SESSION['user_img']??'default_img.png'?>" alt="avatar"
                class="img-fluid img-thumbnail" style="width: 150px;">
              <span class="fs-2 fw-bold d-block my-3"><?=$_SESSION['username'] ?? '<i class="bi bi-dash-lg"></i>'?></span>
              <p class="text-muted fs-5 fw-bold mb-1">Speciality: <?=$data['info']['speciality'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
            <div class="info flex-grow-1">
              <h6>Description:</h6>
              <p class="text-muted">
                <?=$data['info']['description'] ?? '<i class="bi bi-dash-lg"></i>'?>
              </p>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center mb-2">
            <a class="btn btn-primary d-flex align-items-center gap-2" href="<?=ROOT?>/profile/edit"><i class="bi bi-pencil-square"></i>Edit</a>
            <a class="btn btn-danger ms-1 d-flex align-items-center gap-1" href="<?=ROOT?>/logout"><i class="bi bi-box-arrow-left"></i>Logout</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 card mb-4">
        <div class="card-body">

          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 fw-bold">Full Name</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?=$data['info']['full_name'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 fw-bold">Email</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?=$data['info']['email'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 fw-bold">Number</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?=$data['info']['number'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 fw-bold">Country</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?=$data['info']['country'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 fw-bold">Address</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?=$data['info']['address'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 fw-bold">Register Date</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?=$data['info']['register_date'] ?? '<i class="bi bi-dash-lg"></i>'?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- <?php show($data)?> -->
    <div class="d-flex flex-wrap align-items-start gap-2">
      <!-- Projects -->
      <div class="card mb-4 mb-md-0">
        <div class="card-header">
          <h4 class="text-muted font-italic me-1">Projects</h4>
        </div>
        <div class="card-body">
          <?php if (isset($data['info']['project'])) {?>

            <a href="<?=$data['info']['project']?>" class="fs-5 d-block mb-2"><?=$data['info']['project']?></a>

          <?php } else { ?>
            <form action="" method="POST">

              <label for="url" class="fw-bold">Project</label>
              <input id="url" name="project" type="text" class="form-control" placeholder="Put URL"></input>
              <div class="form-text text-danger mb-2" id="basic-addon4">Be carful And Put A Valid URL, That You Can't Change It</div>
              
              <label for="description" class="fw-bold">Description</label>
              <textarea name="description" class="form-control" placeholder="Description Of Your Project" id="description"></textarea>
              <button class="ms-auto mt-2 btn btn-primary d-flex align-items-center gap-2" type="submit">
                <i class="bi bi-upload"></i>
                <span>Add Project</span>
              </button>
            </form>
          <?php }?>
        </div>
      </div>
      
      <!-- Qcm -->
      <div class="card mb-4 mb-md-0">
        <div class="card-header">
          <h4 class="text-muted font-italic me-1">assigment QCM</h4>
        </div>
        <div class="card-body">
          <?php if (isset($data['info']['result'])) {?>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fs-5 fw-bold"><?=$data['info']['subject']?></span>
              <span class="fs-5 fw-bold text-success"><?=$data['info']['result']?>/10</span>
            </div>
            <div class="progress position-relative" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar" style="width: <?=$data['info']['result'] * 10?>%"></div>
            </div>
            
          <?php } else { ?>

            <span class="fs-5 d-block mb-2">Front End</span>
            <a href="<?=ROOT?>/exercises" class="btn btn-primary">Go For Qcm</a>
          <?php }?>
          <hr>
        </div>
      </div>
    </div>

  </div>
</section>
  <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
</body>
</html>