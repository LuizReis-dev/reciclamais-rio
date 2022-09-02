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
    <title>Editar Catador</title>
    <link rel="stylesheet" href="../css/editarcatador.css">
    <link rel="stylesheet" href="../css/estiloprincipal.css">
</head>
<body>
    <div id="pagina">
        <div class="conteiner">
            <h2>editar catador</h2>
            <form action="editarcatador.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]?>">
        <input type="text" name="nome" id="" placeholder="nome" value="<?php echo $row["nome"]?>">
        <input type="text" name="cpf" id="" placeholder="cpf" value="<?php echo $row["cpf"]?>">
        <input type="text" name="endereco" id="" placeholder="endereco" value="<?php echo $row["endereco"]?>">
        <input type="date" name="data_de_nascimento" id="" placeholder="data_de_nascimento" value="<?php echo $row["data_de_nascimento"]?>">
        <input type="text" name="email" id="" placeholder="email" value="<?php echo $row["email"]?>">
        <input type="text" name="telefone" id="" placeholder="telefone" value="<?php echo $row["telefone"]?>">
        <input type="submit" value="enviar" style="background-color: green;">
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