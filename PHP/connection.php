<?php

$host = "localhost";
$user = "bookselling";
$password = "12345";
$db = "bookshowcase";

$connessione = new mysqli($host, $user, $password, $db);

if($connessione === FALSE){
    die("Errore durante la connessione: " . $connessione->connect_error);
}

// query tabelle di prova
// CREATE TABLE utente (
//   uid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
//   email varchar(30)  NOT NULL,
//   username varchar(30) NOT NULL,
//   password varchar(255) NOT NULL,
//   Anno_scolastico int(6),
//   user_type varchar(10) NOT NULL DEFAULT 'user',
//   imgprofilo varchar(255)
// );


// CREATE TABLE post (
//   IDpost INT NOT NULL AUTO_INCREMENT,
//   PRIMARY KEY (IDpost),
//   titolo varchar(30) NOT NULL,
//   file_url varbinary(255) NOT NULL,
//   file_url_retro varbinary(255) NOT NULL,
//   ISBN BIGINT NOT NULL,
//   materia varchar(20) NOT NULL,
//   condizioni varchar(30) NOT NULL,
//   prezzo INT(2) NOT NULL,
//   uid INT NOT NULL,
//   FOREIGN KEY (uid) REFERENCES utente(uid),
//   status varchar(10) NOT NULL,
//   data DATE NOT NULL
// );


// CREATE TABLE segnalazioni (
//   IDsegnalazione INT NOT NULL AUTO_INCREMENT,
//   descrizione TEXT NOT NULL,
//   status varchar(10) NOT NULL DEFAULT 'in corso',
//   PRIMARY KEY (IDsegnalazione),
//   IDpost INT NOT NULL,
//   FOREIGN KEY (IDpost) REFERENCES post(IDpost),
//   uid INT NOT NULL,
//   FOREIGN KEY (uid) REFERENCES utente(uid),
//   data DATE NOT NULL
// );

// CREATE TABLE preferiti (
//   IDpreferito INT NOT NULL AUTO_INCREMENT,
//   PRIMARY KEY (IDpreferito),
//   uid INT NOT NULL,
//   FOREIGN KEY (uid) REFERENCES utente(uid),
//   IDpost INT NOT NULL,
//   FOREIGN KEY (IDpost) REFERENCES post(IDpost)

// );


?>
