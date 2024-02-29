<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/newDesign/globals.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/newDesign/styleguide.css" />
    -->
    <link
      rel="stylesheet"
      href="<?php echo base_url()?>assets/newDesign/style.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>

  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar_design">
      <a class="navbar-brand" href="#">
        <img class="nav_logo" src="<?php echo base_url()?>assets/newDesign/img/sr-white-1.svg"
        />
      </a>
      <div
        class="collapse navbar-collapse justify-content-center"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
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

  <?php echo $web_content; ?>
 
  <footer class="footer_design mt-4">
    <p>&copy; 2024 SportsRani. All Rights Reserved.</p>
    <p>Follow us | Terms &amp; Conditions</p>
  </footer>

  </body>
</html>
