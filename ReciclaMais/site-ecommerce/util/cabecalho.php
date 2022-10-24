<?php
$qtd_carrinho = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cabecalho.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="cabecalho">
        <a href="index.php">
            <h2 class="nome-cooperativa">ReciclaMaisRio</h2>
        </a>
        <ul class="opcoes">
            <li>
                <a href="comprar.php">Comprar</a>
            </li>
            <li>
                <a href="vender.php">Vender</a>
            </li>
            <li>
                <a href="contatos.php">Contatos</a>
            </li>
        </ul>
        <div class="logos">
            <div class="carrinho">
                <a href="carrinho.php">
                    <i class="bi bi-cart3" id="cart">
                        <span id="quantidade">
                            <?php
                            echo $qtd_carrinho;
                            ?>
                        </span>
                    </i>
                </a>
            </div>
            <button class="login">
                <?php
                if (isset($_SESSION["id_usuario"])) {
                    echo '<a href="usuario.php?id=' . $_SESSION["id_usuario"] . '"><i class="bi bi-person-circle usuario"></i></a>';
                    echo '<a href="../util/logout.php"><i class="bi bi-box-arrow-right"></i></a>';
                } else {
                    echo '<a href="login.html"> <i class="bi bi-person-circle usuario"></i><span class="logar">Fazer login</span></a>';
                }
                ?>
            </button>
        </div>
    </div>
</body>

</html>