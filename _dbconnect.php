<?php
$server = "localhost";
$enrollment = "root";
$password = "";
$database = "users2023";

$conn = mysqli_connect($server, $enrollment, $password, $database);
if(!$conn){
    die("Error". mysqli_connect_error());
}
?>