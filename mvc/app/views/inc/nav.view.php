<header class="p-3 border-bottom">
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <img class="d-flex align-items-center mx-5 mb-2 mb-lg-0 link-body-emphasis text-decoration-none logo" src="<?=ROOT?>/assets/imgs/logo.png" alt="">

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fw-bold align-items-center">
      <li><a href="<?=ROOT?>/home" class="nav-link px-2 <?=$page_name=='home'?'link-secondary fs-5':'link-body-emphasis'?>">Home</a></li>
      <li><a href="<?=ROOT?>/cours" class="nav-link px-2 <?=$page_name=='cours'?'link-secondary fs-5':'link-body-emphasis'?>">Cours</a></li>
      <li><a href="<?=ROOT?>/exercises" class="nav-link px-2 <?=$page_name=='exercises'?'link-secondary fs-5':'link-body-emphasis'?>">Exercises</a></li>

      <?php
        if (isset($_SESSION['username'])) {
      ?>
        <li><a href="<?=ROOT?>/vote" class="nav-link px-2 <?=$page_name=='vote'?'link-secondary fs-5':'link-body-emphasis'?>">Vote</a></li>
      <?php
        };
      ?>

      <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {?>
        <li class="nav-link px-2">|</li>
        <li><a href="<?=ROOT?>/dashboard" class="nav-link px-2 <?=$page_name=='dashboard' || $page_name=='dashboardEdit'?'link-secondary fs-5':'link-body-emphasis'?>">Dashboard</a></li>
      <?php }?>
    </ul>

    <form class="col-12 col-lg-auto ms-auto mb-3 mb-lg-0 me-lg-3" role="search">
      <div class="input-group">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        <span class="btn btn-success input-group-text">Search</span>
      </div>
    </form>

    <?php
    if (isset($_SESSION['user_id'])) {
    ?>
    <div class="dropdown m-auto">
      <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="img-thumbnail" src="<?=ROOT?>/uploads/<?=$_SESSION['user_img'] ?? 'default_img.png'?>" alt="mdo" width="70" height="70" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="<?=ROOT?>/profile/edit">Edit</a></li>
        <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?=ROOT?>/logout">Log out</a></li>
      </ul>
    </div>
    <?php
    } else {
      $root = ROOT;
      echo "<a href='$root/login' class='btn btn-primary'>Login</a>";
    }
    ?>
  </div>
</header>

