<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookselling</title>
    <link rel="stylesheet" href="../CSS/profile.css">
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
            <div class="top">Profilo</div>
            <div class="usersection">

                <?php
                require_once("../PHP/connection.php");
                if (isset($_GET['username'])) {
                    $username = $_GET['username'];
                    $query = "SELECT * FROM utente WHERE username = '$username'";
                    $result = $connessione->query($query);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    // var_dump($_GET['username']);
                    // var_dump($row);
                ?>

                    <div class="pfpcontainer">
                        <img src="../SRC/pfptesting.jpg" alt="" class="pfp">
                    </div>
                    <div class="userinfo">
                        <div class="name"><?php echo $row['username'] ?></div>
                        <!-- <div class="nickname">@jacquexxs</div> -->
                    </div>
            </div>
            <div class="infosection">
                <div class="subtitle">Contatti</div>
                <div class="flexfield">
                    <div class="infotype">Email:</div>
                    <div class="infofield">
                        <?php 
                        $email = $row["email"];
                        $link_address = 'https://mail.google.com/mail/u/3/?pli=1#inbox?compose=new';
                        echo "<a href='$link_address'>" . $email . "</a>";
                        ?>
                    </div>
                </div>
               
            </div>


        </div>

    <?php
                }
    ?>

    </div>

</body>

</html>