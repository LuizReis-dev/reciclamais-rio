<?php
session_start();
$qtd_carrinho = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cabecalho.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="cabecalho">
        <a href="index.php">
            <h2 class="nome-cooperativa">ReciclaMais</h2>
        </a>
        <ul class="opcoes">
            <li><a href="compra.php"> Comprar</a> </li>
            <li> <a href="vender.php">Vender</a> </li>
            <li> <a href=""> Estoque</a> </li>
            <li> <a href="">  Nossa Loja</a></li>
        </ul>
        <div class="logos">
            <a href="carrinho.php"><i class="bi bi-cart3"><span><?php echo $qtd_carrinho; ?></span></i></a>
            <?php 
                if(isset($_SESSION["id_usuario"])){
                    echo '<a href="editar.php?id='.$_SESSION["id_usuario"].'"> <i class="bi bi-person-circle usuario"></i></a>';
                    echo '<a href="../util/logout.php"><i class="bi bi-box-arrow-right"></i></a>';
                } else {
                    echo '<a href="login.html"> <i class="bi bi-person-circle usuario"></i></a>';
                }
            ?>
            
        </div>
    </div>
</body>

</html>