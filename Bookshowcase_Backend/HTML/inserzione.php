<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/footer.css">
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="../CSS/inserzione.css">
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
</head>

<body>

  <div id="nav"></div>
  <script>
    $(function() {
      $("#nav").load("navbar.php");
    });
  </script>
  <!-- sezione body -->
  <form action="../PHP/insert.php" method="post" enctype="multipart/form-data">
    <div class="pagebody">
      <div class="pagetitle">Carica un libro</div>
      <div class="maincontainer">
        <div class="imgsection">
          <div class="fleximgcontainer">
            <div class="uploadhint">Carica la foto delle copertine.
            </div>
            <div class="imgcontainer">
              <div class="imgplaceholder imgplaceholder1">
                <input type="file" accept="image/*" name="immagine" id="immagine" onchange="loadFile1(event)" style="display: none;" required>
                <label for="immagine" style="cursor: pointer;" class="uploadbtn">Carica una foto
                  <img src="../SRC/upload.png" alt="" class="uploadicon">
                </label>
                <script>
                  var loadFile1 = function(event) {
                    var image1 = document.getElementById('output1');
                    image1.src = URL.createObjectURL(event.target.files[0]);
                  };
                </script>
                <img class="img" id="output1" />
                <div class="weaklabel">Fronte</div>
              </div>
              <div class="imgplaceholder imgplaceholder2">
                <input type="file" accept="image/*" name="immagine2" id="immagine2" onchange="loadFile2(event)" style="display: none;" required>
                <label for="immagine2" style="cursor: pointer;" class="uploadbtn">Carica una foto
                  <img src="../SRC/upload.png" alt="" class="uploadicon">
                </label>
                <script>
                  var loadFile2 = function(event) {
                    var image2 = document.getElementById('output2');
                    image2.src = URL.createObjectURL(event.target.files[0]);
                  };
                </script>
                <img class="img" id="output2" />
                <div class="weaklabel">Retro</div>

              </div>
            </div>
            <!-- <div class="flexlabel">
        <div>Fronte</div>
        <div>Retro</div>
      </div> -->
          </div>
        </div>
        <div class="infosection">
          <input type="text" name="titolo" id="titolo" placeholder="Inserisci un titolo.." class="booktitle" required>
          <textarea name="descrizione" id="descrizione" cols="30" rows="10" maxlength="400" placeholder="Descrivi il tuo libro, ad es: poco usato, in ottime condizioni..."></textarea>
          <div class="optionscontainer">
            <div class="label">Condizione</div>
            <?php
            $selected_cond = "Condizioni";
            $opzioni_cond = array('Nuovo', 'Buone', 'Discrete');
            echo "<select name='condizioni'>";
            foreach ($opzioni_cond as $opzione_cond) {
              if ($db_selected_cond == $opzione_cond) {
                echo "<option selected='$opzione_cond'>$opzione_cond</option>";
              } else {
                echo "<option value='$opzione_cond'>$opzione_cond</option>";
              }
            }
            echo "</select>";
            ?>
          </div>
          <div class="optionscontainer">
            <div class="label">Materia</div>
            <?php
            $selected_mat = "Materia";
            $opzioni_mat = array('Italiano', 'Inglese', 'Matematica', 'Storia', 'Informatica', 'Sistemi', 'Tpsit');
            echo "<select name='materia'>";
            foreach ($opzioni_mat as $opzione_mat) {
              if ($db_selected_mat == $opzione_mat) {
                echo "<option selected='$opzione_mat'>$opzione_mat</option>";
              } else {
                echo "<option value='$opzione_mat'>$opzione_mat</option>";
              }
            }
            echo "</select>";
            ?>

          </div>
          <div class="optionscontainer">
            <div class="label">ISBN</div>
            <input type="text" value="" id="isbn" name="isbn" class="isbn" placeholder="Inserisci ISBN" maxlength="13" required>
          </div>
          <div class="optionscontainer">
            <div class="label">Prezzo</div>
            <input type="text" id="prezzo" name="prezzo" placeholder="00" class="price" maxlength="2" required>
          </div>
          <div class="btncontainer">
            <input type="submit" id="submit" name="submit" value="Pubblica">
          </div>

        </div>

      </div>

    </div>

  </form>

  <!-- fine sezione body -->

  <!-- <div id="footer"></div>
  <script>
      $(function(){
        $("#footer").load("footer.html");
      });
      </script> -->


</body>

</html>