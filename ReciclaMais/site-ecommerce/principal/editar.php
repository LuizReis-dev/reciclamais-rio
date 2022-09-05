<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ReciclaMaisRio | Editar</title>
  <link rel="stylesheet" href="../css/editar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="icon" type="image/x-icon" href="../../Assets/Images/favicon.ico">
</head>

<body>
  <?php
  $campoid = filter_input(INPUT_GET, 'id');

  require '../util/conexao.php';

  $sql = "SELECT * FROM empresa WHERE Id = $campoid";

  $result = $conn->query($sql);

  //Se a consulta tiver resultados
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

  ?>
    <div id="pagina">
      <div class="home">
        <button class="retornar">
          <a href="usuario.html">
            <span class="voltar"></span>
          </a>
        </button>
        <!--<span class="descricao">Usuário</span>-->
      </div>
      <div class="conteiner">
        <form action="editarcodigo.php" method="post">
          <picture class="cristo">
            <img src="./images/cristo.png" alt="cristo">
          </picture>
          <div class="cabecalho">
            <h2>Editar</h2>
          </div>
          <div class="inputs">
            <div class="div_input_label">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
              <input type="text" name="telefone" id="telefone" placeholder="" class="input" required value="<?php echo $row["telefone"]; ?>">
              <label class="label" for="telefone">Telefone</label>
              <span class="input_span">
                <i class="bi bi-telephone-fill icone"></i>
              </span>
            </div>
            <div class="div_input_label">
              <input type="text" name="email" id="email" placeholder="" class="input" required value="<?php echo $row["email"]; ?>">
              <label class="label" for="email">E-mail</label>
              <span class="input_span">
                <i class="bi bi-person-fill icone"></i>
              </span>
            </div>
            <div class="div_input_label">
              <input type="text" name="endereco" id="endereco" placeholder="" class="input" required value="<?php echo $row["endereco"]; ?>">
              <label class="label" for="endereco">Endereço</label>
              <span class="input_span">
                <i class="bi bi-house-fill icone"></i>
              </span>
            </div>
            
            <div class="div_button">
              <input type="submit" value="Editar" class="button">
            </div>
          </div>
        <?php } else {
        echo "<h1>Nenhum resultado foi encontrado.</h1>";
      } ?>
        </form>
      </div>
    </div>
</body>

</html>