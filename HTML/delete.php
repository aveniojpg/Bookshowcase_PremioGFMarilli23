<?php

require_once("../PHP/connection.php");

if (isset($_GET['IDpost'])){
    $idpost = $_GET['IDpost'];
    $delete = "DELETE FROM post WHERE IDpost = $idpost";
    $connessione->query($delete);
    header("location: admin_catalogo.php");

}

if (isset($_GET['IDsegnalazione'])) {
    $idsegnalazione = $_GET['IDsegnalazione'];
    $delete = "DELETE FROM segnalazioni WHERE IDsegnalazione = $idsegnalazione";
    $connessione->query($delete);
    header("location: admin_segnalazioni.php");
}

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $delete = "DELETE FROM utente WHERE uid = $uid";
    $connessione->query($delete);
    header("location: admin_users.php");
}


?>