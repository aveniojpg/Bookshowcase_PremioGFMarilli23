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

    <body>
        <form action="search.php" method="get">
            <input type="text" name="cerca_post" id="cerca_post" placeholder="Cerca libro">
            <button type="submit" name="cerca" id="cerca">Cerca</button>
            <form action="search.php" method="get">
                <table id="filtri">
                    <tr class="header">
                        <th style="width:60%;">Filtri</th>
                    </tr>
                    <tr>
                        <td><a href="search.php?materia=Italiano">Italiano</a></td>

                    </tr>
                    <tr>
                        <td><a href="search.php?materia=Inglese">Inglese</a></td>

                    </tr>
                    <tr>
                        <td><a href="search.php?materia=Matematica">Matematica</a></td>

                    </tr>
                    <tr>
                        <td><a href="search.php?materia=Storia">Storia</a></td>

                    </tr>
                </table>
            </form>

            </tr>
            </table>
        </form>

        <a href="homepage.php">HOMEPAGE</a>

        <h1>Questa è la homepage</h1>
        <a href="index.php">
            registrati
        </a>
        <br>
        <a href="login.html">
            accedi
        </a>
        <br>

        <a href="profilo.php">
            Vai al tuo profilo
        </a>

        <br>

        <a href="post.php">
            crea post
        </a>
        <br>
        <br>

        <h2>Posts: </h2>

    </body>
    <?php

    if (isset($_GET['materia'])) {
        var_dump($_GET['materia']);

        $cerca = $connessione->real_escape_string($_GET['materia']);
        $sql = "SELECT * FROM post WHERE materia = '$cerca'";
        $result = $connessione->query($sql);
        $queryResult = $result->num_rows;

        echo "Sono stati trovati " . $queryResult . " risultati" . "<br>";

        if ($queryResult > 0) {
            try {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div> Titolo: " . $row["titolo"] . "<br>" .
                        " - ID post: " . $row["IDpost"] . "<br>" .
                        " - ID utente: " . $row["uid"] . "<br>" .
                        " - Materia: " . $row["materia"] . "<br>" .
                        " - ISBN: " . $row["ISBN"] . "<br>";
                    if ($row["status"] == 0) {
                        echo " - Status: Attivo </div>";
                    } else {
                        echo " - Status: Sospeso </div>";
                    }
                    echo "<a href='viewlibro.php?IDpost=" . $row["IDpost"] . "&ISBN=" . $row["ISBN"]  . "'>Vedi post</a>";
                }
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        } else {
            echo "Nessun risultato";
        }
    }




    try {
        foreach ($connessione->query("SELECT * FROM post") as $row) {
            echo "<div> Titolo: " . $row["titolo"] . "<br>" .
                " - ID post: " . $row["IDpost"] . "<br>" .
                " - ID utente: " . $row["uid"] . "<br>" .
                " - ISBN: " . $row["ISBN"] . "<br>"  .
                " - Materia: " . $row["materia"] . "<br>";
            if ($row["status"] == 0) {
                echo " - Status: Attivo </div>";
            } else {
                echo " - Status: Sospeso </div>";
            }
            echo "<a href='viewlibro.php?IDpost=" . $row["IDpost"] . "'>Vedi post</a>" 
            ;
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    // }

//    if(isset($_GET['uid'])){
//     $uid = $_GET['uid'];
//     $IDpost = ($_GET['IDpost']);

//     $selectfav = $connessione->prepare("SELECT * FROM preferiti WHERE uid = ?");
//     $selectfav->execute([$uid]);
//     $num_rows->$selectfav->rowCount();

//    }

    $connessione->close();

    ?>

</html>