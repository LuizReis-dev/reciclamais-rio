<?php
session_start();
if($_SESSION["autorizacaorecuperar"] == false || !isset($_SESSION["autorizacaorecuperar"])){
    header('location: login.html');
} else {
    $_SESSION["autorizacaorecuperar"] = false;
}

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Reescrever senha</title>
    <link rel="stylesheet" href="../css/reescreversenha.css">
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
        <form action="reescreversenhacodigo.php" method="POST" class="conteiner">
            <fieldset>
            <legend>Reescrever senha</legend>
                <label for="senha">Digite a senha: </label>
                <input type="password" name="senha" id="senha" required>
                <label for="confirmacao">Confirme a senha:</label>
                <input type="password" name="confirmacao" id="confirmacao" required>
                <input type="submit" value="reescrever">
            </fieldset>
        </form>
    </div>
    <script>
        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);

            const confirmacao = urlParams.get('senhaerrada')
            if(confirmacao == 'true') { 
                window.alert('Digite senhas iguais!');
            }
        })
    </script>
</body>

</html>