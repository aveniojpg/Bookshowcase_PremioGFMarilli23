<?php

session_start();

$idutente =  $_SESSION["uid"];
$titolo = $_POST['titolo'];
$isbn = $_POST['isbn'];
$materia = $_POST['materia'];
$descrizione = $_POST['descrizione'];

// var_dump($materia);


$condizioni = $_POST['condizioni'];
$prezzo = $_POST['prezzo'];


if (isset($_POST['submit']) && isset($_FILES['immagine']) && isset($_FILES['immagine2'])) {
    include "connection.php";

    echo "<pre>";
    print_r($_FILES['immagine']);
    print_r($_FILES['immagine2']);
    echo "</pre>";

    $img_name = $_FILES['immagine']['name'];
    $img_size = $_FILES['immagine']['size'];
    $tmp_name = $_FILES['immagine']['tmp_name'];
    $error = $_FILES['immagine']['error'];

    $img_name2 = $_FILES['immagine2']['name'];
    $img_size2 = $_FILES['immagine2']['size'];
    $tmp_name2 = $_FILES['immagine2']['tmp_name'];
    $error2 = $_FILES['immagine2']['error'];

    if ($error === 0) {
        if ($img_size > 1250000 || $img_size2 > 1250000) {
            $em = "Il/i file/s sono troppo grandi";
            header("Location: post.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
            $img_ex_lc2 = strtolower($img_ex2);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs) && in_array($img_ex_lc2, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                $new_img_name2 = uniqid("IMG-RETRO-", true) . '.' . $img_ex_lc2;
                $destination = '../uploadsretro/' . $new_img_name2;
                move_uploaded_file($tmp_name2, $destination);

                // Insert into Database
                $sql =
                "INSERT INTO post(titolo, uid, img_front, img_retro, ISBN, descrizione, materia, condizioni, prezzo) 
                VALUES('$titolo', '$idutente', '$new_img_name', '$new_img_name2', '$isbn', '$descrizione', '$materia', '$condizioni', '$prezzo')";
                mysqli_query($connessione, $sql);
                header("Location: ../HTML/uploadedbooks.php");   
            } else {
                $em = "Formato immagine non supportato";
                header("Location: ../HTML/inserzione.html?error=$em");
            }
        }
    } else {
        $em = "Errore sconosciuto";
        header("Location: ../HTML/inserzione.html?error=$em");
    }
} else {
    header("Location: ../HTML/inserzione.html");
}

// if ($connessione->query($sql) === TRUE) {
//     echo "Inserimento avvenuto con successo";
// } else {
//     echo "Errore durante l'inserimento del libro $sql. " . $connessione->error;
// }
// fa 2 query identiche

$connessione->close();

?>