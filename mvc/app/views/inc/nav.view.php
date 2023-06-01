<header class="p-3 mb-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="<?=ROOT?>/cover" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none logo">
        <img src="<?=ROOT?>/assets/imgs/logo.png" alt="">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?=ROOT?>/home" class="nav-link px-2 <?=$page_name=='home'?'link-secondary':'link-body-emphasis'?>">Home</a></li>
        <li><a href="<?=ROOT?>/cours" class="nav-link px-2 <?=$page_name=='cours'?'link-secondary':'link-body-emphasis'?>">Cours</a></li>
        <li><a href="<?=ROOT?>/exercises" class="nav-link px-2 <?=$page_name=='exercises'?'link-secondary':'link-body-emphasis'?>">Exercises</a></li>
        <li><a href="<?=ROOT?>/vote" class="nav-link px-2 <?=$page_name=='vote'?'link-secondary':'link-body-emphasis'?>">Vote</a></li>
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
      </form>

      <?php
      if (isset($_SESSION['user_id'])) {
      ?>
      <div class="dropdown text-end">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="./uploads/<?=$_SESSION['user_img']??'default_img.png'?>" alt="mdo" width="50" height="50" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
          <li><a class="dropdown-item" href="<?=ROOT?>/edit">Edit</a></li>
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
  </div>
</header>

