<?php
try {
    $lettura_scrittura  = new PDO("mysql:host=localhost;dbname=noleggio_vendita_auto","root","");


    $nome="pino";
    $cognome="abete";
    $anno="200-11-11";
    $email="a@a";
    $p = $lettura_scrittura -> prepare("insert into cliente (nome,cognome,anno_nascita,email) VALUES(:nome,:cognome,:anno_nascita,:email)");
    $p->bindParam(":nome",$nome);
    $p->bindParam(":cognome",$cognome);
    $p->bindParam(":anno_nascita",$anno);
    $p->bindParam(":email",$email);
    $p->execute();

} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}


 ?>
