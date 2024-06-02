<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'index.php'; 

    if (isset($_POST['datainizioviaggio']) && isset($_POST['datafine']) && isset($_POST['cittapartenza']) && isset($_POST['cittaarrivo']) && isset($_POST['prezzo']) && isset($_POST['npostiviaggio']) && isset($_POST['bagaglio'])) {
        
        $datainizioviaggio = $_POST['datainizioviaggio'];
        $datafine = $_POST['datafine'];
        $cittapartenza = $_POST['cittapartenza'];
        $cittaarrivo = $_POST['cittaarrivo'];
        $prezzo = $_POST['prezzo'];
        $npostiviaggio = $_POST['npostiviaggio'];
        $bagaglio = $_POST['bagaglio'];

        if (!empty($datainizioviaggio) && !empty($datafine) && !empty($cittapartenza) && !empty($cittaarrivo) && !empty($prezzo) && !empty($npostiviaggio) && !empty($bagaglio)) {
            $animali = isset($_POST['animali']) ? 1 : 0;
            $fumatori = isset($_POST['fumatori']) ? 1 : 0;
            
            try {
                $query = "INSERT INTO viaggio (dataInizioViaggio, dataFine, cittaPartenza, cittaArrivo, prezzo, npostiviaggio, bagaglio, animali, fumatori) VALUES  ('$datainizioviaggio', '$datafine', '$cittapartenza', '$cittaarrivo', '$prezzo', '$npostiviaggio', '$bagaglio', '$animali', '$fumatori')";
                if ($mysqli->query($query)) {
                    header("Location: menu.php");
                    exit();
                } else {
                    throw new Exception("Errore durante l'inserimento dei dati nel database: " . $mysqli->error);
                }
            } catch (Exception $e) {
                echo "Errore: " . $e->getMessage();
            }
        } else {
            echo "Compila tutti i campi obbligatori.";
        }
    }
}


if (!isset($_SESSION['viaggi'])) {
    $_SESSION['viaggi'] = array();
}

?>


