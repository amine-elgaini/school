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
    <title>Read Blog</title>
  </head>
  <body class="readBlog">
    <?php require './../app/views/inc/nav.view.php'?>
    <div class="d-flex justify-content-center">
      <img style="max-height:50vh" class="rounded-4" src="<?=ROOT?>/uploads/<?=$data['blog']['img'] ?? 'default_article.jpg'?>" alt="">
    </div>
    <div class="container">
      <div class="content">
        <h2 class="display-1 text-center fst-italic"><?=$data['blog']['title']?></h2>

        <small class="author fst-italic">
          <img style="width:60px" class="img-thumbnail rounded-circle" src="<?=ROOT?>/uploads/<?=$data['blog']['user_img'] ?? 'default_img.png'?>" alt="">
          <small class="border-bottom">By: <?=$data['blog']['username']?></small>
        </small>
        
        <br>
        <small class="date fst-italic border-bottom">At: <?=date('M j Y', strtotime($data['blog']['blog_date']))?></small>

        <?php if (isset($_SESSION['user_id'])) { ?>
          <button style="border: none;background:transparent;" onclick='location.replace("<?=ROOT?>/blog/read?blog=<?=$data["blog"]["blog_id"]?>&like=like")'>
            <i class="ms-4 fs-5 text-danger bi bi-heart<?= $data['liked'] ? '-fill' : null?>"></i> <?=$data['blog']['like_count']?>
          </button>
        <?php }?>

        <div style="overflow:hidden" class="font-monospace lh-base fs-5 text py-5">
          <?=$data['blog']['text']?>
        </div>
      </div>

      <?php if (isset($_SESSION['username'])) { ?>
        <div class="container my-5">
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
              <div class="card shadow-0 border">

                <div style="max-height:550px;overflow:auto;"class="card-body p-4">

                  <!-- Add Comment -->
                  <form action="" method="POST" class="d-flex gap-2 justify-content-between my-4">
                    <img class="img-fluid img-responsive rounded-circle" src="<?=ROOT?>/uploads/<?=$_SESSION['user_img'] ?? 'default_img.png'?>" width="38">
                    <input name="comment" required minlength="2" maxlength="50" type="text" class="form-control" placeholder="Add comment">
                    <button class="btn btn-primary" type="submit">Comment</button>
                  </form>

                  <!-- Button For Show Comment -->
                  <!-- <div class="d-flex justify-content-end gap-2 mb-2">
                    <label for="show-comment">Show Comment</label>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="show-comment" checked>
                    </div>
                  </div> -->

                  <!-- Show Comments -->
                  <?php 
                    if (isset($data['comments'])) {
                      foreach($data['comments'] as $comment) {?>
                        <div class="card my-2 p-3">

                          <div class="d-flex justify-content-between gap-2 align-items-center">
                            <div class="user d-flex gap-2 align-items-center">
                              <img src="<?=ROOT?>/uploads/<?=$comment['user_img'] ?? 'default_img.png'?>" width="30" class="user-img rounded-circle mr-2">
                              <span>
                                <small class="fw-blod fst-italic text-primary"><?=$comment['username']?></small>
                              </span>
                            </div>
                            <small><?=date('M j Y', strtotime($comment['comment_date']))?></small>
                          </div>

                          <small class="px-5 fw-blod">
                            <?=$comment['comment']?>
                          </small>

                        </div>

                  <?php } 
                    } ?>

                </div>

              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>
