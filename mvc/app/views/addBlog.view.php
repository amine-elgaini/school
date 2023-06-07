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
  <body class="contact">
    <a style="position:sticky; top:20px; left:15px; width:fit-content" href="<?=ROOT?>/Profile" class="mt-2 opacity-75 z-1 fs-5 fw-bold btn btn-primary d-flex align-items-center gap-1"><i class="bi bi-chevron-left"></i>Profile</a>
    <!-- Wrapper container -->
    <div class="container py-5">
      <div class="row justify-content-sm-center">
        <div class="col-xl-10">
          <div class="card shadow-lg">
            <h1 class="card-header fw-bold">Ajouter Article</h1>
            <div class="card-body px-4">

              <form action="" method="POST" class="needs-validation row g-3" novalidate="" enctype="multipart/form-data">

                <div>
                  <label for="image" class="form-label fw-bold">Image</label>
                  <input type="file" name="image" class="form-control" id="image">
                </div>
                
                <div>
                  <label for="title" class="form-label fw-bold">Title</label>
                  <input type="text" name="title" class="form-control" id="title">
                </div>
                
                <div>
                  <label for="Category" class="form-label fw-bold">Category</label>
                  <select name="category" id="Category" class="form-select">
                    <option value='0'>Noting</option>
                    <option value='1'>Programmation</option>
                    <option value='2'>Freelance</option>
                  </select>
                </div>

                <div>
                  <label for="text" class="form-label fw-bold">Text</label>
                  <textarea name="text" class="form-control" rows="10" id="text"></textarea>
                </div>


                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-primary">Ajouter Article</button>
                </div>

                <?php
                  // here will be result of edit
                  if(!empty($data['errors'])) {
                    echo '<div class="errors alert alert-danger mt-2">';
                      foreach($data['errors'] as $error) {
                        echo "<p>- $error</p>";
                      }
                    echo '</div>';
                  }
                  if(!empty($data['success'])) {
                    echo '<div class="success alert alert-success mt-2">';
                      foreach($data['success'] as $success) {
                        echo "<p>- $success</p>";
                      }
                    echo '</div>';
                  }
                ?>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SB Forms JS -->
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
    <script src='<?=ROOT?>/assets/js/form_validation.js'></script>
  </body>
</html>
