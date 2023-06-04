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
<body class="tableUsers">
  <?php require './../app/views/inc/nav.view.php'?>
  <h1 class="mx-auto m-3 text-center fs-1 fw-bold">Users</h1>
  <section class="px-5 position-relative">
    
      <!-- show user deleted -->
      <?php if (isset($_GET['delete'])) :?>
        <div class="position-absolute top-0 end-0 me-4 opacity-75 toast align-items-center text-bg-danger border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              User <span>[ <?=$_GET['delete'] ?? null ?> ]</span> Was Deleted
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; ?>

      <!-- show user deleted -->
      <?php if (isset($_GET['add'])) :?>
        <div class="position-absolute top-0 end-0 me-4 opacity-75 toast align-items-center text-bg-success border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              One User Added
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; ?>
      
      <a style="width:fit-content" href="<?=ROOT?>/dashboard/add" class="mb-3 btn btn-primary d-flex align-items-center gap-2"><i class="bi bi-plus-lg"></i>Add User</a>
      <div class="shadow-lg rounded-4 p-4" style="overflow:auto; max-height:800px">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">fullName</th>
              <th scope="col">Email</th>
              <th scope="col">Filier</th>
              <th scope="col">register_date</th>
              <th scope="col">address</th>
              <th scope="col">number</th>
              <th scope="col">description</th>
              <th scope="col">note<span class="text-muted opacity-50 fst-italic">/10</span></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($data['info'] as $value) :
            ?>
              <tr>
                <th scope="row"><?=$value['user_id']?></th>
                <td><?=$value['username']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['full_name']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['email']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['speciality']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['register_date']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['address']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['number']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['description']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$value['result']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><a href="<?=ROOT?>/dashboard/delete?user_id=<?=$value['user_id']?>"> <i class="text-danger fs-5 bi bi-trash"></i></a></td>
                <td><a href="<?=ROOT?>/dashboard/edit?user_id=<?=$value['user_id']?>"> <i class="fs-5 bi bi-pencil-square"></i></a></td>
              </tr>
            <?php
              endforeach;
            ?>
          </tbody>
        </table>
      </div>
  </section>
  
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
  </body>
</html>
