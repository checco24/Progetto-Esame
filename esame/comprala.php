<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/sidebar.css" rel="stylesheet" />
    </head>
    <?php
      require_once 'header.php';

      if (!isset($_SESSION["id"])) {
        echo "<script>
        alert('prima di continuare effettuare il login');
        window.location.replace('http://localhost/esame/accesso/login.php');
        </script>";
      }

    ?>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
              <!-- Page content-->
              <div class="container-fluid">
                <?php
                require_once("data/admin.php");
                $cards='
                <div class="row row-cols-1 row-cols-md-2 g-2">
                ';
                $automobili=$admin->prepare("select automobile.*, marca.nome_marca, sede.cap,sede.citta,sede.via,sede.civico, sede.id_sede from automobile
                left join marca on automobile.id_marca = marca.id_marca
                left join sede on automobile.id_sede = sede.id_sede
                where id_automobile=:id
                " );
                $automobili->bindParam("id",$_POST["id"]);
                $automobili->execute();
                while($data = $automobili->fetch( PDO::FETCH_ASSOC )){
                  $_SESSION["sede"]=$data["id_sede"];
                  if ($data["operazione"]=="noleggio") {
                    $path="cars/".$data["nome_marca"].".png";
                    $info =$data["tipo"]." | ".$data["cambio"]." | ".$data["km_percorsi"]."km | ".$data["anno_prod"];
                        $cards.='
                      <div class="col md-auto">
                        <div class="card mb-3" style="max-width:80%; height: auto; ">
                          <img src="'.$path.'" class="card-img-top rounded-top"  alt="...">
                        </div>
                      </div>
                      <div class="col md-auto">
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">'.$data["modello"].'</h5>
                          <p class="card-text">'.$info.'</p>
                          <p class="card-text">Noleggiala a:'.$data["prezzo"].'€/giorno</p>
                          <form method="post" action="">
                          <label class="form-label" for="inizio_noleggio"> data inizio noleggio</label>
                          <input class="form-control" onchange="handler(event);" type="date" id="inizio_noleggio" name="inizio_noleggio" required>
                          <label class="form-label" for="fine_noleggio"> data fine noleggio</label>
                          <input class="form-control" type="date" id="fine_noleggio"  name="fine_noleggio" required>
                          <br>
                          <input type="submit" class="btn btn-primary" name="noleggio" value="Prenota appuntamento"/>
                          <input type="hidden" value="'.$data["id_automobile"].'" name="id">
                          </form>
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                        ';

                  }else {
                    $path="cars/".$data["nome_marca"].".png";
                    $info =$data["tipo"]." | ".$data["cambio"]." | ".$data["km_percorsi"]."km | ".$data["anno_prod"];
                        $cards.='
                      <div class="col md-auto">
                        <div class="card mb-3" style="max-width:80%; height: auto; ">
                          <img src="'.$path.'" class="card-img-top rounded-top"  alt="...">
                        </div>
                      </div>
                      <div class="col md-auto">
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">'.$data["modello"].'</h5>
                          <p class="card-text">'.$info.'</p>
                          <p class="card-text">Coprala a:'.$data["prezzo"].'€</p>
                          <form method="post" action="">
                          <label class="form-label" for="inizio_noleggio"> Prenota appuntamento</label>
                          <input class="form-control" type="date" id="prenotazione_app" name="prenotazione_app" required>
                          <br>
                          <input type="submit" class="btn btn-primary" name="compra" value="Prenota appuntamento"/>
                          <input type="hidden" value="'.$data["id_automobile"].'" name="id">
                          </form>
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                        ';
                  }
                  }
                  echo $cards;
                 ?>
                 <div class="row">
                   <div class="col" style="padding-left:2%">

                      <p class="card-text" >
                        <h5 class="card-title">14 giorni di garanzia </h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  class="bi bi-check-circle" viewBox="0 0 16 16">
                           <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                           <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                         </svg>
                          Non sei completamente soddisfatto? Ti rimborsiamo il prezzo di acquisto del veicolo
                      </p>
                   </div>
                   <div class="col">
                     <p class="card-text">
                       <h5 class="card-title">Assolutamente sicure</h5>
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                       Seguiamo puntualmente i piani manutentivi, per farti guidare senza preoccupazioni e senza sorprese
                     </p>
                   </div>
                 </div>
              </div>
          </div>
        </div>
        <script type="text/javascript">
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if(dd<10){dd='0'+dd}
        if(mm<10){mm='0'+mm}
        today = yyyy+'-'+mm+'-'+dd;
        try {
          document.getElementById("prenotazione_app").setAttribute("min", today);
        } catch (e) {}
        try {
          document.getElementById("inizio_noleggio").setAttribute("min", today);
        } catch (e) {}
        try {
          document.getElementById("fine_noleggio").setAttribute("min", today);
        } catch (e) {}
        function handler(e){
          //alert(e.target.value);
          document.getElementById("fine_noleggio").min= document.getElementById("inizio_noleggio").value;

        }
        </script>
        <script src="js/sidebar.js"></script>
    </body>
</html>
<?php
  require_once 'footer.php';
require_once("data/admin.php");

if (isset($_POST["noleggio"])) {
  $prenotazione=$admin->prepare("insert into noleggio (id_automobile,data_inizio,data_fine,id_utente,id_sede)
  values(:id_auto,:inizio,:fine,:utente,:sede) ");
  $prenotazione->bindParam(":id_auto",$_POST["id"]);
  $prenotazione->bindParam(":inizio",$_POST["inizio_noleggio"]);
  $prenotazione->bindParam(":fine",$_POST["fine_noleggio"]);
  $prenotazione->bindParam(":utente",$_SESSION["id"]);
  $prenotazione->bindParam(":sede",$_SESSION["sede"]);
  $prenotazione->execute();
  $_POST["noleggio"]="";
  unset($_POST["noleggio"]);
  if (count($prenotazione->fetchAll())==0) {
    echo "<script>alert('Prenotazione avvenuta con successo');</script>";
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
    mail($_SESSION["email"],"Prenotazione appuntamento","Ti aspettiamo in concessionaria il: ".$_POST["inizio_noleggio"]);
  }
}

if (isset($_POST["compra"])) {
  $prenotazione=$admin->prepare("insert into vendita (data_vendita,id_utente,id_automobile)
  values(:inizio,:utente,:id_auto) ");
  $prenotazione->bindParam(":inizio",$_POST["prenotazione_app"]);
  $prenotazione->bindParam(":utente",$_SESSION["id"]);
  $prenotazione->bindParam(":id_auto",$_POST["id"]);
  $prenotazione->execute();
  $_POST["compra"]="";
  unset($_POST["compra"]);
  if (count($prenotazione->fetchAll())==0) {
    echo "<script>alert('Prenotazione avvenuta con successo');</script>";
    echo "<script>window.location.replace('http://localhost/esame/'); </script>";
    mail($_SESSION["email"],"Prenotazione appuntamento","Ti aspettiamo in concessionaria il: ".$_POST["prenotazione_app"]);
  }
}












?>
