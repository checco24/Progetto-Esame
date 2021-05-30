<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/sidebar.css" rel="stylesheet" />
    </head>
    <?php
      require_once 'header.php';
    ?>
    <body>
      <div class="row">
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Ricerca avanzata</button>
                </div>
            </nav>
        </div>
      </div>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3">
                      <label>Marca e modello</label><br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="fiat" id="fiat" name="marca">
                        <label class="form-check-label" for="fiat">
                          Fiat
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="ford" id="ford" name="marca">
                        <label class="form-check-label" for="ford">
                          Ford
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="peugeot" id="peugeot" name="marca">
                        <label class="form-check-label" for="peugeot">
                          Peugeot
                        </label>
                      </div>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3">
                      <label>Alimentazione</label><br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="alimentazione" id="benzina">
                        <label class="form-check-label" for="benzina">
                          Benzina
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="alimentazione" id="diesel">
                        <label class="form-check-label" for="diesel">
                          Diesel
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="alimentazione" id="elettrica">
                        <label class="form-check-label" for="elettrica">
                          Elettrica
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="alimentazione" id="hybrid">
                        <label class="form-check-label" for="hybrid">
                          Hybrid
                        </label>
                      </div>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3">
                      <label>Condizione</label><br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="condizione" id="nuova">
                        <label class="form-check-label" for="nuova">
                          Nuova
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="condizione" id="ricondizionata">
                        <label class="form-check-label" for="ricondizionata">
                          Ricondizionata
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="condizione" id="usata">
                        <label class="form-check-label" for="usata">
                          Usata
                        </label>
                      </div>
                    </a>

                    <a class="list-group-item list-group-item-action list-group-item-light p-3">
                      <label>Cambio</label><br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="cambio" id="automatico">
                        <label class="form-check-label" for="automatico">
                          Automatico
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="cambio" id="manuale">
                        <label class="form-check-label" for="manuale">
                          Manuale
                        </label>
                      </div>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3">
                      <label>Anno</label><br>
                      <select class="form-select" id="anno_min">
                        <?php
                        echo '<option value="'. date("Y")-19 .'">minimo</option>';
                          for ($i=0; $i <20; $i++) {
                            echo '<option value="'.date("Y")-$i.'">'.date("Y")-$i.'</option>';
                          }
                         ?>
                      </select>
                      <select class="form-select" id="anno_max">
                        <?php
                        echo '<option value="'. date("Y") .'">massimo</option>';
                          for ($i=0; $i <20; $i++) {
                            echo '<option value="'.date("Y")-$i.'">'.date("Y")-$i.'</option>';
                          }
                         ?>
                      </select>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3">
                      <label>Chilometraggio</label><br>
                      <select class="form-select"  name="km_min">
                        <option value="0">minimo</option>
                        <option value="10000">10.000 km</option>
                        <option value="25000">25.000 km</option>
                        <option value="50000">50.000 km</option>
                        <option value="75000">75.000 km</option>
                        <option value="100000">100.000 km</option>
                        <option value="125000">125.000 km</option>
                        <option value="150000">150.000 km</option>
                        <option value="200000">200.000 km</option>
                      </select>
                      <select class="form-select" name="km_max">
                        <option value="1000000000000000000">massimo</option>
                        <option value="10000">10.000 km</option>
                        <option value="25000">25.000 km</option>
                        <option value="50000">50.000 km</option>
                        <option value="75000">75.000 km</option>
                        <option value="100000">100.000 km</option>
                        <option value="125000">125.000 km</option>
                        <option value="150000">150.000 km</option>
                        <option value="200000">200.000 km</option>
                      </select>
                    </a>
                    <form class="" action="cerca.php" method="post">
                      <div class="d-grid">
      									<button type="submit" class="btn btn-primary">
      										Cerca
      									</button>
      								</div>
                    </form>
                      <div class="d-grid">
      									<button type="submit" class="btn" onclick="location.reload();">
      										Resetta
      									</button>
      								</div>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
              <!-- Page content-->
              <div class="container-fluid">
                <?php
                require_once("data/admin.php");
                $cards='
                <div class="row row-cols-1 row-cols-md-3 g-4">
                ';
                $automobili=$admin->prepare("
                select automobile.*, marca.nome_marca, sede.cap,sede.citta,sede.via,sede.civico,noleggio.data_fine,vendita.data_vendita from automobile
                left join marca on automobile.id_marca = marca.id_marca
                left join sede on automobile.id_sede = sede.id_sede
                left join noleggio on automobile.id_automobile = noleggio.id_automobile
                left join vendita on automobile.id_automobile = vendita.id_automobile
                ");
                $automobili->execute();
                while($data = $automobili->fetch( PDO::FETCH_ASSOC )){
                  $path="cars/".$data["nome_marca"].".png";
                  $href="https://www.google.it/";
                  $info =$data["tipo"]." | ".$data["cambio"]." | ".$data["km_percorsi"]."km | ".$data["anno_prod"];

                  if ($data["operazione"]=="vendita") {
                    $cards.='
                  <div class="col">
                    <div class="card" style="max-width:80%; height: auto; ">
                      <img src="'.$path.'" class="card-img-top rounded-top"  alt="...">
                      <div class="card-body">
                        <h5 class="card-title">'.$data["modello"].'</h5>
                        <p class="card-text">'.$info.'</p>
                        <p class="card-text">Comprala a:'.$data["prezzo"].'€/giorno</p>
                      </div>';
                      if ($data["data_vendita"]>date("Y-m-d")) {
                        $cards.='
                        <div class="card-footer">
                          <p class="card-text">Auto venduta</p>
                        </div>';
                      }else {
                        $cards.='
                        <div class="card-footer">
                          <form method="post" action="comprala.php">
                          <input type="submit" class="btn btn-link" value="Visualizza"/>
                          <input type="hidden" value="'.$data["id_automobile"].'" name="id"/>
                          </form>
                        </div>';
                      }
                      $cards.="
                        </div>
                      </div>";
                  }

                  if ($data["operazione"]=="noleggio") {
                    $cards.='
                  <div class="col">
                    <div class="card" style="max-width:80%; height: auto; ">
                      <img src="'.$path.'" class="card-img-top rounded-top"  alt="...">
                      <div class="card-body">
                        <h5 class="card-title">'.$data["modello"].'</h5>
                        <p class="card-text">'.$info.'</p>
                        <p class="card-text">Noleggiala a:'.$data["prezzo"].'€/giorno</p>
                      </div>';
                      if ($data["data_fine"]>date("Y-m-d")) {
                        $cards.='
                        <div class="card-footer">
                          <p class="card-text">Auto prenotata fino a: '.$data["data_fine"].'</p>
                        </div>';
                      }else {
                        $cards.='
                        <div class="card-footer">
                          <form method="post" action="comprala.php">
                          <input type="submit" class="btn btn-link" value="Visualizza"/>
                          <input type="hidden" value="'.$data["id_automobile"].'" name="id">
                          </form>
                        </div>';
                      }



                      $cards.='
                    </div>
                  </div>
                    ';
                  }

                  }
                  $cards.="
                    </div>
                  </div>";
                  echo $cards;
                 ?>
              </div>
          </div>
        </div>
        <script src="js/sidebar.js"></script>
    </body>
</html>
<?php
  require_once 'footer.php';
?>
