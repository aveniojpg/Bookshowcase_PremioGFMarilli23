<?php

require_once('connection.php');

session_start();

// var_dump($_SESSION['uid']);

// var_dump($_SESSION['idpost']);

if (isset($_POST['back']))  {
    $IDpost = $_SESSION['idpost'];  
    header("Location: ../HTML/viewlibro.php?IDpost=" . $IDpost);
}

if (isset($_POST['submit'])) {

    $uid = $_SESSION['uid'];
    $segnalazione = $_POST['report'];
    $IDpost = $_SESSION['idpost'];

    // var_dump($uid);
    // var_dump($segnalazione);
    // var_dump($IDpost);

    $segnalazione = $connessione->real_escape_string($_POST['report']);
    $sql = "INSERT INTO segnalazioni (segnalazione, IDpost, uid) VALUES('$segnalazione', '$IDpost', '$uid')";


    if ($connessione->query($sql) === TRUE) {
        header("Location: ../HTML/viewlibro.php?IDpost=" . $IDpost . "&&" . "report=success");
    } else {
        echo "Errore durante la segnalazione $sql. " . $connessione->error;
    }
}

?>
