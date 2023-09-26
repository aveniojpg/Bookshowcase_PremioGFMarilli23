<?php

require_once "connection.php";

session_start();

if (isset($_GET['IDpost'])) {
    $IDpost = $_GET['IDpost'];
    
    $updatestatus = mysqli_query($connessione, "UPDATE `post` SET status = 1 WHERE `post`.`IDpost` = $IDpost");

    header("Location:../HTML/uploadedbooks.php");
}


?>