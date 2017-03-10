<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_login";
$conn = new mysqli($servername, $username, $password, $dbname);

//display error if cant connect
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>