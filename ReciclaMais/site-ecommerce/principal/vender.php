<?php
session_start();
?><html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Vender</title>
    <link rel="stylesheet" href="../css/vender.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>

<body>
    <div id="pagina">
        <?php
        require '../util/cabecalho.php';
        ?>
        <div class="conteiner">
            <h2>Infelizmente ainda não trabalhamos com compras online</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1490.3514353707449!2d-43.21725184632061!3d-22.914159855862682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e55b93efb2f%3A0x18f487e7b6144b74!2sR.%20Mariz%20e%20Barros%2C%20341%20-%20Maracan%C3%A3%2C%20Rio%20de%20Janeiro%20-%20RJ%2C%2020270-003!5e0!3m2!1spt-BR!2sbr!4v1662602022602!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="traco"></div>
            <p>Caso tenha interesse em vender para nós, nos encontramos no endereço acima</p>
            <small>Caso haja mais dúvidas <a href="contatos.php">Contate-nos</a></small>
        </div>
    </div>
</body>

</html>