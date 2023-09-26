<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/footer.css">
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="../CSS/viewlibro.css">
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
  <script src="../JS/imgslider1.js"></script>
  <script src="../JS/popup-book.js"></script>

</head>

<body onload="openmodal(),closemodal()">


  <div id="nav"></div>
  <script>
    $(function() {
      $("#nav").load("navbar.php");
    });
  </script>
  <!-- sezione body -->
  <div class="pagebody">
    <?php

    include "../PHP/connection.php";
    session_start();

    if (isset($_GET['report'])) {
    ?>
      <div class="alert alert-success">
        <strong>Reported successfully!</strong>
      </div>
    <?php
    }

    $_SESSION['idpost'] = $_GET['IDpost'];
    // var_dump($_SESSION['idpost']);

    if (isset($_GET['IDpost'])) {

      $IDpost = $_GET['IDpost'];

      $sql = "SELECT * FROM post WHERE IDpost = $IDpost";
      $result = $connessione->query($sql);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $uid = $row['uid'];
      $query = "SELECT username FROM utente as u, post as p WHERE u.uid = $uid";
      $show_username_result = $connessione->query($query);
      $show_username = $show_username_result->fetch_array(MYSQLI_ASSOC);
      // var_dump($show_username);
    ?>
      <div class="maincontainer">
        <div class="pagetitle"><?php echo $row['titolo']; ?><span>
          </span></div>
        <div class="imgsection">
          <div class="imgcontainer" src="">
            <?php echo "<img class='img1 img' src=' ../uploads/" . $row["img_front"] . "' . </img>"; ?>
            <?php echo "<img class='img2 img' src=' ../uploadsretro/" . $row["img_retro"] . "' . </img>"; ?>
            <button class="btnslide btn1" onclick="prec()"></button>

            <button class="btnslide btn2" onclick="succ()"></button>

          </div>
        </div>
        <div class="infosection">
          <h2 type="text" name="" id="" class="booktitle"><?php echo $row['titolo']; ?></h2>
          <div class="usernamelabel">di
            <a href="viewprofile.php?username=<?php echo $show_username['username']; ?>" class="username"><?php echo $show_username['username']; ?></a>
          </div>
          <div name="" id="" cols="30" rows="10" maxlength="400" class="bookdesc"><?php echo $row['descrizione']; ?></div>
          <div class="optionscontainer">
            <div class="label">Condizione</div>
            <div class="userinput"><?php echo $row['condizioni']; ?></div>
          </div>
          <div class="optionscontainer">
            <div class="label">Materia</div>
            <div class="userinput"><?php echo $row['materia']; ?></div>

          </div>
          <div class="optionscontainer">
            <div class="label">ISBN</div>
            <div type="text" value="" class="userinput" maxlength="13">
              <?php echo $row['ISBN']; ?>
            </div>
          </div>

          <!-- <div class="optionscontainer">
              <div class="label">Contatto</div>
              <input type="text" placeholder="user_isbn" class="sellermail" readonly>
              
            </div> -->
          <div class="optionscontainer">
            <div class="label">Prezzo</div>
            <div type="text" class="userinput" maxlength="5"><?php echo $row['prezzo']; ?>
            </div>
          </div>
          <div class="btncontainer">
            <a type="submit" id="submitbutton" class="submitbtn" href="wip.html">Aggiungi tra i preferiti</a>
            <button id="reportbutton" class="open-button" onclick="openmodal()">
              <img src="../SRC/report.png" alt="">
            </button>
          </div>
        </div>
      <?php
    }
      ?>
      </div>

      <dialog class="reportcontainer" id="modal">
        <div class="reportwrap">
          <div class="reporttitle">Segnalazione</div>
          <form action="../PHP/report.php" method="post">
            <textarea name="report" id="" cols="30" rows="10" placeholder="Inserisci il motivo della segnalazione..." class="reportarea"></textarea>
            <div class="reportbtncontainer">
              <button class="reportbtn close-button" onchange="closemodal()" name="back">Indietro</button>
              <input type="submit" id="submit" name="submit" class="reportbtn" value="Invia">
          </form>

      </dialog>

  </div>
  </div>

  </div>

  <!-- fine sezione body -->



  <!-- <div id="footer"></div>
  <script>
      $(function(){
        $("#footer").load("footer.html");
      });
      </script> -->


</body>

</html>