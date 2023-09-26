<?php

require_once('../PHP/connection.php');

session_start();

$_SESSION['IDpost'] = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/lista2.css">
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
    <script src="../JS/filtermng.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="filtermenu" id="filtermenu">
        <button class="removetoggler" id="removetoggler" onclick="closefilter()"></button>
        <div id="filtersectiontitle">Filtri</div>
        <div class="filtercontainer">


            <button class="filtersection" onclick="openfilterbody1()">
                <img src="../SRC/bottomarrow.png" alt="">
                <div class="filtertitle">Materia</div>
            </button>
            <div class="filterbody subject" id="filterbody1">
                <div class="bodywrap bsubject">
                  <h1>work in progress!</h1>
                    </table>
                    </form>

                    </tr>
                    </table>
                    <!-- <a href="" class="checkboxline">Italiano</a>
                    <a href="" class="checkboxline">Matematica</a>
                    <a href="" class="checkboxline">Informatica</a>
                    <a href="" class="checkboxline">subject</a>
                    <a href="" class="checkboxline">subject</a>
                    <a href="" class="checkboxline">subject</a>
                    <a href="" class="checkboxline">subject</a>
                    <a href="" class="checkboxline">subject</a>
                    <a href="" class="checkboxline">subject</a> -->
                </div>
            </div>


            <!-- <button class="filtersection" onclick="openfilterbody2()">
                <img src="../SRC/bottomarrow.png" alt="">
                <div class="filtertitle">Condizione</div>
            </button>
            <div class="filterbody conditions" id="filterbody2">
                <div class="bodywrap">
                    <a href="" class="checkboxline">Nuovo</a>
                    <a href="" class="checkboxline">Buone</a>
                    <a href="" class="checkboxline">Discrete</a>
                </div>
            </div>

            <button class="filtersection" onclick="openfilterbody3()">
                <img src="../SRC/bottomarrow.png" alt="">
                <div class="filtertitle">Prezzo</div>
            </button>
            <div class="filterbody conditions" id="filterbody3">
                <div class="bodywrap">
                    <a href="" class="checkboxline">30+
                    </a>
                    <a href="" class="checkboxline">15-30</a>
                    <a href="" class="checkboxline">0-15</a>
                </div>
            </div> -->


        </div>



    </div>
    <div id="nav"></div>
    <script>
        $(function() {
            $("#nav").load("navbar.php");
        });
    </script>
    <div class="pagebody">
        <h1 class="pagetitle" id="pagetitle">Catalogo libri</h1>
        <div class="togglermenu">
            <button class="filtertoggler" id="filtertoggler" onclick="showfilter()">
                <img src="../SRC/filter.png" alt="">
                <label for="filtertoggler" class="togglertext">Filtri</label></button>

            <div class="gridcontainer">
                <?php
                try {
                    foreach ($connessione->query("SELECT * FROM post") as $row)
                    // var_dump($row["IDpost"]);
                    {
                        echo "<a href='viewlibro.php?IDpost=" . $row["IDpost"] . "&&" . "class='linkwrap'>"
                ?>
                        <!-- <a href="viewlibro.php?IDpost=" <?php
                                                                // echo '$row["IDpost"]'; 
                                                                ?> class="linkwrap">  -->
                        <div class="box">
                            <div class="flexcontainer">
                                <div class="imgcontainer">
                                    <?php echo "<img class='imglibro' src=' ../uploads/" . $row["img_front"] . "' . </img>"; ?>
                                </div>
                                <div class="infocontainer">
                                    <div class="booktitle"><?php echo $row['titolo']; ?></div>
                                    <div class="bookinfocontainer">
                                        <div class="flexrow">
                                            <div class="label">Stato:</div>
                                            <?php if ($row["status"] == 0) {
                                                echo "<div class='info'>Disponibile</div>";
                                            } else {
                                                echo "<div class='info'>Sospeso</div>";
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="flexrow">
                                        <div class="label">Condizione:</div>
                                        <div class="info"><?php echo $row["condizioni"] ?></div>
                                    </div>
                                    <div class="flexrow">
                                        <div class="label">Materia:</div>
                                        <div class="info"><?php echo $row["materia"] ?></div>
                                    </div>
                                    <div class="price"><?php echo $row["prezzo"] . "€"; ?></div>
                                </div>

                            </div>
                        </div>
                        <?php "</a>"; ?>
                <?php
                    }
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }

                ?>
            </div>
            <!-- <div class="bottomnav">
                <button class="bottombtn">
                    <img src="../SRC/left-arrow.png" alt="">
                </button>
                <button class="bottombtn">
                    <img src="../SRC/right-arrow.png" alt="">
                </button> -->

            </div>


        </div>
    </div>



</body>

</html>