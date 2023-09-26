<?php

require_once('../PHP/connection.php');
session_start();

if (isset($_GET['IDpost']) || isset($_GET['status'])) {
    $IDpost = $_GET['IDpost'];

    $delete = mysqli_query($connessione, "DELETE FROM post WHERE IDpost = $IDpost");

    header("Location:../HTML/uploadedbooks.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">







    <link rel="stylesheet" href="../CSS/uploadedbooks.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria&display=swap" rel="stylesheet">




    <title>Document</title>
</head>

<body>

    <div id="nav"></div>
    <script>
        $(function() {
            $("#nav").load("navbar.php");
        });
    </script>
    <div class="pagebody">
        <h1 class="pagetitle" id="pagetitle">Libri pubblicati</h1>

        <?php

        $id_utente = $_SESSION["uid"];
        $sql_select_uid = "SELECT uid FROM post WHERE uid = $id_utente";
        $result = $connessione->query($sql_select_uid);
        $row1 = $result->fetch_array(MYSQLI_ASSOC);

        ?> <div class="gridcontainer"> <?php
                                        if ($result->num_rows > 0) {
                                            if ($row1['uid'] === $_SESSION['uid'] && $row1['uid'] != null) {
                                                try {

                                                    foreach ($connessione->query("SELECT * FROM post WHERE uid = $id_utente") as $row) {
                                        ?>

                            <div class="boxwrap">
                                <div class="btncontainer">
                                    <div class="btnflex">
                                        <?php if ($row['status'] == 0) {
                                                            echo "<a class='editbtn' onClick=\" javascript:return confirm('Sicuro di sospendere questo post?'); \" href='../PHP/disable.php?IDpost=" . $row["IDpost"] . "'>Sospendi</a>";
                                                        } else {
                                                            echo "<a class='editbtn' onClick=\" javascript:return confirm('Sicuro di attivare questo post?'); \" href='../PHP/enable.php?IDpost=" . $row["IDpost"] . "'>Attiva</a>";
                                                        }
                                        ?>
                                        <a href="editpost.php?IDpost=<?php echo $row['IDpost']; ?>" class="smallbtn">
                                            <img src="../SRC/pen.png" alt="">
                                        </a>
                                        <?php
                                                        echo "<a onClick=\" javascript:return confirm('Sicuro di eliminare questo post?'); \" href='uploadedbooks.php?IDpost=" . $row["IDpost"] . "'>
                                                        <div class='binbtn'>
                                        <img src='../SRC/bin.png' alt='' class='binbtnimg'>
                                        </div>
                                        </a>";
                                        ?>
                                    </div>
                                </div>
                                <div class="box">
                                    <?php echo "<a href='viewlibro.php?IDpost=" . $row["IDpost"] . "&&" . "class='linkwrap'>"; ?>
                                    <div class="flexcontainer">
                                        <div class="imgcontainer">
                                            <?php echo "<img class='imglibro' src=' ../uploads/" . $row["img_front"] . "' . </img>"; ?>
                                        </div>
                                        <div class="infocontainer">
                                            <div class="booktitle"><?php echo $row["titolo"] ?></div>
                                            <div class="bookinfocontainer">
                                                <div class="flexrow">
                                                    <div class="label">Stato:</div>
                                                    <?php if ($row["status"] == 0) {
                                                            echo "<div class='info'>Disponibile</div>";
                                                        } else {
                                                            echo "<div class='info'>Sospeso</div>";
                                                        } ?>

                                                </div>
                                                <div class="flexrow">
                                                    <div class="label">Condizione:</div>
                                                    <div class="info"><?php echo $row["condizioni"] ?></div>
                                                </div>
                                                <div class="flexrow">
                                                    <div class="label">Materia:</div>
                                                    <div class="info"><?php echo $row["materia"] ?></div>
                                                </div>
                                            </div>
                                            <div class="price"><?php echo $row["prezzo"] . "€"; ?></div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="btnimg"></div>

            <?php

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


            <!-- <div class="gridcontainer">

                <div class="boxwrap">
                    <div class="btncontainer">
                        <div class="btnflex">
                            <button class="editbtn">Modifica stato</button>
                            <a href="inserzione.html" class="smallbtn">
                                <img src="/SRC/pen.png" alt="">
                            </a>
                            <button class="binbtn">
                                <img src="/SRC/bin.png" alt="">
                            </button>
                        </div>
                    </div>
                    <div class="box">
                        <a href="viewlibro.html" class="linkwrap">
                            <div class="flexcontainer">
                                <div class="imgcontainer">
                                    <img src="/SRC/userbook.jpg" alt="">
                                </div>
                                <div class="infocontainer">
                                    <div class="booktitle">La letteratura ieri,oggi e domani volume 3</div>
                                    <div class="bookinfocontainer">
                                        <div class="flexrow">
                                            <div class="label">Stato:</div>
                                            <div class="info">Disponibile</div>
                                        </div>
                                        <div class="flexrow">
                                            <div class="label">Condizione:</div>
                                            <div class="info">Nuovo</div>
                                        </div>
                                        <div class="flexrow">
                                            <div class="label">Materia:</div>
                                            <div class="info">Matematica</div>
                                        </div>
                                    </div>
                                    <div class="price">14€</div>
                                </div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="boxwrap">
                    <div class="btncontainer">
                        <div class="btnflex">
                            <button class="editbtn">Modifica stato</button>
                            <a href="inserzione.html" class="smallbtn">
                                <img src="/SRC/pen.png" alt="">
                            </a>
                            <button class="binbtn">
                                <img src="/SRC/bin.png" alt="">
                            </button>
                        </div>
                    </div>
                    <div class="box">
                        <a href="viewlibro.html" class="linkwrap">
                            <div class="flexcontainer">
                                <div class="imgcontainer">
                                    <img src="/SRC/userbook.jpg" alt="">
                                </div>
                                <div class="infocontainer">
                                    <div class="booktitle">La letteratura ieri,oggi e domani volume 3</div>
                                    <div class="bookinfocontainer">
                                        <div class="flexrow">
                                            <div class="label">Stato:</div>
                                            <div class="info">Disponibile</div>
                                        </div>
                                        <div class="flexrow">
                                            <div class="label">Condizione:</div>
                                            <div class="info">Nuovo</div>
                                        </div>
                                        <div class="flexrow">
                                            <div class="label">Materia:</div>
                                            <div class="info">Matematica</div>
                                        </div>
                                    </div>
                                    <div class="price">14€</div>
                                </div>
                            </div>
                    </div>
                    </a>
                </div> -->

            <!-- <dialog open class="popup deletepopup"></dialog> -->


            <!-- <div class="boxwrap">
    <div class="btncontainer">
        <button class="editbtn">Modifica stato</button>
        <button class="editbtn smallbtn">
            <img src="/SRC/pen.png" alt="">
        </button>
        <button class="editbtn smallbtn">
            <img src="/SRC/bin.png" alt="">
        </button>
    </div>
<div class="box">
    <a href="viewlibro.html" class="linkwrap">
    <div class="flexcontainer">
    <div class="imgcontainer">
        <img src="/SRC/userbook.jpg" alt="">
    </div>
    <div class="infocontainer">
        <div class="booktitle">La letteratura ieri,oggi e domani volume 3</div>
        <div class="bookinfocontainer">
        <div class="flexrow">
            <div class="label">Stato:</div>
            <div class="info">Disponibile</div>
        </div>
        <div class="flexrow">
            <div class="label">Condizione:</div>
            <div class="info">Nuovo</div>
        </div>
        <div class="flexrow">
            <div class="label">Materia:</div>
            <div class="info">Matematica</div>
        </div>
    </div>
    <div class="price">14€</div>
    </div>
</div>
</div>
</a>
</div> -->












        </div>




</body>

</html>