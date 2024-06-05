<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('img/sfondo.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color: orange;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150vh; 
            width: 100vw; 
        }

        h1{
            position: absolute;
            text-align: center;
            margin-bottom: 995px;
        }
        table {
            max-width: 600px; 
            border-collapse: collapse;
        }
        th, td {
            border: none;
            padding: 10px; 
            text-align: left;
            color: #fe0000;
            font-size: 14px; 
        }
        th {
            background-color: blue;
        }
        img {
            width: 155px; 
            height: 90px;
            margin: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <table>
        <?php
        include 'index.php';

        $query = "SELECT titolo, sinossi, durata, datauscita FROM film";

        $result = $mysqli->query($query);

        $immagine = array("img/immagine1.png", "img/immagine2.png", "img/immagine3.png", "img/immagine4.png", "img/immagine5.png");
        $i = 0;

        if ($result->num_rows > 0) {
            echo "<h1>FILM</h1>";
            echo "<tr>";
            echo "<th>Titolo</th><th>Sinossi</th><th>Durata</th><th>Data di Uscita</th><th>Immagine</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row["titolo"]. "</td>";
                echo "<td>". $row["sinossi"]. "</td>";
                echo "<td>". $row["durata"]. "</td>";
                echo "<td>". $row["datauscita"]. "</td>";
                echo "<td><img src='". $immagine[$i]. "' alt='Immagine film'></td>";
                echo "</tr>";
                $i++;
            }
        }

        $mysqli->close();
     ?>
    </table>
</body>
</html>