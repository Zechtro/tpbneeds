<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "tpbneeds";

// $conn = mysqli_connect($server, $user, $pass, $database, 3360);
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Failed to connect to database.')</script>");
}

?>