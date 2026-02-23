<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "marchesBenin";

$connexion = mysqli_connect($host, $username, $password, $database);

if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

mysqli_set_charset($connexion, "utf8"); 
?>