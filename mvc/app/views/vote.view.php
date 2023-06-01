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
  
    <section class="vh-100" style="background-color: #9de2ff;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-md-9 col-lg-7 col-xl-5">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-4">
                <div class="d-flex text-black">
                  <div class="flex-shrink-0">
                    <img src="./uploads/default_img.png"
                      alt="Generic placeholder image" class="img-fluid"
                      style="width: 180px; border-radius: 10px;">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h5 class="mb-1">Danny McLoan</h5>
                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Senior Journalist</p>
                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                      style="background-color: #efefef;">
                      <div>
                        <p class="small text-muted mb-1">Articles</p>
                        <p class="mb-0">41</p>
                      </div>
                      <div class="px-3">
                        <p class="small text-muted mb-1">Followers</p>
                        <p class="mb-0">976</p>
                      </div>
                      <div>
                        <p class="small text-muted mb-1">Rating</p>
                        <p class="mb-0">8.5</p>
                      </div>
                    </div>
                    <div class="d-flex pt-1">
                      <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                      <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src='<?=ROOT?>/assets/js/bootstrap.bundle.min.js'></script>
  </body>
</html>