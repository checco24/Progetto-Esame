<form method="POST" action="" class="needs-validation" autocomplete="off">
  <h1 class="fs-4 card-title fw-bold mb-4">Tabella utenti</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">nome</th>
        <th scope="col">cognome</th>
        <th scope="col">email</th>
        <th scope="col">Scegli sede</th>
        <th scope="col">aggiungi dipendente</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sedi=$admin->prepare("select * from sede");
      $sedi->execute();
      $sedi_check="
        <select name='sede' class='form-select'>
        ";
      while($data_sedi = $sedi->fetch( PDO::FETCH_ASSOC )){
        $sedi_check.="
         <option  value='".$data_sedi['id_sede']."'>".$data_sedi['citta'].", ".$data_sedi['via'].", ".$data_sedi['civico'].", ".$data_sedi['cap']."</option>
        ";
      }
      $sedi_check.="
        </select>
      ";


      $utenti =$admin->prepare("select utente.id_utente, utente.nome, utente.cognome, utente.email from utente
      left join dipendente on utente.id_utente = dipendente.id_utente where dipendente.id_utente is null
      ");
      //prendo solo i dati della tabella di sinistra che non sono presenti in quella di destra
      $utenti->execute();
      while($data = $utenti->fetch( PDO::FETCH_ASSOC )){
          echo "
          <tr>
            <th scope='row'>".$data['id_utente']."</th>
            <td>".$data['nome']."</td>
            <td>".$data['cognome']."</td>
            <td>".$data['email']."</td>
             <td>".$sedi_check."</td>
          ";
          echo "<td><button type='submit' class='btn btn-primary' name='aggiungi_dipendente' value='".$data['id_utente']."'>Aggiungi dipendente</button></td>
          </tr>";
        }
       ?>
    </tbody>
  </table>
</form>
