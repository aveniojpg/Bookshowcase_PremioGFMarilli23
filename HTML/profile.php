<?php

require_once "../PHP/connection.php";

session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] != TRUE) {
    header("location: login.html");
    exit;
    // se non si è loggati si viene rimandati alla pagina di login
}



if(isset($_POST['submit']) && isset($_FILES['image'])){

    include ("../PHP/connection.php");
    

}

?>


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
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alexandria&display=swap" rel="stylesheet">
</head>
<body>
    <div id="nav"></div>
    <script>
        $(function(){
          $("#nav").load("navbar.php");
        });
        </script>

        <?php
        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM utente WHERE uid = $uid";
        $result = $connessione->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        ?>

<div class="pagebody">
<div class="maincontainer">
    <div class="top">Profilo</div>
    <div class="usersection">
        <a href="editprofile.php" class="hrefwrap">
            <img src="../SRC/pen.png" alt="">
        </a>


        <div class="pfpcontainer">
            <img src="../imgprofilo/<?php echo $row['imgprofilo'] ?>" alt="" class="pfp">
        </div>
        <div class="userinfo">
            <div class="name"><?php echo $_SESSION['username'] ?></div>
            <!-- <div class="nickname">@jacquexxs</div> -->
        </div>
        </div>
        <div class="infosection">
            <div class="subtitle">Contatti</div>
            <div class="flexfield">
                <div class="infotype">Email:</div>
                <div class="infofield"><?php echo $_SESSION['email'] ?></div>
            </div>
            <!-- <div class="subtitle">Altro</div>
            <div class="flexfield">
                <div class="infotype">OptField1:</div>
                <div class="infofield">Lorem Ipsum</div>
            </div><div class="flexfield">
                <div class="infotype">OptField3:</div>
                <div class="infofield">Lorem Ipsum</div>
            </div><div class="flexfield">
                <div class="infotype">OptField4:</div>
                <div class="infofield">Lorem Ipsum</div>
            </div> -->
    </div>
   
    
</div>

</div>

</body>
</html>