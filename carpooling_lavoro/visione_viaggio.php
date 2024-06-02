<?php
session_start();
include 'index.php'; 

$query = "SELECT v.*, p.ID AS prenotazioneID FROM viaggio v JOIN prenotazione p ON v.ID = p.ID";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-image: url('img/viaggioprenotati.png');
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1 style="text-align: center;">Viaggi prenotati</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Data Inizio</th><th>Data Fine</th><th>Città Partenza</th><th>Città Arrivo</th><th>Prezzo</th><th>Numero Posti</th>
    <th>Bagaglio</th><th>Animali</th><th>Fumatori</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['datainizioViaggio'] . "</td>";
        echo "<td>" . $row['datafine'] . "</td>";
        echo "<td>" . $row['cittaPartenza'] . "</td>"; 
        echo "<td>" . $row['cittaArrivo'] . "</td>"; 
        echo "<td>" . $row['prezzo'] . "</td>";
        echo "<td>" . $row['npostiviaggio'] . "</td>";
        echo "<td>" . $row['bagaglio'] . "</td>";
        echo "<td>" . ($row['animali'] ? 'Sì' : 'No') . "</td>";
        echo "<td>" . ($row['fumatori'] ? 'Sì' : 'No') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center;'>Nessun viaggio prenotato.</p>";
}
$result->free();
$mysqli->close();
?>

</body>
</html>
