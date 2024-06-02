<?php
include 'index.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['voto']) && isset($_POST['descrizione'])) {
       
        $voto = $_POST['voto'];
        $descrizione = $_POST['descrizione'];
        
        $query = "INSERT INTO recensione (voto, descrizione) VALUES (?, ?)";
        $gestionedata = $mysqli->prepare($query);
        
        
        if ($gestionedata) {
            
            $gestionedata->bind_param("ds", $voto, $descrizione);

            
            $gestionedata->execute();

            
            if ($gestionedata->affected_rows > 0) {
                header('Location: menu.php');
                exit(); 
            } else {
                echo "Si è verificato un errore durante l'inserimento della recensione.";
            }

            $gestionedata->close();
        } else {
            echo "Si è verificato un errore durante la preparazione della query.";
        }
    } else {
        echo "Dati mancanti per l'inserimento della recensione.";
    }
}
?>
