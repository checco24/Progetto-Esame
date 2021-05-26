<?php
$config = [
    'db_host' => 'localhost',
    'db_name' => 'noleggio_vendita_auto',
    'db_user' => 'lettura',
    'db_password' => '',
];

$db_config = "mysql:host=".$config['db_host'].";dbname=".$config['db_name']."";
try {
    $lettura = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    $lettura->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $lettura->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
/*
GRANT SELECT
ON noleggio_vendita_auto.*
TO lettura@localhost
*/

?>
