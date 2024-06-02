<?php
session_start();
include 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recapito_telefonico = $_POST['recapito_telefonico'];
    $tipo_utente = $_POST['tipo_utente'];

    if ($tipo_utente === "autista") {
        $query = "SELECT * FROM autista WHERE email = '$email' AND password='$password' AND recapito_telefonico = '$recapito_telefonico'";
    } elseif ($tipo_utente === "passeggero") {
        $query = "SELECT * FROM passeggero WHERE email = '$email' AND password='$password' AND recapito_telefonicopasseggero = '$recapito_telefonico'";
    }

    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        $_SESSION['nome'] = $email; // Imposta il nome dell'utente (autista/passeggero) come email
        $_SESSION['tipo_utente'] = $tipo_utente;
        header("Location: menu.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Credenziali non valide. Riprova.";
        header("Location: login.php");
        exit();
    }
}
?>
