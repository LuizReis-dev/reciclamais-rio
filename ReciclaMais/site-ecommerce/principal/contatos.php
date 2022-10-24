<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Contate-nos</title>
    <link rel="stylesheet" href="../css/contatos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>

<body>
    <div id="pagina">
        <?php
            require('../util/cabecalho.php');
            ?>
        <div class="conteiner">
            <aside class="informacoes-contato">
                <h2>Formas de contato</h2>
                <ul class="informacoes">
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <small>R. Mariz e Barros, 341 - Maracanã, Rio de Janeiro - RJ, 20270-003</small>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <small>reciclamaisrio@gmail.com</small>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <small>+55 (21)99999-9999</small>
                    </li>
                </ul>
                <ul class="redes-sociais">
                    <li>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                </ul>
            </aside>
            <div class="formulario">
                <h2>Enviar e-mail</h2>
                <form action="contatocodigo.php" method="POST">
                    <div class="form-input">
                        <input type="text" name="nome" id="nome" required>
                        <label for="nome">Primeiro nome</label>
                        <span></span>
                    </div>
                    <div class="form-input">
                        <input type="text" name="sobrenome" id="sobrenome" required>
                        <label for="sobrenome">Sobrenome</label>
                        <span></span>
                    </div>
                    <div class="form-input">
                        <input type="email" name="email" id="email" required>
                        <label for="email">Endereço de e-mail</label>
                        <span></span>
                    </div>
                    <div class="form-input">
                        <input type="tel" name="telefone" id="telefone" required>
                        <label for="telefone">Número de telefone</label>
                        <span></span>
                    </div>
                    <div class="form-input">
                        <textarea name="mensagem" id="mensagem" required></textarea>
                        <label for="mensagem">Escreva sua menssagem aqui...</label>
                        <span></span>
                    </div>
                    <div class="form-input">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);

            const confirmacao = urlParams.get('confirmacao')
            if(confirmacao == 'true') { 
                window.alert('Sua mensagem foi enviada! Aguarde a resposta no email informado');
            }
        })
    </script>
</body>

</html>