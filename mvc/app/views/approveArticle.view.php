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
      <?php if (isset($data['success'][0])) :?>
        <div class="position-absolute top-0 end-0 me-4 opacity-75 toast align-items-center text-bg-success border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              <?=$data['success'][0]?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; ?>
      
      <div class="shadow-lg rounded-4 p-4" style="overflow:auto; max-height:800px">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">article id</th>
              <th scope="col">author</th>
              <th scope="col">Email</th>
              <th scope="col">blog date</th>
              <th scope="col">likes</th>
              <th scope="col"></th><!-- approve -->
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($data['blogs'] as $blog) :
            ?>
              <tr>
                <th scope="row"><?=$blog['blog_id']?></th>
                <td><?=$blog['username']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$blog['email']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td style="white-space:nowrap"><?=date('M j Y', strtotime($blog['blog_date'])) ??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><?=$blog['like_count']??'<i class="bi bi-dash-lg"></i>'?></td>
                <td><a href="<?=ROOT?>/dashboard/approveArticle?blog=<?=$blog['blog_id'] ?? 0?>">
                  <i class="fs-4 bi bi-patch-check-fill <?=$blog['approve'] ? 'text-success':'text-secondary'?>"></i></a>
                </td>
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
</html>
