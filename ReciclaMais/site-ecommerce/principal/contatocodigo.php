<?php 
    $nome = filter_input(INPUT_POST, 'nome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $mensagem = filter_input(INPUT_POST, 'mensagem');
    
    require '../util/enviaremail.php';
    $remetente = "Nova mensagem de : $nome $sobrenome";
    $textoEnviar = "Mensagem de $nome diz: '$mensagem'. Formas de contato do usuário: $email, $telefone";
    
    enviaremail("ReciclaMais", "reciclamaisrio@gmail.com", $remetente, $textoEnviar);
    header('location: /principal/contatos.php?confirmacao=true');
?>