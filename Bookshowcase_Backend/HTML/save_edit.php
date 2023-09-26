<?php

require_once('../PHP/connection.php');
session_start();

if (isset($_POST['submit'])){

    $idutente =  $_SESSION["uid"];
    $titolo = $_POST['titolo'];
    $isbn = $_POST['isbn'];
    $materia = $_POST['materia'];
    $descrizione = $_POST['descrizione'];

    // var_dump($materia);


    $condizioni = $_POST['condizioni'];
    $prezzo = $_POST['prezzo'];
    $idpost = $_POST['IDpost'];


    if(!empty($_FILES['immagine']) && !empty($_FILES['immagine2'])){
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

                    $query_images = "SELECT img_front, img_retro FROM post WHERE IDpost = $idpost";
                    $result = $connessione->query($query_images);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $img_front_old = $row['img_front'];
                    $img_retro_old = $row['img_retro'];

                    // Update Database
                    $sql =
                        "UPDATE `post` SET `titolo`='$titolo',`img_front`='$new_img_name',`img_retro`='$new_img_name2',`ISBN`='$isbn',`materia`='$materia',`descrizione`='$descrizione',`condizioni`='$condizioni',`prezzo`= $prezzo 
                    WHERE IDpost = $idpost";

                    if (mysqli_query($connessione, $sql)) {
                        // echo "aaaa";
                        unlink("../uploads/" . $img_front_old);
                        unlink("../uploadsretro/" . $img_retro_old);
                    }
                    header("Location: ../HTML/uploadedbooks.php");
                } else {
                    $em = "Formato immagine non supportato";
                    header("Location: ../HTML/editpost.php?error=$em");
                }
            }
        } else {
            $em = "Errore sconosciuto";
            header("Location: ../HTML/editpost.php?error=$em");
        }
    } else {
        header("Location: ../HTML/editpost.php");
    }

}

$connessione->close();



//     if(!empty($_FILES['immagine']) && !empty($_FILES['immagine2'])){
//         echo "<pre>";
//         print_r($_FILES['immagine']);
//         print_r($_FILES['immagine2']);
//         echo "</pre>";

//         $img_name = $_FILES['immagine']['name'];
//         $img_size = $_FILES['immagine']['size'];
//         $tmp_name = $_FILES['immagine']['tmp_name'];
//         $error = $_FILES['immagine']['error'];

//         $img_name2 = $_FILES['immagine2']['name'];
//         $img_size2 = $_FILES['immagine2']['size'];
//         $tmp_name2 = $_FILES['immagine2']['tmp_name'];
//         $error2 = $_FILES['immagine2']['error'];

//         if ($error === 0) {
//             if ($img_size > 1250000 || $img_size2 > 1250000) {
//                 $em = "Il/i file/s sono troppo grandi";
//                 header("Location: post.php?error=$em");
//             } else {
//                 $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//                 $img_ex_lc = strtolower($img_ex);

//                 $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
//                 $img_ex_lc2 = strtolower($img_ex2);

//                 $allowed_exs = array("jpg", "jpeg", "png");

//                 if (in_array($img_ex_lc, $allowed_exs) && in_array($img_ex_lc2, $allowed_exs)) {
//                     $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
//                     $img_upload_path = '../uploads/' . $new_img_name;
//                     move_uploaded_file($tmp_name, $img_upload_path);

//                     $new_img_name2 = uniqid("IMG-RETRO-", true) . '.' . $img_ex_lc2;
//                     $destination = '../uploadsretro/' . $new_img_name2;
//                     move_uploaded_file($tmp_name2, $destination);

//                     $query_images = "SELECT img_front, img_retro FROM post WHERE IDpost = $idpost";
//                     $result = $connessione->query($query_images);
//                     $row = $result->fetch_array(MYSQLI_ASSOC);
//                     $img_front_old = $row['img_front'];
//                     $img_retro_old = $row['img_retro'];

//                     // Insert into Database
//                     $sql =
//                         "UPDATE `post` SET `titolo`='$titolo',`img_front`='$new_img_name',`img_retro`='$new_img_name2',`ISBN`='$isbn',`materia`='$materia',`descrizione`='$descrizione',`condizioni`='$condizioni',`prezzo`= $prezzo 
//                     WHERE IDpost = $idpost";

//                     if (mysqli_query($connessione, $sql)) {
//                         // echo "aaaa";
//                         unlink("../uploads/" . $img_front_old);
//                         unlink("../uploadsretro/" . $img_retro_old);
//                     }
//                     header("Location: ../HTML/uploadedbooks.php");
//                 } else {
//                     $em = "Formato immagine non supportato";
//                     header("Location: ../HTML/editpost.php?error=$em");
//                 }
//             }
//         } else {
//             $em = "Errore sconosciuto";
//             header("Location: ../HTML/editpost.php?error=$em");
//         }
//     } else {
//         header("Location: ../HTML/editpost.php");
//     }

//     } else {
//     $sql =
//         "UPDATE `post` SET `titolo`='$titolo',`ISBN`='$isbn',`materia`='$materia',`descrizione`='$descrizione',`condizioni`='$condizioni',`prezzo`= $prezzo 
//         WHERE IDpost = $idpost";
//         mysqli_query($connessione, $sql);
//     }

    

    
// $connessione->close();
//     ?>

    

    <!-- if (isset($_POST['submit']) && isset($_FILES['immagine']) && isset($_FILES['immagine2'])) {
        

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

                    $query_images = "SELECT img_front, img_retro FROM post WHERE IDpost = $idpost";
                    $result = $connessione->query($query_images);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $img_front_old = $row['img_front'];
                    $img_retro_old = $row['img_retro'];

                    // Insert into Database
                    $sql =
                    "UPDATE `post` SET `titolo`='$titolo',`img_front`='$new_img_name',`img_retro`='$new_img_name2',`ISBN`='$isbn',`materia`='$materia',`descrizione`='$descrizione',`condizioni`='$condizioni',`prezzo`= $prezzo 
                    WHERE IDpost = $idpost";

                    if(mysqli_query($connessione, $sql)){
                        // echo "aaaa";
                        unlink("../uploads/" . $img_front_old);
                        unlink("../uploadsretro/" . $img_retro_old);

                    }
                    header("Location: ../HTML/uploadedbooks.php");
                } else {
                    $em = "Formato immagine non supportato";
                    header("Location: ../HTML/editpost.php?error=$em");
                }
            }
        } else {
            $em = "Errore sconosciuto";
            header("Location: ../HTML/editpost.php?error=$em");
        }
    } else {
        header("Location: ../HTML/editpost.php");
    }

    -->

    



