<?php
$config = [
    'db_host' => 'localhost',
    'db_name' => 'noleggio_vendita_auto',
    'db_user' => 'agg_admin',
    'db_password' => '',
];

$db_config = "mysql:host=".$config['db_host'].";dbname=".$config['db_name']."";
try {
    $admin = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    $admin->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $admin->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
/*
GRANT INSERT,SELECT
ON noleggio_vendita_auto.automobile
TO agg_admin@localhost
*/

?>
