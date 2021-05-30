<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aggiungi macchina</title>
  <script src="js/bootstrap.bundle.min.js"  type="text/javascript"></script>
  <link rel="stylesheet" href=".css/bootstrap.min.css">

</head>
<?php
  require_once 'header.php';
  require_once("data/leggi.php");
  if ( !isset($_SESSION["adm"])) {
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
  }


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
							<h1 class="fs-4 card-title fw-bold mb-4">Aggiungi</h1>
							<form method="POST" action="" class="needs-validation" autocomplete="off">

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="km">modello</label>
                  <input id="modello" type="text" class="form-control" name="modello" required>
                  <div class="invalid-feedback">
                    nome is required
                  </div>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="km">Prezzo(€)</label>
                  <input id="prezzo" type="number" class="form-control" name="prezzo" required>
                  <div class="invalid-feedback">
                    prezzo is required
                  </div>
                </div>

                <div class="mb-3">
									<label class="mb-2 text-muted" for="cambio">Cambio</label>
									<select class="form-select" name="cambio" id="cambio">
                    <option value="manuale">manuale</option>
                    <option value="automatico">automatico</option>
                  </select>
									<div class="invalid-feedback">
										Cambio is required
									</div>
								</div>



								<div class="mb-3">
									<label class="mb-2 text-muted" for="km">Chilometraggio(km)</label>
									<input id="km" type="number" class="form-control" name="km" required>
									<div class="invalid-feedback">
										Chilometraggio is required
									</div>
								</div>

                <div class="mb-3">
                <label>Anno</label><br>
                <select class="form-select" id="anno_prod" name="anno_prod">
                  <?php
                    for ($i=0; $i <20; $i++) {
                      echo '<option value="'.date("Y")-$i.'">'.date("Y")-$i.'</option>';
                    }
                   ?>
                </select>
              </div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="alimentazione">Alimentazione veicolo</label>
                  <select class="form-select" name="alimentazione" id="alimentazione">
                    <option value="benzina">benzina</option>
                    <option value="diesel">diesel</option>
                    <option value="elettrica">elettrica</option>
                    <option value="hybrid">hybrid</option>
                  </select>
								</div>

                <div class="mb-3">
									<label class="mb-2 text-muted" for="alimentazione">Operazione</label>
                  <select class="form-select" name="operazione" id="operazione">
                    <option value="noleggio">noleggio</option>
                    <option value="vendita">vendita</option>
                  </select>
								</div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="tipologia">Tipologia</label>
                  <select class="form-select" name="tipologia" id="tipologia">
                    <option value="nuova">nuova</option>
                    <option value="ricondizionata">ricondizionata</option>
                    <option value="usata">usata</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="data_nascita">scegliere la marca</label>
                  <select class="form-select" name="marca" id="marca">
                    <?php
                    $marca=$lettura->prepare("select * from marca");
                    $marca->execute();
                    while($data = $marca->fetch( PDO::FETCH_ASSOC )){
                            echo '<option value="'.$data['id_marca'].'">'.$data['nome_marca'].'</option>';
                      }
                     ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="data_nascita">scegliere la sede</label>
                  <select class="form-select" name="sede" id="sede">
                    <?php
                    $sedi=$lettura->prepare("select * from sede");
                    $sedi->execute();
                    while($data = $sedi->fetch( PDO::FETCH_ASSOC )){
                            echo '<option value="'.$data['id_sede'].'">'.$data['citta'].', '.$data['via'].', '.$data['civico'].', '.$data['cap'].'</option>';
                      }
                     ?>
                  </select>
                </div>

								<div class="d-grid">
									<button type="submit" class="btn btn-primary">
										Aggiungi
									</button>
								</div>
							</form>
						</div>
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
  require_once("data/agg_auto.php");

if (isset($_POST["modello"]) && isset($_POST["km"])) {

  $data=[
    'modello'=>$_POST['modello'],
    'prezzo'=>$_POST['prezzo'],
    'cambio'=>$_POST['cambio'],
    'km'=>$_POST['km'],
    'anno_prod'=>$_POST['anno_prod'],
    'condizione'=>$_POST['tipologia'],
    'operazione'=>$_POST['operazione'],
    'tipo'=>$_POST['alimentazione'],
    'marca'=>$_POST['marca'],
    'sede'=>$_POST['sede'],
    'utente'=>$_SESSION['id']
  ];

$query =$agg_auto->prepare("insert into automobile (modello, prezzo, cambio, km_percorsi, anno_prod, condizione, operazione, tipo, id_marca, id_sede, id_dipendente)
values (:modello, :prezzo, :cambio, :km_percorsi, :anno_prod, :condizione, :operazione, :tipo, :id_marca, :id_sede, :id_utente)");
$query->bindParam(":modello",$data["modello"]);
$query->bindParam(":prezzo",$data["prezzo"]);
$query->bindParam(":cambio",$data["cambio"]);
$query->bindParam(":km_percorsi",$data["km"]);
$query->bindParam(":anno_prod",$data["anno_prod"]);
$query->bindParam(":condizione",$data["condizione"]);
$query->bindParam(":operazione",$data["operazione"]);
$query->bindParam(":tipo",$data["tipo"]);
$query->bindParam(":id_marca",$data["marca"]);
$query->bindParam(":id_sede",$data["sede"]);
$query->bindParam(":id_utente",$data["utente"]);

$query->execute();
if (count($query->fetchAll())==0) {
  echo "<script>alert('Automobile caricata correttamente');</script>";
}
}


 ?>
