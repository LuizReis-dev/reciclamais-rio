<?php 
$id = $_GET["id"];
require '../util/conexao.php';
$sql = "SELECT * FROM catador WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Catadores-Edit</title>
    <link rel="stylesheet" href="../css/editar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>
<body>
    <div id="pagina">
        <div class="home">
            <a href="catadorescontrolar.php?pag=1">
                <button class="retornar">
                    <span class="voltar"></span>
                    <span class="descricao">controle</span>
                </button>
            </a>
        </div>
        <div class="conteiner">
            <form action="editarcatador.php" method="post">
                <picture class="cristo">
                    <img src="../imagens/cristo.png" alt="cristo">
                </picture>
                <div class="cabecalho">
                    <h2>Catadores-edit</h2>
                </div>
                    <div class="inputs">
                        <div class="div_input_label">
                            <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                            <input class="input" type="text" name="nome" id="nome" value="<?php echo $row["nome"]?>">
                            <label class="label" for="nome">Nome</label>
                            <span class="input_span">
                                <i class="bi bi-person-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="cpf" id="cpf" value="<?php echo $row["cpf"]?>">
                            <label class="label" type="cpf">CPF</label>
                            <span class="input_span">
                                <i class="bi bi-credit-card-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="endereco" id="endereco" value="<?php echo $row["endereco"]?>">
                            <label class="label" for="endereco">Endereco</label>
                            <span class="input_span">
                                <i class="bi bi-house-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="date" name="data_de_nascimento" id="data_de_nascimento" value="<?php echo $row["data_de_nascimento"]?>">
                            <label class="label" for="data_de_nascimento">Data de nascimento</label>
                            <span class="input_span">
                                <i class="bi bi-balloon-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="email" id="email" value="<?php echo $row["email"]?>">
                            <label class="label" for="email">E-mail</label>
                            <span class="input_span">
                                <i class="bi bi-envelope-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="telefone" id="telefone" value="<?php echo $row["telefone"]?>">
                            <label class="label" for="telefone">Telefone</label>
                            <span class="input_span">
                                <i class="bi bi-telephone-fill icone"></i>
                            </span>
                        </div>
                    </div>
                    <div class="div_button">
                        <input class="button" type="submit" value="enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	$conn->close();	
?> 