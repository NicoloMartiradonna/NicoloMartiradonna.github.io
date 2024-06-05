<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'movie';

$response=array();


$mysqli = mysqli_connect($host, $username, $password, $dbname);


if($mysqli){
    $query = "SELECT * FROM film";
    

    $result = mysqli_query($mysqli, $query);

    /*
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id']= $row['id']; 
            $response[$i]['titolo']= $row['titolo'];
            $response[$i]['sinossi']= $row['sinossi'];
            $response[$i]['durata']= $row['durata'];
            $response[$i]['datauscita']= $row['datauscita'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }*/
}



?>
