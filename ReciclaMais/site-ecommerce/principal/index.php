<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Home</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>

<body>
    <div id="pagina">
        <?php
        require('../util/cabecalho.php');
        ?>
        <div class="conteiner">
            <div class="banner">
                <div class="cristo">
                    <img src="../imagens/cristopreto.png" alt="cristo-redentor">
                </div>
                <div class="paragrafo">
                    <h2>Bem-vindo ao <span>ReciclaMaisRio</span></h2>
                    <p>
                        A ReciclaMais Rio é uma cooperativa localizada nos subúrbios do Rio de Janeiro que compra matériais
                        reciclaveis e vende para serem reutilizados, incentivando a reciclagem para um futuro melhor e verde
                        desde 1998.
                    </p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <small>Copyright © 2022 ReciclaMaisRio. All rights reserved.</small>
        </div>
        <script type="text/javascript" src="principal.js"></script>
    </div>
</body>

</html>