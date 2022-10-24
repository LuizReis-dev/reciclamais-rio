<?php
$servername = "localhost";
$username = "id19237258_reciclamaisrio";
$password = "q4@)sc~Jo&CIVD+<";
$dbname = "id19237258_reciclamais";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erro: " . $conn->connect_error);
}
?>