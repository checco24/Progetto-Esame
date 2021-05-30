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
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" action="" class="needs-validation" autocomplete="off">

                <div class="mb-3">
									<label class="mb-2 text-muted" for="name">Nome</label>
									<input id="name" type="text" class="form-control" name="name" value=""
                  pattern="^[a-zA-Z]{1,12}$" required autofocus>
									<div class="invalid-feedback">
										Nome is required
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="surname">Cognome</label>
									<input id="surname" type="text" class="form-control" name="surname"
                  pattern="^[a-zA-Z]{1,12}$" required>
									<div class="invalid-feedback">
										Cognome is required
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email"
                  pattern="^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]"  required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="data_nascita">Data di nascita</label>
                  <input id="data_nascita" type="date" class="form-control" name="data_nascita"

                  required>
                    <div class="invalid-feedback">
                      Data di nascita is required
                    </div>
                </div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                <div class="mb-3">
									<label class="mb-2 text-muted" for="password2">Ripetere la password</label>
									<input id="password2" type="password" class="form-control" name="password2" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<p class="form-text text-muted mb-3">
									By registering you agree with our terms and condition.
								</p>

								<div class="d-grid">
									<button type="submit" class="btn btn-primary">
										Register
									</button>
								</div>
							</form>
						</div>
          <!--  <div class="text-center">
                  <p>or sign up with:</p>
                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-facebook"></i>
                  </button>
                  <i class="bi bi-facebook"></i>

                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-google"></i>
                  </button>

                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-twitter"></i>
                  </button>

                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-github"></i>
                  </button>
                </div>-->
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="login.php" class="text-dark">Login</a>
							</div>
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


if (isset($_POST["name"])) {

  //array composto da dati e valori passati
  $raw_data = [
    'nome'=>$_POST['name'],
    'cognome'=>$_POST['surname'],
    'email'=>$_POST['email'],
    'data_nascita'=>$_POST['data_nascita'],
    'pwd'=>hash("sha512",$_POST['password']),
  ];

  //var_dump($raw_data);
  echo "<br>";
  //array composto da "valore => boolean" che è il risultato del metodo
  $checked_data = [
    'nome'=> controlla_nome($_POST['name']),
    'cognome'=>controlla_cognome($_POST['surname']),
    'email'=>controlla_email($_POST['email']),
    'data_nascita'=>controlla_data($_POST['data_nascita']),
    'password'=>controlla_password($_POST['password'],$_POST['password2']),
  ];
  if (!array_search(0,$checked_data)) {
    $verifica=$lettura_scrittura -> prepare("select nome from utente where email=:email and password=:pwd");
    $verifica->bindParam(":email",$raw_data['email']);
    $verifica->bindParam(":pwd",$raw_data['pwd']);
    $verifica->execute();
    $res = $verifica->fetchAll();
    if (count($res)==0) {

      $inserisci = $lettura_scrittura -> prepare("insert into utente (nome,cognome,anno_nascita,password,email)
      values(:nome,:cognome,:anno_nascita,:password, :email)");
      $inserisci->bindParam(":nome",$raw_data["nome"]);
      $inserisci->bindParam(":cognome",$raw_data["cognome"]);
      $inserisci->bindParam(":anno_nascita",$raw_data["data_nascita"]);
      $inserisci->bindParam(":password",$raw_data["pwd"]);
      $inserisci->bindParam(":email",$raw_data["email"]);

      $inserisci->execute();
      mail($raw_data['email'],"carshop","grazie per averci scelto");
      echo "<script>alert('Account creato correttamente');</script>";
      echo "<script>window.location.replace('http://localhost/esame/accesso/login.php'); </script>";


    }else {
      echo "<script>alert('impossibile create l'utente. Utente già esistente');</script>";
    }
  }else {
    echo "<script>alert('Ricontrollare i dati inseriti');</script>";
  }
  //  var_dump($checked_data);
}

 ?>
