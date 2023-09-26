<?php

require_once('connection.php');
session_start();

if (isset($_POST['update'])) {
//     UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition; 


$IDpost = $_SESSION["IDpost"];
$newISBN = $_POST['ISBN'];
$newcondizioni = $_POST['condizioni'];
$newprezzo = $_POST['prezzo'];
$sql = "UPDATE post SET ISBN = '$newISBN', condizioni = '$newcondizioni', prezzo = '$newprezzo' WHERE IDpost = $IDpost";
$result = $connessione->query($sql);

if (isset($result)) {
    unset($_SESSION["IDpost"]);
    header("Location:profilo.php");
}
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit post</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <a href="editprofile.php">Modifica</a>
    <br>
    <form action="editpost.php" method="POST" enctype="multipart/form-data">

        <span>
            Modifica post 
        </span>
        <br>
        <a href="profilo.php">torna al profilo</a>
        <br>

        <?php
        require_once('connection.php');


        $IDpost = $_GET["IDpost"];
        $_SESSION["IDpost"] = $IDpost;
        // var_dump($IDpost);
        $sql = "SELECT * FROM post WHERE IDpost = '$IDpost'";
        $result = $connessione->query($sql);
        //  var_dump($result);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        ?>
                    <input type="file" id="immagine" name="immagine">
                    <p><img id="output" width="200" /></p>


                    <div>
                        <input type="text" id="ISBN" name="ISBN" placeholder="<?php echo $row['ISBN']; ?>" required>
                    </div>

                    <div>
                        <input type="text" id="condizioni" name="condizioni" placeholder="<?php echo $row['condizioni']; ?>" required>
                    </div>

                    <div>
                        <input type="text" id="prezzo" name="prezzo" placeholder="<?php echo $row['prezzo']; ?>" required>
                    </div>

                    <!-- button status che cambia -->

                    <div>
                        <input type="submit" value="Update" name="update">
                    </div>

        <?php
                }
            }
        }
        ?>


    </form>
</body>

</html>