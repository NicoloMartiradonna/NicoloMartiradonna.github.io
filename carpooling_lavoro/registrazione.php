<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'index.php';

    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['recapito_telefonico']) && isset($_POST['dati_auto']) && isset($_POST['generalita']) && isset($_POST['scadenza_patente']) && isset($_POST['password'])) {
        $nome= $_POST['nome'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $recapito_telefonico = $_POST['recapito_telefonico'];
        $dati_auto = $_POST['dati_auto'];
        $generalita = $_POST['generalita'];
        $scadenza_patente = $_POST['scadenza_patente'];
        $password = $_POST['password'];

        if (!empty($nome) && !empty($email) && !empty($numero) && !empty($recapito_telefonico) && !empty($dati_auto) && !empty($generalita) && !empty($scadenza_patente) && !empty($password)) {
            $dataodierna = date("Y-m-d");

            if (strtotime($dataodierna) > strtotime($scadenza_patente)) {
                header("Location: registrazioneAutista.html");
            } else {
                header("Location: registrazione.html");
                try {
                    $query = "INSERT INTO autista (nome, email, numero, recapito_telefonico, dati_auto, generalita, scadenza_patente, password) VALUES ('$nome','$email', '$numero', '$recapito_telefonico', '$dati_auto', '$generalita', '$scadenza_patente', '$password')";
                    if ($mysqli->query($query)) {
                        header("Location: registrazione.html");
                        exit();
                    } else {
                        throw new Exception("Errore durante l'inserimento dell'utente autista: " . $mysqli->error);
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['recapito_telefonicopasseggero']) && isset($_POST['email_passeggero']) && isset($_POST['documento_identita']) && isset($_POST['password_passeggero'])) {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $recapito_telefonicopasseggero = $_POST['recapito_telefonicopasseggero'];
        $email_passeggero = $_POST['email_passeggero'];
        $documento_identita = $_POST['documento_identita'];
        $password_passeggero = $_POST['password_passeggero'];

        if (!empty($nome) && !empty($cognome) && !empty($recapito_telefonicopasseggero) && !empty($email_passeggero) && !empty($documento_identita) && !empty($password_passeggero)) {
            try {
                $query = "INSERT INTO passeggero (nome, cognome, recapito_telefonicopasseggero, email, documento_identita, password) VALUES ('$nome', '$cognome', '$recapito_telefonicopasseggero', '$email_passeggero', '$documento_identita', '$password_passeggero')";
                if ($mysqli->query($query)) {
                    header("Location: registrazione.html");
                    exit();
                } else {
                    throw new Exception("Errore durante l'inserimento del passeggero: " . $mysqli->error);
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>
