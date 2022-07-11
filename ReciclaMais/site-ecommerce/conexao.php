<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reciclamais";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erro: " . $conn->connect_error);
}
?>