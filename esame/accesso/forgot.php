<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot</title>
  <script src="../js/bootstrap.bundle.min.js"  type="text/javascript"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<?php

  require '../header.php';
?>
<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Reset password</h1>
							<form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off" >
                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email"
                  pattern="^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]"  required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>
								<div class="d-grid">
									<button type="submit" class="btn btn-primary">
										Reset password
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--script js per verificare se i campi sono stati riempiti tutti-->
	<script src="../js/login.js"></script>
</body>

<?php
require '../footer.php';
 ?>
</html>
<?php

require_once("../data/admin.php");
include "controlla_dati.php";

//array composto da dati e valori passati
if (isset($_POST["email"]) && strlen($_POST["email"]>0)) {
  $date = new DateTime();
  $raw_data = [
    'email'=>$_POST['email'],
    'token'=>$date->getTimestamp()
  ];
  $verifica=$admin -> prepare("select id_utente from utente where email=:email");
  $verifica->bindParam(":email",$_POST['email']);
  $verifica->execute();
  $res = $verifica->fetchAll();
  if (count($res)>0) {

    var_dump($raw_data);
    $checked_data = [
      'email'=>controlla_email($_POST['email'])
    ];

    if (!array_search(0,$checked_data)) {
      $verifica=$admin -> prepare("update utente set token=:token where email=:email");
      $verifica->bindParam(":token",$raw_data['token']);
      $verifica->bindParam(":email",$raw_data['email']);
      $verifica->execute();
      echo "<script>alert();</script>";
      if (count($res)>0) {
        mail($raw_data['email'],"Reset password","
        clicca questo link per resettare la password<br>
        <a href='http://localhost/esame/accesso/reset.php?token=".$raw_data['token']."'>http://localhost/esame/accesso/reset.php?token=".$raw_data['token']."</a>

        ");
        echo "<script>alert('Controlla la tua casella di posta');</script>";
        echo "<script>window.location.replace('http://localhost/esame/'); </script>";

      }else {
        echo "<script>alert('Ricontrollare i dati inseriti');</script>";
      }
    }else {
      echo "<script>alert('Ricontrollare i dati inseriti');</script>";
    }
  }
}

 ?>
