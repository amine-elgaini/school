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
<body class="home">
  <?php require './../app/views/inc/nav.view.php'?>
    <a style="position:sticky; top:20px; left:15px; width:fit-content" href="<?=ROOT?>/profile" class="mt-2 opacity-75 z-1 fs-5 fw-bold btn btn-primary d-flex align-items-center gap-1"><i class="bi bi-chevron-left"></i>Profile</a>
    <section class="editProfile mt-5">
      <div class="container">
        <div class="row justify-content-sm-center">
          <div class="col-xl-10">
            <div class="card shadow-lg">
              <div class="card-body px-4">
                <h1 class="fs-4 card-title fw-bold mb-4">Edit Profile</h1>

                <form action="" method="POST" class="needs-validation row g-3" novalidate="" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" value="<?=$data['info']['email']?>" class="form-control" id="inputEmail4" required>
                    <div class="invalid-feedback">
                      Email is invalid
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword4" class="form-label fw-bold">Mot De Passe</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="leave it empty to not change">
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress" class="form-label fw-bold">Addresse</label>
                    <input type="text" name="address" value="<?=$data['info']['address']?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="col-md-6">
                    <label for="inputUsername" class="form-label fw-bold">Nom Utilisateur</label>
                    <input type="text" name="username" value="<?=$data['info']['username']?>" class="form-control" id="inputUsername" pattern="[a-zA-Z0-9]{5,}" required>
                    <div class="invalid-feedback">
                      Nom Utilisateur Doit Etre Plus De 4 caracteres
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputDescription" class="form-label fw-bold">Description</label>
                    <input type="text" name="description" value="<?=$data['info']['description']?>" class="form-control" id="inputDescription">
                  </div>
                  <div class="col-md-6">
                    <label for="inputImageProfile" class="form-label fw-bold">Image Profile</label>
                    <input type="file" name="imageProfile" class="form-control" id="inputImageProfile">
                  </div>
                  <div class="col-md-4">
                    <label for="inputFullName" class="form-label fw-bold">Nom Et Prenom</label>
                    <input type="text" name="FullName" value="<?=$data['info']['full_name']?>" class="form-control" id="inputCountry">
                  </div>
                  <div class="col-md-4">
                    <label for="inputCountry" class="form-label fw-bold">pays</label>
                    <input type="text" name="country" value="<?=$data['info']['country']?>" class="form-control" id="inputCountry">
                  </div>
                  <div class="col-md-4">
                    <label for="inputWork" class="form-label fw-bold">filier</label>
                    <select name="speciality_id" id="inputWork" class="form-select">
                      <option value='0'>Noting</option>
                      <?php
                      foreach($data['getSpecialties'] as $option) {
                        $selected = $data['info']['speciality_id'] == $option['speciality_id'] ? 'selected' : null;
                        echo "<option $selected value='{$option['speciality_id']}'>" . $option['speciality'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="inputNumber" class="form-label fw-bold">nombre</label>
                    <input type="number" name="number" value="<?=$data['info']['number']?>" class="form-control" id="inputNumber">
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                  </div>
                </form>

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

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
    <script src='<?=ROOT?>/assets/js/form_validation.js'></script>
  </body>
  </body>
</html>
