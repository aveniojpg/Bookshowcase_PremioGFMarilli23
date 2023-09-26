<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Documento</title>
</head>

<body>
  <?php

  // Connessione al database

  $host = "127.0.0.1";
  $user = "root";
  $password = "";
  $dbname = "bookshowcase3";

  $conn = mysqli_connect($host, $user, $password, $dbname);

  if (!$conn) {
    die("Errore di connessione: " . mysqli_connect_error());
  }

  //eseguo la Registrazione di un utente 

  if (isset($_POST['submit_registrazione'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password_hash crea un hash della password.

    $sql = "INSERT INTO utente (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
      header('Location: login.html');
    } else {
      $msg = "Errore nella registrazione: " . mysqli_error($conn);
    }
  }
  // login dell'utente 
  if (isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM utente WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      // Login effettuato con successo
      $_SESSION['ID_utente'] = $row['ID_utente'];
      $_SESSION['nome'] = $row['nome'];
      header('Location: HomePage.php');
      
    } else {
      $msg = "Email o password non corretti"; 
      header('Location: login.html');
    }
  }
  ?>
</body>

</html>