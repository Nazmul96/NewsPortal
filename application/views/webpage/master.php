<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/newDesign/globals.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/newDesign/styleguide.css" />
    -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/newDesign/style.css"/> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar_design">
          <a class="navbar-brand" href="#">
            <img class="nav_logo" src="<?php echo base_url()?>assets/newDesign/img/sr-white-1.svg"/>
          </a>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tips & Predictions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cricket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Foodball</a>
              </li>
            </ul>
            <button class="btn btn-warning ml-5">Sign In</button>
          </div>
      </nav>

    <div class="container-fluid mt-2 p-5">
    <div class="row">

    <div class="col-md-6" style="min-height: 100px !important;">
      <div class="card mb-3">
        <img src="https://i.ytimg.com/vi/7ZwCzKMqPrY/maxresdefault.jpg" class="card-img-top" alt="Left Image">
        <div class="card-body">
          <h5 class="card-title">Left Card</h5>
          <p class="card-text">Some description about the left card.</p>
        </div>
      </div>

    </div>

    <!-- Right Column with 4 Image Cards and Footer -->
    <div class="col-md-6">
        <div class="card mb-2">
            <img src="https://i.ytimg.com/vi/7ZwCzKMqPrY/maxresdefault.jpg" class="card-img-top" alt="Card Image 1">
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">Some description about Card 1.</p>
            </div>
        </div>
        <div class="card mb-2">
            <img src="https://i.ytimg.com/vi/7ZwCzKMqPrY/maxresdefault.jpg" class="card-img-top" alt="Card Image 1">
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">Some description about Card 1.</p>
            </div>
        </div>
    </div>
  </div>
</div>

    <footer class="footer_design">
      <p>&copy; 2024 SportsRani. All Rights Reserved.</p>
      <p>Follow us | Terms &amp; Conditions</p>
    </footer>
    <!-- Just an image -->
    <!-- <nav class="navbar navbar-light navbar_design">
      <a class="navbar-brand" href="#">
      <img class="nav_logo" src="<?php echo base_url()?>assets/newDesign/img/sr-white-1.svg"/>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
     </div>
    </nav> -->
    <!-- <div class="home-page-desig-of">
      <div class="div">

        <div class="overlap-6">
            <div class="rectangle"></div>
            <div class="frame-58">
              <img class="user" src="<?php echo base_url()?>assets/newDesign/img/user-2.png" />
              <img class="SR-white" src="<?php echo base_url()?>assets/newDesign/img/sr-white-1.svg" />
              <div class="frame-59">
                <div class="text-wrapper-27">Home</div>
                <div class="tips-predictions-wrapper"><div class="tips-predictions">Tips &amp; Predictions</div></div>
                <div class="frame-60"><div class="text-wrapper-28">Cricket</div></div>
                <div class="frame-61"><div class="text-wrapper-28">Foodball</div></div>
              </div>
              <div class="overlap-7">
                <img class="user-2" src="<?php echo base_url()?>assets/newDesign/img/user.svg" />
                <div class="frame-62">
                  <div class="text-wrapper-29">Sign in</div>
                  <img class="img-2" src="<?php echo base_url()?>assets/newDesign/img/user.svg" />
                </div>
              </div>
              <div class="rectangle-2"></div>
            </div>
        </div>


          <section class="content">

              <?php echo $web_content; ?>

          </section>


        <div class="overlap-5">
          <div class="frame-56">
            <div class="element-sportsrani-all">©2024&nbsp;&nbsp;SportsRani all right Reserved</div>
            <div class="text-wrapper-25">|</div>
            <div class="text-wrapper-26">Follow us</div>
            <div class="frame-57">
              <img class="facebook" src="<?php echo base_url()?>assets/newDesign/img/facebook.png" />
              <img class="img-3" src="<?php echo base_url()?>assets/newDesign/img/youtube.png" />
              <img class="x" src="<?php echo base_url()?>assets/newDesign/img/x.png" />
              <img class="img-3" src="<?php echo base_url()?>assets/newDesign/img/instagram.png" />
            </div>
          </div>
          <div class="terms-condition">Terms&nbsp;&nbsp;&amp;&nbsp;&nbsp;Condition</div>
        </div>


      </div>
    </div> -->
  </body>
</html>
