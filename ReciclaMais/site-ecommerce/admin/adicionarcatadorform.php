<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Catadores-Add</title>
    <link rel="stylesheet" href="../css/editar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>
<body>
    <div class="id" id="pagina">
        <div class="home">
            <a href="catadorescontrolar.php?pag=1">
                <button class="retornar">
                    <span class="voltar"></span>
                    <span class="descricao">controle</span>
                </button>
            </a>
        </div>
        <div class="conteiner">
            <form action="adicionarcatador.php" method="post">
                <picture class="cristo">
                    <img src="../imagens/cristo.png" alt="cristo">
                </picture>
                <div class="cabecalho">
                    <h2>Catadores-add</h2>
                </div>
                <div class="inputs">
                    <div class="div_input_label">
                        <input class="input" type="text" name="nome" id="nome">
                        <label class="label" for="nome">Nome</label>
                        <span class="input_span">
                            <i class="bi bi-person-fill icone"></i>
                        </span>
                    </div>
                    <div class="div_input_label">
                        <input class="input" type="text" name="cpf" id="cpf">
                        <label class="label" type="cpf">CPF</label>
                        <span class="input_span">
                            <i class="bi bi-credit-card-fill icone"></i>
                        </span>
                    </div>
                    <div class="div_input_label">
                        <input class="input" type="text" name="endereco" id="endereco">
                        <label class="label" for="endereco">Endereco</label>
                        <span class="input_span">
                            <i class="bi bi-house-fill icone"></i>
                        </span>
                    </div>
                    <div class="div_input_label">
                        <input class="input" type="date" name="data_de_nascimento" id="data_de_nascimento">
                        <label class="label" for="data_de_nascimento">Data de nascimento</label>
                        <span class="input_span">
                            <i class="bi bi-balloon-fill icone"></i>
                        </span>
                    </div>
                    <div class="div_input_label">
                        <input class="input" type="text" name="email" id="email">
                        <label class="label" for="email">E-mail</label>
                        <span class="input_span">
                            <i class="bi bi-envelope-fill icone"></i>
                        </span>
                    </div>
                        <div class="div_input_label">
                        <input class="input" type="text" name="telefone" id="telefone">
                        <label class="label" for="telefone">Telefone</label>
                        <span class="input_span">
                            <i class="bi bi-telephone-fill icone"></i>
                        </span>
                    </div>
                </div>
                <div class="div_button">
                    <input class="button" type="submit" value="enviar">
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>