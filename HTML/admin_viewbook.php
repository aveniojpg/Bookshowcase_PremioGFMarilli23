<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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
  <script src="https://kit.fontawesome.com/3c9e13ec7b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../CSS/admin_table.css">
  <link rel="stylesheet" href="../CSS/viewlibro.css">


</head>

<body onload="openmodal(),closemodal()">
  <a href="admin_home.html" class="adminback">Indietro</a>


  <!--  
  <div id="nav"></div>
  <script>
      $(function(){
        $("#nav").load("navbar.html");
      });
      </script> -->



  <!-- sezione body -->
  <?php
  require_once "../PHP/connection.php";

  $idpost = $_GET['IDpost'];
  $query = "SELECT * FROM post WHERE IDpost = $idpost";
  $result = $connessione->query($query);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  ?>
  <div class="pagebody">
    <div class="maincontainer">
      <div class="pagetitle"><span>
          <?php $row['titolo']; ?>
        </span></div>
      <div class="imgsection">
        <div class="imgcontainer" src="">
          <img src="../uploads/<?php echo $row['img_front']; ?>" alt="" class="img1 img">
          <img src="../uploadsretro/<?php echo $row['img_retro']; ?>" alt="" class="img2 img">
          <button class="btnslide btn1" onclick="prec()"></button>

          <button class="btnslide btn2" onclick="succ()"></button>

        </div>
      </div>
      <div class="infosection">
        <div class="booktitle"><?php echo $row['titolo']; ?></div>
        <div class="usernamelabel">di
          <div href="viewprofile.html " class="username">user</div>
        </div>
        <textarea name="" id="" cols="30" rows="10" maxlength="400" placeholder="Descrizione libro utente" readonly class="bookdesc"></textarea>
        <div class="optionscontainer">
          <div class="label">Condizione</div>
          <div class="userinput"><?php echo $row['condizioni']; ?></div>
          <!-- <select name="" id="">
            <option value="">Nuovo</option>
            <option value="">Buone</option>
            <option value="">Discrete</option>
          </select> -->
        </div>
        <div class="optionscontainer">
          <div class="label">Materia</div>
          <div class="userinput"><?php echo $row['materia']; ?></div>

        </div>
        <div class="optionscontainer">
          <div class="label">ISBN</div>
          <div class="userinput" aria-placeholder="ciao"><?php echo $row['ISBN']; ?></div>
        </div>
        <!-- <div class="optionscontainer">
          <div class="label">Contatto</div>
          <div class="userinput">mail</div>
        </div> -->
        <div class="optionscontainer">
          <div class="label">Prezzo</div>
          <div class="userinput"><?php echo $row['prezzo']; ?></div>
        </div>

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