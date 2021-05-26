<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
</head>

<?php require 'header.php';?>

<body>
<?php //echo random_int(1,2); ?>
  <div class="card bg-white text-white">
    <img class="card-img" src="images/header_2.jpg" alt="Card image">
    <div class="card-img-overlay text-center" >
      <div style="background-color: rgba(0,0,0,0.5);display: inline-block;padding:1%">
        <h5 class="card-title"  > <p class="fs-1">Benvenuto su carshop</p></h5>
        <p class="card-text">Qui puoi comprare o noleggiare la tua auto preferita </p>
      </div>

  </div>
</div>

<main class="mt-5">
  <div class="container">


    <section class="text-center">
      <h4 class="mb-5"><strong>Compra o prenota la tua auto online in 3 semplici passi </strong></h4>

      <div class="row ">
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img
              src="images/step_1.png"
              class="img-fluid"
              />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Trova l'auto che fa per te</h5>
              <p class="card-text">
                Trova l'auto dei tuoi sogni ad un prezzo fisso vantaggioso.
              </p>
            </div>
            <div class="card-foter">

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img
              src="images/step_2.png"
              class="img-fluid"
              />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Scegli come pagarla</h5>
              <p class="card-text">
                La flessibilità è importante, ecco perché offriamo vari modi per permetterti di entrare in possesso dell'auto che vuoi.
              </p>
            </div>
            <div class="card-foter">

            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img
              src="images/step_3.png"
              class="img-fluid"
              />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Vieni a ritirarla</h5>
              <p class="card-text">
                I nostri consulenti specializzati renderanno l'esperienza rilassante.
              </p>
            </div>
            <div class="card-foter">

            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->
      <hr class="my-5" />
    </div>
  </main>
  <!--Main layout-->
</body>
<?php
require 'footer.php';
?>
</html>
