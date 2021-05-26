<?php
$config = [
    'db_host' => 'localhost',
    'db_name' => 'noleggio_vendita_auto',
    'db_user' => 'register_login',
    'db_password' => 'rl-!noleggio_vendita_auto!-lr',
];

$db_config = "mysql:host=".$config['db_host'].";dbname=".$config['db_name']."";
try {
    $lettura_scrittura = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    $lettura_scrittura->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $lettura_scrittura->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
/*
GRANT SELECT, INSERT
ON noleggio_vendita_auto.utente
TO register_login@localhost
IDENTIFIED BY 'rl-!noleggio_vendita_auto!-lr';
*/

?>
