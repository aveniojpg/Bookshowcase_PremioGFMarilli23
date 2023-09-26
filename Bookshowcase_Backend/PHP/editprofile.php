<?php

require_once('connection.php');
session_start();

if (isset($_POST['update'])) {
    //     UPDATE table_name
    // SET column1 = value1, column2 = value2, ...
    // WHERE condition; 

    $newUsername = $_POST['username'];
    $uid = $_SESSION['uid'];
    $sql = "UPDATE utente SET username = '$newUsername' WHERE uid = $uid";
    $result = $connessione->query($sql);
    if (isset($result)) {
        $_SESSION['username'] = $newUsername;
        header("Location:profilo.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit profile
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <form action="editprofile.php" method="POST" enctype="multipart/form-data">

        <span>
            Modifica profilo
        </span>
        <br>

        <?php
        require_once('connection.php');


        $uid = $_SESSION["uid"];
        // var_dump($currentUser);
        $sql = "SELECT * FROM utente WHERE uid = '$uid'";
        $result = $connessione->query($sql);


        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        ?>
                    <input type="file" id="immagine" name="immagine" required>
                    <p><img id="output" width="200" /></p>


                    <div>
                        <input type="text" id="username" name="username"  value=" <?php echo $row['username']; ?>" required>
                    </div>

                    <div>
                        <input type="submit" value="Update" name="update">
                    </div>

        <?php
                }
            }
        }
        ?>


    </form>

    <a href="profilo.php">Torna al profilo</a>

</body>



</html>