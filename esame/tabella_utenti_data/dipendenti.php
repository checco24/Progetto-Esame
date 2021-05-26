<form method="POST" action="" class="needs-validation" autocomplete="off">
  <h1 class="fs-4 card-title fw-bold mb-4">Tabella dipendenti</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">nome</th>
        <th scope="col">cognome</th>
        <th scope="col">email</th>
        <th scope="col">admin</th>
        <th scope="col">aggiungi/rimuovi potere admin</th>
        <th scope="col">rimuovi dipendente</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $utenti =$admin->prepare("select utente.id_utente, utente.nome, utente.cognome, utente.email, dipendente.super, sede.*
    from dipendente
    inner join utente on utente.id_utente=dipendente.id_utente
    inner join sede on sede.id_sede=dipendente.id_sede
    ");
    $utenti->execute();
    while($data = $utenti->fetch( PDO::FETCH_ASSOC )){
        echo "
        <tr>
          <th scope='row'>".$data['id_utente']."</th>
          <td>".$data['nome']."</td>
          <td>".$data['cognome']."</td>
          <td>".$data['email']."</td>
          <td>".$data['super']."</td>
          <td>".$data['citta'].", ".$data['via'].", ".$data['civico'].", ".$data['cap']."</td>

        ";
        if ($data['id_utente']==$_SESSION["id"] ||$data['id_utente']==1 ) {
          echo "<td><button type='submit' class='btn btn-primary' disabled>Disabled</button></td>
          </tr>";
        }else {
          if ($data["super"]==1) {
            echo "<td><button type='submit' class='btn btn-danger' name='rimuovi' value='".$data['id_utente']."'>Rimuovi</button></td>
            ";
          }else {
            echo "<td><button type='submit' class='btn btn-primary' name='aggiungi' value='".$data['id_utente']."'>Aggiungi</button></td>
            ";
          }
          echo "<td><button type='submit' class='btn btn-primary' name='rimuovi_dipendente' value='".$data['id_utente']."'>Rimuovi</button></td>
          </tr>";
        }


      }
     ?>
    </tbody>
  </table>
</form>
