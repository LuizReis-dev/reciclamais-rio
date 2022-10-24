<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ReciclaMaisRio | Cadastrar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../css/cadastrar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
  <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>

<body>
  <div id="pagina">
    <div class="home">
      <a href="index.php">
        <button class="retornar">
          <span class="voltar"></span>
          <span class="descricao">Home</span>
        </button>
      </a>
    </div>
    <div class="container">
      <div class="cadastrar">
        <div class="cabecalho">
          <h2>Cadastro</h2>
        </div>
        <div class="inputs">
          <form action="cadastrarcodigo.php" method="POST" id="form">
            <div class="div_formulario">
              <input type="text" name="nome" id="empresa" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="empresa">Empresa</label>
            </div>
            <div class="div_formulario">
              <input type="text" name="telefone" id="telefone" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="telefone">Telefone</label>
            </div>
            <div class="div_formulario">
              <input type="text" name="cnpj" id="cnpj" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="cnpj">cnpj</label>
            </div>
            <div class="div_formulario">
              <input type="text" name="email" id="email" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="email">E-mail</label>
            </div>
            <div class="div_formulario">
              <input type="text" name="ramo" id="ramo" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="ramo">Ramo</label>
            </div>
            <div class="div_formulario">
              <input type="text" name="endereco" id="endereco" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="endereco">Endereco</label>
            </div>
            <div class="div_formulario">
              <input type="password" name="senha" id="senha" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="senha">Senha</label>
            </div>
            <div class="div_formulario">
              <input type="password" name="senha_confirmar" id="senha_confirmar" placeholder="" class="input_formulario" required>
              <label class="label_formulario" for="senha_confirmar">Confirmar senha</label>
            </div>
            <div class="termo-uso">
              <input type="checkbox" name="termo" id="termo" required>
              <br>
              <div class="termo_div">
                Eu li e aceito os <a href="#" onclick="abrirPopup()">termos de uso</a>
              </div>
              <div class="popup" id="popup">
                <i class="bi bi-clipboard-fill"></i>
                <?php
                require '../util/termouso.html';
                ?>
              </div>
            </div>
            <button class="botao">
              <span>cadastrar</span>
              <span>cadastrar</span>
            </button>
            <p>Já possui cadastro?<a id="cadastrar" href="login.html" onclick="cadastrar">Logar-se</a></p>
          </form>
        </div>
      </div>
      <div class="img">
        <div class="conteudo">
          <div class="cristo">
            <img src="../imagens/cristobranco.png" alt="cristo-redentor">
          </div>
          <h2>Seja bem-vindo</h2>
          <p>Junte-se á nós na luta contra o descarte de materiais recicláveis no meio ambiente, ajude a salvar o mundo junte-se a <span class="recicla">ReciclaMaisRio</span> que luta desde 1998 por um planeta mais verde.</p>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="../scripts/cadastrar.js"></script>
</body>

</html>