<?php

require_once('../PHP/connection.php');
session_start();

if (isset($_POST['submit'])){

    $idutente =  $_SESSION["uid"];
    $username = $_POST['username'];

    // var_dump($materia);


    $condizioni = $_POST['condizioni'];
    $prezzo = $_POST['prezzo'];
    $idpost = $_POST['IDpost'];


    if(!empty($_FILES['immagine']) && isset($_POST['username'])){
        echo "<pre>";
        print_r($_FILES['immagine']);
        
        echo "</pre>";

        $img_name = $_FILES['immagine']['name'];
        $img_size = $_FILES['immagine']['size'];
        $tmp_name = $_FILES['immagine']['tmp_name'];
        $error = $_FILES['immagine']['error'];


        if ($error === 0) {
            if ($img_size > 1250000) {
                $em = "Il file è troppo grande";
                header("Location: post.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);


                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("PFP-", true) . '.' . $img_ex_lc;
                    $img_upload_path = '../imgprofilo/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);


                    $query_images = "SELECT imgprofilo FROM utente WHERE uid = $idutente";
                    $result = $connessione->query($query_images);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $img_profilo_old = $row['imgprofilo'];
                    

                    // Insert into Database
                    $sql =
                        "UPDATE `utente` SET `imgprofilo`='$new_img_name', `username`='$username'
                    WHERE uid = $idutente";

                    if (mysqli_query($connessione, $sql)) {
                        // echo "aaaa";
                        unlink("../imgprofilo/" . $img_profilo_old);
                        
                    }
                    header("Location: ../HTML/profile.php");
                } else {
                    $em = "Formato immagine non supportato";
                    header("Location: ../HTML/editprofile.php?error=$em");
                }
            }
        } else {
            $em = "Errore sconosciuto";
            header("Location: ../HTML/editprofile.php?error=$em");
        }
    } else {
        header("Location: ../HTML/profile.php");
    }
}
