<?php
$host = '127.0.0.1';
$dbname = 'carpooling';
$username = 'root';
$password = '';

$mysqli = mysqli_connect($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connessione fallita: " . $mysqli->connect_error);
}



$query = "INSERT INTO regista (nome, cognome, data_nascita) VALUES ('Mario', 'Rossi', '20-09-1992')";

if ($conn->query($query) === TRUE) {
  echo "Inserimento effettuato con successo";
} else {
  echo "Errore: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>

