<?php

$host = 'eu-cdbr-west-02.cleardb.net';
$dbname = 'heroku_6f5126771bd4b68';
$username = 'bb9b2d031afe64';
$password = 'd81156e0d0754de';

// MySQL/MariaDB
$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname.';charset=utf8', $username, $password);

// PostgreSQL
// $dbh = new PDO('pgsql:host=' . $host . ';dbname=' . $dbname, $username, $password);

?>

