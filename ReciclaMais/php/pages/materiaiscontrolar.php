<?php
require 'navegacao.html';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlar materiais</title>
    <link rel="import" href="navegacao.html">
    <link rel="stylesheet" href="../css/controlar.css">
</head>

<body>
    <div class="conteudo-principal">
        <div class="opcoes">
            <a class="opcao" href="catadorescontrolar.php">Catadores</a>
            <a class="opcao" href="empresascontrolar.php">Empresas</a>
            <a id="selecionado" class="opcao" href="#">Materiais</a>
        </div>
        <table class="tabela-controlar">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço por kg</th>
                <th class="th-actions">Ações</th>
            </thead>
            <tr>
                <td>3</td>
                <td>Cobre</td>
                <td>20</td>
                <td class="acoes"><a href="#"><i class="bi bi-eye olho"></i></a> <a href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
            </tr>
        </table>

    </div>

</body>

</html>