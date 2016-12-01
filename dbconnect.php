<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ci-chat";

//create conn

$conn = new mysqli($servername, $username, $password, $dbname);

//check

if (!$conn) {
    die("Connection FAILED!" . mysqli_connect_error());
}

?>
