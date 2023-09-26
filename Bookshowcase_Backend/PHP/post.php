<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>postcreazione</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='main.js'></script>
</head>



<body>


    <?php
    require_once "connection.php";

    if (isset($_GET['error'])) : ?>
        <p><?php echo $_GET['error'] ?> </p>
    <?php endif ?>


    <form action="insert.php" method="POST" enctype="multipart/form-data">

        <span>
            Insert book
        </span>

        <div>
            <input type="text" id="titolo" name="titolo" placeholder="Titolo" required>
        </div>


        <input type="file" id="immagine" name="immagine" required>
        <p><img id="output" width="200" /></p>

        <input type="file" id="immagine2" name="immagine2" required>
        <p><img id="output" width="200" /></p>


        <div>
            <input type="text" id="isbn" name="isbn" placeholder="ISBN" required>
        </div>



        <?php
        // $sql_materie = "SELECT * FROM lista_materie";
        // $result = $connessione->query($sql_materie);
        // if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_array($result)) {
        //         $db_selected = $row['materia'];
        //     }
        // }
        ?>

        <div>
            <?php
            $selected = "Materia";
            $opzioni = array('Italiano', 'Inglese', 'Matematica', 'Storia');
            echo "<select name='materia'>";
            foreach ($opzioni as $opzione) {
                if ($db_selected == $opzione) {
                    echo "<option selected='$opzione'>$opzione</option>";
                } else {
                    echo "<option value='$opzione'>$opzione</option>";
                }
            }
            echo "</select>";
            ?>
        </div>

        <div>
            <input type="text" id="condizioni" name="condizioni" placeholder="Condizione del libro" required>
        </div>

        <div>
            <input type="text" id="prezzo" name="prezzo" placeholder="Prezzo" required>
        </div>

        <div>
            <input type="submit" id="submit" name="submit" value="submit">
        </div>
    </form>

    <a href="homepage.php">
        Vai alla homepage
    </a>
</body>

</html>