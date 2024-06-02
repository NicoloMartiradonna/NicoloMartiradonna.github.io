<?php
session_start();

include 'index.php';

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nomeUtente = $_SESSION['nome'];
$error_message = '';

function prenotaViaggio($ID) {
    global $mysqli;

    $checkQuery = "SELECT ID FROM prenotazione WHERE ID = ?";
    $checkGestionedata = $mysqli->prepare($checkQuery);
    $checkGestionedata->bind_param("i", $ID);
    $checkGestionedata->execute();
    $checkGestionedata->store_result();

    if ($checkGestionedata->num_rows > 0) {
        $checkGestionedata->close();
        return "Esiste già una prenotazione per questo viaggio.";
    }

    $checkGestionedata->close();

    $query = "INSERT INTO prenotazione (ID, effettuata) VALUES (?, 'Prenotazione avvenuta con successo')";
    $gestionedata = $mysqli->prepare($query);

    if (!$gestionedata) {
        return "Preparazione della query fallita: " . $mysqli->error;
    }

    $gestionedata->bind_param("i", $ID); 
    $result = $gestionedata->execute();

    if (!$result) {
        return "Esecuzione della query fallita: " . $gestionedata->error;
    }

    $gestionedata->close();
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (isset($_POST['accetta_viaggio']) && $_POST['accetta_viaggio'] == '1') {
        $result = prenotaViaggio($_POST['ID']);
        if ($result === true) {
            header("Location: pagamento.html");
            exit();
        } else {
            $error_message = $result;
        }
    } else {
        $error_message = "Devi accettare il viaggio prima di procedere con la prenotazione.";
    }
}

$queryViaggi = "SELECT v.*, p.ID AS effettuata FROM viaggio v LEFT JOIN prenotazione p ON v.ID = p.ID";
$resultViaggi = $mysqli->query($queryViaggi);

$_SESSION['viaggi'] = array();

if ($resultViaggi && $resultViaggi->num_rows > 0) {
    while ($row = $resultViaggi->fetch_assoc()) {
        $_SESSION['viaggi'][] = $row;
    }
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            background-image: url('img/biglietto1.png');
            background-color: #cccccc;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0; 
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            width: 100%;
            background-color: #007bff;
            padding: 10px 0;
            margin: 0;
        }

        .header nav {
            display: flex;
            justify-content: flex-end;
            margin: 0;
        }

        .header nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .header nav ul li {
            margin-left: 20px;
        }

        .header nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 0 10px;
        }

        .content {
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .viaggi-container {
            width: 80%;
            border-radius: 10px;
            padding: 20px;
        }

        .viaggio {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .viaggio h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .viaggio p {
            margin: 5px 0;
        }

        .viaggio form label {
            display: block;
            margin-bottom: 5px;
        }

        .viaggio form input[type="checkbox"] {
            margin-right: 5px;
        }

        .viaggio form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .viaggio form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .pagamento-effettuato {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav>
                <ul>
                    <li><p><?php if (isset($_SESSION['nome'])) echo "Benvenuto, " . $_SESSION['nome']; ?></p></li>
                    <li><a href="logout.php" class="active">Registrazione/Logout</a></li>
                    <li><a href="pubblica_viaggio.html" class="active">Pubblica un viaggio</a></li>
                    <li><a href="visione_viaggio.php" class="active">Visualizza viaggio</a></li>
                    <li><a href="registrazione.html">Registrazione</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="content">
        <div class="viaggi-container">
            <?php if ($error_message): ?>
                <div class="error-message"><?= $error_message ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['viaggi']) && !empty($_SESSION['viaggi'])): ?>
                <?php foreach ($_SESSION['viaggi'] as $viaggio): ?>
                    <?php if (is_null($viaggio['effettuata'])): ?> 
                        <div class="viaggio">
                            <h2>Dettagli Viaggio</h2>
                            <p><strong>Città Partenza:</strong> <?= $viaggio['cittaPartenza'] ?></p>
                            <p><strong>Città Arrivo:</strong> <?= $viaggio['cittaArrivo'] ?></p>
                            <p><strong>Data inizio viaggio:</strong> <?= $viaggio['datainizioViaggio'] ?></p>
                            <p><strong>Data fine viaggio:</strong> <?= $viaggio['datafine'] ?></p>
                            <p><strong>Prezzo:</strong> <?= $viaggio['prezzo'] ?></p>
                            <p><strong>Numero posti disponibili:</strong> <?= $viaggio['npostiviaggio'] ?></p>
                            <p><strong>Bagaglio:</strong> <?= $viaggio['bagaglio'] ?></p>
                            <p><strong>Animali:</strong> <?= $viaggio['animali'] ? 'Sì' : 'No' ?></p>
                            <p><strong>Fumatori:</strong> <?= $viaggio['fumatori'] ? 'Sì' : 'No' ?></p>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="hidden" name="ID" value="<?php echo $viaggio['ID']; ?>">
                                <label><input type="checkbox" name="accetta_viaggio" value="1"> Accetta viaggio</label>
                                <input type="submit" name="submit" value="Prenota e paga">
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
