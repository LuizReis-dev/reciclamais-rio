<?php 
require 'cabecalho.html';
session_start();
if(!isset($_SESSION["id_usuario"])){
    header('location: login.html');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recicla Mais</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/estiloprincipal.css">
</head>

<body>
   
    <div class="banner">
        <img src="./imagens/cristo.png" alt="cristo-redentor">
        <div class="paragrafo">
            <h2>Bem-vindo ao ReciclaMaisRio</h2>
            <p>A ReciclaMais Rio é uma cooperativa localizada nos subúrbios do Rio de Janeiro que compra matériais reciclaveis e vende para serem reutilizados, incentivando a reciclagem para um futuro melhor e verde desde 1998.</p>
        </div>
    </div>
</body>

</html>