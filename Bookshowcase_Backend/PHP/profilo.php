<?php

require_once "connection.php";

session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] != TRUE) {
    header("location: login.html");
    exit;
    // se non si è loggati si viene rimandati alla pagina di login
}



if (isset($_GET['IDpost']) || isset($_GET['status'])) {
    $IDpost = $_GET['IDpost'];

    $delete = mysqli_query($connessione, "DELETE FROM `post` WHERE `post`.`IDpost` = $IDpost");

    header("Location:profilo.php");
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Profilo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='main.js'></script>
</head>

<body>
<h1>Profile page</h1>

<form action="editprofile.php" method="POST" enctype="multipart/form-data"> 



<!-- <body>
    <div id="nav"></div>
    <script>
        $(function() {
            $("#nav").load("navbar.html");
        });
    </script>

    <div class="pagebody">
        <div class="maincontainer">
            <div class="top">Profilo</div>
            <div class="usersection">
                <a href="editprofile.html" class="hrefwrap">
                    <img src="/SRC/pen.png" alt="">
                </a>


                <div class="pfpcontainer">
                    <img src="/SRC/pfptesting.jpg" alt="" class="pfp">
                </div>
                <div class="userinfo">
                    <div class="name">Giacomo Ranieri</div>
                    <div class="nickname">@jacquexxs</div>
                </div>
            </div>
            <div class="infosection">
                <div class="subtitle">Contatti</div>
                <div class="flexfield">
                    <div class="infotype">Email:</div>
                    <div class="infofield">usermail@gmail.com</div>
                </div>
                <div class="subtitle">Altro</div>
                <div class="flexfield">
                    <div class="infotype">OptField1:</div>
                    <div class="infofield">Lorem Ipsum</div>
                </div>
                <div class="flexfield">
                    <div class="infotype">OptField3:</div>
                    <div class="infofield">Lorem Ipsum</div>
                </div>
                <div class="flexfield">
                    <div class="infotype">OptField4:</div>
                    <div class="infofield">Lorem Ipsum</div>
                </div>
            </div>


        </div>

    </div>

</body>

</html> -->

<?php


// var_dump($_SESSION['imgprofilo']);
echo "<br>";


echo "Immagine profilo" . "<br>" . "<img class='imglibro' src= 'imgprofilo/" . $_SESSION['imgprofilo'] . "'. </img>" . "<br>";
echo "Benvenuto nel tuo profilo " . $_SESSION["email"] . "<br>";
echo "Il tuo username " . $_SESSION["username"] . "<br>";
echo "Il tuo id " . $_SESSION["uid"] . "<br>";

?>


<a href="editprofile.php">Modifica</a>
<br>
<a href="homepage.php">Vai alla homepage</a>
<br>
<a href="post.php">
    crea post
</a>
<br>
<a href="logout.php">Slogga</a>

<h2>I tuoi post</h2>
<?php

require_once('connection.php');

$id_utente = $_SESSION["uid"];
$sql_select_uid = "SELECT uid FROM post WHERE uid = $id_utente";
$result = $connessione->query($sql_select_uid);
$row1 = $result->fetch_array(MYSQLI_ASSOC);


if ($result->num_rows > 0) {
    if ($row1['uid'] === $_SESSION['uid'] && $row1['uid'] != null) {
        try {
            foreach ($connessione->query("SELECT * FROM post WHERE uid = $id_utente") as $row) {
                echo "<div> Titolo: " . $row["titolo"] . "<br>" .
                    " - ID post: " . $row["IDpost"] . "<br>" .
                    " - ID utente: " . $row["uid"] . "<br>" .
                    " - ISBN: " . $row["ISBN"] . "<br>" .
                    " - Materia: " . $row["materia"] . "<br>" .
                    " - Condizioni: " . $row["condizioni"] . "<br>" .
                    " - Prezzo: " . $row["prezzo"] . " Euro" . "<br>";
                if ($row["status"] == 0) {
                    echo " - Status: Attivo </div>";
                } else {
                    echo " - Status: Sospeso </div>";
                }
                echo "<img class='imglibro' src=' uploads/" . $row["file_url"] . "' . </img>" .
                    "<img class='imglibro' src=' uploadsretro/" . $row["file_url_retro"] . "' . </img>" .
                    "<a href='editpost.php?IDpost=" . $row["IDpost"] . "'>Modifica</a>";
                if ($row['status'] == 0) {
                    echo "<a onClick=\" javascript:return confirm('Sicuro di sospendere questo post?'); \"
                                href='disable.php?IDpost=" . $row["IDpost"] . "'>Sospendi</a>";
                } else {
                    echo "<a onClick=\" javascript:return confirm('Sicuro di attivare questo post?'); \"
                                href='enable.php?IDpost=" . $row["IDpost"] . "'>Attiva</a>";
                }
                echo "<a onClick=\" javascript:return confirm('Sicuro di eliminare questo post?'); \"
                            href='profilo.php?IDpost=" . $row["IDpost"] . "'>Elimina</a>";
                //se lo status 0 è attivo e se è 1 è sospeso
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br />";
            die();
        }
    } else {
        echo "errore";
    }
} else {
    echo "Non hai post pubblicati";
}
$connessione->close();
?>


<!-- </body>

</html> -->