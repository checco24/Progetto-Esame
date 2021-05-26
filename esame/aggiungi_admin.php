<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aggiungi admin</title>
  <script src="js/bootstrap.bundle.min.js"  type="text/javascript"></script>
  <link rel="stylesheet" href=".css/bootstrap.min.css">

</head>
<?php
  require_once 'header.php';
    require_once("data/admin.php");
  if ($_SESSION["adm"]==0 || !isset($_SESSION["adm"])) {
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
  }


?>
<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
					<div class="card shadow-lg">
						<div class="card-body">
              <form class="needs-validation" action="" method="get">
                <button type='submit' class='btn btn-primary' name='btn_dipendenti' value=''>mostra dipendenti</button>
                <button type='submit' class='btn btn-primary' name='btn_utenti' value=''>mostra utenti</button>
              </form>
              <?php
              if (isset($_GET["btn_dipendenti"])) {
                require_once "tabella_utenti_data/dipendenti.php";
              }
              if (isset($_GET["btn_utenti"])) {
                require_once "tabella_utenti_data/utenti.php";
              }

               ?>
						</div>
					</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
<?php
  require_once 'footer.php';


if (isset($_POST["rimuovi"]) && strlen($_POST["rimuovi"])>0) {

  $query =$admin->prepare("update dipendente set super='0' where id_utente=:id");
  $query->bindParam(":id",$_POST["rimuovi"]);

  $query->execute();
  $_POST["rimuovi"]="";
  unset($_POST["rimuovi"]);
  if (count($query->fetchAll())==0) {
    echo "<script>alert('Utente aggiornato correttamente');</script>";
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
  }
}

if (isset($_POST["aggiungi"]) && strlen($_POST["aggiungi"])>0) {
  $query =$admin->prepare("update dipendente set super='1' where id_utente=:id");
  $query->bindParam(":id",$_POST["aggiungi"]);

  $query->execute();
  $_POST["aggiungi"]="";
  unset($_POST["aggiungi"]);
  if (count($query->fetchAll())==0) {
    echo "<script>alert('Utente aggiornato correttamente');</script>";
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
  }

}

if (isset($_POST["aggiungi_dipendente"]) && strlen($_POST["aggiungi_dipendente"])>0) {
  $query_agg =$admin->prepare("insert into dipendente (id_utente, super, id_sede) values (:utente,0,:sede)");
  $query_agg->bindParam(":utente",$_POST["aggiungi_dipendente"]);
  $query_agg->bindParam(":sede",$_POST["sede"]);
  $query_agg->execute();
  $_POST["aggiungi_dipendente"]="";
  unset($_POST["aggiungi"]);
  $_POST["sede"]="";
  unset($_POST["sede"]);
  if (count($query_agg->fetchAll())==0) {
    echo "<script>alert('Utente aggiornato correttamente');</script>";
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
  }

}

if (isset($_POST["rimuovi_dipendente"]) && strlen($_POST["rimuovi_dipendente"])>0) {
  $query_agg =$admin->prepare("delete from dipendente where id_utente=:id");
  $query_agg->bindParam(":id",$_POST["rimuovi_dipendente"]);
  $query_agg->execute();
  $_POST["rimuovi_dipendente"]="";
  unset($_POST["rimuovi_dipendente"]);
  if (count($query_agg->fetchAll())==0) {
    echo "<script>alert('Utente aggiornato correttamente');</script>";
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
  }

}












 ?>
