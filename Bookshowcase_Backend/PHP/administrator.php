<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='script.js'></script>
</head>

<body>
    <div class="container">
        <h1>Pagina di amministrazione</h1>
        <br>
        <a href="homepageadmin.php">Vai alla homepage</a>
        <br>
        <a href="logout.php">Slogga</a>
        <br>

        <?php

        require_once "connection.php";

        session_start();

        // if (isset($_GET['uid'])) {
        //     $uid = $_GET['uid'];


        //     $delete = mysqli_query($connessione, "DELETE FROM `utente` WHERE `utente`.`uid` = $uid");

        //     header("Location:admin.php");
        // }

        if (isset($_GET['IDpost'])) {
            $IDpost = $_GET['IDpost'];

            $delete = mysqli_query($connessione, "DELETE FROM `post` WHERE `post`.`IDpost` = $IDpost");

            header("Location:admin.php");
        }


        echo "Benvenuto " . $_SESSION['username'] . "<br>" .
            "Email: " . $_SESSION['email'] . "<br>" .
            "ID: " . $_SESSION['uid'] . "<br>";


        ?>

        <h2>Elenco degli utenti</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Utente</th>
                    <th>Email</th>
                    <th>Username</th>
                    <!-- <th>Elimina</th> -->
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php


                $sql = "SELECT * FROM utente WHERE user_type = 'user'";
                $result = $connessione->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["uid"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    // echo "<td><a onClick=\" javascript:return confirm('Sicuro di eliminare questo utente?'); \"
                    // href='admin.php?uid=" . $row["uid"] . "'>Elimina</a></td>";
                    echo "</tr>";
                }

                ?>
            </tbody>

            <table>
                <thead>
                    <h2>Elenco dei post</h2>
                    <tr>
                        <th>ID Post</th>
                        <th>ID Utente</th>
                        <th>ISBN</th>
                        <th>Titolo</th>
                        <!-- <th>Descrizione</th> -->
                        <th>Prezzo</th>
                        <th>Numero segnalazioni ricevuti</th>
                        <th>Stato</th>
                        <th>Elimina</th>
                        <!-- <th>Data di inserimento</th>
                        <th>Stato</th>
                        <th>immagini</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Recupera l'elenco dei post dal database
                    $query = "SELECT * FROM segnalazioni ORDER BY data DESC";
                    $result = $connessione->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["IDpost"] . "</td>";
                        echo "<td>" . $row["uid"] . "</td>";
                        echo "<td>" . $row["ISBN"] . "</td>";
                        echo "<td>" . $row["titolo"] . "</td>";
                        // echo "<td>" . $row["descrizione"] . "</td>";
                        echo "<td>" . $row["prezzo"] . "</td>";
                        echo "<td>" . $row["num_segnalazioni"] . "</td>";
                        if ($row["status"] == 0) {
                            echo "<td>Attivo </td>";
                        } else {
                            echo "<td>Sospeso </td>";
                        }
                        // echo "<td>" . $row["data_inserimento"] . "</td>";
                        // echo "<td>" . $row["stato"] . "</td>";
                        // echo "<td><img src='path/to/images/" . $row["immagini"] . "'></td>";
                        echo "<td><a onClick=\" javascript:return confirm('Sicuro di eliminare questo post?'); \"
                        href='admin.php?IDpost=" . $row["IDpost"] . "'>Elimina</a></td>";
                        echo "</tr>";
                    }
                    // Chiude la connessione al database
                    $connessione->close();
                    ?>
                </tbody>
            </table>



        </table>
    </div>
</body>

</html>