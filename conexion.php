<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "db_sgt";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
