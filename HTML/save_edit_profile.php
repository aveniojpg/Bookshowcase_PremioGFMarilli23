

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/inserzione.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria&display=swap" rel="stylesheet">
</head>

<body>

    <div id="nav"></div>
    <script>
        $(function() {
            $("#nav").load("navbar.php");
        });
    </script>

    <?php

    require_once('../PHP/connection.php');
    session_start();

    if (isset($_POST['update'])) {
        $uid = $_SESSION['uid'];
        $newUsername = $_POST['username'];
    }


    if(!empty($_FILES['pfpfile'])){
        echo "<pre>";
        print_r($_FILES['pfpfile']);
        
        echo "</pre>";

        $img_name = $_FILES['pfpfile']['name'];
        $img_size = $_FILES['pfpfile']['size'];
        $tmp_name = $_FILES['pfpfile']['tmp_name'];
        $error = $_FILES['pfpfile']['error'];


        if ($error === 0) {
            if ($img_size > 1250000) {
                $em = "Il file è troppo grande";
                header("Location: editprofile.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("PFP-", true) . '.' . $img_ex_lc;
                    $img_upload_path = '../imgprofilo/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);


                    $query_images = "SELECT imgprofilo FROM utente WHERE uid = $uid";
                    $result = $connessione->query($query_images);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $img_profilo_old = $row['imgprofilo'];
                    

                    // Update Database
                    $sql =
                        "UPDATE utente SET username = '$newUsername', imgprofilo = '$new_img_name'
                    WHERE uid = $uid";

                    if (mysqli_query($connessione, $sql)) {
                        // echo "aaaa";
                        unlink("../uploads/" . $img_front_old);
                        unlink("../uploadsretro/" . $img_retro_old);
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
        header("Location: ../HTML/editprofile.php");
    }



$connessione->close();

    ?>