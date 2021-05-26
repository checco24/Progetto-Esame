<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registrati</title>
  <script src="../js/bootstrap.bundle.min.js"  type="text/javascript"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<?php
  require_once '../header.php';

?>
<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<h1></h1>
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Reset password</h1>
							<form method="POST" action="" class="needs-validation" autocomplete="off">

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                <div class="mb-3">
									<label class="mb-2 text-muted" for="password2">Password</label>
									<input id="password2" type="password" class="form-control" name="password2" required>
								    <div class="invalid-feedback">
								    	Password2 is required
							    	</div>
								</div>


								<div class="d-grid">
									<button type="submit" class="btn btn-primary">
										Reset
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="../js/login.js"></script>
</body>
<?php
  require_once '../footer.php';
   ?>
</html>


<?php
require_once("../data/leggi_scrivi.php");
include "controlla_dati.php";




if (isset($_GET["token"]) && isset($_GET["token"])) {
  //array composto da dati e valori passati
  $raw_data = [
    'pwd'=>hash("sha512",$_POST['password']),
  ];
  //array composto da "valore => boolean" che è il risultato del metodo
  $checked_data = [
    'password'=>controlla_password($_POST['password'],$_POST['password2'])
  ];
  if (!array_search(0,$checked_data)) {

      $inserisci = $lettura_scrittura -> prepare("update utente set password=:pwd,token=null where token=:token");
      $inserisci->bindParam(":pwd",$raw_data["pwd"]);
      $inserisci->bindParam(":token",$_GET["token"]);

      $inserisci->execute();
      echo "<script>alert('password aggiornata correttamente');</script>";
      echo "<script>window.location.replace('http://localhost/esame/'); </script>";

  }else {
    echo "<script>alert('Ricontrollare i dati inseriti');</script>";
  }
}




 ?>
