<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>View libro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='main.js'></script>
</head>

<body>
    <?php

    include "connection.php";

    if (isset($_GET['IDpost'])) {

    ?>

        <form action="searchadmin.php" method="get">
            <input type="text" name="cerca_post" id="cerca_post" placeholder="Cerca libro">
            <button type="submit" name="cerca" id="cerca" value="cerca">Cerca</button>
        </form>

        <a href="homepageadmin.php">HOMEPAGE</a>


        <h1>Dettagli post</h1>
        <br>

    <?php
        $IDpost = $_GET['IDpost'];
        $sql = "SELECT IDpost, titolo, uid, file_url, file_url_retro, isbn, condizioni, prezzo, status FROM post WHERE IDpost = $IDpost";
        $result = $connessione->query($sql);
        $row1 = $result->fetch_array(MYSQLI_ASSOC);

        echo "<div> Titolo: " . $row1["titolo"] . "<br>" .
            " - ID post: " . $row1["IDpost"] . "<br>" .
            " - ID utente: " . $row1["uid"] . "<br>" .
            " - ISBN: " . $row1["isbn"] . "<br>" .
            " - Condizioni: " . $row1["condizioni"] . "<br>" .
            " - Prezzo: " . $row1["prezzo"] . " Euro" . "<br>";
        if ($row1["status"] == 0) {
            echo " - Status: Attivo </div>" . "<br>";
        } else {
            echo " - Status: Sospeso </div>" . "<br>";
        }

        echo "<img class='imglibro' src=' uploads/" . $row1["file_url"] . "' . </img>" .
            "<img class='imglibro' src=' uploadsretro/" . $row1["file_url_retro"] . "' . </img>" . "<br>";
    }

    ?>

    <h3>Invia segnalazioni</h3>

</body>

</html>