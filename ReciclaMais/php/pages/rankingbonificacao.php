<?php
require 'navegacao.html';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlar empresas</title>
    <link rel="stylesheet" href="../css/controlar.css">
</head>

<body>
    <div class="conteudo-principal">

        <table class="tabela-controlar">
            <div class="opcoes">

            </div>
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>CPF</th>
                <th class="th-actions">Ações</th>
            </thead>
            <tr class="bonificar">
                <td>5</td>
                <td>Franciso Neves</td>
                <td>50</td>
                <td>000.000.000-00</td>
                <td class="acoes">
                    <a class="link" href="#"><i class="bi bi-eye olho"></i></a>
                    <a class="link" href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Franciso Neves</td>
                <td>50</td>
                <td>000.000.000-00</td>
                <td class="acoes"><a class="link" href="#"><i class="bi bi-eye olho"></i></a> <a class="link" href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Franciso Neves</td>
                <td>50</td>
                <td>000.000.000-00</td>
                <td class="acoes"><a class="link" href="#"><i class="bi bi-eye olho"></i></a> <a class="link" href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
            </tr>
            <tr class="bonificar">
                <td>5</td>
                <td>Franciso Neves</td>
                <td>50</td>
                <td>000.000.000-00</td>
                <td class="acoes"><a class="link" href="#"><i class="bi bi-eye olho"></i></a> <a class="link" href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
            </tr>

        </table>

        

    </div>
    <div class="form-bonificar">
            <i class="bi bi-x btn-sair"></i>
            <p>Valor sugerido: R$45,00</p>
            <p>Catador: Franciso Neves</p>
            <form action="">
                <input type="text" placeholder="Digite o valor da bonificação..."><br>
                <input type="submit" value="Bonificar">
            </form>
        </div>
    <script src="../scripts/rankingbonificacao.js"></script>

</body>

</html>