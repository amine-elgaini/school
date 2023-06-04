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
  <a style="position:sticky; top:20px; left:15px; width:fit-content" href="<?=ROOT?>/dashboard" class="opacity-75 mt-2 z-1 fs-5 fw-bold btn btn-primary d-flex align-items-center gap-1"><i class="bi bi-chevron-left"></i>Dashboard</a>
    <section class="editProfile pt-4 pb-5">
      <div class="container">
        <div class="row justify-content-sm-center">
          <div class="col-xl-10">
            <div class="card shadow-lg">
              <div class="card-body px-4">
                <h1 class="fs-4 card-title fw-bold mb-4">Edit Profile</h1>
                <form action="" method="POST" class="needs-validation row g-3" novalidate="" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" required>
                    <div class="invalid-feedback">
                      Email is invalid
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword4" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="leave it empty to not change">
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress" class="form-label fw-bold">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="col-md-6">
                    <label for="inputUsername" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" id="inputUsername" pattern="[a-zA-Z0-9]{5,}" required>
                    <div class="invalid-feedback">
                      Username should be greater than 4 caracteres
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputDescription" class="form-label fw-bold">Description</label>
                    <input type="text" name="description" class="form-control" id="inputDescription">
                  </div>
                  <div class="col-md-6">
                    <label for="inputImageProfile" class="form-label fw-bold">Image Profile</label>
                    <input type="file" name="imageProfile" class="form-control" id="inputImageProfile">
                  </div>
                  <div class="col-md-4">
                    <label for="inputFullName" class="form-label fw-bold">Full Name</label>
                    <input type="text" name="FullName" class="form-control" id="inputCountry">
                  </div>
                  <div class="col-md-4">
                    <label for="inputCountry" class="form-label fw-bold">Country</label>
                    <input type="text" name="country" class="form-control" id="inputCountry">
                  </div>
                  <div class="col-md-4">
                    <label for="inputWork" class="form-label fw-bold">speciality</label>
                    <select name="speciality_id" id="inputWork" class="form-select">
                      <?php
                      foreach($data['getSpecialties'] as $option) {
                        echo "<option value='{$option['speciality_id']}'>" . $option['speciality'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="inputNumber" class="form-label fw-bold">number</label>
                    <input type="number" name="number" class="form-control" id="inputNumber">
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
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
