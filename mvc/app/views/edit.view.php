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
    <section class="editProfile mt-5">
      <div class="container">
        <div class="row justify-content-sm-center">
          <div class="col-xl-10">
            <div class="card shadow-lg">
              <div class="card-body px-4">
                <h1 class="fs-4 card-title fw-bold mb-4">Edit Profile</h1>

                <form action="" method="POST" class="needs-validation row g-3" novalidate="" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" value="<?=$data['info']['email']?>" class="form-control" id="inputEmail4" required>
                    <div class="invalid-feedback">
                      Email is invalid
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="leave it empty to not change">
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" name="address" value="<?=$data['info']['address']?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="col-md-6">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" name="username" value="<?=$data['info']['username']?>" class="form-control" id="inputUsername" pattern="[a-zA-Z0-9]{5,}" required>
                    <div class="invalid-feedback">
                      Username should be greater than 4 caracteres
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputDescription" class="form-label">Description</label>
                    <input type="text" name="description" value="<?=$data['info']['description']?>" class="form-control" id="inputDescription">
                  </div>
                  <div class="col-md-6">
                    <label for="inputImageProfile" class="form-label">Image Profile</label>
                    <input type="file" name="imageProfile" class="form-control" id="inputImageProfile">
                  </div>
                  <div class="col-md-4">
                    <label for="inputCountry" class="form-label">Country</label>
                    <input type="text" name="country" value="<?=$data['info']['country']?>" class="form-control" id="inputCountry">
                  </div>
                  <div class="col-md-4">
                    <label for="inputWork" class="form-label">work</label>
                    <select name="work_id" id="inputWork" class="form-select">
                      <option value='0'>Noting</option>
                      <?php
                      foreach($data['selectOptions'] as $option) {
                        $selected = $data['info']['work_id'] == $option['work_id'] ? 'selected' : null;
                        echo "<option $selected value='{$option['work_id']}'>" . $option['work'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="inputNumber" class="form-label">number</label>
                    <input type="number" name="number" value="<?=$data['info']['number']?>" class="form-control" id="inputNumber">
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck" required>
                      <label class="form-check-label" for="gridCheck">
                        Check me out
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
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
