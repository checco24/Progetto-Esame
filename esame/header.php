<!DOCTYPE html>

<?php
session_start();

 ?>
<html lang="en">
<head>
  <script src="js/bootstrap.bundle.min.js"  type="text/javascript"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>
	CarShop
  </title>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-fixed navbar-light bg-light">
  <div class="container-fluid">
    &ensp; &ensp; &ensp;
    <a class="navbar-brand" href="http://localhost/esame/index.php">CarShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/esame/acquisto.php">Acquista un'auto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/esame/noleggio.php">Noleggia un'auto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/esame/tutto.php">Sfoglia tutte le auto</a>
        </li>

        <?php
        if (isset($_SESSION["adm"])) {
          if ($_SESSION["adm"]>=0) {
            echo '<li class="nav-item">
              <a class="nav-link" href="http://localhost/esame/aggiungi.php">aggiungi un auto</a>';
              if ($_SESSION["adm"]==1) {
                echo'</li><li class="nav-item">
                <a class="nav-link" href="http://localhost/esame/aggiungi_admin.php">tabella admin</a>
              </li>';
              }

          }
        }
         ?>
      </ul>

      <?php
      if (isset($_SESSION["pwd"])) {
        echo '
        <span class="d-flex ">
            <a><input type="button" class="btn btn-primary"  value="'.$_SESSION["email"].'"/></a>
            <form method="post" action="http://localhost/esame/logout.php">
  		      <a href=""><input type="submit" class="btn btn-link" value="logout"/></a></form>
        </span>
        ';
      }else {
        echo '<span class="d-flex ">
            <a href="http://localhost/esame/accesso/login.php"><input type="button" class="btn btn-primary"  value="Login"/></a>
            <a href="http://localhost/esame/accesso/register.php"><input type="button" class="btn btn-link" value="Register"/></a>
        </span>';
      }
       ?>
    </div>
  </div>
</nav>
<!--http://localhost/esame/-->
</body>
</html>
