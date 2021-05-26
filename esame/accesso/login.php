<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off" >
                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email"
                  pattern="^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]"  required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<a href="forgot.php" class="float-end">
											Forgot Password?
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-grid">
									<button type="submit" class="btn btn-primary">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.php" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--script js per verificare se i campi sono stati riempiti tutti-->
	<script src="../js/login.js"></script>
</body>


</html>
<?php
require_once '../footer.php';

require_once("../data/admin.php");
include "controlla_dati.php";

//array composto da dati e valori passati
if (isset($_POST["email"]) && strlen($_POST["email"]>0)) {
  $raw_data = [
    'email'=>$_POST['email'],
    'pwd'=>hash("sha512",$_POST['password']),
  ];

  //var_dump($raw_data);
  //array composto da "valore => boolean" che è il risultato del metodo
  $checked_data = [
    'email'=>controlla_email($_POST['email'])
  ];
  if (!array_search(0,$checked_data)) {
    $verifica=$admin -> prepare("select utente.id_utente, dipendente.super from utente
    left join dipendente on utente.id_utente=dipendente.id_utente
    where utente.email=:email and utente.password=:pwd");
    $verifica->bindParam(":email",$raw_data['email']);
    $verifica->bindParam(":pwd",$raw_data['pwd']);
    $verifica->execute();
    $res=$verifica->fetch();
    if (count($res)>0) {
      $_SESSION["email"]=$raw_data['email'];
      $_SESSION["pwd"]=$raw_data['pwd'];
      $_SESSION["adm"]=$res["super"];
      $_SESSION["id"]=$res["id_utente"];
      $_POST["email"]="0";
      echo "<script>alert('Login effettuato con successo');</script>";
      echo "<script>window.location.replace('http://localhost/esame/'); </script>";

    }else {
      echo "<script>alert('Ricontrollare i dati inseriti');</script>";
    }
  }else {
    echo "<script>alert('Ricontrollare i dati inseriti');</script>";
  }
}

 ?>
