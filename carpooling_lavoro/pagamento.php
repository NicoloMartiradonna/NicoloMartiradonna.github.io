<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'index.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $recapito_telefonico = $_POST['recapito_telefonico'];

    $query = "SELECT * FROM passeggero WHERE email = ? AND password = ? AND recapito_telefonicopasseggero = ?";

    $gestionedata = $mysqli->prepare($query);
    if ($gestionedata === false) {
        die('Prepare failed: ' . $mysqli->error);
    }
    
    $gestionedata->bind_param("sss", $email, $password, $recapito_telefonico);
    if ($gestionedata->execute() === false) {
        die('Execute failed: ' . $gestionedata->error);
    }
    
    $result = $gestionedata->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['email'] = $email; 
        header("Location: recensione.html"); 
        exit();
    } else {
        header("Location: pagamento.php");
        exit();
    }
}
?>
