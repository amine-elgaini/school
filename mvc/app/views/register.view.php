<!DOCTYPE html>
<html lang="en" class="h-100">
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
  <body class="login h-100">
  <section class="login h-100">
    <a href="<?=ROOT?>/home" class="fs-5 position-fixed btn btn-primary m-3 d-flex align-items-center gap-1"><i class="bi bi-house"></i>Home</a>
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<a href="#"><img src="<?=ROOT?>/assets/imgs/logo.png" alt="logo" width="100"></a>
					</div>
					<div class="card shadow-lg">
          <div class="card-body px-5">
              <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

              <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="username">username</label>
                  <input id="username" type="text" class="form-control" name="username"  pattern="[a-zA-Z0-9]{4,}" required autofocus>
                  <div class="invalid-feedback">
                    Username should be greater than 4 caracteres
                  </div>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                  <input id="email" type="email" class="form-control" name="email" value="" required>
                  <div class="invalid-feedback">
                    Email is invalid
                  </div>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="password">Password</label>
                  <input id="password" type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">
                      Password is required
                    </div>
                </div>

                  <!-- Show Registring Results -->
                  <?php
                    // here will be result of edit

                    if(count($data['errors'])) {
                      echo '<div class="text-center errors alert alert-danger mt-2">';
                        foreach($data['errors'] as $error) {
                          echo "<p>- $error</p>";
                        }
                      echo '</div>';
                    }
                    if(!empty($data['registration']['registration'])) {
                      echo '<div class="text-center success alert alert-success mt-2">';
                          echo "<p>- {$data['registration']['registration']}</p>";
                      echo '</div>';
                    }
                  ?>
                
                <p class="form-text text-muted mb-3">
                  By registering you agree with our terms and condition.
                </p>

                <div class="align-items-center d-flex">
                  <button type="submit" name="register" class="btn btn-primary ms-auto">
                    Register	
                  </button>
                </div>
              </form>

            </div>
            <div class="card-footer py-3 border-0">
              <div class="text-center">
                Already have an account? <a href="<?=ROOT?>/login">Login</a>
              </div>
            </div>
            </div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2022-2023 &mdash; SCHOOL 
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
