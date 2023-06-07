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
    <a style="position:sticky; top:20px; left:15px; width:fit-content" href="<?=ROOT?>/Home" class="mt-2 opacity-75 z-1 fs-5 fw-bold btn btn-primary d-flex align-items-center gap-1"><i class="bi bi-chevron-left"></i>Acceuil</a>
    <!-- Wrapper container -->
    <div class="container pt-5">
      <div class="row justify-content-sm-center">
        <div class="col-xl-10">
          <div class="card shadow-lg">
            <div class="card-body px-4">
              <h1 class="fs-4 card-title fw-bold mb-4">Contacter Nous</h1>
                <div class="container py-4">

                  <!-- Bootstrap 5 starter form -->
                  <form action="" method="POST">

                    <!-- Email address input -->
                    <div class="mb-3">
                      <label class="form-label" for="emailAddress">Votre Addresse Email</label>
                      <input name="email" class="form-control" id="emailAddress" type="email" placeholder="Email Address" required/>
                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                      <label class="form-label" for="message">Message</label>
                      <textarea name="message" class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" required></textarea>
                    </div>

                    <!-- Form submit button -->
                    <div class="d-grid">
                      <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                    </div>
                    
                    <?php if (isset($data['errors'])) { ?>
                      <div class="alert alert-danger mt-2">
                        -<?=$data['errors']?>
                      </div>
                    <?php }?>

                  </form>

                </div>
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
