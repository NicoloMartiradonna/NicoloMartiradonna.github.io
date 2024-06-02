<?php
$host = '127.0.0.1';
$dbname = 'carpooling';
$username = 'root';
$password = '';

$mysqli = mysqli_connect($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connessione fallita: " . $mysqli->connect_error);
}






?>