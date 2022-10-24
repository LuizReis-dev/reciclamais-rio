<?php 
session_start();

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Esqueceu sua Senha</title>
    <link rel="stylesheet" href="../css/esqueceusuasenha.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>

<body>
    <div id="pagina">
        <div class="home">
            <a href="login.php">
                <button class="retornar">
                   <span class="voltar"></span>
                   <span class="descricao">login</span>
                </button>
            </a>
         </div>
         <div id="modal" class="modal" style="display: block">
            <form action="esqueceusuasenha.php" method="POST">
                <h2>Digite o codigo que foi enviado para seu Email</h2>
                <div class="inputbox">
                    <input type="number" name="codigo" required>
                    <label for="codigo">Código:</label>
                    <span></span>
                </div>
                <div class="inputbox">
                <input type="submit" value="Enviar" onclick="fecharModal()">
                </div>
            </form>
        </div>
        <form action="esqueceusuasenha.php" method="POST" class="conteiner">
            <fieldset>
            <legend>Recuperar senha</legend>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required>
                <input type="submit" value="enviar" onclick="checarEmail()">
            </fieldset>
        </form>
    </div>
<script>
    
    let popup = document.getElementById('modal');
    
    function abrirModal(){
        popup.classList.add('abrirmodal');
    }
    function fecharModal(){
        popup.classList.remove('abrirmodal');
    }
</script>    
<?php

    $campocodigo = filter_input(INPUT_POST, "codigo");

    if (isset($campocodigo)) {
        if ($campocodigo == $_SESSION["codigorecuperar"]) {
            $_SESSION["autorizacaorecuperar"] = true;
            echo "<script>window.location.replace('reescreversenha.php');</script>";
        } else {
            $_SESSION["autorizacaorecuperar"] = false;
            echo "<script>window.alert('codigo não coincide');</script>";
        }
    } else {
        $campoEmail = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if (isset($campoEmail)) {
            require "../util/conexao.php";
            $sql = "SELECT * FROM empresa where email = '$campoEmail'";
            $retorno = $conn->query($sql);
            $row = $retorno->fetch_assoc();
            if (!$row["email"]) {
                echo " <script>
        window.alert('O email informado não consta em nossos servidores')
        </script>";
            } else {
                $codigo = rand(100000, 999999);
                $_SESSION["codigorecuperar"] = $codigo;
                echo "<script>abrirModal();</script>";
                $_SESSION["idrecuperar"] = $row["id_usuario"];
                $texto = "Olá o codigo de recuperacao da sua conta é: $codigo, caso não tenha solicitado a recuperação apeanas ignore essa mensagem";
                require "../util/enviaremail.php";
                enviaremail(
                    "Caro cliente",
                    $campoEmail,
                    "Recuperacao de Senha",
                    $texto
                );
            }
        }
    }

?>

</body>

</html>