<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
// $dsn = 'mysql:dbname=testdb;host=127.0.0.1;port=3333';
/*
I'd like to point out that in PHP 7.0 in the dsn parameter you can't use 'host=localhost' to solve this you can use 'host=127.0.0.1' instead.
*/


$user = 'dbuser';
$password = 'dbpass';

try {
    $dbh = new PDO($dsn, $user, $password);
    // $link = new PDO("mysql:host=localhost;dbname=DB;charset=UTF8");
    // $db = new pdo('mysql:host=127.0.0.1;port=3306;dbname=mysql;charset=utf8','user','password',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    // die ('DB Error');
}

?>