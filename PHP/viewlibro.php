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
    session_start();
    $_SESSION['idpost'] = $_GET['IDpost'];
    // var_dump($_SESSION['idpost']);

    if (isset($_GET['IDpost'])) {

    ?>


        <a href="homepage.php">HOMEPAGE</a>


        <h1>Pagina del libro</h1>
        <br>

    <?php
        $IDpost = $_GET['IDpost'];
        $sql = "SELECT * FROM post WHERE IDpost = $IDpost";
        $result = $connessione->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        echo "<div> Titolo: " . $row["titolo"] . "<br>" .
            " - ID post: " . $row["IDpost"] . "<br>" .
            " - ID utente: " . $row["uid"] . "<br>" .
            " - ISBN: " . $row["ISBN"] . "<br>" .
            " - Materia: " . $row["materia"] . "<br>" .
            " - Condizioni: " . $row["condizioni"] . "<br>" .
            " - Prezzo: " . $row["prezzo"] . " Euro" . "<br>" . 
            " - Caricato il " . $row["data"] . "<br>";
        if ($row["status"] == 0) {
            echo " - Status: Attivo </div>" . "<br>";
        } else {
            echo " - Status: Sospeso </div>" . "<br>";
        }

        echo "<img class='imglibro' src=' uploads/" . $row["file_url"] . "' . </img>" .
            "<img class='imglibro' src=' uploadsretro/" . $row["file_url_retro"] . "' . </img>" . "<br>";
        echo "<a href='report.php?IDpost=" . $_GET["IDpost"] . "'>Segnala</a>";
    }

if(isset($_SESSION['IDpost'])){
    
}



    // session_start();
    // $SESSION['idpost'] = $row["IDpost"];
    // var_dump($SESSION['idpost']);
    ?>

    <!-- <h3>Invia segnalazioni</h3> -->
    <br>
    <!-- <form action="report.php" method="get">
        <input type="text" class="report" name="report" id="report" maxlength="300" required>
        <input type="submit" name="submit" value="Invia">
    </form> -->
<?php    
    
?>



</body>

</html>