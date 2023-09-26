<?php

require_once('connection.php');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO utente (email, username, password) VALUES('$email', '$username', '$hashed_password')";


if($connessione->query($sql) === TRUE){
    echo "Registrazione avvenuta con successo";
    header("Location:../HTML/login.html");
} else {
    echo "Errore durante la registrazione dell'utente $sql. " . $connessione->error;
}

?>