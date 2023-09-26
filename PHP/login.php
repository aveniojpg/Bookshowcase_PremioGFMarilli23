<?php

require_once('connection.php');

$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if (isset($_POST['login'])) {
	$sql_select = "SELECT * FROM utente WHERE email = '$email'";
	if ($result = $connessione->query($sql_select)) {
		if ($result->num_rows == 1) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if (password_verify($password, $row['password'])) {
                if ($row['user_type'] == "user"){
					session_start();

					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['imgprofilo'] = $row['imgprofilo'];
					$_SESSION['loggato'] = TRUE;
					$_SESSION['username'] = $row['username'];
					$_SESSION['uid'] = $row['uid'];
					$_SESSION['email'] = $row['email'];
				
					header("location: ../HTML/profile.php");
                } elseif ($row['user_type'] == "admin") {
                    session_start();

					$_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['imgprofilo'] = $row['imgprofilo'];
                    $_SESSION['loggato'] = TRUE;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['email'] = $row['email'];

                    header("location: ../HTML/admin_home.html");
                }
			} else {
				echo "la password è incorretta";
			}
		} else {
			echo "Non ci sono account associati a questa email";
		}
	} else {
		echo "Errore in fase di login";
	}
}
	$connessione->close();

?>