<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alexandria&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="../CSS/admin_table.css">
  <script src="/JS/popup-book.js"></script>


</head>

<body onload="openmodal(),closemodal()">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <a href="admin_home.html" class="adminback">Indietro</a>

  <h2 class="admintitle">Lista libri</h2>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">ID_Post</th>
        <th scope="col">ID_Utente</th>
        <th scope="col">Data</th>
        <th scope="col">Descrizione</th>


      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        // try {
        require_once('../PHP/connection.php');
        foreach ($connessione->query("SELECT * FROM post") as $row) {

        ?>
          <th scope="row"><?php echo $row['IDpost'] ?></th>
          <td><a href="admin_viewprofile.php?uid=<?php echo $row['uid'] ?>"><?php echo $row['uid'] ?></a></td>
          <td><?php echo $row['data'] ?></td>


          <td><a href="admin_viewbook.php?IDpost=<?php echo $row['IDpost'] ?>">Visualizza dettagli</a></td>
          <td><a class="del open-button" href="delete.php?IDpost=<?php echo $row['IDpost'] ?>">Elimina</a></td>
      </tr>
    <?php
        }
    ?>

    </tbody>
  </table>

  <dialog class="reportcontainer" id="modal">
    <div class="reportwrap">
      <h2 class="confirm">Sicuro di voler eliminare qusto post?</h2>
      <form action="" method="dialog">

        <div class="reportbtncontainer">
          <button class="reportbtn close-button" onclick="closemodal()">Indietro</button>
          <button type="submit" class="reportbtn close-button">Conferma</button>
        </div>
  </dialog>
  </form>



</body>

</html>