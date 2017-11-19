<?php
$servername = "localhost";
$database = "final_db";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password,$database);
mysqli_set_charset($conn, "utf8");   

?>