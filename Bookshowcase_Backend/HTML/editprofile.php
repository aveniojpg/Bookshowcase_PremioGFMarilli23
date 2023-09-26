<?php

require_once('../PHP/connection.php');
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
        header("Location:profile.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookselling</title>
    <link rel="stylesheet" href="../CSS/editprofile.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <!-- font momentaneo -->
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

    <div class="pagebody">
        <div class="maincontainer">
            <div class="top">Modifica profilo</div>
            <div class="usersection">
                <form action="save_edit_profile.php" method="post" enctype="multipart/form-data">
                <input type="file" accept="image/*" name="pfpfile" id="pfpfile" onchange="loadFile1(event)" class="pfpchange" style="display:none">
                <label for="pfpfile" style="cursor: pointer;" class="uploadbtn">
                    <img src="../SRC/pen.png" alt="" class="uploadicon">
                </label>

                <?php


                $currentUser = $_SESSION["username"];
                // var_dump($currentUser);
                $sql = "SELECT * FROM utente WHERE username = '$currentUser'";
                $result = $connessione->query($sql);


                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                ?>
                            <div class="pfpcontainer">

                                <img src="../SRC/default_book.png" alt="" class="pfp" id="pfp">
                                <script>
                                    var loadFile1 = function(event) {
                                        var image1 = document.getElementById('pfp');
                                        image1.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>


                            </div>
                            <div class="userinfo">
                                <div class="name"><?php echo $_SESSION['username'] ?></div>
                                <input type="text" class="nickname" name="username" id="username" placeholder="Inserisci il nuovo username">
                            </div>
            </div>
            <div class="infosection">
                <div class="subtitle">Contatti</div>
                <div class="flexfield">
                    <div class="infotype">Email:</div>
                    <div class="infofield"><?php echo $_SESSION['email']; ?></div>
                </div>
                <!-- <div class="subtitle">Altro</div>
                <div class="flexfield">
                    <div class="infotype">Email:</div>
                    <input type="text" class="infofield" placeholder="Inserisci una nuova email">
                </div>
                <div class="flexfield">
                    <div class="infotype">Email:</div>
                    <input type="text" class="infofield" placeholder="Inserisci una nuova email">
                </div>
                <div class="flexfield">
                    <div class="infotype">Email:</div>
                    <input type="text" class="infofield" placeholder="Inserisci una nuova email">
                </div> -->

                <a href="profile.php" class="hrefwrap">
                    <img src="../SRC/close.png" alt="">
                </a>

                <button type="submit" name="update" class="submitbtn">Salva modifiche</button>
            </div>
<?php
                        }
                    }
                }
?>


</form>

        </div>

    </div>

</body>

</html>