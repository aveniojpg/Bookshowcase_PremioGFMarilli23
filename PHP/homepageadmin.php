<?php

require_once('connection.php');

session_start();
$_SESSION['IDpost'] = 0;

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Homepage</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='main.js'></script>
</head>

<body>

    <form action="searchadmin.php" method="post">
        <input type="text" name="cerca_post" id="cerca_post" placeholder="Cerca libro" required>
        <button type="submit" name="cerca" id="cerca">Cerca</button>
    </form>
    <form action="searchadmin.php" method="get">
        <table id="filtri">
            <tr class="header">
                <th style="width:60%;">Filtri</th>
            </tr>
            <tr>
                <td><a href="searchadmin.php?materia=Italiano">Italiano</a></td>

            </tr>
            <tr>
                <td><a href="searchadmin.php?materia=Inglese">Inglese</a></td>

            </tr>
            <tr>
                <td><a href="searchadmin.php?materia=Matematica">Matematica</a></td>

            </tr>
            <tr>
                <td><a href="searchadmin.php?materia=Storia">Storia</a></td>

            </tr>
        </table>
    </form>

    <a href="homepageadmin.php">HOMEPAGE</a>

    <h1>Questa è la homepage admin</h1>


    <a href="admin.php">
        Vai al tuo profilo
    </a>

    <br>
    <h2>Posts:</h2>
    <br>
</body>
<?php




try {
    foreach ($connessione->query("SELECT * FROM post") as $row) {
        echo "<div> Titolo: " . $row["titolo"] . "<br>" .
            " - ID post: " . $row["IDpost"] . "<br>" .
            " - ID utente: " . $row["uid"] . "<br>" .
            " - ISBN: " . $row["ISBN"] . "<br>";
        if ($row["status"] == 0) {
            echo " - Status: Attivo </div>";
        } else {
            echo " - Status: Sospeso </div>";
        }
        echo "<a href='viewlibroadmin.php?IDpost=" . $row["IDpost"] . "'>Vedi post</a>";
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// }


$connessione->close();

?>

</html>