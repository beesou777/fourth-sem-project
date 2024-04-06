<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "dashboard";

$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function get_connection() {
    global $con;
    return $con;
}
?>
